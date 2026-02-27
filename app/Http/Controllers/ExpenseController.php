<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('expense.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $categories = Category::all();
        return view('expense.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
            Expense::Create([
                'title'=>$request->title,
                'amount'=>$request->amount,
                'category_id'=>$request->category_id,
                'user_id'=>auth()->id(),
                'colocation_id'=>auth()->user()->colocations()->where('status', 'active')->first()->id,
            ]);
        return redirect()->route('expense.index')->with('success',$request->title.' '.'has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $categories = Category::all();
        return view('expense.update',compact('expense','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $expense->update([
                'title'=>$request->title,
                'amount'=>$request->amount,
                'category_id'=>$request->category_id,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index')->with('success',$expense->title.' '.'has been deleted');
    }
}
