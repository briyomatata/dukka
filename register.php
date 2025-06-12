<?php

include('connection.php');

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['Con_password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors= array();

    if(empty($fullname) OR empty($email) OR empty($password) OR empty($passwordRepeat)){
        array_push($errors, "All Fields are required");
        
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid");
    }
    if(strlen($password)<4){
        array_push($errors, "Password must be at least 4 characters long");
    }
    if($password!==$passwordRepeat){
        array_push($errors, "Password does not match");
    }

    
    
    
    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class='alert alert danger'>$error</div>";
        }
    }else{
         $sql = "INSERT INTO users (fullname, user_email, user_password) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
        if($preparestmt){
            mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are Registered Succesffully</div>";
        }
        else{
            
            die("Registration error");
        }
           
       
    }
}

    //  $sql = "SELECT & FROM users WHERE user_email= '$email';
    // $result = mysqli_query($conn,$sql);
    // $rowCount = mysqli_num_rows($result);
    // if($rowCount>0){
    // array_push($errors, "Email already Exist");







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
        <h2 class="h3 fw-bold text-dark text-center mb-4">Create Your Account</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="registerUsername" class="form-label text-secondary fw-semibold">Fullname</label>
                <input type="text" id="registerUsername" name="fullname" class="form-control rounded-lg" placeholder="Choose your fullname" required>
            </div>
            <div class="mb-3">
                <label for="registerEmail" class="form-label text-secondary fw-semibold">Email Address</label>
                <input type="email" id="registerEmail" name="email" class="form-control rounded-lg" placeholder="your@example.com" required>
            </div>
            <div class="mb-3">
                <label for="registerPassword" class="form-label text-secondary fw-semibold">Password</label>
                <input type="password" id="registerPassword" name="password" class="form-control rounded-lg" placeholder="••••••••" required>
            </div>
            <div class="mb-4">
                <label for="confirmPassword" class="form-label text-secondary fw-semibold">Confirm Password</label>
                <input type="password" id="confirmPassword" name="Con_Password" class="form-control rounded-lg" placeholder="••••••••" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100 fw-bold py-2 rounded-lg">
                Register
            </button>
        </form>
        <p class="text-center text-secondary small mt-4 mb-0">
            Already have an account?
            <a href="login.php" class="text-indigo-600 hover-text-indigo-800 fw-semibold">Login here</a>
        </p>
    </div>

    <!-- Bootstrap JS CDN (optional, for components that need JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


   







