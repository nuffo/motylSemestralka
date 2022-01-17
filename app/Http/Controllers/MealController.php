<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("menu", ["meals" => Meal::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMealRequest $request)
    {
        $validated = $request->validated();
        $image = $request->file('image');
        $image->store('menu');
        Meal::create([
            "name" => $validated['name'],
            "description" => $validated['description'],
            "price" => $validated['price'],
            "imagePath" => "menu/".$image->getClientOriginalName()
        ]);
        return redirect(route("menu.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        $meal->update([
            "name" => $validated["name"],
            "description" => $validated["description"],
            "price" => $validated["price"]
        ]);
        return redirect(route("menu.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //unlink(public_path("images/".$meal->imagePath));
        $meal->delete();
        return redirect(route("menu.index"));
    }

    public function delete($id)
    {
        ddd($id);
    }
}
