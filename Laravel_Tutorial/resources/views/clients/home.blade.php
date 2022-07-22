@extends('layout.client')


@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>Home sidebar</h3>
@endsection


@section('content')

    @if(session('msg'))
        <div class="alert alert-{{session('type')}}" >
            {{session('msg')}}
        </div>
    @endif

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

            <p><img src="https://pbs.twimg.com/profile_images/758084549821730820/_HYHtD8F_400x400.jpg" alt=""></p>
            <p>
                <a href="{{route('download-image')
                        .'?image='.public_path('storage/image-01.jpg')}}"
                   class="btn btn-primary">Download anh</a>
            </p>
@endsection

@section('css')
    <style>
        img{
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('js')

@endsection

