@extends('layout.client')


@section('title')
    {{$title}}
@endsection

@section('sidebar')
        @parent
    <h3>Product sidebar</h3>
@endsection

@section('content')
    @if(session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif


    <h1>SAN PHAM</h1>

    <x-package-alert/>
    @push('scripts')
        <script>
            console.log('Put lan 2')
        </script>
    @endpush

@endsection

@section('css')

@endsection

@section('js')

@endsection

@push('scripts')
    <script>
        console.log('Put lan 1')
    </script>
@endpush

