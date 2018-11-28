@extends('layouts.admin')

@section('title', 'Mall | Home')

@section('user_name')
	{{Auth::user()->name}}
@endsection

@section('content_header', 'Home Pages')

@section('content')

@endsection
