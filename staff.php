<?php include("config.php");
?>
<?php include("header.php");?>
    <div id="main">
      <div class="row">
        
		<div class="col s12">
          <div class="container">
            <div class="seaction">

  <div class="row">
    <div class="col s12">
      <div class="card">
	  
        <div class="card-content">
          <h4 class="card-title">STAFF</h4>
          <div class="row">
            <div class="col s12">
			 <div id="overlaynew"><img  id="loadingnew" src="<?php echo $web_url; ?>app-assets/images/logo/logo.jpg" width="150px" height="130px" /></div>
              <table id="page-length-option" class="display">
                <thead>
				<?php
				

$totals = mysqli_query($conn,"SELECT count(id) as total FROM `copy_staff` where 1=1 and is_admin!='1' and delete_status='0'");   
$totals1 = mysqli_fetch_array($totals);

$count_vals=$totals1['total']; 				
				
$i=0;
$user = mysqli_query($conn,"SELECT * FROM `copy_staff` where 1=1  and is_admin!='1' and delete_status='0'");   
while($user1 = mysqli_fetch_array($user))
{$i++;



?>
                    <tr class="post <?php echo $user1['id']; ?>-444" id="<?php echo $user1['id']; ?>-444">
                     <td><a href="<?php echo $web_url; ?>create-staff-edit/<?php echo $user1['id']; ?>"><span style="color:blue;"><?php echo $user1['name'];?></span><br><span style="color:orange;"><?php echo $user1['phone_number'];?></span></a></td>
					 <td>
					 <a href="#" class="switchery" id="<?php echo $user1['id']; ?>-333"><i class="material-icons">delete</i></a></td>
                  </tr>
<?php } ?>	
  
<?php if( $count_vals==0)   {?> <tr>
                     <td colspan="2"><span style="color:red;">No Data Fund</span></td>
					
                  </tr> <?php } ?>			
                </tfoot>
              </table>
            </div>
          </div>
        </div>
     

	 </div>
    </div>
  </div>


</div>

          </div>
        </div>
      </div>
    </div>
<a href="<?php echo $web_url; ?>create-staff" id="fixedbutton" class="btn waves-effect waves-light invoice-create border-round z-depth-4">
      <i class="material-icons" style="    font-size: 2rem;
    line-height: inherit;
    margin-top: 0px;">add</i>

    </a>		
<?php include("footer.php");?>
<script>  
 $(document).ready(function(){   
 $(document).on('click','.switchery',function() {
var status_id = $(this).attr('id');
var table = 'copy_staff';
$('#overlaynew').show();
var param = {status_id: status_id,table:table};	

swal({
    title: "Are you sure?",
    text: "Do you want to delete!",
    icon: 'warning',
    dangerMode: true,
    buttons: {
      cancel: 'No, Please!',
      delete: 'Yes, Delete It'
    }
  }).then(function (willDelete) {
    if (willDelete) {
		
		$.ajax({  
                url:"insert.php",  
                method:"POST",  
               data: param,  
                success:function(data){  
		
					 $('.'+data).hide();
						$('#overlaynew').hide();
	
						
                }  
           }); 
		
      swal("Successfully Deleted!", {
        icon: "success",
      });
    } else {
		 	
      swal("", {
        title: 'Cancelled',
        icon: "error",
      });
$('#overlaynew').hide();
    }
  });
  

          
      });	 
 }); 


 </script>  

