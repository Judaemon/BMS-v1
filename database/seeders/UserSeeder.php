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
        $users = [
            [
                'id' => '1',
                'resident_id' => '1',
                'account_type' => 'admin',
                'firstname' => 'adminf',
                'lastname' => 'adminl',
                'email' => 'admin@admin.admin',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => Hash::make('admin'),
                'remember_token' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        
        User::insert($users);
    }
}
