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
    <?php
    // Include database connection
    include "connect.php";

    // Initialize variables
    $id = $_GET['id'] ?? '';
    $name = $dob = $location_id = $healthcare_provider_id = $vaccine_id = $address = $contact_info = '';

    // Fetch existing data
    $query = "SELECT * FROM patient WHERE patient_id = '$id'";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($run);

    // Close the database connection for fetching initial data
    mysqli_close($conn);
    ?>
    <?php
include "nav.php"
?>
<br>
    <form action="" method="POST" class="glass">
        <h2 class="mt-4 mb-4 text-center">Patient Update</h2>
        <div class="form-group">
            <input type="hidden" class="form-control" required name="id" value="<?php echo $data["patient_id"]; ?>">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" required name="name" value="<?php echo $data['name']; ?>">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" required name="dob" value="<?php echo $data['dob']; ?>">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <select class="form-control" id="location" name="location_id" required>
                <!-- Populate options dynamically from database -->
                <?php
                include "connect.php";

                $sql = "SELECT location_id, name FROM location";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['location_id']."' ".($data['location_id'] == $row['location_id'] ? 'selected' : '').">".$row['name']."</option>";
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="healthcare_provider">Healthcare Provider</label>
            <select class="form-control" id="healthcare_provider" name="healthcare_provider_id" required>
                <!-- Populate options dynamically from database -->
                <?php
                include "connect.php";

                $sql = "SELECT healthcare_provider_id, name FROM healthcare_provider";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['healthcare_provider_id']."' ".($data['healthcare_provider_id'] == $row['healthcare_provider_id'] ? 'selected' : '').">".$row['name']."</option>";
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="vaccine">Vaccine</label>
            <select class="form-control" id="vaccine" name="vaccine_id" required>
                <!-- Populate options dynamically from database -->
                <?php
                include "connect.php";

                $sql = "SELECT vaccine_id, name FROM vaccine";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['vaccine_id']."' ".($data['vaccine_id'] == $row['vaccine_id'] ? 'selected' : '').">".$row['name']."</option>";
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address</label><br>
            <input type="text" class="form-control" required name="address" value="<?php echo $data['address']; ?>">
        </div>
        <div class="form-group">
            <label for="contact_info">Contact Info</label><br>
            <input type="text" class="form-control" required name="contact_info" value="<?php echo $data['contact_info']; ?>">
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
    if (isset($_POST['SubmitBtn'])) {
        // Reconnect to the database
        include "connect.php";

        // Retrieve form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $location_id = $_POST['location_id'];
        $healthcare_provider_id = $_POST['healthcare_provider_id'];
        $vaccine_id = $_POST['vaccine_id'];
        $address = $_POST['address'];
        $contact_info = $_POST['contact_info'];

        // Update query
        $query = "UPDATE patient SET name='$name', dob='$dob', location_id='$location_id', healthcare_provider_id='$healthcare_provider_id', vaccine_id='$vaccine_id', address='$address', contact_info='$contact_info' WHERE patient_id='$id'";
        $run = mysqli_query($conn, $query);

        // Check if update was successful
        if ($run) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Data updated Successfully'
                    }).then(function() {
                        window.location.href ='patient_view.php';
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

        // Close the database connection after update
        mysqli_close($conn);
    }
    ?>
</body>
</html>
