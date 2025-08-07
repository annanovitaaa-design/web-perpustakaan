<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Pengguna</title>
  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-100 to-purple-200 font-sans">

  <!-- Navbar -->
  <div class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-10">
    <div class="flex items-center space-x-2">
  <img src="assets/dist/img/PUSDES SULOMATTAPPA.png" alt="Logo PusDes" class="w-8 h-8 rounded-md">
  <span class="text-xl font-extrabold text-purple-700">PUSDES SULOMATTAPPA</span>
</div>

    <div class="flex items-center gap-3">
      <img src="assets/dist/img/user2-160x160.jpg" class="w-8 h-8 rounded-full border-2 border-purple-400" alt="User Image">
      <span class="text-gray-800 font-semibold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
      <a href="logout.php" class="ml-4 text-red-600 font-semibold hover:underline">Logout</a>
    </div>
  </div>

  <!-- Konten Utama -->
  <main class="flex-grow flex flex-col justify-center items-center px-6 py-12">

    <!-- Ucapan Selamat Datang -->
    <div class="text-center mb-10">
      <h1 class="text-3xl md:text-4xl font-bold text-purple-800">Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
      <p class="mt-2 text-gray-700 text-lg">Selamat datang di <strong>Sistem Informasi Perpustakaan Desa</strong></p>
    </div>

    <!-- Menu Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-4xl">
      <!-- Data Buku -->
      <a href="buku.php" class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl hover:bg-blue-100 transition text-center border border-blue-200">
        <div class="text-blue-600 text-4xl"><i class="fas fa-book"></i></div>
        <div class="mt-3 text-lg font-bold text-gray-700">Lihat Data Buku</div>
      </a>

      <!-- Visi Misi -->
      <a href="visi_misi.php" class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl hover:bg-purple-100 transition text-center border border-purple-200">
        <div class="text-purple-600 text-4xl"><i class="fas fa-lightbulb"></i></div>
        <div class="mt-3 text-lg font-bold text-gray-700">Visi Misi</div>
      </a>

      <!-- Riwayat -->
      <a href="riwayat.php" class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl hover:bg-yellow-100 transition text-center border border-yellow-200">
        <div class="text-yellow-500 text-4xl"><i class="fas fa-history"></i></div>
        <div class="mt-3 text-lg font-bold text-gray-700">Riwayat Peminjaman</div>
      </a>
    </div>

  </main>

</body>
</html>
