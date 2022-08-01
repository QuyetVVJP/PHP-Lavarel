<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>毎日進歩</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    <script src="https://cdn.tiny.cloud/1/9xvyunyx2wu8bntguz984ugt5yk48uxvsi1ce6k9sz6e3dhx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>    @yield('css')
    @yield('scripts')

</head>
<body>
    @include('clients.blocks.header')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-2">
{{--                    <aside>--}}
{{--                        @section('sidebar')--}}
{{--                            @include('clients.blocks.sidebar')--}}
{{--                        @show--}}

{{--                    </aside>--}}
                </div>
                <div class="col-10">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>


    </main>

    @include('clients.blocks.footer')

        <script src="{{asset('assets/clients/js/bootstrap.min.js')}}" ></script>
        <script src="{{asset('assets/clients/js/custom.js')}}" ></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#contents',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
        });
    </script>
        @yield('js')
        @stack('scripts')
</body>
</html>

