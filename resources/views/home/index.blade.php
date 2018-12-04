@extends('layouts.admin')

@section('title', 'Mall | Home')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
	{{ $user->id }}
@endsection

@section('content_header', 'Home Pages')

@section('content')
	<section class="content">
		<div class="row">
		
		@if ($function != null)
			@for ($i=0; $i<sizeof($function); $i++)
				<div class="col-lg-2 col-xs-4">
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <p>API {{ $function[$i] }}</p>
		            </div>
		            <a href="#" class="small-box-footer">GO <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
			@endfor
		@endif
	    </div>
	</section>
	
	{{-- @if ($user->role == 'admin')
		<div>
			<p>API 1</p>
			<p>API 2</p>
			<p>API 3</p>
			<p>API 4</p>
			<p>API 5</p>
			<p>API 6</p>
		</div>
	@elseif ($user->role_id == 'security')
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
	@endif --}}

@endsection
