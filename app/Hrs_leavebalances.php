<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hrs_leavebalances extends Model
{
    //
    protected $fillable = [
        'EmployeeID',
        'UpdatedBy',
        'updated_at',
        'Balance',
    ];
}
