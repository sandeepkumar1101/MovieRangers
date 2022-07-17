<?php
$username = false;
session_start();

//  else if($_SESSION['is_subcribed']==0){
//      header('location: ../../../auth/login.php');
//      exit;
//  }

include 'management/_dbconnect.php';
$sql = "Select * from movie ORDER BY id LIMIT 10";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
while ($num != 0) {
  $row = mysqli_fetch_assoc($result);
  //  print_r($row['image']);
  $image = explode(", ", $row['image']);

  // echo $image[1];

  $num -= 1;
}

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
  <?php
  echo '<link rel="stylesheet" href="./assets/css/bright/main.css">
  <link rel="stylesheet" href="./assets/css/bright/media_query.css">';
  ?>
  <link rel="stylesheet" href="timeline/assets/style.css">
  <!--
    - google font link
  -->
  <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>
<script>
  function getinfo(e) {
    elem = e.innerHTML;
    if (elem == 'Featured') {
      element = document.getElementById(elem);
      element1 = document.getElementById('Newest');
      element2 = document.getElementById('Popular');

    } else if (elem == 'Popular') {
      element = document.getElementById(elem);
      element1 = document.getElementById('Featured');
      element2 = document.getElementById('Newest');
    } else {
      element = document.getElementById(elem);
      element1 = document.getElementById('Featured');
      element2 = document.getElementById('Popular');
    }
    if (element.style.display == 'none') {

      element.style.display = 'grid';
      element1.style.display = 'none';
      element2.style.display = 'none';
    } else if (element.style.display == 'grid') {
      element.style.display = 'none';
    }

  }
</script>

