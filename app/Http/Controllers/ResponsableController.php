<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Responsable;
use App\Student;

class ResponsableController extends Controller
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

    //Fetch all Responsable for specific student
    public function StudentResponsable($student_id){

        return Student::find($student_id)->responsable;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validation = $this->validate($request, [
                'name'        => 'required|max:255|min:4',
                'email'       => 'required|email|max:127',
                'phoneNumber' => 'required|numeric',
                'kinship'     => "required",
            ]);
        }catch (ValidationException $exception) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Error',
                'errors'    => $exception->errors(),
            ], 422);
        }

        $student = Responsable::create([
            'student_id'  => $request->input('student_id'),
            'name'        => $request->input('name'),
            'email'       => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'kinship'     => $request->input('kinship'),
        ]);

        return response("Responsable added", 200);
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
        $responsables = Responsable::find($id);
        Responsable::find($id)->delete();
        return response([
            'message' => 'Responsable Deleted',
            'allResponsables' => $responsables
    ], 200);
    }
}
