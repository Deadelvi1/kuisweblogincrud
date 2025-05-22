<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

include 'koneksi/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">User Management</a>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="alert alert-info rounded-4 shadow-sm" role="alert">
        <h4 class="alert-heading">Selamat Datang, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h4>
        <p>Ini adalah halaman dashboard untuk mengelola data user.</p>
    </div>

    <h2>Daftar Pengguna</h2>
    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah User</a>

    <table class="table table-hover table-bordered bg-white shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $result = mysqli_query($conn, "SELECT * FROM users");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus user ini?\")'>Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
