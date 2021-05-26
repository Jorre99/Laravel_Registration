<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Customer_swimming_lesson;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Swimming_lesson;
use Json;

class WaitinglistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name_email = '%' . $request->input('customer') . '%';
        $order = $request->input('order') ?? '%';
        $x = "";
        $y = "";
        switch ($order) {
            case "%":
                $x = 'id';
                $y = 'asc';
                break;
            case "nameA":
                $x = 'name';
                $y = 'asc';
                break;
            case "nameZ":
                $x = 'name';
                $y = 'desc';
                break;
        }


        $customers = Customer::with('customer_swimming_lessons')
            ->orderBy($x, $y)
            ->where(function ($query) use ($name_email) {
                $query->where('name', 'like', $name_email);
            })
            ->paginate(10);

        $swimming_lessons = Swimming_lesson::get();

        $results = compact('customers', 'swimming_lessons');
        Json::dump($customers, $swimming_lessons);
        return view('auth.waitinglist', $results);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Customer_swimming_lesson $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_swimming_lesson $customer_swimming_lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer_swimming_lesson $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer_swimming_lesson $customer_swimming_lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer_swimming_lesson $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer_swimming_lesson $customer_swimming_lesson)
    {
        if ($request->status_customer_swimming_lesson == "wachtend"){
            $customer_swimming_lesson->status_customer_swimming_lesson = "geannuleerd";
            $customer_swimming_lesson->save();
        }elseif ($request->status_customer_swimming_lesson == "actief"){
            $customer_swimming_lesson->status_customer_swimming_lesson = "voltooid";
            $customer_swimming_lesson->save();
        }
        session()->flash('succes', 'De wachtlijst is geupdate');
        return redirect("auth/waitinglists");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer_swimming_lesson $customer_swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer_swimming_lesson $customer_swimming_lesson)
    {
        //
    }
}
