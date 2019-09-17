<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Managepatient extends Model
{
    protected $table = 'managepatient';
    protected $fillable = ['manage_date','first','second','third','fourth','fifth'];
}
