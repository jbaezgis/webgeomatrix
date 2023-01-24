<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Diagnostico;
use App\Models\Image;
use App\Models\Recurso;
use App\Models\Software;

class DiagnosticoRecursos extends Component
{
    use WithFileUploads;
    public $diagnostico, $diagnosticoId;
    public $image, $images, $recursos, $softwares;
    public $modalConfirmDeleteRecurso = false;
    public $modalRecursoFormVisible = false;
    public $modalConfirmDeleteSoftware = false;
    public $modalSoftwareFormVisible = false;

    // Recursos
    public $recursoId, $recurso, $diagnostico_id, $equipo, $marca_modelo, $capacidades, $red_servidor, $acceso_internet, $personal_asignado;

    // Sofwares
    public $recurso_id, $softwareId, $aplicacion, $desarrollador, $tipo_licencia, $uso, $frecuencia_uso, $s_personal_asignado;

    // Fotos
    public $imageId, $url, $model, $model_id;
    public $modalConfirmDeleteImage = false;

    protected $rules = [
        'url' => 'required|image|max:2048',
    ];

    public function mount($id)
    {
        $this->diagnostico = Diagnostico::find($id);
    }

    // Images
    public function imageData()
    {
        return [
            'model' => 'recursos',
            'model_id' => $this->recursoId,
            'url' => $this->url,
        ];
    }

    public function createImage()
    {
        $this->validate();

        $image = $this->url->store('diagnosticos/'.$this->diagnostico->id.'/recursos');
        
        Image::create([
            'model' => 'recursos',
            'model_id' => $this->recursoId,
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

    // Recursos
    public function createRecurso()
    {
        Recurso::create([
            'diagnostico_id' => $this->diagnostico->id,
            'equipo' => $this->equipo,
            'marca_modelo' => $this->marca_modelo,
            'capacidades' => $this->capacidades,
            'red_servidor' => $this->red_servidor,
            'acceso_internet' => $this->acceso_internet,
            'personal_asignado' => $this->personal_asignado,
        ]);
        $this->resetRecurso();
    }

    public function resetRecurso()
    {
        $this->reset(['recursoId', 'equipo', 'marca_modelo', 'capacidades', 'red_servidor', 'acceso_internet', 'personal_asignado']);
    }

    public function updateRecursoShowModal($id)
    {

        $this->resetRecurso();
        $this->recursoId = $id;
        $data = Recurso::find($this->recursoId);
        // $this->modalRecursoFormVisible = true;
        $this->equipo = $data->equipo;
        $this->marca_modelo = $data->marca_modelo;
        $this->capacidades = $data->capacidades;
        $this->red_servidor = $data->red_servidor;
        $this->acceso_internet = $data->acceso_internet;
        $this->personal_asignado = $data->personal_asignado;
    }

    public function softwaresShowModal($id)
    {
        $this->resetRecurso();
        $this->recursoId = $id;
        $findRecurso = Recurso::find($this->recursoId);
        $this->recurso = Recurso::where('id', $findRecurso)->first();
        $this->modalRecursoFormVisible = true;
    }

    public function softwaresCerrarModal($id)
    {
        $this->modalRecursoFormVisible = false;
        // $this->reset(['recursoId']);
    }

    public function updateRecurso()
    {
        // $this->validate();
        Recurso::where('id', $this->recursoId)
            ->update([
                'equipo' => $this->equipo,
                'marca_modelo' => $this->marca_modelo,
                'capacidades' => $this->capacidades,
                'red_servidor' => $this->red_servidor,
                'acceso_internet' => $this->acceso_internet,
                'personal_asignado' => $this->personal_asignado,
            ]);
        
        $this->resetRecurso();
        $this->modalRecursoFormVisible = false;
    }

    public function deleteRecursoShowModal($id)
    {
        $this->recursoId = $id;
        $this->modalConfirmDeleteRecurso = true;
    }

    public function deleteRecurso()
    {
        Recurso::find($this->recursoId)->delete();
        $this->modalConfirmDeleteRecurso = false;
        $this->resetRecurso();
    }
    // En recursos

    // Softwares
    public function createSoftware()
    {
        Software::create([
            'recurso_id' => $this->recursoId,
            'aplicacion' => $this->aplicacion,
            'desarrollador' => $this->desarrollador,
            'tipo_licencia' => $this->tipo_licencia,
            'uso' => $this->uso,
            'frecuencia_uso' => $this->frecuencia_uso,
            'personal_asignado' => $this->personal_asignado,
        ]);
        $this->resetSoftware();
    }

    public function resetSoftware()
    {
        $this->reset(['softwareId', 'aplicacion', 'desarrollador', 'tipo_licencia', 'uso', 'frecuencia_uso', 'personal_asignado']);
    }

    public function updateSoftwareShowForm($id)
    {

        $this->resetSoftware();
        $this->softwareId = $id;
        $data = Software::find($this->softwareId);
        // $this->modalRecursoFormVisible = true;
        $this->aplicacion = $data->aplicacion;
        $this->desarrollador = $data->desarrollador;
        $this->tipo_licencia = $data->tipo_licencia;
        $this->uso = $data->uso;
        $this->frecuencia_uso = $data->frecuencia_uso;
        $this->personal_asignado = $data->personal_asignado;
    }

    public function updateSoftware()
    {
        // $this->validate();
        Software::where('id', $this->softwareId)
            ->update([
                'aplicacion' => $this->aplicacion,
                'desarrollador' => $this->desarrollador,
                'tipo_licencia' => $this->tipo_licencia,
                'uso' => $this->uso,
                'frecuencia_uso' => $this->frecuencia_uso,
                'personal_asignado' => $this->personal_asignado,
            ]);
        
        $this->resetSoftware();
        // $this->modalRecursoFormVisible = false;
    }

    public function deleteSoftwareShowModal($id)
    {
        $this->softwareId = $id;
        $this->modalConfirmDeleteSoftware = true;
    }

    public function deleteSoftware()
    {
        Software::find($this->softwareId)->delete();
        $this->modalConfirmDeleteSoftware = false;
        $this->resetSoftware();
    }
    // En recursos

    public function render()
    {
        $this->recursos = Recurso::where('diagnostico_id', $this->diagnostico->id)->get();
        $this->softwares = Software::get();
        if($this->recursoId)
        {
            $this->images = Image::where('model','recursos')->where('model_id', $this->recursoId)->get();
        }
        // $this->recurso = Recurso::first();
        return view('livewire.diagnostico-recursos');
    }
}
