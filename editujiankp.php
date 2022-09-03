<?php

require "fungsi.php";


//ambil data URL
$id = $_GET["id"];

$pendaftaran_ujian_kp = query("SELECT * FROM pendaftaran_ujian_kp WHERE id = '$id'")[0];
// mysqli_query($conn,$query);
//return mysqli_affected_rows($conn);

if (isset($_POST["submit"])) {
    if (update_ujiankp($_POST) > 0) {
        echo "<script>
                alert ('data berhasil di edit');
                document.location.href = 'ujianKP.php'
            </script>";
    } else {
        // echo "<script>
        //         alert ('data gagal di edit');
        //         document.location.href = 'ujianKP.php'
        //     </script>";
        die;
    }
}
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
                <li class="active"><a href="#">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Pendaftaran KP</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Surat Izin</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Lembar kerja KP</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Pendaftran Ujian KP</span>
                    </a></li>
                <li><a href="#">
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
        <h1>DAFTAR KP</h1>

        <div class="dash-content">
            <div class="activity">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" placeholder="nama" name="id" class="nama" required value="<?= $pendaftaran_ujian_kp["id"]; ?>" />
                    <input type="hidden" placeholder="nama" name="file_lama" class="nama" required value="<?= $pendaftaran_ujian_kp["id"]; ?>" />
                    <div class="activity">
                        <table class="table table-hover table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>laporan_kp</th>
                                    <th>jadwal_ujian</th>
                                    <th>pendaftaran_kp_id</th>
                                    <th>acc_ujian_id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="isi">
                                    <td class="data">
                                        <label for="exampleInputEmail1" class="form-label"></label>
                                        <input type="file" placeholder="" name="laporan_kp" class="nama" required value="<?= $pendaftaran_ujian_kp["laporan_kp"]; ?>" />
                                    </td>
                                    <td class="data">
                                        <label for="exampleInputEmail1" class="form-label"></label>
                                        <input type="date" placeholder="" name="jadwal_ujian" class="nama" required value="<?= $pendaftaran_ujian_kp["jadwal_ujian"]; ?>" />
                                    </td>
                                    <td class="data">
                                        <label for="exampleInputEmail1" class="form-label"></label>
                                        <input type="text" placeholder="" name="pendaftaran_kp_id" class="nama" required value="<?= $pendaftaran_ujian_kp["pendaftaran_kp_id"]; ?>" />
                                    </td>
                                    <td class="data">
                                        <label for="exampleInputEmail1" class="form-label"></label>
                                        <input type="text" placeholder="" name="acc_ujian_id" class="nama" required value="<?= $pendaftaran_ujian_kp["acc_ujian_id"]; ?>" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <div class="tombol1">
            <a class="tmbol" href="">
                <button class="tombol-daftar" name="submit">SIMPAN</button>
            </a>
        </div>
        </form>
        <!-- <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Prem Shahi</span>
                        
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">premshahi@gmail.com</span>
                        
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <span class="data-list">2022-02-12</span>
                       
                    </div>
                    <div class="data type">
                        <span class="data-title">Type</span>
                        <span class="data-list">New</span>
                        
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <button>Tambah</button>
                        <button>Update</button>
                        <button>Delete</button>
                       
                    </div> -->
        </div>
        </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>