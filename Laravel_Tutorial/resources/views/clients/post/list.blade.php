@extends('layout.client')
@section('title')
    Blog
@endsection

@section('content')
    @if(session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 5%">STT</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th style="width: 15%">Ngày viết</th>
            <th style="width: 5%"></th>

        </tr>
        </thead>
        <tbody>
        @if(!empty($listPost))
            @foreach($listPost as $key => $item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->author}}</td>
                    <td>{{$item->group_name}}</td>
                    <td>{{$item->create_at}}</td>
                    <td><a href="{{route('edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm"> Đọc</a> </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6"> Không có bài viết</td>
            </tr>
        </tbody>
        @endif
    </table>
@endsection



