<header>
    <style>
      /* Header Styles */
header {
    background: linear-gradient(45deg, #4CAF50, #2196F3, #FFC107, #F44336);
    background-size: 400% 400%; /* Makes the gradient cover more space */
    animation: gradientAnimation 10s ease infinite; /* Adds animation */
    color: #fff; /* Text color */
    padding: 20px 0;
    position: sticky; /* Sticks to the top on scroll */
    top: 0;
    z-index: 1000;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    border-radius: 15px; /* Added border-radius for curved corners */
}

/* Header animation */
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

 /* Container to center content */
.header-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
}

/* Logo */
.header-logo {
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    text-decoration: none;
    color: #fff;
    transition: color 0.3s;
}

.header-logo:hover {
    color: #ddd;
}

/* Navigation Menu */
.nav-menu {
    display: flex;
    gap: 20px;
}

.nav-menu a {
    font-size: 16px;
    text-decoration: none;
    color: #fff;
    transition: color 0.3s;
}

.nav-menu a:hover {
    color: #ddd;
}

/* Mobile Menu (Hidden by default) */
.mobile-menu-icon {
    display: none;
    font-size: 28px;
    cursor: pointer;
    color: #fff;
}

/* Responsive Design */
@media (max-width: 768px) {
    .nav-menu {
        display: none; /* Hide menu on smaller screens */
        flex-direction: column;
        gap: 10px;
        position: absolute;
        top: 70px;
        right: 20px;
        background: #4CAF50;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .nav-menu.show {
        display: flex; /* Show menu when toggled */
    }

    .mobile-menu-icon {
        display: block; /* Show mobile menu icon */
    }
}

    </style>
    
    <div class="header-container">
        <nav>
            <div class="mobile-menu-icon" onclick="toggleMenu()">☰</div>
            <div class="nav-menu">
                <a href="portfolio.php">Portfolio</a>
                <a href="experience.php">Experience</a>
                <a href="contact.php">Contact</a>
                <a href="collection.php">Collection</a>
                <a href="admin.php">Admin</a>
            </div>
        </nav>
    </div>
</header>

<script>
    // JavaScript for toggling the mobile menu
    function toggleMenu() {
        const navMenu = document.querySelector('.nav-menu');
        navMenu.classList.toggle('show');
    }
</script>
