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
                <h1 class="mt-4">Add a manufacturer</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/admin/manufacturer/save" method="post">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="manufacturer_name">Manufacturer Name</label>
                                <input type="text" id="manufacturer_name" name="manufacturer_name"
                                       class="form-control form-control-sm"/>
                            </div>
                            <div class="mb-3 mt-3">
                                <button class="btn btn-success btn-sm" id="save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@vite(["resources/sass/app.scss"])
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="../../js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script src="../../js/datatables-simple-demo.js"></script>
<script src="../../js/datatables-simple-demo.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var saveButton = document.getElementById("save");
        saveButton.addEventListener("click", function (event) {
            var manufacturer_name = document.getElementById("manufacturer_name");
            if(manufacturer_name.value.trim() === ""){
                event.preventDefault();
                alert("Manufacturer name required!");
            }else{
                alert("Manufacturer " + manufacturer_name.value + " added!");
            }
        })
    })
</script>
