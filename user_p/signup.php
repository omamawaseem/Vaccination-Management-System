<?php
session_start();
require 'connect.php';  // Include database configuration

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize variables for form input and errors
$fullName = $email = $password = $confirmPassword = "";
$fullNameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $fullName = sanitizeInput($_POST['fullName']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $confirmPassword = sanitizeInput($_POST['confirmPassword']);

    // Basic validation
    if (empty($fullName)) {
        $fullNameErr = "Full Name is required";
        $errors[] = $fullNameErr;
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Valid Email is required";
        $errors[] = $emailErr;
    }
    if (empty($password)) {
        $passwordErr = "Password is required";
        $errors[] = $passwordErr;
    }
    if ($password !== $confirmPassword) {
        $confirmPasswordErr = "Passwords do not match";
        $errors[] = $confirmPasswordErr;
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password before storing (use PHP's password_hash function)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO users (fullName, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullName, $email, $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            // Registration successful
            $_SESSION['registrationSuccess'] = true;
            header('Location: login.php'); // Redirect to login page after successful registration
            exit;
        } else {
            // Registration failed
            $error = 'Error: ' . $conn->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
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
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="form-container">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" name="fullName" class="form-control" value="<?= $fullName ?>" required>
                            <span class="error-message"><?= $fullNameErr ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $email ?>" required>
                            <span class="error-message"><?= $emailErr ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <span class="error-message"><?= $passwordErr ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" class="form-control" required>
                            <span class="error-message"><?= $confirmPasswordErr ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </form>
                    <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
