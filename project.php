<?php include("config.php");
include('mobile_detect.php');
$detect = new Mobile_Detect();
include('Classes/PHPExcel.php');
$utl=explode("type=",$_SERVER['REQUEST_URI']);
if($utl[1]!='')
{
$_SESSION["typenew"] = $utl[1];
}
if(isset($_REQUEST['submitcopy'])) { 

if($_POST['copyrow']!='')
{

 $copyrow=$_POST['copyrow'];	

$shop = mysqli_query($conn,"INSERT INTO copy_copy_project_details
SELECT * FROM copy_project_details WHERE id = '$copyrow'");

$shop22 = mysqli_query($conn,"SELECT * FROM copy_project_details WHERE id = '$copyrow'");
$fileallaa= mysqli_fetch_array($shop22);

$shop223 = mysqli_query($conn,"SELECT * FROM copy_project_details order by id desc");
$fileallaa3= mysqli_fetch_array($shop223);

 $copyrowall=$fileallaa3['id']+1;

$report_name=$_REQUEST['report_name'];


$report_name22 = mysqli_query($conn,"SELECT * FROM copy_project_details where report_name='$report_name' and delete_status='0' order by id desc");
$report_name21= mysqli_fetch_array($report_name22);


$file_no3=str_replace("AA","",str_replace("EC","",$report_name21['file_no']));


$file_no2=$file_no3+1;

if($report_name=='ARRUL ASSOCIATES') { $file_no1="AA"; } if($report_name=='EVEREST CONSTRUCTION') { $file_no1="EC"; } 

$file_no=$file_no1.''.$file_no2;


$shop = mysqli_query($conn,"UPDATE copy_copy_project_details SET id ='$copyrowall',file_no ='$file_no',report_name ='$report_name'"); 


$shop = mysqli_query($conn,"INSERT INTO copy_project_details
SELECT * FROM copy_copy_project_details WHERE id = '$copyrowall'");

$shop = mysqli_query($conn,"TRUNCATE copy_copy_project_details");


$shopall = mysqli_query($conn,"INSERT INTO copy_copy_project_table SELECT * FROM copy_project_table WHERE project_id = '$copyrow'");
$shopall2 = mysqli_query($conn,"SELECT * FROM copy_project_table order by id desc");
$shopall23= mysqli_fetch_array($shopall2);
 $shopallid=$shopall23['id']+1;

$shopallw = mysqli_query($conn,"UPDATE  copy_copy_project_table SET id ='$shopallid',project_id ='$copyrowall'"); 
 $shopallwa = mysqli_query($conn,"INSERT INTO copy_project_table
SELECT * FROM copy_copy_project_table WHERE id = '$shopallid'");

$shopall = mysqli_query($conn,"TRUNCATE copy_copy_project_table");


}  

} 

if($_POST['from_date']!='' && $_POST['to_date']!='')
{

$from_date=$_POST['from_date'];	
$to_date=$_POST['to_date'];	

$where.="and (date BETWEEN '$from_date' AND '$to_date')";
	
	
}
elseif($_POST['from_date']!='' && $_POST['to_date']=='')
{
$to_date=$_POST['to_date'];	
	
$date=date("Y-m-d");	
	
$where.="and (date BETWEEN '$from_date' AND '$date')";	

}
elseif($_POST['from_date']=='' && $_POST['to_date']!='')
{
	
$to_date=$_POST['to_date'];	
	
	
	
$where.="and date<='$to_date'";	

}


if($_POST['vehicle_type_id']!='' && $_POST['vehicle_type_id']!='0')
{
	
$vehicle_type_id=$_POST['vehicle_type_id'];	
       
	
$where.="and vehicle_type_id='$vehicle_type_id'";		
}


if($_POST['staff_id']!='' && $_POST['staff_id']!='0')
{
	
$staff_id=$_POST['staff_id'];	
	
$where.="and staff_id='$staff_id'";		
}

if($_POST['searchall']!='' && $_POST['searchall']!='0')
{
	
$searchall=$_POST['searchall'];	
	
$where.="and (file_no like '%$searchall%' or  companyName like '%$searchall%'  or  ownerAddress like '%$searchall%'  or  ownerAddress1 like '%$searchall%') ";	

	
}

if($_POST['bank']!='' && $_POST['bank']!='0')
{
	
$bank=$_POST['bank'];	
	
$where.=" and bank like '%$bank%'";		
}

if($_POST['branch']!='' && $_POST['branch']!='0')
{
	
$branch=$_POST['branch'];	
	
$where.=" and branch like '%$branch%'";	
}




if($_SESSION["typenew"]!='' && $_SESSION["typenew"]!='0')
{
	
$type=str_replace("-"," ",$_SESSION["typenew"]);	
	
 $where.="and report_name like '%$type%'";	
}

?>
<?php include("header.php");?>

<style>

tr {
    border: 2px solid rgba(0,0,0,.12);
    box-shadow: -1px 10px #302a2a0f;
}
.card-panel {
    padding: 10px;
    transition: box-shadow .25s;
}
</style>
    <div id="main">
      <div class="row">
        
		<div class="col s12">
          <div class="container">
            <div class="seaction">

  <div class="row">
    <div class="col s12 m12 l12">    
	<div class="users-list-filter">
    <div class="card-panel">
	   
	  	
      <div class="row" style="   ">
	  <div id="overlaynew"><img  id="loadingnew" src="<?php echo $web_url; ?>app-assets/images/logo/logo.jpg" width="150px" height="130px" /></div>
	
        <form action="" method="post" > 
	
	
	<div class="row">
		    <div class="col s6 m6 l4">
<style>
.select-wrapper input.select-dropdown
{
    display: none !important;	
}
</style>
            <div class="input-field col s12">
                <select name="bank" id="bank"  class="select2"   <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="width:50% !important; "<?php } else { ?> style="margin-left: -14px !important;
    width: 104% !important;" <?php } ?>> 
                <option value=""  selected>Name of the Bank</option>
				<?php
$shop = mysqli_query($conn,"SELECT * FROM `bank` where delete_status='0' order by name asc");   
while($shop1 = mysqli_fetch_array($shop))
{
?>					
                <option <?php if($bank==$shop1['id']) {?> selected <?php } ?> value="<?php echo $shop1['id'];?>"><?php echo $shop1['name'];?></option>
<?php } ?>				
              </select>
              </div>
          </div>
		  <div class="col s6 m6 l4">
<style>
.select-wrapper input.select-dropdown
{
    display: none !important;	
}
</style>
            <div class="input-field col s12">
                <select name="branch" id="branch"  class="select2"   <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="width:50% !important; "<?php } else { ?> style="margin-left: -14px !important;
    width: 104% !important;" <?php } ?>> 
                <option value=""  selected>Name of the Branch</option>
				<?php
$shop = mysqli_query($conn,"SELECT * FROM `branch` where delete_status='0' order by branch asc");   
while($shop1 = mysqli_fetch_array($shop))
{
?>					
                <option <?php if($branch==$shop1['id']) {?> selected <?php } ?> value="<?php echo $shop1['id'];?>"><?php echo $shop1['branch'];?></option>
<?php } ?>				
              </select>
              </div>
          </div>
		    <div class="col s6 m6 l4">

            <div class="input-field col s12">
               <input name="searchall" type="text" value="<?php echo $searchall; ?>" id="searchall">
                 <label for="searchall">Search</label>
              </div>
          </div>
		  
         
		  </div>
		  	  <div class="row">
		  <div class="col s6 m6 l4">

            <div class="input-field col s12">
               <input name="from_date" type="date" value="<?php echo $from_date; ?>" id="from_date">
                 <label for="from_date">From Date</label>
              </div>
          </div>
		   <div class="col s6 m6 l4">

            <div class="input-field col s12">
               <input name="to_date" type="date"  value="<?php echo $to_date; ?>" id="to_date">
                 <label for="to_date">To Date</label>
              </div>

          </div> 
			   <div class="col s6 m6 l4 display-flex align-items-center show-btn">
            <button type="submit" class="btn btn-block indigo waves-effect waves-light" style="background:#008068 !important;">Show</button>
			
			<a href="<?php echo $web_url; ?>project" class="mb-6 btn waves-effect waves-light amber darken-4" style="    margin-top: 14px;
    margin-left: 7px;">Clear</a>
          </div>

		  </div>
        </form>
      </div>
    </div>
  </div>
  <?php
$totallitre = mysqli_query($conn,"SELECT sum(ton) as totalton FROM `copy_project_details` where 1=1 and delete_status='0' $where");   
$totallitre1 = mysqli_fetch_array($totallitre);
$total = mysqli_query($conn,"SELECT count(id) as total FROM `copy_project_details` where 1=1 and delete_status='0' $where");   
$total1 = mysqli_fetch_array($total);

  $count_val=$total1['total']; 

?>		  
	
      <div id="responsive-table" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">PROJECT <?php if($type!='') {?> (<?php echo str_replace("-"," ",$type);?>) <?php } ?></h4>
       <div class="row">
            <div class="col s12">
            </div>
            <div class="col s12">
              <table class="highlight">
			  
			  
			  
          <thead>
<?php if ($detect->isMobile()){?> <?php  } else {?>
		   <tr>
				    <th>S.No</th>
					 <th style="    width: 7%;">File No </th>
                    <th>BANK</th>
                    <th>Company Name</th>
                    <th>Owner</th>
					<th style="width: 11%;">Date</th>
					<th style="width: 11%;">Document</th>
					<th style="width: 11%;"></th>
					<th colspan="4">Action</th>

</tr>  <?php } ?>
		  <?php if(1!=1) {?>
				<tr>
              <th>Total Ton<br><span style="color:#008068;"><?php echo number_format
						($totallitre1['totalton'],2); ?></span></th>
						
			  <th><?php if(1!=1) {?>Total copy_project_details<br><span style="color:orange;"><?php echo number_format
		  ($totallitre1['totalamount'],2); ?></span> <?php } ?></th></tr> <?php } ?>
                </thead>
                <tbody>
							<?php
		
 

$user = mysqli_query($conn,"SELECT * FROM `copy_project_details` where 1=1  and delete_status='0' $where order by id desc limit 10");   
while($user1 = mysqli_fetch_array($user))
{$i++;
 $row++;
 
$bank_id=$user1['bank'];
$branch_id=$user1['branch'];
 
$bank = mysqli_query($conn,"SELECT * FROM `bank` where 1=1  and delete_status='0' and id='$bank_id' order by id desc limit 10");   
$bank1 = mysqli_fetch_array($bank);

$branch = mysqli_query($conn,"SELECT * FROM `branch` where 1=1  and delete_status='0'  and id='$branch_id' order by id desc limit 10");   
$branch1 = mysqli_fetch_array($branch);

?>	


            
								  
				  <?php if ($detect->isMobile()){?>  <tr class="post <?php echo $user1['id']; ?>-444" id="post_<?php echo $row; ?>">
            <td><a href="<?php echo $web_url; ?>create-project?step=step1&stepid=<?php echo base64_encode($user1['id']); ?>"><?php echo date("YmdHis",strtotime($user1['date_time'])); ?><br><span style="color:red;">BANK: <?php echo $user1['bank'];?></span></a><a href="<?php echo $web_url; ?>viewprint-<?php echo base64_encode($user1['id']);?>" target="_blank" style="color:#008068"><i class="material-icons dp48">picture_as_pdf</i>View</a> </td>
					 <td><a href="<?php echo $web_url; ?>create-project?step=step1&stepid=<?php echo base64_encode($user1['id']); ?>"><br><span style="color:#d717b6;">Owner Address: <?php echo $user1['ownerAddress']; ?> </span><br> <span style="color:orange;">Company Name : <?php echo $user1['companyName']; ?></span><span style="color:blue;"><br>
					<span style="color:#ff0000;"> <?php echo date("d-m-Y",strtotime($user1['date']));?></span><br>
					 <a  class="switchery" id="<?php echo $user1['id']; ?>-333" style="cursor: pointer; "><i class="material-icons">delete</i></a></a></td>
                  </tr> <?php } else {?>
                  <tr class="post <?php echo $user1['id']; ?>-444" id="post_<?php echo $row; ?>">
				  <td><?php echo $i;?><label><input type="checkbox"   value="" class="change-status" id="<?php echo $user1['id'];?>" <?php  if ($user1['live_status']==1){?> checked <?php } ?> />
                <span style="color: black;"></span>
              </label></td>
				   <td>
             <?php echo $user1['file_no']; ?>
          </td>
                    <td><?php echo $bank1['name'];?>-<?php echo $branch1['branch'];?></td>
                    <td><?php echo $user1['companyName']; ?></td>
                    <td><?php echo $user1['ownerAddress']; ?></td>
                    <td> <?php echo date("d-m-Y",strtotime($user1['date']));?></td>
							  <td><a href="<?php echo $web_url; ?>viewdocument-<?php echo base64_encode($user1['id']);?>" target="_blank" style="color:#008068"><img src="doc2.png">View</a></td>
						
					<td><form action="" method="post">
					<select name="report_name" id="report_name"  class="select2 browser-default" style=" background: white;border:1px solid;" required> 
                <option value="" disabled selected>Select</option>
                <option <?php if($project1['report_name']=='ARRUL ASSOCIATES') {?> selected <?php } ?> value="ARRUL ASSOCIATES" >ARRUL ASSOCIATES</option>
			   <option <?php if($project1['report_name']=='EVEREST CONSTRUCTION') {?> selected <?php } ?> value="EVEREST CONSTRUCTION">EVEREST CONSTRUCTION</option>
              </select>
					<input type="hidden" name="copyrow" value="<?php echo $user1['id']; ?>">
					<input type="submit" name="submitcopy" value="Copy" style=" background: #0b9ea5;
    color: white;
    padding: 5px;
    margin-top: 2px;">
					</form></td>
				
			  <td><a href="<?php echo $web_url; ?>viewprint-<?php echo base64_encode($user1['id']);?>" target="_blank" style="color:#008068"><i class="material-icons dp48">picture_as_pdf</i>View</a></td>
						<td><a href="<?php echo $web_url; ?>create-project?step=step1&stepid=<?php echo base64_encode($user1['id']); ?>" style="color:#008068"><i class="material-icons dp48">edit</i></td>
						 <td><a  class="switchery" id="<?php echo $user1['id']; ?>-333" style="cursor: pointer; "><i class="material-icons">delete</i></a></td>
</tr> <?php } ?>
				  
	     
               


 <?php } ?>	
  
<?php if( $count_val==0)   {?> <tr>
                     <td colspan="3"><span style="color:red;">No Data Fund</span></td>
					
                  </tr> <?php } ?>
                </tbody>
              </table>
			  <?php if( $count_val>10)   {?>
			  <input type="hidden" id="row" value="0">       
<input type="hidden" id="all" value="<?php echo $count_val; ?>">
               <h6 class="btn btn-outline-darker btn-load-more load-more current">Load More <i class="icon-refresh"></i></h6>
			  <?php } ?>
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
<form action="">	
<a href="<?php echo $web_url; ?>create-project" id="fixedbutton" class="btn waves-effect waves-light invoice-create border-round z-depth-4">
<i class="material-icons" style="    font-size: 2rem;
    line-height: inherit;
    margin-top: 0px;">add</i>
</a>

	<?php if(1!=1) {?> 
<a href="<?php echo $web_url; ?>exceldownload/<?php echo $randnum;?>" id="fixedbuttonleft" class="btn waves-effect waves-light invoice-create border-round z-depth-4">
<i class="material-icons" style="    font-size: 2rem;
    line-height: inherit;
    margin-top: 0px;">download</i>
</a>	
	<?php } ?>
<?php include("footer.php");?>
<script>
  $(document).ready(function(){



    // Load more data

		  $('.change-status').on('click', function () 
      { 
        var status=0;
        var id=$(this).attr('id');
        if($(this).is(':checked')==true)
        {
          status=1;
        }
        else
        {
          status=0;
        }

        if(id!="" && id>0)
        {
          $.ajax({
                url: 'ajaxmodel.php',
                type: 'post',
                data: {status_id:status,id:id},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){

                }
            });
        }
        
      });
		  $('.load-more').on('click', function () {
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 10;
        row = row + rowperpage;

		var from_date = "<?php echo $from_date; ?>";
		var to_date = "<?php echo $to_date; ?>";
		var seller_id = "<?php echo $seller_id; ?>";
		var staff_id = "<?php echo $staff_id; ?>";

		
        $('#overlaynew').show();
       
       // var brand= $('#brand').val();
      //  var cat_table= $('#cat_table').val();
// data: {row:row,brand:brand,cat_table:cat_table},
        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getData.php',
                type: 'post',
                data: {row:row,from_date:from_date,to_date:to_date,seller_id:seller_id,staff_id:staff_id},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){


                 
                    setTimeout(function() {
				
						
                        // appending posts after last post with class="post"
                        $(".post:last").after(response).show().fadeIn("fast");
						$('#overlaynew').hide();

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                           // $('.load-more').text("Hide");
						   $('.load-more').hide();
						   
                           // $('.load-more').css("background","darkorchid");
                        }else{
                            $(".load-more").text("Load more");
                        }
                    }, 5);

                }
            });
        }else{
            $('.load-more').text("Loading...");

            // Setting little delay while removing contents
            setTimeout(function() {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.post:nth-child(3)').nextAll('.post').remove();

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Load more");
                $('.load-more').css("background","#15a9ce");
                
            }, 2000);


        }

    });

$(document).on('click','.switchery',function() {
var status_id = $(this).attr('id');
var table = 'copy_project_details';
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

 
 