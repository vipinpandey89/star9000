<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
          protected $table = 'patients';

          public $fillable = [
        					'email',
                            'surname',
                            'name',
                            'phone',
                            'dob',
                            'minor_patient',
                            'description',
                            'relative_info',
                            'privacy',
                            'sex',
                            'added_by',
                            'document',
                            'profession',
                            'address',
                            'postal_code',
                            'telephone',
                            'nationality',
                            'pec',
                            'place_of_birth',
                            'province_of_birth',
                            'fiscal_code',
                            'place_of_living',
                            'province_of_living',
                            'number_of_the_address',
                            'privacy_agreement_date',
                            'updated_by',
                            'patient_signature'
    					];

}
