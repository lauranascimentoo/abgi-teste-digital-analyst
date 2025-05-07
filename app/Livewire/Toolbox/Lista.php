<?php

namespace App\Http\Controllers\Livewire\Toolbox;

use Livewire\Component;
use App\Models\Software;

class Lista extends Component
{
    public $softwares;

    public function mount()
    {
        $this->softwares = Software::all();
    }

    public function render()
    {
        return view('livewire.toolbox.lista');
    }
}
