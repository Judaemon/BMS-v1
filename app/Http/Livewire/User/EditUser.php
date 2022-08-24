<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
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

    public User $user;

    // rules function because of dynamic checking of unique email
    // https://laracasts.com/discuss/channels/livewire/livewire-update-validation-on-unique-field 
    protected function rules()
    {
        return [
            'user.firstname' => ['required'],
            'user.middlename' => ['required'],
            'user.lastname' => ['required'],
            'user.suffix' => [''],
            'user.birthday' => ['required', 'date'],
            'user.birth_place' => ['required'],
            'user.gender' => ['required', 'in:Male,Female,Other'],
            'user.weight' => ['required', 'integer'],
            'user.height' => ['required', 'integer'],
            'user.civil_status' => ['required', 'in:Single,Married,Widowed,Divorced,Separated'],
            'user.citizenship' => [],
            'user.isVoter' => ['required', 'boolean'],
            'user.father' => ['required'],
            'user.mother' => ['required'],
            'user.spouse' => ['required_if:user.civil_status,==,Married',],
            'user.mobile_no' => ['required'],
            'user.email' => ['required', 'email', 'unique:users,email,'.$this->user->id],
            'user.telephone_no' => ['required'],
            'user.address_1' => ['required'],
            'user.address_2' => [''],
            'user.house_no' => ['required', 'integer'],
            'user.prk_area' => ['required'],
            'user.pag_ibig' => [],
            'user.philhealth' => [],
            'user.sss' => [],
            'user.tin' => [],        
        ];
    }
    
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.edit-user');
    }

    public function submit()
    {
        $this->validate();

        $this->user->save();

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-UserTable')
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'User Saved',
            'text' => 'User Succesfully edited',
            'icon' => 'success',
        ]);
    }

    public function resetPassword()
    {
        $default_password = strtolower(mb_substr($this->user['firstname'], 0, 1, 'utf-8').'.'.$this->user['lastname']);

        $this->user['password'] = Hash::make($default_password);

        $this->user->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'User password reset succesfully',
            'icon' => 'success',
        ]);
    }
    
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
