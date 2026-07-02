<?php

include "connect.php";
$id = $_GET['id']??"";
$query = "DELETE FROM `appointment` WHERE   appointment_id = '$id'";
$row = mysqli_query($conn , $query);
if ($row) {
  echo "<script>
          alert('Appointment record deleted successfully');
          window.location.href = 'index.php'; // Redirect to index.php after deletion
        </script>";
} else {
  echo "appointment record not deleted";
}
  
?>