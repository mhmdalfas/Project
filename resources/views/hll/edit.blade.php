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

  <form method="get" action="{{action('JoinTableController@update',$data ?? '')}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   @foreach ($orders as $order)
   <div class="form-group">
    <input type="text" name="orderno" class="form-control" value="{{$order->orderno}}" placeholder="Enter Order No" readonly/>
   </div>
   @endforeach
   @stop
   <div class="form-group">
    <input type="text" name="scheme" class="form-control" value="{{$orders->scheme}}" placeholder="Enter Scheme" readonly/>
   </div>

   <div class="form-group">
       <input type="text" name="quantity" class="form-control" value="{{$orders->quantity}}" placeholder="Enter Quantity" readonly />
      </div>



      <div class="form-group">
       <input type="text" name="consignee" class="form-control" value="{{$consignee->consignee}}" placeholder="Consignee" />
      </div>

      <div class="form-group">
       <input type="text" name="cqty" class="form-control" value="{{$consignee->cqty}}" placeholder="Cqty" />
      </div>

      <div class="form-group">
       <input type="text" name="PFT" class="form-control" value="{{$consignee->PFT}}" placeholder="PFT" />
      </div>

      <div class="form-group">
       <input type="text" name="KFB" class="form-control" value="{{$consignee->KFB}}" placeholder="KFB" />
      </div>

      <div class="form-group">
       <input type="text" name="KFC" class="form-control" value="{{$consignee->KFC}}" placeholder="KFC" />
      </div>

      <div class="form-group">
       <input type="text" name="ANo" class="form-control" value="{{$consignee->ANo}}" placeholder="ANo" />
      </div>

      <div class="form-group">
       <input type="text" name="plantd" class="form-control" value="{{$consignee->plantd}}" placeholder="plantd" />
      </div>

      <div class="form-group">
       <input type="text" name="Q1" class="form-control" value="{{$consignee->Q1}}" placeholder="Q1" />
      </div>

      <div class="form-group">
       <input type="text" name="Q2" class="form-control" value="{{$consignee->Q2}}" placeholder="Q2" />
      </div>

      <div class="form-group">
       <input type="text" name="Q3" class="form-control" value="{{$consignee->Q3}}" placeholder="Q3" />
      </div>

      <div class="form-group">
       <input type="text" name="Q4" class="form-control" value="{{$consignee->Q4}}" placeholder="Q4" />
      </div>


   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
</div>
</form>
</div>
</div>

@endsection
