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
                <h1 class="mt-4">Users</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered table-striped">
                            <a href="/admin/user/add" class="btn btn-primary">ADD</a>
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($user as $obj)
                                <tr>
                                    <td>{{$obj -> username}}</td>
                                    <td>{{$obj -> name}}</td>
                                    <td>{{$obj -> email}}</td>
                                    <td>{{$obj -> phone}}</td>
                                    <td>

                                    @if($obj -> is_Admin == 0)
                                        Admin
                                    @else
                                        Customer
                                    @endif
                                    </td>
                                    <td class="text-center"><a href="/admin/user/edit/{{$obj->id}}" class="btn btn-primary">Update</a></td>
                                    <td class="text-center"><a href="/admin/user/delete/{{$obj->id}}" class="btn btn-delete btn-danger" data-product-name = "{{$obj -> username}}">Delete</a></td>
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
