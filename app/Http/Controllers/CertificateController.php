<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\SystemSetting;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function requests()
    {
        return view('certificate.requests');
    }

    public function types()
    {
        return view('certificate.types');
    }

    public function print($certyficateType, $userID)
    {
        $barangay_captain = User::getBarangayCaptain();

        $user = User::findOrFail($userID);

        $certificate = Certificate::where('type', $certyficateType)->firstOrFail();
        
        $systemSetting = SystemSetting::first();;

        $dateToday = Carbon::now()->toDateString();

        // to view template without downloading
        // return view('certificate.certificates-layout.certOfResidency', compact('user', 'certificate', 'systemSetting', 'barangay_captain', 'dateToday'));

        $pdf = PDF::loadview('certificate.certificates-layout.'.$certificate->filename, compact('user', 'certificate', 'systemSetting', 'barangay_captain', 'dateToday'));

        return $pdf->download('certiicate.pdf');
    }
}
