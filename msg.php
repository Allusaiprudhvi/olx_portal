<?php
session_start();
$servername="localhost";
$username="root";
$password="omshiridisai";
$database="online_portal";
$port=3300;

$conn=new mysqli($servername,$username,$password,$database,$port);
$user_id=$_SESSION['user_id'];

if(!$conn)
{
die("connectioin not established".$conn->error);
}

if(isset($_POST['enter']))
{ echo "succes";
 $product_id=$_POST['product_id'];
 $_SESSION['product_id']=$product_id;

}   
if(isset($_POST['submit']))
{
    $price=$_POST['price'];
    $email_id=$_POST['email_id'];
    $name=$_POST['name'];
  $product_id =$_SESSION['product_id'];

$sql="insert into message(price,product_id,buyer_id,name,email_id) values('$price','$product_id','$user_id','$name','$email_id')";
if($conn->query($sql)==false)
    die("erroor in inserting message ".$conn->error);
         header("location:home.php");

}

?>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">

    </head>
     <form action="#" method="post" >
        <h1>Enter your message</h1>
       
        <input type="text" name="buyer_id" style="display:none" value=<?=$user_id?>>
                <input type="text" name="product_id" style="display:none" value=<?=$product_id?>>

        <label>
            <span> Name</span><br>
        <input type="text" name="name"  placeholder="enter your name">
        </label><br><br>
         <label>
            <span>requested price</span><br>
        <input type="text" name="price"  placeholder="enter the price you wanted">
        </label><br><br>
         
         <label>
            <span>Email_id</span><br><br>
            <input type="text" name="email_id" placeholder="enter your email_id">
        </label><br>
        <button type="submit" name="submit">Send</button><br>
        
        
    </form>
</html>