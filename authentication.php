<?php
include('db.php'); // Ensure database connection

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize user inputs
    $user = stripslashes($user);
    $password = stripslashes($password);
    $user = mysqli_real_escape_string($con, $user);
    $password = mysqli_real_escape_string($con, $password);

    // Query to check user credentials
    $query = mysqli_query($con, "SELECT * FROM login WHERE username='$user' AND password='$password'");

    // Check query result
    if (!$query) {
        die("Query failed: " . mysqli_error($con));
    }

    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
        // Start a session
        session_start();
        $_SESSION['username'] = $user; // Store username in session

        // Redirect to portfolio.php after successful login
        header("Location: portfolio.php");
        exit(); // Stop further code execution
    } else {
        echo "<h2 style='color: red; text-align: center;'>Login failed. Invalid username or password.</h2>";
    }
}
?>

