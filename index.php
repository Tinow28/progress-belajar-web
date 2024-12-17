<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Progres Belajar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Progres Belajar Anda</h1>
        <a href="tambah_progres.php" class="btn">+ Tambah Progres</a>
        <table>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Materi</th>
                <th>Keterangan</th>
                <th>Bahasa Pemrograman</th>
                <th>Aksi</th>
            </tr>
            <?php
            $sql = "SELECT * FROM progress ORDER BY tanggal DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['tanggal']}</td>
                            <td>{$row['materi']}</td>
                            <td>{$row['keterangan']}</td>
                            <td>{$row['bahasa_pemrograman']}</td>
                            <td>
                                <a href='edit_progres.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                                <a href='hapus_progres.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                          </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='6'>Belum ada progres belajar.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
