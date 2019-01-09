
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
 
if(isset($_POST['logout']))
{
        header("location:login-reg-form.php");
        session_destroy();

}

?>




<!DOCTYPE html> 
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>home</title>
 <link rel="stylesheet" href="styles.css">
</head>


<body style="	background-color: #CBEAEB;">
   <container>
<header>
	<h1 style="text-align:center">OLX PORTAL</h1>
        <h1 style="text-align:right"><?=$user_name['name']?></h1>
        <form action="#" style="text-align: right;"method="post"><input type="submit" value="logout" name="logout"></form>        <p style="text-align:right" >  <a href="#" onclick="change_password()">Change Password</a></p>
</header>

	<nav>
    <ul>
    	<li>
            <a href="home.php" class="active"> HOME</a>
    	</li>
           <li>
           	<a href="Messages.php"> Messages</a>
           </li> 
           <li>
           	<a href="sell.php">SELL_an_ITEM</a>
           </li>
           <li>
           	<a href="products.php">Your-Products</a>
           </li>
    </ul>
	</nav>
        
   </container>        
<section id="change" style="display:none">
    <form action="#" method="post" onsubmit="return password_validate()">
        <h1>Change Your Password </h1>
        <p id="demo"></p>
        <p id="demo2"</p>
        
        <input type="password" name="pass" id="pwd1" placeholder="enter your new password"><br>
        <input type="password"  id="pwd2"  placeholder="retype your password"><br>
        <button type="submit" name="change_password">Change</button><br>
        
        
    </form>
