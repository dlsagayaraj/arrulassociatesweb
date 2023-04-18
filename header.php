<?php
if($_SESSION["type"]=='seller')
{
$req_url=$_SERVER[REQUEST_URI];
	
if($req_url=='/company-sales' || $req_url=='/logout')
{	
	
}
else
{
header("Location:".$web_url);
exit;	
}
	
}

if($_SESSION["user_id"]=='')
{
header("Location:".$web_url);
exit;
}
$log_id=$_SESSION["user_id"];


 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="ARRULASSOCIATES.">
    <meta name="keywords" content="ARRULASSOCIATES">
    <meta name="author" content="ARRULASSOCIATES">
    <title>ARRULASSOCIATES</title>
    <link rel="apple-touch-icon" href="<?php echo $web_url; ?>app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $web_url; ?>app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $web_url; ?>app-assets/vendors/select2/select2.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $web_url; ?>app-assets/vendors/select2/select2-materialize.css" type="text/css">	
    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/themes/vertical-gradient-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/themes/vertical-gradient-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/pages/dashboard.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/pages/form-select2.min.css">	
    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/custom/custom.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/vendors/materialize-stepper/materialize-stepper.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/vendors/sweetalert/sweetalert.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/pages/form-wizard.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash" rel="stylesheet">
                
  </head>

 <style>
#fixedbutton {
    position: fixed;
    bottom: 56px;
    right: 26px;
    height: 39px;
    width: 39px;
    padding: 0 0rem;
}
tr {
    border-bottom: unset !important;
}
tr {
    border-top: unset !important;
}
.btn, .btn-large, .btn-small { background-color: #022341 ; }
#fixedbuttonleft{
    position: fixed;
    bottom: 56px;
    left: 26px;
    height: 39px;
    width: 39px;
    padding: 0 0rem;
}

.btn, .btn-flat, .btn-large, .btn-small {
    display: inline-block;
    height: 36px;

    vertical-align: middle;
    border: none;
	    background-color: #022341 ;
}
.sidenav-dark {
    background: #022341  !important;
}
html {
    color: #0b0b0b;
    font-weight: bold;
}
.navbar .navbar-light {
  background: #022341  !important;
}
.card .card-title {
    font-weight: bold;
}
.sidenav-dark.sidenav-main .sidenav {
    background: #022341  ;
}
.btn-floating, .btn-floating:hover {
   background: #022341  !important;
}
.container {
    width: 100%;
    max-width: 100%!important;
    margin: 0px auto;
    padding: 0px 0px;
}
.#008068 {
    background-color: #022341   !important;
}
.footer-light .footer-copyright {
    color: white;
}
#overlaynew{position:fixed;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,.3);z-index:2;cursor:pointer;}
#loadingnew{    margin-left: 30%!important;
    margin-top: 100%!important;}
