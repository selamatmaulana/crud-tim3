<?php 
require "fungsi.php";
$id = $_GET["id"];

 if (hapus_ujiankp($id)>0){
            echo "<script>
                alert ('data berhasil di hapus');
                document.location.href = 'ujiankp.php'
            </script>" ;
        }
        else {
            echo "<script>
                alert ('data gagal di hapus');
                document.location.href = 'ujiankp.php'
            </script>";
        }
