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
		<form method="post" action="{{action('DespatchController@update', $id)}}">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH" />
			<div class="form-group">
				SL NO	<input type="text" name="slno" class="form-control" value="{{$mdespatch->slno}}" placeholder="SL NO" />
			</div>
			<div class="form-group">
				Date<input type="text" name="date" class="form-control" value="{{$mdespatch->date}}" placeholder="Date" />
			</div>
			<div class="form-group">
				Transporter	<input type="text" name="transporter" class="form-control" value="{{$mdespatch->transporter}}" placeholder="Transporter" />
			</div>
			<div class="form-group">
				LR NO<input type="text" name="lrno" class="form-control" value="{{$mdespatch->lrno}}" placeholder="LR NO" />
			</div>
			<div class="form-group">
				LR Date	<input type="text" name="lrdate" class="form-control" value="{{$mdespatch->lrdate}}" placeholder="LR Date" />
			</div>
			<div class="form-group">
				Pick Up Date<input type="text" name="pickupdate" class="form-control" value="{{$mdespatch->pickupdate}}" placeholder="Pick Up Date" />
			</div>
			<div class="form-group">
				Scheme	<input type="text" name="scheme" class="form-control" value="{{$mdespatch->scheme}}" placeholder="Scheme" />
			</div>
			<div class="form-group">
			Inspection Note No	<input type="text" name="inn" class="form-control" value="{{$mdespatch->inn}}" placeholder="Inspection Note No" />
			</div>
			<div class="form-group">
				Destination	<input type="text" name="destination" class="form-control" value="{{$mdespatch->destination}}" placeholder="Destination" />
			</div>
			<div class="form-group">
				NO Of Boxes	<input type="text" name="nobox" class="form-control" value="{{$mdespatch->nobox}}" placeholder="NO Of Boxes" />
			</div>
			<div class="form-group">
				Weight	<input type="text" name="weight" class="form-control" value="{{$mdespatch->weight}}" placeholder="Weight" />
			</div>
			<div class="form-group">
				Rate	<input type="text" name="rate" class="form-control" value="{{$mdespatch->rate}}" placeholder="Rate" />
			</div>
			<div class="form-group">
				Total Amount	<input type="text" name="amount" class="form-control" value="{{$mdespatch->amount}}" placeholder="Total Amount" />
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>
		</form>
	</div>
</div>
@endsection