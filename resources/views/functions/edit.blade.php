@extends('layouts.admin')

@section('title', 'Mall | Functions Edit')

@section('user_name')
    {{Auth::user()->name}}
@endsection

@section('profile_link')
  <a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Functions Edit Pages')

@section('content')
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3>Edit Function</h3>
			</div>
			<form method="POST" action="/functions/{{$function->id}}/update" class="form-horizontal">
			  @method('PATCH')
			  @csrf
              <div class="box-body">
              	<div class="container">
              		<label for="name">Function Name</label>
              		<input type="text" name="name" placeholder="Title" value="{{ $function->name }}">
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
