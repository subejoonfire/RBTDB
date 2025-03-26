<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            max-width: 900px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .info-section {
            margin-top: 30px;
        }

        .info-section table {
            width: 100%;
        }

        .info-section td {
            padding: 10px 0;
            font-size: 18px;
        }

        .label {
            font-weight: bold;
            width: 35%;
        }

        .btn-secondary {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            text-align: center;
            font-size: 18px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-header">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture">
            <div>
                <h2 class="mb-1"><?= $data['nama'] ?></h2>
                <p class="text-muted"><?= $data['status'] ?></p>
            </div>
        </div>
        <div class="info-section">
            <table>
                <tr>
                    <td class="label">Serial Number (SN):</td>
                    <td><?= $data['sn'] ?></td>
                </tr>
                <tr>
                    <td class="label">NIK:</td>
                    <td><?= $data['nik'] ?></td>
                </tr>
                <tr>
                    <td class="label">Telepon:</td>
                    <td><?= $data['no_hp'] ?></td>
                </tr>
                <tr>
                    <td class="label">Nomor Darurat:</td>
                    <td><?= $data['no_hp_darurat'] ?></td>
                </tr>
                <tr>
                    <td class="label">Tanggal Masuk Kerja:</td>
                    <td><?= $data['doh'] ?></td>
                </tr>
                <tr>
                    <td class="label">Tanggal Lahir:</td>
                    <td><?= $data['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td class="label">Usia:</td>
                    <td><?= $data['usia'] ?> tahun</td>
                </tr>
            </table>
        </div>
        <a href="<?= base_url('/karyawan') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>