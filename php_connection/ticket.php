<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $image = $_FILES['image']['name'];
    
    // Upload image
    if ($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }

    // Insert data into the database
    $sql = "INSERT INTO table1 (firstname, lastname, email, contact, image) VALUES ('$firstname', '$lastname', '$email', '$contact', '$image')";

    if ($conn->query($sql)) {
        header("Location: index.php");
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
    <title>Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">TICKETS</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="ticket_type">Ticket Types:</label>
                <select class="form-select" aria-label="Default select example" name="ticket_type">
                    <option selected></option>
                    <option value="De Luxe Park Pass $10">De Luxe Park Pass $10</option>
                    <option value="Premium Pass $20">Premium Pass $20</option>
                    <option value="Family Pass $50">Family Pass $50</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity">Ticket Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="100" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>
    </div>
</body>
</html>
