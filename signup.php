<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Body */
        body {
            user-select: none;
            overflow-y: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #D3CCE3, #E9E4F0);
            background-size: 400% 400%;
            animation: gradientAnimation 6s ease infinite;
        }

        /* Gradient Animation */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Centered container */
        .signup-container {
            background: rgba(255, 255, 255, 0.9); /* Light, semi-transparent white */
            padding: 2em;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* Heading */
        .signup-container h2 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form fields */
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
        }

        /* Input focus effect */
        input[type="email"]:focus, input[type="password"]:focus {
            outline: none;
            border: 2px solid #6A5ACD;
            box-shadow: 0 0 10px rgba(106, 90, 205, 0.4);
        }

        /* Button */
        .signup-button {
            padding: 14px;
            margin-top: 20px;
            background-color: #6A5ACD;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Button hover effect */
        .signup-button:hover {
            background-color: #5A4BBE;
            transform: translateY(-2px);
        }

        /* Links */
        .login-link {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .login-link a {
            color: #6A5ACD;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .signup-container {
                padding: 1.5em;
            }

            .signup-container h2 {
                font-size: 26px;
            }

            input[type="email"], input[type="password"] {
                padding: 12px;
            }

            .signup-button {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Create an Account</h2>
        <form action="register.php" method="post">
            <input type="email" name="email" placeholder="Enter your email" required />
            <input type="password" name="password" placeholder="Enter your password" required />
            <button type="submit" class="signup-button">Sign Up</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>
</body>
</html>
