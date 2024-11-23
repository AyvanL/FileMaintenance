<?php
include "connection.php";

// Fetch all records
$result = $conn->query("SELECT * FROM table1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Connection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">PHP MySQL Connection Example</h1>
        <a href="add.php" class="btn btn-primary mb-3">Add New Record</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['firstname'] ?></td>
                    <td><?= $row['lastname'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['contact'] ?></td>
                    <td>
                        <?php if ($row['image']): ?>
                            <img src="uploads/<?= $row['image'] ?>" alt="Image" width="50">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
