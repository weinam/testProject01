@extends('layout')

@section('content')
	<h1 class="title">Index Pages</h1>
	
	@foreach($projects as $project)
		<li>
			<a href="/projects/{{ $project->id }}">
				{{ $project->title }}
			</a>
		</li>
	@endforeach
@endsection
