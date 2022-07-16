<?php

$alert = false;
$login = false;
$message = '';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    $alert = true;
    $message = "You have to ";
    
}
else if($_SESSION['is_subcribed']==0){
  $login = true;
  include '../auth/partials/_dbconnect.php';
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_SESSION['username'];
    
    $sql = "Select * from users where username='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num==1){
       $sql1 = "UPDATE `users` SET `is_subcribed` = '1' WHERE `users`.`username` = '$username'";
       $result = mysqli_query($conn, $sql1);
       $_SESSION['is_subcribed'] = true;
       header('location: ../free/getstarted.php');
           exit;
    }
    else{
      $message = "Invalid credencials";
    } 
 }
}else if($_SESSION['is_subcribed']==1){
    header('location: ../free/getstarted.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="payment.css">
    <title>Secure</title>
</head>
<body>
<?php
       include '../free/partials/_nav.php';
   ?>
<?php  
        
        if ($alert){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Please</strong> '.$message.'<a href = "login.php">Login</a> first.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }


    ?>
          <!-- final payement form -->
    <div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
        <form action='' method='POST'>
				<h2>Confirm Your Payment</h2>
				<input value="<?php  if(isset($_SESSION['username'])){echo $_SESSION['username']; } ?>" type="text" class="field" placeholder="Your Name">
				<input type="number" minlength required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" class="field" placeholder="Card-number">
				<input type="number" requiredpattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" class="field" placeholder="CVV">
        <div class="expiry">
                  <h3>Exp Date</h3>
                    <div class="date">
                        <select required name="months" id="months">
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
                          </select>
                          <select required name="years" id="years">
                            <option value="2020">2022</option>
                            <option value="2019">2023</option>
                            <option value="2018">2024</option>
                            <option value="2017">2025</option>
                            <option value="2016">2026</option>
                            <option value="2015">2027</option>
                          </select>
                    </div>
                </div>

				<button type='submit' class="bhai">Confirm</button>
			</div>
      </form>
		</div>
	</div>
    
      
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>






