<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function print(Request $request)
    {
        // return view('certificate.certificates-layout.certOfResidency');

        $pdf = PDF::loadview('certificate.certificates-layout.certOfResidency');

            // setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
        return $pdf->download('certiicate.pdf');
    }
}
