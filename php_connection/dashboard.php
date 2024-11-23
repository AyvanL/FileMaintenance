<?php
include "connection.php";

// Fetch all records
$result = $conn->query("SELECT * FROM admindash");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
<h1>Admin Dashboard</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['ticket_id'] ?></td>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['queue_number'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <a href="editadmin.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
  </tbody>
</table>
</div>
</body>
</html>