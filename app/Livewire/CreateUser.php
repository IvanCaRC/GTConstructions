<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;
    public $name, $first_last_name, $second_last_name, $email, $number, $status = true, $password, $image;
    public $open = false;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function save()
    {

        $image = $this->image->store('users');
        User::create([
            'image' => $image,
            'name' => $this->name,
            'first_last_name' => $this->first_last_name,
            'second_last_name' => $this->second_last_name,
            'email' => $this->email,
            'number' => $this->number,
            'status' =>  $this->status,
            'password' => $this->password,
        ]);

        $this->reset('name', 'first_last_name', 'second_last_name', 'email', 'number', 'status', 'password','image');
        $this->dispatch('userAdded');
    }
}
