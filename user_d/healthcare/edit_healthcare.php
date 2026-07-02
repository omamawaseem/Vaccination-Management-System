<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Healthcare Provider</title>
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <style>
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
        body {
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <?php
     include "nav.php";
    include "connect.php";

    $id = $_GET['id'] ?? '';

    $query = "SELECT * FROM healthcare_provider WHERE healthcare_provider_id = '$id'";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($run);
    ?>
    <br>
    <form action="" method="POST" class="glass">
    <h2 class="mt-4 mb-4 text-center">Healthcare Provider Update</h2>
    <div class="form-group">
        <input type="hidden" class="form-control" required name="id" value="<?php echo $data['healthcare_provider_id']; ?>">
    </div>
    <div class="form-group">
        <label for="name">Name</label><br>
        <input type="text" class="form-control" required name="name" value="<?php echo $data['name']; ?>">
    </div>
    <div class="form-group">
        <label for="specialization">Specialization</label><br>
        <input type="text" class="form-control" required name="specialization" value="<?php echo $data['specialization']; ?>">
    </div>
    <div class="form-group">
        <label for="contact_info">Contact Info</label><br>
        <input type="text" class="form-control" required name="contact_info" value="<?php echo $data['contact_info']; ?>">
    </div>
    <br>
    <div class="mb-3">
        <input type="submit" class="btn btn-outline-info" name="SubmitBtn" style="width:100%;" value="Submit">
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php

    if (isset($_POST['SubmitBtn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $specialization = $_POST['specialization'];

    $query = "UPDATE healthcare_provider SET name ='$name', contact_info='$contact_info', specialization='$specialization' WHERE healthcare_provider_id ='$id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data updated Successfully'
                }).then(function() {
                    window.location.href ='healthcare_view.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Data Update Failed'
                });
              </script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
