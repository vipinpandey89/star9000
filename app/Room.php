<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

     protected $table = 'room';

      public $fillable = [
					        'room_name',    
					        'room_color',
					        'examination_type'	
					    ];


}
