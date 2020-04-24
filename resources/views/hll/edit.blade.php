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
 
  <form method="get" action="{{action('JoinTableController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
    
   <div class="form-group">
    <input type="text" name="orderno" class="form-control" value="{{$orders->orderno}}" placeholder="Enter Order No" readonly/>
   </div>

   <div class="form-group">
    <input type="text" name="scheme" class="form-control" value="{{$orders->scheme}}" placeholder="Enter Scheme" readonly/>
   </div>

   <div class="form-group">
       <input type="text" name="quantity" class="form-control" value="{{$orders->quantity}}" placeholder="Enter Quantity" readonly />
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