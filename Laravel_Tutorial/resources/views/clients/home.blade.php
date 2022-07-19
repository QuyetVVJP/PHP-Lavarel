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

    @env('production')
        <p>Moi truong production</p>
        @elseenv('test')
            <p> moi truong TEST</p>
        @else
            <p>Moi truong dev</p>
    @endenv
@endsection

@section('css')

@endsection

@section('js')

@endsection

