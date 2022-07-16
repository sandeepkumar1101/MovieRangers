<?php

  if(isset($_POST['submit'])){
      $file1 = $_FILES['file1'];
      $file2 = $_FILES['file2'];

      $filename = $_FILES['file1']['name'];
      $file1TmpName = $_FILES['file1']['tmp_name'];
      $file2TmpName = $_FILES['file2']['tmp_name'];
      $fileSize = $_FILES['file1']['size'];
      $fileError = $_FILES['file1']['error'];
      $fileType = $_FILES['file1']['type'];

      $fileExt = explode('.',$filename);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('csv');

      if(in_array($fileActualExt, $allowed)){
           if($fileError === 0){
                 if($fileSize < 10000){
                       
                    $file1NameNew = 'movie_info.csv';
                    $file2NameNew = 'links.csv';
                    $file1Destination = 'uploads/'.$file1NameNew;
                    $file2Destination = 'uploads/'.$file2NameNew;
                    move_uploaded_file($file1TmpName,$file1Destination);
                    move_uploaded_file($file2TmpName,$file2Destination);
                    header('Location: index.php?uploadsuccess');

                 }else{
                     echo "your file is to big";
                 }
           }else{
               echo "there wa an error uploading youor file";
           }
      }
      else{
          echo "You cannot upload files of this type!";

      }


  }


?>