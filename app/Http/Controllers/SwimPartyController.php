<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Pool_party;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Customer;
use Json;

class SwimPartyController extends Controller
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
        $date = Carbon::now();
        $dateresult = compact('date');
        $result = compact('poolparties');
        Json::dump($result);
        return view('customers.party', $result, $dateresult);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pool_party $pool_party)
    {
        $edit_pool_party = compact('pool_party');
        Json::dump($edit_pool_party);
        $meals = Meal::get();
        $result = compact("meals");
        Json::dump($result);
        return view('customers.partySubscribe', $edit_pool_party , $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pool_party  $pool_party
     * @return \Illuminate\Http\Response
     */
    public function show(Pool_party $pool_party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pool_party  $pool_party
     * @return \Illuminate\Http\Response
     */
    public function edit(Pool_party $pool_party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pool_party  $pool_party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pool_party $pool_party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pool_party  $pool_party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pool_party $pool_party)
    {
        //
    }
}
