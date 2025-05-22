<?php include "koneksi/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah User</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="dasboard.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO users (nama, password) VALUES ('$nama', '$password')";
        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success mt-3'>User berhasil ditambahkan.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menambahkan user: " . mysqli_error($conn) . "</div>";
        }
    }
    ?>
</body>
</html>
