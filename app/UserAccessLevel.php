<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccessLevel extends Model
{
    protected $table = 'user_access_level';
    protected $fillable = ['user_id','access_level'];
}
