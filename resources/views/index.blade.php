@extends('layouts.main')

@section('content')

<div class="col-md-8 container-fluid">
	<table class="table table-striped table-dark">
	<thead>
		<th scope="col">Name</th>
		<th scope="col">Sex</th>
		<th scope="col">Especies</th>
	</thead>
	
	@foreach($persons->results as $person)
		<tr>
			<td>
				<a href="{{ route('details',['urlparam' => $person->url]) }}">{{ $person->name }}</a>
			</td>
			<td>
				@if($person->gender == 'male')
					<i class="zmdi zmdi-male"></i>
				@else
					@if($person->gender == 'female')
						<i class="zmdi zmdi-female"></i>
					@else
						<i class="zmdi zmdi-account-circle"></i>
					@endif
				@endif
			</td>
			<td>
				{{ $person->species }}
			</td>
		</tr>
	@endforeach

	</table>
</div>
@endsection

@section('bottom')
	<div class="row buttom-bottom">
		@if($persons->previous)
			<a href="{{ route('home',['urlparam' => $persons->previous]) }}">
				<button>Previous</button>
			</a>
		@else
			<button disabled="">
				<a href="#">Previous</a>
			</button>
		@endif

		@if($persons->next)
			<a href="{{ route('home',['urlparam' => $persons->next]) }}">
				<button>Next</button>
			</a>
		@else
			<button disabled="">
				<a href="#">Next</a>
			</button>
		@endif
	</div>
@endsection