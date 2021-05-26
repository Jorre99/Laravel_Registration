<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Pool_partyMail;
use App\Pool_party;
use App\Customer;
use App\Price;
use Illuminate\Http\Request;
use Json;
use Mail;

class Pool_partyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poolparties = Pool_party::orderBy('date')
            ->get();
        $result = compact('poolparties');
        Json::dump($result);
        return view('admin.poolparties.index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prices = Price::get();
        $result = compact('prices');
        Json::dump($result);
        return view('admin.poolparties.create', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pool_party $pool_party)
    {
        $this->validate($request, [
            'id',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'price_id' => 'required',

        ]);

        $pool_party->date = $request->date;
        $pool_party->start_time = $request->start_time;
        $pool_party->end_time = $request->end_time;
        $pool_party->status_pool_party = 'Beschikbaar';
        $pool_party->price_id = $request->price_id;


        //console.log('test');

        $pool_party->save();
        session()->flash('success', "de volgende poolparty op: <b>$pool_party->date</b> is toegevoegd.");
        return redirect('admin/poolparties');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Pool_party $pool_party
     * @return \Illuminate\Http\Response
     */
    public function show(Pool_party $pool_party)
    {
        return view('admin.poolparties.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Pool_party $pool_party
     * @return \Illuminate\Http\Response
     */
    public function edit(Pool_party $pool_party)
    {
        $prices = Price::get();
        $result = compact('prices');
        $edit_pool_party = compact('pool_party');
        Json::dump($edit_pool_party);
        return view('admin.poolparties.edit', $edit_pool_party, $result);
        //return view('admin/poolparties/edit',compact('pool_party'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Pool_party $pool_party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pool_party $pool_party)
    {
        $this->validate($request, [
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'status_pool_party' => 'required'

        ]);
            $pool_party->date = $request->date;
            $pool_party->start_time = $request->start_time;
            $pool_party->end_time = $request->end_time;
            $pool_party->status_pool_party = "Goedgekeurd";
            $pool_party->save();
            session()->flash('success', "de volgende poolparty op: <b>$pool_party->date</b> is goedgekeurd.");

        return redirect('admin/poolparties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Pool_party $pool_party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pool_party $pool_party)
    {
        $pool_party->delete();
        session()->flash('success', "De poolparty op  <b>$pool_party->date</b> is verwijderd.");
        return redirect('admin/poolparties');
    }

    public function confirm(Pool_party $pool_party)
    {
        $customer = Customer::where('id', $pool_party->customer_id)->firstorfail();
        $pool_party->status_pool_party = "Goedgekeurd";
        $pool_party->save();
        $email = new Pool_partyMail($pool_party, $customer);
        Mail::to($pool_party->customer->email)
            ->send($email);
        return redirect("admin/poolparties");


    }
    public function confirm2(Pool_party $pool_party)
    {
        $customer = Customer::where('id', $pool_party->customer_id)->firstorfail();
        $pool_party->status_pool_party = "Afgekeurd";
        $pool_party->save();
        $email = new Pool_partyMail($pool_party, $customer);
        Mail::to($pool_party->customer->email)
            ->send($email);
        return redirect("admin/poolparties");


    }
}
