<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('hll.dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('orders')
     ->join('consignees', 'consignees.oid','=' , 'orders.id')

     ->select('consignees.*','orders.*'  )
     ->get();
         
        
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     $pdf->setPaper('A4', 'landscape');
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="15%">Order No</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Scheme</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Quantity</th>
     <th style="border: 1px solid; padding:12px;" width="15%">Consignee</th>
     <th style="border: 1px solid; padding:12px;" width="15%">CQuantity</th>
     <th style="border: 1px solid; padding:12px;" width="10%">PFT</th>
     <th style="border: 1px solid; padding:12px;" width="10%">KFB</th>
     <th style="border: 1px solid; padding:12px;" width="10%">KFC</th>
     <th style="border: 1px solid; padding:12px;" width="10%">Plant Details</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Q1</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Q2</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Q3</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Q4</th>
   
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->orderno.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->scheme.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->consignee.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->cqty.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->PFT.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->KFB.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->KFC.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->plantd.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Q1.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Q2.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Q3.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Q4.'</td>
       

       
     
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
