<?php
session_start();

if(!isset($_SESSION['user_id']))
{
header("Location: user_login.php");
}

$conn = new mysqli("localhost","root","","events_managements1");

$user_id = $_SESSION['user_id'];
$event_id = $_GET['event_id'];

if(isset($_POST['confirm']))
{

$check = $conn->query("SELECT * FROM bookings 
WHERE user_id='$user_id' AND event_id='$event_id'");

if($check->num_rows > 0)
{
$msg = "You have already booked this event!";
}
else
{

$sql = "INSERT INTO bookings(user_id,event_id)
VALUES('$user_id','$event_id')";

if($conn->query($sql))
{
$msg = "Event booked successfully!";
}
else
{
$msg = "Booking failed!";
}

}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Confirm Booking</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#2563eb,#9333ea);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.box{
background:white;
padding:40px;
border-radius:10px;
text-align:center;
width:420px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

button{
padding:10px 20px;
border:none;
border-radius:6px;
margin:10px;
font-size:16px;
cursor:pointer;
}

.confirm{
background:#22c55e;
color:white;
}

.confirm:hover{
background:#16a34a;
}

.cancel{
background:#ef4444;
color:white;
}

.cancel:hover{
background:#dc2626;
}

a{
text-decoration:none;
}

</style>

</head>

<body>

<div class="box">

<?php
if(isset($msg))
{
echo "<h2>$msg</h2>";
echo "<br>";
echo "<a href='user_dashboard.php'><button class='confirm'>Back to Dashboard</button></a>";
}
else
{
?>

<h2>Are you sure you want to book this event?</h2>

<form method="POST">

<button type="submit" name="confirm" class="confirm">Confirm Booking</button>

<a href="user_dashboard.php">
<button type="button" class="cancel">Cancel</button>
</a>

</form>

<?php
}
?>

</div>

</body>
</html>