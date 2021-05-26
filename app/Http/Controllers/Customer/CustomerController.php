<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Customer_swimming_lesson;
use App\Pool_party;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SwimPartyController;
use Illuminate\Http\Request;
use Json;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('name')
            ->get();
        $result = compact('customers');
        Json::dump($result);
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Customer $customer
     * @param Customer_swimming_lesson $cutles
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Customer $customer, Customer_swimming_lesson $cutles)
    {
        $this->validate($request, [
            'id',
            'name' => 'required|min:2|max:32',
            'first_name' => 'required|min:2|max:32',
            'telephone_nr' => 'required|numeric|min:10',
            'street' => 'required|min:2|max:80',
            'house_nr' => 'required|min:1|max:4',
            'postal_code' => 'required|min:4|max:5',
            'city' => 'required|min:2|max:80',
            'email' => 'required|email',
            'birth_date' => 'required|min:8|max:10',

        ]);


        $customer->name = $request->name;
        $customer->first_name = $request->first_name;
        $customer->telephone_nr = $request->telephone_nr;
        $customer->street = $request->street;
        $customer->house_nr = $request->house_nr;
        $customer->box_nr = $request->box_nr;
        $customer->postal_code = $request->postal_code;
        $customer->city = $request->city;
        $customer->email = $request->email;
        $customer->birth_date = $request->birth_date;
        $customer->note = $request->note;

        $customer->save();

        $lessons = $request->input('lessons');
        if (!is_null($lessons)) {
            foreach ($lessons as $lesson) {
                $cutles = new Customer_swimming_lesson();
                $cutles->customer_id = $customer->id;
                $cutles->date = date("Y-m-d");
                $cutles->swimming_lesson_id = $lesson;
                $cutles->status_customer_swimming_lesson = "wachtend";
                $cutles->save();
            }
            session()->flash('success', "U bent ingeschreven!");
            return redirect("/");
        }

        if (is_null($request->pool_party_id)) {
            session()->flash('success', "De klant <b>$customer->name</b> is toegevoegd");
            return redirect('customers');
        } else {
            $customerid = $customer->id;
            $pool_partyid = $request->pool_party_id;

            $pool_party = Pool_party::where('id', $pool_partyid)->firstorfail();
            $pool_party->customer_id = $customerid;
            $pool_party->status_pool_party = 'Aangevraagd';
            $pool_party->pupil_count = $request->pupil_count;
            $pool_party->meal_id = $request->meal_id;

            $pool_party->save();
            session()->flash('success', "Het zwemfeestje op  <b>$pool_party->date</b> is gereserveerd");
            return redirect('poolparties');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $edit_customer = compact('customer');
        Json::dump($edit_customer);
        return view('customers.edit', $edit_customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:32',
            'first_name' => 'required|min:2|max:32',
            'telephone' => 'required|numeric|phone_number|size:11',
            'street' => 'required|min:2|max:80',
            'house_nr' => 'required|min:1|max:4',
            'postal_code' => 'required|min:4|max:4',
            'city' => 'required|min:2|max:80',
            'email' => 'required|email',
            'birth_date' => 'required|min:8|max:10',
        ]);

        $customer->name = $request->name;
        $customer->first_name = $request->first_name;
        $customer->telephone_nr = $request->telephone_nr;
        $customer->street = $request->street;
        $customer->house_nr = $request->house_nr;
        $customer->box_nr = $request->box_nr;
        $customer->postal_code = $request->postal_code;
        $customer->city = $request->city;
        $customer->email = $request->email;
        $customer->birth_date = $request->birth_date;
        $customer->note = $request->note;

        //console.log('test');

        $customer->save();
        session()->flash('success', "The user <b>$customer->name</b> is toegevoegd");
        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('success', "The genre <b>$customer->name</b> has been deleted");
        return redirect('customers');
    }

    public function qryGenres()
    {
        $customers = Customer::orderBy('name')
            ->withCount('id')
            ->get();
        return $customers;
    }
}
