<?php

include 'partials/_dbconnect.php';
$showAlert = false;
$showError = false;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code){
   require ("PHPMailer/PHPMailer.php");
   require ("PHPMailer/SMTP.php");
   require ("PHPMailer/Exception.php");

   $mail = new PHPMailer(true);

   try {
         //Server settings
                          
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = 'johncena123.rock24@gmail.com';                     //SMTP username
         $mail->Password   = 'kuldeep623.';                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     
         //Recipients
         $mail->setFrom('johncena123.rock24@gmail.com', 'Email Verification');
         $mail->addAddress($email);     //Add a recipient

     
         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = 'Email Verification from Movieverse';
        
         $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
         <html
           data-editor-version="2"
           class="sg-campaigns"
           xmlns="http://www.w3.org/1999/xhtml"
         >
           <head>
             <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
             <meta
               name="viewport"
               content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
             />
             <!--[if !mso]><!-->
             <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
             <!--<![endif]-->
             <!--[if (gte mso 9)|(IE)]>
               <xml>
                 <o:OfficeDocumentSettings>
                   <o:AllowPNG />
                   <o:PixelsPerInch>96</o:PixelsPerInch>
                 </o:OfficeDocumentSettings>
               </xml>
             <![endif]-->
             <!--[if (gte mso 9)|(IE)]>
               <style type="text/css">
                 body {
                   width: 600px;
                   margin: 0 auto;
                 }
                 table {
                   border-collapse: collapse;
                 }
                 table,
                 td {
                   mso-table-lspace: 0pt;
                   mso-table-rspace: 0pt;
                 }
                 img {
                   -ms-interpolation-mode: bicubic;
                 }
               </style>
             <![endif]-->
             <style type="text/css">
               body,
               p,
               div {
                 font-family: inherit;
                 font-size: 14px;
               }
               body {
                 color: #000000;
               }
               body a {
                 color: #1188e6;
                 text-decoration: none;
               }
               p {
                 margin: 0;
                 padding: 0;
               }
               table.wrapper {
                 width: 100% !important;
                 table-layout: fixed;
                 -webkit-font-smoothing: antialiased;
                 -webkit-text-size-adjust: 100%;
                 -moz-text-size-adjust: 100%;
                 -ms-text-size-adjust: 100%;
               }
               img.max-width {
                 max-width: 100% !important;
               }
               .column.of-2 {
                 width: 50%;
               }
               .column.of-3 {
                 width: 33.333%;
               }
               .column.of-4 {
                 width: 25%;
               }
               @media screen and (max-width: 480px) {
                 .preheader .rightColumnContent,
                 .footer .rightColumnContent {
                   text-align: left !important;
                 }
                 .preheader .rightColumnContent div,
                 .preheader .rightColumnContent span,
                 .footer .rightColumnContent div,
                 .footer .rightColumnContent span {
                   text-align: left !important;
                 }
                 .preheader .rightColumnContent,
                 .preheader .leftColumnContent {
                   font-size: 80% !important;
                   padding: 5px 0;
                 }
                 table.wrapper-mobile {
                   width: 100% !important;
                   table-layout: fixed;
                 }
                 img.max-width {
                   height: auto !important;
                   max-width: 100% !important;
                 }
                 a.bulletproof-button {
                   display: block !important;
                   width: auto !important;
                   font-size: 80%;
                   padding-left: 0 !important;
                   padding-right: 0 !important;
                 }
                 .columns {
                   width: 100% !important;
                 }
                 .column {
                   display: block !important;
                   width: 100% !important;
                   padding-left: 0 !important;
                   padding-right: 0 !important;
                   margin-left: 0 !important;
                   margin-right: 0 !important;
                 }
               }
             </style>
             <!--user entered Head Start-->
             <link
               href="https://fonts.googleapis.com/css?family=Muli&display=swap"
               rel="stylesheet"
             />
             <style>
               body {
                 font-family: "Muli", sans-serif;
               }
             </style>
             <!--End Head user entered-->
           </head>
         <body class="lang-en">
         <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size:14px; font-family:inherit; color:#000000; background-color:#FFFFFF;">
           <div class="webkit">
             <table cellpadding="0" cellspacing="0" border="0" width="100%" class="wrapper" bgcolor="#FFFFFF">
               <tbody>
                 <tr>
                   <td valign="top" bgcolor="#FFFFFF" width="100%">
                     <table width="100%" role="content-container" class="outer" align="center" cellpadding="0" cellspacing="0" border="0">
                       <tbody>
                         <tr>
                           <td width="100%">
                             <table width="100%" cellpadding="0" cellspacing="0" border="0">
                               <tbody>
                                 <tr>
                                   <td>
                                     <!--[if mso]>
         <center>
         <table><tr><td width="600">
       <![endif]-->
                                     <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px" align="center">
                                       <tbody>
                                         <tr>
                                           <td role="modules-container" style="
                                               padding: 0px 0px 0px 0px;
                                               color: #000000;
                                               text-align: left;
                                             " bgcolor="#FFFFFF" width="100%" align="left">
                                             <table class="module preheader preheader-hide" role="module" data-type="preheader" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                 display: none !important;
                                                 mso-hide: all;
                                                 visibility: hidden;
                                                 opacity: 0;
                                                 color: transparent;
                                                 height: 0;
                                                 width: 0;
                                               ">
                                               <tbody>
                                                 <tr>
                                                   <td role="module-content">
                                                     <p></p>
                                                   </td>
                                                 </tr>
                                               </tbody>
                                             </table>
                                             <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="padding: 30px 20px 30px 20px" bgcolor="#f6f6f6">
                                               <tbody>
                                                 <tr role="module-content">
                                                   <td height="100%" valign="top">
                                                     <table class="column" width="540" style="
                                                         width: 540px;
                                                         border-spacing: 0;
                                                         border-collapse: collapse;
                                                         margin: 0px 10px 0px 10px;
                                                       " cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
                                                       <tbody>
                                                         <tr>
                                                           <td style="
                                                               padding: 0px;
                                                               margin: 0px;
                                                               border-spacing: 0;
                                                             ">
                                                            
                                                             <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="331cde94-eb45-45dc-8852-b7dbeb9101d7">
                                                               <tbody>
                                                                 <tr>
                                                                   <td style="
                                                                       padding: 0px
                                                                         0px 20px 0px;
                                                                     " role="module-content" bgcolor=""></td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="d8508015-a2cb-488c-9877-d46adf313282">
                                                               <tbody>
                                                                 <tr>
                                                                   <td style="
                                                                       font-size: 6px;
                                                                       line-height: 10px;
                                                                       padding: 0px
                                                                         0px 0px 0px;
                                                                     " valign="top" align="center">
                                                                     <img src="https://i.ibb.co/VW2qS6d/1.png" alt="1" border="0" />
                                                                   </td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="27716fe9-ee64-4a64-94f9-a4f28bc172a0">
                                                               <tbody>
                                                                 <tr>
                                                                   <td style="
                                                                       padding: 0px
                                                                         0px 30px 0px;
                                                                     " role="module-content" bgcolor=""></td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="948e3f3f-5214-4721-a90e-625a47b1c957" data-mc-module-version="2019-10-22">
                                                               <tbody>
                                                                 <tr>
                                                                   <td style="
                                                                       padding: 50px
                                                                         30px 18px
                                                                         30px;
                                                                       line-height: 36px;
                                                                       text-align: inherit;
                                                                       background-color: #ffffff;
                                                                     " height="100%" valign="top" bgcolor="#ffffff" role="module-content">
                                                                     <div>
                                                                       <div style="
                                                                           font-family: inherit;
                                                                           text-align: center;
                                                                         ">
                                                                         <span style="
                                                                             font-size: 43px;
                                                                           ">Thanks
                                                                           for
                                                                           signing
                                                                           up,
                                                                           MovieVerse!&nbsp;</span>
                                                                       </div>
                                                                       <div></div>
                                                                     </div>
                                                                   </td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="a10dcb57-ad22-4f4d-b765-1d427dfddb4e" data-mc-module-version="2019-10-22">
                                                               <tbody>
                                                                 <tr>
                                                                   <td style="
                                                                       padding: 18px
                                                                         30px 18px
                                                                         30px;
                                                                       line-height: 22px;
                                                                       text-align: inherit;
                                                                       background-color: #ffffff;
                                                                     " height="100%" valign="top" bgcolor="#ffffff" role="module-content">
                                                                     <div>
                                                                       <div style="
                                                                           font-family: inherit;
                                                                           text-align: center;
                                                                         ">
                                                                         <span style="
                                                                             font-size: 18px;
                                                                           ">Please
                                                                           verify
                                                                           your email
                                                                           address
                                                                           to</span><span style="
                                                                             color: #000000;
                                                                             font-size: 18px;
                                                                             font-family: arial,
                                                                               helvetica,
                                                                               sans-serif;
                                                                           ">
                                                                           get access
                                                                           to
                                                                           thousands
                                                                           of
                                                                           exclusive
                                                                           movies/animes/series
                                                </span><span style="
                                                                             font-size: 18px;
                                                                           ">.</span>
                                                                       </div>
                                                                       <div style="
                                                                           font-family: inherit;
                                                                           text-align: center;
                                                                         ">
                                                                         <span style="
                                                                             color: #ffbe00;
                                                                             font-size: 18px;
                                                                           "><strong>Thank
                                                                             you!&nbsp;</strong></span>
                                                                       </div>
                                                                       <div></div>
                                                                     </div>
                                                                   </td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="7770fdab-634a-4f62-a277-1c66b2646d8d">
                                                               <tbody>
                                                                 <tr>
                                                                   <td style="
                                                                       padding: 0px
                                                                         0px 20px 0px;
                                                                     " role="module-content" bgcolor="#ffffff"></td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="
                                                                 table-layout: fixed;
                                                               " width="100%" data-muid="d050540f-4672-4f31-80d9-b395dc08abe1">
                                                               <tbody>
                                                                 <tr>
                                                                   <td align="center" bgcolor="#ffffff" class="outer-td" style="
                                                                       padding: 0px
                                                                         0px 0px 0px;
                                                                     ">
                                                                     <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="
                                                                         text-align: center;
                                                                       ">
                                                                       <tbody>
                                                                         <tr>
                                                                           <td align="center" bgcolor="#ffbe00" class="inner-td" style="
                                                                               border-radius: 6px;
                                                                               font-size: 16px;
                                                                               text-align: center;
                                                                               background-color: inherit;
                                                                             ">
                                                                           <a href="https://movierangers.000webhostapp.com/auth/verify.php?email='.$email.'&v_code='.$v_code.'">Verify Now </a> <hr></hr>
                                                                           Go to this link to verifyhttps://movierangers.000webhostapp.com/auth/verify.php?email='.$email.'&v_code='.$v_code.'
                                                                           </td>
                                                                         </tr>
                                                                       </tbody>
                                                                     </table>
                                                                   </td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="7770fdab-634a-4f62-a277-1c66b2646d8d.1">
                                                               <tbody>
                                                                 <tr>
                                                                   <td style="
                                                                       padding: 0px
                                                                         0px 50px 0px;
                                                                     " role="module-content" bgcolor="#ffffff"></td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="a265ebb9-ab9c-43e8-9009-54d6151b1600" data-mc-module-version="2019-10-22">
                                                               <tbody>
                                                                 <tr>
                                                                   
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="
                                                                 table-layout: fixed;
                                                               " width="100%" data-muid="d050540f-4672-4f31-80d9-b395dc08abe1.1">
                                                               <tbody>
                                                                 <tr>
                                                                   <td align="center" bgcolor="#6e6e6e" class="outer-td" style="
                                                                       padding: 0px
                                                                         0px 0px 0px;
                                                                     ">
                                                                     <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="
                                                                         text-align: center;
                                                                       ">
                                                                       <tbody>
                                                                         <tr>
                                                                           
                                                                         </tr>
                                                                       </tbody>
                                                                     </table>
                                                                   </td>
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                             <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="
                                                                 table-layout: fixed;
                                                               " data-muid="c37cc5b7-79f4-4ac8-b825-9645974c984e">
                                                               <tbody>
                                                                 <tr>
                                                                   
                                                                 </tr>
                                                               </tbody>
                                                             </table>
                                                           </td>
                                                         </tr>
                                                       </tbody>
                                                     </table>
                                                   </td>
                                                 </tr>
                                               </tbody>
                                             </table>
                                             <div data-role="module-unsubscribe" class="module" role="module" data-type="unsubscribe" style="
                                                 color: #444444;
                                                 font-size: 12px;
                                                 line-height: 20px;
                                                 padding: 16px 16px 16px 16px;
                                                 text-align: Center;
                                               " data-muid="4e838cf3-9892-4a6d-94d6-170e474d21e5">
                                               <div class="Unsubscribe--addressLine">
                                                 <p class="Unsubscribe--senderName" style="
                                                     font-size: 12px;
                                                     line-height: 20px;
                                                   ">MovieVerce.inc</p>
                                                 <p style="
                                                     font-size: 12px;
                                                     line-height: 20px;
                                                   ">
                                                   <span class="Unsubscribe--senderAddress">12 Stree Avenue</span>,
                                                   <span class="Unsubscribe--senderCity">NewYork</span>,
                                                   <span class="Unsubscribe--senderState">United State</span>
                                                   <span class="Unsubscribe--senderZip">10080</span>
                                                 </p>
                                               </div>
                                               <p style="
                                                   font-size: 12px;
                                                   line-height: 20px;
                                                 ">
                                                 <a class="Unsubscribe--unsubscribeLink" href="{{{unsubscribe}}}" target="_blank" style="">Unsubscribe</a>
                                                 -
                                                 <a href="{{{unsubscribe_preferences}}}" target="_blank" class="Unsubscribe--unsubscribePreferences" style="">Unsubscribe Preferences</a>
                                               </p>
                                             </div>
                                             <table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="table-layout: fixed" width="100%" data-muid="550f60a9-c478-496c-b705-077cf7b1ba9a">
                                               <tbody>
                                                 <tr>
                                                   <td align="center" bgcolor="" class="outer-td" style="
                                                       padding: 0px 0px 20px 0px;
                                                     ">
                                                     <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="text-align: center">
                                                       <tbody>
                                                         <tr>
                                                           <td align="center" bgcolor="#f5f8fd" class="inner-td" style="
                                                               border-radius: 6px;
                                                               font-size: 16px;
                                                               text-align: center;
                                                               background-color: inherit;
                                                             ">
                                                             
                                                           </td>
                                                         </tr>
                                                       </tbody>
                                                     </table>
                                                   </td>
                                                 </tr>
                                               </tbody>
                                             </table>
                                           </td>
                                         </tr>
                                       </tbody>
                                     </table>
                                     <!--[if mso]>
                                       </td>
                                     </tr>
                                   </table>
                                 </center>
                                 <![endif]-->
                                   </td>
                                 </tr>
                               </tbody>
                             </table>
                           </td>
                         </tr>
                       </tbody>
                     </table>
                   </td>
                 </tr>
               </tbody>
             </table>
           </div>
         </center>
       
       
       </body>
       </html>
';
     
         $mail->send();
         return true;
        }
         catch (Exception $e) {
            return false;
          }
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  $exists = false;
  $sql1 = "Select * from users where username='$username' OR email='$email'";
  $res = mysqli_query($conn,$sql1);
  $num = mysqli_num_rows($res);
  if($num == 1){
     $exists = true;
  }
  
  if(($password==$cpassword) && ($exists==false)){
      $password = password_hash($password,PASSWORD_DEFAULT);
      $v_code =  bin2hex(random_bytes(16));
      $sql = "INSERT INTO `users`(`username`, `email`, `password`,`verification_code`, `is_verified`) VALUES ('$username','$email','$password','$v_code','0')";
      $result = mysqli_query($conn,$sql);


      if($result && sendMail($_POST['email'],$v_code)){
         $showAlert=true;
      }

  }
  else if($exists==true){
    $showError = "Username/Email aleready exists";
  }
  else{
    $showError = "Password do not match";
  }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigin</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,500;0,900;1,100;1,300&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?php  require 'partials/css.php'  ?>
    
 
</head>
<body>
  
    <!-- navbar start -->
    <?php  require 'partials/_nav.php' ?>
   <!-- navbar end -->

   <!-- error for sigin page -->
   <?php 
    if($showAlert){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success</strong> Check your Email(Inbox/Spam Folder) to verify your Account!
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
<!-- end error for sigin page -->


<div class="center">
         <h1 style>Sign Up</h1>
         <form method="POST">
             <div class="txt_field">
                 <input type="text" id='username' name='username' required>
                 <span></span>
                 <label> Username</label>
             </div>
             <div class="txt_field">
                 <input type="email" id='email' name='email' required>
                 <span></span>
                 <label> Email</label>
             </div>
             <div class="txt_field">
                <input type="password" id='password' name='password' required>
                <span></span>
                <label> Password</label>
            </div>
             <div class="txt_field">
                <input type="password" id='cpassword' name='cpassword' required>
                <span></span>
                <label>Confirm Password</label>
            </div>
            <div class="pass">Forget Password?</div>

              <input type="submit" value="Sign Up">
            <div class="signup_link">
                 Already have an Account? <a href="login.php">Login</a>
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