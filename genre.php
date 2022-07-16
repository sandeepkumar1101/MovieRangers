<?php
    
   
    

 if($_SERVER['REQUEST_METHOD']=='GET'){
    include 'management/_dbconnect.php';
    session_start();

}  
     
      // print_r($num);
   

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
  <title>MovieRangers</title>

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">

  <!--
    - google font link
  -->
  <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>

<body>

<?php
include 'parts/_header.php'
?>    
<section class="movies">
    
    <!--
      - filter bar
    -->
    <div class="filter-bar">
    
      <div class="filter-dropdowns">
    
        <span><?php
            $genre = $_GET['genre'];
            $genre = str_replace([']','[','"'],'',$genre);
           echo '<h2>'.$genre.'</h2>'; ?>
            </span>
    
      </div>
    
      <div class="filter-radios">
    
        <input type="radio" name="grade" id="featured" checked>
        <label for="featured">Featured</label>
    
        <input type="radio" name="grade" id="popular">
        <label for="popular">Popular</label>
    
        <input type="radio" name="grade" id="newest">
        <label for="newest">Newest</label>
    
        <div class="checked-radio-bg"></div>
    
      </div>
    
    </div>
    
    
    <!--
      - movies grid
    -->
    
    <div class="movies-grid">
    <?php 
         include 'management/_dbconnect.php';
         $genre = $_GET['genre'];
         // $genre = '["Action"]';
         $sql = "Select * from movie where JSON_CONTAINS(genre,'$genre') LIMIT 10";
         // print_r($sql);
         $result = mysqli_query($conn,$sql);
         $num = mysqli_num_rows($result);
         while($num != 0){
           $row = mysqli_fetch_assoc($result);
              //  print_r($row['image']);
              $image = explode(", ",$row['image']);
              $image = explode("'",$image[1]);
              $genre = preg_replace("/,/","/",$row['genre']);
              $genre = str_replace([']','[','"'],'',$genre);
             $num -=1;
      
      echo '<div class="movie-card">
    
        <div class="card-head">
          <img src="'.$image[1].'" alt="" class="card-img">
    
          <div class="card-overlay">
    
            <div class="bookmark">
               '.$row['runtime'].'min
            </div>
    
            <div class="rating">
              <ion-icon name="star-outline"></ion-icon>
              <span>'.$row['rating'].'</span>
            </div>
    
           <form action="list/index.php" method="GET">
             <button type="submit">
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
                 <input style="display:none;" value='.$row['movie_id'].' type="text" name="movieid" id="movieid">
              </button>
              </form>
    
          </div>
        </div>
    
        <div class="card-body">
        <form action="list/index.php" method="GET">
        <button type="submit">
          <h3 class="card-title">'.$row['title'].'</h3>
          <input style="display:none;" value='.$row['movie_id'].' type="text" name="movieid" id="movieid">
          </button>
          </form>
          <div class="card-info">
            <span class="genre">'.$genre.'</span>
            <span class="year">'.$row['year'].'</span>
          </div>
        </div>
    
      </div>';
      }
      ?>
    
    
    </div>
    
    <!--
      - load more button
    -->
    <button class="load-more">LOAD MORE</button>

</section>

  <!--
    - custom js link
  -->
  <script src="./assets/js/main.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>