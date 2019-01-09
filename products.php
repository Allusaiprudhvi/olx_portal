

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
  
if(isset($_POST['delete']))
{
    $product_id=$_POST['product_id'];
    $sql="delete from product where product_id='$product_id'";
    $conn->query($sql);
if($conn->query($sql)==false)
{
    echo "error in deleting".$conn->error;
}
    echo "alert('Product Deleted Successfully')";
    unset($_SESSION['product_id']);
    
}
 
?>




<!DOCTYPE html> 
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>Products</title>
 <link rel="stylesheet" href="styles.css">
</head>


<body style="	background-color: #CBEAEB;">
    <container>
<header>
	<h1 style="text-align:center">OLX PORTAL</h1>
        <h1 style="text-align:right"><?=$_SESSION['user_name']?></h1>
        <p style="text-align:right" >  <a href="#" onclick="change_password()">Change Password</a></p>
</header>
    	<nav>
    <ul>
    	<li>
            <a href="home.php" > HOME</a>
    	</li>
           <li>
           	<a href="Messages.php" > Messages</a>
           </li> 
           <li>
           	<a href="sell.php">SELL_an_ITEM</a>
           </li>
           <li>
           	<a href="products.php" class="active">Your-Products</a>
           </li>
    </ul>
	</nav>
        <container>
           
  <section style="padding-top:30px " >
     <?php 
     $q4="select product_type,product_id from product where seller_id='$user_id'";
     $result=$conn->query($q4);
     while($row1=$result->fetch_array())
     {
         $product_id=$row1['product_id'];
         $_SESSION['product_id']=$product_id;
                  if($row1['product_type']=='laptop')
                 {
                     $q2="select  date_of_initiation,date_of_expiry,manufacturer, model_name, year_of_purchase,battery_status, expected_price from product inner join laptop on product.product_id=laptop.product_id where product.product_id='$product_id'";
                     $mob=$conn->query($q2);
                    if($mob==false)
                                die("while retrieving laptop details".$conn->error);
    
                       while( $row=$mob->fetch_array())
                      {
       
                         echo "<table>";
                        echo "<tr>";
                           echo "<th>Manufacturer</th>" ;
                        echo "<th>Model Name</th>" ;
                        echo "<th>Date Of Initiation</th>" ;
                           echo "<th>Date Of Expiry</th>" ;
                          echo "<th>Year Of Purchase</th>" ;
                        echo "<th>Battery Status</th>" ;
                        
                         echo "<th>Expected Price</th>" ;
                         echo "</tr>";
     
     echo "<tr>";
      echo "<td>".$row['manufacturer']."</td>" ;
       echo "<td>".$row['model_name']."</td>" ;
        echo "<td>".$row['date_of_initiation']."</td>" ;
         echo "<td>".$row['date_of_expiry']."</td>" ;
          echo "<td>".$row['year_of_purchase']."</td>" ;
                     echo "<td>".$row['battery_status']."</td>" ;

           echo "<td>".$row['expected_price']."</td>" ;
                      echo "<td><form action='#' method='post'onsubmit='return confirm_delete()' ><input name='product_id' value=".$product_id."  style='display:none'><button type='submit' name='delete'>Remove</button></form></td>";
           
           echo "</tr>";

    
     
          echo "</table><br>";
                        }
                        
                        
                 }
                  if($row1['product_type']=='mobilephone')
                 {
                 
                        $q2="select date_of_initiation,date_of_expiry,manufacturer, model_name, year_of_purchase, expected_price from product inner join mobile_phone on product.product_id=mobile_phone.product_id where product.product_id='$product_id'";
     $mob=$conn->query($q2);
     if($mob==false)
         die("while retrieving mobile details".$conn->error);
    
     
       while( $row=$mob->fetch_array())
             {
                $_SESSION['product_id']=$product_id;

     echo "<table>";
     echo "<tr>";
      echo "<th>Manufacturer</th>" ;
       echo "<th>Model Name</th>" ;
        echo "<th>Date Of Initiation</th>" ;
         echo "<th>Date Of Expiry</th>" ;
          echo "<th>Year Of Purchase</th>" ;
           echo "<th>Expected Price</th>" ;
           echo "</tr>";
     
     echo "<tr>";
      echo "<td>".$row['manufacturer']."</td>" ;
       echo "<td>".$row['model_name']."</td>" ;
        echo "<td>".$row['date_of_initiation']."</td>" ;
         echo "<td>".$row['date_of_expiry']."</td>" ;
          echo "<td>".$row['year_of_purchase']."</td>" ;
           echo "<td>".$row['expected_price']."</td>" ;
                      echo "<td><form action='#' method='post'onsubmit='return confirm_delete()' ><input name='product_id' value=".$product_id."  style='display:none'><button type='submit' name='delete'>Remove</button></form></td>";

           echo "</tr>";

    
     
          echo "</table><br>";
               }
                 }
     
    
     
                       if($row1['product_type']=='book')
                       {
                           
                           $q1="select product.product_id,date_of_initiation,date_of_expiry,name,expected_price,cond from product inner join book on product.product_id=book.product_id where product.product_id='$product_id'";
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
                    $_SESSION['product_id']=$product_id;

     echo "<table>";
     echo "<tr>";
       echo "<th>BOOK Name</th>" ;
              echo "<th>Authors</th>" ;
              echo "<th>BOOK Condition</th>" ;
        echo "<th>Date Of Initiation</th>" ;
         echo "<th>Date Of Expiry</th>" ;
           echo "<th>Expected Price</th>" ;
           echo "</tr>";
     
     echo "<tr>";
       echo "<td>".$row['name']."</td>" ;
              echo "<td>".$str."</td>" ;
                      echo "<td>".$row['cond']."</td>" ;
        echo "<td>".$row['date_of_initiation']."</td>" ;
         echo "<td>".$row['date_of_expiry']."</td>" ;
           echo "<td>".$row['expected_price']."</td>" ;
                      echo "<td><form action='#' method='post' onsubmit='return confirm_delete()'><input name='product_id' value=".$product_id."  style='display:none'><button type='submit' name='delete'>Remove</button></form></td>";

           echo "</tr>";
          echo "</table><br>";
     }
     
                       }              
                           
                       }
     ?>
     
 </section>
           
</html>
<script>

function confirm_delete()
{
   return confirm('Are You Sure Of Deleting');
    
}
</script>