<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'precious_memories';

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Collection</title>
    <link rel="stylesheet" href="styles.css">
    <style>
       /* General Body */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

/* Header Styling */
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

/* Image Gallery */
.image-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin: 40px 10%;
    animation: fadeInUp 1s ease-out; /* Animation for gallery fade-in */
}

.image-item {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Image Hover Effect */
.image-item:hover {
    transform: scale(1.05); /* Slight zoom effect */
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
}

/* Image Styling */
.image-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.3s ease-in-out; /* Smooth transition for zoom effect */
}

/* Image Hover Effect for Zoom */
.image-item:hover img {
    transform: scale(1.1); /* Slight zoom-in effect on the image */
}

/* Admin Button Styling */
.admin-btn-container {
    margin: 20px;
    text-align: center;
    animation: fadeIn 1s ease-out; /* Fade-in effect for the button */
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
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.admin-btn:hover {
    background-color: #0056b3;
    transform: translateY(-2px); /* Hover effect to lift the button */
}

/* Fade-in effect for gallery items */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Fade-in effect for button */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


    </style>
</head>
<body>
    <header>
        <h1>Wildlife - Image Collection</h1>
    </header>

    <!-- Admin Button -->
    <div class="admin-btn-container">
        <a href="portfolio.php" class="admin-btn">Go to Portfolio</a>
    </div>

    <div class="image-gallery">
        <?php
        // Fetch images from the database
        $res = mysqli_query($conn, "SELECT * FROM portfolio2");
        while ($row = mysqli_fetch_assoc($res)) {
            // Adjust image path to be relative from the document root
            $imagePath = "portfolio2/" . $row['file']; // Corrected path to 'images' directory
            if (file_exists($imagePath)) {
        ?>
            <div class="image-item">
                <img src="<?php echo $imagePath; ?>" alt="Gallery Image">
            </div>
        <?php
            } else {
                echo "<p>Image not found</p>";
            }
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
