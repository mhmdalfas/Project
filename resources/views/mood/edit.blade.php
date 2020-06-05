@extends('master')
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
		<form method="post" action="{{action('MoodsController@update', $id)}}">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH" />
			<div class="form-group">
				SL NO	<input type="text" name="slno" class="form-control" value="{{$mood->slno}}" placeholder="SL NO" />
			</div>
			<div class="form-group">
				Date<input type="text" name="stomonth" class="form-control" value="{{$mood->stomonth}}" placeholder="STO Month" />
			</div>
			<div class="form-group">
				Transporter	<input type="text" name="deliveryno" class="form-control" value="{{$mood->deliveryno}}" placeholder="Delivery No" />
			</div>
			<div class="form-group">
				LR NO<input type="text" name="goodsissue" class="form-control" value="{{$mood->goodsissue}}" placeholder="Goods Issue Date" />
			</div>
			<div class="form-group">
				LR Date	<input type="text" name="qtytodispatch" class="form-control" value="{{$mood->qtytodispatch}}" placeholder="To Be displaced(in MC)" />
			</div>
			<div class="form-group">
				Pick Up Date<input type="text" name="scheme" class="form-control" value="{{$mood->scheme}}" placeholder="Scheme" />
			</div>
			<div class="form-group">
				Scheme	<input type="text" name="batchno" class="form-control" value="{{$mood->batchno}}" placeholder="Batch No" />
			</div>
			
			<div class="form-group">
				Destination	<input type="text" name="readyboxes" class="form-control" value="{{$mood->readyboxes}}" placeholder="Physically Ready Boxes" />
			</div>
			<div class="form-group">
				NO Of Boxes	<input type="text" name="readydate" class="form-control" value="{{$mood->readydate}}" placeholder="Ready Date" />
			</div>
			<div class="form-group">
				Weight	<input type="text" name="despatchdate" class="form-control" value="{{$mood->despatchdate}}" placeholder="Despatch on Date" />
			</div>
			<div class="form-group">
				Rate	<input type="text" name="consignee" class="form-control" value="{{$mood->consignee}}" placeholder="Receiving Plant Desc" />
			</div>
			<div class="form-group">
				Total Amount	<input type="text" name="balance" class="form-control" value="{{$mood->balance}}" placeholder="Balance to be Despatched" />
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>
		</form>
	</div>
</div>
@endsection