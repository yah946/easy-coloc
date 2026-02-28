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
    public function create()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:255',
        ]);
        if (auth()->user()->activeColocation()) {
            $this->reset();
            session()->flash('error', 'You already have an active colocation.');
            return;
        }
        $colocation = Colocation::create([
            'name' => $this->name,
            'left_at' => now(),
        ]);
        $colocation->users()->syncWithoutDetaching([
            auth()->id() => [
                'role' => 'owner'
            ]
        ]);
        $this->dispatch('colocationCreated');
        $this->reset();
    }
}
