<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'precious_memories';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, get the image filename from the database
    $result = mysqli_query($conn, "SELECT file FROM portfolio2 WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // Check if the file exists in the folder and delete it
    $file_path = 'portfolio2/' . $row['file'];
    if (file_exists($file_path)) {
        unlink($file_path); // Delete the image from the server
    }

    // Delete the image record from the database
    $query = "DELETE FROM portfolio2 WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        echo "<h2>Image deleted successfully</h2>";
    } else {
        echo "<h2>Failed to delete image</h2>";
    }
}

header("Location: portfolio2.php");
exit();
?>
<?php 
include('footer.php');
?>
