<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consignee;
use App\order;


class ConsigneeController extends Controller
{
    /**
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
        $consignees = consignee::all()->toArray();
        return view('hll.cons', compact('consignees'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hll.cons');
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
            'consignee'    =>  'required',
            'cqty'         =>  'required',
            'PFT'          =>  'required',
            'KFB'          =>  'required',
            'KFC'          =>  'required',
            'oid'     =>  'required',

            
            ]);
            $consignees = new consignee([
               
                'consignee' => $request->get('consignee'),
                'cqty'      => $request->get('cqty'),
                'PFT'     =>  $request->get('PFT'),
                'KFB'    =>  $request->get('KFB'),
                'KFC'     =>  $request->get('KFC'),
                'oid'     =>  $request->get('oid'),
              
                
            ]);
            
            $consignees->save();
           
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
        $consignees = consignee::find($id);
        return view('hll.edit', compact('consignee', 'id'));
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
            'consignee' => 'required',
            'cqty'      =>  'required',
            'PFT' => 'required',
            'KFB' => 'required',
            'KFC' => 'required',
            
             ]);
            $consignees = order::find($id);
            $consignees->consignee = $request->request->get('consignee');
            $consignees->cqty =$request->get('cqty');
            $consignees->PFT = $request->get('PFT');
            $consignees->KFB = $request->get('KFB');
            $consignees->KFC = $request->get('KFC');
           
        $orders->save();
        return redirect()->route('hll.cons')->with('success', 'Data Updated');
    
    }
    public function updateq(Request $request, $id)
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
        $consignees = consignee::find($id);
        $consignees->delete();
        return redirect()->route('hll.cons')->with('success', 'Data Deleted');
    }
}