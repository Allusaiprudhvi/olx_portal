<html>
    
    
</html>
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
 

if(isset($_POST['sign_in']))
{
 $id=$_POST['user_id'];
 $pass=$_POST['password'];
$sql1="select * from user where user_id='$id'";
$res=$conn->query($sql1);
    $_SESSION['user_id']=$id;

if($res->num_rows==0)
{
    echo "USER DOES NOT EXIST";
    $_SESSION['$pass']=$pass;
    $_SESSION['$error_msg']=1;
    header("location:login-reg-form.php");
}
else
{
    echo "login successful";
        header("location:home.php");

}
}



if(isset($_POST['sign_up']))
{
    $user_id=$_POST['user_id'];
    $user_name=$_POST['user_name'];
    $email_id=$_POST['email_id'];
    $p1=$_POST['phno_1'];
    $p2=$_POST['phno_2'];
    $type=$_POST['user_type'];
    $password=$_POST['password'];
    
    $sql5="select * from user where user_id='$user_id'";
 $res1=$conn->query($sql5);
if($res1->num_rows==1)
{
    echo "USER ALREADY EXIST";
        header("location:login-reg-form.php");
    
}
    $sql2="insert into user values('$user_id','$email_id','$user_name','$type','$password')";
   
    $sql3="insert into user(user_id,number) values('$user_id','$p1')";
        $sql4="insert into user(user_id,number) values('$user_id','$p2')";
        
        if($conn->query($sql2))
            die($conn->error);
        if($conn->query($sql3))
            die($conn->error);
       if($conn->query($sql4))
           die($conn->error);
               header("location:login-reg-form.php");
               die();
}

 ?>