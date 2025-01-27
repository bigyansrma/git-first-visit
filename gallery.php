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

if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'Images/' . $file_name;

        $query = mysqli_query($conn, "INSERT INTO sort (file, category, description) VALUES ('$file_name', '$category', '$description')");

        if (move_uploaded_file($tempname, $folder)) {
            echo "<h2>File uploaded successfully</h2>";
        } else {
            echo "<h2>File not uploaded</h2>";
        }

        // Redirect to prevent re-upload on page reload
        header("Location: gallery.php");
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
       /* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
}

/* Header Styles */
header {
    background: linear-gradient(45deg, #87CEEB, #FFEB3B); /* Sky blue and yellow gradient */
    color: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: backgroundAnimation 3s ease-in-out infinite; /* Background animation */
}

header h1 {
    margin: 0;
    font-size: 2.5em;
    animation: textAnimation 3s ease-in-out infinite; /* Text animation */
}

/* Background Color Animation */
@keyframes backgroundAnimation {
    0% {
        background: linear-gradient(45deg, #87CEEB, #FFEB3B);
    }
    50% {
        background: linear-gradient(45deg, #FFEB3B, #87CEEB);
    }
    100% {
        background: linear-gradient(45deg, #87CEEB, #FFEB3B);
    }
}

/* Text Animation */
@keyframes textAnimation {
    0% {
        color: #fff;
        transform: translateY(-10px);
    }
    50% {
        color: #FFEB3B;
        transform: translateY(0);
    }
    100% {
        color: #fff;
        transform: translateY(-10px);
    }
}


.go-to-admin {
    display: inline-block;
    margin-top: 10px;
    padding: 12px 20px;
    background-color: #FF4081;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    transition: background-color 0.3s;
}

.go-to-admin:hover {
    background-color: #F50057;
}

/* Form Styles */
form {
    margin: 20px auto;
    width: 80%;
    max-width: 550px;
    background-color: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: grid;
    gap: 15px;
}

form input,
form textarea,
form select,
form button {
    width: 100%;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    background-color: #fafafa;
}

form input[type="file"] {
    padding: 5px;
}

form button {
    background-color: #5C6BC0;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #3949AB;
}

/* Image Gallery */
/* Image Gallery */
.image-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin: 30px auto;
    width: 80%;
}

.image-item {
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    position: relative; /* To position the buttons inside the image container */
}

.image-item:hover {
    transform: scale(1.05);
}

.image-item img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

/* Hide buttons by default */
.image-item .actions {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.image-item:hover .actions {
    opacity: 1;
    visibility: visible;
}

.image-item p {
    margin: 15px;
    font-size: 16px;
    color: #555;
}

.actions a button {
    padding: 12px 20px;
    margin: 5px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.actions a button:hover {
    opacity: 0.8;
}

.delete-btn {
    background-color: #FF4081;
    color: white;
}

.delete-btn:hover {
    background-color: #F50057;
}

.update-btn {
    background-color: #4CAF50;
    color: white;
}

.update-btn:hover {
    background-color: #388E3C;
}


/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    header h1 {
        font-size: 2em;
    }

    .image-gallery {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    .image-item p {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <header>
        <h1>Image Gallery</h1>
        <a href="admin.php" class="go-to-admin">Go to Admin</a>
    </header>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required />
        <select name="category" required>
        <option value="" disabled selected>Select category</option>
        <option value="Nature">Nature</option>
        <option value="Wildlife">Wildlife</option>
        <option value="Precious_Memories">Precious_memories</option>
        <!-- Add more options as needed -->
    </select>
        <!-- <input type="text" name="category" placeholder="Enter category" required /> -->
        <textarea name="description" placeholder="Enter description" required></textarea>
        <button type="submit" name="submit">Upload Image</button>
    </form>

    <div class="image-gallery">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM sort");
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <div class="image-item">
                <img src="Images/<?php echo $row['file']; ?>" alt="Gallery Image">
                <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                <div class="actions">
                    <a href="update.php?id=<?php echo $row['id']; ?>"><button class="update-btn">Update</button></a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this image?');"><button class="delete-btn">Delete</button></a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
