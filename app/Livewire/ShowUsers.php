<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class ShowUsers extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.show-users', compact('users'));
    }
}
