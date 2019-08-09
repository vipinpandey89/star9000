<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
          protected $table = 'patients';

          public $fillable = [
        					'appointment_id',
        					'email',
                            'name',
                            'phone',
                            'added_by',
                            'updated_by'  	
    					];

}
