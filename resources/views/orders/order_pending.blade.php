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
                        <table id="datatablesSimple" class="table table-bordered table-striped">
                            <thead>
                            <a class="btn btn-outline-warning mb-3" href="/admin/orders/pending" style="margin: 0px 3px">Pending Orders</a>
                            <a class="btn btn-outline-primary mb-3" href="/admin/orders/confirmed" style="margin: 0px 3px">Confirmed Orders</a>
                            <a class="btn btn-outline-secondary mb-3" href="/admin/orders/shipping" style="margin: 0px 3px">Shipping Orders</a>
                            <a class="btn btn-outline-dark mb-3" href="/admin/orders/shipped" style="margin: 0px 3px">Shipped Orders</a>
                            <a class="btn btn-success mb-3" href="/admin/orders/done" style="margin: 0px 3px">Conpleted Orders</a>
                            <a class="btn btn-danger mb-3" href="/admin/orders/cancelled" style="margin: 0px 3px">Cancelled Orders</a>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created at</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $obj)
                                <tr>
                                    <td>{{$obj -> id}}</td>
                                    <td>{{$obj -> name}}</td>
                                    <td>{{$obj -> phone}}</td>
                                    <td>{{$obj -> address}}</td>
                                    <td>{{$obj -> created_at}}</td>
                                    <td>{{$obj -> total}}</td>
                                    <td>{{$obj -> status -> status_name}}</td>
                                    <td><a class="btn btn-outline-primary" href="/admin/order/{{$obj -> id}}">View/Update status</a></td>
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
