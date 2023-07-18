<?php
   if (isset($_GET['id_pengunjung'])) 
   {
        include("koneksi.php");        
        $id = $_GET['id_pengunjung'];
        $sql = "delete from data_kontak where id_pengunjung='$id'";

        if(mysqli_query($conn,$sql)) {
            header("location:data.php");
        }        
        mysqli_close($conn);
    }
?>