<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "precious_memories";

// Create connection
$con = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection to the database failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $date = date('Y-m-d H:i:s'); // Automatically generate the current date and time

    // SQL query using prepared statements
    $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `date_submitted`) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $message, $date);

        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Thank you for contacting us! Your message has been sent.</p>";
        } else {
            echo "Error: " . mysqli_error($con);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the SQL statement.";
    }
}

// Close connection
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact | Precious Memories</title>
 

</head>
<body>

<header>
<?php include('header.php'); ?>
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
    background-color: #f0f2f5;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Header Styling */

/* Main Content Styling */
main {
    flex: 1;
    padding-top: 80px; /* Space for the fixed header */
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

/* Contact Section */
.contact {
    background-color: #fff;
    border-radius: 8px;
    padding: 40px;
    max-width: 600px;
    width: 100%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Heading */
.contact h1 {
    color: #333;
    font-size: 28px;
    margin-bottom: 20px;
    text-align: center;
}

/* Form Labels */
label {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 8px;
    display: inline-block;
    color: #555;
}

/* Form Input Fields */
input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    color: #333;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Focus Effect for Inputs */
input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
    outline: none;
    border-color: #4CAF50;
    background-color: #fff;
}

/* Textarea Styling */
textarea {
    resize: vertical;
    height: 150px;
}

/* Submit Button */
button[type="submit"] {
    width: 100%;
    padding: 14px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover Effect on Submit Button */
button[type="submit"]:hover {
    background-color: #45a049;
}

/* Success/Error Message */
p {
    font-size: 16px;
    color: green;
    text-align: center;
}

/* Footer */
footer {
    text-align: center;
    margin-top: 20px;
    color: #777;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact {
        padding: 30px;
        margin: 20px;
    }
}


        </style>
        
  </header>

  <main>
    <section class="contact">
      <h1>Contact Us</h1>
    
      <form action="contact.php" method="post" class="contact-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button class="sum" type="submit">Submit</button>
      </form>
    </section>
  </main>
  
  
  <script src="script.js"></script>
</body>
<?php 
include('footer.php');
?>
</html>
