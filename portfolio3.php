<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'precious_memories'; // Corrected database name

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) { // Corrected the connection check method
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    if (!empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'portfolio3/' . $file_name;

        // Insert the image details into the database
        $query = "INSERT INTO portfolio3 (file) VALUES ('$file_name')";
        if (mysqli_query($conn, $query)) {
            if (move_uploaded_file($tempname, $folder)) {
                echo "<h2>File uploaded successfully</h2>";
            } else {
                echo "<h2>File not uploaded to directory</h2>";
            }
        } else {
            echo "<h2>Error inserting file into database: " . mysqli_error($conn) . "</h2>";
        }

        // Redirect to prevent re-upload on page reload
        header("Location: portfolio3.php");
        exit();
    } else {
        echo "<h2>Please select an image to upload</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
       /* Base Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #a2c2e2, #ffe4b5); /* Soft gradient from light blue to warm yellow */
    background-size: cover;
    background-attachment: fixed; /* Makes the background scroll with the page */
    margin: 0;
    padding: 0;
}

/* Header Styles */
header {
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background for contrast */
    color: white;
    text-align: center;
    padding: 20px 0;
}

header h1 {
    margin: 0;
    font-size: 2.5em;
    font-family: 'Arial', sans-serif;
}

/* Form Styling */
form {
    width: 80%;
    max-width: 500px;
    margin: 30px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Input and Button Styles */
form input[type="file"],
form button {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    background-color: #fff;
}

/* Button hover effect */
form button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #45a049;
}

/* Image Gallery */
.image-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin: 40px 10%;
}

.image-item {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.image-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
    border-radius: 8px;
}

.image-item:hover img {
    transform: scale(1.05);
}

/* Action Buttons on Hover */
.image-item .actions {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: none;
    gap: 10px;
}

.image-item:hover .actions {
    display: flex;
}

.image-item .actions button {
    padding: 8px 12px;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.image-item .actions button:hover {
    background-color: rgba(0, 0, 0, 0.9);
}

.delete-btn {
    background-color: #f44336;
}

.delete-btn:hover {
    background-color: #d32f2f;
}

/* Admin Button */
.admin-btn-container {
    margin: 20px;
    text-align: center;
}

.admin-btn {
    padding: 12px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.admin-btn:hover {
    background-color: #0056b3;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .image-gallery {
        margin: 40px 5%;
    }
}
</style>
    
</head>
<body>
    <header>
        <h1>Nature- Portfolio3 Gallery</h1>
    </header>

    <!-- Admin Button -->
    <div class="admin-btn-container">
        <a href="admin.php" class="admin-btn">Go to Admin Panel</a>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <button type="submit" name="submit">Upload Image</button>
    </form>

    <div class="image-gallery">
        <?php
        // Fetch images from the database
        $res = mysqli_query($conn, "SELECT * FROM portfolio3");
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
                <div class="image-item">
                    <img src="portfolio3/<?php echo $row['file']; ?>" alt="portfolio3 Image">
                    <div class="actions">
                        <a href="update3.php?id=<?php echo $row['id']; ?>">
                            <button>Update</button>
                        </a>
                        <a href="delete3.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this image?');">
                            <button class="delete-btn">Delete</button>
                        </a>
                    </div>
                </div>
        <?php 
            }
        } else {
            echo "<h2>No images found</h2>";
        }
        ?>
    </div>

</body>
<?php 
include('footer.php');
?>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>
