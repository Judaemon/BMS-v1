<?php
use App\Models\SystemSetting;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

function SystemSetting($key){
    $settings = Cache::rememberForever('settings', function (){
        return SystemSetting::first();
    });

    return $settings->{$key};
}

function getBarangayCaptain(){
    $captain_name = Cache::rememberForever('captain_name', function (){
        $captain_name = User::select('firstname', 'lastname')
                ->where('barangay_position', 'Barangay Captain')
                ->first();
        
        $captain_name = $captain_name->firstname.' '.$captain_name->firstname;
        
        return $captain_name;
    });

    return $captain_name;
}

function getKagawads(){
    $kagawads = Cache::rememberForever('kagawads', function (){
        return User::select('firstname', 'lastname')
            ->where('barangay_position', 'Kagawads')
            ->get();
    });

    return $kagawads;
}

function getSecretary(){
    $secretary_name = Cache::rememberForever('secretary_name', function (){
        $secretary_name = User::select('firstname', 'lastname')
            ->where('barangay_position', 'Secretary')
            ->first();

        $secretary_name = $secretary_name->firstname.' '.$secretary_name->firstname;

        return $secretary_name;
    });

    return $secretary_name;
}

function getTreasurer(){
    $treasurer_name = Cache::rememberForever('treasurer_name', function (){
        $treasurer_name =  User::select('firstname', 'lastname')
            ->where('barangay_position', 'Treasurer')
            ->first();

        $treasurer_name = $treasurer_name->firstname.' '.$treasurer_name->firstname;

        return $treasurer_name;
    });

    return $treasurer_name;
}