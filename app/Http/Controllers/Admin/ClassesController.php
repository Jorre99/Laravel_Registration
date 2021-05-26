<?php

namespace App\Http\Controllers\Admin;


use Json;
use App\Http\Controllers\Controller;
use App\School_class;
use Illuminate\Http\Request;

class ClassesController extends Controller
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
    public function create(Request $request)
    {
        $school_id = $request->id;
        $school_id = compact('school_id');
        (new \App\Helpers\Json)->dump($school_id);
        return view('admin.schools.createClass', $school_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, School_class $class)
    {
        $this->validate($request, [
            'name' => 'required|min:1'
        ]);

        $class->class_name = $request->name;
        $class->school_id = $request->school_id;

        if (isset($request->is_gesubsidized)) {
            $class->is_subsidized = 1;
        }
        if (!isset($request->is_gesubsidized)) {
            $class->is_subsidized = 0;
        }
        $class->save();
        session()->flash('success', "De klas <b>$class->name</b> is toegevoegd!");
        return redirect('admin/schools/' . $request->school_id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School_class  $school_class
     * @return \Illuminate\Http\Response
     */
    public function show(School_class $school_class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School_class  $school_class
     * @return \Illuminate\Http\Response
     */
    public function edit(School_class $class)
    {
        $class = compact('class');
        Json::dump($class);
        return view('admin.schools.editClass', $class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School_class  $school_class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School_class $class)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:80',
        ]);
        $class->class_name = $request->name;
        if (isset($request->is_subsidized)){
            $class->is_subsidized = 1;
        }
        if (!isset($request->is_subsidized)){
            $class->is_subsidized = 0;
        }
        $class->save();
        session()->flash('succes', "<b>$class->class_name</b> is aangepast.");
        return redirect('admin/schools/' . $class->school_id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School_class  $school_class
     * @return \Illuminate\Http\Response
     */
    public function destroy(School_class $class)
    {
        $class->delete();
        session()->flash('success', "De klas <b>$class->name</b> is verwijderd");
        return redirect('admin/schools/' . $class->school_id . '/edit');
    }
}
