<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $perPage = 4, $search = '', $orderBy = 'id', $defaultOrder = true, $orderAsc;
    protected $listeners = [
        'user_created' => '$refresh',
        'user_edited' => '$refresh',
        'user_deleted' => '$refresh',
    ];

    public function render()
    {
        if ($this->orderAsc === "false") {
            $this->defaultOrder = false;
        } else {
            $this->defaultOrder = true;
        }

        return view('livewire.users.index', [
            'users' => User::search($this->search)->with('roles')
                ->orderBy($this->orderBy, $this->defaultOrder ? 'asc' : 'desc')
                ->paginate($this->perPage),
            // ->orderBy($this->orderBy,)
            // 'roles' => Role::search($this->search)
            //     ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            //     ->paginate($this->perPage),
        ]);
    }
}
