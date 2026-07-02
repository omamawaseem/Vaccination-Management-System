<!-- <?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} 
?>-->
<!--  -->
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
include "user_nav.php" 
?>
 
<h2 class="mt-4 mb-4 text-center">Add Patient Record</h2>
<form action="" method="post" class="glass">
    <div class="form-group ">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" class="form-control" id="dob" name="dob" required>
    </div>
    <div class="form-group">
                <label for="location_id">Location ID:</label>
                <select type="number" class="form-control" id="location_id" name="location_id" required >
                <?php
                            include("connect.php");
                            $sql = "Select * from location";
                            $res = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res)){
                       ?>
                   
                              <option value="<?php echo $row['location_id']?>"><?php echo $row['name']?></option>
                     <?php
                            }        
                        ?>
                </select> 
            </div>
            <div class="form-group">
                <label for="healthcare_provider_id">Healthcare Provider ID:</label>
                <select type="number" class="form-control" id="healthcare_provider_id" name="healthcare_provider_id" required>
                <?php
                            include("connect.php");
                            $sql = "Select * from healthcare_provider ";
                            $res = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res)){
                       ?>
                   
                              <option value="<?php echo $row['healthcare_provider_id']?>"><?php echo $row['name']?></option>
                     <?php
                            }        
                        ?>
                </select>
            </div>
    <div class="form-group">
                <label for="vaccine_id">Vaccine:</label>
                <select class="form-control" id="vaccine_id" name="vaccine_id" required>
                <?php
                            include("connect.php");
                            $sql = "Select * from vaccine";
                            $res = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res)){
                       ?>
                   
                              <option value="<?php echo $row['vaccine_id']?>"><?php echo $row['name']?></option>
                     <?php
                            }        
                        ?>
                </select>
            </div>
            
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="form-group">
        <label for="contact_info">Contact Info:</label>
        <input type="text" class="form-control" id="contact_info" name="contact_info" required>
    </div>
    <button type="submit" name="btn" class="btn btn-primary"style="width:100%;">Add Patient</button>
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
    $dob =  $_POST['dob'];
    $location_id = $_POST['location_id'];
    $healthcare_provider_id = $_POST['healthcare_provider_id'];
    $vaccine_id = $_POST['vaccine_id'];
    $address =  $_POST['address'];
    $contact_info =  $_POST['contact_info'];

    // SQL query to insert patient record
    $sql = "INSERT INTO patient (name, dob, location_id, healthcare_provider_id, vaccine_id, address, contact_info) VALUES ('$name', '$dob','$location_id','$healthcare_provider_id','$vaccine_id', '$address', '$contact_info')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Success message with SweetAlert
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "New record added successfully",
                }).then(function() {
                    window.location = "patient_view.php"; // Redirect to patient.php
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
                    window.location = "patient.php"; // Redirect to patient.php
                });
              </script>';
    }
    // Close the connection
    mysqli_close($conn);
}
?>

