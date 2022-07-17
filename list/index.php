<?php
session_start();
// $username = $_SESSION["username"];
// $username = 'sandeep';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $movieid = $_GET['movieid'];
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Anime Template">
  <meta name="keywords" content="Anime, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MovieRangers</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->

  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="css/plyr.css" type="text/css">
  <link rel="stylesheet" href="css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">

  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/media_query.css">
  <style>
    .wp-block-buttons {
      margin-top: 48px;
      margin-bottom: 48px;

      text-align: center;
    }

    .wp-block-buttons {
      display: flex;
      justify-content: center;


    }

    .wp-block-button__link {
      height: 40px;


      border-radius: 2px;
      font-size: 12px;
      text-transform: uppercase;
      line-height: 1;
      padding: 14px 20px;
      font-weight: 700;
      -webkit-box-shadow: 0 3px 5px 0 rgba(0, 0, 0, .1), inset 0 0 0 transparent;
      box-shadow: 0 3px 5px rgba(0, 0, 0, .1), inset 0 0 transparent;
      transition: all .2s ease-in-out;
      font-family: cursive;

    }

    .has-text-align-center {
      text-align: center;
    }

    :root .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: linear-gradient(135deg, #0693e3, #9b51e0);
      box-shadow: -18px 6px 19px black;
    }

    .center {
      display: flex;
      justify-content: center;
      text-align: center;
      flex-direction: inherit;
      background: #f5f5f5;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 3px -1px 98px 11px black;
      border-top: 50px solid #33bde6;
    }

    .navbar {
      height: 50px;
    }
  </style>
</head>


