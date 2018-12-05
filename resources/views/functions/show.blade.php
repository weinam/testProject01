@extends('layouts.admin')

@section('title', 'Mall | Functions Show')

@section('user_name')
    {{Auth::user()->name}}
@endsection

@section('profile_link')
  <a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Functions Show Pages')

@section('content')
	<section class="content">
	    <div class="row">
	      <div class="col-xs-12">
	        <div class="box">
	        	<div class="box-header with-border">
	        		<h3>Detail</h3>
	        	</div>
	        	<div class="box-body">
	        		<span>
	        			<p><b>Function Name : </b>{{ $function->name }}</p>
	        		</span>
	        		<span>
	        			<p><b>Functions Created At : </b>{{ $function->created_at }}</p>
	        		</span>
	        		<span>
	        			<p><b>Functions Updated At : </b>{{ $function->updated_at }}</p>
	        		</span>
	        	</div>
	        	<div class="box-footer">
	        		<a href="{{ URL::to('/functions') }}"><button class="btn btn-default">Back</button></a>
	        	</div>
	        </div>
	      </div>
	    </div>
	</section>
@endsection
