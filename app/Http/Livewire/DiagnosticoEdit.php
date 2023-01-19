<?php

namespace App\Http\Livewire;

use App\Models\Caracteristica;
use App\Models\Diagnostico;
use App\Models\Flujo;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class DiagnosticoEdit extends Component
{
    use WithFileUploads;

    
    public $diagnostico, $diagnosticoId;
    public $image;
    public $modalFormVisible = false;
    public $modalConfirmDeleteFlujo = false;
    public $modalConfirmDeleteCaracteristica = false;
    public $modalCaracteristicaFormVisible = false;
    public $flujos, $caracteristicas, $datos, $images;
    public $objetivos_actividades, $estructura_organizativa, $observaciones_generales, $observaciones_medios;
    
    // Fotos
    public $imageId, $url, $model, $model_id;
    public $modalConfirmDeleteImage = false;

    // Flujos
    public $flujo_id, $f_diagnostico_id, $f_descripcion;

    // Caracteristicas
    public $caracteristicaId, $entrada_proveedor, $tratamiento, $salida_cliente, $sig, $comentario;

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

    public function resetFDescription()
    {
        $this->reset(['f_diagnostico_id', 'f_descripcion']);
    }

    public function updateFlujoShowModal($id)
    {
        // $this->resetValidation();
        // $this->reset();
        $this->reset(['f_diagnostico_id', 'f_descripcion']);
        $this->flujo_id = $id;
        $data = Flujo::find($this->flujo_id);
        $this->modalFormVisible = true;
        $this->f_descripcion = $data->descripcion;
        
    }

    public function updateFlujo()
    {
        // $this->validate();
        Flujo::where('id', $this->flujo_id)
            ->update([
                'diagnostico_id' => $this->diagnostico->id,
                'descripcion' => $this->f_descripcion,
            ]);
        $this->reset(['f_diagnostico_id', 'f_descripcion']);
        $this->modalFormVisible = false;
    }

    public function deleteFlujoShowModal($id)
    {
        $this->flujo_id = $id;
        $this->modalConfirmDeleteFlujo = true;
    }

    public function deleteFlujo()
    {
        $flujo = Flujo::find($this->flujo_id);
        Caracteristica::where('flujo_id', $flujo->id)->delete();
        $flujo->delete();
        $this->modalConfirmDeleteFlujo = false;
    }
    // End flujo

    // Caracteristicas
    public function createCaracteristica()
    {
        Caracteristica::create([
            'flujo_id' => $this->flujo_id,
            'entrada_proveedor' => $this->entrada_proveedor,
            'tratamiento' => $this->tratamiento,
            'salida_cliente' => $this->salida_cliente,
            'sig' => $this->sig,
            'comentario' => $this->comentario,
        ]);

        $this->reset(['entrada_proveedor', 'tratamiento', 'salida_cliente','sig', 'comentario']);
    }

    public function resetCaracteristica()
    {
        $this->reset(['flujo_id', 'entrada_proveedor', 'tratamiento', 'salida_cliente', 'sig', 'comentario']);
    }

    public function updateCaracteristicaShowModal($id)
    {

        $this->reset(['flujo_id','entrada_proveedor', 'tratamiento', 'salida_cliente', 'sig', 'comentario']);
        $this->caracteristicaId = $id;
        $data = Caracteristica::find($this->caracteristicaId);
        $this->modalCaracteristicaFormVisible = true;
        $this->flujo_id = $data->flujo_id;
        $this->entrada_proveedor = $data->entrada_proveedor;
        $this->tratamiento = $data->tratamiento;
        $this->salida_cliente = $data->salida_cliente;
        $this->sig = $data->sig;
        $this->comentario = $data->comentario;
        
    }

    public function updateCaracteristica()
    {
        // $this->validate();
        Caracteristica::where('id', $this->caracteristicaId)
            ->update([
                'flujo_id' => $this->flujo_id,
                'entrada_proveedor' => $this->entrada_proveedor,
                'tratamiento' => $this->tratamiento,
                'salida_cliente' => $this->salida_cliente,
                'sig' => $this->sig,
                'comentario' => $this->comentario,
            ]);
        $this->reset(['flujo_id','entrada_proveedor', 'tratamiento', 'salida_cliente', 'sig', 'comentario']);
        $this->modalCaracteristicaFormVisible = false;
    }

    public function deleteCaracteristicaShowModal($id)
    {
        $this->caracteristicaId = $id;
        $this->modalConfirmDeleteCaracteristica = true;
    }

    public function deleteCaracteristica()
    {
        Caracteristica::find($this->caracteristicaId)->delete();
        $this->modalConfirmDeleteCaracteristica = false;
    }

    // end caracteristica

    public function render()
    {
        $this->flujos = Flujo::where('diagnostico_id', $this->diagnostico->id)->get();
        $this->caracteristicas = Caracteristica::get();
        $this->images = Image::where('model','diagnosticos')->where('model_id', $this->diagnostico->id)->get();
        return view('livewire.diagnostico-edit');
    }

}
