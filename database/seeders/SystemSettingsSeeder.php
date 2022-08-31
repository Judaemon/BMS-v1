<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $system_setting = [
            [
                'id' => '1',

                'barangay' => 'BMS Demo',
                'barangay_logo' => 'public\images\mitacor_logo.png',        
                'barangay_phone' => '09123456789',
                'barangay_email' => 'bmsdemo@gmail.com',
                
                'province' => 'Benguet',
                'municipality_city' => 'Baguio City',
                
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        SystemSetting::insert($system_setting);
    }
}
