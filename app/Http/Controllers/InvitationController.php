<?php

namespace App\Http\Controllers;

use App\Http\Requests\SentInvitationRequest;
use App\Mail\InvitationMail;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        return view('invitation.invitation',[
        'token' => $token,
        'invitation' => $invitation
    ]);
    }
    public function accept($token)
    {
        $invitation = Invitation::where('token',$token)->first();
        if(auth()->user()->email!==$invitation->email) abort(403);
        $invitation->colocation->users()->syncWithoutDetaching([
            auth()->id() => [
                'role' => 'member'
            ]
        ]);
        $invitation->update(['status' => 'accepted']);
        return redirect()->route('auth.profile')->with('success','You joined the colocation.    ');
    }
    public function decline()
    {
        return view('auth.profile')->with('success','the invitatiom was declined');
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
    public function store(SentInvitationRequest $request)
    {
        $token = Str::random(60);
        Invitation::create([
            'email' => $request->email,
            'token' => $token,
            'status' => 'pending',
            'colocation_id' => auth()->user()->colocations()->where('status', 'active')->first()->id,
        ]);
        Mail::to($request->email)->send(new InvitationMail($token));
        return back()->with('success', 'invatation sent. code: ' . $token);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
