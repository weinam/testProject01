@extends('layouts.admin')

@section('title', 'Mall | Functions Create')

@section('user_name')
    {{Auth::user()->name}}
@endsection

@section('profile_link')
  <a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Functions Create Pages')

@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3>Create New Function</h3>
			</div>
			<form method="POST" action="/functions/store" class="form-horizontal">
			  @csrf
              <div class="box-body">
                <div class="container">
                  	<label for="name">Function Name</label>
				  	<input type="text" name="name" placeholder="Function Name" value={{ old('name') }}>
                </div>
                <div class="container">
                  	<label for="name">Project</label>
				  	<select name="project_id">
				  		@foreach ($projects as $project)
				  			<option value="{{$project->id}}"> {{ $project->title }}</option>
				  		@endforeach
				  	</select>
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
