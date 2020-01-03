<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependant extends Model
{
    //
    protected $fillable = [
        'user_id',
        'dependant_number',
        'name',
        'gender',
        'relationship',
        'updated_by',
        'updated_at',
    ];
}
