<?php include("config.php");
include('mobile_detect.php');
$detect = new Mobile_Detect();
$buyer = mysqli_query($GLOBALS['connect'],"SELECT count(id) as total FROM `buyer` where 1=1  and delete_status='0'"); 
$buyer1=mysqli_fetch_array($buyer);


$seller = mysqli_query($GLOBALS['connect'],"SELECT count(id) as total FROM `seller` where 1=1  and delete_status='0'"); 
$seller1=mysqli_fetch_array($seller);


$sales = mysqli_query($GLOBALS['connect'],"SELECT sum(litre) as totlitre,sum(amount) as totamount FROM `sales` where 1=1  and delete_status='0'"); 
$sales1=mysqli_fetch_array($sales);


$purchase = mysqli_query($GLOBALS['connect'],"SELECT sum(litre) as totlitre,sum(amount) as totamount FROM `purchase` where 1=1  and delete_status='0'"); 
$purchase1=mysqli_fetch_array($purchase);


?>
<?php include("header.php");?>
<style>
h5 {
    font-size: 17px;
    margin: .82rem 0 .656rem;
}

</style>
<style>

tr {
    border: 2px solid rgba(0,0,0,.12);
    box-shadow: -1px 10px #302a2a0f;
}

</style>
    <div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!--card stats start-->
   <div id="card-stats" class="pt-0">
      <div class="row">
<?php
	$salestot = mysqli_query($conn,"SELECT count(id) as total FROM `project_details` where 1=1 and delete_status='0' $where");   
$salestot1 = mysqli_fetch_array($salestot);
$count_valsales=$salestot1['total']; 	
?>
         <div class="col s12 m6 l6 xl3">
             <div class="card green white-text animate fadeLeft">
			 	<a href="<?php echo $web_url; ?>project" style="color: white;"> 
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                  <i class="material-icons background-round mt-5">timeline</i>
                        <p>PROJECT</p>
                     </div>
                     <div class="col s5 m5 right-align">
					  	   <h5 class="mb-0 white-text"> <?php echo number_format
						($count_valsales);?></h5>
                   
                       
                     </div>
                  </div>
               </div>
			   </a>
            </div>
         </div>
	
 
  
    <div class="col s12 m12 l12">
      <div id="highlight-table" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title" style="    float: left;
    font-weight: bold;">LATEST PROJECT</h4>
         
          <div class="row">
            <div class="col s12">
            </div>
            <div class="col s12">
                <table class="highlight">
			  
			  
			  
          <thead>
<?php if ($detect->isMobile()){?> <?php  } else {?>
		   <tr>
				    <th>S.No</th>
					 <th>Project Name  </th>
                    <th>BANK</th>
                    <th>Company Name</th>
                    <th>Owner</th>
					<th style="width: 11%;">Date</th>
					<th colspan="3">Action</th>

</tr>  <?php } ?>
		  <?php if(1!=1) {?>
				<tr>
              <th>Total Ton<br><span style="color:green;"><?php echo number_format
						($totallitre1['totalton'],2); ?></span></th>
						
			  <th><?php if(1!=1) {?>Total project_details<br><span style="color:orange;"><?php echo number_format
		  ($totallitre1['totalamount'],2); ?></span> <?php } ?></th></tr> <?php } ?>
                </thead>
                <tbody>
							<?php
		
 

$user = mysqli_query($conn,"SELECT * FROM `copy_project_details` where 1=1  and delete_status='0' $where  order by id desc limit 10");   
while($user1 = mysqli_fetch_array($user))
{$i++;
 $row++;

?>	


            
								  
				  <?php if ($detect->isMobile()){?>  <tr class="post <?php echo $user1['id']; ?>-444" id="post_<?php echo $row; ?>">
                     <td><a href="<?php echo $web_url; ?>create-project?step=step1&stepid=<?php echo base64_encode($user1['id']); ?>"><?php echo date("YmdHis",strtotime($user1['date_time'])); ?><br><span style="color:red;">BANK: <?php echo $user1['bank'];?></span></a><a href="<?php echo $web_url; ?>viewprint-<?php echo base64_encode($user1['id']);?>" target="_blank" style="color:green"><i class="material-icons dp48">picture_as_pdf</i>View</a> </td>
					 <td><a href="<?php echo $web_url; ?>create-project?step=step1&stepid=<?php echo base64_encode($user1['id']); ?>"><br><span style="color:#d717b6;">Owner Address: <?php echo $user1['ownerAddress']; ?> </span><br> <span style="color:orange;">Company Name : <?php echo $user1['companyName']; ?></span><span style="color:blue;"><br>
					<span style="color:#ff0000;"> <?php echo date("d-m-Y",strtotime($user1['date']));?></span><br>
					</td>
                  </tr> <?php } else {?>
                  <tr class="post <?php echo $user1['id']; ?>-444" id="post_<?php echo $row; ?>">
				  <td><?php echo $i;?></td>
				   <td><?php echo date("YmdHis",strtotime($user1['date_time'])); ?></td>
                    <td><?php echo $user1['bank'];?></td>
                    <td><?php echo $user1['companyName']; ?></td>
                    <td><?php echo $user1['ownerAddress']; ?></td>
                    <td> <?php echo date("d-m-Y",strtotime($user1['date']));?></td>
                    <td><a href="<?php echo $web_url; ?>viewprint-<?php echo base64_encode($user1['id']);?>" target="_blank" style="color:green"><i class="material-icons dp48">picture_as_pdf</i>View</a></a></td>
						<td></td>
</tr> <?php } ?>
				  
	     
               


 <?php } ?>	
  

                </tbody>
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
      </div>
    </div>
 <?php include("footer.php");?>