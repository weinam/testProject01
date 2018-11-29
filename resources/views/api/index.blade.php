@extends('layouts.admin')

@section('title', 'Mall | Home')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('content_header', 'Home Pages')

@section('content')
	@if ($user->role_id == 1)
		<div>
			<p>API 1</p>
			<p>API 2</p>
			<p>API 3</p>
			<p>API 4</p>
			<p>API 5</p>
			<p>API 6</p>
		</div>
	@elseif ($user->role_id == 2)
		<div>
			<p>API 3</p>
			<p>API 4</p>
			<p>API 5</p>
			<p>API 6</p>
		</div>
	@else
		<div>
			<p>API 6</p>
		</div>
	@endif

@endsection
