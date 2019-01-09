<?php
session_start();
$servername="localhost";
$username="root";
$password="omshiridisai";
$database="online_portal";
$port=3300;

$conn=new mysqli($servername,$username,$password,$database,$port);
 $sql1="select max(product_id) as t from Product ";
    $res=$conn->query($sql1);
    $res=$res->fetch_array();
$product_id=$res['t']+1;
$in= date('Y-m-d');

$ex=date('Y-m-d', strtotime($in. ' + 10 days'));
$user_id=$_SESSION['user_id'];
if(isset($_POST['submit_laptop']))
{
    $manu=$_POST['manufacturer'];
    $status=$_POST['battery_status'];
    $model_name=$_POST['model_name'];
    $year=$_POST['year_of_purchase'];
   $type=$_POST["product_type"];
   $p=$_POST["expected_price"];
$sql2="insert into product(product_id,seller_id,date_of_initiation,date_of_expiry,product_type) values('$product_id','$user_id','$in','$ex','$type')";
$sql3="insert into Laptop(product_id,manufacturer, model_name, year_of_purchase, battery_status , expected_price)  values('$product_id','$manu','$model_name','$year','$status','$p')";
if($conn->query($sql2)==false)
   die($conn->error);
if($conn->query($sql3)==false)
    die($conn->error);

}

