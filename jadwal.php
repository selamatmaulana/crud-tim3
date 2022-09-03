<?php
require "fungsi.php";
$pendaft = query("SELECT pendaftaran_ujian_kp.id, acc_ujian_id, pendaftaran_ujian_kp.jadwal_ujian, laporan_kp, pendaftaran_kp_id, dosen_penguji FROM pendaftaran_ujian_kp INNER JOIN acc_ujian ON pendaftaran_ujian_kp.acc_ujian_id = acc_ujian.id");
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
                <li><a href="ujianKP.php">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Pendaftran Ujian KP</span>
                    </a></li>
                <li class="active"><a href="jadwal.php">
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
        <p class="h5 margin" style="margin-top: 10vh !important;">Jadwal Ujian</p>

        <div class="dash-content">
            <div class="activity">
                <!-- <form action="" method="post"> -->
                <!-- <p class="h5 margin" style="margin-top: 10vh !important;">Mahasiswa</p> -->
                <table class="table table-hover table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Hari Dan Tanggal</th>
                            <th scope="col">Judul Kerja Praktek</th>
                            <th scope="col">Dosen Penguji</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pendaft as $lmb) : ?>
                            <tr class="isi">
                                <td><?php $tanggal = $lmb['jadwal_ujian'];
                                    echo date("l-d-m-Y", strtotime($tanggal)) ?></td>
                                <td><?= $lmb['laporan_kp']; ?></td>
                                <td><?= $lmb["dosen_penguji"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>