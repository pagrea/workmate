<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaverequest extends Model
{
    //
    protected $fillable = [
        'EmployeeID',
        'DepartmentID',
        'RequestDate',
        'StartDate',
        'DaysRequested',
        'EndDate',
        'TypeOfLeave',
        'Substitute',
        'ContactTelephone',
        'RequestStatus',
        'DaysApproved',
        'UpdatedBy',
        'updated_at',
        'created_at'
    ];
}
