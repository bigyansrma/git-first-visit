<?php
// Database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "precious_memories";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all experiences
$sql = "SELECT * FROM experiences ORDER BY id ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Experiences</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
            line-height: 1.6;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 36px;
            color: #4CAF50;
        }

        /* Experience Container */
        .experience-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        /* Experience Card */
        .experience-card {
            background-color: #fff;
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .experience-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .experience-card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #4CAF50;
            text-align: center;
        }

        .experience-card p {
            margin: 10px 0;
            font-size: 16px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .experience-container {
                flex-direction: column;
                align-items: center;
            }

            .experience-card {
                width: 100%;
                max-width: 400px;
            }
        }
    </style>
</head>
<body>
<?php
        include('header.php');
        ?>
        <br>
    <!-- Header -->
    <header class="header">
       
        
        <h1>Our Experiences</h1>
    </header>

    <!-- Experience Container -->
    <div class="experience-container">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="experience-card">
            <h2><?= htmlspecialchars($row['name']) ?></h2>
            <p><strong>Role:</strong> <?= htmlspecialchars($row['role']) ?></p>
            <p><strong>Years of Experience:</strong> <?= htmlspecialchars($row['experience_years']) ?> Years</p>
            <p><strong>Skills:</strong> <?= htmlspecialchars($row['skills']) ?></p>
            <p><?= htmlspecialchars($row['description']) ?></p>
        </div>
        <?php } ?>
    </div>
</body>

       
    
</body>

</html>
</html>


<?php
        include('footer.php');
        
        ?>
<?php
mysqli_close($con);
?>
