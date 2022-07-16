<?php
  
   
  $exists = 'none';
  $dexists = 'none';
  
  if($_SERVER['REQUEST_METHOD']=='POST'){
     include '_dbconnect.php';
     $username  = $_POST['username'];
     $password = $_POST['password'];

    if(!($username=="johncena" && $password=="johncena123.")){
          header('location: ../index.php');
    }
    
    $filename = 'uploads/movie_info.csv';
      $data = [];
      
      // open the file
      $f = fopen($filename, 'r');
      
      if ($f === false) {
          die('Cannot open the file ' . $filename);
      }
      
      // read each line in CSV file at a time
      $index=0;
      
      while (($row = fgetcsv($f)) !== false) {
              $index += 1;
              if($index==2){
                $movieid = $row[0];
                $title = $row[1];
                $kind = $row[2];
                if($kind=='tv series'){
                  $year = $row[4];
                  $genre = $row[5];
                  $plot = $row[6];
                  $runtime = $row[7];
                  $rating = $row[8];
                  $url = $row[9];
                  $image = $row[10];
                }
                else{
                  $year = $row[3];
                  $genre = $row[4];
                  $plot = $row[5];
                  $runtime = $row[6];
                  $rating = $row[7];
                  $url = $row[8];
                  $image = $row[9];
                }
                $genre = str_replace("''",'"',$genre);
                $sql = "Select movie_id from movie where movie_id=$movieid OR title='$title'";
            
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                  
                if($num==1){
                  $exists = 'true';
                }else{
                  $exists = 'false';
                }
                if($exists=='false'){
                $sql = "INSERT INTO movie(movie_id,title,year,genre,plot,runtime,rating,url,image) VALUES ($movieid,'$title',$year,'$genre','$plot',$runtime,$rating,'$url','$image')";
                // echo $sql;
               
                $result = mysqli_query($conn,$sql);
                }
                // echo $result;
              }
           
      }
      
      // close the file
      fclose($f);

      // getting urls d
      $filename = 'uploads/links.csv';
      $data = [];
      
      // open the file
      $f = fopen($filename, 'r');
      
      if ($f === false) {
          die('Cannot open the file ' . $filename);
      }
      
      // read each line in CSV file at a time
      $index=0;
      while (($row = fgetcsv($f)) !== false) {
          $index +=1 ;
          if($index!=1){
           $movieid = $row[0];
           $res = $row[1];
           $d_links = $row[2];
           // print_r($d_links);
           $d_links = str_replace('[','"[',$d_links);
           $d_links = str_replace(']',']"',$d_links);
           $d_links = str_replace("'","\'",$d_links);
           $d_links = str_replace('"','\"',$d_links);
          $sql = "SELECT movie_id from links where res='$res'";
          $result = mysqli_query($conn,$sql);
          $num = mysqli_num_rows($result);
          if($num==1){
              $dexists = 'true';
          }else{
              $dexists = 'false';
          }
          if($dexists=='false'){
            // $d_links = str_replace("'",'"',$d_links);
           $sql = "INSERT INTO links(movie_id,res,d_link) VALUES ('$movieid','$res','$d_links')";
        //    print_r($sql);
           $result = mysqli_query($conn,$sql);
           }
             
          }
          
         
      }
         
   // close the file
      fclose($f);  
   
          

   }
   
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Post Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
        
   body{
     margin: 0;
     padding: 0;
     background: linear-gradient(120deg,#2980b9, #8e44ad);
     height: 100vh;
     overflow: hidden;
   }
   body{
     background-color: rgb(185, 199, 211);
     background-image: url(https://coolbackgrounds.io/images/unsplash/josh-bean-medium-9501ba9f.jpg);
     background-size: cover;
     
     
     padding-bottom: 80px;
     height: 100vh;
     position: static;
     box-shadow: 1px 1px 50px rgb(162, 168, 199), 5em -0.9em 5.9em rgb(19, 179, 228), -5.8em 5.9em 05em rgb(144, 34, 158);;
     margin:0 0;
   }
   
   
   .center{
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
     width: 400px;
     background: rgba(0, 0, 0, 0.555);
     border-radius: 10px;
   }
   
   .center h1{
     margin: 20px 0;
     text-align: center;
     padding: 0 0 20px 0;
     border-bottom: 1px solid silver;
   }
   
   .center form{
     padding: 0 40px;
     box-sizing: border-box;
   }
   form .txt_field{
     position: relative;
     border-bottom: 2px solid #adadad;
     margin: 30px 0;
   }
   
   .txt_field input{
     width: 100%;
     padding: 0 5px;
     height: 40px;
     font-size: 16px;
     border: none;
     background: none;
     outline: none;
     color:aliceblue
   }
   
   .txt_field label{
     position: absolute;
     top: 50%;
     left: 5px;
     color: #adadad;
     transform: translateY(-50%);
     font-size: 16px;
     pointer-events: none;
     transition: .5s;
   }
   
   .txt_field span::before{
      content: '';
      position: absolute;
      top: 40px;
      left: 0;
      width:0%;
      height: 2px;
      background: #2691d9;
      transition: .5s;
   }
   
   .txt_field input:focus ~label,
   .txt_field input:valid ~label{
     top: -13px;
     color: #2691d9;
   }
   
   .txt_field input:focus ~span::before,
   .txt_field input:valid ~span::before{
     width: 100%;
   
   }
   
   .pass{
     margin: -5px 0 20px 5px;
     color: #a6a6a6;
     cursor: pointer;
   
   }
   
   .pass:hover{
     text-decoration: underline;
   }
   
   
   input[type="submit"]{
     width: 100%;
     height: 40px;
     border: 1px solid black;
     background: #00000075;
     border-radius: 25px;
     text-align: center;
     font-size: 18px;
     color: #e9f4fb; 
     font-weight: 700;
     cursor: pointer;
     outline: none;
   }
   
   input[type="submit"]:hover{
     border-color: #313536a2;
     background-color:black;
     transition: .5s;
   }
   
   .signup_link{
     margin: 30px 0;
     text-align: center;
     font-size: 16px;
     color: #666666;
   
   }
   
   .signup_link a{
     color: #2691d9;
     text-decoration: none;
   }
   
   .signup_link a:hover{
     text-decoration: underline;
   }
   
   @media screen and (max-width:700px) {
    
     .center{
       top: 60%;
       width:96vw;
     }
   }
</style>
</head>

  
<body>
  <?php
   
if ($exists=='true'){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error</strong> Movie already exists
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
  else if($exists=='false'){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> Movie added sucessfully
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  
        ?>
<div class="center">
         <h1>Movie Enter Info</h1>
         <form action='' method="POST">
             <div class="txt_field">
                 <input name='username' id='username' type="text" required>
                 <span></span>
                 <label> User Name</label>

             </div>
             <div class="txt_field">
             <input name='password' id='password' type="password" required>
                 <span></span>
                 <label>Password</label>

             </div>
             <!-- <div class="txt_field">
                <input id='download_url' name='download_url' type="text" required>
                <span></span>
                <label> Download url of the movie</label>
            </div> -->
    
            <input type="submit" value="ADD MOVIE">
            <div class="signup_link">
                Best place to add movies
            </div>
         </form>
     </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>