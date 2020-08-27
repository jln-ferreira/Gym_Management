<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paymment;
use App\Student;

class PaymmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Paymment::with('item')->get();
    }

    //Fetch all Finance for specific student
    public function StudentPaymment($student_id)
    {
        return Student::find($student_id)->paymment;
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
        ($request->input('value') == 0) ? $value = $request->input('fixed_value') : $value = $request->input('value');

        $paymment = Paymment::create([
            'student_id'    => $request->input('student'),
            'date_paymment' => $request->input('date_paymment'),
            'item_id'       => $request->input('item'),
            'quantity'      => $request->input('quantity'),
            'final_value'   => $value, //if the value is in DB or is a new value
            'comment'       => $request->input('comment'),
        ]);

        return response('Paymment Added!', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
