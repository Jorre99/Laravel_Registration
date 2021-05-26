<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Meal;
use Illuminate\Http\Request;
use Json;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.createMeal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Meal $meal)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:80',
            'price' => 'required|min:1|max:10',
        ]);

        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->status_meal = 0;

        $meal->save();
        session()->flash('success', "De maaltijd <b>$meal->name</b> is toegevoegd.");

        return redirect('admin/prices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        $edit_meal = compact('meal');
        Json::dump($edit_meal);
        return view('admin.prices.editMeal', $edit_meal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:80',
            'price' => 'required|min:1|max:10',
        ]);

        $meal->name = $request->name;
        $meal->price = $request->price;
        if (isset($request->status_meal)) {
            $meal->status_meal = 1;
        }
        if (!isset($request->status_meal)) {
            $meal->status_meal = 0;
        }
        $meal->save();
        session()->flash('succes', "De maaltijd <b>$meal->name</b> is aangepast.");
        return redirect('admin/prices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        session()->flash('success', "De maaltijd <b>$meal->name</b> is verwijderd.");
        return redirect('admin/prices');
    }
}
