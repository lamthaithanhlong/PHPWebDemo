<?php
include 'includes/head.php';
 ?>
<div class="jumbotron">


  <a href="slideshow.php" id='chu' ><img id='nep' src="images/logo2.png" id='detail1' alt="rocket.png" class="cangiua"></a>

    <img  src="images/name.png" id='detai' alt="rocket.png" class="cangiua">


<div class="container">
  

</div>

  </div>

<?php

 ?>

 <div class="container">
   <!-- Example row of columns -->
       <h2 style="text-align: center;color:#F6C5C0;">Explore something new <img src="images/observatory.png" id='detail' alt="rocket.png"></h2>
       <p style="color: #F2F2F2;">A planet is an astronomical body orbiting a star or stellar remnant that is massive enough to be rounded by its own gravity, is not massive enough to cause thermonuclear fusion, and has cleared its neighbouring region of planetesimals.</p>
       <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
   </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="container">
<div class="row">
<script type="text/javascript" src="js/bootstrap.js">

</script>
</div>
  <?php
    if($_SESSION['loggedin'] === false) {
      echo "<h1>Please login to view articles</h1>";
    } else {
      echo "<button class='btn btn-success btn-block ' type='button' id='loadarticles'>View More</button>";
    }
   ?>

   <br>
</div>
</div>
<div class="container output" id="output" style="min-height: 450px">

</div>
<div class="container">
  <div class="pagination col-md-6 col-md-offset-3">



  <nav aria-label="Page navigation">
    <ul class="pagination" id="pagination">

    </ul>
  </nav>
</div>
</div>
<script type="text/javascript">


//LOAD ARTICLES
$('#loadarticles').click(function() {
getArticles(currentpage);
})
var numrows;
function getPagination(x) {
$.ajax({
method: 'post',
url: 'pagination.php',
data: {},
'success': function(data) {
getPager(data, x);
}
})
}
var currentpage = 0;

function getPager(numrows, currentpage) {
var prev, next;
var activeclass = "";
var numpages = numrows/10;
var pagelist = 0;
if(currentpage >= numpages) {
pagelist = numpages - 4;
prev = numpages - 1;
next = currentpage;
} else if (currentpage <= 3) {
pagelist = 1;
next = currentpage + 1;
prev = currentpage;
} else {
pagelist = currentpage - 2;
next = currentpage + 1;
prev = currentpage - 1;
}
console.log('The number of pages: ' + numpages);

var output = '<li class="getpages" value="0"><a href="#">First</a></li><li class="getpages" value="' + prev + '"><a href="#"aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
for(var i = 0; i < 5; i++) {
if (pagelist == currentpage) {
activeclass = "active";
} else {
activeclass = "";
}
output += '<li class="getpages ' + activeclass + '" value="' + pagelist + '"><a href="#">' + pagelist + '</a></li>';
pagelist++;
}
output += '<li class="getpages" value="' + next + '"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><li class="getpages" value="' + numpages + '"><a href="#">Last</a></li>';
$("#pagination").html(output);
}

$(document).on('click', '.getpages', function(e) {
e.preventDefault();
var x = $(this).val();
console.log("You clicked on articles : " + x);
getArticles(x);
})
console.log("numrows outside ajax is: " + numrows);

//GET MUTLIPLE ARTICLES
function getArticles(x) {
console.log("get articles clicked");
var xhr = new XMLHttpRequest();
xhr.open('POST', 'getarticles.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
data = "id=" + x;
xhr.onload = function() {
if(this.status == 200) {
console.log("connected succesfully");
var data = JSON.parse(this.responseText);
var output = "<div class='articles'><div class='row'>";
var row = "";
for(var i in data) {
if((i + 1) % 3 == 0) {
row = "</div><div class='row'>";
} else {
row = "";
}
output += "<div class='col-md-4'><div class='well'><h2>" + data[i]['cap'] + "</h2><h5>Author: " + data[i]['nick'] + "</h5><h4>" + data[i]['post_date'] + "</h4><img id='huy' src='" + data[i]['pic'] + "'><p>ID: "+ data[i]['id'] + "</p><br><button class='btn btn-success single-article' type='button' value='" + data[i]['id'] + "'>Read More</button></div></div>" + row;
}
output += "</div></div>";
$("#output").hide().html(output).fadeIn(555);
getPagination(x);
} else {
console.log("unable to connect");
}
}
xhr.send(data);
}

// GET SINGLE ARTICLE
$(document).on('click', '.single-article', function() {
var x = $(this).val();
console.log("You clicked on article: " + x);
$.ajax({
method: 'post',
url: 'getsingle.php',
dataType: 'json',
data: {id:x},
success: function(data) {
var output = "";
$.each(data, function(key, value) {
output += "<div class='article'><h2>" + value['title'] + "</h2><h4>" + value['author'] + "</h4><p>" + value['content'] + "</p><br><button class='btn btn-warning return' type='button'>Go Back</button></div>";
})

$(".articles").fadeOut(555, function() {
$("#output").hide().html(output).fadeIn(888);
} );
}

})
});

//clgt
 /* function getArticles(x) {
console.log("get articles clicked");
var xhr = new XMLHttpRequest();
xhr.open('POST', 'getarticles.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
data = "id=" + x;
xhr.onload = function() {
if(this.status == 200) {
console.log("connected succesfully");
var data = JSON.parse(this.responseText);
var output = "<div class='articles'><div class='row'>";
var row = "";
for(var i in data) {
if((i + 1) % 3 == 0) {
row = "</div><div class='row'>";
} else {
row = "";
}
output += "<div class='col-md-4'><div class='well'><h2>" + data[i]['title'] + "</h2><h5>Author: " + data[i]['author'] + "</h5><h4>" + data[i]['post_date'] + "</h4><p>"+ data[i]['content'] + "</p><br><button class='btn btn-success single-article' type='button' value='" + data[i]['id'] + "'>Read More</button></div></div>" + row;
}
output += "</div></div>";
$("#output").hide().html(output).fadeIn(555);
getPagination(x);
} else {
console.log("unable to connect");
}
}
xhr.send(data);
}*/



//clgt



//RETURN TO MULTIPLE ARTICLES
$(document).on('click', '.return', function() {
$('.article').fadeOut(555, function() {
getArticles();
});
})
</script>

</body>
</html>
