@extends('layouts.app')


@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Amendment Data</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="{{url('hll')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="orderno" class="form-control" placeholder="Sale Order No" />
   </div>
   <div class="form-group">
    <input type="text" name="scheme" class="form-control" placeholder="Scheme" />
   </div>
   <div class="form-group">
    <input type="text" name="Quantity" class="form-control" placeholder="Quantity" />
   </div> <div class="form-group">
    <input type="text" name="PFT" class="form-control" placeholder="PFT" />
   </div>
   <div class="form-group">
    <input type="text" name="KFB" class="form-control" placeholder="KFB" />
   </div>
   <div class="form-group">
    <input type="text" name="KFC" class="form-control" placeholder="KFC" />
   </div>
   <div class="form-group">
    <input type="text" name="Q1" class="form-control" placeholder="Q1" />
   </div>
   <div class="form-group">
    <input type="text" name="Q2" class="form-control" placeholder="Q2" />
   </div>
   <div class="form-group">
    <input type="text" name="Q3" class="form-control" placeholder="Q3" />
   </div>
   <div class="form-group">
    <input type="text" name="Q4" class="form-control" placeholder="Q4" />
   </div>
   <div class="form-group">
    <input type="text" name="Qr1" class="form-control" placeholder="Qr1" />
   </div>
   <div class="form-group">
    <input type="text" name="ANo" class="form-control" placeholder="Amendment No" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection