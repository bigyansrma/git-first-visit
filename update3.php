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
    $image_id = $_GET['id'];  // Get the image ID from the URL

    // Fetch the current details of the image
    $result = mysqli_query($conn, "SELECT * FROM portfolio3 WHERE id = '$image_id'");
    $image = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    // Check if an image is selected for upload
    if (!empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'portfolio3/' . $file_name;

        // Update the image in the database
        $query = "UPDATE portfolio3 SET file = '$file_name' WHERE id = '$image_id'";

        if (mysqli_query($conn, $query) && move_uploaded_file($tempname, $folder)) {
            echo "<h2>Image updated successfully</h2>";
            // Redirect to gallery page after update
            header("Location: portfolio3.php");
            exit();
        } else {
            echo "<h2>Image update failed</h2>";
        }
    } else {
        echo "<h2>Please select a new image to update</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Image</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        /* Form Styling */
        form {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form img {
            border-radius: 8px;
            object-fit: cover;
        }

        form input[type="file"] {
            width: 100%;
            padding: 12px;
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: #f9f9f9;
            font-size: 16px;
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #45a049;
        }

        /* Message Styles */
        h2 {
            font-size: 1.2em;
            color: #333;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            form {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Update Image</h1>
    </header>

    <form method="POST" enctype="multipart/form-data">
        <img src="portfolio3/<?php echo $image['file']; ?>" alt="Current Image" style="width: 200px; height: 200px; object-fit: cover;">
        <br><br>
        <label for="image">Select a new image:</label>
        <input type="file" name="image" id="image" required>
        <br><br>
        <button type="submit" name="submit">Update Image</button>
    </form>
</body>
</html>
