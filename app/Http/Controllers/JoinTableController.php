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
    ->join('consignees',function($join)
                        {
                          $join->on('consignees.oid', '=' , 'orders.id')
                               ->on('consignees.ANo', '=' , 'orders.ANo');
                        }
            )

     ->select('consignees.*','orders.*'  )
     ->get();
     return view('hll.jointable', compact('data'));
  }


function search(Request $request)
{  $search=$request->get('search');
  //return $request;

$data=DB::table('orders')
 ->join('consignees', 'consignees.oid','=' , 'orders.id')
 /*->join('consignees',function($join)
                     {
                       $join->on('consignees.oid', '=' , 'orders.id')
                            ->on('consignees.ANo', '=' , 'orders.ANo');
                     }
         )*/
 ->select('orders.orderno','orders.quantity','orders.scheme', 'consignees.consignee', 'consignees.cqty','consignees.PFT',
 'consignees.KFB','consignees.KFC','consignees.ANo','consignees.plantd','consignees.Q1',
 'consignees.Q2','consignees.Q3','consignees.Q4','orders.created_at','orders.updated_at' )
 ->where('orders.orderno', 'like', '%'.$search.'%')
 ->get();
 //dd($request);
 return view('hll.single', compact('data'));
}


public function edit(Request $req)
{
  //return $req;
//  $id=$req->get('id');
  //$id = $req->all();
  $id = $req->input('id');
//  dd($id);


  $orders = DB::table('orders')->find($id);
  //dd($orders);
  $oid = $orders->id;
  $ano = $orders->ANo;


  $data=DB::table('orders')
      ->join('consignees',function($join)
                          {
                            $join->on('consignees.oid', '=' , 'orders.id')
                                 ->on('consignees.ANo', '=' , 'orders.ANo');
                          }
              )
      ->select('orders.id','orders.orderno','orders.quantity','orders.scheme', 'orders.ANo','consignees.oid','consignees.consignee', 'consignees.cqty','consignees.PFT',
                        'consignees.KFB','consignees.KFC','consignees.ANo','consignees.plantd','consignees.Q1',
                        'consignees.Q2','consignees.Q3','consignees.Q4','orders.created_at','orders.updated_at' )
      ->where('orders.id', '=', $id)
      ->get();

  //  return $data;

    return view('hll.editc', compact('data'));

}


public function update(Request $request)
    {
      //return $request;
      $this->validate($request, [
          'id'           =>  'required',
          'orderno'      =>  'required',
          'scheme'       =>  'required',
          'quantity'     =>  'required',
          'ANo'          =>  'required',
          ]);

      /*
      Increment $ano
      Insert into Consignee table
      Update Order table
      */
       // NOTE: Increment Amendment
      $Amend_no = $request->ANo;
      $Amend_no = $Amend_no + 1;
      //dd($Amend_no);

      $consignees = new consignee([
          'consignee' => $request->get('consignee'),
          'cqty'      => $request->get('cqty'),
          'PFT'     =>  $request->get('PFT'),
          'KFB'     =>  $request->get('KFB'),
          'KFC'     =>  $request->get('KFC'),
          'oid'     =>  $request->get('oid'),
        //  'oid'  => $request->id,
          'ANo'     => $Amend_no,
          'plantd'    => $request->get('plantd'),
          'Q1'     =>  $request->get('Q1'),
          'Q2'     =>  $request->get('Q2'),
          'Q3'     =>  $request->get('Q3'),
          'Q4'     =>  $request->get('Q4')

      ]);
        //return $consignees;
        $consignees->save();
        //return
        DB::table('orders')
        ->where('id',$request->id)
        ->update(['ANo' => $Amend_no]);
        //$orders = DB::table('orders')->find($request->id);
        //$orders->ANo = $Amend_no;
        //return [$orders];
        //$orders->update();
        return redirect()->route('join')->with('success', 'Data Updated');

    }
}
