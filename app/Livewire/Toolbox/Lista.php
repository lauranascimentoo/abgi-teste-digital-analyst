<?php

namespace App\Livewire\Toolbox;

use Livewire\Component;
use App\Models\Software;

class Lista extends Component
{
    public $softwares;
    public $showForm = false;
    public $nome, $versao, $status = true, $download_url;

    public function mount()
    {
        $this->softwares = Software::all();
    }

    protected $rules = [
        'nome' => 'required|string|max:255',
        'versao' => 'required|string|max:255',
        'status' => 'boolean',
        'download_url' => 'nullable|url'
    ];

    public function render()
    {
        return view('livewire.toolbox.lista');
    }

    public function showForm()
    {
        $this->reset(['nome', 'versao', 'status', 'download_url']);
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();

        Software::create([
            'nome' => $this->nome,
            'versao' => $this->versao,
            'status' => $this->status,
            'download_url' => $this->download_url,
        ]);

        $this->showForm = false;
    }
}
