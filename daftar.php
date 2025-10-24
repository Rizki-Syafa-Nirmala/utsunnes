<html>
<head>
    <title>::Data Registrasi::</title>
    <style type="text/css">
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            background-size: cover;
            background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
            font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            border: 2px solid #ccc;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
            max-width: 800px;
            width: 100%;
            backdrop-filter: blur(3px);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            color: #222;
            margin-bottom: 25px;
            font-size: 30px;
            letter-spacing: 1px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 25px;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 25px;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 15px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f1f7ff;
            transition: 0.2s;
        }

        td {
            color: #333;
        }

        .back-button {
            text-align: center;
            margin-top: 25px;
        }

        .back-button a {
            background-color: #007bff;
            color: white;
            padding: 12px 28px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.1s;
        }

        .back-button a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .message {
            text-align: center;
            color: #721c24;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Data Registrasi User</h1>

    <?php
    if (isset($_POST['submit'])) {

        $nama_depan   = $_POST['nama_depan'] ?? '';
        $nama_belakang = $_POST['nama_belakang'] ?? '';
        $umur         = isset($_POST['umur']) ? (int)$_POST['umur'] : 0;
        $asal_kota    = $_POST['asal_kota'] ?? '';

        if ($umur >= 10) {
            echo "<div class='success-message'>Registrasi Berhasil!</div>";

            echo "<table>";
            echo "<tr>
                    <th>No</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Umur</th>
                    <th>Asal Kota</th>
                  </tr>";

            $count = 0;
            for ($i = 1; $i <= $umur * 2; $i += 2) {
                if ($i == 7 || $i == 13) continue;
                if ($count >= $umur) break;

                echo "<tr>
                        <td>$i</td>
                        <td>$nama_depan</td>
                        <td>$nama_belakang</td>
                        <td>$umur</td>
                        <td>$asal_kota</td>
                      </tr>";
                $count++;
            }

            echo "</table>";

            echo "<div class='back-button'>
                    <a href='index.html'>Kembali ke Form Registrasi</a>
                  </div>";
        } else {
            echo "<div class='error-message'>Registrasi Gagal!</div>";
            echo "<div class='message'>Umur minimal adalah 10 tahun!</div>";
            echo "<div class='back-button'><a href='index.html'>Kembali</a></div>";
        }
    } else {
        echo "<div style='text-align:center; color:#dc3545; padding:20px;'>
                <h3>Error: Data tidak ditemukan</h3>
                <p>Silakan isi form registrasi terlebih dahulu.</p>
                <div class='back-button'>
                    <a href='index.html'>Kembali ke Form Registrasi</a>
                </div>
              </div>";
    }
    ?>
</div>
</body>
</html>
