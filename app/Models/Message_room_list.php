<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message_room_list extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_pear',
        'sender_id',
        'receiver_id',
    ];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
