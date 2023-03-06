<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Diagnostico;
use App\Models\Caracteristica;
use App\Models\Flujo;

class FlujosReport extends Component
{
    public $diagnosticos, $flujos, $caracteristicas;

    public function render()
    {
        $this->diagnosticos = Diagnostico::get();
        $this->flujos = Flujo::get();
        $this->caracteristicas = Caracteristica::get();
        return view('livewire.flujos-report')->layout('layouts.print');
    }
}
