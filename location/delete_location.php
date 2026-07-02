<?php
 include "connect.php"; // Assuming connect.php contains your database connection logic

  $id = $_GET['id'] ??"";
  $query = "DELETE FROM location WHERE location_id = '$id'";
  $row = mysqli_query($conn, $query);
  
  if ($row) {
      echo "<script>
              alert('Patient record deleted successfully');
              window.location.href = 'patient_view.php'; // Redirect to index.php after deletion
            </script>";
  } else {
      echo "Patient record not deleted";
  }
  ?>
  