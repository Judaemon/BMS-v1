<?php

namespace App\Http\Livewire\Resident;

use App\Models\Resident;
use LivewireUI\Modal\ModalComponent;

class EditResident extends ModalComponent
{
    public Resident $resident;

    protected $rules = [
        'resident.firstname' => 'Required',
        'resident.middlename' => 'Required',
        'resident.lastname' => 'Required',
        'resident.suffix' => '',
        'resident.birthday' => 'Required',
        'resident.birth_place' => 'Required',
        'resident.gender' => 'Required',
        'resident.weight' => 'Required',
        'resident.height' => 'Required',
        'resident.civil_status' => 'Required',
        'resident.citizenship' => 'Required',
        'resident.isVoter' => 'Required',
        'resident.father' => '',
        'resident.mother' => '',
        'resident.spouse' => '',
        'resident.mobile_no' => 'Required',
        'resident.email' => 'Required',
        'resident.telephone_no' => '',
        'resident.address_1' => 'Required',
        'resident.address_2' => '',
        'resident.house_no' => 'Required',
        'resident.prk_area' => 'Required',
        'resident.pag_ibig' => '',
        'resident.philhealth' => '',
        'resident.sss' => '',
        'resident.tin' => '',
    ];
    
    public function mount($id)
    {
        // $this->resident = Resident::find($id, '*');
        // dd($test);
        $this->resident = Resident::where('id', $id)->first();
        // $this->resident = $resident;
    }

    public function render()
    {
        return view('livewire.resident.edit-resident');
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

    public function submit()
    {
        // Validate

        $this->resident->save();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-ResidentTable')
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Resident Added',
            'text' => 'Resident Succesfully Added',
            'icon' => 'success',
        ]);
    }
}
