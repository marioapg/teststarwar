@extends('layouts.main')

@section('content')
<div class="row buttom-bottom">
	<div class="col-md-8 table-responsive">
		<table id="myTable" class="table table-striped table-dark" data-toggle="table" data-toggle-search="false">
		<thead>
			<th scope="col" data-toggle-search="false">Name</th>
			<th scope="col" data-toggle-search="false">Sex</th>
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