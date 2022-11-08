<?php

namespace App\Http\Livewire\Blotter;

use App\Models\Blotter;
use LivewireUI\Modal\ModalComponent;

class EditBlotter extends ModalComponent
{
    public Blotter $blotter;

    // user role for pivot table. used as reference in adding??

    public string $role;

    protected $rules = [
        'blotter.status' => 'required',
        'blotter.incident_type' => 'required',
        'blotter.incident_location' => 'required',
        'blotter.reported_date_time' => 'required',
        'blotter.incident_narrative' => 'required',
    ];

    protected $listeners = [
        'selectedUser',
    ];

    public function mount(Blotter $blotter)
    {
        $this->blotter = $blotter;
    }
    
    public function render()
    {
        return view('livewire.blotter.edit-blotter');
    }

    public function submit()
    {
        // Editing users workds but narrative not saving after submit!!
        $this->blotter->save();

        // foreach ($this->residents as $resident) {
        //     if (!empty($resident['resident_id'])) {
        //         $blotter->residents()->attach($resident['resident_id'],
        //             ['role' => $resident['role'], 'narrative' => $resident['narrative']]);
        
        //     }
        // }

        // dd($this->blotter);

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-BlotterTable')
        ]);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Blotter Added',
            'text' => 'Blotter Succesfully Added',
            'icon' => 'success',
        ]);
    }
    public function selectedUser($userData)
    {
        $this->blotter->users()->attach(
            $userData['user_id'], 
            [
                'role' => $this->role,
            ]
        );

        $this->blotter = Blotter::where('id', $this->blotter['id'])
        ->with('users')
        ->first();

        $this->closeModal();
    }
    
    public function addComplainant()
    {
        $this->role = 'Complainant';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function addVictim()
    {
        $this->role = 'Victim';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function addAttacker()
    {
        $this->role = 'Attacker';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function addRespondent()
    {
        $this->role = 'Respondent';

        $this->emit('openModal', 'user.select-user-modal');
    }

    public function removeComplainant($index)
    {
        $complanantPivotData = $this->blotter->users[$index]->pivot;
        
        $this->blotter->users()
            ->wherePivot('user_id', '=', $complanantPivotData['user_id'])
            ->wherePivot('role', '=', $complanantPivotData['role'])
            ->wherePivot('narrative', '=', $complanantPivotData['narrative'])
            ->wherePivot('created_at', '=', $complanantPivotData['created_at'])
            ->detach();

        $this->blotter = Blotter::where('id', $this->blotter['id'])
        ->with('users')
        ->first();
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
