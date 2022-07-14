<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residents extends Model
{
    use HasFactory;

    protected $fillable=[
                        'lastname',
                        'middlename',
                        'firstname',
                        'birthday',
                        'gender',
                        'civilstatus',
                        'voterstatus',
                        'birth_of_place',
                        'alias',
                        'citizenship',
                        'telephone_no',
                        'mobile_no',
                        'height',
                        'weight',
                        'PAG_IBIG',
                        'PHILHEALTH',
                        'SSS',
                        'TIN',
                        'email',
                        'spouse',
                        'father',
                        'mother',
                        'area',
                        'address_1',
                        'address_2'
        ];
}
