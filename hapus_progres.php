<?php
include 'database.php';

// Ambil ID dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM progress WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
