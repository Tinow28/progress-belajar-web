<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Progres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Progres Belajar</h1>
        <form action="" method="POST" class="form-container">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" required>

            <label for="materi">Materi:</label>
            <input type="text" name="materi" required>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" rows="4"></textarea>

            <label for="bahasa_pemrograman">Bahasa Pemrograman:</label>
            <select name="bahasa_pemrograman" required>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
            </select>

            <button type="submit" name="submit" class="btn">Simpan</button>
        </form>
        <a href="index.php" class="btn-back">Kembali ke Dasbor</a>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $tanggal = $_POST['tanggal'];
        $materi = $_POST['materi'];
        $keterangan = $_POST['keterangan'];
        $bahasa = $_POST['bahasa_pemrograman'];

        $sql = "INSERT INTO progress (tanggal, materi, keterangan, bahasa_pemrograman)
                VALUES ('$tanggal', '$materi', '$keterangan', '$bahasa')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Progres berhasil disimpan! <a href='index.php'>Lihat Progres</a></p>";
        } else {
            echo "<p class='error'>Error: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>
