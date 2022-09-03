<?php
require "fungsi.php";
$anggota_kelompok = query ("SELECT * FROM anggota_kelompok");
$mahasiswa =  query ("SELECT * FROM mahasiswa ");
$daftar_kp = query ("SELECT pendaftaran_kp.id,tempat_kp,alamat_kp,tanggal_mulai,tanggal_selesai,proposal,anggota_kelompok_id,dosen_id,perusahaan_id, nama_anggota FROM pendaftaran_kp INNER JOIN anggota_kelompok ON pendaftaran_kp.anggota_kelompok_id = anggota_kelompok.id ");


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
                <li><a href="#">
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
                <li><a href="jadwal.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Jadwal Ujian KP</span>
                    </a></li>
                <li><a href="nilai.php">
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

        <div class="dash-content">
            <div class="activity">
                <p class="h5 margin" style="margin-top: 10vh !important;">Mahasiswa</p>
                <table class="table table-hover table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $row) : ?>
                            <tr class="isi">
                                <td class="data"><?= $row["nama_mahasiswa"]; ?></td>
                                <td class="data"><?= $row["nim"]; ?></td>
                                <td class="data"><?= $row["kelas"]; ?></td>
                                <td class="data"><?= $row["alamat"]; ?></td>
                                <td class="data"><?= $row["email"]; ?></td>
                                <td class="data-tombol">
                                    <a href="editmahasiswa.php?id=<?= $row["id"]; ?>"><button class="btn btn-info"" name=" submit"> Update</button> </a>
                                    <a href="deletemahasiswa.php?id=<?= $row["id"]; ?>"><button class="btn btn-danger" name="submit">delete</button></a>
                                </td>
                            </tr>


                        <?php endforeach; ?>
                    </tbody>
                </table>

                <a class="tmbol" href="mahasiswa.php">
                    <button class="tombol-daftar">TAMBAH</button>
                </a>
                </table>
                <br><br><br>
                <p class="h5">daftarKP</p>
                <div class="data1">

                    <table class="table table-hover table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tempat KP</th>
                                <th>Alamat Kp</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($daftar_kp as $row) : ?>
                                <tr class="isi">
                                    <td class="data"><?= $row["tempat_kp"]; ?></td>
                                    <td class="data"><?= $row["alamat_kp"]; ?></td>
                                    <td class="data"><?= $row["tanggal_mulai"]; ?></td>
                                    <td class="data"><?= $row["tanggal_selesai"]; ?></td>
                                    <td class="data-tombol">
                                        <a href="editdaftar.php?id=<?= $row["id"]; ?>"><button class="btn btn-info" name="submit"> Update</button>
                                            <a href="deletedaftar.php?id=<?= $row["id"]; ?>"><button class="btn btn-danger">delete</button>
                                    </td>
                                </tr>
                                <thead class="">
                                    <tr>
                                        <th>proposal</th>
                                        <th>anggota_kelompok_id</th>
                                        <th>Dosen_id</th>
                                        <th>Perusahaan_id</th>
                                    </tr>
                                    <tr>
                                        <td class="data"><?= $row["proposal"]; ?></td>
                                        <td class="data"><?= $row["nama_anggota"]; ?></td>
                                        <td class="data"><?= $row["dosen_id"]; ?></td>
                                        <td class="data"><?= $row["perusahaan_id"]; ?></td>
                                    </tr>
                                </thead>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
                <a class="tmbol" href="daftarKP.php">
                    <button class="tombol-daftar">TAMBAH</button>
                </a>
                <br><br><br>
                <p class="h5">anggota_kelompok</p>
                <div class="data1">

                    <table class="table table-hover table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($anggota_kelompok as $row) : ?>
                                <tr class="isi">
                                    <td class="data"><?= $row["nama_anggota"]; ?></td>
                                    <td class="data"><?= $row["nim"]; ?></td>
                                    <td class="data-tombol">
                                        <a href="editanggota.php?id=<?= $row["id"]; ?>"><button class="btn btn-info" name="submit"> Update</button>
                                            <a href="deleteanggota.php?id=<?= $row["id"]; ?>"><button class="btn btn-danger">delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tmblanggota">
                    <a class="tmbol" href="anggota.php">
                        <button class="tombol-daftar">TAMBAH</button>
                </div>

            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>