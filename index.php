<?php
$host       =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "pemweb-pertemuan-5";

$koneksi = mysqli_connect($host, $user, $password, $database);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <label>Prodi</label>
    <select id="prodi">
        <option>Semua Prodi</option>
        <option>Informatika</option>
        <option>Teknik Geofisika</option>
    </select>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>NIM.</th>
                <th>Nama.</th>
                <th>Prodi.</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $mahasiswa = mysqli_query($koneksi, "SELECT * from mhs");
                for($i = 0; $i < mysqli_num_rows($mahasiswa); $i++){
                    $dats = mysqli_fetch_array($mahasiswa);
            ?>
            <tr>
                <td><?= $dats['nim'] ?></td>
                <td><?= $dats['nama'] ?></td>
                <td><?= $dats['prodi'] ?></td>
            </tr>
            <?php } ?>
            <!-- <tr>
                <td>120140192</td>
                <td>Dani Saputra</td>
                <td>Informatika</td>
            </tr>
            <tr>
                <td>120140193</td>
                <td>Rika Sofianti</td>
                <td>Teknik Geofisika</td>
            </tr>
            <tr>
                <td>120140194</td>
                <td>Riko Darmawan</td>
                <td>Informatika</td>
            </tr>
            <tr>
                <td>120140195</td>
                <td>Rina Rahma</td>
                <td>Teknik Geofisika</td>
            </tr>
            <tr>
                <td>120140196</td>
                <td>Rendi Prayoga</td>
                <td>Teknik Geofisika</td>
            </tr>
            <tr>
                <td>12014019</td>
                <td>Reni</td>
                <td>Informatika</td>
            </tr>
            <tr>
                <td>12014020</td>
                <td>Resi</td>
                <td>Informatika</td>
            </tr>
            <tr>
                <td>12014021</td>
                <td>Reynal</td>
                <td>Informatika</td>
            </tr>
            <tr>
                <td>12014019</td>
                <td>Mia</td>
                <td>Teknik Geofisika</td>
            </tr> -->
        </tbody>
    </table>
</body>

</html>

<script>
    $('#prodi').on('change', function () {

        var data = this.value;

        var jo = $("tbody").find("tr");
        if (this.value == "Semua Prodi") {
            jo.show();
            return;
        }
        jo.hide();

        jo.filter(function (i, v) {
            var $t = $(this);

            if ($t.is(":contains('" + data + "')")) {
                return true;
            }
    
            return false;
        }).show();
    });
</script>