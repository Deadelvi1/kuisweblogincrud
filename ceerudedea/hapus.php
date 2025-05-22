<?php
include "koneksi/db.php";

$id = $_GET['id'];
if (isset($id)) {
    $delete = mysqli_query($conn, "DELETE FROM users WHERE id=$id");

    if ($delete) {
        header("Location: dasboard.php");
        exit;
    } else {
        echo "Gagal menghapus user: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid.";
}
?>
