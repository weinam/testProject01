@extends('layouts.admin')

@section('title', 'Mall | Roles Saturday')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
  <a href="/profile/{{ Auth::user()->id }}/show"><img src="{{ asset('dist/img/blank-user.png') }}" class="img-circle" alt="User Image"></a>
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Roles Set Pages')

@section('content')
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table</h3>
            </div>
            <div class="box-body" >
              <table id="model_table" class="table table-bordered">
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Create At</th>
                    <th>Updated At</th>
                    <th width=140px"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->role }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td>{{ $user->updated_at }}</td>
                      <td>
                        <div class="col-xs-6">
                          <a href="/users/{{$user->id}}/show" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-book text-blue"></i></a>
                        </div>
                        <div class="col-xs-6">
                          <a href="/users/{{$user->id}}/edit" class="btn btn-default" style="background-color: white; border: none; "><i class="fa fa-edit text-blue"></i></a>
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
        'ordering'    : false,
      })
    })
  </script>
@endsection
