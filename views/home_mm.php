<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/home.css">

    <title>Home</title>
</head>

<body>
<header>
 
<?php
require_once(__DIR__.'/../app/Controllers/header.php');
?>
<!------------------------------------------------------------------------------------------------------------------->
<body>
<div class="main">

  <div class="main-img">
                <img src="../images/books.jpg" class="banner" alt="banner"/>
            </div>
			<br><br><br>
   <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="../images/home1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="../images/home2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="../images/home3.jpg" style="width:100%">
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="../images/home4.jpg" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>  
    <span class="dot" onclick="currentSlide(4)"></span>  
 
</div>




	
	<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/main.js"></script>
<script>

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

</script>
</body>
</html>
