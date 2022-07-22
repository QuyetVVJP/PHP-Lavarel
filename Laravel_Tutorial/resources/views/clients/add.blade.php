@extends('layout.client')


@section('title')
    {{$title}}
@endsection



@section('content')
    <h1>Them san pham</h1>
    <form action="" method="post">
        @error('msg')
            <div class="alert alert-danger text-center">{{$message}} </div>
        @enderror

        <div class="mb-3">
            <label for="">Ten san pham</label>
            <input type="text" class="form-control" name="product_name"
                placeholder="ten san pham" value="{{old('product_name')}}"/>
            @error('product_name')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Gia san pham</label>
            <input type="text" class="form-control" name="product_price"
                   placeholder="Gia san pham" value="{{old('product_price')}}"/>
            @error('product_price')
            <span style="color: red">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Them moi</button>
        @csrf
    </form>
@endsection

@section('css')

@endsection

@section('js')

@endsection


