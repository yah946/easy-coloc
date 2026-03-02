<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocation = auth()->user()->activeColocation();
        $expenses = $colocation?->expenses()->with(['payer','users'])->latest()->get();
        return view('expense.index',compact('colocation','expenses'));
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
        $colocation = auth()->user()->activeColocation();
        $members = $colocation->users()->wherePivotNull('left_at')->where('users.id','!=',auth()->id())->get();
        if(!$colocation) {
            return back()->with('error','you should join colocation');
        }
        if($members->count()==0){
            Expense::create([
                'title'=>$request->title,
                'amount'=>$request->amount,
                'category_id'=>$request->category_id,
                'user_id'=>auth()->id(),
                'colocation_id'=>$colocation->id,
            ]);
            return redirect()->route('expense.index')->with('success',$request->title.' '.'has been added');
        }
        DB::transaction(function()use($request,$colocation,$members) {
            $expense=Expense::create([
                'title'=>$request->title,
                'amount'=>$request->amount,
                'category_id'=>$request->category_id,
                'user_id'=>auth()->id(),
                'colocation_id'=>$colocation->id,
            ]);
            $share = $request->amount/($members->count());
            foreach ($members as $member) {
                $expense->users()->attach($member->id,['amount'=>$share]);
            }
        });
        return redirect()->route('expense.index')->with('success',$request->title.' '.'has been added');
    }

    /**
     * Display the specified resource.
     */
    public function wallet()
    {
        $colocation = auth()->user()->activeColocation();
        $expenses = $colocation?->expenses()->with(['payer','users'])->latest()->get();

        return view('wallet.wallet',compact('expenses'));
    }
    public function pay(Expense $expense,User $user)
    {
        dd($user->id);
        if ($user->id!=auth()->id()) {
            abort(403);
        }
        $expense->users()->updateExistingPivot(auth()->id(),['paid_at'=>now()]);
        return back();
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
