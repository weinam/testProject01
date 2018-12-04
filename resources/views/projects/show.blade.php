@extends('layouts.admin')

@section('title', 'Mall | Projects Show')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('profile_link')
  {{ Auth::user()->id }}
@endsection

@section('sidebar')
  @include('include.sidebar')
@endsection

@section('content_header', 'Projects Show Pages')

@section('content')
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<div class="box-header with-border">
          		<h3>Detail</h3>
          	</div>
          	<div class="box-body">
          		<span>
          			<p><b>Project Title : </b>{{ $project->title }}</p>
          		</span>
          		<span>
          			<p><b>Project Descriptions : </b>{{ $project->description }}</p>
          		</span>
          		<span>
          			<p><b>Project Created At : </b>{{ $project->created_at }}</p>
          		</span>
          		<span>
          			<p><b>Project Updated At : </b>{{ $project->updated_at }}</p>
          		</span>
          	</div>
          	<div class="box-footer">
          		<a href="{{ URL::to('/projects') }}"><button class="btn btn-default">Back</button></a>
          	</div>
          </div>
        </div>
      </div>
    </section>
@endsection
