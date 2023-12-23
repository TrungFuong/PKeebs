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
                <h1 class="mt-4">Manufacturer</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered table-striped">
                            <a href="/admin/manufacturer/add" class="mb-3 btn-primary btn">ADD</a>
                            <thead>
                            <tr>
                                <th>Manufacturer name</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($manufacturer as $obj)
                                <tr>
                                    <td>{{$obj -> manufacturer_name}}</td>
                                    <td class="text-center"><a href="/admin/manufacturer/edit/{{$obj->id}}" class="btn btn-primary">Update</a></td>
                                    <td class="text-center"><a href="/admin/manufacturer/delete/{{$obj->id}}" class="btn btn-delete btn-danger" data-manufacturer-name="{{$obj->manufacturer_name}}">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        @include('footer');
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
                var manufacturer_name = this.getAttribute("data-manufacturer-name");
                if (confirm("Are you sure you want to delete this manufacturer: " + manufacturer_name + "?")) {
                    alert("Manufacturer " + manufacturer_name + " deleted!");
                } else {
                    event.preventDefault(); // Prevent the default delete action if the user cancels
                }
            })
        })
    })
</script>`
</body>
</html>
