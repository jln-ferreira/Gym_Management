<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cost;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cost::with('item')->get();
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
        Cost::create([
            'date_paymment' => $request->input('date_paymment'),
            'item_id'       => $request->input('item'),
            'quantity'      => $request->input('quantity'),
            'final_value'   => $request->input('value'),
            'comment'       => $request->input('comment'),
        ]);

        return response('Cost Added!', 200);
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
        //Find cost with id
        $editCost = Cost::find($id);

        //use inputs to update mySQL
        $editCost->date_paymment = $request->modifyCost['date_paymment'];
        $editCost->item_id       = $request->modifyCost['item'];
        $editCost->quantity      = $request->modifyCost['quantity'];
        $editCost->final_value   = $request->modifyCost['value'];
        $editCost->save();

        return response('Cost Updated!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cost::find($id)->delete();
        return response([
            "message" =>"Cost Deleted",
            "cost_id" =>$id
        ], 200);
    }
}
