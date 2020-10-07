<?php

namespace App\Http\Controllers;

// model
use App\Belt;
use App\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BeltController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_Gym = Auth::user()->gym_id;

        // $belts = DB::table('belts')
        // ->select("belts.*")
        // ->leftJoin('students', 'belts.id', '=', 'students.belt_id')
        // ->where('students.gym_id', '=', $student_Gym)
        // ->groupBy('belts.id')
        // ->orderBy('belts.name')
        // ->get();

        return Belt::all()->where('gym_id', '=', $student_Gym);
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
        //
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
