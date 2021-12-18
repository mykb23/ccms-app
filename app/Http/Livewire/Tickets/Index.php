<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ticket;

class Index extends Component
{
    use WithPagination;
    public $perPage = 3;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    protected $listeners = ['ticket_closed' => '$refresh', 'delete' => '$refresh'];

    public function render()
    {
        return view('livewire.tickets.index', [
            'tickets' => Ticket::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
