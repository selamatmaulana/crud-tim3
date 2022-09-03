<?php
$conn = mysqli_connect("localhost", "root", "", "db_tugas");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($rows = mysqli_fetch_assoc($result)) {
        $row[] = $rows;
    }
    return $row;
}
function tambah_anggota($data)
{
    global $conn;
    $nama_anggota = htmlspecialchars($data["nama_mahasiswa"]);
    $nim = htmlspecialchars($data["nim"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $ketua = ($data["anggota_kelompok_id"]);
    $kel =  ($data["id_user"]);
    $query = "INSERT INTO mahasiswa VALUES ('','$nama_anggota','$nim','$kelas','$email','$alamat','$kel','$ketua')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_mahasiswa($data)
{
    global $conn;
    $id = $data["id"];
    $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
    $nim = htmlspecialchars($data["nim"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $ketua = $data["anggota_kelompok_id"];
    $kelompok =  $data["id_user"];
    $query = "UPDATE mahasiswa SET 
        nama_mahasiswa = '$nama_mahasiswa',
        nim = '$nim',
        kelas = '$kelas',
        email = '$email',
        alamat = '$alamat',
        user_id = '$kelompok',
        anggota_kelompok_id = '$ketua'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_mahasiswa($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function anggota_kelompok($data)
{
    global $conn;
    $id_anggota = ($data["id"]);
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);
    $nim = htmlspecialchars($data["nim"]);
    $query = "INSERT INTO anggota_kelompok VALUES ('','$nama_anggota','$nim')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_anggota_kelompok($data)
{
    global $conn;
    $id = $data["id"];
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);
    $nim = htmlspecialchars($data["nim"]);
    $query = "UPDATE anggota_kelompok SET 
        nama_anggota = '$nama_anggota',
        nim = '$nim'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_anggota($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM anggota_kelompok WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function daftar_kp($data)
{
    global $conn;
    $tempat_kp = htmlspecialchars($data["tempat_kp"]);
    $alamat_kp = htmlspecialchars($data["alamat_kp"]);
    $tanggal_mulai = htmlspecialchars($data["tanggal_mulai"]);
    $tanggal_selesai = htmlspecialchars($data["tanggal_selesai"]);
    $anggota_kelompok_id = ($data["anggota_kelompok_id"]);
    $dosen_id =  ($data["dosen_id"]);
    $proposal = upload_prop();
    if (!$proposal) {
        return false;
    }
    $perusahaan_id =  ($data["perusahaan_id"]);
    $query = "INSERT INTO pendaftaran_kp VALUES ('','$tempat_kp','$alamat_kp','$tanggal_mulai','$tanggal_selesai','$proposal','$anggota_kelompok_id','$dosen_id','$perusahaan_id')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload_prop()
{
    $file = $_FILES['proposal']['name'];
    $lokasi = $_FILES['proposal']['tmp_name'];
    $ekstensiFileValid = ['pdf'];
    $error = $_FILES['proposal']['error'];
    $ekstensiFile = explode('.', $file);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if ($error === 4) {
        echo "
        <script>
        alert('Masukan File Terlebih dahulu');
        </script>
        ";
    }
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('Pastikan File Berektensi PDF');
        </script>
        ";
        return false;
    }
    move_uploaded_file($lokasi, "file/" . $file);
    return $file;
}
function update_pendaftaran($data)
{
    global $conn;
    $id = $data["id"];
    $tempat_kp = htmlspecialchars($data["tempat_kp"]);
    $alamat_kp = htmlspecialchars($data["alamat_kp"]);
    $tanggal_mulai = htmlspecialchars($data["tanggal_mulai"]);
    $tanggal_selesai = htmlspecialchars($data["tanggal_selesai"]);
    $proposal_lama = $data["file_lama"];
    $anggota_kelompok_id = $data["anggota_kelompok_id"];
    $dosen_id = $data["dosen_id"];
    $perusahaan_id =  $data["perusahaan_id"];
    if ($_FILES['proposal']['error'] === 4) {
        $proposal = $proposal_lama;
    } else {
        $proposal =  upload_prop();
    }
    $query = "UPDATE pendaftaran_kp SET 
        tempat_kp = '$tempat_kp',
        alamat_kp = '$alamat_kp',
        tanggal_mulai = '$tanggal_mulai',
        tanggal_selesai = '$tanggal_selesai',
        proposal = '$proposal',
        anggota_kelompok_id = '$anggota_kelompok_id',
        dosen_id = '$dosen_id',
        perusahaan_id = '$perusahaan_id'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_pendaftaran($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pendaftaran_kp WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function tambah_lembarkerjakp($data)
{
    global $conn;
    $tanggal = htmlspecialchars($data["tanggal"]);
    $anggota_kelompok_id = ($data["anggota_kelompok_id"]);
    $file = upload_file();
    if (!$file) {
        return false;
    }
    $query = "INSERT INTO lembar_kerja VALUES ('','$tanggal','$file','$anggota_kelompok_id')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload_file()
{
    $file = $_FILES['file']['name'];
    $lokasi = $_FILES['file']['tmp_name'];
    $ekstensiFileValid = ['pdf'];
    $error = $_FILES['file']['error'];
    $ekstensiFile = explode('.', $file);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if ($error === 4) {
        echo "
        <script>
        alert('Masukan File Terlebih dahulu');
        </script>
        ";
    }
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('Pastikan File Berektensi PDF');
        </script>
        ";
        return false;
    }
    move_uploaded_file($lokasi, "file/" . $file);
    return $file;
}
function update_lkp($data)
{
    global $conn;
    $id = $data["id"];
    $tanggal = htmlspecialchars($data["tanggal"]);
    $file_lama = $data["file_lama"];
    $anggota_kelompok_id = $data["anggota_kelompok_id"];
    if ($_FILES['file']['error'] === 4) {
        $file = $file_lama;
    } else {
        $file =  upload_file();
    }
    $query = "UPDATE lembar_kerja SET 
        tanggal = '$tanggal',
        file = '$file',
        anggota_kelompok_id ='$anggota_kelompok_id'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_lkp($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM lembar_kerja WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function tambah_ujiankp($data)
{
    global $conn;
    $laporan_kp = laporan_kp();
    $jadwal_ujian = ($data["jadwal_ujian"]);
    $pendaftaran_kp_id = ($data["pendaftaran_kp_id"]);
    $acc_ujian_id = ($data["acc_ujian_id"]);
    if (!$laporan_kp) {
        return false;
    }
    $query = "INSERT INTO pendaftaran_ujian_kp VALUES ('','$laporan_kp','$jadwal_ujian','$pendaftaran_kp_id','$acc_ujian_id')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function laporan_kp()
{
    $file = $_FILES['laporan_kp']['name'];
    $lokasi = $_FILES['laporan_kp']['tmp_name'];
    $ekstensiFileValid = ['pdf'];
    $error = $_FILES['laporan_kp']['error'];
    $ekstensiFile = explode('.', $file);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if ($error === 4) {
        echo "
        <script>
        alert('Masukan File Terlebih dahulu');
        </script>
        ";
    }
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('Pastikan File Berektensi PDF');
        </script>
        ";
        return false;
    }
    move_uploaded_file($lokasi, "file/" . $file);
    return $file;
}
function update_ujiankp($data)
{
    global $conn;
    $id = $data["id"];
    $jadwal_ujian = htmlspecialchars($data["jadwal_ujian"]);
    $pendaftaran_kp_id = $data["pendaftaran_kp_id"];
    $acc_ujian_id = $data["acc_ujian_id"];
    $file_lama = $data["file_lama"];
    if ($_FILES['laporan_kp']['error'] === 4) {
        $laporan_kp = $file_lama;
    } else {
        $laporan_kp =  laporan_kp();
    }
    $query = "UPDATE pendaftaran_ujian_kp SET 
        laporan_kp = '$laporan_kp',
        jadwal_ujian = '$jadwal_ujian',
        pendaftaran_kp_id ='$pendaftaran_kp_id',
        acc_ujian_id ='$acc_ujian_id'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_ujiankp($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pendaftaran_ujian_kp WHERE id = $id");
    return mysqli_affected_rows($conn);
}
