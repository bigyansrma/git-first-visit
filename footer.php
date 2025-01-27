<style>
   /* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%; /* Ensure the height covers the viewport */
}

body {
    display: flex;
    flex-direction: column; /* Arrange items in a column */
    font-family: 'Arial', sans-serif; /* Modern font style */
}

/* Content section */
.content {
    flex: 1; /* Push the footer to the bottom if content is shorter */
    padding: 20px;
    text-align: center;
}

/* Footer styling */
footer {
    background-color: #333; /* Dark background */
    color: #f9f9f9; /* Light text */
    text-align: center;
    padding: 20px 10px; /* Space around text */
    font-size: 14px; /* Comfortable font size */
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2); /* Shadow for depth */
    border-top: 4px solid #ff5722; /* Vibrant top border */
    position: relative;
    width: 100%;
    bottom: 0;
    margin-top: auto; /* This will ensure the footer is pushed to the bottom */
}

footer p {
    margin: 0;
}

footer p a {
    color: #ff9800; /* Vibrant link color */
    text-decoration: none;
    font-weight: bold;
}

footer p a:hover {
    text-decoration: underline;
    color: #ffc107; /* Brighter hover effect */
}

    </style>
<footer>
        <p>&copy; 2024 @precious Memories. All rights reserved.</p>
    </footer>
</body>
</html>
