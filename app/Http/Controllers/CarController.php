<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incoming_fields = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'color' => 'required|string',
            'year' => 'required|string',
            'number' => 'required|string|unique:cars,number',
            'photo' => 'required|image'
        ]);

        if(isset($incoming_fields['photo'])) 
        {
            $imageName = time() . auth()->id();

            $request->photo->move(public_path('storage'), $imageName);
            $incoming_fields['photo_name'] = $imageName;
            unset($incoming_fields['photo']);
        }
        
        $incoming_fields['user_id'] = auth()->id();
        
        Car::create($incoming_fields);

        return redirect("/user/edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $incoming_fields = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'color' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:'. date('Y'),
            'number' => 'required|string',
            'photo' => 'image'
        ]);

        if(isset($incoming_fields['photo'])) 
        {
            $imageName = time() . auth()->id();

            $request->photo->move(public_path('storage'), $imageName);
            $incoming_fields['photo_name'] = $imageName;
            unset($incoming_fields['photo']);
        }

        auth()->user()->car->update($incoming_fields);

        return redirect("/user/edit");
    }
}
