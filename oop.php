<?php

include 'connection.php';
include 'slide.php';

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="car.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style media="screen">
    button.carousel-edit {
      position: absolute;
      top: 2%;
      right: 1%;
    }

    .overlay {
      background: rgba(0, 0, 0, 0.85);
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0px;
    }
    .overlay-window {
      width: 75%;
      margin: auto;
      height: 350px;

      background: white;
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#"></a></li>

          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"></a></li>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="jumbotron">
      <h1>Hello, world!</h1>
      <p></p>
    </div>

    <?php

     ?>
     <div class="output">

     </div>
     <div class="container">
       <!-- Example row of columns -->
       <div class="row">
         <div class="col-md-4">
           <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
           <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
         </div>
         <div class="col-md-4">
           <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
           <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
         <div class="col-md-4">
           <h2>Heading</h2>
           <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
           <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
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
