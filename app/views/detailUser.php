<?php
include '../database.php';

// Pastikan ada ID yang dikirim
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data pengguna berdasarkan ID
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ID pengguna tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Detail Pengguna</h1>

    <?php if ($user): ?>
        <div class="card">
            <div class="card-header">
                Informasi Pengguna
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            </div>
        </div>
        <a href="../index.php" class="btn btn-primary mt-3">Kembali</a>
    <?php else: ?>
        <div class="alert alert-danger mt-3" role="alert">
            Data pengguna tidak ditemukan.
        </div>
    <?php endif; ?>
</div>
</body>
</html>
