<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EmployeeID',
        'FirstName',
        'LastName',
        'Dob',
        'Gender',
        'JobTitle', 
        'DateOfEmployment',
        'DateOfLastPromotion',
        'MaritalStatus',
        'EntitledLeaveDays',
        'Nationality',
        'NationalIDNum',
        'BirthCertificateNum',
        'CurrentStatus',
        'PayrollDepartment',
        'AbsorbedInNIMR',
        'email',
        'password'
    ];

    public function staffaddress(){
        return $this->hasMany('App\Hrs_3staffaddress','EmployeeID');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
