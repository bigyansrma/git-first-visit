
<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="portfolio1.php">Portfolio1</a></li>
        <li><a href="portfolio2.php">Portfolio2</a></li>
        <li><a href="portfolio3.php">Portfolio3</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="experience1.php">Experience</a></li>
        <li><a href="contactsread.php">Contacts</a></li>
    </ul>
    <a href="logout.php">
        <button class="logout-btn" type="button">Logout</button>
    </a>
</div>

<div class="main-content">
    <!-- Portfolio Button -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="portfolio.php">
            <button class="portfolio-btn" type="button">Go to Portfolio</button>
        </a>
    </div>

    <h1>Welcome to the Admin Panel</h1>
    <p>Manage your portfolio, gallery, and other pages here.</p>

    <h2>Recent Updates</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><a href="gallery.php">Update collection</a></td>
                <td style="color: green;">Completed</td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="contactsread.php">Check Messages</a></td>
                <td style="color: orange;">Pending</td>
            </tr>
            <script type="text/javascript">
    // Disable back button after logout
    window.history.forward();

    function noBack() {
        window.history.forward();
    }
    window.onload = noBack();
    window.onpageshow = function(evt) { if (evt.persisted) noBack(); }
    window.onunload = function() { void(0); }
</script>
        </tbody>
    </table>
</div>

<!-- Mobile Sidebar Toggle Button -->
<button class="toggle-btn" aria-label="Toggle Sidebar" onclick="toggleSidebar()">☰</button>

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
        display: flex;
        height: 100vh;
        overflow: hidden;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background: linear-gradient(45deg, #4CAF50, #2196F3, #FFC107, #F44336);
        background-size: 400% 400%; /* Makes the gradient cover more space */
        animation: gradientAnimation 10s ease infinite; /* Adds animation */
        color: #fff;
        position: fixed;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px 0;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    /* Sidebar background animation */
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        25% {
            background-position: 50% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        75% {
            background-position: 50% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 22px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 10px 0;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        display: block;
        padding: 10px 20px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .sidebar ul li a:hover {
        background-color: #45a049;
    }

    /* Logout Button */
    .logout-btn {
        margin: 20px;
        padding: 10px;
        background-color: #d9534f;
        color: #fff;
        text-align: center;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .logout-btn:hover {
        background-color: #c9302c;
    }

    /* Portfolio Button */
    .portfolio-btn {
        padding: 12px 20px;
        background-color: #d9534f;
        color: white;
        font-size: 18px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .portfolio-btn:hover {
        background-color: #c9302c;
    }

    /* Main Content */
    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
        overflow-y: auto;
    }

    .main-content h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    /* Table Styling */
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .admin-table th,
    .admin-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .admin-table th {
        background-color: #4CAF50;
        color: white;
    }

    .admin-table tr:hover {
        background-color: #f1f1f1;
    }

    /* Responsive Sidebar */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
            width: 100%;
        }

        .toggle-btn {
            display: block;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            border-radius: 4px;
        }
    }
    /* Main Content */


/* Animated Gradient Background */
/* @keyframes gradientBackground {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
} */

/* Slide-in from the left animation */
@keyframes slideInFromLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Styling for Heading */
.main-content h1 {
    font-size: 32px;
    color: #2C3E50; /* Darker shade for heading text */
    font-weight: 600;
    margin-bottom: 20px;
    animation: slideInFromLeft 1s ease-out forwards; /* Slide-in animation */
}

/* Slide-in animation for heading */
@keyframes slideInFromLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Subheadings */
.main-content h2 {
    font-size: 24px;
    color: #FFD700; /* Yellow color for subheadings */
    margin-top: 30px;
    margin-bottom: 10px;
    animation: slideInFromLeft 1s ease-out forwards;
}

/* Paragraph Styling */
.main-content p {
    font-size: 16px;
    color: #555; /* Soft grey for paragraph text */
    line-height: 1.6;
    margin-bottom: 20px;
    animation: fadeIn 1s ease-in forwards;
}

/* Button Styling */
.main-content .portfolio-btn {
    padding: 14px 20px;
    background-color: #87CEEB; /* Sky blue color for the button */
    color: white;
    font-size: 18px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    display: inline-block;
    margin-bottom: 20px;
    animation: scaleIn 0.5s ease-in forwards; /* Button scale animation */
}

/* Button Scale-in Animation */
@keyframes scaleIn {
    from {
        transform: scale(0);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

/* Button Hover Effect */
.main-content .portfolio-btn:hover {
    background-color: #FF6347; /* Soft orange color for hover effect */
    transform: translateY(-2px);
}

/* Table Styling */
.admin-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    animation: fadeIn 1.5s ease-in forwards;
}

.admin-table th, .admin-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.admin-table th {
    background-color: #87CEEB; /* Sky blue for table header */
    color: white;
}

.admin-table tr:hover {
    background-color: #f1f1f1; /* Light gray hover effect for table rows */
}

/* Responsive Design for Main Content */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0;
        width: 100%;
    }

    /* Adjusting Button for Smaller Screens */
    .main-content .portfolio-btn {
        padding: 12px 16px;
        font-size: 16px;
    }

    /* Adjusting Table Padding for Small Screens */
    .admin-table th, .admin-table td {
        padding: 8px;
    }
}

