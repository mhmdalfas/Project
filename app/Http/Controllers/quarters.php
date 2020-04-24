<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consignee;
use App\order;
use App\quarter;

class quarters extends Controller
{ /**
    * Create a new controller instance.
    *
    * @return void
    */
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quarters = quarter::all()->toArray();
        return view('hll.quar', compact('quarters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hll.order');
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
            'cid'      =>  'required',
            'ANo'       =>  'required',
            'plantd'    =>  'required',
            'Q1'     =>  'required',
            'Q2'     =>  'required',
            'Q3'     =>  'required',
            'Q4'     =>  'required',
            
            ]);
             
            $quarters = new quarter([
                'cid'    =>  $request->get('cid'),
                'ANo'     =>  $request->get('ANo'),
                'plantd'    => $request->get('plantd'),
                'Q1'     =>  $request->get('Q1'),
                'Q2'     =>  $request->get('Q2'),
                'Q3'     =>  $request->get('Q3'),
                'Q4'     =>  $request->get('Q4')
               
                
               
            ]);
            $quarters->saveOrFail();
            return redirect()->route('hll.create')->with('success', 'Data Added');
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
        $quarters = quarter::find($id);
        return view('hll.edit', compact('orders', 'id'));
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
            'cid'      =>  'required',
            'ANo'       =>  'required',
            'plantd'    =>  'required',
            'Q1'     =>  'required',
            'Q2'     =>  'required',
            'Q3'     =>  'required',
            'Q4'     =>  'required',
          
             ]);
            $quarters = quarter::find($id);
            $quarters->cid = $request->get('cid');
            $quarters->ANo = $request->get('ANo');
            $quarters->plantd = $request->get('plantd');
            $quarters->Q1 = $request->get('Q1');
            $quarters->Q2 = $request->get('Q2');
            $quarters->Q3 = $request->get('Q3');
            $quarters->Q4 = $request->get('Q4');
            
        $orders->save();
        return redirect()->route('hll.quar')->with('success', 'Data Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quarters = quarter::find($id);
        $order->delete();
        return redirect()->route('hll.index')->with('success', 'Data Deleted');
}}
