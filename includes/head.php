<?php
session_start();

if(!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = false;
}

include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style media="screen">



    body{
      background-color:#FFFFFF;
    }
    #huy{
      height: 200px;
      width: auto;
    }

    .cangiua {
      display: block; 
      margin-left: auto; 
      margin-right: auto;
    } 

 .cang {
   height:500px;
   width:auto px;
   margin-left: 550px;
} 


    #logo1{
      width:45px;
     height:45px;
    margin-bottom: 0px;
    }

    #hinhdong{
     width:100px;
     height:130px;


         }

         #hinhdong1{
     width:100px;
     height:130px;
margin: -90px;

         }

#h1read{
  /*background-image: url('images/72.jpg');
  background-attachment: fixed;*/
   background-color: #B1A692;
   opacity:0.8;
   box-shadow: 5px 5px #888888;
    }

#h1readmore{
  color: #F6C5C0;
}
#submit{
  background-color: #593E53;
  color: #F2F2F2;
  border: none;
}

#h2read{
  color: #F2F2F2;
}

#loadarticles{
  background-color: #C1A29B;
  border-style:none;
  opacity: 0.6;
  box-shadow: 5px 5px #888888;
}

#readmore{
  background-color: #F7D185;
  border-style:none;
  opacity: 0.9;
}
#detail1{
   height:500px;
   width:500px;
}

#detail{
   height:40px;
   width:auto;
}


#drop{
  opacity: 0.8;
  background-color: #BF84B2;
}
#nut{
  opacity: 0.9;
  background-color:#C1A29B; 
}

#nep{

  height: 500px;
  width: auto;

}

#nep:hover {
    /* Start the shake animation and make the animation last for 0.5 seconds */
    animation: shake 0.5s; 
    /* When the animation is finished, start again */
    animation-iteration-count: infinite; 
}

@keyframes shake {
    0% { transform: translate(1px, 1px) rotate(0deg); }
    10% { transform: translate(-1px, -2px) rotate(-1deg); }
    20% { transform: translate(-3px, 0px) rotate(1deg); }
    30% { transform: translate(3px, 2px) rotate(0deg); }
    40% { transform: translate(1px, -1px) rotate(1deg); }
    50% { transform: translate(-1px, 2px) rotate(-1deg); }
    60% { transform: translate(-3px, 1px) rotate(0deg); }
    70% { transform: translate(3px, 1px) rotate(-1deg); }
    80% { transform: translate(-1px, -1px) rotate(1deg); }
    90% { transform: translate(1px, 2px) rotate(0deg); }
    100% { transform: translate(1px, -2px) rotate(-1deg); }
}






#colorco{
  background-color: #FFFFFF;
  border: none;
}
    #bs-example-navbar-collapse-1{
      background-color: #FFFFFF;
      border: none;
    }
    #detai{
      width: 400px;
      height: auto;
    }

    .jumbotron {
      background-image: url('images/city3.jpg');
      background-size: cover;
      background-attachment: fixed;
      color: white;
      height: 700px;
      text-shadow: 1px 1px 2px black;
    }

    .jumbo2 {
        background-image: url('images/bg4.jpg');
    }
    .jumbo3 {
        background-image: url('images/bg3.jpg');
    }

    img {
      width: 100%;
    }
    #search{
     min-width: 400px;
      width: 800px;
      background-color: #D8CCF2
    }

    .carousel .item img {
      max-height: 500px;
      min-height: 500px;
      width: auto;
    }


    </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid" id='colorco'>
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!--search-->
<ul class="nav navbar-nav">
          <li><a href="index.php" id='chu' ><img src="images/logo2.png" id='logo1' alt="logo"><span class="sr-only">(current)</span></a></li>
        </ul>
                <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" id='search' placeholder="art or artist">
          </div>
          <button type="submit" id='submit' class="btn btn-default">Search</button>
        </form>

<!--search-->




        <ul class="nav navbar-nav">
          <li><a href="index.php" id='chu' >Home<span class="sr-only">(current)</span></a></li>
          <li><a href="slideshow.php">gallery</a></li>



<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

<?php
      if($_SESSION['loggedin'] === false) {
        include "loginform.php";
      } else {
        echo "<h5>" . $_SESSION['name'] . "</h5>" ;
        

      }
 ?>
                        <ul class="dropdown-menu" id='drop'>
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>




              <!-- log out-->

                      <li class="nav navbar-nav navbar-right">
          <?php
            if($_SESSION['loggedin'] === true) {
              echo "<li><a href='logout.php' id='nut' >Logout</a></li>";
            } else {
              echo '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <form class="form" action="index.html" method="post">
                    <div class="form-group">
                      <li>Name</li>
                      <li><input type="text" name="name" value="" class="form-control"></li>
                      <li><label for="password">Password</label></li>
                      <li><input type="password" name="password" value="" class="form-control"></li>
                      <button type="submit" name="button" class="btn btn-primary">Login</button>
                    </div>

                  </form>
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>';
            }
           ?>


        </li>






<!-- log out-->




            </ul>
          </li>



         
        </ul>
 
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
