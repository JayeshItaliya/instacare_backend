<?php
namespace App\Services;

use App\Mail\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageService
{

	private function getAuthUser( Request $request )
	{
		if ( $user = $request->user() ) {
			return [
				'platform' => 'web',
				'user' => $user,
			];
		}

		if ( $user = auth('sanctum')->user() ) {
			return [
				'platform' => 'api',
				'user' => $user,
			];
		}
	}

    public function getContactList( Request $request ): Collection
    {
    	$user = $this->getAuthUser( $request );
    	if ( $user['platform'] == 'web' ) {
    		return $user['user']->contacts()->latest('updated_at')->get();
    	}

		if ( $user['platform'] == 'api' ) {
			return $user['user']->contacts()->latest('updated_at')->get()->map(function ($user) {
				return [
					'contact' => $user->receiverContactApi,
					'message' => $user->message,
				];
			});
    	}

    	return collect();
    }

    public function storeCompose( Request $request ): Message | Collection
    {
    	$user = $this->getAuthUser( $request );
    	$message = collect();

    	switch ( strtolower($request->compose_method) ) {
    	    case Message::TYPE_TEXT:
    	        $message = Message::storeText( $request, $user['user'] );
    	        $status = true;
    	        break;
    	    
    	    case Message::TYPE_EMAIL:
    	        DB::beginTransaction();
    	        try {
    	            $message = Message::storeEmail( $request, $user['user'] );
    	            
    	            DB::commit();

    	            Mail::to(User::find($message->receiver_id))
    	                ->send(
    	                    (new SendMessage($user['user'], $message))
    	                        ->afterCommit()
    	                );
    	            $status = true;
    	        } catch (Exception $e) {
    	            DB::rollback();
    	        }

    	        break;

    	    case Message::TYPE_BOTH:
    	        DB::beginTransaction();
    	        try {
    	            $message = Message::storeBoth( $request, $user['user'] );
    	            
    	            DB::commit();

    	            Mail::to(User::find($message->receiver_id))
    	                ->send(
    	                    (new SendMessage($user['user'], $message))
    	                        ->afterCommit()
    	                );
    	            $status = true;
    	        } catch (Exception $e) {
    	            DB::rollback();
    	        }

    	        break;
    	}

    	return $message;
    }

    public function getUserChats( Request $request ): Collection
    {
    	$messagesQuery = Message::select(array(
    	        'id', 'sender_id', 'receiver_id', 'read_at', 'type', 'message', 'created_at',
    	    ))->where(function($query) use ( $request ) {
    	        $query->where(array(
    	            'sender_id' => $request->sender_id,
    	            'receiver_id' => $request->receiver_id,
    	        ));
    	    })->orWhere(function($query) use ( $request ) {
    	        $query->where(array(
    	            'sender_id' => $request->receiver_id,
    	            'receiver_id' => $request->sender_id,
    	        ));
    	    })->oldest()->groupBy('created_at');

    	// $messages = $messagesQuery->skip( $limit )->take( $offset )->get();
    	return $messagesQuery->get();
    }

    public function storeMessage( Request $request ): Message
    {
    	return Message::storeText( $request, $this->getAuthUser( $request )['user'] );
    }
}