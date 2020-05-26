@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Moods Despatch </h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  
  <table class="table table-bordered table-striped">
   <tr>
    <th>SL NO</th>
    <th>Date</th>
    <th>Transporter</th>
    <th>LR NO</th>
    <th>LR Date</th>
    <th>Pick Up Date</th>
    <th>Scheme</th>
    <th>Destination</th>
    <th>No Of Boxes</th>
    <th>Weight</th>
    <th>Rate</th>
    <th>Amount</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($mdespatch as $row)
   <tr>
    <td>{{$row['slno']}}</td>
    <td>{{$row['date']}}</td>
    <td>{{$row['transporter']}}</td>
    <td>{{$row['lrno']}}</td>
    <td>{{$row['lrdate']}}</td>
    <td>{{$row['pickupdate']}}</td>
    <td>{{$row['scheme']}}</td>
    <td>{{$row['destination']}}</td>
    <td>{{$row['nobox']}}</td>
    <td>{{$row['weight']}}</td>
    <td>{{$row['rate']}}</td>
    <td>{{$row['amount']}}</td>
    
    
    <td><a href="" class="btn btn-warning">Edit</a></td>
    <td>
        <form method="post" class="delete_form" action="">
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