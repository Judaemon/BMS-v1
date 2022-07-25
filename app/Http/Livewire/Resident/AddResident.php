<?php

namespace App\Http\Livewire\Resident;

use Carbon\Carbon;
use App\Models\Resident;

use LivewireUI\Modal\ModalComponent;

class AddResident extends ModalComponent
{
    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $birthday;
    public $birth_place;
    public $gender;
    public $weight;
    public $height;
    public $civil_status;
    public $citizenship;
    public $isVoter;
    public $father;
    public $mother;
    public $spouse;
    public $mobile_no;
    public $email;
    public $telephone_no;
    public $address_1;
    public $address_2;
    public $house_no;
    public $prk_area;
    public $pag_ibig;
    public $philhealth;
    public $sss;
    public $tin;
    public $date_registered;

    public function render()
    {
        return view('livewire.resident.add-resident');
    }

    public function submit()
    {
        // dd($this->firstname);
        // dd($this->isVoter);
        Resident::create([
            'firstname'  => $this->firstname,
            'middlename'  => $this->middlename,
            'lastname'  => $this->lastname,
            'suffix'  => $this->suffix,
            'birthday'  => $this->birthday,
            'birth_place'  => $this->birth_place,
            'gender'  => $this->gender,
            'weight'  => $this->weight,
            'height'  => $this->height,
            'civil_status'  => $this->civil_status,
            'citizenship'  => $this->citizenship,
            'isVoter'  => $this->isVoter,
            'father'  => $this->father,
            'mother'  => $this->mother,
            'spouse'  => $this->spouse,
            'mobile_no'  => $this->mobile_no,
            'email'  => $this->email,
            'telephone_no'  => $this->telephone_no,
            'address_1'  => $this->address_1,
            'address_2'  => $this->address_2,
            'house_no'  => $this->house_no,
            'prk_area'  => $this->prk_area,
            'pag_ibig'  => $this->pag_ibig,
            'philhealth'  => $this->philhealth,
            'sss'  => $this->sss,
            'tin'  => $this->tin,
            'date_registered'  => Carbon::now()->format('d-m-Y H:i:s'),
        ]);

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-ResidentTable')
        ]);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Resident Added',
            'text' => 'Resident Succesfully Added',
            'icon' => 'success',
        ]);
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
