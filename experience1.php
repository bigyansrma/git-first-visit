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

// Initialize variables for the form
$id = $name = $role = $years = $skills = $description = "";

// Check if the edit action is triggered
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_sql = "SELECT * FROM experiences WHERE id = $id";
    $edit_result = mysqli_query($con, $edit_sql);
    $edit_row = mysqli_fetch_assoc($edit_result);
    if ($edit_row) {
        $name = $edit_row['name'];
        $role = $edit_row['role'];
        $years = $edit_row['experience_years'];
        $skills = $edit_row['skills'];
        $description = $edit_row['description'];
    }
}

// Add, Edit, Delete Logic (if any POST request is made)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        // Add experience
        $name = $_POST['name'];
        $role = $_POST['role'];
        $years = $_POST['experience_years'];
        $skills = $_POST['skills'];
        $description = $_POST['description'];
        $add_sql = "INSERT INTO experiences (name, role, experience_years, skills, description) 
                    VALUES ('$name', '$role', '$years', '$skills', '$description')";
        mysqli_query($con, $add_sql);
        header("Location: experience1.php");
    } elseif (isset($_POST['edit'])) {
        // Edit experience
        $id = $_POST['id'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $years = $_POST['experience_years'];
        $skills = $_POST['skills'];
        $description = $_POST['description'];
        $edit_sql = "UPDATE experiences 
                     SET name='$name', role='$role', experience_years='$years', skills='$skills', description='$description' 
                     WHERE id=$id";
        mysqli_query($con, $edit_sql);
        header("Location: experience1.php");
    }
} elseif (isset($_GET['delete'])) {
    // Delete experience
    $id = $_GET['delete'];
    $delete_sql = "DELETE FROM experiences WHERE id=$id";
    mysqli_query($con, $delete_sql);
    header("Location: experience1.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Experiences</title>
   
    <style>
       <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9fafc;
        color: #333;
        padding: 20px;
        animation: fadeIn 1s ease-in-out;
    }

    h1 {
        text-align: center;
        color: #007bff;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    h2 {
        color: #0056b3;
        font-size: 1.5rem;
    }

    .back-button {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        animation: slideIn 1s ease;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
        padding: 10px;
        font-size: 16px;
        animation: bounceIn 1s ease;
    }

    td {
        padding: 10px;
        text-align: center;
        font-size: 14px;
        background-color: #fff;
        transition: background-color 0.3s ease;
    }

    td:hover {
        background-color: #f1f8ff;
    }

    .form-container {
        margin: 20px 0;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 1s ease-in-out;
    }

    .form-container input, .form-container textarea, .form-container button {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        transition: box-shadow 0.3s ease;
    }

    .form-container input:focus, .form-container textarea:focus {
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .form-container textarea {
        height: 100px;
    }

    .form-container button {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .form-container button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #0056b3;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

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

    @keyframes slideIn {
        from {
            transform: translateX(-100%);
        }
        to {
            transform: translateX(0);
        }
    }

    @keyframes bounceIn {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
</style>

    </style>
</head>
<body>

<h1>Admin Panel - Manage Experiences</h1>

<!-- Add/Edit Form -->
<div class="form-container">
    <h2><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Experience</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($name) ?>" required>
        <input type="text" name="role" placeholder="Role" value="<?= htmlspecialchars($role) ?>" required>
        <input type="number" name="experience_years" placeholder="Years of Experience" value="<?= htmlspecialchars($years) ?>" required>
        <textarea name="skills" placeholder="Skills" required><?= htmlspecialchars($skills) ?></textarea>
        <textarea name="description" placeholder="Description" required><?= htmlspecialchars($description) ?></textarea>
        <button type="submit" name="<?= isset($_GET['edit']) ? 'edit' : 'add' ?>">
            <?= isset($_GET['edit']) ? 'Update Experience' : 'Add Experience' ?>
        </button>
    </form>
</div>

<!-- Experience Table -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Years</th>
            <th>Skills</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['role']) ?></td>
            <td><?= htmlspecialchars($row['experience_years']) ?></td>
            <td><?= htmlspecialchars($row['skills']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
                <a href="experience1.php?edit=<?= $row['id'] ?>">Edit</a> |
                <a href="experience1.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<a href="admin.php" class="back-button">Go Back to Admin Panel</a>
</body>
</html>
<?php mysqli_close($con); ?>
