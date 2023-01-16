<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Diagnostico;

class Diagnosticos extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $search;
    public $modalFormVisible = false;
    public $modalConfirmDelete = false;
    public $modalActivar = false;
    public $modalInactivar = false;
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
        Diagnostico::where('id', $this->modelId)
            ->update($this->modelData());
        $this->reset();
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDelete = true;
    }

    public function delete()
    {
        Diagnostico::destroy($this->modelId);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.diagnosticos', [
            'diagnosticos' => Diagnostico::where('id', 'LIKE', "%{$this->search}%")->orWhere('oficina', 'LIKE', "%{$this->search}%")->orWhere('responsable', 'LIKE', "%{$this->search}%")->latest()->paginate(10),
        ]);
    }
}
