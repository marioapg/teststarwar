@extends('layouts.main')

@section('content')

	<th scope="col">Name</th>
	@foreach($persons->results as $person)
		<tr>
			<td>
				{{ $person->name }}
			</td>
		</tr>
	@endforeach

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