@extends('master')
@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Government Despatch </h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
    <a href="{{route('mdespatch.create')}}" class="btn btn-primary">Add New Order</a>
    <a href="{{url('governmentpdf/pdf')}}" class="btn btn-danger">Convert to PDF</a>
    <br />
    <br />
   </div>
   
  <table class="table table-bordered table-striped" align=left>
   <tr>
    <th>SL NO</th>
    <th>Year</th>
    <th>Date</th>
    <th>Transporter</th>
    <th>Lorry No</th>
    <th>Lorry Receipt Date</th>
    <th>Pick Up Date</th>
    <th>Scheme</th>
    <th>Inspection Note No</th>
    <th>Destination</th>
    <th>No Of Boxes</th>
    <th>Weight</th>
    <th>Quantity</th>
    <th>Rate</th>
    <th>Total</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($mdespatches as $row)
   <tr>
    
    <td>{{$row['slno']}}</td>
    <td>{{$row['year']}}</td>
    <td>{{$row['date']}}</td>
    <td>{{$row['transporter']}}</td>
    <td>{{$row['lrno']}}</td>
    <td>{{$row['lrdate']}}</td>
    <td>{{$row['pickupdate']}}</td>
    <td>{{$row['scheme']}}</td>
    <td>{{$row['inn']}}</td>
    <td>{{$row['destination']}}</td>
    <td>{{$row['nobox']}}</td>
    <td>{{$row['weight']}}</td>
    <td>{{$row['quantity']}}</td>
    <td>{{$row['rate']}}</td>
    <td>{{$row['total']}}</td>
    
    
    <td><a href="{{action('DespatchController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
        <form method="post" class="delete_form" action="{{action('DespatchController@destroy', $row['id'])}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Delete</button>
           </form>
    </td>
   </tr>
   @endforeach
  </table>
 </div>
</div>

<script>
    $(document).ready(function(){
     $('.delete_form').on('submit', function(){
      if(confirm("Are you sure you want to delete it?"))
      {
       return true;
      }
      else
      {
       return false;
      }
     });
    });
    </script>

@endsection