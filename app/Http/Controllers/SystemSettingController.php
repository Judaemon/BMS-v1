<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use App\Http\Requests\UpdateSysSettingRequest;

class SystemSettingController extends Controller
{
    public function index()
    {
        $system_setting = SystemSetting::first();

        return view('system_setting.index', compact('system_setting'));
    }
}
