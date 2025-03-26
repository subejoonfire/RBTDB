<!DOCTYPE html>
<html lang="en">
<div class="main-panel">
  <div class="main-header">
    <div class="container">
      <div class="page-inner">
        <div class="page-header">
          <h3 class="fw-bold mb-3">Data Karyawan</h3>
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
                      <h4 class="card-title">Data Karyawan</h4>
                      <button onclick="window.location.href='<?= base_url('karyawanadd') ?>'"
                        class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                        data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Karyawan
                      </button>

                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>SN</th>
                            <th>Nama</th>
                            <th style="width: 10%">Aksi</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $counter = 1; ?>
                          <?php foreach ($karyawan as $k) : ?>
                            <tr>
                              <td><?= $counter++ ?></td>
                              <td><?= $k['sn'] ?></td>
                              <td><?= $k['nama'] ?></td>
                              <td>
                                <div class="form-button-action">
                                  <a href="<?= base_url('karyawan/detail/' . $k['id_karyawan']) ?>"
                                    title="Lihat"
                                    class="btn btn-link btn-primary btn-lg">
                                    <i class="fa fa-eye"></i>
                                  </a>
                                  <a href="<?= base_url('karyawan/edit/' . $k['id_karyawan']) ?>"
                                    data-bs-toggle="tooltip" title="Edit"
                                    class="btn btn-link btn-primary btn-lg">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <a href="<?= base_url('karyawan/delete/' . $k['id_karyawan']) ?>"
                                    data-bs-toggle="tooltip" title="Hapus"
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

          <!-- jQuery Scrollbar -->
          <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
          <!-- Datatables -->
          <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
          <!-- Kaiadmin JS -->
          <script src="../assets/js/kaiadmin.min.js"></script>
          <!-- Kaiadmin DEMO methods, don't include it in your project! -->
          <script src="../assets/js/setting-demo2.js"></script>
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

              // Add Row
              $("#add-row").DataTable({
                pageLength: 5,
                scrollY: "400px",
                /* Menambahkan scroll secara otomatis */
                scrollCollapse: true,
                paging: false
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
          </script>
          </body>

</html>