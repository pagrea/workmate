<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hrs_departments extends Model
{
    //
    protected $fillable = [
        'DepartmentName',
        'DepartmentDescription',
        'UpdatedBy',
        'updated_at',
    ];
}
