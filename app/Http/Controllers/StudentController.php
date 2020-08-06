<?php

namespace App\Http\Controllers;

// model
use App\Student;
use App\Belt;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::with('belt')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //attendance_graduation for next belt
        $belt = Belt::find($request->input('belt_id') + 1);

        try{
            $validation = $this->validate($request, [
                'name'        => 'required|max:255|min:4',
                'email'       => 'required|email|unique:students|max:127',
                'phoneNumber' => 'required|numeric',
                'address'     => 'required|max:127',
                'belt_id'     => 'required',
                'status'      => 'required',
                'databirth'   => 'required|date',
                'comment'     => 'nullable',
            ]);
        }catch (ValidationException $exception) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error',
                'errors'    => $exception->errors(),
            ], 422);
        }

        $student = Student::create([
            'name'                  => $request->input('name'),
            'email'                 => $request->input('email'),
            'phoneNumber'           => $request->input('phoneNumber'),
            'address'               => $request->input('address'),
            'belt_id'               => $request->input('belt_id'),
            'status'                => $request->input('status'),
            'databirth'             => $request->input('databirth'),
            'comment'               => $request->input('comment'),
            'attendance_graduation' => $belt->days_graduation
        ]);

        return response("Student added", 200);
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
