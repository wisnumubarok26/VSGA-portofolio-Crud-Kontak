<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kontak</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Data Kontak</h1>
    <table class="w-full bg-white border border-gray-200">
      <thead>
        <tr>
          <th class="py-2 px-2 bg-gray-200 border-b">No</th>
          <th class="py-2 px-2 bg-gray-200 border-b">Nama</th>
          <th class="py-2 px-2 bg-gray-200 border-b">Email</th>
          <th class="py-2 px-2 bg-gray-200 border-b">Alamat</th>
          <th class="py-2 px-2 bg-gray-200 border-b">No Telepon</th>
          <th class="py-2 px-2 bg-gray-200 border-b">Pesan</th>
        </tr>
      </thead>
      <tbody>
      <?php
            include("koneksi.php");
            $qry = mysqli_query($conn, "select * from data_kontak");
            $no = 1;
            foreach($qry as $row)
            {
        ?>
        <tr>
          <td class="py-2 px-4 border-b"><?php echo $no++ ?></td>
          <td class="py-2 px-4 border-b"><?php echo $row['nama'] ?> </td>
          <td class="py-2 px-4 border-b"><?php echo $row['email'] ?></td>
          <td class="py-2 px-4 border-b"><?php echo $row['alamat'] ?> </td>
          <td class="py-2 px-4 border-b"><?php echo $row['no_telp'] ?> </td>
          <td class="py-2 px-4 border-b"><?php echo $row['pesan'] ?> </td>
          <td class="py-2 px-4 border-b">
          <a href="delete.php?id_pengunjung=<?php echo $row['id_pengunjung']; ?>" class="text-white border bg-red-500 hover:bg-red-800 rounded px-2 py-2 bg-red">Hapus</a>
          <a href="update.php?id_pengunjung=<?php echo $row['id_pengunjung']; ?>" class="text-white border bg-blue-500 hover:bg-blue-800 rounded px-2 py-2 bg-blue">Edit</a>
          <a href="hubungi.php?id_pengunjung=<?php echo $row['id_pengunjung']; ?>" class="text-white border bg-green-500 hover:bg-green-600 rounded px-2 py-2 bg-blue">Whatsapp</a>

          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>
