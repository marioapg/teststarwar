@extends('layouts.main')

@section('content')

<div class="col-md-8 container-fluid">
	<table class="table table-striped table-dark">
		<thead>
			<th scope="col">{{ $details->name }}</th>
		</thead>
		<tbody>
				<tr><td>{{ $details->height }}</td></tr>
				<tr><td>{{ $details->mass }}</td></tr>
				<tr><td>{{ $details->hair_color }}</td></tr>
				<tr><td>{{ $details->skin_color }}</td></tr>
				<tr><td>{{ $details->eye_color }}</td></tr>
				<tr><td>{{ $details->birth_year }}</td></tr>
				<tr><td>{{ $details->gender }}</td></tr>
		</tbody>
	</table>
</div>

@endsection

@section('bottom')
	<div class="row buttom-bottom">
		<a href="{{ URL::previous() }}">
			<button>Return to index</button>
		</a>
	</div>
@endsection