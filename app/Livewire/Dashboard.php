<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        $usertype = Auth::user()->role_id;

        if ($usertype == 3) {
            return view('livewire.dashboard');
        } else {
            return view('livewire.admin.dashboard');
        }
    }
}
