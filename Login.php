<?php
session_start();
require 'connect.php';  // Include database configuration

// Function to check user credentials and set session
function authenticate($email, $password) {
    global $conn;

    // Prepare SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password); // Use a stronger hash function in production
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $user['role'];
        return true;
    } else {
        return false;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (authenticate($email, $password)) {
        if ($_SESSION['role'] === 'Admin') {
            header('Location: admin_dashboard.php');
        } else if ($_SESSION['role'] === 'User') {
            header('Location: user_dashboard.php');
        }
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/CustomStyleSheet.css"/>
    <link rel="stylesheet" href="./css/style.css"/>
</head>

<body>
    <div class="my_bg">
        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-0">
            &nbsp;
        </div>
        <section class="container">
            <div class="row justify-content-center ltr">
                <div class="col-12 col-md-6 col-lg-4">
                    <form method="post" action="login.php">
                        <div class="form-container">
                            <?php if (isset($error)): ?>
                                <div class="text-danger"><?= $error ?></div>
                            <?php endif; ?>
                            <p class="text-black text-center">Please fill in your credentials wisely</p>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="email" name="email" class="form-control boxShadow" required />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <input type="text" name="password" class="form-control boxShadow" required />
                            </div>

                            <div class="form-group">
                                <label class="form-check-label">
                                    <input type="checkbox" name="rememberMe" class="form-check-input boxShadow" />
                                    <span style="font-size:14px;font-weight:300">Remember me</span>
                                </label>
                                <br />
                                <input type="submit" value="Login" class="btn btn-danger btn-sm float-lg-end mt-1" style="border-radius:10px; font-weight:700 ;" />
                                <br /><br />
                                <a class="text-primary" href="#">Register</a>
                            </div>

                            <div class="form-group text-center">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
