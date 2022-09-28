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
                
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim corporis animi ut ratione sit hic in necessitatibus fuga quia possimus? Odio et illo nihil inventore debitis cupiditate quibusdam omnis, est ducimus perferendis reiciendis numquam vero nulla architecto molestias deleniti voluptates quod quos nam consectetur. Non eius quos at dolores facilis!',
                'vision' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam accusantium sunt laudantium, nesciunt ipsa tempora rem hic quos eligendi dignissimos ducimus tenetur ut, vero, commodi reprehenderit corporis sapiente. Consequatur, amet.',
                'mission' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero quae ea rerum quis nostrum laboriosam vel distinctio quidem asperiores nemo consequatur, tenetur dignissimos excepturi officia perferendis pariatur aperiam, aspernatur repudiandae reiciendis. Consectetur nobis laudantium architecto?',
                'pledge' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus quasi provident suscipit animi, iusto doloremque maiores repellat molestiae itaque, at cumque debitis consectetur. Ipsa iusto pariatur repellat hic nisi id, itaque unde, aliquam natus minus quae, quasi consequuntur sint?',
                
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
