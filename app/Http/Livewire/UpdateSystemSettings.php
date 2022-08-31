<?php

namespace App\Http\Livewire;

use App\Models\SystemSetting;
use Livewire\Component;

class UpdateSystemSettings extends Component
{
    public SystemSetting $system_setting;

    protected function rules()
    {
        return [
            'system_setting.barangay' => ['required', 'string'],
            // 'system_setting.barangay_logo' => ['required', 'string'],
            'system_setting.barangay_phone' => ['required', 'string'],
            'system_setting.barangay_email' => ['required', 'string'],
            'system_setting.province' => ['required', 'string'],
            'system_setting.municipality_city' => ['required', 'string'],
        ];
    }

    public function mount()
    {
        $system_setting = SystemSetting::first();

        $this->system_setting = $system_setting;
    }

    public function render()
    {
        return view('livewire.update-system-settings');
    }

    public function submit()
    {
        $this->validate();

        $this->system_setting->save();

        cache()->forget('settings');
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'System Setting Updated',
            'text' => 'Refresh the page to see changes take effect',
            'icon' => 'success',
        ]);
    }
}
