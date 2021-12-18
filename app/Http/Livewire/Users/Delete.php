<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Delete extends Component
{
    public $user;
    public $openModal = false;

    public function openModalToDeleteTicket()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function delete()
    {
        $this->user->delete();

        $this->emit('deleted', [
            'title' => 'User Deleted!',
            'icon' => 'warning',
            'iconColor' => 'red'
        ]);

        $this->emitUp('user_deleted');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.users.delete');
    }
}
