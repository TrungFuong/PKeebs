<!DOCTYPE html>
<html lang="en">
@include('head')
<body class="sb-nav-fixed">
@include('top_bar')
<div id="layoutSidenav">
    @include('side_nav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card">
                    <div class="card-body">

                <div class="row text-center justify-content-center">
                    <div class="col-12">

                        @if(isset($order) && count($order) > 0)
                            <div class="card card-lg mb-5 border">
                                @php $firstItem = true; @endphp
                                @foreach($order as $obj)
                                    @if($firstItem)
                                        <!-- Info -->
                                        <div class="card-body pb-0">
                                            <div class="card card-sm">
                                                <div class="card-body bg-light">
                                                    <div class="row">
                                                        <div class="col-6 col-lg-3">
                                                            <h6 class="heading-xxxs text-muted">Order No:</h6>
                                                            <p class="mb-lg-0 fs-sm fw-bold">
                                                                {{ $obj->id }}
                                                            </p>
                                                        </div>
                                                        <div class="col-6 col-lg-3">
                                                            <h6 class="heading-xxxs text-muted">Order date:</h6>
                                                            <p class="mb-lg-0 fs-sm fw-bold">
                                                                {{ $obj->created_at }}
                                                            </p>
                                                        </div>
                                                        <div class="col-6 col-lg-3">
                                                            <h6 class="heading-xxxs text-muted">Status:</h6>
                                                            <p class="mb-0 fs-sm fw-bold">
                                                                {{ $obj->status->status_name }}
                                                            </p>
                                                        </div>
                                                        <div class="col-6 col-lg-3">
                                                            <h6 class="heading-xxxs text-muted">Order Amount:</h6>
                                                            <p class="mb-0 fs-sm fw-bold">
                                                                {{ $obj->total }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $firstItem = false; @endphp
                                        </div>
                                    @endif
                                    <!-- List group for order items -->
                                    <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x">
                                        <li class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-4 col-md-3 col-xl-2">
                                                    <!-- Image -->
                                                    <a href="/home/product/{{ $obj->product_id }}"><img src="/image/{{ $obj->product_image }}" alt="..." class="img-fluid"></a>
                                                </div>
                                                <div class="col">
                                                    <!-- Title -->
                                                    <p class="mb-4 fs-sm fw-bold">
                                                        <a class="text-body" href="/home/product/detail/{{ $obj->product_id }}">{{ $obj->product_name }}</a> <br>
                                                        <span class="text-muted">{{ $obj->product_price }}</span>
                                                    </p>
                                                    <p class="mb-4 fs-sm fw-bold">
                                                        <span class="text-muted">Q.ty: {{ $obj->quantity }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        @endif

                        <!-- Total -->
                        <div class="card card-lg mb-5 border">
                            <div class="card-body">

                                <!-- Heading -->
                                <h6 class="mb-7">Order Total</h6>

                                <!-- List group -->
                                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                    <li class="list-group-item d-flex fs-lg fw-bold">
                                        <span>Total</span>
                                        <span class="ms-auto">{{$obj -> total}}</span>
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <!-- Details -->
                        <div class="card card-lg border">
                            <div class="card-body">

                                <!-- Heading -->
                                <h6 class="mb-7">Billing & Shipping Details</h6>

                                <!-- Content -->
                                <div class="row">
                                    <div class="col-12 col-md-4">

                                        <!-- Heading -->
                                        <p class="mb-4 fw-bold">
                                            Address:
                                        </p>

                                        <p class="mb-7 mb-md-0 text-gray-500">
                                            {{$obj->address}}
                                        </p>

                                    </div>
                                    <div class="col-12 col-md-4">

                                        <!-- Heading -->
                                        <p class="mb-4 fw-bold">
                                            Name:
                                        </p>

                                        <p class="mb-7 mb-md-0 text-gray-500">
                                            {{$obj->name}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-4">

                                        <!-- Heading -->
                                        <p class="mb-4 fw-bold">
                                            Phone number:
                                        </p>

                                        <p class="mb-7 mb-md-0 text-gray-500">
                                            {{$obj->phone}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                        <div class="row mt-3">
                            <div class="container text-center">
                                @switch($obj -> status_id)
                                    @case(1)
                                        <a class="col-4 btn btn-outline-warning" href="/admin/orders/confirm/{{$obj -> id}}">Confirm</a>
                                        @break
                                    @case(2)
                                        <a class="col-4 btn btn-outline-primary" href="/admin/orders/shipping/{{$obj -> id}}">Shipping</a>
                                        @break
                                    @case(7)
                                        <a class="col-4 btn btn-outline-success" href="/admin/orders/shipped/{{$obj -> id}}">Shipped</a>
                                        @break
                                    @case(8)
                                        <a class="col-4 btn btn-outline-success" href="/admin/orders/done/{{$obj->id}}">Done</a>
                                    @break
                                @endswitch
                                    <a class="col-4 btn btn-outline-danger" href="/admin/orders/cancel/{{$obj->id}}">Cancel</a>
                            </div>
                        </div>
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
