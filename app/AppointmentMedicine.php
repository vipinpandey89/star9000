<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentMedicine extends Model
{
	protected $table = 'appointment_medicine';
	public $fillable = [
        					'appointment_id',
        					'medicine'
    					];
}
