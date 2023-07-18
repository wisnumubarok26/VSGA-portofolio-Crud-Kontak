<?php
    include("koneksi.php");
     
    $id = $_GET['id_pengunjung'];
    $qry = mysqli_query($conn, "select * from data_kontak where id_pengunjung='$id'");
    $data = mysqli_fetch_array($qry);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .popup.active {
      display: block;
    }
  </style>
  <script> 
  function showPopup() {
      var popup = document.getElementById("popup");
      popup.classList.add("active");
    }

    function hidePopup() {
      var popup = document.getElementById("popup");
      popup.classList.remove("active");
    }
    </script>
</head>

<body class="bg-gray-100">
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center text-gray-800">Silahkan Update data</h1>
    <form class="mt-8" action="" method="post">
      <div class="mb-4">
        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
        <input value="<?php echo $data['nama']; ?>" type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Masukkan nama Anda" >
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input value="<?php echo $data['email']; ?>" type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Masukkan alamat email Anda">
      </div>
      <div class="mb-4">
        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
        <input value="<?php echo $data['alamat']; ?>" type="text" id="alamat" name="alamat" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Masukkan alamat Anda">
      </div>
      <div class="mb-4">
        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">No Telepon</label>
        <input value="<?php echo $data['no_telp']; ?>" type="text" id="telpon" name="telpon" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Masukkan alamat Anda">
      </div>
      <div class="mb-4">
        <label for="pesan" class="block text-gray-700 text-sm font-bold mb-2">Pesan:</label>
        <textarea id="pesan" name="pesan" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Tulis pesan Anda"><?php echo $data['pesan']; ?></textarea>
      </div>
      <div class="flex justify-center">
        <button onclick="showPopup()" type="submit" name="sb" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Ubah</button>
        <a href="data.php" class="text-white border bg-red-500 hover:bg-red-800 rounded px-2 py-2 bg-red">Kembali</a>
      </div>
    </form>
    <?php
  if (isset($_POST["sb"]))
  {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $pesan = $_POST["pesan"];
    $telepon = $_POST["telpon"];

      $sql = "UPDATE data_kontak set nama='$nama', email='$email', alamat='$alamat', pesan='$pesan',no_telp='$telepon' where id_pengunjung = $id";

      if ($conn->query($sql) === TRUE) {
        ?>
        <div id="popup" class="popup">
        <h2 class="text-lg font-bold mb-2">Data berhasil diubah</h2>
        <p>Keterangan lain mengenai perubahan data.</p>
        <button onclick="hidePopup()" class="mt-4 bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Tutup</button>
        </div>

        <?php
        header("location:data.php");
      }
      
      $conn->close();
  }
?>  
</body>

</html>
