@extends('layouts.app')

@section('content')

<div class="row">
       <div class="col-md-12">
        <br />
        <h3>Edit Record</h3>
        <br />
        @if(count($errors) > 0)
      
        <div class="alert alert-danger">
               <ul>
               @foreach($errors->all() as $error)
                <li>{{$error}}</li>
               @endforeach
               </ul>
        @endif
 
  <form method="post" action="{{action('Ordercontroller@updateq', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group">
    <input type="text" name="cid" class="form-control" value="{{$quarters->oid}}" placeholder="Cid" />
   </div>
    
   <div class="form-group">
    <input type="text" name="ANo" class="form-control" value="{{$quarters->ANo}}" placeholder="ANo" />
   </div>

   <div class="form-group">
    <input type="text" name="plantd" class="form-control" value="{{$quarters->plantd}}" placeholder="plantd" />
   </div>

   <div class="form-group">
    <input type="text" name="Q1" class="form-control" value="{{$quarters->Q1}}" placeholder="Q1" />
   </div>

   <div class="form-group">
    <input type="text" name="Q2" class="form-control" value="{{$quarters->Q2}}" placeholder="Q2" />
   </div>

   <div class="form-group">
    <input type="text" name="Q3" class="form-control" value="{{$quarters->Q3}}" placeholder="Q3" />
   </div>

   <div class="form-group">
    <input type="text" name="Q4" class="form-control" value="{{$quarters->Q4}}" placeholder="Q4" />
   </div>

   
      
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
</div>
</form>
</div>
</div>

@endsection