<?php
// Database connection (adjust credentials as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vaccinationss";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Appointment</title>
    <!-- Bootstrap CSS CDN link (adjust as necessary) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
 
    </style>
</head>
<body>
<?php include "nav.php"; ?>
<br>
<h2 class="mt-4 mb-4 text-center">Add Appointment</h2>
    <div class="container glass">
        
        <form action="" method="POST">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="patient_id">Patient:</label>
                <select class="form-control" id="patient_id" name="patient_id" required>
                <?php
                            include("connect.php");
                            $sql = "Select * from patient";
                            $res = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res)){
                       ?>
                   
                              <option value="<?php echo $row['patient_id']?>"><?php echo $row['name']?></option>
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
            <button type="submit" name="btn" class="btn btn-primary"style="width:100%;">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery CDN links (optional if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>

<?php
include("connect.php");
// PHP code for handling form submission and database insertion comes here...
if (isset($_POST["btn"])) {
    $date = $_POST['date'];
    $patient_id = $_POST['patient_id'];
    $vaccine_id = $_POST['vaccine_id'];
    $location_id = $_POST['location_id'];
    $healthcare_provider_id = $_POST['healthcare_provider_id'];

    // Prepare SQL statement
    $sql = "INSERT INTO appointment (date, patient_id, vaccine_id, location_id, healthcare_provider_id) 
            VALUES ('$date', '$patient_id', '$vaccine_id', '$location_id', '$healthcare_provider_id')";

    if ($conn->query($sql) === TRUE) {
        // Success message with SweetAlert
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Appointment Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = 'index.php';
                });
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
