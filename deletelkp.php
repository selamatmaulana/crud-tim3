<?php 
require "fungsi.php";
$id = $_GET["id"];

 if (hapus_lkp($id)>0){
            echo "<script>
                alert ('data berhasil di hapus');
                document.location.href = 'lembarkerjaKP.php'
            </script>" ;
        }
        else {
            echo "<script>
                alert ('data gagal di hapus');
                document.location.href = 'lembarkerjaKP.php'
            </script>";
        }
?>