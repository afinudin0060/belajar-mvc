<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <!-- Link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">User Details</h1>

        <?php if ($user): ?>
            <div class="card">
                <div class="card-header">
                    User Information
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                </div>
            </div>

            <div class="mt-3">
                <!-- Tombol Detail menuju detailUser.php dengan ID pengguna -->
                <a href="views/detailUser.php?id=<?php echo $user['id']; ?>" class="btn btn-info">Detail</a>
                <!-- Link edit menuju editUser.php dengan ID pengguna -->
                <a href="views/editUser.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Edit</a>
                <!-- Link tambah menuju addUser.php tanpa parameter ID -->
                <a href="addUser.php" class="btn btn-success">Tambah</a>
                <!-- Link hapus menuju deleteUser.php dengan ID pengguna -->
                <a href="deleteUser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?');">Hapus</a>
            </div>

        <?php else: ?>
            <div class="alert alert-danger mt-3" role="alert">
                User not found.
            </div>
        <?php endif; ?>
    </div>

    <!-- Link ke Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
