<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login/Registration Form Transition</title>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<iframe src="bg/index.html" frameborder="0" class="main-frame"></iframe>
  <h1 class="tip">OLX PORTAL</h1>
<div class="cont">
  <div class="form sign-in">
    <h2>Welcome back,</h2>
     <?php
session_start();

if(isset($_SESSION['$error_msg']))
{
    $_SESSION['$error_msg']=0;
    echo "<span style='color:red;text-align:center'>Check Your Details</span>";
}
?>
      <form action="log-reg.php" method="post">
    <label>
      <span>USER-ID</span>
      <input type="text" name="user_id">
    </label>
         
    <label>
      <span>Password</span>
      <input type="password" name="password">
    </label>
    <button type="submit" name="sign_in" class="submit">Sign In</button>
  </form>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover new items!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>
    <div class="form sign-up">
      <h2>Time to feel like home,</h2>
      <form method="post" action="log-reg.php">
      <label>
        <span>USER-ID</span>
        <input type="text" name="user_id">
      </label>
      <label>
        <span>NAME</span>
        <input type="text" name="user_name" >
      </label>
      <label>
        <span>EMAIL</span>
        <input type="email" name="email_id" >
      </label>
       <label>
        <span>PHONE NUMBER 1</span>
        <input type="text" name="phno_1" >
      </label>
      <label>
        <span>PHONE NUMBER 2</span>
        <input type="text" name="phno_2" >
      </label>
       <label>
        <span>USER TYPE</span>
        <input type="text" list="types" name="user_type" >
        <datalist id="types">
          <option value="student">
            <option value="faculty">
              <option value="staff">
        </datalist>
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password">
      </label>
      <button type="submit" name="sign_up" class="submit">Sign Up</button>
   </form>
    </div>
  </div>
</div>

  
  

    <script  src="js/index.js"></script>




</body>

</html>
