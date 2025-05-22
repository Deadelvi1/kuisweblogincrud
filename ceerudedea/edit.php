<?php
include "koneksi/db.php";
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $id"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Username</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-warning">Update</button>
        <a href="dasboard.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);

        $update = mysqli_query($conn, "UPDATE users SET nama='$nama' WHERE id=$id");
        if ($update) {
            echo "<div class='alert alert-success mt-3'>Username berhasil diperbarui.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal memperbarui: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</body>
</html>
