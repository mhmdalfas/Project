
@extends('layouts.app')

@section('content')
<div class="container">
    <br />
    <h3 align="center">Order Amendments</h3>
    <div class="col-md" align='right'>
            <a href="{{route('home')}}"class="btn btn-primary" align='right'>Home</a>
            <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger" align='right'>Convert into PDF</a>
     </div>
    </div>
    <br />

    <div class="col-md-2">
        <form action="/search" method="get">
           <div class="input-group">
               <input type="search" name="search" class="form-control">
               <span class="input-group-prepend">
                   <button type="submit"  class="btn btn-primary">Search</button>
               </span>
            </div>

        </form>
        </div>




  <div >
   <table class="table table-bordered ">
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
               <th>Created Date </th>
               <th>Updated Date</th>


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
            <td>{{ $row->created_at}}</td>
            <td>{{ $row->updated_at }}</td>



           </tr>
          @endforeach
          </tbody>
      </table>
  </div>
 </div>
 @endsection
