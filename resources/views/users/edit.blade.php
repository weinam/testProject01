@extends('layouts.admin')

@section('title', 'Mall | Users Edit')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
	<a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
	@include('include.sidebar')
@endsection

@section('content_header', 'Users Edit Page')

@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3>Edit Users</h3>
			</div>
			<form method="POST" action="/users/{{$user->id}}/update" class="form-horizontal">
			  @method('PATCH')
			  @csrf
              <div class="box-body">
              	<div class="container">
              		<label for="name">User Name</label>
              		<input type="text" name="name" placeholder="Title" value="{{ $user->name }}">
              	</div>
              	<div class="container">
                 	<label for="role">User Role</label>
              		<select name="role_id" style="margin-left: 9px;">
		            	@foreach ($roles as $role)
		            		<option value={{$role->id}} {{$role->id == $user->role_id ? "selected":""}}> {{ $role->role_name }}</option>
		            	@endforeach
		            </select>
                </div>
              </div>
              <div class="box-footer">
					<button type="summit" name="action" value="back" class="btn btn-default">Back</button>
					<button type="summit" name="action" value="edit" class="btn btn-primary" style="margin-left:5px">Edit</button>
			  </div>
			  @include('errors')
            </form>
		</div>
	</section>
@endsection