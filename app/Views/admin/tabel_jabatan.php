<!DOCTYPE html>
<style>
  tr.selected-row {
    background-color: #ffeeba;
  }
</style>


<html lang="en">
<div class="main-panel">
  <div class="main-header">
    <div class="container">
      <div class="page-inner">
        <div class="page-header">
          <h3 class="fw-bold mb-3">Data jabatan</h3>
          <ul class="breadcrumbs mb-3">
            <li class="nav-home">
              <a href="#">
                <i class="icon-home"></i>
              </a>
            </li>
            <li class="separator">
              <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
              <a href="#">Tables</a>
            </li>
            <li class="separator">
              <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
              <a href="#">Datatables</a>
            </li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Data jabatan</h4>
                      <button onclick="window.location.href='<?= base_url('jabatanadd') ?>'"
                        class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                        data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah jabatan
                      </button>

                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <!-- Tombol di atas tabel -->
                      <div class="mb-3 d-flex gap-2">
                        <button class="btn btn-warning btn-sm" id="edit-selected">
                          <i class="fa fa-edit"></i> Edit Terpilih
                        </button>
                      </div>
                      <table id="add-row" class="display table table-striped table-hover">

                        <thead>
                          <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>No</th>
                            <th>Nama jabatan</th>
                            <th style="width: 10%">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter = 1; ?>
                          <?php foreach ($jabatan as $j) : ?>
                            <tr>
                              <td><input type="checkbox" class="row-checkbox" value="<?= $j['id_jabatan'] ?>"></td>
                              <td><?= $counter++ ?></td>
                              <td><?= $j['nama_jabatan'] ?></td>
                              <td>
                                <div class="form-button-action">
                                  <a href="<?= base_url('jabatan/detail/' . $j['id_jabatan']) ?>" title="Lihat" class="btn btn-link btn-primary btn-lg"><i class="fa fa-eye"></i></a>
                                  <a href="<?= base_url('jabatan/edit/' . $j['id_jabatan']) ?>" data-bs-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                  <a href="javascript:void(0);"
                                    onclick="confirmDelete('<?= base_url('jabatan/delete/' . $j['id_jabatan']) ?>')"
                                    data-bs-toggle="tooltip"
                                    title="Hapus"
                                    class="btn btn-link btn-danger">
                                    <i class="fa fa-times"></i>
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>


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

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                <br />
                <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
              </div>
            </div>

            <!-- End Custom template -->
          </div>
          <!--   Core JS Files   -->
          <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
          <script src="../assets/js/core/popper.min.js"></script>
          <script src="../assets/js/core/bootstrap.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

          <!-- jQuery Scrollbar -->
          <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
          <!-- Datatables -->
          <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
          <!-- Kaiadmin JS -->
          <script src="../assets/js/kaiadmin.min.js"></script>
          <!-- Kaiadmin DEMO methods, don't include it in your project! -->
          <script src="../assets/js/setting-demo2.js"></script>
          <!-- DataTables Buttons Plugin -->
          <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

          <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

          <script>
            $(document).ready(function() {
              $("#basic-datatables").DataTable({});

              $("#multi-filter-select").DataTable({
                pageLength: 5,
                initComplete: function() {
                  this.api()
                    .columns()
                    .every(function() {
                      var column = this;
                      var select = $(
                          '<select class="form-select"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on("change", function() {
                          var val = $.fn.dataTable.util.escapeRegex($(
                            this).val());

                          column
                            .search(val ? "^" + val + "$" : "",
                              true, false)
                            .draw();
                        });

                      column
                        .data()
                        .unique()
                        .sort()
                        .each(function(d, j) {
                          select.append(
                            '<option value="' + d + '">' + d +
                            "</option>"
                          );
                        });
                    });
                },
              });

              $("#add-row").DataTable({
                pageLength: 5,
                scrollY: "400px",
                scrollCollapse: true,
                paging: false,
                dom: 'Bfrtip', // Tombol muncul di atas tabel
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Data_jabatan',
                    text: '<i class="fa fa-file-excel-o"></i> Export Excel',
                    className: 'btn btn-success btn-sm'
                  },
                  {
                    extend: 'csvHtml5',
                    title: 'Data_jabatan',
                    text: '<i class="fa fa-file-text-o"></i> Export CSV',
                    className: 'btn btn-info btn-sm'
                  },
                  {
                    extend: 'pdfHtml5',
                    title: 'Data_jabatan',
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


              var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

              $("#addRowButton").click(function() {
                $("#add-row")

                  .dataTable()
                  .fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action,
                  ]);
                $("#addRowModal").modal("hide");
              });
            });
            // Script Select All Checkbox
            $('#select-all').on('click', function() {
              var rows = $('#add-row').DataTable().rows({
                'search': 'applied'
              }).nodes();
              $('input[type="checkbox"].row-checkbox', rows).prop('checked', this.checked);
            });

            $('#add-row tbody').on('change', 'input[type="checkbox"].row-checkbox', function() {
              $(this).closest('tr').toggleClass('selected-row', this.checked);

              var el = $('#select-all').get(0);
              if (!this.checked && el && el.checked && ('indeterminate' in el)) {
                el.indeterminate = true;
              }
            });

            $('#edit-selected').click(function() {
              const ids = getSelectedIds();
              if (ids.length === 0) {
                return alert('Pilih minimal satu jabatan untuk diedit.');
              }
              // Kirim ke controller edit_multiple dengan parameter id yang dipisahkan koma
              window.location.href = "<?= base_url('jabatan/edit_multiple/') ?>" + ids.join(',');
            });

            function getSelectedIds() {
              const selectedIds = [];
              $('input[type="checkbox"].row-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
              });
              return selectedIds;
            }

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