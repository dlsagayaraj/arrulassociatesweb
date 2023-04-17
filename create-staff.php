<?php
include("config.php");
include("header.php");
$edit_id=end(explode("edit/",$_SERVER['REQUEST_URI']));
$name=$_POST['name'];
$phone_number=$_POST['phone_no'];
$password=base64_encode($_POST['password']);
if($edit_id=='/test/create-staff')
{
if(isset($_REQUEST['name']))
{
$count = mysqli_query($conn,"SELECT * FROM copy_staff where phone_number='$phone_number'"); 
$total_count=mysqli_num_rows($count);
if($total_count>='1')
{
$message='fail';
$alert="Phone Number Already Exist.";	
}
else
{
$query = "insert into copy_staff(name,phone_number,password,date_time,log_id) values ('$name','$phone_number','$password','$date_time','$log_id')";
$inserted = mysqli_query($conn, $query);
if($inserted=='1')	
{
$alert="Succesfully Created.";	
$message="Success";	
}
else
{
$message="fail";		
}
}
}
}
else
{
if(isset($_REQUEST['name']))
{	
$query = "UPDATE `copy_staff` SET `name`='$name',`phone_number`='$phone_number',`password`='$password',`log_id`='$log_id',`date_time`='$date_time' where id='$edit_id'";
$inserted = mysqli_query($conn, $query);

if($inserted=='1')	
{
$alert="Succesfully Updated.";
$message="Success";	
}
else
{
$message="fail";		
}	
}
}
$user = mysqli_query($conn,"SELECT * FROM `copy_staff` where 1=1 and id='$edit_id' ");   
$user1 = mysqli_fetch_array($user);



?>
    <div id="main">
      <div class="row">
        
		<div class="col s12">
          <div class="container">
            <div class="seaction">

<div class="row">
<div class="col s12 m12 l12">
      <div id="prefixes" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">CREATE STAFF</h4>
		  <?php if($message=='fail')
		  {?>
		  <span class="red-text center"><?php echo $alert; ?></span> <?php } ?>	
		  <?php if($message=='Success')
		  {?>
		  <span class="green-text center"><?php echo $alert; ?></span> <?php } ?>
 <div id="overlaynew"><img  id="loadingnew" src="<?php echo $web_url; ?>demo_wait.gif" width="150px" height="130px" /></div>		  
    <form class="login-form" class="formValidate" id="formValidate"  action="" method="post">
            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" name="name" value="<?php echo $user1['name']; ?>"  required data-error=".errorTxt1">
                <label for="name">Name</label>
				<small class="errorTxt1"></small>	
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="phone_no" name="phone_no" type="number" value="<?php echo $user1['phone_number']; ?>" required data-error=".errorTxt2">
                <label for="phone_no">Phone</label>
				<small class="errorTxt2"></small>	
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="password" name="password" type="password" value="<?php echo base64_decode($user1['password']); ?>" required data-error=".errorTxt3">
                <label for="password">Password</label>
				<small class="errorTxt3"></small>
              </div>
            </div>
            <div class="row">
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn green waves-effect waves-light right" type="submit" name="action">Submit
                  
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  
 </div>
</div>

          </div>
        </div>
      </div>
    </div>
	
	
<?php include("footer.php");?>
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
	   name: {
        required: true
      },
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
		name: {
        required: "Enter a Name",
       
      },
      phone_no: {
        required: "Enter a Phone Number",
        minlength: "please Enter Valid Phone Number"
      },
	  password: {
        required: "Enter a Password",
       
      }
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
