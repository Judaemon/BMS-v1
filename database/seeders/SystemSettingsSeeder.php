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
                'barangay' => 'BMS Demo',
                'address' => 'BMS Demo',
                'logo' => 'public\images\mitacor_logo.png',        
                
                'isprovince' => '1',
                'province_municipality' => 'Benguet',
                'province_municipality_logo' => 'public\images\mitacor_logo.png',
                
                'city' => 'Baguio City',
                
                'barangay_phone' => '09123456789',
                'barangay_email' => 'bmsdemo@gmail.com',
                
                'facebook' => 'facebook.com',
                'twitter' => 'twitter.com',
                'instagram' => 'instagram.com',
                'youtube' => 'youtube.com',
                
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        SystemSetting::insert($system_setting);
    }
}
