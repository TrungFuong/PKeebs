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
                <h1 class="mt-4">Category</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered table-striped">
                            <a href="/admin/category/add" class="btn btn-primary mb-3">ADD</a>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($category as $obj)
                                <tr>
                                    <td>{{$obj -> category_name}}</td>
                                    <td class="text-center col-1"><a href="/admin/category/edit/{{$obj->id}}" class="btn btn-primary btn-sm">Update</a></td>
                                    <td class="text-center col-1"><a href="/admin/category/delete/{{$obj->id}}" class="btn btn-delete btn-danger btn-sm">Delete</a></td>
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
</body>
</html>
