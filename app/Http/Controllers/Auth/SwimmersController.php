<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Json;

class SwimmersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
            case "emailA":
                $x = 'email';
                $y = 'asc';
                break;
            case "emailZ":
                $x = 'email';
                $y = 'desc';
                break;

        }
        $customers = Customer::orderBy($x, $y)
            ->where(function ($query) use ($name_email) {
                $query->where('name', 'like', $name_email);
            })
            ->orWhere(function ($query) use ($name_email) {
                $query->where('email', 'like', $name_email);
            })
            ->paginate(10);
        $result = compact('customers');
        Json::dump($result);
        return view('admin.swimmers.index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.swimmers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'id',
            'name' => 'required|min:1|max:80',
            'first_name' => 'required|min:2|max:80',
            'email' => 'required|email',
            'telephone_nr' => 'required|numeric|min:10',
            'street' => 'required|min:1|max:80',
            'house_nr' => 'required|min:1|max:3',
            'postal_code' => 'required|min:4',
            'city' => 'required|min:1|max:80',
            'birth_date' => 'required|min:4|max:10'

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
        session()->flash('success', "<b>$customer->name</b> is toegevoegd bij de zwemmers.");
        return redirect('auth/swimmers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.swimmers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $edit_customer = compact('customer');
        Json::dump($edit_customer);
        return view('admin.swimmers.edit', $edit_customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:80',
            'first_name' => 'required|min:2|max:80',
            'email' => 'required|email',
            'telephone_nr' => 'required|numeric|min:10',
            'street' => 'required|min:1|max:80',
            'house_nr' => 'required|min:1|max:3',
            'postal_code' => 'required|min:4',
            'city' => 'required|min:1|max:80',
            'birth_date' => 'required|min:4|max:10'
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
        session()->flash('success', "<b>$customer->name</b> is aangepast.");
        return redirect('auth/swimmers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('success', "<b>$customer->name</b> is verwijderd.");
        return redirect('auth/swimmers');
    }
}
