<?php

namespace App\Http\Controllers\Auth;

use App\Customer_swimming_lesson;
use App\Http\Controllers\Controller;
use App\Swimming_lesson;
use Illuminate\Http\Request;
use Json;

class SwimminglessonslistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $swimminglessonslists = Customer_swimming_lesson::with('customer', 'swimming_lesson')->get();
        $swimminglessons = Swimming_lesson::with('user')->get();
        $results1 = compact('swimminglessonslists');
        $results2 = compact('swimminglessons');
        Json::dump($swimminglessonslists);
        Json::dump($swimminglessons);
        return view('auth.swimminglessons.swimminglessonslist', $results1, $results2);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer_swimming_lesson  $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_swimming_lesson $customer_swimming_lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer_swimming_lesson  $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer_swimming_lesson $customer_swimming_lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer_swimming_lesson  $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer_swimming_lesson $customer_swimming_lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer_swimming_lesson  $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer_swimming_lesson $customer_swimming_lesson)
    {
        //
    }
}
