<?php
require "fungsi.php";
$ujian_kp = query("SELECT * FROM pendaftaran_ujian_kp");
//  $mahasiswa =  query("SELECT * FROM mahasiswa ");
//  $daftar_kp = query("SELECT * FROM pendaftaran_kp");
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/poltek.png" alt="">
            </div>
            <span class="logo_name">Poliwangi</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="pendaftaran.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Pendaftaran KP</span>
                    </a></li>
                <li><a href="suratizinkp.php">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Surat Izin</span>
                    </a></li>
                <li><a href="lembarkerjaKP.php">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Lembar kerja KP</span>
                    </a></li>
                <li class="active"><a href="ujianKP.php">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Pendaftran Ujian KP</span>
                    </a></li>
                <li><a href="jadwal.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Jadwal Ujian KP</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-share"></i>
                        <span class="link-name">Nilai</span>
                    </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <img src="images/profile.jpg" alt="">
        </div>
        <!-- <p class="h5 margin" style="margin-top: 10vh !important;">Pendaftaran Ujian</p> -->

        <div class="dash-content">
            <div class="activity">
                <!-- <form action="" method="post"> -->
                <div class="activity">
                    <table class="table table-hover table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>laporan_KP</th>
                                <th>jadwal_ujian</th>
                                <th>pendaftaran_kp_id</th>
                                <th>ACC_Ujian_id</th>
                                <th>OPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ujian_kp as $row) : ?>
                                <tr class="isi">
                                    <td class="data">
                                        <?= $row["laporan_kp"]; ?>
                                    </td>
                                    <td class="data">
                                        <?= $row["jadwal_ujian"]; ?>
                                    </td>
                                    <td class="data">
                                        <?= $row["pendaftaran_kp_id"]; ?>
                                    </td>
                                    <td class="data">
                                        <?= $row["acc_ujian_id"]; ?>
                                    </td>
                                    <td class="data-tombol">
                                        <a href="editujiankp.php?id=<?= $row["id"]; ?>"><button class="btn btn-info" name="submit"> Update</button> </a>
                                        <a href="deleteujiankp.php?id=<?= $row["id"]; ?>"><button class="btn btn-danger" name="submit">delete</button></a>
                                    </td>
                                <?php endforeach; ?>
                                <tbody />
                    </table>

                </div>
            </div>

        </div>

        <!-- </form> -->
        <div class="tmbllkp">
            <a class="tmbol" href="tambahujiankp.php">
                <button class="tombol-daftar">TAMBAH</button>
        </div>

        </div>
        </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>