<?php include 'database.php'; ?>

<?php
// Ambil ID dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM progress WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

// Simpan perubahan jika form disubmit
if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $materi = $_POST['materi'];
    $keterangan = $_POST['keterangan'];
    $bahasa = $_POST['bahasa_pemrograman'];

    $sql = "UPDATE progress SET 
            tanggal = '$tanggal', 
            materi = '$materi', 
            keterangan = '$keterangan', 
            bahasa_pemrograman = '$bahasa' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Progres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Progres Belajar</h1>
        <form action="" method="POST" class="form-container">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required>

            <label for="materi">Materi:</label>
            <input type="text" name="materi" value="<?= $data['materi']; ?>" required>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" rows="4"><?= $data['keterangan']; ?></textarea>

            <label for="bahasa_pemrograman">Bahasa Pemrograman:</label>
            <select name="bahasa_pemrograman" required>
                <option value="HTML" <?= $data['bahasa_pemrograman'] == 'HTML' ? 'selected' : ''; ?>>HTML</option>
                <option value="CSS" <?= $data['bahasa_pemrograman'] == 'CSS' ? 'selected' : ''; ?>>CSS</option>
                <option value="JavaScript" <?= $data['bahasa_pemrograman'] == 'JavaScript' ? 'selected' : ''; ?>>JavaScript</option>
                <option value="PHP" <?= $data['bahasa_pemrograman'] == 'PHP' ? 'selected' : ''; ?>>PHP</option>
            </select>

            <button type="submit" name="submit" class="btn">Simpan Perubahan</button>
        </form>
        <a href="index.php" class="btn-back">Kembali ke Dasbor</a>
    </div>
</body>
</html>
