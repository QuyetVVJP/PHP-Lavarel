@extends('layout.client')
@section('title')
    Blog
@endsection

@section('content')
    @if(session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <form action="">
        <div class="row">
            <div class="col-3">
                <select class="form-control" name="group_id">
                    <option value="0">Thể loại</option>
                    @if(!(empty(getAllGroups())))
                        @foreach(getAllGroups() as $item)
                            <option value="{{$item->id}}" {{request()->group_id==$item->id ? 'selected':false}} >{{$item->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-3">
                <input type="search" name="keywords" class="form-control"
                       value="{{request()->keywords}}"  placeholder="Từ khóa...">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <br>
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
                    <td><a href="{{route('detail',['id'=>$item->id])}}" class="btn btn-warning btn-sm"> Đọc</a> </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6"> Không có bài viết</td>
            </tr>
        </tbody>
        @endif
    </table>
    <div class="d-flex justify-content-end">
        {{$listPost->links()}}
    </div>
@endsection



