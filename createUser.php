<?php
include 'includes/head.php';
 ?>
<div class="jumbotron jumbo2">
  <div class="container">
    <?php
      if(isset($_POST['create_account'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $pw1 = $_POST['pw1'];
        $pw2 = $_POST['pw2'];
        $stmt = $conn->prepare("SELECT * FROM user WHERE uid = ?");
        $stmt->bind_param("s", $uid);
        $stmt->execute();
        $results = $stmt->get_result();
        if($pw1 != $pw2) {
          echo "<h1>Your passwords do not match!";
        } elseif ($results->num_rows > 0) {
          echo "<h1>That user name is already taken!";
        } else {
          $hash = password_hash($pw1, PASSWORD_DEFAULT);
          $stmt = $conn->prepare("INSERT INTO user VALUES (NULL, ?,?,?,?)");
          $stmt->bind_param("ssss", $name, $uid, $email, $hash);
          $stmt->execute();
          echo "<h1>Your account has been created $name!</h1>";
          $_SESSION['loggedin'] = true;
          $_SESSION['name'] = $uid;
        }


      }

     ?>


  </div>

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


  })
</script>
<div class="container">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</body>
</html>
