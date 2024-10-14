<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public $name, $first_last_name, $second_last_name, $email, $number, $status, $password;
    public $open = true;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function showModal()
    {
        $this->open = true;
        
    }

    public function save()
    {
        User::create([
            'name' => $this->name,
            'first_last_name' => $this->first_last_name,
            'second_last_name' => $this->second_last_name,
            'email' => $this->email,
            'number' => $this->number,
            'status' => (bool) $this->status,
            'password' => bcrypt($this->password),
        ]);
        $this->reset('name', 'first_last_name', 'second_last_name', 'email', 'number', 'status', 'password');
        $this->dispatchBrowserEvent('user-added'); // Asegúrate de usar el método correcto
    }
}