<?php

namespace App\Http\Controllers;

use App\Mail\SendMessage;
use App\Models\Facilities;
use App\Models\Message;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function __construct(
        protected MessageService $messageService
    ) {}

    /**
     * Display messaging intial screen with contacts
     */
    public function index( Request $request ): View | JsonResponse
    {
        if ( $request->ajax() ) {

            $this->data['receiver_id'] = $request->receiver_id ?? 0;
            $this->data['contacts'] = $this->messageService->getContactList( $request );

            $view = view('admin/messaging/particals/contact-list', $this->data)->render();
            $this->data = [
                'status' => true,
                'data' => [
                    'view' => $view,
                ],
            ];

            return response()->json($this->data);
        }

        return view('admin.messaging.index');
    }

    /**
     * Show compose screen data with User types
     */
    public function showCompose( Request $request ): JsonResponse
    {
        if ($request->ajax()) {

            $this->data['types'] = User::getType();

            $view = view('admin.messaging.particals.compose', $this->data)->render();
            $this->data = [
                'status' => true,
                'data' => [
                    'view' => $view,
                ],
            ];
        }
        return response()->json($this->data);
    }

    /**
     * Get facility users based on the facility type
     */
    public function getFacilityUsers( Request $request ): JsonResponse
    {
        if ( $request->ajax() ) {
            $this->data['type'] = $request->type;
            $this->data['type_name'] = User::getType()[$request->type];
            $this->data['sending_to'] = $request->sending_to;

            $this->data['users'] = User::getFacilityUsers( $request->type );

            $view = view('admin.messaging.particals.send-to-user-list', $this->data)->render();
            $this->data = [
                'status' => true,
                'data' => [
                    'view' => $view,
                ],
            ];
        }
        return response()->json($this->data);
    }

    /**
     * Store compose message and create new contact
     */
    public function storeCompose( Request $request ): JsonResponse
    {
        if ( $request->ajax() ) {
            $status = false;

            $message = $this->messageService->storeCompose( $request );
            $status = $message instanceof Message;

            if ( $status ) {
                $this->data = [
                    'status' => true,
                    'data' => [
                        'message' => $message,
                        'receiver_id' => $request->receiver_id,
                    ],
                ];
            } else {
                $this->data = [
                    'status' => false,
                    'message' => 'Something went wrong.',
                ];
            }
        }

        return response()->json($this->data);
    }

    /**
     * Get user chat screen with intial chat data
     */
    public function showUserChat( Request $request ): JsonResponse
    {
        if ( $request->ajax() ) {
            $limit = $request->limit ?? 0;
            $offset = $request->offset ?? 10;

            $user = User::find($request->receiver_id);
            $messages = $this->messageService->getUserChats( $request );

            $this->data = [
                'user' => $user,
                'messages' => $messages,
            ];

            $view = view('admin.messaging.particals.chat-screen', $this->data)->render();
            $this->data = [
                'status' => true,
                'data' => [
                    'view' => $view,
                ],
            ];
        }
        return response()->json($this->data);
    }

    /**
     * Store text messsage and return with message view
     */
    public function sendNewMessage( Request $request ): JsonResponse
    {
        if ( $request->ajax() ) {
            $receiverUser = User::select([ 'id' ])->where([ 'id' => $request->receiver_id ])->first();
            $message = $this->messageService->storeMessage( $request );

            $this->data = [
                'message' => $message,
                'receiverUser' => $receiverUser,
            ];

            $view = view('admin.messaging.particals.sub-particals.message', $this->data)->render();

            $this->data = array(
                'status' => true,
                'data' => array(
                    'view' => $view,
                    'message' => $message->id,
                ),
            );
        }
        return response()->json($this->data);
    }

    /**
     * Display receiver user messsage received view
     */
    public function showReceiverMessage( Request $request ): JsonResponse
    {
        if ( $request->ajax() ) {
            $receiverUser = User::select(array( 'id' ))->where(array( 'id' => $request->sender_id ))->first();
            $message = Message::find($request->message_id);

            $this->data = array(
                'message' => $message,
                'receiverUser' => $receiverUser,
            );

            $view = view('admin.messaging.particals.sub-particals.message', $this->data)->render();

            $this->data = array(
                'status' => true,
                'data' => array(
                    'view' => $view,
                ),
            );
        }

        return response()->json($this->data);
    }

    public function markAsRead( Request $request ): JsonResponse
    {
        if ( $request->ajax() ) {
            $request->validate([
                'message_id' => ['required'],
            ]);

            $result = Message::find($request->message_id)->update([ 'read_at' => now() ]);
            if ( $result ) {
                $this->data = [
                    'status' => true,
                    'data' => [
                        'readMessageView' => view('admin.messaging.particals.sub-particals.double-tick')->render(),
                        'message' => Message::find($request->message_id),
                    ],
                ];
            } else {
                $this->data = [
                    'status' => false,
                    'message' => 'Something went wrong',
                ];
            }
        }
        return response()->json($this->data);
    }
}
