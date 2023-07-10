<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id', 'type', 'path', 'size',
    ];

    /* Relationships */

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
