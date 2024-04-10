<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->name == 'passenger') {
            $bookings = auth()->user()->bookings()->get();

            return view('bookings', ['bookings' => $bookings]);
        } elseif (auth()->user()->role->name == 'driver') {
            return redirect('/rides');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($ride)
    {
        if (auth()->user()->role->name == 'passenger') {
            $rideExists = Ride::where('id', $ride)->first();
            if ($rideExists) {
                return view('create_booking', ['ride' => $rideExists]);
            } else {
                return redirect('/rides');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $ride)
    {
        if (auth()->user()->role->name == 'passenger') {
            $rideExists = Ride::where('id', $ride)->first();
            if ($rideExists) {
                $incoming_fields = $request->validate([
                    'seats' => ['required', 'integer', 'min:1', 'max:'.$rideExists->seats],
                ]);

                $incoming_fields['booking_date'] = Carbon::today();
                $incoming_fields['user_id'] = auth()->id();
                $incoming_fields['ride_id'] = $ride;

                Booking::create($incoming_fields);

                $rideExists->update(['seats' => $rideExists->seats-$incoming_fields['seats']]);
                return redirect('/bookings');
            } else {
                return redirect('/rides');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
