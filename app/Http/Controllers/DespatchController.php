<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mdespatch;

class DespatchController extends Controller
{
    public function index()
    {

        $mdespatch = mdespatch::all()->toArray();
        return view('hll.mdespatchdata', compact('mdespatch'));



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hll.mdespatch');
    }

public function store(Request $request)
    {
        $this->validate($request, [
            'slno'      =>  'required',
            

            ]);

         $mdespatch = new mdespatch([
 
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
        'amount' => $request -> get('amount'),
               



            ]);
            $mdespatch->save();
            return redirect()->route('mdespatch.create')->with('success', 'Data Added');


       }




    public function update(Request $request, $id)
        {

            $this->validate($request, [
                'slno'      =>  'required',
                


                 ]);
                $mdespatch = mdespatch::find($id);
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
return redirect()->route('hll.mdespatch')->with('success', 'Data Updated');}



public function edit(Request $id)
    { $mdespatch = mdespatch::find($id);
     return view('hll.editmdespatch', compact('mdespatch', 'id'));

}
        }