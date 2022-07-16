<?php
  
  require("partials/_dbconnect.php");
  
  
  if (isset($_GET['email']) && isset($_GET['v_code'])){
      
    $query = "SELECT * FROM `users` where `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
    $result = mysqli_query($conn, $query);
    if($result){
       if(mysqli_num_rows($result)==1){
          $result_fetch = mysqli_fetch_assoc($result);
          if($result_fetch['is_verified']==0){
             $update = "UPDATE `users` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
             if(mysqli_query($conn,$update)){
                echo '
                <html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>Email Verification Successfull;<br/> You can <a href="https://movierangers.000webhostapp.com/auth/login.php">login now</a></p>
      </div>
    </body>
</html>'
 ; 
 
             }
          }
          else{
            echo "
            <script>
            alert('Email already verified');
            window.location.href = '../index.php';
            </script>
           ";
          }
       }
    }else{
        echo "
         <script>
         alert('Cannot run query');
          window.location.href = '../index.php';
         </script>
        ";
    }
  }



?>

