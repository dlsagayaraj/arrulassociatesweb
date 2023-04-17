<?php

// configuration
include 'config.php';
include('mobile_detect.php');
$detect = new Mobile_Detect();

$row = $_POST['row'];


$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$vehicle_type_id = $_POST['vehicle_type_id'];
$staff_id = $_POST['staff_id'];


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


$rowperpage = 10;



	$result=mysqli_query($conn,"SELECT * FROM `copy_project_details` where 1=1  and delete_status='0' $where order by id desc limit $row,$rowperpage");    



$html = '';

while($user1 = mysqli_fetch_array($result)){ $row++;

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
				  <td><?php echo $row;?></td>
				   <td><?php echo $user1['file_no']; ?></td>
                    <td><?php echo $bank1['name'];?>-<?php echo $branch1['branch'];?></td>
                    <td><?php echo $user1['companyName']; ?></td>
                    <td><?php echo $user1['ownerAddress']; ?></td>
                    <td> <?php echo date("d-m-Y",strtotime($user1['date']));?></td>
							  <td><a href="<?php echo $web_url; ?>viewdocument-<?php echo base64_encode($user1['id']);?>" target="_blank" style="color:#008068"><i class="material-icons dp48">picture_as_pdf</i>View</a></td>
						
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

