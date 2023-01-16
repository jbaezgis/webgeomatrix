<?php

namespace App\Http\Livewire;

use App\Models\Caracteristica;
use App\Models\Dato;
use App\Models\Diagnostico;
use App\Models\Flujo;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class DiagnosticoEdit extends Component
{
    use WithFileUploads;

    
    public $diagnostico;
    public $image;
    public $flujos, $caracteristicas, $datos, $images;
    public $objetivos_actividades, $estructura_organizativa, $observaciones_generales, $observaciones_medios;
    
    // Fotos
    public $imageId, $url, $model, $model_id;
    public $modalConfirmDeleteImage = false;

    // Flujos
    public $f_diagnostico_id, $f_descripcion;

    // Caracteristicas
    public $c_diagnostico_id, $entrada_proveedor, $tratamiento, $salida_cliente;

    // Datos
    public $d_diagnostico_id, $d_descripcion, $comentario;

    // Hide/Show Botones
    public $o_a;
    public $e_o;
    public $o_g;
    public $o_m;
    
    protected $rules = [
        'url' => 'required|image|max:2048',
    ];


    public function mount($id)
    {
        $this->diagnostico = Diagnostico::find($id);
        $this->objetivos_actividades = $this->diagnostico->objetivos_actividades;
        $this->estructura_organizativa = $this->diagnostico->estructura_organizativa;
        $this->observaciones_generales = $this->diagnostico->observaciones_generales;
        $this->observaciones_medios = $this->diagnostico->observaciones_medios;
    }

    public function resetButtons()
    {
        $this->o_a = false;
        $this->e_o = false;
        $this->o_g = false;
        $this->o_m = false;    
    }

    public function modelData()
    {
        return [
            'objetivos_actividades' => $this->objetivos_actividades,
            'estructura_organizativa' => $this->estructura_organizativa,
            'observaciones_generales' => $this->observaciones_generales,
            'observaciones_medios' => $this->observaciones_medios,
        ];
    }

    public function update()
    {
        Diagnostico::where('id', $this->diagnostico->id)
            ->update($this->modelData());
        $this->resetButtons();
    }

    public function objetivos_actividades()
    {
        Diagnostico::where('id', $this->diagnostico->id)->update(['objetivos_actividades' => $this->objetivos_actividades]);
        $this->o_a = false;
    }

    public function estructura_organizativa()
    {
        Diagnostico::where('id', $this->diagnostico->id)->update(['estructura_organizativa' => $this->estructura_organizativa]);
        $this->e_o = false;
       
    }

    public function observaciones_generales()
    {
        Diagnostico::where('id', $this->diagnostico->id)->update(['observaciones_generales' => $this->observaciones_generales]);
        $this->o_g = false;
    }

    public function observaciones_medios()
    {
        Diagnostico::where('id', $this->diagnostico->id)->update(['observaciones_medios' => $this->observaciones_medios]);
        $this->o_m = false;
    }

    // Images
    public function imageData()
    {
        return [
            'model' => 'diagnosticos',
            'model_id' => $this->diagnostico->id,
            'url' => $this->url,
        ];
    }

    public function createImage()
    {
        $this->validate();

        $image = $this->url->store('diagnosticos/'.$this->diagnostico->id);

        Image::create([
            'model' => 'diagnosticos',
            'model_id' => $this->diagnostico->id,
            'url' => $image,
        ]);

        $this->reset(['model', 'model_id', 'url']);
    }

    public function deleteImageShowModal($id)
    {
        $this->imageId = $id;
        $this->modalConfirmDeleteImage = true;
    }

    public function deleteImage()
    {
        $image = Image::find($this->imageId);
        Image::destroy($this->imageId);
        Storage::delete($image->url);
        $this->modalConfirmDeleteImage = false;
    }
    // end images

    // Flujos
    public function createFlujo()
    {
        Flujo::create([
            'diagnostico_id' => $this->diagnostico->id,
            'descripcion' => $this->f_descripcion,
        ]);

        $this->reset(['f_diagnostico_id', 'f_descripcion']);
    }

    // Caracteristicas
    public function createCaracteristica()
    {

        Caracteristica::create([
            'diagnostico_id' => $this->diagnostico->id,
            'entrada_proveedor' => $this->entrada_proveedor,
            'tratamiento' => $this->tratamiento,
            'salida_cliente' => $this->salida_cliente,
        ]);

        $this->reset(['c_diagnostico_id', 'entrada_proveedor', 'tratamiento', 'salida_cliente']);
    }

    // Datos
    public function createDato()
    {

        Dato::create([
            'diagnostico_id' => $this->diagnostico->id,
            'descripcion' => $this->d_descripcion,
            'comentario' => $this->comentario,
        ]);

        $this->reset(['d_diagnostico_id', 'd_descripcion', 'comentario']);
    }

    public function render()
    {
        $this->flujos = Flujo::where('diagnostico_id', $this->diagnostico->id)->get();
        $this->caracteristicas = Caracteristica::where('diagnostico_id', $this->diagnostico->id)->get();
        $this->datos = Dato::where('diagnostico_id', $this->diagnostico->id)->get();
        $this->images = Image::where('model','diagnosticos')->where('model_id', $this->diagnostico->id)->get();
        return view('livewire.diagnostico-edit');
    }

}
