@extends('layouts.admin')

@section('title', 'Mall | Roles')

@section('user_name')
    {{Auth::user()->name}}
@endsection

@section('profile_link')
  {{ Auth::user()->id }}
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Roles Pages')

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
                <span><a href="/roles/create">Create new role</a></span>
                <span style="margin-left: 20px"><a href="/rolesset/create">Register Role</a></span>
              </h6>
            </div>
            <div class="box-body" >
              <table id="project_table" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Roles Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th width=140px"></th>
                  </tr>
                </thead>
                <tbody>
                	@foreach ($roles as $role)
                    <tr>
                      <td>{{ $role->role_name }}</td>
                      <td>{{ $role->created_at }}</td>
                      <td>{{ $role->updated_at }}</td>
                      <td>
                        <div class="col-xs-4">
                          <a href="/roles/{{ $role->id }}/show" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-book text-blue"></i></a>
                        </div>
                        <div class="col-xs-4">
                          <a href="/roles/{{ $role->id }}/edit" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-edit text-blue"></i></a>
                        </div>
                        <div class="col-xs-4">
                          <form method="POST" action="/roles/{{ $role->id }}/delete" id="delete_form">
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
