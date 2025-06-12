<?php

include('connection.php');

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE user_email = '$email'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if($user){
    if(password_verify($password, $user["user_password"])){
      header("location:profile.php");
      die();
    }else{
       echo "<div class='alert alert-danger'>Password does not match </div>";
    }

  }else{
    echo "<div class='alert alert-danger'>Email does not match </div>";
  }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title> 
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5; /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
            box-sizing: border-box;
        }
        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem; /* Custom border-radius for the card */
            border: none; /* Remove default Bootstrap card border */
        }
        /* Custom styles to match the previous design's aesthetic */
        .form-control:focus {
            border-color: #6610f2; /* Indigo-500 equivalent */
            box-shadow: 0 0 0 0.25rem rgba(102, 16, 242, 0.25); /* Indigo-500 with alpha */
        }
        .btn-primary {
            background-color: #4f46e5; /* Indigo-600 */
            border-color: #4f46e5;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #4338ca; /* Slightly darker indigo */
            border-color: #4338ca;
        }
        .text-indigo-600 {
            color: #4f46e5 !important;
        }
        .hover-text-indigo-800:hover {
            color: #312e81 !important;
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100 p-4">




    <div class="card mx-auto p-4 p-sm-5 p-lg-5" style="max-width: 500px; width: 100%;">
        <h2 class="h3 fw-bold text-dark text-center mb-4">Welcome Back!</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="loginEmail" class="form-label text-secondary fw-semibold">Email Address</label>
                <input type="email" id="loginEmail" name="email" class="form-control rounded-lg" placeholder="your@example.com" required>
            </div>
            <div class="mb-4">
                <label for="loginPassword" class="form-label text-secondary fw-semibold">Password</label>
                <input type="password" id="loginPassword" name="password" class="form-control rounded-lg" placeholder="••••••••" required>
                <a href="#" class="text-sm text-indigo-600 hover-text-indigo-800 float-end mt-1">Forgot Password?</a>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100 fw-bold py-2 rounded-lg">
                Login
            </button>
        </form>
        <p class="text-center text-secondary small mt-4 mb-0">
            Don't have an account?
            <a href="register.php" class="text-indigo-600 hover-text-indigo-800 fw-semibold">Register here</a>
        </p>
    </div>

    <!-- Bootstrap JS CDN (optional, for components that need JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>





