<?php
session_start();

if (isset($_SESSION['message']) && $_SESSION['message_type'] === 'error') {
    $message = $_SESSION['message'];
    echo "<script>alert('$message');</script>";
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
if (isset($_GET['LogOut'])) {
    $_SESSION['message'] = "You have been successfully logged out.";
    $_SESSION['message_type'] = "success";
    session_destroy();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display:flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            width: 400px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            margin: 0px;
        }
        .input{
            margin-bottom: 15px;
            
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
        
        }
        button {
            width: 45%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 5px;
            
            
        }
        button:hover{
            color: #000000;
        }
        

        .signup{
            background-color: #4CAF50;
            color: white;

        }
        .login{
            background-color:  #008CBA;
            color: white;
        }
        .help-text{
            text-align: center;
            margin-top: 20px;
        }
        body{
            background-image: url(login-page-background.jpg);
        }



    </style>
    
    <script>
        function validateForm() {
            const username = document.forms["loginForm"]["username"].value;
            const password = document.forms["loginForm"]["password"].value;
            
            if (username == "" || password == "") {
                alert("Please fill in all fields");
                return false;
            }
            return true;
        }
    </script>
    

</head>
<body>
    

    <div class="container" style=" justify-content: center; border: 2px solid;">
        <div style="display: flex; justify-content: center;">
        <img src="OIP.jpeg">
        </div>
        <h2 style="text-align: center;">My Petakom Login</h2>
        <hr>
        
        <form method="post" action="login.php">
        <div class="input">
            <table>
            <div class="int">
            <tr>
                <td><i class="fa-solid fa-circle-user"></i></td>
                <td><input type="text" name="username" placeholder="Username" style="width: 180%;"></td>
            </tr>   
            <tr>
                <td><i class="fa-solid fa-lock"></i></td>
                <td><input type="password" name="password" placeholder="Password" style="width: 180%;"></td>
            </tr>
            </div>
            <tr>
                <td colspan="2">
                    <select name="role" style="width: 180%;">
                        <option value="Student">Student</option>
                        <option value="Coordinator">Coordinator</option>
                        <option value="EventAdvisor">EventAdvisor</option>
                    </select>
                </td>
            </tr>
        
            <tr>
                <td><input type="checkbox"></td>
                <td>Remember Me</td>
            </tr>
            </table>
        </div>
    
        <div class="button">
            <button type="button" class="signup" onclick="window.location.href='signup.html'">Signup</button>
            <button type="submit" class="login">Login</button>
        </div>
        </form>

            <div class="help-text">
                <a href="#">Registration</a> | 
                <a href="#">Forget Password?</a>
            </div>
            <p class="help-text">My Petakom User Support</p>
       
    </div>
</body>
</html>