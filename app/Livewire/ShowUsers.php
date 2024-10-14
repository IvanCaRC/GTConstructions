<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public $users;
    public $searchTerm = '';

    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['userAdded' => 'render'];

    public function render()
    {
        $this->users = User::where('name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('first_last_name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('second_last_name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('email', 'LIKE', "%$this->searchTerm%")
            ->orWhere('number', 'LIKE', "%$this->searchTerm%")
            ->orderBy($this->sort, $this->direction)
            ->get();
        return view('livewire.show-users');
    }

    public function mount()
    {
        $this->users = User::orderBy($this->sort, $this->direction)
            ->get();
    }

    public function search()
    {
        $this->users = User::where('name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('first_last_name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('second_last_name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('email', 'LIKE', "%$this->searchTerm%")
            ->orWhere('number', 'LIKE', "%$this->searchTerm%")
            ->orderBy($this->sort, $this->direction)
            ->get();
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
