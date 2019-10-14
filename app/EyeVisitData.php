<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EyeVisitData extends Model
{
    protected $table = 'eye_visit_data';
    protected $fillable = ['appointment_id','eye_visit'];
}
