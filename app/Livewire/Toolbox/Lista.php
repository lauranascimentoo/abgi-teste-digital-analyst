<?php

namespace App\Livewire\Toolbox;

use Livewire\Component;
use App\Models\Software;

class Lista extends Component
{
    public $showForm = false;
    public $softwareId = null;
    public $nome, $versao, $status = 1, $download_url;

    public function showForm()
    {
        $this->resetFields();
        $this->showForm = true;
    }

    public function edit($id)
    {
        // Se clicar no mesmo item que já está sendo editado, fecha o formulário
        if ($this->softwareId === $id && $this->showForm) {
            $this->resetFields();
            return;
        }

        $software = Software::findOrFail($id);

        $this->softwareId = $software->id;
        $this->nome = $software->nome;
        $this->versao = $software->versao;
        $this->status = $software->status;
        $this->download_url = $software->download_url;
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

        if ($this->softwareId) {
            // Atualiza software existente
            $software = Software::findOrFail($this->softwareId);
            $software->update([
                'nome' => $this->nome,
                'versao' => $this->versao,
                'status' => $this->status,
                'download_url' => $this->download_url,
            ]);
        } else {
            // Cria novo software
            Software::create([
                'nome' => $this->nome,
                'versao' => $this->versao,
                'status' => $this->status,
                'download_url' => $this->download_url,
            ]);
        }

        $this->resetFields();
    }

    private function resetFields()
    {
        $this->reset(['softwareId', 'nome', 'versao', 'status', 'download_url', 'showForm']);
        $this->status = 1;
    }

    public function render()
    {
        return view('livewire.toolbox.lista', [
            'softwares' => Software::latest()->get(),
        ]);
    }
}
