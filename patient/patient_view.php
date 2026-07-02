<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.min.css">
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
        
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
include "nav.php"
?>
<h2 class="mt-4 mb-4 text-center">Patient Records</h2>

<div class="container glass">
<a href="patient.php" class="btn btn-primary">Add Patient</a>
    <table class="table table-hover">
        <thead class="bg-info">
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Location</th>
                <th>Healthcare Provider</th>
                <th>Vaccine</th>
                <th>Address</th>
                <th>Contact Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Establish database connection
            include "connect.php";

            // SQL query to fetch patient records with joins
            $sql = "SELECT p.patient_id, p.name AS patient_name, p.dob, l.name AS location_name, hp.name AS healthcare_provider_name, v.name AS vaccine_name, p.address, p.contact_info
                    FROM patient p
                    INNER JOIN location l ON p.location_id = l.location_id
                    INNER JOIN healthcare_provider hp ON p.healthcare_provider_id = hp.healthcare_provider_id
                    INNER JOIN vaccine v ON p.vaccine_id = v.vaccine_id";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['patient_name']."</td>";
                    echo "<td>".$row['dob']."</td>";
                    echo "<td>".$row['location_name']."</td>";
                    echo "<td>".$row['healthcare_provider_name']."</td>";
                    echo "<td>".$row['vaccine_name']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['contact_info']."</td>";
                    echo '<td>
                    <a href="#" class="btn btn-danger delete-btn" data-id="' . $row["patient_id"] . '">Delete</a>
                    <a href="edit_patient.php?id=' . $row["patient_id"] . '" class="btn btn-primary">Edit</a>
                  </td>'; 
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No patients found</td></tr>";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and jQuery (already included) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>

<script>
$(document).ready(function() {
    // Handle click on delete button
    $('.delete-btn').click(function() {
        var patientId = $(this).data('id');

        // Confirm delete with SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Ajax request to delete patient
                $.ajax({
                        url: 'delete_patient.php?id=' + patientId,
                        type: 'get',
                        success: function(response) {
                            // Display success message
                            Swal.fire(
                                'Deleted!',
                                'Patient record has been deleted.',
                                'success'
                            ).then(function() {
                                // Reload page after deletion
                                window.location.reload();
                            });
                        },
                        error: function(err) {
                            // Display error message
                            Swal.fire(
                                'Error!',
                                'Failed to delete location record.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>


</body>
</html>
