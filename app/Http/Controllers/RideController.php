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
        if (auth()->user()->role->name == 'driver') {
            $rides = auth()->user()->rides()->latest()->get();
            return view('rides', ['rides' => $rides]);
        } elseif (auth()->user()->role->name == 'passenger') {
            $rides = Ride::all()->take(10);
            return view('view_rides', ['rides' => $rides]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role->name == 'driver') {
            return view('add_ride');
        } elseif (auth()->user()->role->name == 'passenger') {
            return redirect('/rides');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role->name == 'driver') {
            $incoming_fields = $request->validate([
                'start' => 'required|string|max:255',
                'destination' => 'required|string|max:255',
                'start_at' => 'required|date_format:H:i',
                'seats' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0.1',
                'date' => 'required|date|after:today'
            ]);

            $incoming_fields['user_id'] = auth()->id();

            Ride::create($incoming_fields);
        }
        return $this->index();
    }

    public function search(Request $request)
    {
        if (auth()->user()->role->name == 'passenger') {
            $fields = $request->validate([
                'start' => 'string|nullable|min:3|max:255',
                'destination' => 'string|nullable|min:3|max:255',
                'date' => 'date|nullable|after:today'
            ]);

            $startLocation = $fields['start'];
            $destination = $fields['destination'];
            $date = $fields['date'];

            $rides = Ride::where(function ($query) use ($startLocation, $destination, $date) {
                if ($startLocation && $destination) {
                    $query->where('start', 'like', "%$startLocation%")
                        ->where('destination', 'like', "%$destination%");
                }
                if ($startLocation && $destination && $date) {
                    $query->WhereDate('date', $date);
                } elseif ($date) {
                    $query->orWhereDate('date', $date);
                }
            })->get();
            return view('view_rides', ['rides' => $rides, 'fields' => $fields]);
        }

        return $this->index();
    }

    public function destroy(Ride $ride)
    {
        if (auth()->user()->id === $ride['user_id']) {
            $ride->delete();
        }

        return redirect(route('rides.index'));
    }
}
