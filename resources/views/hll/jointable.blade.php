@extends('layouts.app')

@section('content')
<div class="container">    
    <br />
    <h3 align="center">All Orders</h3><div align=right><a href="{{route('home')}}"class="btn btn-primary" align='right'>Home</a></div>
    <br />
  <div class="table-responsive">
   <table class="table table-bordered table-striped">
          <thead>
           <tr>
               <th>Order No</th>
               <th>Scheme</th>
               <th>Quantity</th>
               <th>Consignee</th>
               <th>CQTY</th>
               <th>PFT</th>
               <th>KFB</th>
               <th>KFC</th>
               <th>Amendment No</th>
               <th>Plant</th>
               <th>Q1</th>
               <th>Q2</th>
               <th>Q3</th>
               <th>Q4</th>
               <th>Edit</th>
              
               
           </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
           <tr>
            <td>{{ $row->orderno }}</td>
            <td>{{ $row->scheme }}</td>
            <td>{{ $row->quantity }}</td>
            <td>{{ $row->consignee }}</td>
            <td>{{ $row->cqty }}</td>
            <td>{{ $row->PFT }}</td>
            <td>{{ $row->KFB }}</td>
            <td>{{ $row->KFC }}</td>
            <td>{{ $row->ANo }}</td>
            <td>{{ $row->plantd }}</td>
            <td>{{ $row->Q1 }}</td>
            <td>{{ $row->Q2 }}</td>
            <td>{{ $row->Q3 }}</td>
            <td>{{ $row->Q4 }}</td>
            <td><a href="{{action('OrderController@edit', ($row->id))}}" class="btn btn-warning">Edit</a></td>
    
            
            
           </tr>
          @endforeach
          </tbody>
      </table>
  </div>
 </div>
 @endsection