<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pool_appointment;
use App\Receipt;
use App\School;
use App\School_class;
use Illuminate\Http\Request;
use Json;

class Pool_appointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schools.index');
    }

    /**
     * Show the form for creating a new resource.
     * @param School $school
     * @return \Illuminate\Http\Response
     */
    public function create(School $school)
    {
        $result = compact('school');
        Json::dump($result);

        $school_classes = School_class::with('school')
            ->where("school_id", $school->id)
            ->get();
        $school_classes = compact('school_classes');
        Json::dump($school_classes);

        return view('admin.pool_appointments.index', $result, $school_classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pool_appointment $pool_appointment)
    {
        $receipts = Receipt::where('school_id', $request->school_id)->get();

        $sub_class = School_class::where('id', $request->school_class)->firstOrFail();

        $trimester1 = [9, 10, 11, 12];
        $trimester2 = [1, 2, 3, 4];
        $trimester3 = [5, 6, 7, 8];

        $appdate = strtotime($request->date);

        if (in_array(date('m', $appdate), $trimester1)) {
            if ($sub_class->is_subsidized == 1){
                foreach ($receipts as $receipt) {
                    if ($receipt->is_subsidized == 1) {
                        $recdate = strtotime($receipt->date);
                        if (date('m', $recdate) == 9) {
                            $fkreceipt_id = $receipt->id;
                        }
                    }
                }
            }
            if ($sub_class->is_subsidized == 0) {
                foreach ($receipts as $receipt) {
                    if ($receipt->is_subsidized == 0) {
                        $recdate = strtotime($receipt->date);
                        if (date('m', $recdate) == 9) {
                            $fkreceipt_id = $receipt->id;
                        }
                    }
                }
            }
            if (!isset($fkreceipt_id)) {
                $thedate = mktime(0, 0, 0, 9, 1, 2021);
                $receipt = new receipt;
                $receipt->school_id = $request->school_id;
                $receipt->user_id = auth()->user()->id;
                $receipt->date = date('Y-m-d', $thedate);
                $receipt->active = 1;
                $receipt->is_subsidized = $sub_class->is_subsidized;
                $receipt->save();

                $fkreceipt_id = $receipt->id;
            }
        }

        if (in_array(date('m', $appdate), $trimester2)) {
            if ($sub_class->is_subsidized == 1){
                foreach ($receipts as $receipt) {
                    if ($receipt->is_subsidized == 1) {
                        $recdate = strtotime($receipt->date);
                        if (date('m', $recdate) == 1) {
                            $fkreceipt_id = $receipt->id;
                        }
                    }
                }
            }
            if ($sub_class->is_subsidized == 0) {
                foreach ($receipts as $receipt) {
                    if ($receipt->is_subsidized == 0) {
                        $recdate = strtotime($receipt->date);
                        if (date('m', $recdate) == 1) {
                            $fkreceipt_id = $receipt->id;
                        }
                    }
                }
            }
            if (!isset($fkreceipt_id)) {
                $thedate = mktime(0, 0, 0, 1, 1, 2021);
                $receipt = new receipt;
                $receipt->school_id = $request->school_id;
                $receipt->user_id = auth()->user()->id;
                $receipt->date = date('Y-m-d', $thedate);
                $receipt->active = 1;
                $receipt->is_subsidized = $sub_class->is_subsidized;
                $receipt->save();

                $fkreceipt_id = $receipt->id;
            }
        }

        if (in_array(date('m', $appdate), $trimester3)) {
            if ($sub_class->is_subsidized == 1){
                foreach ($receipts as $receipt) {
                    if ($receipt->is_subsidized == 1) {
                        $recdate = strtotime($receipt->date);
                        if (date('m', $recdate) == 5) {
                            $fkreceipt_id = $receipt->id;
                        }
                    }
                }
            }
            if ($sub_class->is_subsidized == 0) {
                foreach ($receipts as $receipt) {
                    if ($receipt->is_subsidized == 0) {
                        $recdate = strtotime($receipt->date);
                        if (date('m', $recdate) == 5) {
                            $fkreceipt_id = $receipt->id;
                        }
                    }
                }
            }
            if (!isset($fkreceipt_id)) {
                $thedate = mktime(0, 0, 0, 5, 1, 2021);
                $receipt = new receipt;
                $receipt->school_id = $request->school_id;
                $receipt->user_id = auth()->user()->id;
                $receipt->date = date('Y-m-d', $thedate);
                $receipt->active = 1;
                $receipt->is_subsidized = $sub_class->is_subsidized;
                $receipt->save();

                $fkreceipt_id = $receipt->id;
            }
        }

        $this->validate($request, [
        ]);

        $pool_appointment->date = $request->date;
        $pool_appointment->pupil_count = $request->pupil_count;
        $pool_appointment->school_class_id = $request->school_class;
        $pool_appointment->receipt_id = $fkreceipt_id;

        $pool_appointment->save();
        session()->flash('success', "De zwem reservatie is gemaakt");

        return redirect('admin/schools');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Pool_appointment $pool_appointment
     * @return \Illuminate\Http\Response
     */
    public
    function show(Pool_appointment $pool_appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Pool_appointment $pool_appointment
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Pool_appointment $pool_appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Pool_appointment $pool_appointment
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Pool_appointment $pool_appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Pool_appointment $pool_appointment
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Pool_appointment $pool_appointment)
    {
        //
    }
}
