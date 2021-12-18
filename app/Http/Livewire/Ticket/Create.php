<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Create extends Component
{
    public $customer_name,
        $subject,
        $priority,
        $details,
        $status,
        $agent_name;
    public $openModal = false;

    protected $rules = [
        'customer_name' => ['required', 'min:3'],
        'subject' => ['required', 'min:10', 'max:255'],
        'priority' => ['required', 'exists:tickets,priority'],
        'details' => ['required', 'min:20', 'max:255'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function openModalToSubmitTicket()
    {
        $this->resetErrorBag();
        $this->openModal = true;
    }

    public function store()
    {
        Ticket::create([
            'customer_name' => $this->customer_name,
            'subject' => $this->subject,
            'priority' => $this->priority,
            'details' => $this->details,
            // 'status' => $this->status,
            // 'agent_name' => $this->agent_name
        ]);

        $this->emit('submitted', [
            'title' => 'Ticket Submitted!',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);

        // $this->emit('ticket_submitted');

        // // session()->flash('success', 'Ticket created.');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.ticket.create');
    }
}
