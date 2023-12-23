<!DOCTYPE html>
<html lang="en">
@include ('head')
<body class="sb-nav-fixed">
@include ('top_bar')
<div id="layoutSidenav">
    @include('side_nav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add a product</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/admin/product/save" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="product_name">Product Name</label>
                                <input type="text" id="product_name" name="product_name"
                                       class="form-control form-control-sm" required/>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="product_quantity">Quantity</label>
                                <input type="text" id="product_quantity" name="product_quantity"
                                       class="form-control form-control-sm" required/>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="product_price">Price</label>
                                <input type="text" id="product_price" name="product_price"
                                       class="form-control form-control-sm" required/>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="product_description">Description</label>
                                <textarea id="product_description" name="product_description"
                                          class="form-control form-control-sm custom-textarea" rows="5"></textarea>
                            </div>
                            <div class="mt-3 mb-3">
                                <label for="category_id">Category</label>
                                <select class="form-control form-select" name="category_id" id="category_id">
                                    @foreach($category as $obj)
                                        <option value="{{$obj -> id}}">{{$obj -> category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="manufacturer">Manufacturer</label>
                                <select class="form-control form-select" name="manufacturer_id" id="manufacturer_id">
                                    @foreach($manufacturer as $obj)
                                        <option value="{{$obj -> id}}">{{$obj -> manufacturer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br/>
                            <div>
                                Product Image: <input type="file" name='product_image'>
                            </div>
                            <div class="mb-3 mt-3">
                                <button class="btn btn-success btn-sm" id="save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        @include ('footer')
    </div>
</div>
{{--@vite(["resources/sass/app.scss"])--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="../../js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script src="../../js/datatables-simple-demo.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var saveButton = document.getElementById("save");
        saveButton.addEventListener("click", function (event) {
            var productNameField = document.getElementById("productName");
            if (productNameField.value.trim() === "") {
                event.preventDefault(); // Prevent form submission
                alert("Product name required!");
            } else {
                alert("Product " + productNameField.value + " added!");
            }
        })
    })
</script>


{{--<script>--}}
{{--    @if(session('Success'))--}}
{{--    alert("{{session('Success')}}");--}}
{{--    @endif--}}

{{--    @if(session('Error'))--}}
{{--    alert("{{ session('Error') }}");--}}
{{--    @endif--}}
{{--</script>--}}

</body>
</html>
