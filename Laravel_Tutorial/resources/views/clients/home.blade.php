@extends('layout.client')


@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>Home sidebar</h3>
@endsection


@section('content')
    <h1>Trang chu</h1>
    @datetime("2021-12-15 15:00:30")
@endsection

@section('css')

@endsection

@section('js')

@endsection

