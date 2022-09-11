<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'firstname' => 'Super Admin',
            'lastname' => 'Super Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('sadmin'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Super Admin');

        User::create([
            'id' => '2',
            'firstname' => 'sampleResidentF1',
            'middlename' => 'sampleResidentM1',
            'lastname' => 'sampleResidentL1',
            'email' => 'sampleResident1@gmail.com',
            'password' => Hash::make('user'),
            'gender' => 'Male',
            'isVoter' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Resident');

        User::create([
            'id' => '3',
            'firstname' => 'sampleResidentF2',
            'middlename' => 'sampleResidentM2',
            'lastname' => 'sampleResidentL12',
            'email' => 'sampleResident2@gmail.com',
            'password' => Hash::make('user'),
            'gender' => 'Female',
            'isVoter' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Resident');

        User::create([
            'id' => '4',
            'firstname' => 'sampleResidentF3',
            'middlename' => 'sampleResidentM3',
            'lastname' => 'sampleResidentL3',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'gender' => 'Male',
            'isVoter' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Resident');
    }
}
