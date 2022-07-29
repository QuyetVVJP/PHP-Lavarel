@extends('layout.client')
@section('title')
    {{$title}}
@endsection

@section('content')
    @if(session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif

    @if($errors->any())
        {{$errors}}
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif

    <h1>{{$title}}</h1>
    <form action="{{route('postAdd')}}" method="post">
        <div class="mb-3">
            <label for="">Tiêu đề</label>
            <input type="text" class="form-control" name="title" placeholder="Tiêu đề..." value="{{old('title')}}"/>
            @error('title')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Tác giả</label>
            <input type="text" class="form-control" name="author" placeholder="Tác giả..." value="{{old('author')}}"/>
            @error('author')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nội dung</label>
            <textarea type="text" class="form-control" name="contents" placeholder="Nội dung..." value="{{old('contents')}}">
                </textarea>
            @error('contents')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Thể loại</label>
            <select name="group_id" class="form-control" id="">
                <option value="0">Chọn thể loại</option>
                @if(!empty($allGroups))
                    @foreach($allGroups as $item)
                        <option value="{{$item->id}}" {{old('group_id') == $item->id ? 'selected' : false}}>{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
            @error('group_id')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{route('posts')}}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
@endsection



