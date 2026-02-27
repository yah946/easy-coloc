<?php

namespace App\Livewire;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;

class ExpensePagination extends Component
{
    use WithPagination;
    public function render()
    {
        $expenses = Expense::orderBy('id','desc')->paginate(10);
        return view('livewire.expense-pagination',compact('expenses'));
    }
}
