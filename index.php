<?php
include("config.php");

 $phone_no=$_POST['phone_no']; 
 $password=base64_encode($_POST['password']); 


if($phone_no!='' && $password!='')
{
	
$result1 = mysqli_query($conn,"SELECT * FROM `seller` where 1=1 and phone_number='$phone_no' and password='$password' and `delete_status`='0'  ");  
$total_count1=mysqli_num_rows($result1);	

if($total_count1==0)
{	
$result = mysqli_query($conn,"SELECT * FROM `copy_staff` where 1=1 and phone_number='$phone_no' and password='$password' and `delete_status`='0'  ");  
$total_count=mysqli_num_rows($result);
}
if($total_count1>0)
{
$row=mysqli_fetch_array($result1);

$_SESSION["user_id"] = $row['id'];
$_SESSION["user_name"] =$row['company_name'];
$_SESSION["type"] ='seller';
	
header("Location:indnew.php");	
}

if($total_count>0)
{
$row=mysqli_fetch_array($result);

$_SESSION["user_id"] = $row['id'];
$_SESSION["user_name"] =$row['name'];
$_SESSION["type"] ='';	
header("Location:indnew.php");	
}

else
{
	
$alert = "Invalid Login Credentials";	
}
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="ARRULASSOCIATES">
    <meta name="keywords" content="ARRULASSOCIATES">
    <meta name="author" content="ARRULASSOCIATES">
    <title>ARRULASSOCIATES</title>
    <link rel="apple-touch-icon" href="app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/vertical-gradient-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/vertical-gradient-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/custom/custom.css">
<style>
html {font-family: Montserrat,sans-serif!important;font-weight: 400;line-height: 1.5;color: #0b0b0b;}
.input-field>label {color: #151414;}
label {color: #131212;}
.gradient-45deg-purple-deep-orange {
     background: #60df10  !important;
}
body {

  background:url('https://www.build-review.com/wp-content/uploads/2020/07/luxury-real-estate.jpg') #ffff;;
  background-position: center;

  background-blend-mode: multiply;
   
}


@-webkit-keyframes hue {
    from {
      -webkit-filter: hue-rotate(0deg);
    }

    to {
      -webkit-filter: hue-rotate(360deg);
    }
}

.red-text {
    color: red !important;
    font-weight: bold;
}
.input-field div.error {
    font-size: 12px;
    position: relative;
    top: 0;
    font-weight: bold;
    left: 0;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
    color: red;
}
input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
</style>	
  </head>
  <!-- END: Head-->
  <body class="blank-page blank-page" data-open="click" data-menu="vertical-gradient-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8" style="background: #f1d8a3;; !important;    color: white;;">
  
    <form class="login-form" class="formValidate" id="formValidate"  action="" method="post">
      <div class="row">
        <div class="input-field col s12">
		<img  src="<?php echo $web_url; ?>app-assets/images/logo/logo231.png" alt="materialize logo" style="        width: 100%;"/>
		<?php if(1!=1)
		{?>
		<h5 class="ml-4">Sign in</h5> <?php } ?>
		<br>
		<?php if($alert!='')
		  {?>
		  <span class="red-text center"><?php echo $alert; ?></span> <?php } ?>		  
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">

          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="phone_no" name="phone_no" type="number" data-error=".errorTxt1" style="color:white;">
          <label for="phone_no" class="center-align" style="color: white;
    font-size: 14px;
    font-weight: 600;">Phone Number</label>
		  <small class="errorTxt1"></small>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" name="password" type="password"  data-error=".errorTxt3" style="color:white;">
          <label for="password" style="color: white;
    font-size: 14px;
    font-weight: 600;">Password</label>
		  <small class="errorTxt3"></small>
        </div>
      </div>
   
      <div class="row">
        <div class="input-field col s12">
		<input type="submit" class="btn green col s12 gradient-45deg-purple-deep-orange" value="Login" style="    background: #229dcb !important;"> 
          
        </div>
      </div>
     
    </form>
  </div>
</div>


	  <div class="content-overlay"></div>
      </div>
    </div>


<script src="app-assets/js/vendors.min.js"></script>
 <script src="app-assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="app-assets/js/plugins.min.js"></script>
<script src="app-assets/js/search.min.js"></script>
<script src="app-assets/js/custom/custom-script.min.js"></script>
<script>

$(function () {

  $('select[required]').css({
    position: 'absolute',
    display: 'inline',
    height: 0,
    padding: 0,
    border: '1px solid rgba(255,255,255,0)',
    width: 0
  });

  $("#formValidate").validate({
    rules: {
      phone_no: {
        required: true,
        minlength: 10,
      },
     
      password: {
        required: true,

      },
     
      tnc_select: "required",
    },
    //For custom messages
    messages: {
      phone_no: {
        required: "Enter a Phone Number",
        minlength: "please Enter Valid Phone Number"
      },
    },
    errorElement: 'div',
    errorPlacement: function (error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    }
  });
});
</script>
</body>
</html>