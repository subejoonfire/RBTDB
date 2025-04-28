<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Data Karyawan</title>
  <meta name="csrf-token" content="<?= csrf_token() ?>">
  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    tr.selected-row {
      background-color: #ffeeba;
    }

    .selected-count {
      margin-left: 10px;
      font-weight: bold;
      color: #ff6b00;
    }

    /* Style untuk modal yang lebih besar */
    .modal-xl {
      max-width: 800px;
    }

    /* Style untuk form dalam modal */
    .form-group {
      margin-bottom: 1rem;
    }
  </style>
</head>

<body>
  <!-- Modal Edit Multiple -->
  <div class="modal fade" id="editMultipleModal" tabindex="-1" aria-labelledby="editMultipleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="editMultipleModalLabel">Edit Data Terpilih (<span
              id="selectedCountModal">0</span>)</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('karyawan/updateSelected') ?>" method="POST" id="formEditMultiple">
          <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
            <div id="alertBox" class="alert d-none"></div>
            <input type="hidden" name="id_karyawan[]" id="id_karyawan">
            <div id="multipleForms"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="main-panel">
    <div class="main-header">
      <div class="container">

        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Data Karyawan</h3>
            <ul class="breadcrumbs mb-3">
              <li class="nav-home">
                <a href="#"><i class="icon-home"></i></a>
              </li>
              <li class="separator"><i class="icon-arrow-right"></i></li>
              <li class="nav-item"><a href="#">Tables</a></li>
              <li class="separator"><i class="icon-arrow-right"></i></li>
              <li class="nav-item"><a href="#">Datatables</a></li>
            </ul>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Karyawan</h4>
                    <button onclick="window.location.href='<?= base_url('karyawanadd') ?>'"
                      class="btn btn-primary btn-round ms-auto">
                      <i class="fa fa-plus"></i> Tambah Karyawan
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <div class="mb-3 d-flex align-items-center">
                      <button class="btn btn-warning btn-sm" id="btnEditMultiple" disabled>
                        <i class="fas fa-edit"></i> Edit Terpilih (<span
                          id="selectedCount">0</span>)
                      </button>
                      <div class="selected-count" id="selectedCountText"></div>
                    </div>

                    <table id="add-row" class="display table table-striped table-hover">
                      <thead>
                        <tr>
                          <th><input type="checkbox" id="select-all"></th>
                          <th>No</th>
                          <th>SN</th>
                          <th>Nama</th>
                          <th>Status</th>
                          <th style="width: 10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($karyawan as $k) : ?>
                          <tr>
                            <td>
                              <input type="checkbox" class="row-checkbox"
                                name="selected_ids[]" value="<?= $k['id_karyawan'] ?>">
                            </td>
                            <td><?= $counter++ ?></td>
                            <td><?= $k['sn'] ?></td>
                            <td><?= $k['nama'] ?></td>
                            <td><?= $k['status'] ?></td>
                            <td>
                              <div class="form-button-action">
                                <a href="<?= base_url('karyawan/detail/' . $k['id_karyawan']) ?>"
                                  title="Lihat" class="btn btn-link btn-primary btn-lg">
                                  <i class="fa fa-eye"></i>
                                </a>
                                <a href="<?= base_url('karyawan/edit/' . $k['id_karyawan']) ?>"
                                  data-bs-toggle="tooltip" title="Edit"
                                  class="btn btn-link btn-primary btn-lg">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);"
                                  onclick="confirmDelete('<?= base_url('karyawan/delete/' . $k['id_karyawan']) ?>')"
                                  data-bs-toggle="tooltip" title="Hapus"
                                  class="btn btn-link btn-danger">
                                  <i class="fa fa-times"></i>
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

  <!-- JavaScript Files -->
  <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
  <script src="../assets/js/kaiadmin.min.js"></script>
  <script src="../assets/js/setting-demo2.js"></script>

  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function() {
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

      $('#select-all').on('click', function() {
        $('.row-checkbox').prop('checked', this.checked);
        updateSelectedCount();
      });

      // Handle Row Checkbox
      $(document).on('change', '.row-checkbox', function() {
        updateSelectedCount();
      });

      function updateSelectedCount() {
        const selectedCount = $('.row-checkbox:checked').length;
        $('#selectedCount').text(selectedCount);
        $('#selectedCountModal').text(selectedCount);
        $('#btnEditMultiple').prop('disabled', selectedCount === 0);

        if (selectedCount > 0) {
          $('#selectedCountText').text(`Terpilih: ${selectedCount} item`);
        } else {
          $('#selectedCountText').text('');
        }
      }

      // Open the modal for editing selected rows
      $('#btnEditMultiple').on('click', function() {
        var selectedIds = [];
        $('#multipleForms').empty(); // Kosongkan form sebelumnya

        // Ambil ID karyawan yang dipilih
        $('.row-checkbox:checked').each(function() {
          var id = $(this).val();
          selectedIds.push(id);

          // Lakukan request ke server untuk mendapatkan data karyawan berdasarkan ID
          fetch(`/karyawan/get/${id}`)
            .then(response => response.json())
            .then(karyawan => {
              // Ambil data dari response
              var status = karyawan.status;
              var nama = karyawan.nama;
              var nik = karyawan.nik;
              var sn = karyawan.sn;
              var no_hp = karyawan.no_hp;
              var no_hp_darurat = karyawan.no_hp_darurat;
              var doh = karyawan.doh;
              var tanggal_lahir = karyawan.tanggal_lahir;
              var usia = karyawan.usia;

              // Tambahkan form untuk karyawan yang dipilih
              $('#multipleForms').append(`
                    <div class="form-group">
                        <label for="sn_${id}">Serial Number (SN)</label>
                        <input type="text" class="form-control" id="sn_${id}" name="sn[${id}]" value="${sn}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_${id}">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama_${id}" name="nama[${id}]" value="${nama}" required>
                    </div>

                    <div class="form-group">
                        <label for="nik_${id}">NIK</label>
                        <input type="text" class="form-control" id="nik_${id}" name="nik[${id}]" value="${nik}" required>
                        <small class="text-danger d-none" id="nikError_${id}">NIK harus 16 digit angka.</small>
                    </div>

                    <div class="form-group">
                        <label for="status_${id}">Status</label>
                        <select class="form-control" id="status_${id}" name="status[${id}]" required>
                            <option value="Aktif" ${status === 'Aktif' ? 'selected' : ''}>Aktif</option>
                            <option value="PHK" ${status === 'PHK' ? 'selected' : ''}>PHK</option>
                            <option value="Cuti" ${status === 'Cuti' ? 'selected' : ''}>Cuti</option>
                            <option value="Off" ${status === 'Off' ? 'selected' : ''}>Off</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_hp_${id}">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp_${id}" name="no_hp[${id}]" value="${no_hp}" required>
                        <small class="text-danger d-none" id="noHpError_${id}">Nomor HP harus minimal 10 digit angka.</small>
                    </div>

                    <div class="form-group">
                        <label for="no_hp_darurat_${id}">Nomor HP Darurat</label>
                        <input type="text" class="form-control" id="no_hp_darurat_${id}" name="no_hp_darurat[${id}]" value="${no_hp_darurat}">
                    </div>

                    <div class="form-group">
                        <label for="doh_${id}">Tanggal Masuk Kerja (DOH)</label>
                        <input type="date" class="form-control" id="doh_${id}" name="doh[${id}]" value="${doh}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir_${id}">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir_${id}" name="tanggal_lahir[${id}]" value="${tanggal_lahir}" required>
                    </div>

                    <div class="form-group">
                        <label for="usia_${id}">Usia</label>
                        <input type="number" class="form-control" id="usia_${id}" name="usia[${id}]" value="${usia}" required readonly>
                    </div>

                    <div class="form-group">
                        <hr />
                    </div>
                `);
            })
            .catch(error => {
              console.error('Error:', error);
            });
        });

        // Tambahkan ID karyawan ke input tersembunyi
        $('#id_karyawan').val(selectedIds.join(','));

        // Tampilkan modal
        $('#editMultipleModal').modal('show');
      });




    });
  </script>
</body>

</html>