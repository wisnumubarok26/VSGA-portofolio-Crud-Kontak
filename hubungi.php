<?php
if (isset($_GET['id_pengunjung'])) {
    include("koneksi.php");        
    $id = $_GET['id_pengunjung'];
    $sql = "SELECT no_telp FROM data_kontak WHERE id_pengunjung='$id'";        
    $result = mysqli_query($conn,$sql);
    
    echo $sql;
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $no_telp = $row['no_telp'];

        // Membentuk URL WhatsApp
        $whatsappUrl = 'https://api.whatsapp.com/send?phone=' . $no_telp;
        
        // Mengarahkan pengguna ke URL WhatsApp
        header('Location: ' . $whatsappUrl);
        exit();
    } else {
        echo "Data tidak ditemukan";
    }
    
    mysqli_close($conn);
}
?>
