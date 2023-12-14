<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;


class Admin extends Component
{
    public $name;
    public $email;
    public $password;
    public $role_id;

    public function render()
    {
        // Fetch roles from the database
        $roles = Role::all();

        return view('livewire.admin', compact('roles'));
    }

    public function createAdmin()
    {
        // Validate input fields
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required',
        ]);

        // Create a new admin user
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role_id' => $this->role_id,
        ]);

        // Reset input fields after creating admin
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role_id = null;
    }
}
