@extends('layout.client')


@section('title')
    {{$title}}
@endsection



@section('content')
    <h1>Them san pham</h1>
    <form action="{{route('post-add')}}" method="post" id="product-form">

            <div class="alert alert-danger text-center msg" style="display: none"> </div>


        <div class="mb-3">
            <label for="">Ten san pham</label>
            <input type="text" class="form-control" name="product_name"
                placeholder="ten san pham" value="{{old('product_name')}}"/>

                <span style="color: red" class="error product_name_error"></span>

        </div>

        <div class="mb-3">
            <label for="">Gia san pham</label>
            <input type="text" class="form-control" name="product_price"
                   placeholder="Gia san pham" value="{{old('product_price')}}"/>

            <span style="color: red" class="error product_price_error"></span>

        </div>

        <button type="submit" class="btn btn-primary">Them moi</button>
        @csrf
    </form>
@endsection

@section('css')

@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $('#product-form').on('submit', function (e){
                e.preventDefault();

                let productName = $('input[name="product_name"]').val().trim();
                let productPrice = $('input[name="product_price"]').val().trim();
                let actionUrl = $(this).attr('action');
                let csrfToken = $(this).find('input[name="_token"]').val();

                $('.error').text();  // reset
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: {
                        product_name: productName,
                        product_price: productPrice,
                        _token: csrfToken
                    },
                    dataType: 'json',
                    success: function (response){
                        console.log(response)
                    },
                    error: function (error){
                        $('.msg').show();
                        let responseJson = error.responseJSON.errors;

                        if(Object.keys(responseJson.length>0)){
                            $('.msg').text(responseJson.msg);
                            for (let key in responseJson){
                                $('.'+key+'_error').text(responseJson[key][0]);
                            }
                        }

                    }
                })
            });
        });
    </script>
@endsection


