@extends('layouts.admin')

@section('title', 'Mall | Functions')

@section('user_name')
    {{Auth::user()->name}}
@endsection

@section('profile_link')
  <a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Functions Pages')

@section('content')
	<section class="content">
	    <div class="row">
	      <div class="col-xs-12">
	        <div class="box">
	          <div class="box-header col-xs-8">
	            <h3 class="box-title">Table</h3>
	          </div>
	          <div class="box-header col-xs-4">
	          	<h6 class="text-right">
	              <span><a href="/functions/create">Create new functions</a></span>
	            </h6>
	          </div>
	          <div class="box-body" >
	            <table id="model_table" class="table table-bordered">
	              <thead>
	                <tr>
	                  <th>Functions Name</th>
	                  <th>Created At</th>
	                  <th>Updated At</th>
	                  <th width=140px"></th>
	                </tr>
	              </thead>
	              <tbody>
	              	@foreach ($finals as $final)
	                  <tr>
	                    <td>{{ $final->name }}</td>
	                    <td>{{ $final->created_at }}</td>
	                    <td>{{ $final->updated_at }}</td>
	                    <td>
	                      <div class="col-xs-4">
	                        <a href="/functions/{{$final->id}}/show" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-book text-blue"></i></a>
	                      </div>
	                      <div class="col-xs-4">
	                        <a href="/functions/{{$final->id}}/edit" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-edit text-blue"></i></a>
	                      </div>
	                      <div class="col-xs-4">
	                        <form method="POST" action="/functions/{{$final->id}}/delete" id="delete_form">
	                          @method('PATCH')
	                          @csrf
	                          <button type="summit" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-trash text-blue"></i></button>
	                        </form>
	                      </div>
	                    </td>
	                  </tr>
	                @endforeach
	              </tbody>
	            </table>
	          </div>
	        </div>
	      </div>
	    </div>
	</section>
@endsection

@section('function')
	<script>
	  $(function () {
	    $('#model_table').DataTable({
	    	'ordering' 		: false,
	    })
	  })
	</script>
@endsection