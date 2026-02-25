<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryModal extends Component
{
    public $name;
    public function create(){
        $this->validate([
            'name'=>'required|string|min:3|max:25',
        ]);
        Category::create([
            'name'=>$this->name,
            'colocation_id'=>1,
            'description'=>'77777'
        ]);
        $this->dispatch('categoryCreated');
        $this->reset(); 
    }
    public function render()
    {
        return view('livewire.category-modal');
    }
}
