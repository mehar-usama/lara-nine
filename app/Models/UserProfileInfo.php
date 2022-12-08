<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileInfo extends Model
{
    use HasFactory;
    protected $table = 'user_profile_info';
    public $timestamps = false;
}
