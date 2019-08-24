<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hrs_3staffaddress extends Model
{
    //
    protected $fillable = [
        'EmployeeID',
        'StaffCurrentAddress',
        'StaffHomeAddress',
        'HomeRegion',
        'HomeDistrict',
        'StaffTelephone1',
        'StaffTelephone2',
        'StaffTelephone3',
        'StaffEmail1',
        'StaffEmail2',
        'EmegencyContantPerson',
        'EmegencyContactNumber',
        'UpdatedBy',
        'updated_at',
    ];

    public function userdata(){

        return $this->belongsTo('App\User');
    }
}
