<?php 
require "fungsi.php";
$id = $_GET["id"];

 if (hapus_anggota($id)>0){
            echo "<script>
                alert ('data berhasil di hapus');
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