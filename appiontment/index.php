<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- jQuery (necessary for SweetAlert) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<h2 class="mb-4 text-center">Appointments List</h2>
    <div class="container mt-4 glass">
        <a href="Appiontment.php" class="btn btn-primary">Add Location</a>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="bg-info">
                    <tr>
                        <th>Appointment ID</th>
                        <th>Date</th>
                        <th>Patient</th>
                        <th>Vaccine</th>
                        <th>Location</th>
                        <th>Healthcare Provider</th>
                        <th>Action</th> <!-- New column for delete button -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connect.php";
                    // SQL query to fetch appointments with related patient, vaccine, location, and healthcare provider details
                    $sql = "SELECT appointment.*, patient.name AS patient_name, vaccine.name AS vaccine_name, location.name AS location_name, healthcare_provider.name AS provider_name
                            FROM appointment
                            INNER JOIN patient ON appointment.patient_id = patient.patient_id
                            INNER JOIN vaccine ON appointment.vaccine_id = vaccine.vaccine_id
                            INNER JOIN location ON appointment.location_id = location.location_id
                            INNER JOIN healthcare_provider ON appointment.healthcare_provider_id = healthcare_provider.healthcare_provider_id";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["appointment_id"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["patient_name"] . "</td>";
                            echo "<td>" . $row["vaccine_name"] . "</td>";
                            echo "<td>" . $row["location_name"] . "</td>";
                            echo "<td>" . $row["provider_name"] . "</td>";
                            echo "<td><button class='btn btn-danger btn-sm delete-btn' data-id='" . $row["appointment_id"] . "'>Delete</button></td>"; // Delete button
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No appointments found</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SweetAlert delete confirmation script -->
    <script>
        $(document).ready(function() {
            // Handle delete button click
            $('.delete-btn').click(function() {
                var appointmentId = $(this).data('id');

                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to delete.php with appointment_id parameter
                        window.location.href = 'delete.php?id=' + appointmentId;
                    }
                });
            });
        });
    </script>
</body>
</html>
