<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
          protected $table = 'patients';

          public $fillable = [
        					'email',
                            'name',
                            'phone',
                            'added_by',
                            'updated_by'  	
    					];

}
