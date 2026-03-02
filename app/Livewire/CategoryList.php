<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Colocation;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;
    public $names = [];
    public Colocation $colocation;
    protected $listeners = ['categoryCreated'=>'$refresh'];
    public function mount(Colocation $colocation){
        $this->colocation=$colocation;
        foreach($this->colocation->categories as $category){
            $this->names[$category->id] = $category->name; 
        }
    }
    public function update(Category $category)
    {
        $this->validate([
            'names'=>'required|array',
            'names.*'=>'required|string|min:3|max:25',
        ]);
        $category->update([
            'name'=>$this->names[$category->id],
        ]);
    }
    public function delete(Category $category)
    {
        $category->delete();
    }
    public function render()
    {
        $categories = $this->colocation->categories()->latest()->paginate(3);
        return view('livewire.category-list',compact('categories'));
    }
}
