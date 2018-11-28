@extends('layouts.admin')

@section('title', 'Mall | Project Create')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('content_header', 'Project Create Pages')

@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3>Create New Project</h3>
			</div>
			<form method="POST" action="/projects/store" class="form-horizontal">
			  @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Project Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Title" value={{ old('title') }}>
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Proejct Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description') }}">
                  </div>
                </div>
              </div>
              <div class="box-footer">
					{{-- <a href="{{ URL::previous() }}"><button class="btn btn-default">Back</button></a> --}}
					<button type="summit" name="action" value="back" class="btn btn-default">Back</button>
					<button type="summit" name="action" value="create" class="btn btn-primary" style="margin-left:5px">Create</button>
			  </div>

			  @include('errors')
            </form>
			
		</div>
	</section>
@endsection