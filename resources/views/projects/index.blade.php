@extends('layouts.admin')

@section('title', 'Mall | Projects')

@section('user_name')
    {{Auth::user()->name}}
@endsection

@section('profile_link')
    <a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
    @include('include.sidebar')
@endsection

@section('content_header', 'Projects Pages')

@section('content')
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header col-xs-10">
              <h3 class="box-title">Table</h3>
            </div>
            <div class="box-header col-xs-2">
            	<h6 class="text-right"><a href="/projects/create">Create new project</a></h6>
            </div>
            <div class="box-body" >
              <table id="project_table" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Projects Name</th>
                    <th>Projects Descriptions</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th width="96px"></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach ($finals as $final)
                		<tr>
                			<td>{{ $final->title }}</td>
                			<td>{{ $final->description }}</td>
                			<td>{{ $final->created_at }}</td>
                			<td>{{ $final->updated_at }}</td>
                			<td>
                				<div class="col-xs-4">
                                    <a href="/projects/{{$final->id}}/show" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-book text-blue"></i></a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="/projects/{{$final->id}}/edit" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-edit text-blue"></i></a>
                                </div>
                                <div class="col-xs-4">
                                    <form method="POST" action="/projects/{{$final->id}}/delete" id="delete_form">
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
	    $('#project_table').DataTable({
	    	'ordering' 		: false,
	    })
	  })
	</script>
@endsection
