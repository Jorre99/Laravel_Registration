<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Swimming_lesson;
use Illuminate\Http\Request;
use App\User;
use Json;

class SwimminglessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $swimming_lessons = Swimming_lesson::with('user')->get();
        $swimmingistructors = User::get();
        $results = compact('swimming_lessons');
        $results2 = compact('swimmingistructors');
        Json::dump($results);
        Json::dump($results2);
        return view("admin.swimminglessons.addswimminglessons", $results, $results2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $result = compact('users');
        Json::dump($result);
        return view('admin.swimminglessons.create', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Swimming_lesson $swimming_lesson)
    {
        $this->validate($request,[
            'weekday' => 'required|min:1',
            'start_time' => 'required',
            'end_time' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $swimming_lesson->weekday = $request->weekday;
        $swimming_lesson->start_time = $request->start_time;
        $swimming_lesson->end_time = $request->end_time;
        $swimming_lesson->user_id = $request->user_id;
        $swimming_lesson->status_swimming_lesson = $request->status;

        $swimming_lesson->save();
        session()->flash('success', "De zwemles op <b>$swimming_lesson->weekday</b> is toegevoegd.");
        return redirect('admin/swimminglesson');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Swimming_lesson  $swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Swimming_lesson $swimming_lesson)
    {
        return view('admin.swimminglessons.addswimminglessons');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Swimming_lesson  $swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Swimming_lesson $swimming_lesson)
    {
        $users = User::get();
        $result2 = compact('users');
        Json::dump($result2);
        $result = compact('swimming_lesson');
        Json::dump($result);
        return view('admin.swimminglessons.edit', $result, $result2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Swimming_lesson  $swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Swimming_lesson $swimming_lesson)
    {
        $this->validate($request,[
            'weekday' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $swimming_lesson->weekday = $request->weekday;
        $swimming_lesson->start_time = $request->start_time;
        $swimming_lesson->end_time = $request->end_time;
        $swimming_lesson->user_id = $request->user_id;
        $swimming_lesson->status_swimming_lesson = $request->status;

        $swimming_lesson->save();
        session()->flash('success', "De zwemles op <b>$swimming_lesson->weekday</b> is aangepast.");
        return redirect('admin/swimminglesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Swimming_lesson  $swimming_lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Swimming_lesson $swimming_lesson)
    {
        $swimming_lesson->delete();
        session()->flash('success', "De zwemles op <b>$swimming_lesson->weekday</b> is verwijderd.");
        return redirect('admin/swimminglesson');
    }
}
