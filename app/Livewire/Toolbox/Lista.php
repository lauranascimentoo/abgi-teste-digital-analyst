<?php

namespace App\Livewire\Toolbox;

use Livewire\Component;
use App\Models\Software;

class Lista extends Component
{
    public $showForm = false;
    public $nome, $versao, $status = 1, $download_url;

    public function showForm()
    {
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'versao' => 'required|string|max:100',
            'status' => 'required|boolean',
            'download_url' => 'nullable|url',
        ]);

        Software::create([
            'nome' => $this->nome,
            'versao' => $this->versao,
            'status' => $this->status,
            'download_url' => $this->download_url,
        ]);

        $this->reset(['nome', 'versao', 'status', 'download_url', 'showForm']);
    }

    public function render()
    {
        return view('livewire.toolbox.lista', [
            'softwares' => Software::latest()->get(),
        ]);
    }
}
