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

// Fetch contacts from the database
$sql = "SELECT * FROM `contact` ORDER BY `id` ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel | Precious Memories</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      text-align: center;
    }
    header .back-button {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 15px;
      font-size: 14px;
      cursor: pointer;
      border-radius: 5px;
      text-decoration: none;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px auto;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      word-wrap: break-word;
    }
    table th {
      background-color: #007bff;
      color: #fff;
    }
    table tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    table tr:hover {
      background-color: #ddd;
    }
    footer {
      text-align: center;
      padding: 10px;
      background-color: #333;
      color: white;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <header>
    <a href="admin.php" class="back-button">Back to Admin Panel</a>
    <h1>Admin Panel</h1>
    <p>View All Contact Submissions</p>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Date Submitted</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_submitted'] ?? 'N/A') . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No contacts found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </main>
  
</body>
<?php
include('footer.php');
?>
</html>

<?php
// Close connection
mysqli_close($con);
?>
