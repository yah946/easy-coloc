<?php

namespace App\Livewire;

use App\Models\Colocation;
use Livewire\Component;


class Modal extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.modal');
    }
    public function create(){
        $this->validate([
            'name'=>'string|min:25|max:255',
        ]);
        Colocation::create(['name'=>$this->name]);
    }
}
