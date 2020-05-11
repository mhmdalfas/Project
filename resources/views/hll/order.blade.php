@extends('layouts.app')


@section('content')

<div class="row">
 <div class="col-md-12">
  <div align=right><a href="{{route('home')}}"class="btn btn-primary" align='right'>Home</a></div>

  <h3 align="center">Amendment Data</h3>

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




  <div>

  <form method="post" action="{{url('hll')}}">
    {{csrf_field()}}
        <div class="form-group">
        <input type="text" name="orderno" class="form-control" placeholder="Sale Order No" value="{{old('orderno')}}" />
         </div>

         <div class="form-group">
         <input type="text" name="scheme" class="form-control" placeholder="Scheme" value="{{old('scheme')}}" />
         </div>

         <div class="form-group">
         <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{old('quantity')}}" />
         </div>


            <div class="form-group">
            <input type="text" name="consignee" class="form-control" placeholder="Consignee" value="{{old('consignee')}}"/>
            </div>

            <div class="form-group">
            <input type="text" name="cqty" class="form-control" placeholder="CQty" value="{{old('cqty')}}"/>
            </div>

            <div class="form-group">
              <input type="text" name="PFT" class="form-control" placeholder="PFT" value="{{old('PFT')}}"/>
              </div>

              <div class="form-group">
              <input type="text" name="KFB" class="form-control" placeholder="KFB" value="{{old('KFB')}}"/>
              </div>
              <div class="form-group">
                <input type="text" name="KFC" class="form-control" placeholder="KFC" value="{{old('KFC')}}"/>
                </div>


                 <div class="form-group">
                 <input type="text" name="plantd" class="form-control" placeholder="plantd" value="{{old('plantd')}}"/>
                 </div>
                 <div class="form-group">
                 <input type="text" name="Q1" class="form-control" placeholder="Q1" value="{{old('Q1')}}"/>
                 </div>
                 <div class="form-group">
                 <input type="text" name="Q2" class="form-control" placeholder="Q2" value="{{old('Q2')}}"/>
                 </div>
                 <div class="form-group">
                 <input type="text" name="Q3" class="form-control" placeholder="Q3" value="{{old('Q3')}}"/>
                 </div>
                 <div class="form-group">
                 <input type="text" name="Q4" class="form-control" placeholder="Q4" value="{{old('Q4')}}"/>
                 </div>






       <div class="form-group" align=center>
       <input type="submit" class="btn btn-primary btn-lg" />
       <a href="" onclick='window.location.reload(true);' class="btn btn-primary btn-lg">Refresh</a>



         </div>
       </form>
      </div>

@endsection
