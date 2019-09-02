<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentBooking extends Model
{
    //
     protected $table = 'appointement_booking';

          public $fillable = [
        					'doctro_name',
        					'examination_id',
                            'room_id',
                            'patient_id',
                            'starteTime',
                            'endtime',
                            'start_date',
                            'end_date',
                            'str_starttime',
                            'str_endtime',
                            'str_startdate',
                            'str_enddate',
                            'examination_color',
                            'is_cancel',
                            'recurrence'    	
    					];
    					
}
