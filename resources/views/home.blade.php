@extends('layouts.app')

@section('content')
<br><br><br>
<br><br><br><br>

<div align=center>
<div  class="container">
        <a href="{{route('store')}}"class="btn btn-primary btn-lg">New Order</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('search')}}"class="btn btn-primary btn-lg">Search Amendments</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('join')}}"class="btn btn-primary btn-lg">View Data</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('mdespatch.index')}}"class="btn btn-primary btn-lg">Govt Despatch</a>
<br><br><br><br>

</div>



@endsection
