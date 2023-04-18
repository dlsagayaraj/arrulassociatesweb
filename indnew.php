
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  
  <title>ARRUL ASSOCIATES</title>
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
    font-size: 23px;
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
    color: white;
    font-size: 18px;
    font-weight: 700;
    padding: 10px;
    border: 1px solid white;
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
    color: white;
    font-size: 14px;
    padding: 10px;
    border: 1px solid white;
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
  background:url('https://akm-img-a-in.tosshub.com/businesstoday/images/story/201611/flat-or-land_660_110716033359.jpg') #519ED6;
  background-position: center;
  background-size: cover;
  background-blend-mode: multiply;
}

.designer{
  background:url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cmVhbCUyMGVzdGF0ZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80') #d2ff09;
  background-position: center;
  background-size: cover;
  background-blend-mode: multiply;
}



.developer .button-1 {
    background: none;
    color: #5375ba;
  font-size: 18px;
    font-weight: 700;
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

    </style>
</head>

<body>

  <div class="container">

    <section class="photographer">
      <img src="app-assets/images/logo/logo231.png">
      <h2 style="color: White;">ARRUL ASSOCIATES</h2>
      <div class="out-border-1"><a href="/project.php?type=ARRUL-ASSOCIATES" class="button-1">go to ARRUL ASSOCIATES</a> </div>
    </section>

    <section class="designer">
      <img src="app-assets/images/logo/logo231.png">
      <h2 style="color: White;">EVEREST CONSTRUCTION</h2>
      <div class="out-border-1"><a href="/project.php?type=EVEREST-CONSTRUCTION" class="button-1">go to EVEREST CONSTRUCTION</a> </div>
    </section>


  </div>

</body>

</html>