@extends('layout.client')
@section('content')
    <h1>Trang chu</h1>
    <button type="button" class="show">Show</button>
@endsection

@section('title')
    {{$title}}
@endsection

@section('sidebar')
{{--    @parent  // goi lop cha--}}
    <h3>Home sidebar</h3>
@endsection


@section('css')
    header{
        background: #0c5460;
    }
    @endsection

@section('js')
    document.querySelector('.show').onclick = function(){
        alert('Thanh cong');
    }
@endsection

