<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

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
        'LeaveBalance',
        'Nationality',
        'NationalIDNum',
        'BirthCertificateNum',
        'CurrentStatus',
        'Department',
        'AbsorbedInNIMR',
        'UserRole',
        'email',
        'OtherEmail',
        'PhoneNumber',
        'EmegencyContantPerson',
        'EmegencyContactNumber',
        'StaffCurrentAddress',
        'StaffHomeAddress',
        'UpdatedBy',
        'updated_at',
        'password'
    ];

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
