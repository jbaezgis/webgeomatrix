<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Diagnostico;
use App\Models\Recurso;
use App\Models\Software;


class SoftwaresReport extends Component
{
    public $diagnosticos, $flujos, $recursos, $softwares;

    public function render()
    {
        $this->diagnosticos = Diagnostico::get();
        $this->recursos = Recurso::get();
        $this->softwares = Software::get();

        return view('livewire.softwares-report')->layout('layouts.print');
    }
}