.btn-large:hover, .btn-small:hover, .btn:hover {
    background-color: #022341 ;
}	
.swal-button {
    background-color: #022341  !important;
}
.swal-button--cancel {
	    background-color: #022341  !important;
    color: white;
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
.card .card-content {
    padding: 0px;
}
.brand-sidebar .logo-wrapper a.brand-logo img {
   height: 45px;
    width: 97%;
    margin-top: -16px;
}
h1, h2, h3, h4, h5, h6
{
	    font-family: emoji;
}
.green {
    background-color: #022341 !important;
}
</style> 
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-gradient-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-gradient-menu" data-col="2-columns" <?php if($typepage=='printpage') { ?> style="background:white !important;" <?php } else {?> style="background:white !important;    font-family: emoji;" <?php } ?>>   
	
	<header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
          <div class="nav-wrapper">

          <span style="float: left;width: 80%;text-align: center;color: yellow">
         <?php $type=str_replace("-"," ",$_SESSION["typenew"]);
                if($type=='EVEREST CONSTRUCTION')
            {?>
            EVEREST CONSTRUCTION
                
            <?php } ?>  
            <?php
            if($type=='ARRUL ASSOCIATES')
            {?> 
                    ARRUL ASSOCIATES
            <?php } ?>
        </span>  
            <ul class="navbar-list right">
                
            <li>
                  <?php 

          if($_REQUEST['stepid']!="")
             {
             $edit_id=base64_decode($_REQUEST['stepid']);
             

             
             $files = mysqli_query($conn,"SELECT * FROM copy_project_details where id='$edit_id' and delete_status='0' order by id desc");
             $file= mysqli_fetch_array($files);

             echo "File NO <b style='color:red;'>".$file['file_no']."</b>"; 
         }
         ?>
              </li>
            
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="<?php echo $web_url; ?>app-assets/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a></li>
             
            </ul>
        

            <ul class="dropdown-content" id="profile-dropdown">

			    <li><a class="grey-text text-darken-1">Welcome <?php echo $_SESSION["user_name"]; ?></a></li>
              <li><a class="grey-text text-darken-1" href="<?php echo $web_url; ?>logout.php"><i class="material-icons">keyboard_tab</i> Logout</a></li>
            </ul>
          </div>

        </nav>
      </div>
    </header>
<?php if($_SESSION["type"]=='')
{?>
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark gradient-45deg-deep-purple-blue sidenav-gradient sidenav-active-rounded">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="<?php echo $web_url; ?>dashboard.php" style=""><img class="hide-on-med-and-down " src="<?php echo $web_url; ?>app-assets/images/logo/logo.png" alt="materialize logo" style="color:white;    width: 14%;   "/><p style="font-family: 'Berkshire Swash' !important;
    font-size: 25px;
    margin-top: -24px;
    margin-left: 40px;">Arrul Associates</p></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
	  
 <li class="bold" style="        border-bottom: 1px solid #f9b517;
    border-radius: 4px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>dashboard.php"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="ToDo">Dashbord</span></a>
        </li>
		
		
        <li class="bold" style="        border-bottom: 1px solid #f9b517;
    border-radius: 4px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>staff.php" ><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="ToDo">STAFF</span></a>
        </li>
		
			 <li class="bold" style="        border-bottom: 1px solid #f9b517;
    border-radius: 4px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>create-project.php"><i class="material-icons">timeline</i><span class="menu-title" data-i18n="ToDo">CREATE PROJECT</span></a>
        </li>
		 
		 <li class="bold" style="       border-bottom: 1px solid #f9b517;
    border-radius: 4px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>project.php"><i class="material-icons">timeline</i><span class="menu-title" data-i18n="ToDo">PROJECT</span></a>
        </li>
		
		 <li class="bold" style="        border-bottom: 1px solid #f9b517;
    border-radius: 4px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>bank.php"><i class="material-icons">timeline</i><span class="menu-title" data-i18n="ToDo">BANK</span></a>
        </li>
        
 <li class="bold" style="        border-bottom: 1px solid #f9b517;
    border-radius: 4px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>branch.php"><i class="material-icons">timeline</i><span class="menu-title" data-i18n="ToDo">BRANCH</span></a>
        </li>
<?php $type=str_replace("-"," ",$_SESSION["typenew"]);
if($type=='EVEREST CONSTRUCTION')
{?>
 <li class="bold" style="      
    border-radius: 4px;
    background: #f0b019;
    margin-top: 50px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>project.php?type=ARRUL-ASSOCIATES"><span class="menu-title" data-i18n="ToDo"><i class="material-icons">keyboard_backspace</i>ARRUL ASSOCIATES</span></a>
        </li>
<?php } ?>	
<?php
if($type=='ARRUL ASSOCIATES')
{?>	
		 <li class="bold" style="           
    border-radius: 4px;
    background: #f0b019;
    margin-top: 50px;"><a class="waves-effect waves-cyan " href="<?php echo $web_url; ?>project.php?type=EVEREST-CONSTRUCTION"><span class="menu-title" data-i18n="ToDo"><i class="material-icons">keyboard_backspace</i>EVEREST CONSTRUCTION</span></a>
        </li>
<?php } ?>


	 </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
<?php } ?>