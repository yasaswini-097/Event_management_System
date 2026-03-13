<?php

$conn = new mysqli("localhost","root","","events_managements1");

if(isset($_POST['register']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')";

if($conn->query($sql))
{
$msg = "Registration Successful! You can login now.";
}
else
{
$msg = "Error occurred!";
}

}

?>

<!DOCTYPE html>
<html>
<head>
<title>User Register</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#06b6d4,#3b82f6);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.register-box{
background:white;
padding:40px;
border-radius:10px;
width:380px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h2{
text-align:center;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:12px;
background:#22c55e;
border:none;
color:white;
font-size:16px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#16a34a;
}

.success{
color:green;
text-align:center;
}

.login-link{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#2563eb;
}

</style>

</head>

<body>

<div class="register-box">

<h2>User Registration</h2>

<?php
if(isset($msg))
{
echo "<p class='success'>$msg</p>";
}
?>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email Address" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="register">Register</button>

</form>

<a class="login-link" href="user_login.php">Already have account? Login</a>

</div>

</body>
</html>