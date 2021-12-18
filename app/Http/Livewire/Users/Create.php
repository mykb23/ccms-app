<?php

namespace App\Http\Livewire\Users;

use App\Actions\Fortify\CreateNewUser;
use App\Models\Role;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $password, $password_confirmation, $user_role = [];
    public $openModal = false;

    protected $rules = [
        'name' => ['required', 'min:3', 'max:255'],
        'email' => ['required', 'email', 'unique:users', 'max:255'],
        'password' => ['required', 'min:8', 'max:255',],
        'user_role' => ['required', 'min:1']
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function openModalToCreateUser()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function store()
    {
        // dd($this->name, $this->email, $this->password, $this->password_confirmation, $this->user_role);
        $newUser = new CreateNewUser();
        $user = $newUser->create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation
            ]
        );

        $user->roles()->sync($this->user_role);

        Password::sendResetLink(['email' => $this->email]);

        $this->emit('created', [
            'title' => 'New User Created!',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        $this->emit('user_created');

        $this->reset();
        // session()->flash('success', 'You have successfully created a new user.');

        // return redirect(route('admin.users.index'));
    }
    public function render()
    {
        $roles = Role::pluck('name', 'id');
        return view('livewire.users.create', compact('roles'));
    }
}
