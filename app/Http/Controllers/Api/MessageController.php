<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct(
        protected MessageService $messageService
    ) {}

    /**
     * Get contact list
     * 
     * @var Illuminate\Http\Request
     */
    public function getConactList( Request $request ): JsonResponse
    {
        $this->data = [
            'status' => true,
            'data' => [
                'contacts' => $this->messageService->getContactList( $request ),
            ],
        ];

        return response()->json($this->data);
    }

    /**
     * Get facility users based on type
     * 
     * @var Illuminate\Http\Request $request type > leave empty for get all
     */
    public function getFacilityUsers( Request $request ): JsonResponse
    {
        $users = User::getFacilityUsers( $request->type );

        $this->data = [
            'status'=> true,
            'data' => [
                'facilityUsers' => $users,
            ],
        ];
        return response()->json($this->data);
    }

    public function storeCompose( Request $request ): JsonResponse
    {
        $message = $this->messageService->storeCompose($request);
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

        return response()->json($this->data);
    }

    public function showUserChat( Request $request ): JsonResponse
    {
        $messages = $this->messageService->getUserChats( $request );
        $this->data = [
            'status' => true,
            'data' => [
                'messages' => $messages,
            ],
        ];

        return response()->json($this->data);
    }

    public function sendNewMessage( Request $request ): JsonResponse
    {
        $message = $this->messageService->storeMessage( $request );

        $this->data = [
            'status' => true,
            'data' => [
                'message' => $message,
            ],
        ];

        return response()->json($this->data);
    }

}
