<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public $users;
    public $searchTerm = '';

    public function render()
    {
        return view('livewire.show-users');
    }

    public function mount()
    {
        $this->users = User::all();
    }

    public function search()
    {
        $this->users = User::where('name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('first_last_name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('second_last_name', 'LIKE', "%$this->searchTerm%")
            ->orWhere('email', 'LIKE', "%$this->searchTerm%")
            ->orWhere('number', 'LIKE', "%$this->searchTerm%")
            ->get();
    }
}
