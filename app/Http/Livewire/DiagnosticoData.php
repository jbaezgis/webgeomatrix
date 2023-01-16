<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DiagnosticoData extends Component
{
    public $modelId;
    public $objetivos_actividades, $estructura_organizativa, $observaciones_generales, $observaciones_medios;

    public function modelData()
    {
        return [
            'nombre' => $this->objetivos_actividades,
            'descripcion' => $this->estructura_organizativa,
            'precio' => $this->observaciones_generales,
            'categoria' => $this->observaciones_medios,
        ];
    }

    public function update()
    {
        $this->validate();
        Diagnostico::where('id', $this->modelId)
            ->update($this->modelData());
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.diagnostico-data');
    }
}
