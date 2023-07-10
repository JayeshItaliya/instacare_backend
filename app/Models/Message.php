<?php

namespace App\Models;

use App\Models\MessageContact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Message extends Model
{
    use HasFactory;

    public const TYPE_APP = 'app';
    public const TYPE_EMAIL = 'email';
    public const TYPE_TEXT = 'text';
    public const TYPE_BOTH = 'both';

    protected $fillable = [
        'sender_id', 'receiver_id', 'type', 'message', 'has_media', 'read_at',
    ];

    protected $casts = [
        'has_media' => 'boolean',
        'read_at' => 'timestamp',
    ];

    /* Accesser */
    public function getTypeAttribute($value): string
    {
        switch ( $value ) {
            case self::TYPE_APP:
                return 'App';
                break;

            case self::TYPE_EMAIL:
                return 'Email';
                break;

            case self::TYPE_TEXT:
                return 'Text';
                break;

            case self::TYPE_BOTH:
                return 'Both';
                break;
        }
    }

    /* Static Methods */

    public static function storeText( Request $request, $user )
    {
        return static::saveMessage( $request, self::TYPE_TEXT, $user );
    }

    public static function storeEmail( Request $request, $user )
    {
        return static::saveMessage( $request, self::TYPE_EMAIL, $user );
    }

    public static function storeBoth( Request $request, $user )
    {
        return static::saveMessage( $request, self::TYPE_BOTH, $user );
    }

    private static function saveMessage( Request $request, $type, $senderUser ): Message
    {
        $message = static::create([
            'sender_id' => $senderUser->id,
            'receiver_id' => $request->receiver_id,
            'type' => $type,
            'message' => $request->message,
        ]);

        // create / update contact detail for sender user
        $senderUser->contacts()->updateOrCreate(
            [ 'user_id' => $senderUser->id, 'receiver_id' => (int) $request->receiver_id ],
            [ 'message_id' => $message->id ]
        );

        // create / update contact detail for receiver user
        $receiverUser = User::find($request->receiver_id);
        $receiverUser->contacts()->updateOrCreate(
            [ 'user_id' => $receiverUser->id, 'receiver_id' => $senderUser->id ],
            [ 'message_id' => $message->id ]
        );

        return $message;
    }

    /* Relationships */

    public function media(): HasMany
    {
        return $this->hasMany(MessageMedia::class);
    }

    public function messageContacts(): HasMany
    {
        return $this->hasMany(MessageContact::class, 'message_id', 'id');
    }
}
