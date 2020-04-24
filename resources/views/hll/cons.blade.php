@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Amendment Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('hll.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Cid</th>
    <th>Oid</th>
    <th>Consignee</th>
    <th>Cqty</th>
    <th>PFT</th>
    <th>KFB</th>
    <th>KFC</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($consignee as $row)
   <tr>
    <td>{{$row['cid']}}</td>
    <td>{{$row['oid']}}</td>
    <td>{{$row['consignee']}}</td>
    <td>{{$row['cqty']}}</td>
    <td>{{$row['PFT']}}</td>
    <td>{{$row['KFB']}}</td>
    <td>{{$row['KFC']}}</td>
    <td><a href="{{action('consignees@edit', $row['oid'])}}" class="btn btn-warning">Edit</a></td>
    <td>
        <form method="post" class="delete_form" action="{{action('consignees@destroy', $row['oid'])}}">
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