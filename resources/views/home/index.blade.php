@extends('layouts.admin')

@section('title', 'Mall | Home')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
	<a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
	@include('include.sidebar')
@endsection

@section('content_header', 'Home Pages')

@section('content')
	<section class="content">
		<div class="row">
			@if ($functions != null)
				@foreach ($functions as $function) 
					<div class="col-lg-4 col-xs-4">
			          <div class="small-box bg-aqua">
			            <div class="inner">
			              <p>{{ $function }}</p>
			            </div>
			            <a href="#" class="small-box-footer">GO <i class="fa fa-arrow-circle-right"></i></a>
			          </div>
			        </div>
				@endforeach
			@endif
	    </div>
	</section>
@endsection
