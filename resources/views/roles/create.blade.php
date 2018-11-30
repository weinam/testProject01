@extends('layouts.admin')

@section('title', 'Mall | Role Create')

@section('user_name')
	{{Auth::user()->name}}
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
                <div class="form-group">
                  <label for="role_name" class="col-sm-2 control-label">Role Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="role_name" placeholder="Roles" value={{ old('role_name') }}>
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