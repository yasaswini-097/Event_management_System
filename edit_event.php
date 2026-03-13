<?php
session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
exit();
}

$conn = new mysqli("localhost","root","","events_managements1");

if($conn->connect_error){
die("Connection failed: ".$conn->connect_error);
}

/* GET EVENT ID */

if(!isset($_GET['id'])){
die("Event ID not found");
}

$id = $_GET['id'];

/* FETCH EVENT DATA */

$result = $conn->query("SELECT * FROM events WHERE id='$id'");
$row = $result->fetch_assoc();

/* UPDATE EVENT */

if(isset($_POST['update_event']))
{

$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$location = $_POST['location'];
$price = $_POST['price'];
$manager = $_POST['manager'];
$mobile = $_POST['mobile'];

$sql = "UPDATE events SET
title='$title',
description='$description',
event_date='$date',
location='$location',
price='$price',
manager_name='$manager',
manager_mobile='$mobile'
WHERE id='$id'";

if($conn->query($sql))
{
$msg = "Event Updated Successfully!";
}
else
{
$msg = "Error: ".$conn->error;
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Event</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#2563eb,#9333ea);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.form-box{
background:white;
padding:40px;
width:420px;
border-radius:10px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h2{
text-align:center;
margin-bottom:20px;
}

input,textarea{
width:100%;
padding:10px;
margin:10px 0;
border-radius:5px;
border:1px solid #ccc;
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

.msg{
text-align:center;
margin-bottom:10px;
color:green;
}

.back{
display:block;
text-align:center;
margin-top:15px;
text-decoration:none;
color:#2563eb;
}

</style>

</head>

<body>

<div class="form-box">

<h2>Edit Event</h2>

<?php
if(isset($msg))
{
echo "<p class='msg'>$msg</p>";
}
?>

<form method="POST">

<input type="text" name="title" value="<?php echo $row['title']; ?>" required>

<textarea name="description"><?php echo $row['description']; ?></textarea>

<input type="date" name="date" value="<?php echo $row['event_date']; ?>" required>

<input type="text" name="location" value="<?php echo $row['location']; ?>">

<input type="number" name="price" value="<?php echo $row['price']; ?>">

<input type="text" name="manager" value="<?php echo $row['manager_name']; ?>">

<input type="text" name="mobile" value="<?php echo $row['manager_mobile']; ?>">

<button type="submit" name="update_event">Update Event</button>

</form>

<a class="back" href="admin_dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>