</section>
        
  
    <p class="clear"></p>
    <div><ul >
        <li><a href="#" onclick="laptop_display()">Laptop</a></li>
            <li><a href="#" onclick="book_display()">Book</a></li>
        <li><a href="#" onclick="mobilephone_display()">MobilePhone</a></li>

        </ul></div>
         

     
        
        <section style="padding-top:30px " id="laptop">
     <?php
     $q2="select product.product_id,seller_id,date_of_initiation,date_of_expiry,manufacturer, model_name, year_of_purchase,battery_status, expected_price from product inner join laptop on product.product_id=laptop.product_id";
     $mob=$conn->query($q2);
     if($mob==false)
         die("while retrieving laptop details".$conn->error);
    
       while( $row=$mob->fetch_array())
     {
       
     echo "<table>";
     echo "<tr>";
     echo "<th>Product_id</th>";
          echo "<th>seller_id</th>";

      echo "<th>Manufacturer</th>" ;
       echo "<th>Model Name</th>" ;
        echo "<th>Date Of Initiation</th>" ;
         echo "<th>Date Of Expiry</th>" ;
          echo "<th>Year Of Purchase</th>" ;
                     echo "<th>Battery Status</th>" ;

           echo "<th>Expected Price</th>" ;
           echo "</tr>";
     
     echo "<tr>";
     echo "<td>".$row['product_id']."</td>";
          echo "<td>".$row['seller_id']."</td>";

      echo "<td>".$row['manufacturer']."</td>" ;
       echo "<td>".$row['model_name']."</td>" ;
        echo "<td>".$row['date_of_initiation']."</td>" ;
         echo "<td>".$row['date_of_expiry']."</td>" ;
          echo "<td>".$row['year_of_purchase']."</td>" ;
                     echo "<td>".$row['battery_status']."</td>" ;

           echo "<td>".$row['expected_price']."</td>" ;
           $_SESSION['pi']=$row['product_id'];
           
                      echo "<td><form action='msg.php' method='post'><input type='text'   style='display:none' name='product_id' value=".$row['product_id']."><input type='submit' name='enter' value='message'></form></td>";
           echo "</tr>";

    
     
          echo "</table><br>";
     }
     

     ?>
     
 </section>
    
     
        <section style="padding-top:30px " id="mobilephone">
     <?php
     $q2="select product.product_id,seller_id,date_of_initiation,date_of_expiry,manufacturer, model_name, year_of_purchase, expected_price from product inner join mobile_phone on product.product_id=mobile_phone.product_id";
     $mob=$conn->query($q2);
     if($mob==false)
         die("while retrieving laptop details".$conn->error);
    
       while( $row=$mob->fetch_array())
     {
       
     echo "<table>";
     echo "<tr>";
          echo "<th>Product_id</th>";
          echo "<th>seller_id</th>";

      echo "<th>Manufacturer</th>" ;
       echo "<th>Model Name</th>" ;
        echo "<th>Date Of Initiation</th>" ;
         echo "<th>Date Of Expiry</th>" ;
          echo "<th>Year Of Purchase</th>" ;
           echo "<th>Expected Price</th>" ;
           echo "</tr>";
     
     echo "<tr>";
          echo "<td>".$row['product_id']."</td>";
          echo "<th>$row[seller_id]</th>";

      echo "<td>".$row['manufacturer']."</td>" ;
       echo "<td>".$row['model_name']."</td>" ;
        echo "<td>".$row['date_of_initiation']."</td>" ;
         echo "<td>".$row['date_of_expiry']."</td>" ;
          echo "<td>".$row['year_of_purchase']."</td>" ;
           echo "<td>".$row['expected_price']."</td>" ;
     echo "<td><form action='msg.php' method='post' ><input type='text'  name='product_id' style='display:none' value=".$row['product_id']."><input type='submit' name='enter' value='message'></form></td>";

           echo "</tr>";

    
     
          echo "</table><br>";
     }
     

     ?>
     
 </section>
    
    <section style="padding-top:30px " id="book">
     <?php
     $q1="select product.product_id,seller_id,date_of_initiation,date_of_expiry,name,expected_price,cond from product inner join book on product.product_id=book.product_id";
     $book=$conn->query($q1);
     if($book==false)
         die("while retrieving  details".$conn->error);
    
       while( $row=$book->fetch_array())
     {
       
           $product_id=$row['product_id'];
           $author=$conn->query("select author from author where product_id='$product_id'");
            if($author==false)
         die("while retrieving author details".$conn->error);
           $str="";
           while($r=$author->fetch_array())
           {
               $str=$str.",".$r['author'];
           }
           
     echo "<table>";
     echo "<tr>";
          echo "<th>Product_id</th>";
         echo "<th>Seller_id</th>";
       echo "<th>BOOK Name</th>" ;
              echo "<th>Authors</th>" ;
              echo "<th>BOOK Condition</th>" ;
        echo "<th>Date Of Initiation</th>" ;
         echo "<th>Date Of Expiry</th>" ;
           echo "<th>Expected Price</th>" ;
           echo "</tr>";
     
     echo "<tr>";
          echo "<td>".$row['product_id']."</td>";
          echo "<td>".$row['seller_id']."</td>";

       echo "<td>".$row['name']."</td>" ;
              echo "<td>".$str."</td>" ;
                      echo "<td>".$row['cond']."</td>" ;
        echo "<td>".$row['date_of_initiation']."</td>" ;
         echo "<td>".$row['date_of_expiry']."</td>" ;
           echo "<td>".$row['expected_price']."</td>" ;
                      echo "<td><form action='msg.php' method='post'><input type='text' name='product_id' style='display:none' value=".$row['product_id']."><input type='submit' name='enter' value='message'></form></td>";

           echo "</tr>";

    
     
          echo "</table><br>";
     }
     

     ?>
     
 </section>
    
        

        </body>
</html>
<script>
    function change_password()
    {
        document.getElementById('change').style.display="block";
    }
    function password_validate()
    {
        if(document.getElementById('pwd1').value!=document.getElementById('pwd2').value)
        {
            document.getElementById('demo').innerHTML="Password Does Not Match";
            return false;
        }
        
        return true;
    }
     function laptop_display(){
        document.getElementById("mobilephone").style.display="none";
        document.getElementById("book").style.display="none";

     document.getElementById("laptop").style.display="block";
           
    }
     function mobilephone_display(){
                 document.getElementById("book").style.display="none";

        document.getElementById("laptop").style.display="none";
               document.getElementById("mobilephone").style.display="block";

    }
     function book_display(){
       document.getElementById("laptop").style.display="none";
                document.getElementById("mobilephone").style.display="none";
        document.getElementById("book").style.display="block";
        }   
    
    </script>