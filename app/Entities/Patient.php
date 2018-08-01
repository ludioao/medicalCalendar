<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'patients';

    protected $fillable = [
        'name',
        'address',
        'document',
        'birth_date',
        'phone',
    ];

    public const UPDATE_RULES = [];

    // Rules to save Patient.
    public const STORE_RULES = [
        'name' => 'required|min:3|max:255',
        'address' => 'nullable|max:255',
        'document' => 'nullable|numeric',
        'birth_date' => 'required|date',
        'phone' => 'nullable|max:255',
    ];

}
