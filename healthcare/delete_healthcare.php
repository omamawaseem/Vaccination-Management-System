<?php

include "connect.php";
$id = $_GET['id']??"";
$query = "DELETE FROM `healthcare_provider` WHERE   healthcare_provider_id = '$id'";
$row = mysqli_query($conn , $query);
if($row){
    echo "<script>
    alert ('row delete');
    window.location.href = 'healthcare_view.php';
    
    </script>";


  }else{
    echo " row not deleted";
  }
  
?>