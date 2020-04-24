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
 
  <form method="post" action="{{action('Ordercontroller@updatec', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />

   <div class="form-group">
    <input type="text" name="oid" class="form-control" value="{{$consignees->oid}}" placeholder="Oid" />
   </div>
    
   <div class="form-group">
    <input type="text" name="consignee" class="form-control" value="{{$consignees->consignee}}" placeholder="Consignee" />
   </div>

   <div class="form-group">
    <input type="text" name="cqty" class="form-control" value="{{$consignees->cqty}}" placeholder="Cqty" />
   </div>

   <div class="form-group">
    <input type="text" name="PFT" class="form-control" value="{{$consignees->PFT}}" placeholder="PFT" />
   </div>

   <div class="form-group">
    <input type="text" name="KFB" class="form-control" value="{{$consignees->KFB}}" placeholder="KFB" />
   </div>

   <div class="form-group">
    <input type="text" name="KFC" class="form-control" value="{{$consignees->KFC}}" placeholder="KFC" />
   </div>
      
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
</div>
</form>
</div>
</div>

@endsection