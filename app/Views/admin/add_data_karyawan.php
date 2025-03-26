<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tambah Data Karyawan</title>
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Data Karyawan</h4>
            </div>
            <div class="card-body">
                <form id="karyawanForm" action="<?= base_url('proses_add_karyawan') ?>" method="POST">
                    <div id="alertBox" class="alert d-none"></div>

                    <div class="form-group">
                        <label for="sn">Serial Number (SN)</label>
                        <input type="text" class="form-control" id="sn" name="sn" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Karyawan</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                        <small class="text-danger d-none" id="nikError">NIK harus 16 digit angka.</small>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        <small class="text-danger d-none" id="noHpError">Nomor HP harus minimal 10 digit angka.</small>
                    </div>

                    <div class="form-group">
                        <label for="no_hp_darurat">Nomor HP Darurat</label>
                        <input type="text" class="form-control" id="no_hp_darurat" name="no_hp_darurat">
                    </div>

                    <div class="form-group">
                        <label for="doh">Tanggal Masuk Kerja (DOH)</label>
                        <input type="date" class="form-control" id="doh" name="doh" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="usia">Usia</label>
                        <input type="number" class="form-control" id="usia" name="usia" required readonly>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="<?= base_url('/karyawan') ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        function hitungUsia() {
            let tanggalLahir = $("#tanggal_lahir").val();
            if (tanggalLahir) {
                let today = new Date();
                let birthDate = new Date(tanggalLahir);
                let usia = today.getFullYear() - birthDate.getFullYear();
                let monthDiff = today.getMonth() - birthDate.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    usia--;
                }
                $("#usia").val(usia);
            }
        }

        $("#tanggal_lahir").on("change", hitungUsia);

        $("#karyawanForm").submit(function(event) {
            event.preventDefault();

            let valid = true;
            let nik = $("#nik").val();
            let noHp = $("#no_hp").val();
            let alertBox = $("#alertBox");

            $("#nikError").addClass("d-none");
            $("#noHpError").addClass("d-none");
            alertBox.addClass("d-none").removeClass("alert-danger alert-success");

            if (!/^\d{16}$/.test(nik)) {
                $("#nikError").removeClass("d-none");
                valid = false;
            }

            if (!/^\d{10,}$/.test(noHp)) {
                $("#noHpError").removeClass("d-none");
                valid = false;
            }

            if (valid) {
                alertBox.removeClass("d-none alert-danger").addClass("alert-success").text(
                    "Data valid! Form akan dikirim.");
                setTimeout(() => $("#karyawanForm")[0].submit(), 1000);
            } else {
                alertBox.removeClass("d-none alert-success").addClass("alert-danger").text(
                    "Harap periksa kembali data yang diisi.");
            }
        });
    });
    </script>

</body>

</html>