<?php
session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
}

$conn = new mysqli("localhost","root","","events_managements1");

if(isset($_POST['add_event']))
{

$title = mysqli_real_escape_string($conn,$_POST['title']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$date = $_POST['date'];
$location = mysqli_real_escape_string($conn,$_POST['location']);
$price = $_POST['price'];
$manager = mysqli_real_escape_string($conn,$_POST['manager']);
$mobile = $_POST['mobile'];

$sql = "INSERT INTO events(title,description,event_date,location,price,manager_name,manager_mobile)
VALUES('$title','$description','$date','$location','$price','$manager','$mobile')";

if($conn->query($sql))
{
$msg = "✅ Event Created Successfully!";
}
else
{
$msg = "❌ Error: ".$conn->error;
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Event</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#2563eb,#9333ea);
}

/* FORM BOX */

.form-box{
background:rgba(255,255,255,0.95);
padding:40px;
width:420px;
border-radius:12px;
box-shadow:0 10px 35px rgba(0,0,0,0.3);
animation:fadeIn 1s;
}

h2{
text-align:center;
margin-bottom:20px;
color:#111827;
}

/* INPUTS */

input,textarea{
width:100%;
padding:12px;
margin:10px 0;
border-radius:6px;
border:1px solid #ddd;
font-size:14px;
transition:0.3s;
}

input:focus, textarea:focus{
border-color:#2563eb;
outline:none;
box-shadow:0 0 5px rgba(37,99,235,0.4);
}

textarea{
resize:none;
height:70px;
}

/* BUTTON */

button{
width:100%;
padding:12px;
background:#22c55e;
border:none;
color:white;
font-size:16px;
border-radius:6px;
cursor:pointer;
margin-top:10px;
transition:0.3s;
}

button:hover{
background:#16a34a;
transform:scale(1.03);
}

/* MESSAGE */

.success{
text-align:center;
margin-bottom:10px;
font-weight:bold;
}

/* BACK LINK */

.back{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#2563eb;
font-weight:bold;
}

.back:hover{
text-decoration:underline;
}

/* ANIMATION */

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(20px);
}
to{
opacity:1;
transform:translateY(0);
}
}

</style>

</head>

<body>

<div class="form-box">

<h2>Create New Event</h2>

<?php
if(isset($msg))
{
echo "<p class='success'>$msg</p>";
}
?>

<form method="POST">

<input type="text" name="title" placeholder="Event Title" required>

<textarea name="description" placeholder="Event Description"></textarea>

<input type="date" name="date" required>

<input type="text" name="location" placeholder="Event Location">

<input type="number" name="price" placeholder="Event Price (₹)" required>

<input type="text" name="manager" placeholder="Manager Name" required>

<input type="tel" name="mobile" placeholder="Manager Mobile Number" pattern="[0-9]{10}" required>

<button type="submit" name="add_event">Create Event</button>

</form>

<a class="back" href="admin_dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>