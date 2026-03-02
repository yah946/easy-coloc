<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Colocation;
use Illuminate\Http\Request;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('colocation.colocation');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Colocation $colocation)
    {
        $categories = Category::where('colocation_id',$colocation->id);
        $members = $colocation->users()->wherePivotNull('left_at')->count();
        return view('colocation.show',compact('colocation','categories','members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colocation $colocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colocation $colocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colocation $colocation)
    {
        //
    }
        /**
     * Cancel the specified resource from storage.
     */
    public function cancel(Colocation $colocation)
    {
        $members = $colocation->users()->wherePivotNull('left_at')->count();
        if($members!=1) return back()->with('error','Owner can\'t cancell '.$colocation->name.' and '.$members.' exist');
        $colocation->update(['status'=>'cancelled']);
        $colocation->users()->updateExistingPivot(auth()->id(),['left_at'=>now()]);
        return redirect()->route('coloc.index')->with('success',$colocation->name.' cancelled');
    }
            /**
     * Quit the specified resource from storage.
     */
    public function quit(Colocation $colocation)
    {
        $colocation->updateExistingPivot(auth()->id(),['left_at'=>now()]);
        return redirect()->route('coloc.index')->with('success','you are outside'.$colocation->name.' now');
    }
}
