<?php 
include("config.php");
include('mobile_detect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  
  <title>SUNSHINE</title>
  <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="img/fav.png" type="image/png">
    <style type="text/css">
      * {
  padding:0;
  margin:0;
}

body {
  font-family: "Montserrat", sans-serif;
}

.container {
  height:100vh;
  display: flex;
}

section {
  height:100%;
  /*display: flex;*/
  align-items: center;
  justify-content: center;
  flex:1;
  transition: all .5s;
}

section:hover {
  flex:2;
}
section img {
  margin: 5% auto;
  display: block;
}
section h2 {
    font-size: 18px;
    text-transform: uppercase;
    margin: 0px 0 24px 0;
    color: #fff27f;
    text-align: center;
}
.out-border-1 {
    padding: 16px 5px 16px;
    display: inline-block;
    position: relative;
    cursor: pointer;
    transition: 0.2s all;
    left: 35%;
}
.button-1 {
    background: none;
    color: #fff27f;
    font-size: 14px;
    padding: 10px;
    border: 1px solid #fff27f;
    text-transform: uppercase;
    font-family: 'ralewayregular';
}
.button-1:before {
    content: '';
    position: absolute;
    width: 30px;
    height: 100%;
    border: 1px solid #fff27f;
    border-right: none;
    top: 0;
    left: 0;
    transition: 0.2s all;
}
.button-1:after {
    content: '';
    position: absolute;
    width: 30px;
    height: 100%;
    border: 1px solid #fff27f;
    border-left: none;
    top: 0;
    transition: 0.2s all;
    right: 0;
}
.designer .button-1 {
    background: none;
    color: #c13c3f;
    font-size: 14px;
    padding: 10px;
    border: 1px solid #c13c3f;
    text-transform: uppercase;
    font-family: 'ralewayregular';
}
.designer .button-1:before {
    content: '';
    position: absolute;
    width: 30px;
    height: 100%;
    border: 1px solid #c13c3f;
    border-right: none;
    top: 0;
    left: 0;
    transition: 0.2s all;
}
.designer .button-1:after {
    content: '';
    position: absolute;
    width: 30px;
    height: 100%;
    border: 1px solid #c13c3f;
    border-left: none;
    top: 0;
    transition: 0.2s all;
    right: 0;
}
section h1 {
  background:rgba(0,0,0,0.6);
  color:white;
  padding: 12px 32px;
}

.photographer{
  background:url('http://www.sunshineschool.in/images/shape.jpg') #519ED6;
  background-position: center;
  background-size: cover;
  background-blend-mode: multiply;
}

.designer{
  background:url('http://www.sunshineschool.in/images/shape.jpg') #d2ff09;
  background-position: center;
  background-size: cover;
  background-blend-mode: multiply;
}


.developer{
  background:url('http://www.sunshineschool.in/images/shape.jpg') #ffc107;
  background-position: center;
  background-size: cover;
  background-blend-mode: multiply;
}
.developer .button-1 {
    background: none;
    color: #5375ba;
    font-size: 14px;
    padding: 10px;
    border: 1px solid #5375ba;
    text-transform: uppercase;
    font-family: 'ralewayregular';
}
.developer .button-1:before {
    content: '';
    position: absolute;
    width: 30px;
    height: 100%;
    border: 1px solid #5375ba;
    border-right: none;
    top: 0;
    left: 0;
    transition: 0.2s all;
}
.developer .button-1:after {
    content: '';
    position: absolute;
    width: 30px;
    height: 100%;
    border: 1px solid #5375ba;
    border-left: none;
    top: 0;
    transition: 0.2s all;
    right: 0;
}
    </style>
</head>

<body>

  <div class="container">

    <section class="photographer">
      <img src="img/senior-logo.png">
      <img src="https://media.istockphoto.com/photos/concept-of-selling-a-house-a-hand-is-holding-a-model-house-above-picture-id1148812518?k=20&m=1148812518&s=612x612&w=0&h=1iVuk71F9WWetInhlLkjKxWUDns5bTkc2BHpMIKm3FE=">
      <h2>ARRUL ASSOCIATES</h2>
      <div class="out-border-1"><a href="/project?type=ARRUL-ASSOCIATES" class="button-1">go to site</a> </div>
    </section>

    <section class="designer">
      <img src="img/junior-logo.png">
      <img src="https://cdn.pixabay.com/photo/2016/11/18/17/46/house-1836070__480.jpg">
      <h2 style="color: #c13c3f;">EVEREST CONSTRUCTION</h2>
      <div class="out-border-1"><a href="/project?type=EVEREST-CONSTRUCTION" class="button-1">go to site</a> </div>
    </section>

  </div>

</body>

</html>