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
                <h1 class="mt-4">Edit Category</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/admin/category/update/{{$category->id}}" method="post">
                            @csrf
                            <input type="hidden" name="id"
                                   value="{{$category->id}}"/>
                            <div class="mb-3 mt-3">
                                <label for="category_name">Category Name</label>
                                <input type="text" id="category_name" name="category_name"
                                       value="{{$category->category_name}}"
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
</body>
</html>
