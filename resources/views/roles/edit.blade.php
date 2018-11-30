@extends('layouts.admin')

@section('title', 'Mall | Roles Edit')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('content_header', 'Roles Edit Page')

@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3>Edit Roles</h3>
			</div>
			<form method="POST" action="/roles/{{ $role->id }}/update" class="form-horizontal">
			  @method('PATCH')
			  @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="role_name" class="col-sm-2 control-label">Role Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="role_name" placeholder="Title" value="{{ $role->role_name }}">
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