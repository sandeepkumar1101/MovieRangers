<?php
     
?>


    <div class="timeline">

      <?php  
            $sql = "Select * from movie ORDER BY id LIMIT 10";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            while($num != 0){
              $row = mysqli_fetch_assoc($result);
                 $image = explode(", ",$row['image']);
                 $image = explode("'",$image[0]);
                 $num -= 1;
            if($num%2 != 0){
              echo'<div class="t-container left">
                  <div  class="t-content">
                    <h2 id="t-date">Realease Date:- 2022/02/04</h2>
                    <p id="t-title">'.$row['title'].'</p>
                    <div style="height:25vw;" class="card-overlay">
                      <img src="'.$image[1].'" alt="" srcset="">
                    </div>
                  </div>
              </div>';
            }
            else{
              echo'<div class="t-container right">
              <div  class="t-content">
                <h2 id="t-date">Realease Date:- 2022/02/04</h2>
                <p id="t-title">'.$row['title'].'</p>
                <div style="height:25vw;" class="card-overlay">
                  <img src="'.$image[1].'" alt="" srcset="">
                </div>
              </div>
          </div>';
            }
          }
        ?>

