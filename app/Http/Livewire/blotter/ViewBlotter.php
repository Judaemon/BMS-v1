<?php

namespace App\Http\Livewire\Blotter;

use App\Models\Blotter;
use LivewireUI\Modal\ModalComponent;

class ViewBlotter extends ModalComponent
{
    public Blotter $blotter;

    protected $rules = [
        'blotter.status' => 'required',
        'blotter.incident_type' => 'required',
        'blotter.incident_location' => 'required',
        'blotter.incident_date_time' => 'required',
        'blotter.reported_date_time' => 'required',
        'blotter.meeting_schedule_date_time' => 'required',
        'blotter.incident_narrative' => 'required',
    ];

    public function mount(Blotter $blotter)
    {
        $this->blotter = $blotter;
    }

    public function render()
    {
        // echo '<pre>'; print_r($this->blotter); echo '</pre>';   
        return view('livewire.blotter.view-blotter');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
