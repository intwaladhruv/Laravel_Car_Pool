<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use Illuminate\Http\Request;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rides = auth()->user()->rides()->get();
        return view('rides', ['rides' => $rides]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_ride');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incoming_fields =$request->validate([
            'start' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'start_at' => 'required|date_format:H:i',
            'seats' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.1',
            'date' => 'required|date|after:today'
        ]);

        $incoming_fields['user_id'] = auth()->id();

        Ride::create($incoming_fields);
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride)
    {
        if(auth()->user()->id === $ride['user_id']) {
            $ride->delete();
        }

        return redirect(route('rides.index'));
    }
}
