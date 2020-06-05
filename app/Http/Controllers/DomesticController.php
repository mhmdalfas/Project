<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domestic;

class DomesticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domestics  = Domestic::all()->toArray();
        return view('domestic.index', compact('domestics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domestic.create');
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

         $domestic = new Domestic([
 
        'slno' => $request -> get('slno'),
        'year' => $request -> get('year'),
        'date' => $request -> get('date'),
        'transporter' => $request -> get('transporter'),
        'lrno' => $request -> get('lrno'),
        'lrdate' => $request -> get('lrdate'),
        'pickupdate' => $request -> get('pickupdate'),
        'scheme' => $request -> get('scheme'),
        'destination' => $request -> get('destination'),
        'nobox' => $request -> get('nobox'),
        'weight' => $request -> get('weight'),
        'rate' => $request -> get('rate'),
        'quantity' => $request -> get('quantity'),
        

                  ]);
                  $rate = $domestic->rate;
                  $quantity = $domestic->quantity;
                  $domestic->total=$rate*$quantity;
            $domestic->save();
            return redirect()->route('domestic.index')->with('success', 'Data Added');


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
        $domestic = Domestic::find($id);
        return view('domestic.edit', compact('domestic', 'id'));
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
            


            
            $domestic = Domestic::find($id);
             $domestic->slno = $request->get('slno');
             $domestic->date = $request->get('date');
             $domestic->transporter = $request->get('transporter');
             $domestic->lrno = $request->get('lrno');
             $domestic->lrdate = $request->get('lrdate');
             $domestic->pickupdate = $request->get('pickupdate');
             $domestic->scheme = $request->get('scheme');
             $domestic->destination = $request->get('destination');
             $domestic->nobox = $request->get('nobox');
             $domestic->weight = $request->get('weight');
             $domestic->rate = $request->get('rate');
             $domestic->quantity = $request->get('quantity');
             $rate = $domestic->rate;
             $quantity = $domestic->quantity;
             $domestic->total=$rate*$quantity;
$domestic->save();
return redirect()->route('domestic.index')->with('success', 'Data Updated');}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domestic = Domestic::find($id);
        $domestic->delete();
        return redirect()->route('domestic.index')->with('success', 'Data Deleted');
    }
}
