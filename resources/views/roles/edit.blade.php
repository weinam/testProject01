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
              	<div class="container">
              		<label for="role_name">Role Name</label>
              		<input type="text" name="role_name" placeholder="Title" value="{{ $role->role_name }}">
              	</div>
              	<div class="container">
                  @for ($i=0; $i<sizeof($isChecked); $i++)
                    <input type="checkbox" name="function[]" value="{{$i+1}}" {{$isChecked[$i] ? "checked":""}}> Function {{$i+1}}<br>
                  @endfor
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