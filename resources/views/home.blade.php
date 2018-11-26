@extends('layouts.admin')

@section('title', 'Mall | home')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('content')

@endsection
