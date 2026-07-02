<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Form</title>
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
 
        form {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <?php
    include "connect.php";

    // Check if ID parameter is provided in the URL
    $id = $_GET['id'] ?? '';

    // Fetch patient data from database
    $query = "SELECT * FROM location WHERE location_id = '$id'";
    $result = mysqli_query($conn, $query);

    // Check if patient record exists
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $address = $data['address'];
        $contact_info = $data['contact_info'];
    } else {
        echo '<div class="alert alert-danger" role="alert">Patient not found.</div>';
        exit; // Exit if patient not found
    }
    ?>
    
<?php include "nav.php"; ?>
<br>
    <form action="" method="POST" class="glass">
        <h2 class="mt-4 mb-4 text-center">location Update</h2>
        <div class="form-group">
            <input type="hidden" class="form-control" required name="id" value="<?php echo $id; ?>">
        </div>
        <div class="form-group">
            <label for="name">Name</label><br>
            <input type="text" class="form-control" required name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="address">Address</label><br>
            <input type="text" class="form-control" required name="address" value="<?php echo $address; ?>">
        </div>
        <div class="form-group">
            <label for="contact_info">Contact Info</label><br>
            <input type="text" class="form-control" required name="contact_info" value="<?php echo $contact_info; ?>">
        </div>
        <br>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="SubmitBtn" style="width:100%;" value="Submit">
        </div>
    </form>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <?php
    // Process form submission
    if (isset($_POST['SubmitBtn'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact_info = $_POST['contact_info'];

        // Update query
        $query = "UPDATE location SET name='$name', address='$address', contact_info='$contact_info' WHERE location_id='$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data updated Successfully'
                    }).then(function() {
                        window.location.href ='location_view.php';
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

    // Close database connection
    mysqli_close($conn);
    ?>
</body>
</html>
