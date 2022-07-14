<?php

namespace Database\Seeders;

use App\Models\Residents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residents = [
            [
                'id' => '1',
                'firstname' => 'adminF',
                'middlename' => 'adminM',
                'lastname' => 'adminL',
                'email' => 'admin@admin.admin',
                'gender' => 'Male',
                'isVoter' => 'true',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'firstname' => 'sampleResidentF2',
                'middlename' => 'sampleResidentM2',
                'lastname' => 'sampleResidentL12',
                'email' => 'sampleResident2@gmail.com',
                'gender' => 'Female',
                'isVoter' => 'true',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'firstname' => 'sampleResidentF3',
                'middlename' => 'sampleResidentM3',
                'lastname' => 'sampleResidentL3',
                'email' => 'sampleResident3@gmail.com',
                'gender' => 'Male',
                'isVoter' => 'false',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Residents::insert($residents);
    }
}