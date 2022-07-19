@extends('layout.client')


@section('title')
    {{$title}}
@endsection



@section('content')
    <h1>Them san pham</h1>
    <form action="" method="post">
        <input type="text" name="username">
        @csrf
        @method('PUT')
        <button type="submit">Submit</button>
    </form>
@endsection

@section('css')

@endsection

@section('js')

@endsection


