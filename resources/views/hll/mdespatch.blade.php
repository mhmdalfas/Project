@extends('layouts.app')


@section('content')

<div class="row">
 <div class="col-md-12">
  <div align=right><a href="{{route('home')}}"class="btn btn-primary" align='right'>Home</a></div>
  <div align=right><a href="{{route('mdata')}}"class="btn btn-primary" align='right'>View Data</a></div>

  <h3 align="center">Moods Despatch</h3>

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

  <form method="post" action="{{url('mdespatch')}}">
    {{csrf_field()}}
        <div class="form-group">
        <input type="text" name="slno" class="form-control" placeholder="SL No" value="{{old('slno')}}" />
         </div>

         <div class="form-group">
         <input type="date" name="date" class="form-control" placeholder="Date" value="{{old('date')}}" />
         </div>

         <div class="form-group">
         <input type="text" name="transporter" class="form-control" placeholder="Transporter" value="{{old('transporter')}}" />
         </div>


            <div class="form-group">
            <input type="text" name="lrno" class="form-control" placeholder="LR No" value="{{old('lrno')}}"/>
            </div>

            <div class="form-group">
            <input type="date" name="lrdate" class="form-control" placeholder="LR Date" value="{{old('lrdate')}}"/>
            </div>

            <div class="form-group">
              <input type="date" name="pickupdate" class="form-control" placeholder="Pickup Date" value="{{old('pickupdate')}}"/>
              </div>

              <div class="form-group">
              <input type="text" name="scheme" class="form-control" placeholder="Scheme" value="{{old('scheme')}}"/>
              </div>
              <div class="form-group">
                <input type="text" name="destination" class="form-control" placeholder="Destination" value="{{old('destination')}}"/>
                </div>


                 <div class="form-group">
                 <input type="text" name="nobox" class="form-control" placeholder="No Of Boxes" value="{{old('nobox')}}"/>
                 </div>
                 <div class="form-group">
                 <input type="text" name="weight" class="form-control" placeholder="Weight" value="{{old('weight')}}"/>
                 </div>
                 <div class="form-group">
                 <input type="text" name="rate" class="form-control" placeholder="Rate" value="{{old('rate')}}"/>
                 </div>
                 <div class="form-group">
                 <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{old('amount')}}"/>
                 </div>
                 




       <div class="form-group" align=center>
       <input type="submit" class="btn btn-primary btn-lg" />
       <a href="" onclick='window.location.reload(true);' class="btn btn-primary btn-lg">Refresh</a>



         </div>
       </form>
      </div>

@endsection