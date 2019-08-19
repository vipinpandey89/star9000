<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecurrenceAppointment extends Model
{
    //
          protected $table = 'recurrence_appointment';

          public $fillable = [
        					'recurrence_type',
        					'start_date',
                            'end_date'
    					];

}
