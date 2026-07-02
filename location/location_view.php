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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        /* th {
            background-color: #f2f2f2;
        } */
    </style>
</head>
<body>
<?php include "nav.php"; ?>
<h2 class="text-center mt-4 mb-4">Location Records</h2>
<div class="container glass">
    <a href="location.php" class="btn btn-primary">Add Location</a>
    <table class="table table-bordered table-hover">
        <thead class="bg-info">
            <tr >
                <th>ID</th>
                <th >Name</th>
                <th >Address</th>
                <th>Contact Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // MySQL database connection settings
            include "connect.php";
            // SQL query to select all records from the patient table
            $sql = "SELECT * FROM location";

            // Execute the query
            $result = $conn->query($sql);

            // Check if any records were returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["location_id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["contact_info"] . "</td>";
                    echo '<td>
                            <a href="#" class="btn btn-danger delete-btn" data-id="' . $row["location_id"] . '">Delete</a>
                            <a href="edit_location.php?id=' . $row["location_id"] . '" class="btn btn-primary">Edit</a>
                          </td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<!-- Bootstrap JS and jQuery (already included in some cases) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        // Handle click on delete button
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var patientId = $(this).data('id');
            
            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this location record!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed deletion, proceed with AJAX request
                    $.ajax({
                        url: 'delete_location.php?id=' + patientId,
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
