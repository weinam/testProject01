@extends('layout')

@section('content')
	<h1 class="title">Edit Page</h1>
	
	<form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom:1em">
		@method('PATCH')
		@csrf

		<div class="field">
			<label class="label" for="title"></label>
			<div class="control">
				<input type="text" class="input" name="title" placeholder="Title" value="{{$project->title}}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for"description"></label>
			<div class="control">
				<textarea name="description" class="textarea">{{$project->description}}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Edit the project</button>
			</div>
		</div>
	</form>

	@include('errors')

	<form method="POST" action="/projects/{{ $project->id }}">
		@method('DELETE')
		@csrf

		<div class="field">
			<div class="control">
				<button type="submit" class="button">Delete</button>
			</div>
		</div>
	</form>

@endsection





