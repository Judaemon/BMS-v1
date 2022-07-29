<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'birthday',
        'birth_place',
        'gender',
        'weight',
        'height',
        'civil_status',
        'citizenship',
        'isVoter',
        'father',
        'mother',
        'spouse',
        'mobile_no',
        'email',
        'telephone_no',
        'address_1',
        'address_2',
        'house_no',
        'prk_area',
        'pag_ibig',
        'philhealth',
        'sss',
        'tin',
    ];
}
