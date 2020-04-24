<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consignee;
use App\order;
use App\quarter;


class OrderController extends Controller
{  /**
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

        $orders = order::all()->toArray();
        return view('hll.index', compact('orders'));



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
            'orderno'      =>  'required',
            'scheme'       =>  'required',
            'quantity'     =>  'required',
           

            ]);

            $orders = new order([
                'orderno'    =>  $request->get('orderno'),
                'scheme'     =>  $request->get('scheme'),
                'quantity'    =>  $request->get('quantity'),
                


            ]);
            $orders->saveOrFail();

            $consignees = new consignee([

                'consignee' => $request->get('consignee'),
                'cqty'      => $request->get('cqty'),
                'PFT'     =>  $request->get('PFT'),
                'KFB'    =>  $request->get('KFB'),
                'KFC'     =>  $request->get('KFC'),
              //  'oid'     =>  $request->get('oid'),
                'oid'  => $orders->id,
                'ANo'     => 0,
                'plantd'    => $request->get('plantd'),
                'Q1'     =>  $request->get('Q1'),
                'Q2'     =>  $request->get('Q2'),
                'Q3'     =>  $request->get('Q3'),
                'Q4'     =>  $request->get('Q4')

            ]);

            $consignees->saveOrFail();
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
    public function edit(Request $id)
    { $orders = order::find($id);
      return view('hll.edit', compact('orders', 'id'));
    }
    
    
    
    
    public function update(Request $request, $id)
        {
    
            $this->validate($request, [
                'orderno'      =>  'required',
                'scheme'       =>  'required',
                'quantity' => 'required',
                'oid'          =>'required',
    
    
                 ]);
                $orders = order::find($id);
                $orders->orderno = $request->get('orderno');
                $orders->scheme = $request->get('scheme');
                $orders->quantity = $request->get('quantity');
               // $orders->oid = $request->get('oid');
    
    
            $orders->save();
            return redirect()->route('hll.index')->with('success', 'Data Updated');
            $this->validate($request, [
                'consignee' => 'required',
                'cqty'      =>  'required',
                'PFT' => 'required',
                'KFB' => 'required',
                'KFC' => 'required',
    
                 ]);
                $consignees = consignee::find($id);
              //  $consignees->oid =$request->get('oid');
                $consignees->oid = $orders->id;
                $consignees->consignee = $request->get('consignee');
                $consignees->cqty =$request->get('cqty');
                $consignees->PFT = $request->get('PFT');
                $consignees->KFB = $request->get('KFB');
                $consignees->KFC = $request->get('KFC');
    
            $consignees->save();
            return redirect()->route('hll.edit')->with('success', 'Data Updated');
    
    
        }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = order::find($id);
        $order->delete();
        return redirect()->route('hll.index')->with('success', 'Data Deleted');
    }
}