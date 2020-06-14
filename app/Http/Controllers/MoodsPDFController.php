<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class MoodsPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('hll.moodspdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('moods')->get();
         
        
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
    <th style="border: 1px solid; padding:12px;" width="15%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="15%">SL NO</th>
    <th style="border: 1px solid; padding:12px;" width="15%">ST Month</th>
     <th style="border: 1px solid; padding:12px;" width="15%">Delivery No</th>
     <th style="border: 1px solid; padding:12px;" width="15%">Goods Issue</th>
     <th style="border: 1px solid; padding:12px;" width="10%">Quantity to be dispatched</th>
     <th style="border: 1px solid; padding:12px;" width="10%">Scheme</th>
     <th style="border: 1px solid; padding:12px;" width="10%">Batch No </th>
     <th style="border: 1px solid; padding:12px;" width="10%">Raedy Boxes</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Ready Date</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Despatch Date</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Consignee</th>
     <th style="border: 1px solid; padding:12px;" width="5%">Balance</th>
   
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->slno.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->stomonth.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->deliveryno.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->goodsissue.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->qtytodespatch.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->scheme.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->batchno.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->readyboxes.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->readydate.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->despatchdate.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->consignee.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->balance.'</td>
       

       
     
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}