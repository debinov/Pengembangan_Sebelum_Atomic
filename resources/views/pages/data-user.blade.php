<head>
    @extends('layouts.master')
    @section('judul', 'Data User')
    <link rel="icon" type="image/x-icon" href="assets/img/avatar/logo.jpg">
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('template/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
        <script>
            $(function () {
                $("#example1").DataTable();
            });
        </script>
        <script>
            function confirmDelete() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                })
            }
        </script>
    @endpush
</head>

<body>
    @section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/datauser.css') }}" />
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Name User</th>
                        <th>Phone User</th>
                        <th>Email User</th>
                        <th>Action User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Robert Pattinson</td>
                        <td>012789690</td>
                        <td>userrobert@gmail.com</td>
                        <td>
                            <button type="button" class="btn btn-edit" data-bs-toggle="modal"
                                data-bs-target="#editUserModal">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('')">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Update Data User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="" action="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name_user">Name User</label>
                                <input type="text" class="form-control" name="name_user" required value="">
                            </div>
                            <div class="form-group">
                                <label for="phone_user">Phone User</label>
                                <input type="text" class="form-control" name="phone_user" required value="">
                            </div>
                            <div class="form-group">
                                <label for="email_user">Email User</label>
                                <input type="email" class="form-control" name="email_user" required value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="background-color:#00a5a7">Update
                                User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>