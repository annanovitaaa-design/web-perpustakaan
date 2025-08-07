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
    <title>Visi dan Misi</title>
    <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 flex flex-col font-sans">

    <!-- Navbar -->
    <div class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-10">
        <div class="text-xl font-extrabold text-purple-700">📚 PusDes</div>
        <div class="flex items-center gap-3">
            <img src="assets/dist/img/user2-160x160.jpg" class="w-8 h-8 rounded-full border-2 border-purple-400" alt="User Image">
            <span class="text-gray-800 font-semibold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="ml-4 text-red-600 font-semibold hover:underline">Logout</a>
        </div>
    </div>

    <!-- Konten -->
    <main class="flex-grow flex justify-center items-center p-6">
        <div class="bg-white rounded-2xl shadow-lg p-10 max-w-3xl w-full">
            <h1 class="text-3xl font-bold text-purple-700 text-center mb-6">Visi dan Misi Perpustakaan Desa</h1>

            <h2 class="text-xl font-semibold text-purple-600 mt-6 mb-2">Visi</h2>
            <p class="text-gray-700 leading-relaxed">
                Menjadi perpustakaan desa sebagai pusat literasi dan pemberdayaan masyarakat
            </p>

            <h2 class="text-xl font-semibold text-purple-600 mt-6 mb-2">Misi</h2>
            <ul class="list-disc pl-5 text-gray-700 leading-relaxed space-y-2">
                <li> Menyediakan akses informasi dan ilmu pengetahuan bagi masyarakat</li>
                <li> Meningkatkan minat baca dan literasi warga desa</li>
                <li> Mendukung pelaksanaan budaya lokal dan pendidikan non formal</li>
                <li> Memanfaatkan teknologi untuk memperluas jangkauan informasi</li>
            </ul>

            <div class="mt-8 text-right">
                <a href="index_user.php" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </main>

</body>
</html>
