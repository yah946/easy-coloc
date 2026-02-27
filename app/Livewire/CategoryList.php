<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;
    public $names = [];
    protected $listeners = ['categoryCreated'=>'$refresh'];
    public function mount(){
        $colocation = auth()->user()->colocations();
        foreach(Category::all() as $category){
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
        $categories = Category::paginate(3);
        return view('livewire.category-list',compact('categories'));
    }
}
