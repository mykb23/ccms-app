<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;

class Edit extends Component
{
    public $ticket;
    public $openModal = false;
    public $formId;

    public function mount($ticket)
    {
        $this->formId = $ticket->id;
    }

    protected $rules = [
        'ticket.status' => ['required'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openModalToUpdateTicket()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function update()
    {
        $this->ticket->update([
            'status' => $this->ticket->status,
            'agent_name' => auth()->user()->name
        ]);

        $this->emit('updated', [
            'title' => 'Ticket Closed!',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        $this->emit('ticket_closed');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.tickets.edit');
    }
}
