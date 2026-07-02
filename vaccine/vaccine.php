<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccine</title>
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
        form {
            max-width: 600px;
            margin: auto;
        }
        .glass {
            background-color: rgba(255, 255, 255, 0.6);
            color: black;
            border-radius: 15px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    include "nav.php";
    ?>

<h2 class="mt-4 mb-4 text-center">Add Vaccine Record</h2>
<form action="" method="post" class="glass">
    <div class="form-group">
        <label for="name">Vaccine Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="manufacture_date">Manufacture Date:</label>
        <input type="date" class="form-control" id="manufacture_date" name="manufacture" required>
    </div>
    <div class="form-group">
        <label for="expiry_date">Expiry Date:</label>
        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <button type="submit" name="btn" class="btn btn-primary" style="width:100%;">Add Vaccine</button>
</form>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>

<!-- Bootstrap JS and jQuery (already included) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
<?php
if (isset($_POST["btn"])) {
    include "connect.php"; // Assuming your database connection file is named "connect.php"

    // Escape user inputs for security
    $name =  $_POST['name'];
    $manufacture_date =  $_POST['manufacture'];
    $expiry_date =  $_POST['expiry_date'];
    $quantity =  $_POST['quantity'];

    // SQL query to insert vaccine record
    $sql = "INSERT INTO vaccine (name, manufacture, expiry_date, quantity) 
            VALUES ('$name', '$manufacture_date', '$expiry_date', '$quantity')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "New vaccine record added successfully",
                }).then(function() {
                    window.location = "vaccine_view.php"; // Redirect to vaccine_view.php
                });
              </script>';
    } else {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error: ' . mysqli_error($conn) . '",
                }).then(function() {
                    window.location = "vaccine.php"; // Redirect back to add_vaccine.php
                });
              </script>';
    }
    mysqli_close($conn);
}
?>
