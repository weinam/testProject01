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
                <div class="container">
                  	<label for="role_name">Role Name</label>
				  	<input type="text" name="role_name" placeholder="Roles" value={{ old('role_name') }}>
                </div>
                <div class="container">
					<input type="checkbox" name="function[]" value="Function 1">Function 1<br>
	                <input type="checkbox" name="function[]" value="Function 2">Function 2<br>
	                <input type="checkbox" name="function[]" value="Function 3">Function 3<br>
	                <input type="checkbox" name="function[]" value="Function 4">Function 4<br>
	                <input type="checkbox" name="function[]" value="Function 5">Function 5<br>
					<input type="checkbox" name="function[]" value="Function 6">Function 6<br>
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