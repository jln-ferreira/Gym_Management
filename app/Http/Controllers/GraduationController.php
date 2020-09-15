<?php

namespace App\Http\Controllers;

use App\Graduation;

use Illuminate\Http\Request;

class GraduationController extends Controller
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
        $graduation = Graduation::create([
            'student_id' => $request->input('student_id'),
            'belt_id'    => $request->input('belt_id'),
            'created_at' => $request->input('graduation_date')
        ]);

        return response("Graduation added", 200);
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
        $editGraduation = Graduation::find($id);

        //use inputs to update mySQL
        $editGraduation->student_id = $request->modifyGraduation['student_id'];
        $editGraduation->belt_id    = $request->modifyGraduation['belt_id'];
        $editGraduation->created_at = $request->modifyGraduation['graduation_date'];
        $editGraduation->save();

        return response([
            'message' => 'Graduation Updated!',
            'Graduation' => $editGraduation->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Graduation::find($id)->delete();
        return response([
            'message' => 'Graduation Deleted',
            'graduation_id' => $id
        ], 200);
    }
}
