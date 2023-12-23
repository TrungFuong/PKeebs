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
                <h1 class="mt-4">Edit manufacturer</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/admin/manufacturer/update/{{$manufacturer->id}}" method="post">
                            @csrf
                            <input type="hidden" name="id"
                                   value="{{$manufacturer->id}}"/>
                            <div class="mb-3 mt-3">
                                <label for="manufacturer_name">Manufacturer Name</label>
                                <input type="text" id="manufacturer_name" name="manufacturer_name"
                                       value="{{$manufacturer->manufacturer_name}}"
                                       class="form-control form-control-sm"/>
                            </div>

                            <div class="mb-3 mt-3">
                                <button class="btn btn-success btn-sm" id="update" name="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        @include("footer");
    </div>
</div>
@vite(["resources/sass/app.scss"])
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
            var manufacturer_nameField = document.getElementById("manufacturer_name");
            if (manufacturer_nameField.value.trim() === "") {
                event.preventDefault(); // Prevent form submission
                alert("Product name required!");
            } else {
                alert("Product " + manufacturer_nameField.value + " added!");
            }
        })
    })
</script>
</body>
</html>
