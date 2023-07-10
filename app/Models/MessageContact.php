<?php

namespace App\Models;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'receiver_id', 'message_id',
    ];

    /* Relationships */

    public function ownContact(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function receiverContact(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function receiverContactApi(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id')->select([
            'id', 'fname', 'lname', 'image', 
        ]);
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
