<?php 
require "fungsi.php";
$id = $_GET["id"];

 if (hapus_mahasiswa($id)>0){
            echo "<script>
                a'dalert (data berhasil di hapus');
                document.location.href = 'pendaftaran.php'
            </script>" ;
        }
        else {
            echo "<script>
                alert ('data gagal di hapus');
                document.location.href = 'pendaftaran.php'
            </script>";
        }
?>