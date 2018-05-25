<?php
  include 'includes/head.php';
     ?>
     <div class="output">
      <?php
        include 'slide.php';

       ?>
     </div>
     <div class="cangiua">
     <?php
            $carousel = new Slide($conn);
            $carousel->getSlides();
          ?>
        </div>

     <div class="container">
    <h1 style="color:#F6C5C0;">Upload an Art to Arts Gallery</h1>
    <form class="form" action="slideshow.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="images">Image</label>
        <input type="file" class="form-control" id="img-file" placeholder="" name="slide">
        <p class="help-block">Upload Image Here</p>
      </div>
      <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" class="form-control" id="" placeholder="Write some caption" name="caption">
        <p class="help-block">Help text here.</p>
      </div>
      <button type="submit" name="submitImg" class="btn btn-primary">Upload</button>
    </form>

    <?php
    function InputImg($conn) {
  if(isset($_POST['submitImg'])) {
    $caption = $_POST['caption'];
    $file = $_FILES['slide'];
    $file_name = $file['name'];
    $file_type = $file['type'];
    $temp_name = $file['tmp_name'];
    $file_size = $file['size'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    echo "The file extension is " . $file_ext;
    $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];
    if(in_array($file_ext, $allowed_ext)) {
      $file_dest = "images/" . $file_name;
      if(move_uploaded_file($temp_name, $file_dest)) {
      $query = "INSERT INTO images VALUES (NULL, '$file_dest', '$caption')";
      if($results = $conn->query($query)) {
        echo "<div class='alert alert-success'>You image was uploaded successfully</div>";
      } else {
        echo "<div class='alert alert-danger'>Your image failed to upload</div>";
      }
    } else {
      echo "File not moved!";
    }

    } else {
      echo "That file extension is not allowed";
    }




  }
}

function OutPutImg($conn){
  $query = "SELECT * FROM images";
  if($results = $conn->query($query)) {
    $rows = $results->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as $x) {
      echo "<div class='col-md-3'><img class='img img-responsive' src='" . $x['file'] .
           "'><h3>" . $x['caption'] . "</div>";
    }
  }
}

     if(isset($_POST['submitImg'])) {
     InputImg($conn);
    } else {

    }
    OutPutImg($conn);
     ?>

  </div>

     <div class="container">
       <!-- Example row of columns -->
       <div class="row">
         <div class="col-md-4">
           <h2 style="color:#F6C5C0;">Jupiter</h2>
           <p style="color: #F2F2F2;">Jupiter is the fifth planet from the Sun and the largest in the Solar System. It is a giant planet with a mass one-thousandth that of the Sun, but two-and-a-half times that of all the other planets in the Solar System combined. Jupiter and Saturn are gas giants; the other two giant planets, Uranus and Neptune are ice giants. Jupiter has been known to astronomers since antiquity.[13] The Romans named it after their god Jupiter.[14] When viewed from Earth, Jupiter can reach an apparent magnitude of −2.94, bright enough for its reflected light to cast shadows,[15] and making it on average the third-brightest object in the night sky after the Moon and Venus. </p>
           <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
         </div>
         <div class="col-md-4">
           <h2 style="color:#F6C5C0;">Neptune</h2>
           <p style="color: #F2F2F2;">Neptune is the eighth and farthest known planet from the Sun in the Solar System. In the Solar System, it is the fourth-largest planet by diameter, the third-most-massive planet, and the densest giant planet. Neptune is 17 times the mass of Earth and is slightly more massive than its near-twin Uranus, which is 15 times the mass of Earth and slightly larger than Neptune.[d] Neptune orbits the Sun once every 164.8 years at an average distance of 30.1 AU (4.5 billion km). It is named after the Roman god of the sea and has the astronomical symbol ♆, a stylised version of the god Neptune's trident. </p>
           <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
         <div class="col-md-4">
           <h2 style="color:#F6C5C0;">Venus</h2>
           <p style="color: #F2F2F2;">Venus is the second planet from the Sun, orbiting it every 224.7 Earth days (Venus year).[12] It has the longest rotation period (the Venus day, 243 Earth days) of any planet in the Solar System and rotates in the opposite direction to most other planets (meaning the Sun would rise in the west and set in the east).[13] It does not have any natural satellites. It is named after the Roman goddess of love and beauty. It is the second-brightest natural object in the night sky after the Moon, reaching an apparent magnitude of −4.6 – bright enough to cast shadows at night and, rarely, visible to the naked eye in broad daylight.[14][15] Orbiting within Earth's orbit, Venus is an inferior planet and never appears to venture far from the Sun; its maximum angular distance from the Sun (elongation) is 47.8°.</p>
           <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
         </div>
       </div>
     </div>

<style>
     .pagination {
         display: inline-block;
     }

     .pagination a {
         color: black;
         float: left;
         padding: 8px 16px;
         text-decoration: none;
         border: 1px solid #ddd;
     }

     .pagination a.active {
         background-color: #4CAF50;
         color: white;
         border: 1px solid #4CAF50;
     }

     .pagination a:hover:not(.active) {background-color: #ddd;}

     .pagination a:first-child {
         border-top-left-radius: 5px;
         border-bottom-left-radius: 5px;
     }

     .pagination a:last-child {
         border-top-right-radius: 5px;
         border-bottom-right-radius: 5px;
     }

     #outer {
      width: 100%;
      text-align: center;
    }

    #inner {
      display: inline-block;
    }
</style>

<div id="outer">
  <div class="pagination" id="inner">
    <a href="index.php">&laquo;</a>
    <a href="index.php">Home</a>
    <a href="slideshow.php" class="active">Slideshow</a>
    <a href="#">&raquo;</a>
  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('body').append("<div class='overlay'> </div>");
        $('.overlay').hide();
        $(".overlay").click(function() {
          $(this).fadeOut(500);
        })
        var button = "<button class='btn btn-warning carousel-edit' type='button'>Edit Carousel</button>";
        $(".carousel").append(button);
        $(".carousel-edit").hide();
        $('.carousel').on("mouseover", function() {
          $(".carousel-edit").fadeIn(200);
          $("button.btn").click(function() {

            $(".overlay").fadeIn(500);
            getSlideData();
          //$('.overlay').fadeIn();
          })
          $(this).on("mouseout", function() {
            $("button.carousel-edit").fadeOut(200);
          })
        })

        function getSlideData() {
            $.ajax({
              url: "slide.php",
              type: "POST",
              data: "hello": "",
              success: function(response) {
                $('.overlay').append("<div class='overlay-window'> </div>");
                $(".overlay-window").html(response);
              }
          })
        }
      })
    </script>
  </body>
</html>