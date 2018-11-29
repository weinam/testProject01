@extends('layouts.admin')

@section('title', 'Mall | Roles Set')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('content_header', 'Roles Set Pages')

@section('content')
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<div class="box-header with-border">
          		<h3>Detail</h3>
          	</div>
          	<div class="box-body">
          		@foreach ($users as $user)
          			<span>
          				<p>{{ $user->name }}</p>
          			</span>
          		@endforeach
          	</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<div class="box-header with-border">
          		<h3>Detail</h3>
          	</div>
          	<div class="box-body">
          		@foreach ($roles as $role)
          			<span>
          				<p>{{ $role->role_name }}</p>
          			</span>
          		@endforeach
          	</div>
          	<form method="POST" action="/rolesset/store">
          		@csrf
          		<input type="text" name="user">
          		<input type="text" name="role">
          		<button type="summit">Summit</button>
          	</form>
          </div>
        </div>
      </div>
    </section>
@endsection