if(isset($_POST['submit_mobilephone']))
{
    $manu=$_POST['manufacturer'];
    $model_name=$_POST['model_name'];
    $year=$_POST['year_of_purchase'];
   $type=$_POST["product_type"];
   $p=$_POST["expected_price"];
$sql2="insert into product(product_id,seller_id,date_of_initiation,date_of_expiry,product_type) values('$product_id','$user_id','$in','$ex','$type')";
$sql3="insert into Mobile_Phone(product_id,manufacturer,model_name,year_of_purchase,expected_price)  values('$product_id','$manu','$model_name','$year','$p')";
if($conn->query($sql2)==false)
   die($conn->error);
if($conn->query($sql3)==false)
    die($conn->error);

}
if(isset($_POST['submit_book']))
{
    $a1=$_POST['author1'];
        $a2=$_POST['author2'];
    $a3=$_POST['author3'];
    $a4=$_POST['author4'];

    $book_name=$_POST['book_name'];
   $type=$_POST["product_type"];
   $p=$_POST["expected_price"];
   $cond=$_POST["book_condition"];
$sql2="insert into product(product_id,seller_id,date_of_initiation,date_of_expiry,product_type) values('$product_id','$user_id','$in','$ex','$type')";
$sql3="insert into Book(product_id ,name,expected_price,cond) values('$product_id','$book_name','$p','$cond')";
if($conn->query($sql2)==false)
   die($conn->error);
if($conn->query($sql3)==false)
    die($conn->error);
if($a1!='')
{
    $a=$conn->query("insert into author values('$product_id','$a1')");
if($a==false)
{
    die($conn->error);
}
    
}
    if($a2!='')
    $conn->query("insert into author values('$product_id','$a2')");
if($a3!='')
    $conn->query("insert into author values('$product_id','$a3')");
if($a4!='')
    $conn->query("insert into author values('$product_id','$a4')");
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
<header>
	<h1 style="text-align:center">OLX PORTAL</h1>
        <h1 style="text-align:right"><?=$_SESSION['user_name']?></h1>
        <p style="text-align:right" >  <a href="#" onclick="change_password()">Change Password</a></p>
</header>



	<nav>
    <ul>
    	<li>
    		<a href="home.php">HOME</a>
    	</li>
           <li>
           	<a href="Messages.php"> Messages</a>
           </li> 
           <li>
               <a href="sell.php" class="active">SELL_an_ITEM</a>
           </li>
           <li>
           	<a href="products.php">Your-Products</a>
           </li>
    </ul>
	</nav>

    <div>
    <ul >
        <li><a href="#" onclick="laptop_display()">Laptop</a></li>
            <li><a href="#" onclick="book_display()">Book</a></li>
        <li><a href="#" onclick="mobilephone_display()">MobilePhone</a></li>

    </ul>
         
    </div>
     
    <section id="laptop">
    <form action="#" method="post" >
        <h1>Enter Your Laptop Details </h1>
       
        <label>
            <span>Manufacturer</span><br>
        <input type="text" name="manufacturer"  placeholder="enter manufacturer name">
        </label><br><br>
        <label>
            <span>Model Name</span><br>
        <input type="text" name="model_name"  placeholder="enter model name name">
        </label><br><br>
         <label>
            <span>Year Of Purchase</span><br>
        <input type="text" name="year_of_purchase"  placeholder="enter year of purchase">
        </label><br><br>
         <label>
            <span>Battery Status</span><br>
        <input type="text" name="battery_status" list="type" placeholder="enter  battery status">
        <datalist id="type"><option value="back up">
        <option value="no back up">
        </datalist>
            </label><br><br>
             <label>
            <span>Expected Price</span><br>
        <input type="text" name="expected_price"  placeholder="enter expected price">
        </label><br><br>
         <label>
            <span>Product Type</span><br><br>
        <input type="text" name="product_type" value="laptop" readonly >
        </label><br>
        <button type="submit" name="submit_laptop">Register</button><br>
        
        
    </form>
</section>
     <section id="mobilephone">
    <form action="#" method="post" >
        <h1>Enter Your Mobile Phone Details </h1>
       
        <label>
            <span>Manufacturer</span><br>
        <input type="text" name="manufacturer"  placeholder="enter manufacturer name">
        </label><br><br>
        <label>
            <span>Model Name</span><br>
        <input type="text" name="model_name"  placeholder="enter model nam">
        </label><br><br>
         <label>
            <span>Year Of Purchase</span><br>
        <input type="text" name="year_of_purchase"  placeholder="enter year of purchase">
        </label><br><br>
         <label>
           
             <label>
            <span>Expected Price</span><br>
        <input type="text" name="expected_price"  placeholder="enter expected price">
        </label><br><br>
         <label>
            <span>Product Type</span><br>
        <input type="text" name="product_type" value="mobilephone" readonly >
        </label><br><br>
        <button type="submit" name="submit_mobilephone">Register</button><br>
        
        
    </form>
</section>
     <section id="book">
    <form action="#" method="post" >
        <h1>Enter Your Book Details </h1>
       
         <span>Name of Authors</span> <br>
        <input type="text" name="author1"  placeholder="author 1"><br>
        
        
     
        <input type="text" name="author2"  placeholder="author 2"><br>
        
        
        <input type="text" name="author3"  placeholder="author 3"><br>
        
        
        <input type="text" name="author4"  placeholder="author 4"><br><br>
       
                    <span>Name Of The Book</span><br>

        <input type="text" name="book_name"  placeholder="enter book name"><br>
        
       <br> <span>Book Condition</span><br>
        <input type="text" name="book_condition" list="types" placeholder="enter condition of book"><br>
        <datalist id="types">
            <option value="good">
            <option value="average">
            <option value="bad">

        </datalist>
        <br><span>Expected Price</span><br>
        <input type="text" name="expected_price"  placeholder="enter expected price"><br>
      
      <br>  <span>Product Type</span><br>
        <input type="text" name="product_type" value="book" readonly ><br>
        
        <button type="submit" name="submit_book">Register</button><br>
        
        
    </form>
</section>
    
	</body>
</html>

<script>
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
        
      function check_authors(that)
      {
          if(that.value=="1")
          {
              document.getElementById("1").style.display="block";
                         document.getElementById("2").style.display="none";
              document.getElementById("3").style.display="none";
              document.getElementById("4").style.display="none";

        }
        if(that.value=="2")
        {
          document.getElementById("2").style.display="block";
                         document.getElementById("1").style.display="none";
              document.getElementById("3").style.display="none";
              document.getElementById("4").style.display="none";
          }
        if(that.value=="3")
        {
               document.getElementById("3").style.display="block";
                         document.getElementById("2").style.display="none";
              document.getElementById("1").style.display="none";
              document.getElementById("4").style.display="none";
          }
           if(that.value="4"){
              document.getElementById("4").style.display="block";
         document.getElementById("1").style.display="block";
                         document.getElementById("2").style.display="none";
              document.getElementById("3").style.display="none";
              document.getElementById("4").style.display="none";  
        }
        }
        
    </script>