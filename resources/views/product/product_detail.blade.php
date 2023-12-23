<!DOCTYPE html>
<html lang="en">
@include ('head');
<body class="sb-nav-fixed">
@include ('top_bar')
<div id="layoutSidenav">
    @include('side_nav')
    <div id="layoutSidenav_content">
        <div class="row border-1">
            <div class="col-6 border-1">
                <table class="table-striped table-bordered table">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $obj)
                        <tr>
                            <td>Product name</td>
                            <td>{{$obj -> product_name}}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{$obj -> product_price}}</td>
                        </tr>
                        <tr>
                        <td>Quantity</td>
                            <td>{{$obj -> product_quantity}}</td>
                        </tr>
                        <tr>
                        <td>Description</td>
                            <td>{{$obj -> product_description}}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <td>Category</td>--}}
{{--                            <td>{{$obj -> category -> category_name}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Manufacturer</td>--}}
{{--                            <td>{{$obj -> manufacturer -> manufacturer_name}}</td>--}}
{{--                        </tr>--}}
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col-6">
                @foreach($product as $obj)
            <img src="/image/{{$obj -> product_image}}" style="width: 500px">
            @endforeach
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('/js/script.js')}}"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script>
</html>
