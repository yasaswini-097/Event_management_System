<?php
$conn = new mysqli("localhost","root","","events_managements1");

if($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['search']))
{
$search = $_GET['search'];
$sql = "SELECT * FROM events 
WHERE title LIKE '%$search%' 
OR location LIKE '%$search%'";
}
else
{
$sql = "SELECT * FROM events";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>EventHub</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f4f6fb;
}

/* NAVBAR */

nav{
background:#111827;
color:white;
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 70px;
position:sticky;
top:0;
z-index:1000;
}

nav h2{
color:#22c55e;
font-size:26px;
}

nav a{
color:white;
text-decoration:none;
margin-left:20px;
padding:8px 14px;
border-radius:6px;
transition:0.3s;
}

nav a:hover{
background:#22c55e;
}

/* HERO */

.hero{
height:75vh;
background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
url("https://images.unsplash.com/photo-1492684223066-81342ee5ff30");
background-size:cover;
background-position:center;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
text-align:center;
color:white;
}

.hero h1{
font-size:60px;
margin-bottom:15px;
}

.hero p{
font-size:20px;
margin-bottom:25px;
}

.hero a{
background:#22c55e;
padding:14px 30px;
border-radius:10px;
text-decoration:none;
color:white;
font-size:18px;
transition:0.3s;
}

.hero a:hover{
background:#16a34a;
}

/* SEARCH */

.search-box{
display:flex;
justify-content:center;
margin-top:-30px;
}

.search-box form{
background:white;
padding:12px;
border-radius:40px;
box-shadow:0 10px 25px rgba(0,0,0,0.25);
}

.search-box input{
border:none;
outline:none;
padding:10px;
width:250px;
font-size:15px;
}

.search-box button{
background:#22c55e;
border:none;
padding:10px 20px;
border-radius:30px;
color:white;
cursor:pointer;
font-weight:bold;
}

/* EVENTS SECTION */

.container{
width:90%;
margin:auto;
margin-top:50px;
}

.title{
text-align:center;
font-size:34px;
margin-bottom:30px;
}

/* GRID */

.events{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:30px;
}

/* CARD */

.card{
background:white;
border-radius:14px;
overflow:hidden;
box-shadow:0 8px 20px rgba(0,0,0,0.15);
transition:0.4s;
}

.card:hover{
transform:translateY(-10px);
box-shadow:0 12px 28px rgba(0,0,0,0.25);
}

.card img{
width:100%;
height:180px;
object-fit:cover;
}

.card-content{
padding:18px;
}

.card-content h3{
margin-bottom:10px;
color:#111827;
}

.card-content p{
font-size:14px;
margin-bottom:6px;
color:#555;
}

.price{
color:#16a34a;
font-weight:bold;
font-size:16px;
}

.manager{
background:#f1f5f9;
padding:8px;
border-radius:6px;
margin-top:8px;
font-size:13px;
}

/* BOOK BUTTON */

.book{
display:inline-block;
margin-top:12px;
background:#3b82f6;
color:white;
padding:10px 18px;
border-radius:6px;
text-decoration:none;
font-size:14px;
}

.book:hover{
background:#2563eb;
}

/* FOOTER */

footer{
margin-top:60px;
background:#111827;
color:white;
text-align:center;
padding:20px;
}

footer p{
margin-bottom:5px;
}

</style>
</head>

<body>

<nav>

<h2>EventHub</h2>

<div>
<a href="index.php">Home</a>
<a href="user_register.php">Register</a>
<a href="user_login.php">User Login</a>
<a href="admin_login.php">Admin</a>
</div>

</nav>

<!-- HERO -->

<div class="hero">

<h1>Discover Amazing Events</h1>
<p>Concerts • Workshops • Tech Conferences • Meetups</p>

<a href="user_register.php">Join Now</a>

</div>

<!-- SEARCH -->

<div class="search-box">

<form method="GET">

<input type="text" name="search" placeholder="Search events or location">

<button type="submit">Search</button>

</form>

</div>

<!-- EVENTS -->

<div class="container">

<h2 class="title">Events</h2>

<div class="events">

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

echo "<div class='card'>";

echo "<img src='https://images.unsplash.com/photo-1511578314322-379afb476865'>";

echo "<div class='card-content'>";

echo "<h3>".$row['title']."</h3>";

echo "<p>".$row['description']."</p>";

echo "<p><b>Date:</b> ".$row['event_date']."</p>";

echo "<p><b>Location:</b> ".$row['location']."</p>";

echo "<p class='price'>Price: ₹".$row['price']."</p>";

echo "<div class='manager'>";
echo "<b>Manager:</b> ".$row['manager_name']."<br>";
echo "📞 ".$row['manager_mobile'];
echo "</div>";

echo "<a class='book' href='user_login.php'>Book Event</a>";

echo "</div>";

echo "</div>";

}

}else{

echo "<p>No events available</p>";

}

?>

</div>

</div>

<footer>

<p>© 2026 EventHub</p>
<p>Online Event Management Platform</p>

</footer>

</body>
</html>