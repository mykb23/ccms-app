<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $user, $openModal = false, $formId, $roleId, $user_role;

    public function mount($user)
    {
        $this->roleId = $user->roles()->pluck('role_id');
        $this->user_role = $this->roleId;
        $this->formId = $user->id;
    }

    protected $rules = [
        'user_role' => ['required'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openModalToUpdateUserRole()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function update()
    {
        $edit_user = User::findOrFail($this->user->id);
        $edit_user->roles()->sync($this->user_role);

        $this->emit('updated', [
            'title' => 'User role changed!',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        $this->emit('user_edited');

        $this->reset();
    }

    public function render()
    {
        $roles = Role::pluck('name', 'id');
        return view('livewire.users.edit', compact('roles'));
    }
}
