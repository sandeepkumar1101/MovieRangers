<?php

include 'partials/_dbconnect.php';
$login = false;
$showError = false;

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "Select * from users where username='$username' AND password='$password' ";
    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $result_fetch = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    if($num==1){
    if($result_fetch['is_verified']==1){
       
      
           if(password_verify($password,$result_fetch['password'])){
              
               $login = true;
               $sql1 = "Select * from users where username='$username'";
               $result = mysqli_query($conn, $sql1);     
               $numb = mysqli_num_rows($result);
               if($numb==1){
                   session_start();
                   $_SESSION['loggedin'] = true ;
                   $_SESSION['username'] = $username;
                   $_SESSION['is_subcribed'] = 1;
                   header('location: ../index.php');
                }else{
                   $_SESSION['is_subcribed'] = 0;
                   header('location: ../index.php');
               }
           }else{
              
            $showError = "Invalid username or password";
           }
       
  
   }else{
    $showError = "User not verified";
   }
}
    else{
      $showError = "Incorrect username or password";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,500;0,900;1,100;1,300&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?php require 'partials/css.php' ?>
</head>
<body>
    
    <!-- navbar start -->
    <?php  require 'partials/_nav.php' ?>
   <!-- navbar end -->

   <?php  
        
        if ($login){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong> Your have been succesfully login!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
        if($showError){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error</strong> '.$showError.'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
     

    ?>

<div class="center">
         <h1>Login</h1>
         <form action='' method="POST">
             <div class="txt_field">
                 <input name='username' id='username' type="text" required>
                 <span></span>
                 <label> Username</label>
             </div>
             <div class="txt_field">
                <input id='password' name='password' type="password" required>
                <span></span>
                <label> Password</label>
            </div>
            <div class="pass">Forget Password?</div>
            <input style="background-color:light-grey;" type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="sigin.php">Signup</a>
            </div>
         </form>
     </div>
    
    <!-- <form action="" method="POST">
   <div id="all"> 
  
    <div class="row1">
          <p>Log In</p>
    </div>
    <div class="all1">
       
       <label for="email">Email</label>
        <input type="email" name="email" id="mail" value="email">
       <label for="password">Password</label>
        <input type="password" name="password" id="Password" value="password" >
        <div id="log">
            <button name="submit" id="butn" type="submit">Log In</button>
        </div>
         <div class="lhead">
            <span class="row3">Don't have an account? </span>
            <span class="row3"><a href="siginfinal.php">Register Here</a></span>
            </div>
   
    </div>
    </form>
</div>    -->
    


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  

</body>
</html>