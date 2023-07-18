<?php
// login.php

// Periksa apakah form telah dikirim
if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Lakukan validasi email dan password di sini sesuai kebutuhan

    // Contoh validasi sederhana
    if ($email === "wisnumubarok2002@gmail.com" && $password === "123") {
        // Login berhasil, arahkan pengguna ke halaman lain
        header("Location: data.php");
        exit;
    } else {
        // Login gagal, tampilkan pesan error
        $error = "Email atau password salah";
    }
} else {
    // Jika email atau password tidak diisi, tampilkan pesan error
    $error = "Mohon isi email dan password";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex justify-center items-center h-screen bg-gray-200">
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl mb-4">Login</h2>
        <?php if (isset($error)) : ?>
            <p class="text-red-500 mb-4"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-4">
                <label for="email" class="block mb-2">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
