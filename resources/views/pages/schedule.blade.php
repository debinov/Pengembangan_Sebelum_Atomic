<head>
    @extends('layouts.master')
    @section('judul', 'Schedule')
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
    <link rel="stylesheet" href="{{ asset('assets/css/schedule.css') }}" />
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name Property</th>
                        <th>Name User</th>
                        <th>Phone User</th>
                        <th>Date Schedule</th>
                        <th>Time Schedule</th>
                        <th>PIC</th>
                        <th>Note</th>
                        <th>Status Schedule</th>
                        <th>Action User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jaksel 01</td>
                        <td>Rangga</td>
                        <td>08127869</td>
                        <td>08/07/2024</td>
                        <td>12:00</td>
                        <td></td>
                        <td></td>
                        <td>pending</td>
                        <td>
                            <button type="button" class="btn btn-detail" data-bs-target="#modal-lihat-detail-jadwal-"
                                data-bs-toggle="modal">Detail</button>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('')">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="modal-lihat-detail-jadwal-" tabindex="-1" role="dialog"
            aria-labelledby="modal-lihat-detail-jadwal--label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-lihat-detail-jadwal--label">
                            Schedule Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> Rangga</p>
                        <p><strong>Phone:</strong> 0812388</p>
                        <p><strong>Schedule Date:</strong>08/07/2024</p>
                        <p><strong>Schedule Time:</strong>12:00</p>
                        <p><strong>PIC:</strong> Dika</p>
                        <p><strong>Note:</strong>Aktifkan WA nya ya</p>
                        <p><strong>Status:</strong></p>
                        <form action="" method="">
                            <div class="mb-3">
                                <label for="edit-pic-">Edit PIC</label>
                                <input class="form-control" id="edit-pic-" name="pic" type="text" value="">
                            </div>
                            <div class="mb-3">
                                <label for="edit-catatan-">Edit Note</label>
                                <textarea class="form-control" id="edit-catatan-" name="catatan" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="status" id="status-" value="">
                            <button type="button" class="btn btn-success"
                                data-bs-target="#modal-lihat-detail-jadwal-done" data-bs-toggle="modal">Accept</button>
                            <button type="button" class="btn btn-danger"
                                data-bs-target="#modal-lihat-detail-jadwal-reject"
                                data-bs-toggle="modal">reject</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-lihat-detail-jadwal-done" tabindex="-1" role="dialog"
            aria-labelledby="modal-lihat-detail-jadwal--label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-lihat-detail-jadwal--label">
                            Schedule Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> Rangga</p>
                        <p><strong>Phone:</strong> 0812388</p>
                        <p><strong>Schedule Date:</strong>08/07/2024</p>
                        <p><strong>Schedule Time:</strong>12:00</p>
                        <p><strong>PIC:</strong> Dika</p>
                        <p><strong>Note:</strong>Aktifkan WA nya ya</p>
                        <p><strong>Status:</strong>Accept</p>
                        <form action="" method="">
                            <button type="submit" class="btn btn-success">Done</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-lihat-detail-jadwal-reject" tabindex="-1" role="dialog"
            aria-labelledby="modal-lihat-detail-jadwal--label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-lihat-detail-jadwal--label">
                            Schedule Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> Rangga</p>
                        <p><strong>Phone:</strong> 0812388</p>
                        <p><strong>Schedule Date:</strong>08/07/2024</p>
                        <p><strong>Schedule Time:</strong>12:00</p>
                        <p><strong>PIC:</strong> Dika</p>
                        <p><strong>Note:</strong>Aktifkan WA nya ya</p>
                        <p><strong>Status:</strong>Reject</p>
                        <form action="" method="">
                            <input type="hidden" name="status" value="done">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>