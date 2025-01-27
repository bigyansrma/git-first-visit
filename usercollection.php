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

// Get filter and sort options from GET request
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'date';

// Start the base SQL query
$sql = "SELECT * FROM sort WHERE 1";

// Apply filtering if a category is selected
if ($filter) {
    $sql .= " AND category = '$filter'";
}

// Apply sorting based on the selected sort option
if ($sort === 'newest') {
    $sql .= " ORDER BY upload_date DESC";  // Sort by date (newest first)
} elseif ($sort === 'oldest') {
    $sql .= " ORDER BY upload_date ASC";  // Sort by date (oldest first))
}

// Execute the query
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Collection</title>
   
    <style>
        /* Add the styles as you have previously defined */
    </style>
    
</head>

<body>
<?php
        include('userheader.php');
        ?>
        <br>
    <!-- Header -->
    <header class="header">
       
        
        <h1>    Precious Memories-Image Collection</h1>
    </header>

    

    <!-- Filter and Sort Form -->
    <div class="filter-sort">
        <form method="GET" action="usercollection.php">
            <label for="filter">Filter by Category:</label>
            <select name="filter" id="filter">
                <option value="">All</option>
                <option value="Nature" <?php echo $filter == 'Nature' ? 'selected' : ''; ?>>Nature</option>
                <option value="Wildlife" <?php echo $filter == 'Wildlife' ? 'selected' : ''; ?>>Wildlife</option>
                <option value="precious_memories" <?php echo $filter == 'precious_memories' ? 'selected' : ''; ?>>precious_memories</option>
                <!-- Add other categories as needed -->
            </select>

            <label for="sort">Sort by:</label>
            <select name="sort" id="sort">
                <option value="newest" <?php echo $sort == 'date' ? 'selected' : ''; ?>>Newest first</option>
                <option value="oldest" <?php echo $sort == 'date' ? 'selected' : ''; ?>>Oldest First</option>
            </select>

            <button type="submit">Apply</button>
        </form>
    </div>

    <!-- Image Gallery -->
    <div class="image-gallery">
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
            $imagePath = "images/" . $row['file'];
            if (file_exists($imagePath)) {
        ?>
            <div class="image-item">
                <img src="<?php echo $imagePath; ?>" alt="Gallery Image">
                <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
            </div>
        <?php
            } else {
                echo "<p>Image not found</p>";
            }
        }
        ?>
    </div>

</body>
<?php include('footer.php'); ?>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>



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

/* Filter and Sort Section */
.filter-sort {
    display: flex;
    justify-content: center;
    margin: 20px 0;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.filter-sort form {
    display: flex;
    gap: 15px;
    align-items: center;
}

.filter-sort label {
    font-size: 1.1em;
    color: #333;
}

.filter-sort select, .filter-sort button {
    padding: 8px 12px;
    font-size: 1em;
    border-radius: 6px;
    border: 1px solid #ccc;
    background-color: #fff;
    color: #333;
}

.filter-sort select:focus, .filter-sort button:focus {
    outline: none;
    border-color: #007BFF;
}

.filter-sort button {
    cursor: pointer;
    background-color: #007BFF;
    color: white;
    border: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.filter-sort button:hover {
    background-color: #0056b3;
    transform: translateY(-2px); /* Hover effect to lift the button */
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
