<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM admindash WHERE id=$id");
    $record = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $ticket_id = $_POST['ticket_id'];
    $user_id = $_POST['user_id'];
    $queue_number = $_POST['queue_number'];
    $status = $_POST['status'];

   
    $sql = "UPDATE admindash SET ticket_id='$ticket_id', user_id='$user_id', queue_number='$queue_number', status='$status',WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Record</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $record['id'] ?>">
            <div class="mb-3">
                <label>Ticket Id:</label>
                <input type="text" name="ticket_id" class="form-control" value="<?= $record['ticket_id'] ?>" required>
            </div>
            <div class="mb-3">
                <label>User Id:</label>
                <input type="text" name="user_id" class="form-control" value="<?= $record['user_id'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Queue Number:</label>
                <input type="text" name="queue_number" class="form-control" value="<?= $record['queue_number'] ?>" required>
            </div>
            <div class="mb-3">
            <label for="queue_number" class="form-label">Status</label>
            <select class="form-select" id="exampleSelect">
            <option value="1">pending</option>
            <option value="2">complete</option>
            
        </select>
            </div>
            
            <button type="submit" class="btn btn-success">Update Record</button>
        </form>
    </div>
</body>
</html>
