<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pool_appointment;
use App\Price;
use App\Receipt;
use App\School;
use App\School_class;
use Illuminate\Http\Request;
use Json;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name_email = '%' . $request->input('school') . '%';
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
        $schools = School::orderBy($x, $y)
            ->where(function ($query) use ($name_email) {
                $query->where('name', 'like', $name_email);
            })
            ->orWhere(function ($query) use ($name_email) {
                $query->where('email', 'like', $name_email);
            })
            ->paginate(10);
        $result = compact('schools');
        Json::dump($result);
        return view('admin.schools.index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, School $school)
    {
        $this->validate($request, [
            'name' =>'required|min:1|max:80',
            'email' =>'required|email',
            'telephone' => 'required|numeric|min:10',
            'street' => 'required|min:1|max:80',
            'house_nr' => 'required|min:1|max:3',
            'postal_code' => 'required|min:4|max:4',
            'city' => 'required|min:1|max:80',
        ]);

        $school->name = $request->name;
        $school->email = $request->email;
        $school->telephone = $request->telephone;
        $school->street = $request->street;
        $school->house_nr = $request->house_nr;
        $school->box_nr = $request->box_nr;
        $school->postal_code = $request->postal_code;
        $school->city = $request->city;
        $school->save();

        $school_class = new School_class();
        $school_class->school_id = $school->id;
        $school_class->class_name = '1A';
        $school_class->is_subsidized = 0;
        $school_class->save();

        session()->flash('success', "De school <b>$school->name</b> is aangemaakt.");

        return redirect('admin/schools');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        $school_receipts = Receipt::with('school', 'pool_appointments', 'user')
            ->where('school_id', $school->id)
            ->get();

        $prices = Price::where('name', 'school_kind')->get();
        $school_receipts = compact('school_receipts');
        $prices = compact('prices');

        Json::dump($school_receipts);
        Json::dump($prices);
        return view('admin.receipts.index', $school_receipts, $prices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {

        $classes = School_class::with('school')
            ->where('school_id', $school->id)
            ->get();
        $classes = compact('classes');
        Json::dump($classes);
        return view('admin.schools.edit', $classes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $this->validate($request, [
            'name' =>'required|min:1|max:80',
            'email' =>'required|email',
            'telephone' => 'required|numeric|min:10',
            'street' => 'required|min:1|max:80',
            'house_nr' => 'required|min:1|max:3',
            'postal_code' => 'required|min:4|max:4',
            'city' => 'required|min:1|max:80',
        ]);

        $school->name = $request->name;
        $school->email = $request->email;
        $school->telephone = $request->telephone;
        $school->street = $request->street;
        $school->house_nr = $request->house_nr;
        $school->box_nr = $request->box_nr;
        $school->postal_code = $request->postal_code;
        $school->city = $request->city;


        $school->save();
        session()->flash('success', "<b>$school->name</b> is aangepast.");

        return redirect('admin/schools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
        session()->flash('success', "<b>$school->name</b> is verwijderd.");
        return redirect('admin/schools');
    }
}
