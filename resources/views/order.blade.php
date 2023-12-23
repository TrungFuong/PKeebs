<!DOCTYPE html>
<html lang="en">
@include('head');
<body class="sb-nav-fixed">
@include('top_bar')
<div id="layoutSidenav">
    @include('side_nav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Orders</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/admin/product/add">
                            <button class="btn btn-primary text-center btn-sm mb-2" type="submit">ADD</button>
                        </form>
                        <table id="datatablesSimple" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                {{--<th>Description</th>--}}
                                <th>Category</th>
                                <th>Manufacturer</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($product as $obj)
                                <tr>
                                    <td>{{$obj -> product_name}}</td>
                                    <td>{{$obj -> product_price}}</td>
                                    <td>{{$obj -> product_quantity}}</td>
                                    {{--                                    <td>{{$obj -> product_description}}</td>--}}
                                    <td>{{$obj -> category -> category_name}}</td>
                                    <td>{{$obj -> manufacturer -> manufacturer_name}}</td>
                                    <td><img src="/image/{{$obj -> product_image}}" style="width: 100px;"></td>
                                    <td class="text-center justify-content-center">
                                        <a href="/admin/product/edit/{{$obj->id}}" class="btn btn-primary mt-2 mb-2">Update</a>
                                        <a href="/admin/product/delete/{{$obj->id}}" class="btn btn-delete btn-danger mt-2 mb-2" data-product-name = "{{$obj -> product_name}}">Delete</a>
                                        <a href="/admin/product/{{$obj->id}}" class="btn btn-warning mt-2 mb-2">View</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        @include('footer')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('/js/script.js')}}"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButton = document.querySelectorAll(".btn-delete");
        deleteButton.forEach(function (deleteButton) {
            deleteButton.addEventListener("click", function (event) {
                var product_name = this.getAttribute("data-product-name");
                if (confirm("Are you sure you want to delete the product: " + product_name + "?")) {
                    alert("Product  " + product_name + " deleted!");
                } else {
                    event.preventDefault(); // Prevent the default delete action if the user cancels
                }
            })
        })
    })
</script>

</body>
</html>
