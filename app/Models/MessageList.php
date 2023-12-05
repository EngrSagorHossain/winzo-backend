<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageList extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_code',
        'sender_id',
        'receiver_id',
    ];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
