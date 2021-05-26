<?php

namespace App\Http\Controllers\Auth;

use App\Customer_swimming_lesson;
use App\Http\Controllers\Controller;
use App\Swimming_lesson;
use App\User;
use Illuminate\Http\Request;
use Json;

class AssignswimmersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_swimming_lessons = Customer_swimming_lesson::with('customer', 'swimming_lesson')->get();
        $swimming_lessons = Swimming_lesson::with('user')->get();
        $result1= compact('customer_swimming_lessons');
        $result2= compact('swimming_lessons');
        Json::dump($result1, $result2);
        return view('auth.swimminglessons.assignswimmers', $result1, $result2);
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
        return redirect("auth/assignswimmers");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer_swimming_lesson  $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer_swimming_lesson $customer_swimming_lesson)
    {
        $customer_swimming_lessons = Customer_swimming_lesson::with('customer', 'swimming_lesson')->get();


        $result = compact('customer_swimming_lesson');
        Json::dump($result);
        $swimming_lesson = Swimming_lesson::get();
        $result2 = compact('swimming_lesson');
        Json::dump($result2);
//        $customer_swimming_lessons = Customer_swimming_lesson::get();
        $result3 = compact('customer_swimming_lessons');

        Json::dump($result3);
        return view('auth.swimminglessons.edit',compact('customer_swimming_lesson', 'swimming_lesson', 'customer_swimming_lessons') );
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
        $customer_swimming_lesson->status_customer_swimming_lesson = "actief";
        $customer_swimming_lesson->save();
        session()->flash('succes', 'De zwemmer is toegevoegd');
        return redirect("auth/assignswimmers");
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
