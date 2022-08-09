<?php

namespace App\Http\Livewire\Blotter;

use App\Models\Blotter;
use App\Models\Resident;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class EditBlotter extends ModalComponent
{
    public int $blotter_id;
    public Blotter $blotter;

    // resident role for pivot table. used as reference in adding

    public string $role;

    protected $rules = [
        'blotter.status' => 'required',
        'blotter.incident_type' => 'required',
        'blotter.incident_location' => 'required',
        'blotter.reported_date_time' => 'required',
        'blotter.incident_narrative' => 'required',
    ];

    protected $listeners = [
        'residentSelected' => 'setResidentID',
        'addInvolvedResident',
    ];

    public function mount($blotter_id)
    {
        $this->blotter_id = $blotter_id;
        
        $this->blotter = Blotter::where('id', $blotter_id)
        ->with('residents:firstname,lastname')
        ->first();
    }
    
    public function render()
    {
        // $this->blotter['incident_location'] = Carbon::now()->format('Y-m-d');
        return view('livewire.blotter.edit-blotter');
    }

    public function submit()
    {
        $this->blotter->save();

        // foreach ($this->residents as $resident) {
        //     if (!empty($resident['resident_id'])) {
        //         $blotter->residents()->attach($resident['resident_id'],
        //             ['role' => $resident['role'], 'narrative' => $resident['narrative']]);
        
        //     }
        // }

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-BlotterTable')
        ]);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blotter Added',
            'text' => 'Blotter Succesfully Added',
            'icon' => 'success',
        ]);
    }
    public function addInvolvedResident($residentData)
    {
        $this->blotter->residents()->attach(
            $residentData['resident_id'], 
            [
                'role' => $this->role,
            ]
        );

        $this->blotter = Blotter::where('id', $this->blotter_id)
        ->with('residents')
        ->first();

        $this->closeModal();
    }
    
    public function addComplainant()
    {
        $this->role = 'Complainant';

        $this->emit('openModal', 'select-resident');
    }

    public function addVictim()
    {
        $this->role = 'Victim';

        $this->emit('openModal', 'select-resident');
    }

    public function addAttacker()
    {
        $this->role = 'Attacker';

        $this->emit('openModal', 'select-resident');
    }

    public function addRespondent()
    {
        $this->role = 'Respondent';

        $this->emit('openModal', 'select-resident');
    }

    public function removeComplainant($index)
    {
        $complanantPivotData = $this->blotter->residents[$index]->pivot;
        
        $this->blotter->residents()
            ->wherePivot('resident_id', '=', $complanantPivotData['resident_id'])
            ->wherePivot('role', '=', $complanantPivotData['role'])
            ->wherePivot('narrative', '=', $complanantPivotData['narrative'])
            ->wherePivot('created_at', '=', $complanantPivotData['created_at'])
            ->detach();

        $this->blotter = Blotter::where('id', $this->blotter_id)
        ->with('residents')
        ->first();
    }

    public static function modalMaxWidth(): string
    {
        // 'sm'  => 'sm:max-w-sm',
        // 'md'  => 'sm:max-w-md',
        // 'lg'  => 'sm:max-w-md md:max-w-lg',
        // 'xl'  => 'sm:max-w-md md:max-w-xl',
        // '2xl' => 'sm:max-w-md md:max-w-xl lg:max-w-2xl',
        // '3xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl',
        // '4xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-4xl',
        // '5xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl',
        // '6xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-6xl',
        // '7xl' => 'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl',
        return '7xl';
    }
}
