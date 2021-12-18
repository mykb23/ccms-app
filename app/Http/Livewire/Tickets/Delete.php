<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;

class Delete extends Component
{
    public $ticket;
    public $openModal = false;

    public function openModalToDeleteTicket()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function delete()
    {
        $this->ticket->delete();

        $this->emit('ticketDeleted', [
            'title' => 'Ticket Deleted!',
            'icon' => 'warning',
            'iconColor' => 'red'
        ]);

        $this->emitUp('delete');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.tickets.delete');
    }
}
