<?php
  if (isset($_POST["submit"]))
  {
      include("koneksi.php");
      // sesuai name di form
      $nama = $_POST["nama"];
      $email = $_POST["email"];
      $alamat = $_POST["alamat"];
      $pesan = $_POST["pesan"];
      $telepon = $_POST["telpon"];

      $sql = "INSERT INTO data_kontak (nama,email,alamat,no_telp,pesan) VALUES ('$nama', '$email', '$alamat','$telepon','$pesan')";

      if ($conn->query($sql) === TRUE) {
        echo "Data artikel berhasil disimpan";
        header("location:index.html");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }      
      $conn->close();
  }
?> 