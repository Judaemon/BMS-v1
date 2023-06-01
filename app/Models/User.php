<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'password',
        'telephone_no',
        'address_1',
        'address_2',
        'house_no',
        'prk_area',

        'pag_ibig',
        'philhealth',
        'sss',
        'tin',

        'barangay_position',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // one to many relationship
    public function certificateRequests()
    {
        return $this->hasMany(CertificateRequest::class);
    }

    public function age()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    public static function getBarangayCaptain()
    {
        // $user = User::findOrFail($userID);

        return User::where('barangay_position', '=', 'Barangay Captain')->first();
    }
}
