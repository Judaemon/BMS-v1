<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class AddUser extends ModalComponent
{
    public $genders = [
        'Placeholder' => 'Select gender', 
        'Male' => 'Male', 
        'Female' => 'Female', 
        'Other' => 'Other'
    ];

    public $civil_statuses = [
        'Placeholder' => 'Select civil status', 
        'Single' => 'Single',
        'Married' => 'Married',
        'Widowed' => 'Widowed',
        'Divorced' => 'Divorced',
        'Separated' => 'Separated',
    ];

    public $isVoter_choice = [
        'null' => 'Select voter status', 
        true => 'Voter', 
        false => 'Non-voter',
    ];
    
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
    public $password;
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
    public $barangay_position;

    protected $rules = [
        'firstname' => ['required'],
        'middlename' => ['required'],
        'lastname' => ['required'],
        'suffix' => [''],
        'birthday' => ['required', 'date'],
        'birth_place' => ['required'],
        'gender' => ['required', 'in:Male,Female,Other'],
        'weight' => ['required', 'integer'],
        'height' => ['required', 'integer'],
        'civil_status' => ['required', 'in:Single,Married,Widowed,Divorced,Separated'],
        'citizenship' => [],
        'isVoter' => ['required', 'boolean'],
        'father' => ['required'],
        'mother' => ['required'],
        'spouse' => ['required_if:civil_status,==,Married',],
        'mobile_no' => ['required'],
        'email' => ['required', 'email', 'unique:users'],
        'telephone_no' => ['required'],
        'address_1' => ['required'],
        'address_2' => [''],
        'house_no' => ['required', 'integer'],
        'prk_area' => ['required'],
        'pag_ibig' => [],
        'philhealth' => [],
        'sss' => [],
        'tin' => [],
    ];

    public function render()
    {
        return view('livewire.user.add-user');
    }

    public function submit()
    {
        $this->validate();

        $password = strtolower(mb_substr($this->firstname, 0, 1, 'utf-8').'.'.$this->lastname);

        User::create([
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
            'password' => Hash::make($password),
            'telephone_no'  => $this->telephone_no,
            'address_1'  => $this->address_1,
            'address_2'  => $this->address_2,
            'house_no'  => $this->house_no,
            'prk_area'  => $this->prk_area,
            
            'pag_ibig'  => $this->pag_ibig,
            'philhealth'  => $this->philhealth,
            'sss'  => $this->sss,
            'tin'  => $this->tin,
        ])->assignRole('Resident');

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-UserTable')
        ]);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'User Added',
            'text' => 'User Succesfully Added',
            'icon' => 'success',
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
