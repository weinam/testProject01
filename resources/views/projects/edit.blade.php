@extends('layouts.admin')

@section('title', 'Mall | Project Edit')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
	{{ Auth::user()->id }}
@endsection

@section('sidebar')
	@include('include.sidebar')
@endsection

@section('content_header', 'Project Edit Page')

@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3>Edit Project</h3>
			</div>
			<form method="POST" action="/projects/{{ $project->id }}/update" class="form-horizontal">
			  @method('PATCH')
			  @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Project Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $project->title }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Proejct Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $project->description }}">
                  </div>
                </div>
              </div>
              <div class="box-footer">
					{{-- <a href="{{ URL::previous() }}"><button class="btn btn-default">Back</button></a> --}}
					<button type="summit" name="action" value="back" class="btn btn-default">Back</button>
					<button type="summit" name="action" value="edit" class="btn btn-primary" style="margin-left:5px">Edit</button>
			  </div>

			  @include('errors')
            </form>
			
		</div>
	</section>
@endsection