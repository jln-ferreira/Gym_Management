<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paymment;
use App\Student;
use DB;

use Illuminate\Support\Facades\Auth;

class PaymmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Paymment::with(['student','item'])->get();
    }

    public function indexAuth()
    {
        $student_Gym = Auth::user()->gym_id;

        return Paymment::with(['student','item'])
        ->whereHas('item', function($q) use($student_Gym) {
            $q->where('gym_id', '=', $student_Gym);
        })
        ->get();
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
        Paymment::create([
            'student_id'    => $request->input('student'),
            'date_paymment' => $request->input('date_paymment'),
            'item_id'       => $request->input('item'),
            'quantity'      => $request->input('quantity'),
            'final_value'   => $request->input('value'),
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
        return Paymment::with(['student','item'])->get()->find($id);
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
        //Find paymment with id
        $editPaymment = Paymment::find($id);

        //use inputs to update mySQL
        $editPaymment->student_id    = $request->modifyPaymment['student'];
        $editPaymment->date_paymment = $request->modifyPaymment['date_paymment'];
        $editPaymment->item_id       = $request->modifyPaymment['item'];
        $editPaymment->quantity      = $request->modifyPaymment['quantity'];
        $editPaymment->final_value   = $request->modifyPaymment['value'];
        $editPaymment->save();

        return response('Payment Updated!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paymment::find($id)->delete();
        return response([
            "message"     =>"Payment Deleted",
            "paymment_id" =>$id
        ], 200);
    }
}
