
<?php
session_start();
$servername="localhost";
$username="root";
$password="omshiridisai";
$database="online_portal";
$port=3300;

$conn=new mysqli($servername,$username,$password,$database,$port);
if(!$conn)
{
die("connectioin not established".$conn->error);
}

$user_id=$_SESSION['user_id'];
if(isset($_POST['change_password']))
{
   $password =$_POST['pass'];
$conn->query("update User set password='$password' where user_id='$user_id'");
}

$user_name=$conn->query("select name from User where user_id='$user_id'");  
$user_name=$user_name->fetch_array();
$_SESSION['user_name']=$user_name['name'];

?>




<!DOCTYPE html> 
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>home</title>
 <link rel="stylesheet" href="styles.css">
</head>


<body style="	background-color: #CBEAEB;">
<header>
	<h1 style="text-align:center">OLX PORTAL</h1>
        <h1 style="text-align:right"><?=$user_name['name']?></h1>
        <p style="text-align:right" >  <a href="#" onclick="change_password()">Change Password</a></p>
</header>
    	<nav>
    <ul>
    	<li>
            <a href="home.php" > HOME</a>
    	</li>
           <li>
           	<a href="Messages.php" class="active"> Messages</a>
           </li> 
           <li>
           	<a href="sell.php">SELL_an_ITEM</a>
           </li>
           <li>
           	<a href="products.php">Your-Products</a>
           </li>
    </ul>
	</nav>
</html>
<?php
 
$sql="select Products.product_id,product_type,name,price,email_id from Products inner join message on Products.product_id=message.product_id where seller_id='$user_id'";
$res=$conn->query($sql);
if($res==false)
{
    die("error in showinh=g messages".$conn->error);
}
echo "<table>";
echo "<tr>";
echo "<th>product_id</th>";
echo "<th>product_type</th>";

echo "<th>Name</th>";
echo "<th>Price</th>";
echo "<th>email_id</th>";

  while( $row=$res->fetch_array())
     {
      echo "<tr>";
                       echo "<td>".$row['product_id']."</td>";
                       echo "<td>".$row['product_type']."</td>";


      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['price']."</td>";
      echo "<td>".$row['email_id']."</td>";
      echo "</tr>";
     }
 echo "</table>";
?>