<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>


  <?php include '../parts/_header.php'  ?>

  <!-- Header End -->



  <!-- Blog Details Section Begin -->
  <?php
  include '../management/_dbconnect.php';
  $sql = "Select * from  movie where movie_id='$movieid'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $image = explode(", ", $row['image']);
  $image = explode("'", $image[2]);

  $genre = preg_replace("/,/", " ", $row['genre']);
  $genre = str_replace([']', '[', '"'], '', $genre);
  $trailer = str_replace(' ', '//', $row['trailer']);
  $row['trailer'] = str_replace(' ', '/', $row['trailer']);
  $movieid = $row['movie_id'];
  $sql = "Select * from links where movie_id='$movieid'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);


  echo '<section style="background: white;"  class="blog-details spad">
               <div class="container">
                   <div class="row d-flex justify-content-center">
                     <div style = "background:url(' . $image[1] . ');" class="cover">
                          <div style="    background-image: url(' . $image[1] . '), linear-gradient(#1a1e204a, #50505075);
                            background-size: contain;
                            background-position: center;
                            margin:auto;
                            backdrop-filter: blur(7px) saturate(0.5) brightness(0.5);
                            background-repeat: no-repeat;" class="col-lg-8">
                             
                               <img style="height: 36vw; width: 0vw;border:none;"  src="' . $image[1] . '">
                          </div>
                      </div>
                       <div class="col-lg-8">
                         
                           <div class="blog__details__title">
                           <h2>' . $row['title'] . '</h2>
                             <div class="banner-card">
                             <iframe width="100%" height="99%" src="' . $trailer . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                              </div>
                           <h6 style="margin-top:50px;">' . $genre . ' <span>- ' . $row['year'] . '</span></h6>
                           </div>
                           <h6><span>Runtime-' . $row['runtime'] . 'm</span></h6>
                       </div>
                       <div class="col-lg-8">
                            <div style="margin-top:20px;" class="blog__details__content">
                             
                                 <div class="blog__details__text">
                                     <p>' . $row['plot'] . '</p>
                                 </div>
  
                                 <div class="blog__details__tags">
                                     <a href="#">' . $genre . '</a>
                                 </div>

                            </div>
                       </div>    
                     </div>';

  if ($num == 0) {
    echo '<p style="color:white;" class="has-text-align-center"><strong>This Movie is not Avaible for Stream</strong> </strong></p>';
  }
  echo '<div style="display:flow-root;padding:90px;" class="center">';
  while ($num != 0) {
    $num -= 1;
    $d = mysqli_fetch_assoc($result);

    $data = $d['d_link'];
    $data = explode(" ", $data);

    echo ' <div class="col-lg-8">
                         <p style="color:black;" class="has-text-align-center"><strong>' . $d['res'] . '</strong> </strong></p>
                         
                          ';
    echo '<div class="movies-grid">';
    foreach ($data as $id => $link) {

      $link = str_replace('"', "'", $link);
      $link = str_replace("'", "", $link);
      $link = str_replace("[", "", $link);
      $link = str_replace(",", "", $link);
      if ($link != ']') {


        $sitename =   explode('/', $link);
        // print_r($sitename);
        echo ' <div style="display:flex;justify-content:center;" class="wp-block-button"><a style="width:240px;margin:10px 0;" class="wp-block-button__link has-vivid-cyan-blue-to-vivid-purple-gradient-background has-background" <a="" href="' . $link . '" rel="nofollow external" target="_blank">' . $sitename[2] . '</a></div>
                                 ';
      }
    }
    echo '</div>';
  }
  ?>

  </div>
  </div>
  <!-- <div style="padding:20px;" class="col-lg-8"> -->
  <!--- Facebook icons-->
  <!-- <div style="display:flex; " class="blog__details__social">
      <a href="#" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a>
      <a href="#" class="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
      <a href="#" class="linkedin"><i class="fa fa-linkedin-square"></i> Linkedin</a>
      <a href="#" class="twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
    </div> -->
  <!---end Facebook icons-->
  <!-- </div> -->
  </div>
  </section>

  <!--
          - FOOTER SECTION
        -->
  <?php include '../parts/_footer.php'  ?>

  <!-- <footer>

    <div class="footer-content">

      <div class="footer-brand">
        <span>Recomdation</span>
        <p class="slogan">Movies & TV Shows, Online cinema,
          .</p>


        <div class="social-link">

          <a href="#">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
          <a href="#">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
          <a href="#">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
          <a href="#">
            <ion-icon name="logo-tiktok"></ion-icon>
          </a>
          <a href="#">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>

        </div>
      </div>


      <div class="footer-links">
        <ul>

          <h4 class="link-heading">Recomdation</h4>

          <li class="link-item"><a href="#">About us</a></li>
          <li class="link-item"><a href="#">My profile</a></li>
          <li class="link-item"><a href="#">Pricing plans</a></li>
          <li class="link-item"><a href="#">Contacts</a></li>

        </ul>

        <ul>

          <h4 class="link-heading">Browse</h4>

          <li class="link-item"><a href="#">Live Tv</a></li>
          <li class="link-item"><a href="#">Live News</a></li>
          <li class="link-item"><a href="#">Live Sports</a></li>
          <li class="link-item"><a href="#">Streaming Library</a></li>

        </ul>

        <ul>

          <li class="link-item"><a href="#">TV Shows</a></li>
          <li class="link-item"><a href="#">Movies</a></li>
          <li class="link-item"><a href="#">Kids</a></li>
          <li class="link-item"><a href="#">Collections</a></li>

        </ul>

        <ul>

          <h4 class="link-heading">Help</h4>

          <li class="link-item"><a href="#">Account & Billing</a></li>
          <li class="link-item"><a href="#">Plans & Pricing</a></li>
          <li class="link-item"><a href="#">Supported devices</a></li>
          <li class="link-item"><a href="#">Accessibility</a></li>

        </ul>
      </div>

    </div>

    <div class="footer-copyright">

      <div class="copyright">
        <p>&copy; copyright 2021 Recomdation</p>
      </div>

      <div class="wrapper">
        <a href="#">Privacy policy</a>
        <a href="#">Terms and conditions</a>
      </div>

    </div>

  </footer> -->

  <!-- Search model end -->
  <!-- Js Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/player.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  <script src="../assets/js/main.js"></script>



</body>

</html>