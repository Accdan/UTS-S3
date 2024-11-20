<?php 
// session_start();
require_once 'model_role/user_model.php'; 

$userModel = new modelUser();

if (isset($_POST["submit"])) {
    $user_name = $_POST["username"];
    $user_password = $_POST["password"];
    $error = false;
    $error_user = false;

    $user = $userModel->getUserByName($user_name);
    // var_dump($user);
    
    if ($user && $user_password == $user->user_password) {
        if ($user->role_id == 3) {
            $error_user = true;
        } else {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $user->user_name;
            $_SESSION["role_id"] = $user->role_id;
            header("Location: index.php");
            exit;
        }
    } else {
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url("view/includes/Pict/bg1.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 30px 40px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            color: #333;
            background-color: rgba(255, 255, 255, 0.7);
            outline: none;
        }

        input:focus {
            border-color: #4CAF50;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .image-placeholder {
            width: 100%;
            height: 150px;
            background-color: #e0e0e0;
            border-radius: 10px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="image-placeholder">
            <!-- Placeholder for Image (You can replace it with an actual image) -->
            <img src="view/includes/Pict/banners.jpg" alt="Logo" class="w-full h-full object-cover rounded-lg" />
        </div>
        
        <h1>Login Here</h1>

        <?php if (isset($error_user) && $error_user): ?>
            <p class="error-message">User Tidak Bisa Login!</p>
        <?php endif; ?>

        <?php if (isset($error) && $error): ?>
            <p class="error-message">Username atau Password salah!</p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <button type="submit" name="submit">Log In</button>
        </form>
    </div>
</body>
</html>
