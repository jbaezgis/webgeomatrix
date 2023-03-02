<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Diagnostico;
use App\Models\Recurso;
use App\Models\Software;

class HardwareReport extends Component
{
    public $diagnosticos, $flujos, $recursos, $softwares;

    public function render()
    {
        $this->diagnosticos = Diagnostico::get();
        $this->recursos = Recurso::get();
        $this->softwares = Software::get();
        return view('livewire.hardware-report')->layout('layouts.print');
    }
}
