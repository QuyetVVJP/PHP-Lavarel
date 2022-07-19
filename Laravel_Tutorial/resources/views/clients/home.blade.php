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

{{--            goi gia tri tu controller truyen vao Alert--}}
    <x-alert type="info" :content="$msg" data-icon="youtube"/>
{{--            <x-input.button/>--}}
{{--            <x-forms.button/>--}}
@endsection

@section('css')

@endsection

@section('js')

@endsection

