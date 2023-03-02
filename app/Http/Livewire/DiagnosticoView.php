<?php

namespace App\Http\Livewire;

use App\Models\Caracteristica;
use App\Models\Diagnostico;
use App\Models\Flujo;
use App\Models\Image;
use App\Models\Recurso;
use App\Models\Software;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class DiagnosticoView extends Component
{
    public $diagnostico, $caracteristicas, $flujos, $images, $recursos, $softwares;

    public function mount($id)
    {
        $this->diagnostico = Diagnostico::find($id);
    }

    public function render()
    {
        $this->flujos = Flujo::where('diagnostico_id', $this->diagnostico->id)->get();
        $this->caracteristicas = Caracteristica::get();
        $this->images = Image::where('model','diagnosticos')->where('model_id', $this->diagnostico->id)->get();
        $this->recursos = Recurso::where('diagnostico_id', $this->diagnostico->id)->get();
        $this->softwares = Software::get();
        return view('livewire.diagnostico-view')->layout('layouts.print');
    }
}
