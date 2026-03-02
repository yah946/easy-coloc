<?php

namespace App\Livewire;

use App\Models\Colocation;
use Livewire\Component;

class DisplayColocation extends Component
{
    protected $listeners = ['colocationCreated'=>'$refresh'];
    public function render()
    {
        $colocations = auth()->user()->colocations()->orderBy('id','desc')->get();
        $members = auth()->user()->activeColocation()?->users()->wherePivotNull('left_at')->count();
        return view('livewire.display-colocation',compact('colocations','members'));
    }
}
