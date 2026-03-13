<?php
session_start();

$conn = new mysqli("localhost","root","","events_managements1");

if(isset($_POST['login']))
{
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if($result->num_rows == 1)
{
$_SESSION['admin']=$username;
header("Location: admin_dashboard.php");
}
else
{
$error="Invalid Login Details";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#1e3a8a,#9333ea);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.login-box{
background:white;
padding:40px;
border-radius:10px;
width:350px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
text-align:center;
}

.login-box h2{
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
padding:10px;
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
margin-bottom:10px;
}

</style>

</head>

<body>

<div class="login-box">

<h2>Admin Login</h2>

<?php
if(isset($error))
{
echo "<p class='error'>$error</p>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

</div>

</body>
</html>