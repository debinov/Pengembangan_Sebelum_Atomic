<head>
    @extends('layouts.master')
    @section('judul', 'Property Management')
    <link rel="icon" type="image/x-icon" href="assets/img/avatar/logo.jpg">
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('template/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
        <script>
            $(function () {
                $("#properties").DataTable();
            });
        </script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script type="module" src="./index.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet-src.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <link rel="stylesheet" href="{{ asset('assets/css/management.css') }}" />
    <link href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" rel="stylesheet">
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-add_property" data-bs-toggle="modal"
                    data-bs-target="#ModalAddProperty">Add Property</button>
            </div>
            <table id="properties" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Property Name</th>
                        <th>Property Image</th>
                        <th>Property Price</th>
                        <th>Property Status</th>
                        <th>Action Property</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        </td>
                        <td>Properti Debi</td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#ModalImageProperty">Lihat Foto
                            </button>
                        </td>
                        <td>1.000.000</td>
                        <td>Sold</td>
                        <td>
                            <button type="button" class="btn btn-detail" data-bs-toggle="modal"
                                data-bs-target="#ModalEditProperty">Edit
                            </button>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('')">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="ModalAddProperty" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="top:0;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Property</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="formulir-tambah-properti" method="" action="">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Image</label>
                                <input type="file" style="padding:0;height: 30px;" class="form-control border-dark"
                                    id="formFile" name="images[]" accept="image/*" onchange="showFileName()" multiple>
                                <small id="fileHelp" class="form-text text-muted">No file chosen</small>
                            </div>
                            <script>
                                function showFileName() {
                                    var input = document.getElementById('formFile');
                                    var fileHelp = document.getElementById('fileHelp');
                                    if (input.files.length > 0) {
                                        fileHelp.textContent = 'File chosen: ' + input.files[0].name;
                                    } else {
                                        fileHelp.textContent = 'No file chosen';
                                    }
                                }
                            </script>
                            <div class="mb-3">
                                <label for="Name">Property Name</label>
                                <input type="text" class="form-control border border-dark" name="name" required>
                            </div>
                            <label for="price">Property Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="text" class="form-control border border-dark"
                                    aria-describedby="basic-addon1" name="price" required>
                            </div>
                            <label for="status" class="form-label">Property Status</label>
                            <br>
                            <select class="form-select border border-dark mb-3" aria-label="Status" name="status">
                                <option value="1">Ready</option>
                                <option value="2">Pending</option>
                                <option value="3">Sold</option>
                            </select>
                            <br>
                            <div class="mb-3">
                                <img src="assets/img/maps.png" style="width:100%"></img>
                            </div>
                            <div class="mb-3">
                                <label for="address">Property Address</label>
                                <textarea class="form-control border border-dark" rows="3" name="address"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description">Property Description</label>
                                <textarea class="form-control border border-dark" rows="3" name="description"
                                    required></textarea>
                                <br>
                            </div>
                            <label for="facilities">Property Facilities</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">Sqft</label>
                                    <input type="number" class="form-control border border-dark" id="inputnumber"
                                        aria-describedby="inputsqft" name="sqft" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">Garage</label>
                                    <input type="number" class="form-control border border-dark" id="inputgarage"
                                        aria-describedby="inputgarage" name="garage" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">Bed</label>
                                    <input type="number" class="form-control border border-dark" id="inputbed"
                                        aria-describedby="inputbed" name="bed" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">Bath</label>
                                    <input type="number" class="form-control border border-dark" id="inputbath"
                                        aria-describedby="inputbath" name="bath" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">Floor</label>
                                    <input type="number" class="form-control border border-dark" id="inputfloor"
                                        aria-describedby="inputfloor" name="floor" required>
                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary"
                                style="background-color:#021622; width: 100%">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalImageProperty" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="top:0;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">
                            Lihat Foto
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card text-white bg-secondary mb-3">
                                    <img class="d-block w-100 gallery-item"
                                        src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="slide"
                                        data-bs-toggle="modal" data-bs-target="#ModalMantap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalMantap" tabindex="-1" aria-labelledby="ModalMantapLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalMantapLabel">Zoom</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="d-block w-100 gallery-item" src="https://bootdey.com/img/Content/avatar/avatar6.png"
                            alt="slide" data-bs-toggle="modal" data-bs-target="#ModalMantap">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalEditProperty" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="top:0;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Edit
                            Property</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="" action="">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Image</label>
                                <input type="file" style="padding:0;height: 30px;" class="form-control border-dark"
                                    id="formFile" name="images[]" accept="image/*" onchange="showFileName()" multiple>
                                <small id="fileHelp" class="form-text text-muted">No file chosen</small>
                            </div>
                            <script>
                                function showFileName() {
                                    var input = document.getElementById('formFile');
                                    var fileHelp = document.getElementById('fileHelp');
                                    if (input.files.length > 0) {
                                        fileHelp.textContent = 'File chosen: ' + input.files[0].name;
                                    } else {
                                        fileHelp.textContent = 'No file chosen';
                                    }
                                }
                            </script>
                            <div class="existing-images">
                                <label for="preview">Preview Image</label>
                                <div class="existing-image-item">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" width="100"
                                        style="margin-bottom: 10px">
                                    <button type="button" class="btn btn-danger remove-existing-image" data-image-id=""
                                        style="margin-left:10px">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <br>
                                <label for="name">Name Property</label>
                                <input type="text" class="form-control border border-dark" placeholder="Name Property"
                                    name="name" value="" required>
                            </div>
                            <label for="price">Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="text" class="form-control border border-dark" placeholder="Cost"
                                    aria-describedby="basic-addon1" name="price" value="" required>
                            </div>
                            <label for="status" class="form-label">Property Status</label>
                            <br>
                            <select class="form-select border border-dark mb-3" aria-label="Status" name="status">
                                <option value="1">Ready</option>
                                <option value="2">Pending</option>
                                <option value="3">Sold</option>
                            </select>
                            <div class="mb-3">
                                <img src="assets/img/maps.png" style="width:100%"></img>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <textarea class="form-control border border-dark" rows="3" name="address"
                                    required></textarea>
                            </div>
                            <div id="map"></div>
                            <div class="mb-3">
                                <label for="address">Description</label>
                                <textarea class="form-control border border-dark" placeholder="Deskripsi" rows="3"
                                    name="description" required></textarea>
                            </div>
                            <label for="facilities">Facilities</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">sqft</label>
                                    <input type="number" class="form-control border border-dark" id="inputnumber"
                                        aria-describedby="inputsqft" name="sqft" value="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">garage</label>
                                    <input type="number" class="form-control border border-dark" id="inputgarage"
                                        aria-describedby="inputgarage" name="garage" value="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">bed</label>
                                    <input type="number" class="form-control border border-dark" id="inputbed"
                                        aria-describedby="inputbed" name="bed" value="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">bath</label>
                                    <input type="number" class="form-control border border-dark" id="inputbath"
                                        aria-describedby="inputbath" name="bath" value="" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">floor</label>
                                    <input type="number" class="form-control border border-dark" id="inputfloor"
                                        aria-describedby="inputfloor" name="floor" value="" required>
                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary" style="background-color:#021622; width: 100%">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
</body>