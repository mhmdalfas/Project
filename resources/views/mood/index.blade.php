@extends('master')
@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Moods Domestic Despatch </h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
    <a href="{{route('mood.create')}}" class="btn btn-primary">Add New Order</a>
    <a href="{{ url('moodspdf/pdf') }}" class="btn btn-danger" align='right'>Convert into PDF</a>
    <br />
    <br />
   </div>
   
  <table class="table table-bordered table-striped" align=left>
   <tr>
    <th>SL NO</th>
    <th>STO Month</th>
    <th>Delivery No </th>
    <th>Goods Issue Date</th>
    <th>To Be displaced(in MC)</th>
    <th>Scheme</th>
    <th>Batch No</th>
    <th>Physically Ready Boxes</th>
    <th>Ready Date</th>
    <th>Despatch on Date </th>
    <th>Receiving Plant Desc</th>
    <th>Balance to be Despatched</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($moods as $row)
   <tr>
    
    <td>{{$row['slno']}}</td>
    <td>{{$row['stomonth']}}</td>
    <td>{{$row['deliveryno']}}</td>
    <td>{{$row['goodsissue']}}</td>
    <td>{{$row['qtytodespatch']}}</td>
    <td>{{$row['scheme']}}</td>
    <td>{{$row['batchno']}}</td>
    <td>{{$row['readyboxes']}}</td>
    <td>{{$row['readydate']}}</td>
    <td>{{$row['despatchdate']}}</td>
    <td>{{$row['consignee']}}</td>
    <td>{{$row['balance']}}</td>
   
    
    
    <td><a href="{{action('MoodsController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
        <form method="post" class="delete_form" action="{{action('MoodsController@destroy', $row['id'])}}">
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