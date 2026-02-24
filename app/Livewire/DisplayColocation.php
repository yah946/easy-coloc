<?php

namespace App\Livewire;

use App\Models\Colocation;
use Livewire\Component;

class DisplayColocation extends Component
{
    protected $listeners = ['colocationCreated'=>'$refresh'];
    public function render()
    {
        $colocations = Colocation::all();
        return view('livewire.display-colocation',compact('colocations'));
    }
}
