<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
          protected $table = 'doctors';

          public $fillable = [
        					'userId',
        					'examination_id',
                            'start_time',
                            'end_time',
                            'weekdays_id'    	
    					];

}
