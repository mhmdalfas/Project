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
        @if(\Session::has('success'))
        <div class="alert alert-success">
         <p>{{ \Session::get('success') }}</p>
        </div>
        @endif


  <form method="get" action="{{action('JoinTableController@update','$data')}}">
    {{csrf_field()}}

  <tbody>
       <input type="hidden" name="_method" value="PATCH" />
       @foreach( $data as $data )
          <div class="form-group">
            <input type="text" name="id" class="form-control" value="{{ $data->id }}"  hidden/>
          </div>

          <div class="form-group">
              <input type="text" name="ANo" class="form-control" value="{{ $data->ANo }}"  hidden/>
          </div>

          <div class="form-group">
              <input type="text" name="oid" class="form-control" value="{{ $data->oid }}"  hidden/>
          </div>

          <div class="form-group">
              Order No:   <input type="text" name="orderno" class="form-control" value="{{ $data->orderno }}" placeholder="Enter Order No" readonly/>
          </div>

          <div class="form-group">
              Scheme: <input type="text" name="scheme" class="form-control" value="{{$data->scheme}}" placeholder="Enter Scheme" readonly/>
          </div>

          <div class="form-group">
                Quantity: <input type="text" name="quantity" class="form-control" value="{{$data->quantity}}" placeholder="Enter Quantity" readonly />
          </div>

          <div class="form-group">
                Consignee Name: <input type="text" name="consignee" class="form-control" value="{{$data->consignee}}" placeholder="Consignee" />
          </div>

          <div class="form-group">
                Consignee Quantity: <input type="text" name="cqty" class="form-control" value="{{$data->cqty}}" placeholder="Cqty" />
          </div>

          <div class="form-group">
                PFT: <input type="text" name="PFT" class="form-control" value="{{$data->PFT}}" placeholder="PFT" />
          </div>

          <div class="form-group">
                KFB: <input type="text" name="KFB" class="form-control" value="{{$data->KFB}}" placeholder="KFB" />
          </div>

          <div class="form-group">
                KFC: <input type="text" name="KFC" class="form-control" value="{{$data->KFC}}" placeholder="KFC" />
          </div>

          <div class="form-group">
                Plant Id:  <input type="text" name="plantd" class="form-control" value="{{$data->plantd}}" placeholder="plantd" />
          </div>

          <div class="form-group">
                Quarter1 %:  <input type="text" name="Q1" class="form-control" value="{{$data->Q1}}" placeholder="Q1" />
          </div>

          <div class="form-group">
                Quarter2 %:    <input type="text" name="Q2" class="form-control" value="{{$data->Q2}}" placeholder="Q2" />
          </div>

          <div class="form-group">
                Quarter3 %:  <input type="text" name="Q3" class="form-control" value="{{$data->Q3}}" placeholder="Q3" />
          </div>

          <div class="form-group">
              Quarter4 %:  <input type="text" name="Q4" class="form-control" value="{{$data->Q4}}" placeholder="Q4" />
          </div>
       @endforeach

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Edit" />
    </div>
  
    </form>



   </tr>
  </tbody>
</form>
</div>
</div>

@endsection