<body>




  <!--
    - main container
  -->
  <div class="container">

    <!--
      - #HEADER SECTION
    -->

    <?php include 'parts/_header.php'  ?>





    <!--
      - MAIN SECTION
    -->
    <main>

      <!--
        - #BANNER SECTION
      -->
      <section class="banner">
        <?php
        $sql = "Select * from movie ORDER BY RAND() LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        while ($num != 0) {
          $row = mysqli_fetch_assoc($result);
          //  print_r($row['image']);
          $image = explode(", ", $row['image']);
          $image = explode("'", $image[1]);
          $genre = preg_replace("/,/", "/", $row['genre']);
          $genre = str_replace([']', '[', '"'], '', $genre);
          $num -= 1;
          $imageWrapper = str_replace('285', '699', $image[1]);
          echo '<div style="background-image: url(' . $imageWrapper . '), linear-gradient(#1a1e204a, #50505075);
                            background-size: contain;
                            background-position: center;
                            margin:auto;
                            backdrop-filter: blur(7px) saturate(0.5) brightness(0.5);
                            background-repeat: no-repeat;" class="banner-card">
            
           <img style="height: 36vw; width: 0vw;border:none;" src="' . $image[1] . '">
           
          <div class="card-content">
            <div class="card-info">

              <div class="genre">
                <ion-icon name="film"></ion-icon>
                <span>' . $genre . '</span>
              </div>

              <div class="year">
                <ion-icon name="calendar"></ion-icon>
                <span>' . $row['year'] . '</span>
              </div>

              <div class="duration">
                <ion-icon name="time"></ion-icon>
                <span>' . $row['runtime'] . '</span>
              </div>

              <div class="quality">4K</div>

            </div>
            <form action="list/index.php" method="GET">
                <button type="submit">
                 <h3 class="card-title">' . $row['title'] . '</h3>
                 <input style="display:none;" value=' . $row['movie_id'] . ' type="text" name="movieid" id="movieid">
                 
                </button>
             </form>
          </div>

        </div>
         
      </section>';
        }
        ?>




        <!--
        - #MOVIES SECTION
      -->
        <section class="movies">

          <!--
          - filter bar
        -->
          <div class="filter-bar">

            <div class="filter-dropdowns">

              <select name="genre" id="genre" class="genre">
                <option value="all genres">All genres</option>
                <option value="action">Action</option>
                <option value="adventure">Adventure</option>
                <option value="animal">Animal</option>
                <option value="animation">Animation</option>
                <option value="biography">Biography</option>
              </select>

              <select name="year" class="year">
                <option value="all years">All the years</option>
                <option value="2022">2022</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2010-2019">2010-2019</option>
                <option value="2000-2009">2000-2009</option>
                <option value="1980-1999">1980-1999</option>
              </select>

            </div>

            <div class="filter-radios">

              <input type="radio" name="grade" id="featured" checked>
              <label onclick="getinfo(this)" for="featured">Featured</label>

              <input type="radio" name="grade" id="popular">
              <label onclick="getinfo(this)" for="popular">Popular</label>

              <input type="radio" name="grade" id="newest">
              <label onclick="getinfo(this)" for="newest">Newest</label>


              <div class="checked-radio-bg"></div>

            </div>

          </div>


          <!--
          - movies grid
        -->
          <!-- featured -->
          <div style="display:none;" id='Featured' class="movies-grid">
            <?php
            $sql = "Select * from movie ORDER BY id LIMIT 20";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            while ($num != 0) {
              $row = mysqli_fetch_assoc($result);
              //  print_r($row['image']);
              $image = explode(", ", $row['image']);
              $image = explode("'", $image[1]);
              $genre = preg_replace("/,/", "/", $row['genre']);
              $genre = str_replace([']', '[', '"'], '', $genre);
              $num -= 1;

              echo '<div class="movie-card">

            <div class="card-head">
          
            
              <div class="card-overlay">

                <div class="bookmark">
                   ' . $row['runtime'] . 'min
                </div>

                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>' . $row['rating'] . '</span>
                </div>
                
                  <form action="list/index.php" method="GET">
             <button type="submit">
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
                 <input style="display:none;" value=' . $row['movie_id'] . ' type="text" name="movieid" id="movieid">
              </button>
              </form>
              

              </div>
            </div>

            <div class="card-body">
            <form action="list/index.php" method="GET">
            <button type="submit">
              <h3 class="card-title">' . $row['title'] . '</h3>
              <input style="display:none;" value=' . $row['movie_id'] . ' type="text" name="movieid" id="movieid">
              </button>
              </form>
              <div class="card-info">
                <span class="genre">' . $genre . '</span>
                <span class="year">' . $row['year'] . '</span>
              </div>
            </div>

          </div>';
            }
            ?>


          </div>

          <!-- popular -->
          <div style="display:none;" id='Popular' class="movies-grid">
            <?php
            $sql = "Select * from movie ORDER BY -rating LIMIT 20";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            while ($num != 0) {
              $row = mysqli_fetch_assoc($result);
              //  print_r($row['image']);
              $image = explode(", ", $row['image']);
              $image = explode("'", $image[1]);
              $genre = preg_replace("/,/", "/", $row['genre']);
              $genre = str_replace([']', '[', '"'], '', $genre);
              $num -= 1;

              echo '<div class="movie-card">

            <div class="card-head">
              <img src="' . $image[1] . '" alt="" class="card-img">

              <div class="card-overlay">

                <div class="bookmark">
                   ' . $row['runtime'] . 'min
                </div>

                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>' . $row['rating'] . '</span>
                </div>
   <form action="list/index.php" method="GET">
             <button type="submit">
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
                 <input style="display:none;" value=' . $row['movie_id'] . ' type="text" name="movieid" id="movieid">
              </button>
              </form>

              </div>
            </div>

            <div class="card-body">
            <form action="list/index.php" method="GET">
            <button type="submit">
              <h3 class="card-title">' . $row['title'] . '</h3>
              <input style="display:none;" value=' . $row['movie_id'] . ' type="text" name="movieid" id="movieid">
              </button>
              </form>
              <div class="card-info">
                <span class="genre">' . $genre . '</span>
                <span class="year">' . $row['year'] . '</span>
              </div>
            </div>

          </div>';
            }
            ?>


          </div>

          <!-- newest -->
          <div id="Newest" class="movies-grid">
            <?php
            $sql = "Select * from movie ORDER BY -date_added LIMIT 20";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            while ($num != 0) {
              $row = mysqli_fetch_assoc($result);
              //  print_r($row['image']);
              $image = explode(", ", $row['image']);
              $image = explode("'", $image[1]);
              $genre = preg_replace("/,/", "/", $row['genre']);
              $genre = str_replace([']', '[', '"'], '', $genre);
              $num -= 1;

              echo '<div class="movie-card">

            <div class="card-head">
              <img src="' . $image[1] . '" alt="" class="card-img">

              <div class="card-overlay">

                <div class="bookmark">
                   ' . $row['runtime'] . 'min
                </div>

                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>' . $row['rating'] . '</span>
                </div>
             <form action="list/index.php" method="GET">
             <button type="submit">
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
                 <input style="display:none;" value=' . $row['movie_id'] . ' type="text" name="movieid" id="movieid">
              </button>
              </form>
              </div>
            </div>

            <div class="card-body">
            <form action="list/index.php" method="GET">
            <button type="submit">
              <h3 class="card-title">' . $row['title'] . '</h3>
              <input style="display:none;" value=' . $row['movie_id'] . ' type="text" name="movieid" id="movieid">
              </button>
              </form>
              <div class="card-info">
                <span class="genre">' . $genre . '</span>
                <span class="year">' . $row['year'] . '</span>
              </div>
            </div>

          </div>';
            }
            ?>


          </div>

          <!--
          - load more button
        -->

          <button class="load-more">Use Search For Particular Movie</button>

        </section>


        <!--
        - #CATEGORY SECTION
      -->
        <section class="category" id="category">

          <h2 class="section-heading">Category</h2>

          <div class="category-grid">
            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Action"]'>
                <div class="category-card">
                  <img src="./assets/images/action.jpg" alt="" class="card-img">
                  <div class="name">Action</div>
                  <div class="total">100</div>
                </div>
              </button>
            </form>

            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Comedy"]'>
                <div class="category-card">
                  <img src="./assets/images/comedy.jpg" alt="" class="card-img">
                  <div class="name">Comedy</div>
                  <div class="total">50</div>
                </div>
              </button>
            </form>

            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Thriller"]'>
                <div class="category-card">
                  <img src="./assets/images/thriller.webp" alt="" class="card-img">
                  <div class="name">Thriller</div>
                  <div class="total">20</div>
                </div>
              </button>
            </form>

            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Horror"]'>
                <div class="category-card">
                  <img src="./assets/images/horror.jpg" alt="" class="card-img">
                  <div class="name">Horror</div>
                  <div class="total">80</div>
                </div>
              </button>
            </form>

            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Adventure"]'>
                <div class="category-card">
                  <img src="./assets/images/adventure.jpg" alt="" class="card-img">
                  <div class="name">Adventure</div>
                  <div class="total">100</div>
                </div>
              </button>
            </form>

            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Animation"]'>
                <div class="category-card">
                  <img src="./assets/images/animated.jpg" alt="" class="card-img">
                  <div class="name">Animated</div>
                  <div class="total">50</div>
                </div>
              </button>
            </form>

            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Crime"]'>
                <div class="category-card">
                  <img src="./assets/images/crime.jpg" alt="" class="card-img">
                  <div class="name">Crime</div>
                  <div class="total">20</div>
                </div>
              </button>
            </form>

            <form action="genre.php" method="GET">
              <button type="submit">
                <input style="display:none;" type="text" name="genre" id="genre" value='["Sci-Fi"]'>
                <div class="category-card">
                  <img src="./assets/images/sci-fi.jpg" alt="" class="card-img">
                  <div class="name">SCI-FI</div>
                  <div class="total">80</div>
                </div>
              </button>
            </form>

          </div>

        </section>

        <!-- <section class="category" id="category">

        <h2 class="section-heading">Timeline</h2>
         // <?php

            //     include 'timeline/index.php';
            //   
            ?> 
     

      </section> -->





        <!--
        - #Watch List SECTION
      -->

        <?php
        include 'parts/_notice.php';
        ?>

    </main>




    <!--
      - FOOTER SECTION
    -->



  </div>
  <?php
  include 'parts/_footer.php';
  ?>



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