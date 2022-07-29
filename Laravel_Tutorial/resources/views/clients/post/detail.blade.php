@extends('layout.client')
@section('title')
    Blog
@endsection

@section('content')


    <h1>{{$title}}</h1>
    <hr>
    <div class="container">
        <h4 style="text-align: right">Tác giả: {{$postDetail->author}}</h4>
        <h6 style="text-align: right">{{$postDetail->create_at}}</h6>
        <span>
            {!! $postDetail->contents !!}
        </span>
    </div>
@endsection




