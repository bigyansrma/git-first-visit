<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'precious_memories';
$conn = new mysqli($host, $user, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, get the image filename from the database (table name is 'sort')
    $result = mysqli_query($conn, "SELECT file FROM sort WHERE id = $id");

    // Check if the image record exists
    if ($row = mysqli_fetch_assoc($result)) {
        $file_name = $row['file'];
        $file_path = 'Images/' . $file_name;

        // Check if the file exists and delete it
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                echo "<h2>Image deleted successfully from the server.</h2>";
            } else {
                echo "<h2>Failed to delete the image from the server.</h2>";
            }
        } else {
            echo "<h2>Image file does not exist on the server.</h2>";
        }

        // Now delete the image record from the database
        $deleteQuery = "DELETE FROM sort WHERE id = $id";

        if (mysqli_query($conn, $deleteQuery)) {
            echo "<h2>Image record deleted successfully from the database.</h2>";
        } else {
            echo "<h2>Failed to delete image record from the database.</h2>";
        }
    } else {
        echo "<h2>No image found with the given ID.</h2>";
    }
} else {
    echo "<h2>No ID specified for deletion.</h2>";
}

header("Location: gallery.php");
exit();
?>

<?php 
include('footer.php');
?>
