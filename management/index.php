<?php
  session_start();
     if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header('location: auth/login.php');
        exit;
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="upload.php" method="POST" enctype="multipart/form-data">
           <input type="file" name="file1" id="">
           <input type="file" name="file2" id="">
           <button type="submit" name="submit">Upload File</button>
           
   </form>
</body>
</html>