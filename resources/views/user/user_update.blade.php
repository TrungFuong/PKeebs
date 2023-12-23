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
                <h1 class="mt-4">Update an account</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/admin/user/save" method="post">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username"
                                       class="form-control form-control-sm" value="{{$user->username}}" required/>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name"
                                       class="form-control form-control-sm" value="{{$user->name}}" required/>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control form-control-sm" value="{{$user->email}}" required/>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-sm" value="{{$user->password}}" required/>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="passwordConfirm">Confirm password</label>
                                <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control form-control-sm" required/>
                            </div>

                            <div class="mb-3 mt-3">
                                <label>Role</label>
                                <input type="radio" id="admin" name="is_Admin" value = "0" required/> Admin
                                <input type="radio" id="customer" name="is_Admin" value = "1" required/> Customer
                            </div>
                            <div class="mb-3 mt-3">
                                <button class="btn btn-success btn-sm" id="update" name="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        @include('footer')
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
    document.addEventListener('DOMContentLoaded', function() {
            var saveButton = document.getElementById('save');
            saveButton.addEventListener("click", function(event) {
                var password = document.getElementById("password");
                var passwordConfirm = document.getElementById("passwordConfirm");
                if(password.value.trim() != passwordConfirm.value.trim()){
                    event.preventDefault();
                    alert("Password must match!");
                } else {}
            })
        }
    )
</script>

{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function () {--}}
{{--        var saveButton = document.getElementById("save");--}}
{{--        saveButton.addEventListener("click", function (event) {--}}
{{--            var productNameField = document.getElementById("productName");--}}
{{--            if (productNameField.value.trim() === "") {--}}
{{--                event.preventDefault(); // Prevent form submission--}}
{{--                alert("Product name required!");--}}
{{--            } else {--}}
{{--                alert("Product " + productNameField.value + " added!");--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    @if(session('Success'))--}}
{{--    alert("{{session('Success')}}");--}}
{{--    @endif--}}
{{--<script>--}}
{{--    @if(session('Error'))--}}
{{--    alert("{{ session('Error') }}");--}}
{{--    @endif--}}
{{--</script>--}}

{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function () {--}}
{{--        var saveButton = document.getElementById("save");--}}
{{--        saveButton.addEventListener("click", async function (event) {--}}
{{--            event.preventDefault(); // Prevent form submission initially--}}
{{--            var name = document.getElementById("name").value.trim();--}}
{{--            var password = document.getElementById("password").value.trim();--}}
{{--            var email = document.getElementById("email").value.trim();--}}
{{--            var confirmPassword = document.getElementById("passwordConfirm").value.trim();--}}

{{--            if (password !== confirmPassword) {--}}
{{--                alert("Passwords do not match!");--}}
{{--            } else if (name === "") {--}}
{{--                alert("Username is required!");--}}
{{--            } else {--}}
{{--                // Check if the email already exists in the database--}}
{{--                try {--}}
{{--                    const response = await fetch('/user/check-email', {--}}
{{--                        method: 'POST',--}}
{{--                        headers: {--}}
{{--                            'Content-Type': 'application/json',--}}
{{--                            'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--                        },--}}
{{--                        body: JSON.stringify({ email: email })--}}
{{--                    });--}}

{{--                    console.log('Response Status:', response.status);--}}

{{--                    if (response.ok) {--}}
{{--                        // Email is available, proceed with form submission--}}
{{--                        document.querySelector("form").submit();--}}
{{--                    } else {--}}
{{--                        // Email already exists--}}
{{--                        alert("Email already exists!");--}}
{{--                    }--}}
{{--                } catch (error) {--}}
{{--                    console.error(error);--}}
{{--                    alert("An error occurred while checking the email.");--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

</body>
</html>
