<?php
// session_start();

// // Check if user is logged in and is a User
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'User') {
//     header('Location: login.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
        font-family: ' : Arial, sans-serif;';
        font-size: larger;
        font-weight: bold;
    }
    .glass {
            background-color: rgba(518, 223, 550, 0.6);
            color: black;
            border-radius: 15px;
            padding: 10px;
        }
        body {
            padding: 20px;
        }
        body {
    background: url(./Imges/2.jpg)no-repeat;
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
h1 ,p{
    color: white;
}
    </style>
</head>
<body>
    <!-- <div class="container">
        <h1>Welcome to the User Dashboard</h1>
        <p>Accessible by users with the user role.</p>
        
    </div> -->

<?php
include "user_nav.php" 
?>
 
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
