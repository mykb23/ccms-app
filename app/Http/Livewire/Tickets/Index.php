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

    public $defaultOrder = true, $orderAsc;

    protected $listeners = ['ticket_closed' => '$refresh', 'delete' => '$refresh'];

    public function render()
    {
        if ($this->orderAsc === "false") {
            $this->defaultOrder = false;
        } else {
            $this->defaultOrder = true;
        }
        return view('livewire.tickets.index', [
            'tickets' => Ticket::search($this->search)
                ->orderBy($this->orderBy, $this->defaultOrder ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
