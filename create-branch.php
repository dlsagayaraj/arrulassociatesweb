<?php
ob_start();
include("config.php");
include("header.php");
$edit_id=end(explode("-edit-",str_replace("?mess=crea","",str_replace("?mess=upda","",$_SERVER['REQUEST_URI']))));
$seller_id="";
$staff_id="";
$name=$_POST['name'];
$branch=$_POST['branch'];


if($edit_id=='/test/create-branch')
{




if(isset($_REQUEST['branch']))
{

$count = mysqli_query($conn,"SELECT * FROM `branch` where  branch='$branch' and delete_status='0'"); 
$total_count=mysqli_num_rows($count);
if($total_count>='1')
{
$message='fail';
$alert="Data Already Exist.";	
}
else
{

   $query = "insert into branch(branch) values ('$branch')";
 

$inserted = mysqli_query($conn, $query);

$insertid1=mysqli_insert_id($conn);

$insertid=base64_encode($insertid1);
header("Location:$web_url/create-branch-edit-$insertid?mess=crea");


}
}
}
else
{
if(isset($_REQUEST['branch']))
{	

$edit_id1=$edit_id;
$edit_id=base64_decode($edit_id);
 $query = "UPDATE `branch` SET `branch`='$branch' where id='$edit_id'";



$inserted = mysqli_query($conn, $query);



header("Location:$web_url/create-branch-edit-$edit_id1?mess=upda");


//else
//{
//$message="fail";		
//}	
}
}
$edit_id=base64_decode($edit_id);
$user = mysqli_query($conn,"SELECT * FROM `branch` where 1=1 and id='$edit_id' ");   
$user1 = mysqli_fetch_array($user); 



?>
<style>
.card .card-content {
    padding: 34px;
}
</style>
    <div id="main">
      <div class="row">
        
		<div class="col s12">
          <div class="container">
            <div class="seaction">

<div class="row">
<div class="col s12 m12 l12">

      <div id="prefixes" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">CREATE BRANCH</h4>
		   <?php if($message=='fail')
		  {?>
		  <span class="red-text center"><?php echo $alert; ?></span> <?php } ?>	
		
		   <?php if($_REQUEST['mess']=='upda')
		  {?>
	  	  <br><span class="green-text center" style="font-size: 17px;">Succussfully Updated.</span> <?php } ?>
		  		  <?php if($_REQUEST['mess']=='crea')
		  {?>
	  	  <br><span class="green-text center" style="font-size: 17px;">Succussfully Created.</span> <?php } ?>
		   <div id="overlaynew"><img  id="loadingnew" src="<?php echo $web_url; ?>demo_wait.gif" width="150px" height="130px" /></div>
           <form class="login-form" class="formValidate" id="formValidate"  enctype="multipart/form-data" action="" method="post">
          

			
			<div class="row">
              <div class="input-field col s12">
               <input  id="branch" name="branch" type="text" value="<?php echo $user1['branch'];?>" style="text-transform:uppercase"  >
                <label for="branch">Branch</label>
				
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

  $(document).ready(function(){   
 $('#seller_id').on('change', function() { 

     var rate = parseFloat($('#litre').val()) || 0;
    var box = parseFloat($(this).find(':selected').data('id')) || 0;

    $('#amount').val(rate * box);   
});


$("#litre").on("keyup", function(){
     var rate = parseFloat($('#litre').val()) || 0;
    var box = parseFloat($('#seller_id').find(':selected').data('id')) || 0;

    $('#amount').val(rate * box);   
});


});

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
	 
	 
	 
	  unique_column: {
        required: true,
      },
	  
     
    },
    //For custom messages
    messages: {
	 
      unique_column: {
        required: "Enter a Unique Column",
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