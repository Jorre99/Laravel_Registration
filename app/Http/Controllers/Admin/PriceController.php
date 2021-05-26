<?php

namespace App\Http\Controllers\Admin;

use Json;
use App\Http\Controllers\Controller;
use App\Price;
use App\Meal;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::orderBy('name')
            ->get();
        $prices = Price::orderBy('name')
            ->get();
        $result = compact('prices', 'meals');
        Json::dump($result);
        return view('admin.prices.prices', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Price $price)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:80',
            'price' => 'required|min:1|max:10',
        ]);

        $price->name = $request->name;
        $price->price = $request->price;

        $price->save();
        session()->flash('success', "De prijs voor <b>$price->name</b> is aangemaakt");

        return redirect('admin/prices');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Price $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        return view('admin.prices.prices');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Price $price
     * @return \Illuminate\Http\Response
     *
     */
    public function edit(Price $price)
    {

        $edit_price = compact('price');
        Json::dump($edit_price);
        return view('admin.prices.edit', $edit_price);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Price $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:80',
            'price' => 'required|min:1|max:10',
        ]);

        $price->name = $request->name;
        $price->price = $request->price;
        $price->save();
        session()->flash('succes', "De prijs voor <b>$price->name</b> is aangepast.");
        return redirect('admin/prices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Price $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();
        session()->flash('success', "<b>$price->name</b> is verwijderd.");
        return redirect('admin/prices');
    }
}
