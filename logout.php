<?php
// Start the session
session_start();

// Destroy the session (logout the user)
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Redirect to portfolio.php after logout
header("Location:  http://localhost/1demo/");
exit();
?>
