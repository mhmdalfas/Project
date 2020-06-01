<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mdespatch;

class DespatchController extends Controller
{
   
    public function index()
    {

        $mdespatches  = Mdespatch::all()->toArray();
        return view('despatch.index', compact('mdespatches'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
     public function create()
    {
        return view('despatch.create');
    }

     public function store(Request $request)
    {
        $this->validate($request, [
            'slno'      =>  'required'
             ]);

         $mdespatch = new Mdespatch([
 
        'slno' => $request -> get('slno'),
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
        'inn' => $request -> get('inn'),

                  ]);
                  $rate = $mdespatch->rate;
                  $quantity = $mdespatch->quantity;
                  $mdespatch->total=$rate*$quantity;
            $mdespatch->save();
            return redirect()->route('mdespatch.index')->with('success', 'Data Added');


       }
       public function total(Request $request)
       {
           $rate=$request->input('rate');
           $quantity=$request->input('quantity');
           $total=1;
           $total=$rate*$quantity;

       }




       public function show($id)
    {
        //
    }
       public function edit($id)
       { 
           $mdespatch = Mdespatch::find($id);
        return view('despatch.edit', compact('mdespatch', 'id'));
   
        }


    public function update(Request $request, $id)
        {

           
            $this->validate($request, [
                'slno'      =>  'required',
                
    
                ]);
                


                
                $mdespatch = Mdespatch::find($id);
                 $mdespatch->slno = $request->get('slno');
                 $mdespatch->date = $request->get('date');
                 $mdespatch->transporter = $request->get('transporter');
                 $mdespatch->lrno = $request->get('lrno');
                 $mdespatch->lrdate = $request->get('lrdate');
                 $mdespatch->pickupdate = $request->get('pickupdate');
                 $mdespatch->scheme = $request->get('scheme');
                 $mdespatch->destination = $request->get('destination');
                 $mdespatch->nobox = $request->get('nobox');
                 $mdespatch->weight = $request->get('weight');
                 $mdespatch->rate = $request->get('rate');
                 $mdespatch->amount = $request->get('amount');
$mdespatch->save();
return redirect()->route('mdespatch.index')->with('success', 'Data Updated');}

public function destroy($id)
    {
        $mdespatch = Mdespatch::find($id);
        $mdespatch->delete();
        return redirect()->route('mdespatch.index')->with('success', 'Data Deleted');
    }


        }