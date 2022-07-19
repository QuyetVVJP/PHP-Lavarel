<h1>Trang chu Unicode</h1>
<h2>{{!empty($welcome)? $welcome : 'khong co gi'}}</h2>
<div class="container">
    {!! $content !!}
</div>

<hr>
{{--@php--}}
{{-- $message = 'Dat hang thanh cong'--}}
{{--@endphp--}}
@include('parts.notice')

{{--@for($i = 1; $i <= 3; $i++)--}}
{{--    <p>For: {{$i}}</p>--}}
{{--@endfor--}}

{{--<hr>--}}

{{--@foreach($dataArr as $key => $item)--}}
{{--    <p>Foreach: {{$item}} - {{$key}}</p>--}}
{{--@endforeach--}}

{{--<hr>--}}
{{--@forelse($dataArr as $key => $item)--}}
{{--    <p>Forelse: {{$item}} - {{$key}}</p>--}}
{{--@empty--}}
{{--    <p>Khong co phan tu</p>--}}
{{--@endforelse--}}
