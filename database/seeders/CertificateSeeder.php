<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run()
    {
        $certificates = [
            [
                'type' => 'Certificate of Residence',
                'office' => 'Barangay Captain',
                'filename' => 'certOfResidency',
            ],
        ];

        Certificate::insert($certificates);
    }
}
