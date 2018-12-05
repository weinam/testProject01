@extends('layouts.admin')

@section('title', 'Mall | Users Show')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
  <a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Users Show Pages')

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
          			<p><b>User Name : </b>{{ $user->name }}</p>
          		</span>
              <span>
                <p><b>User Role : </b>{{ $user->role }}</p>
              </span>
          		<span>
          			<p><b>User Created At : </b>{{ $user->created_at }}</p>
          		</span>
          		<span>
          			<p><b>User Updated At : </b>{{ $user->updated_at }}</p>
          		</span>
          	</div>
          	<div class="box-footer">
          		<a href="{{ URL::to('/users') }}"><button class="btn btn-default">Back</button></a>
          	</div>
          </div>
        </div>
      </div>
    </section>
@endsection
