
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center"> Biodata Diri </h1>
    <hr width="600px">
    <table align="center" cellpadding="10px" width="600px"> 
    <style>
        /* CSS untuk tata letak dan tombol kembali */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h1 {
            color: #007bff;
            text-align: center;
            margin-top: 20px;
        }

        table {
            border: 1px solid #ddd;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #ffffff;
        }

        table td {
            padding: 10px;
        }

        hr {
            border: 1px solid #007bff;
            width: 600px;
            margin: auto;
        }

        /* Tombol kembali */
        .btn-back {
            display: block; /* Mengatur tombol sebagai blok */
            width: 120px; /* Lebar tombol */
            margin: 20px auto; /* Tombol berada di tengah secara horizontal */
            padding: 10px 0; /* Padding di dalam tombol */
            background-color: #007bff; /* Warna latar tombol */
            color: white; /* Warna teks */
            text-decoration: none; /* Menghapus garis bawah */
            text-align: center; /* Teks di tengah tombol */
            border-radius: 5px; /* Membuat sudut tombol melengkung */
            font-size: 16px; /* Ukuran font */
            font-weight: bold; /* Teks tebal */
            transition: background-color 0.3s ease; /* Efek transisi hover */
        }

        .btn-back:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat hover */
            cursor: pointer; /* Mengubah kursor saat hover */
        }

        /* Responsif */
        @media (max-width: 600px) {
            .btn-back {
                width: 100%; /* Tombol akan melebar penuh pada layar kecil */
                font-size: 14px; /* Ukuran font lebih kecil */
            }
        }
    </style>
</head>
<body>
        <tr>
            <td>Nim</td>
            <td>: 02204033</td>
            <td rowspan="8"><img src="assets/dist/img/myfoto.jpg" height="300px" width="230px"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: Anna Novita</td>
        </tr><tr>
            <td>Kelas</td>
            <td>: TI.5A</td>
        </tr><tr>
            <td>Prodi</td>
            <td>: Teknik Informatika</td>
        </tr><tr>
            <td>Tempat/Tgl Lahir</td>
            <td>: Akkampeng, 20 Maret  2004</td>
        </tr><tr>
            <td>Agama</td>
            <td>: Islam</td>
        </tr><tr>
            <td>Alamat</td>
            <td>: Akkampeng</td>
        </tr><tr>
            <td>Telepon</td>
            <td>: 088242652608</td>
        </tr>
    </table>
    <a href="index.php" class="btn-back">Kembali</a>
</body>
</html>