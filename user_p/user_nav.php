<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body{
        font-family: ' : Arial, sans-serif;';
        font-size: larger;
        font-weight: bold;
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
<nav class="navbar navbar-expand-lg navbar-light glass" >
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="../user_d/index1.php">Vaccinations</a>
      <ul class="navbar-nav me-auto mb-2 p-2 m-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="patient_view.php">Patient list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../about_contact/index.php">About US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../about_contact/ContactUs.php">Contact US</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link active" href="#">Healthcare</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Appioment</a>
        </li> -->
      </ul>
      <form class="d-flex">
      <a href="../Login.php" class="btn btn-danger">Login</a>
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
</body>