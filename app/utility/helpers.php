<?php

use App\Models\CertificateRequest;
use App\Models\SystemSetting;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

// also includes vision, mission, and pledge
function SystemSetting($key){
    $settings = Cache::rememberForever('settings', function (){
        return SystemSetting::first();
    });

    return $settings->{$key};
}

// Welcome page 
function getBarangayCaptain(){
    $captain = Cache::rememberForever('captain', function (){
        $captain = User::select('firstname', 'lastname', 'barangay_position')
                ->where('barangay_position', 'Barangay Captain')
                ->first();
        
        if (empty($captain->firstname)) {
            return null;
        }

        $captain_name = $captain->firstname.' '.$captain->firstname;
        
        return ['name' => $captain_name, 'barangay_position' => $captain->barangay_position];
    });

    // dd($captain['name']);

    return $captain;
}

function getKagawads(){
    $kagawads = Cache::rememberForever('kagawads', function (){
        return User::select('firstname', 'lastname', 'barangay_position')
            ->where('barangay_position', 'Kagawads')
            ->get();
    });

    
    if ($kagawads->isEmpty()) {
        return null;
    }
    
    return $kagawads;
}

function getSecretary(){
    $secretary = Cache::rememberForever('secretary', function (){
        $secretary = User::select('firstname', 'lastname', 'barangay_position')
            ->where('barangay_position', 'Secretary')
            ->first();

        if (empty($secretary->firstname)) {
            return null;        
        }
        
        $secretary_name = $secretary->firstname.' '.$secretary->firstname;

        return ['name' => $secretary_name, 'barangay_position' => $secretary->barangay_position];
    });

    return $secretary;
}

function getTreasurer(){
    $treasurer = Cache::rememberForever('treasurer', function (){
        $treasurer =  User::select('firstname', 'lastname', 'barangay_position')
            ->where('barangay_position', 'Treasurer')
            ->first();

        if (empty($treasurer->firstname)) {
            return null;
        }
        
        $treasurer_name = $treasurer->firstname.' '.$treasurer->firstname;

        return ['name' => $treasurer_name, 'barangay_position' => $treasurer->barangay_position];
    });

    return $treasurer;
}

// Dashboard page
function dashbaord($key){
    $settings = Cache::rememberForever('settings', function (){
        return SystemSetting::first();
    });

    return $settings->{$key};
}

function getRegisteredResident(){
    $registeredResident = Cache::remember('registeredResident', 1000, function (){
        return User::count();
    });

    return $registeredResident;
}

function getCertificateRequestCount(){
    $certReqcount = Cache::remember('certReqcount', 1000, function (){
        return CertificateRequest::count();
    });

    return $certReqcount;
}

function voterCount(){
    $voterCount = Cache::remember('voterCount', 1000, function (){
        return User::where('isVoter', 1)->count();
    });

    return $voterCount;
}

function maleResidentCount(){
    $maleResidentCount = Cache::remember('maleResidentCount', 1000, function (){
        return User::where('gender', 'Male')->count();
    });

    return $maleResidentCount;
}

function femaleResidentCount(){
    $femaleResidentCount = Cache::remember('femaleResidentCount', 1000, function (){
        return User::where('gender', 'Female')->count();
    });

    return $femaleResidentCount;
}