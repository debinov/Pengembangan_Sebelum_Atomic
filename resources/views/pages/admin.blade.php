<head>
    @extends('layouts.master')
    @section('judul', 'Profile Admin')
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function updateSave() {
                Swal.fire({
                    title: "Success!",
                    text: "Your profile has been updated",
                    icon: "success"
                });
            }
        </script>
        <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
        <link rel="icon" type="image/x-icon" href="assets/img/avatar/logo.jpg">
    @endpush
</head>

<body>
@section('content')
<main class="pt-5">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                class="img-fluid rounded-circle" alt="User-Profile-Image" style="width: 100px;">
                        </div>
                        <form action="" method="">
                            <div class="form-group mb-3">
                                <label for="disabledTextInput" class="form-label">User ID</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Adm-001" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputName"
                                    aria-describedby="nameHelp" name="nama" value="" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                <input type="email_user" class="form-control" id="exampleInputEmail1" name="email-address"
                                    value="" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                    required>
                            </div>
                            <button class="btn-primary btn-block" type="submit" onclick="updateSave('')" style="background-color:#00a5a7">Edit Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
</body>