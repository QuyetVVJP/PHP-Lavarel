<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') - Unicode </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">

    @yield('css')

</head>
<body>
    @include('clients.blocks.header')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <aside>
                        @section('sidebar')
                            @include('clients.blocks.sidebar')
                        @show

                    </aside>
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
        @yield('js')
        @stack('scripts')
</body>
</html>
