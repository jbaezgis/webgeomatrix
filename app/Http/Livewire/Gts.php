<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gts extends Component
{
    public function render()
    {
        return view('livewire.gts')->layout('layouts.guest');
    }
}
