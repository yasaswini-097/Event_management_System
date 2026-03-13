<?php
session_start();

$conn = new mysqli("localhost","root","","events_managements1");

if(isset($_POST['login']))
{
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows == 1)
{
$row = $result->fetch_assoc();
$_SESSION['user_id'] = $row['id'];
$_SESSION['user_name'] = $row['name'];

header("Location: user_dashboard.php");
}
else
{
$error = "Invalid Email or Password";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#3b82f6,#9333ea);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.login-box{
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

.error{
color:red;
text-align:center;
}

.register-link{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#2563eb;
}

</style>

</head>

<body>

<div class="login-box">

<h2>User Login</h2>

<?php
if(isset($error))
{
echo "<p class='error'>$error</p>";
}
?>

<form method="POST">

<input type="email" name="email" placeholder="Email Address" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

<a class="register-link" href="user_register.php">New user? Register</a>

</div>

</body>
</html>