<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\consignee;
use App\order;

class JoinTableController extends Controller
{
 

   
  function index()
  {
    $data=DB::table('orders')
     ->join('consignees', 'consignees.oid','=' , 'orders.id')

     ->select('consignees.*','orders.*'  )
     ->get();
     return view('hll.jointable', compact('data'));
  }


function search(Request $request)
{  $search=$request->get('search');
$data=DB::table('orders')
 ->join('consignees', 'consignees.oid','=' , 'orders.id')

 ->select('orders.orderno','orders.quantity','orders.scheme', 'consignees.consignee', 'consignees.cqty','consignees.PFT',
 'consignees.KFB','consignees.KFC','consignees.ANo','consignees.plantd','consignees.Q1',
 'consignees.Q2','consignees.Q3','consignees.Q4','orders.created_at','orders.updated_at' )
 ->where('orders.orderno', 'like', '%'.$search.'%')
 ->get();
 return view('hll.single', compact('data'));
}


public function edit(Request $id)
{ $orders = order::find($id);
  return view('hll.edit', compact('orders', 'id'));
}




public function update(Request $request, $id)
    {$data=DB::table('orders')
      ->join('consignees', 'consignees.oid','=' , 'orders.id');

       

             
            $orders = order::find($id);
            $orders->scheme = $request->get('orderno');
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
}























