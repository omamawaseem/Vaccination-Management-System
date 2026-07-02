<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional: Add custom styles here */
        body {
            padding: 20px;
        }
        body {
    background: url(../Imges/2.jpg)no-repeat;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-attachment: fixed;
    background-position: center;
    font-family: sans-serif;
    height: �100vh;
}
.glass {
            background-color: rgba(255, 255, 255, 0.6);
            color: black;
            border-radius: 15px;
            padding: 10px;
        }
        form {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
<?php include "nav.php";?>
<h2 class="mt-4 mb-4 text-center">Add location Record</h2>
<form action="" method="post" class="glass">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="form-group">
        <label for="contact_info">Contact Info:</label>
        <input type="text" class="form-control" id="contact_info" name="contact_info" required>
    </div>
    <button type="submit" name="btn" class="btn btn-primary" style="width:100%;">Add Patient</button>
</form>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS and jQuery (already included) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
<?php
// Check if form is submitted
if (isset($_POST["btn"])) {
    // Establish database connection
    include "connect.php";

    // Escape user inputs for security
    $name =  $_POST['name'];
    $address =  $_POST['address'];
    $contact_info =  $_POST['contact_info'];

    // SQL query to insert patient record
    $sql = "INSERT INTO location (name, address, contact_info) VALUES ('$name', '$address', '$contact_info')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Success message with SweetAlert
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "New record added successfully",
                }).then(function() {
                    window.location = "location_view.php"; // Redirect to patient.php
                });
              </script>';
    } else {
        // Error message with SweetAlert
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error: ' . mysqli_error($conn) . '",
                }).then(function() {
                    window.location = "location.php"; // Redirect to patient.php
                });
              </script>';
    }
    // Close the connection
    mysqli_close($conn);
}
?>
