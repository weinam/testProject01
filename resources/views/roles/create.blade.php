@extends('layouts.admin')

@section('title', 'Mall | Role Create')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
	<a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
	@include('include.sidebar')
@endsection

@section('content_header', 'Role Create Pages')

@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3>Create New Role</h3>
			</div>
			<form method="POST" action="/roles/store" class="form-horizontal">
			  @csrf
              <div class="box-body">
                <div class="container">
                  	<label for="role_name">Role Name</label>
				  	<input type="text" name="role_name" placeholder="Roles" value={{ old('role_name') }}>
                </div>
                <div class="container">
                  	<label for="project_id">Project</label>
                  	<select name="project_id" onchange="this.form.submit()">
				  		@foreach ($projects as $project)
					  		<option value="{{$project->id}}" {{$project->id == $session_project_id ? "selected":""}}> {{$project->title}}</option>
					  	@endforeach
					</select>
                </div>
                <div class="container">
                	@foreach ($functions as $function)
                		@if ($function->project_id == $session_project_id)
                			<input type="checkbox" name="function[]" value="{{$function->id}}"> {{ $function->name }}<br>
                		@endif
                	@endforeach
                </div>
              </div>
              <div class="box-footer">
					<button type="summit" name="action" value="back" class="btn btn-default">Back</button>
					<button type="summit" name="action" value="create" class="btn btn-primary" style="margin-left:5px">Create</button>
			  </div>

			  @include('errors')
            </form>
			
		</div>
	</section>
@endsection