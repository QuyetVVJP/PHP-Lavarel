<h2>Demo View Unicode</h2>
@if (session('msg'))
    <div class="alert alert-success">
        {{session('msg')}}
    </div>
@endif
<form action="" method="post">
    <input type="text" name="username" placeholder="Username..." value="{{old('username')}}"/>
    <button type="submit">Submit</button>
    @csrf
</form>
