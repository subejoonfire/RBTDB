<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Departemen</title>

    <style>
    tr.selected-row {
        background-color: #ffeeba !important;
    }

    .form-button-action .btn-link {
        padding: 0.375rem 0.5rem;
    }

    .card-header {
        padding: 1.25rem 1.5rem;
    }

    .breadcrumbs {
        padding-left: 0;
        margin-bottom: 1rem;
    }

    .breadcrumbs li {
        display: inline-block;
    }

    .breadcrumbs li.separator {
        padding: 0 0.5rem;
    }

    #add-row_wrapper .dt-buttons {
        margin-bottom: 10px;
    }
    </style>

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-panel">
        <div class="main-header">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Data Departemen</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="#"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="separator"><i class="fas fa-chevron-right"></i></li>
                            <li class="nav-item"><a href="#">Tables</a></li>
                            <li class="separator"><i class="fas fa-chevron-right"></i></li>
                            <li class="nav-item"><a href="#">Datatables</a></li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Data departemen</h4>
                                        <button onclick="window.location.href='<?= base_url('departemenadd') ?>'"
                                            class="btn btn-primary btn-round ms-auto">
                                            <i class="fas fa-plus"></i> Tambah departemen
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-3 d-flex gap-2">
                                        <button class="btn btn-warning btn-sm" id="edit-selected">
                                            <i class="fas fa-edit"></i> Edit Terpilih
                                        </button>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="select-all"></th>
                                                    <th>No</th>
                                                    <th>Nama Departemen</th>
                                                    <th style="width: 15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($departemen as $d) : ?>
                                                <tr>
                                                    <td><input type="checkbox" class="row-checkbox"
                                                            value="<?= $d['id_departemen'] ?>"></td>
                                                    <td><?= $counter++ ?></td>
                                                    <td><?= htmlspecialchars($d['nama_departemen']) ?></td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button class="btn btn-link btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#viewModal"
                                                                data-id="<?= $d['id_departemen'] ?>"
                                                                data-nama="<?= htmlspecialchars($d['nama_departemen']) ?>">
                                                                <i class="fas fa-eye"></i> Lihat
                                                            </button>
                                                            <button class="btn btn-link btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#editModal"
                                                                data-id="<?= $d['id_departemen'] ?>"
                                                                data-nama="<?= htmlspecialchars($d['nama_departemen']) ?>">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            <a href="javascript:void(0);"
                                                                onclick="confirmDelete('<?= base_url('departemen/delete/' . $d['id_departemen']) ?>')"
                                                                title="Hapus" class="btn btn-link btn-danger">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Detail Departemen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID Departemen:</strong> <span id="view-id"></span></p>
                    <p><strong>Nama Departemen:</strong> <span id="view-nama"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Departemen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post">
                        <input type="hidden" name="id_departemen" id="edit-id">
                        <div class="mb-3">
                            <label for="edit-nama" class="form-label">Nama Departemen</label>
                            <input type="text" class="form-control" id="edit-nama" name="nama_departemen" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {
        // Initialize DataTable with export buttons
        var table = $("#add-row").DataTable({
            pageLength: 5,
            scrollY: "400px",
            scrollCollapse: true,
            paging: false,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Data_Karyawan',
                    text: '<i class="fa fa-file-excel-o"></i> Export Excel',
                    className: 'btn btn-success btn-sm'
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data_Karyawan',
                    text: '<i class="fa fa-file-text-o"></i> Export CSV',
                    className: 'btn btn-info btn-sm'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data_Karyawan',
                    text: '<i class="fa fa-file-pdf-o"></i> Export PDF',
                    className: 'btn btn-danger btn-sm'
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Print',
                    className: 'btn btn-secondary btn-sm'
                }
            ]
        });

        // Handle modal data for view and edit
        $('#viewModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const id = button.data('id');
            const nama = button.data('nama');

            $('#view-id').text(id);
            $('#view-nama').text(nama);
        });

        $('#editModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const id = button.data('id');
            const nama = button.data('nama');

            $('#edit-id').val(id);
            $('#edit-nama').val(nama);
        });
    });

    // Confirm delete function
    function confirmDelete(url) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
    </script>
</body>

</html>