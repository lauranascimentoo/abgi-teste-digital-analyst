<?php

namespace App\Livewire\Toolbox;

use Livewire\Component;
use App\Models\Software;

class Lista extends Component
{
    public $showForm = false;
    public $editandoId = null;
    public $confirmingDelete = false;
    public $deleteId = null;
    public $nome, $versao, $status = 1, $download_url;

    public function showForm()
    {
        $this->resetForm();
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

        if ($this->editandoId) {
            Software::findOrFail($this->editandoId)->update([
                'nome' => $this->nome,
                'versao' => $this->versao,
                'status' => $this->status,
                'download_url' => $this->download_url,
            ]);
        } else {
            Software::create([
                'nome' => $this->nome,
                'versao' => $this->versao,
                'status' => $this->status,
                'download_url' => $this->download_url,
            ]);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        if ($this->editandoId === $id) {
            // Se clicar novamente, fecha
            $this->resetForm();
            return;
        }

        $software = Software::findOrFail($id);

        $this->editandoId = $id;
        $this->nome = $software->nome;
        $this->versao = $software->versao;
        $this->status = $software->status;
        $this->download_url = $software->download_url;
        $this->showForm = true;
    }

    public function render()
    {
        return view('livewire.toolbox.lista', [
            'softwares' => Software::latest()->get(),
        ]);
    }

    private function resetForm()
    {
        $this->editandoId = null;
        $this->showForm = false;
        $this->nome = '';
        $this->versao = '';
        $this->status = 1;
        $this->download_url = '';
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        Software::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->deleteId = null;
    }
}