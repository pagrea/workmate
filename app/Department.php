<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = [
        'DepartmentName',
        'DepartmentDescription',
        'UpdatedBy',
        'updated_at',
    ];
}
