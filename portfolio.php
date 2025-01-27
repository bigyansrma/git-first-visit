<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
   <?php
   include ('header.php');
   ?>
</head>
<body>
    <br>
    <header class="header">
    <a href="portfolio.php" class="header-logo">My Portfolio</a>
        
        <p>Explore some of my recent works and projects.</p>
        <style>
            /* Global Reset */
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
    line-height: 1.6;
    padding: 20px;
}

/* Header Styling */
.header {
    text-align: center;
    margin-bottom: 40px;
}

.header h1 {
    font-size: 36px;
    color: #4CAF50;
    margin-bottom: 10px;
}

.header p {
    font-size: 18px;
    color: #666;
}

/* Portfolio Container */
.portfolio-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
    padding: 10px;
}

/* Portfolio Item */
.portfolio-item {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.portfolio-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.portfolio-item img {
    width: 100%;
    height: auto;
    display: block;
}

.portfolio-item .content {
    padding: 15px;
    text-align: center;
}

.portfolio-item h2 {
    font-size: 20px;
    color: #4CAF50;
    margin-bottom: 10px;
}

.portfolio-item p {
    font-size: 14px;
    color: #666;
}

/* Button Style */
.portfolio-item .btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    color: #fff;
    background-color: #4CAF50;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.portfolio-item .btn:hover {
    background-color: #45a049;
}

/* Responsive Design */
@media (max-width: 768px) {
    .portfolio-container {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
}

        </style>
    </header>

    <div class="portfolio-container">
        <!-- Portfolio Item 1 -->
        <div class="portfolio-item">
            <img src="wp3112549.webp" alt="Project 1">
            <div class="content">
                <h2> First Project</h2>
                <p>Our precious memory</p>
                <a href="portfolio11.php" class="btn">View More</a>
                
            </div>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="portfolio-item">
            <img src="images.jpg" alt="Project 2">
            <div class="content">
                <h2>Second Project</h2>
                <p>Wildlife Life</p>
                <a href="portfolio22.php" class="btn">View More</a>
            </div>
        </div>

        <!-- Portfolio Item 3 -->
        <div class="portfolio-item">
            <img src="premium_photo-1688645554172-d3aef5f837ce.jpg" alt="Project 3">
            <div class="content">
                <h2>Third Project</h2>
                <p>Vibing with Nature</p>
                <a href="portfolio33.php" class="btn">View More</a>
            </div>
        </div>
    </div>
</body>
<?php 
include('footer.php');
?>
</html>
