<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveUser extends Model
{
    use HasFactory;
    protected $fillable = ['uid', 'full_name', 'coins', 'profile_image'];
}
