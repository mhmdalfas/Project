<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DomesticPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('hll.domesticpdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('domestics')
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
     <h3 align="center">Domestic Despatch</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:6px;" width="1%">SL No.</th>
    <th style="border: 1px solid; padding:6px;" width="1%">Year</th>
    <th style="border: 1px solid; padding:6px;" width="3.25%">Date</th>
     <th style="border: 1px solid; padding:6px;" width="3.5%">Transporter</th>
     <th style="border: 1px solid; padding:6px;" width="1%">Lorry No</th>
     <th style="border: 1px solid; padding:6px;" width="3.5%">LR Date</th>
     <th style="border: 1px solid; padding:6px;" width="3.5%">Pickup Date</th>
     <th style="border: 1px solid; padding:6px;" width="2.5%">Scheme</th>
     <th style="border: 1px solid; padding:6px;" width="3.5%">Destination</th>
     <th style="border: 1px solid; padding:6px;" width="2%">No.of Boxes</th>
     <th style="border: 1px solid; padding:6px;" width="1%">Weight</th>
     <th style="border: 1px solid; padding:6px;" width="1%">Quantity</th>
     <th style="border: 1px solid; padding:6px;" width="1.75%">Rate</th>
     <th style="border: 1px solid; padding:6px;" width="5%">Total</th>
   </tr>
     ';  
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:8px;">'.$customer->slno.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->year.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->date.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->transporter.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->lrno.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->lrdate.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->pickupdate.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->scheme.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->destination.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->nobox.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->weight.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->quantity.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->rate.'</td>
       <td style="border: 1px solid; padding:8px;">'.$customer->total.'</td>
       

       
     
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}