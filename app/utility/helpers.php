<?php
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Cache;

function SystemSetting($key){
    $settings = Cache::rememberForever('settings', function (){
        return SystemSetting::first();
    });

    return $settings->{$key};
}