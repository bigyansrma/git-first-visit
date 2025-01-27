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

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM sort WHERE id='$id'");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Check if a new image has been uploaded
    if (!empty($_FILES['image']['name'])) {
        $oldImage = 'Images/' . $row['file'];

        // Delete the old image file
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        // Upload new image
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'Images/' . $file_name;

        if (move_uploaded_file($tempname, $folder)) {
            // Update the database with new image, category, and description
            $updateQuery = mysqli_query($conn, "UPDATE sort SET file='$file_name', category='$category', description='$description' WHERE id='$id'");
            if ($updateQuery) {
                echo "<h2>Details updated successfully with a new image!</h2>";
            } else {
                echo "<h2>Database update failed!</h2>";
            }
        } else {
            echo "<h2>Failed to upload the new image!</h2>";
        }
    } else {
        // If no new image is uploaded, update only category and description
        $updateQuery = mysqli_query($conn, "UPDATE sort SET category='$category', description='$description' WHERE id='$id'");
        if ($updateQuery) {
            echo "<h2>Details updated successfully!</h2>";
        } else {
            echo "<h2>Update failed!</h2>";
        }
    }

    // Redirect to gallery after update
    header("Location: gallery.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
    <style>
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
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        form {
            width: 50%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        textarea,
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #45a049;
        }

        .image-preview {
            text-align: center;
            margin-bottom: 15px;
        }

        .image-preview img {
            max-width: 200px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .go-to-update {
    display: inline-block;
    margin-top: 10px;
    padding: 12px 20px;
    background-color: #FF4081;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    transition: background-color 0.3s;
}

.go-to-update:hover {
    background-color: #F50057;
}
    </style>
</head>
<body>
<header>
        <h1>Update</h1>
        <a href="gallery.php" class="go-to-update">Go to Gallery</a>
    </header>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-title">Update Image Details</div>

        <label for="category">Category:</label>
        <select name="category" required>
            <option value="" disabled selected>Select category</option>
            <option value="Nature" <?php if ($row['category'] == 'Nature') echo 'selected'; ?>>Nature</option>
            <option value="Wildlife" <?php if ($row['category'] == 'Wildlife') echo 'selected'; ?>>Wildlife</option>
            <option value="Precious_Memories" <?php if ($row['category'] == 'Precious_Memories') echo 'selected'; ?>>Precious Memories</option>
        </select>

        <label for="description">Description:</label>
        <textarea name="description" rows="5" required><?php echo htmlspecialchars($row['description']); ?></textarea>

        <label for="image">Change Image:</label>
        <input type="file" name="image" />

        <div class="image-preview">
            <strong>Current Image:</strong><br>
            <img src="Images/<?php echo htmlspecialchars($row['file']); ?>" alt="Current Image" />
        </div>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
