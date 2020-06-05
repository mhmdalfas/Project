@extends('master')

@section('content')



<div class="row">
<div class="col-md-12">
<div align=right><a href="{{route('home')}}"class="btn btn-primary" align='right'>Home</a></div>
<h3 align="center">Moods Domestic Despatch</h3>
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
    <form method="post" action="{{url('mood')}}">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" name="slno" class="form-control" placeholder="SL No"  value="{{old('slno')}}" />
        </div>
        <div class="form-group">
            <input type="text" name="stomonth" class="form-control" placeholder="STO Month" value="{{old('stomonth')}}" />
        </div>
         
        <div class="form-group">
            <input type="text" name="deliveryno" class="form-control" placeholder="Delivery No"  value="{{old('deliveryno')}}" />
        </div>
        <div class="form-group">
            <input placeholder="Goods Issue Date" name="goodsissue" class="form-control"  value="{{old('goodsissue')}}" onfocus="(this.type='date')" onblur="(this.type='text')"/>
        </div>
        <div class="form-group">
            <input type="text" name="qtytodispatch" class="form-control" placeholder="To Be Dispatched (In MC)" value="{{old('qtytodispatch')}}" />
        </div>
        <div class="form-group">
            <input type="text" name="scheme" class="form-control" placeholder="Scheme" value="{{old('scheme')}}"/>
        </div>
        <div class="form-group">
            <input type="text" name="batchno" class="form-control" placeholder="Batch No." value="{{old('batchno')}}"/> 
        </div>
         <div class="form-group">
            <input type="text" name="readyboxes" class="form-control" placeholder="Physically Ready Boxes" value="{{old('readyboxes')}}"/> 
        </div>
        <div class="form-group">
            <input  name="readydate" class="form-control" placeholder="Physically Ready Date" value="{{old('readydate')}}" onfocus="(this.type='date')" onblur="(this.type='text')"/>
        </div>
        <div class="form-group">
            <input  name="despatchdate" class="form-control" placeholder="Despatch on date" value="{{old('despatchdate')}}" onfocus="(this.type='date')" onblur="(this.type='text')"/>
        </div>
        <div class="form-group">
            <input type="text" name="consignee" class="form-control" placeholder="Consignee" value="{{old('consignee')}}"/>
        </div>
        
        
        <div class="form-group" align=center>
            <input type="submit" class="btn btn-primary btn-lg" />
            <a href="" onclick='window.location.reload(true);' class="btn btn-primary btn-lg">Refresh</a>
        </div>
    </form>
</div>
@endsection