<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mood;

class MoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moods  = Mood::all()->toArray();
        return view('mood.index', compact('moods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mood.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'slno'      =>  'required'
             ]);

         $mood = new Mood([
 
        'slno' => $request -> get('slno'),
        'stomonth' => $request -> get('stomonth'),
        'deliveryno' => $request -> get('deliveryno'),
        'goodsissue' => $request -> get('goodsissue'),
        'qtytodespatch' => $request -> get('qtytodespatch'),
        'scheme' => $request -> get('scheme'),
        'batchno' => $request -> get('batchno'),
        'readyboxes' => $request -> get('readyboxes'),
        'readydate' => $request -> get('readydate'),
        'despatchdate' => $request -> get('despatchdate'),
        'consignee' => $request -> get('consignee'),
        'balance' => $request -> get('balance'),
        
        

                  ]);
                  $qtytodespatch = $mood->qtytodespatch;
                  $readyboxes = $mood->readyboxes;
                  $mood->balance=$qtytodespatch-$readyboxes;
            $mood->save();
            return redirect()->route('mood.index')->with('success', 'Data Added');


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
        $mood = Mood::find($id);
        return view('mood.edit', compact('mood', 'id'));
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
        $this->validate($request, [
            'slno'      =>  'required',
            

            ]);
            


            
            $mood = Mood::find($id);
             $mood->slno = $request->get('slno');
             $mood->stomonth = $request->get('stomonth');
             $mood->deliveryno = $request->get('deliveryno');
             $mood->goodsissue = $request->get('goodsissue');
             $mood->qtytodespatch = $request->get('qtytodespatch');
             $mood->scheme = $request->get('scheme');
             $mood->batchno = $request->get('batchno');
             $mood->readyboxes = $request->get('readyboxes');
             $mood->readydate = $request->get('readydate');
             $mood->despatchdate = $request->get('despatchdate');
             $mood->consignee = $request->get('consignee');
             $mood->balance = $request->get('balance');
             
$mood->save();
return redirect()->route('mood.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mood = Mood::find($id);
        $mood->delete();
        return redirect()->route('mood.index')->with('success', 'Data Deleted');
    }
}
