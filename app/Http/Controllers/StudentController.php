<?php

namespace App\Http\Controllers;

// model
use App\Student;

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
        $allStudents = Student::all();
        return $allStudents;
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
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:posts|max:255',
        //     'address' =>'required|max:255',
        //     'belt_id' => 'required',
        //     'status' => 'required',
        //     'databirth' => 'required|date',
        //     'comment' => 'nullable',
        // ]);

        try {
                $student = Student::create([
                'name'      => $request->input('nameStudent'),
                'email'     => $request->input('emailStudent'),
                'address'   => $request->input('addressStudent'),
                'belt_id'   => $request->input('beltStudent'),
                'status'    => $request->input('statusStudent'),
                'databirth' => $request->input('birthDateStudent'),
                'comment'   => $request->input('commentStudent')
            ]);
            return response("Student added", 200);

        } catch (\Throwable $th) {
           return response('Something Wrong?', 500);
        }

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
