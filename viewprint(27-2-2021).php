<?php include("config.php");
include('Classes/PHPExcel.php');
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

$edit_id=base64_decode($_REQUEST['check']);

$project = mysqli_query($conn,"SELECT * FROM `project_details` where 1=1 and id='$edit_id' ");   
$project1 = mysqli_fetch_array($project);

?>
<?php include("header.php");?>
<style>
table.highlight>tbody>tr:hover, table.striped>tbody>tr:nth-child(odd) {
    background-color: white;
}
tr {
    border: 0px solid rgba(0,0,0,.12);
    box-shadow: -1px 0px #302a2a0f;
}
.check {
color: black;font-size: 26px;font-weight: 
}
.check1 {
color: black;font-size: 26px;font-weight: bold;
}
td, th {
    padding: 10px 10px;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/pages/app-invoice.min.css">
 <div id="main">
      <div class="row">
        <div class="content-wrapper-before blue-grey lighten-5"></div>
        <div class="col s12">
          <div class="container">
            <!-- app invoice View Page -->
<section class="invoice-view-wrapper section">
  <div class="row">
    <!-- invoice view page -->
    <div class="col xl9 m8 s12">
      <div class="card" style="padding: 13px;
	  
	  
	     ">
        <div class="card-content invoice-print-area" style="font-size: 10px;">
          <!-- header section -->
          <div class="row invoice-date-number">
		  <div class="col xl12 s12" style="
    font-size: 26px;
    font-weight: bold;    margin-left: 35%">
              <span class="invoice-number mr-1" style="    border-bottom: 1px solid;">VALUATION REPORT</span>
             
            </div>
       
          </div>
          <!-- logo and title -->
     
          <div class="divider mb-3 mt-3"></div>
          <!-- invoice address and contact -->
		  
          <div class="row invoice-info">
            <div class="col m6 s12">
			<table class="striped responsive-table" style="">
    <tbody>
                <tr>
                  <td style="border:0px solid;">Name of the Bank</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['bank']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Loan Amount</td>
                  <td style="border:0px solid;">: <?php echo $project1['loanAmount'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Company Name</td>
                  <td style="border:0px solid;">: <?php echo $project1['companyName'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Name of Applicant</td>
                  <td style="border:0px solid;">:</td>
                </tr>
				<tr>
                  <td colspan="2" style="border:0px solid;height:50px;"><?php $expld=explode("--",$project1['ownerAddress']);?> 
				   <?php foreach ($expld as $expld1) { echo $expld1; echo "<br>"; } ?></td>

                </tr>
				
				</table>
	
            </div>
            <div class="col m6 s12" style="">
             
			 	<table class="striped responsive-table" style="margin-left:-31px;">
    <tbody>
                <tr>
                  <td style="border:0px solid;">Date</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['date']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Inspected</td>
                  <td style="border:0px solid;">: <?php echo $project1['inspected'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Advance Amount</td>
                  <td style="border:0px solid;">: <?php echo $project1['advanceAmount'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Name of the Purchaser</td>
                  <td style="border:0px solid;">: </td>
                </tr>
				<tr>
                  <td colspan="2" style="border:0px solid;height:50px;"><?php echo ucwords($project1['purchaseAddress']);?></td>

                </tr>
				
				</table>
			 
			 
	
            </div>
          </div>
		  
		  <div class="row invoice-info">
            <div class="col m6 s12">
             <table class="striped responsive-table" style="border:0px solid;border-left: 1px solid;border-right: 1px solid;border-top: 1px solid;">
    <tbody>
	 <tr>
<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;">Residential Address: </td>


 </tr>
	
                <tr>
                  <td style="border:0px solid;height:10px;">i)Door No</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['odoorno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">ii)Street</td>
                  <td style="border:0px solid;height:10px;">: <?php echo $project1['ostreet'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">iii)Area</td>
                  <td style="border:0px solid;height:10px;">: <?php echo $project1['oarea'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">iv)Post</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['opost']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">v)Taluk</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['otaluk']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vi)District</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['odistrict']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vi)Pincode</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['opincode']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vi)Contact</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['ocontact']);?></td>
                </tr>
				 
				  <tr>


<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;">Property Address: </td>

</tr>
				<tr>
                  <td style="border:0px solid;border-left:1px solid;">i)Door No</td>
                  <td style="border:0px solid;border-right:1px solid;">: <?php echo ucwords($project1['propertydoorno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">ii)Street</td>
                  <td style="border:0px solid;height:10px;">: <?php echo $project1['propertystreet'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">iii)Area</td>
                  <td style="border:0px solid;height:10px;">: <?php echo $project1['propertyarea'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">iv)Panchayat</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['propertyvillage']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">v)Taluk</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['propertytaluk']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vi)District</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['propertydistict']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vii)Pincode</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['propertypincode']);?></td>
                </tr>
			<tr>
                  <td style="border:0px solid;height:35px;"></td>
                  <td style="border:0px solid;height:30px;"></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:35px;"></td>
                  <td style="border:0px solid;height:30px;"></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:35px;"></td>
                  <td style="border:0px solid;height:30px;"></td>
                </tr>
		
				<tr>
                  <td style="border:0px solid; height: 10px;border-top: 1px solid;">i)Land Mark</td>
                  <td style="border:0px solid;border-top: 1px solid;">: <?php echo ucwords($project1['landmark']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height:10px;">ii) Nearest Bus Stop </td>
                  <td style="border:0px solid;height:10px;">: <?php echo $project1['nearestbustop'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height:10px;">iii) Distance of Branch</td>
                  <td style="border:0px solid;">: <?php echo $project1['distanceofbranch'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">iv) Distance of R.S</td>
                  <td style="border:0px solid;height: 10px;">: <?php echo ucwords($project1['distanceofrs']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height:10px;">v) Nearest Main Road </td>
                  <td style="border:0px solid;height: 10px;">: <?php echo ucwords($project1['nearestmainroad']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vi) Civil Amenities</td>
                  <td style="border:0px solid;height:10px;;border-right:1px solid;">: <?php echo ucwords($project1['civilamenities']);?></td>
                </tr>
				
				</table>
			
            </div>
            <div class="col m6 s12" style="">
             
			 
			     <table class="striped responsive-table" style="border:0px solid;border-right: 1px solid;border-top: 1px solid;margin-left: -31px;">
    <tbody>
	 <tr>


<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-right:1px solid;">Purchaser Address: </td>


 </tr>
                <tr>
                  <td style="border:0px solid;height:10px;">i) Door No</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['pdoorno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">ii) Street</td>
                  <td style="border:0px solid;height:10px;">: <?php echo $project1['pstreet'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">iii) Area</td>
                  <td style="border:0px solid;height:10px;">: <?php echo $project1['parea'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">iv) Village</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['pvillage']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">v) Taluk</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['ptaluk']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">vi) District</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['pdistrict']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">vi) Pincode</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['ppincode']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">vi) Contact</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['pcontact']);?></td>
                </tr>
				
				 <tr>


<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-right:1px solid;">Revenue Details: </td>


 </tr>

				 <tr>
                  <td style="border:0px solid;height:10px;">i) Old S.F No</td>
                  <td style="border:0px solid;height:10px;">: <?php echo ucwords($project1['oldsfno']);?></td>

                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">ii) S.F NO</td>
                  <td style="border:0px solid;">: <?php echo $project1['sfno'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">iii) Patta No</td>
                  <td style="border:0px solid;">: <?php echo $project1['pattano'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">iv) R.S.F No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['rsfno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">v) Block No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['blockno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">vi) Pymash No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['pymashno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height: 10px;">vii) T.S.No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['tsno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vii) Ward No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['wardno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vii) S.R.O</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['sro']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:10px;">vii) Plot No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['plotno']);?></td>
                </tr>
				 <tr>
                  <td style="border:0px solid;border-top: 1px solid;10px">i) Property Occupied</td>
                  <td style="border:0px solid;height: 10px;border-top: 1px solid;">:  <?php echo ucfirst($project1['propertyoccupied']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">ii) Tax Receipt </td>
                  <td style="border:0px solid;height: 10px;">: <?php echo $project1['taxreceipt']; ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iii) E.B. Service No</td>
                  <td style="border:0px solid;height: 10px;">: <?php echo $project1['ebserviceno']; ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iv) Patta / DTCP</td>
                  <td style="border:0px solid;height: 10px;">: <?php echo $project1['pattadtcp']; ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">v) Approval Plan</td>
                  <td style="border:0px solid;height: 10px;">: <?php echo $project1['approvalplan']; ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vi) H.D Line</td>
                  <td style="border:0px solid;height: 10px;">: <?php echo $project1['hdline']; ?></td>
                </tr>
		
				
				
				</table>
			
            </div>
          </div>
		 

		     <div class="col m12 s12" style="">
	
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;">
              <thead>
                <tr>
                  <th style="border:0px solid;border-top:1px solid;    border-left: 1px solid;border-right: 1px solid;">Direction</th>
                  <th style="border:0px solid;border-top:1px solid;    border-left: 1px solid;    border-right: 1px solid;">Boundary details of the property</th>
                  <th colspan="3" style="border:1px solid;">Dimensions		</th>
                </tr>
				<tr>
                  <th style="border:0px solid;border-bottom:1px solid;    border-left: 1px solid;border-right: 1px solid;"></th>
                  <th style="border:0px solid;border-bottom:1px solid;    border-left: 1px solid;border-right: 1px solid;"></th>
                  <th style="border:1px solid;">Patta</th>
                  <th style="border:1px solid;">Document</th>
				  <th style="border:1px solid;">Actual</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="border:1px solid;">North</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">South</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['southboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['southdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['southremarks']);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">East</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['eastboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['eastdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['eastremarks']);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">West</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['westboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['westdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['westremarks']);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
                 
                </tr>
				
				<tr>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;">Extent of site</td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
				  <td style="border:1px solid;"></td>
                 
                </tr>
               
              </tbody>
            </table>
       
		  </div>
		
		<!-- product details table-->
          <div class="invoice-product-details">
            <table class="striped responsive-table" style="border:1px solid;width: 95%;margin-left:4px;">
            
              <tbody>
			  <?php
			  $typeofproperty2=explode(",",$project1['typeofproperty']);	
$counttypeofproperty=count($typeofproperty);
$sizeofplot2=explode(",",$project1['sizeofplot']);
$recentdevelopmentsnear2=explode(",",$project1['recentdevelopmentsnear']);
$resentsaledetails2=explode(",",$project1['resentsaledetails']);
$classofconstruction2=explode(",",$project1['classofconstruction']);
$limits2=explode(",",$project1['limits']);
$roof2=explode(",",$project1['roof']);
foreach($typeofproperty2 as $countproper =>$key) {?>
                <tr>
                  <td style="border:0px solid;    width: 36%;">1.Type of Property </td>
                  <td style="border:0px solid;">: <?php echo select_value_other("typeofproperty","name",$typeofproperty2[$countproper]); ?></td>
				 
                </tr>
				<tr>
                  <td style="border:0px solid;">2.Size of Plot  </td>
          
				     <td style="border:0px solid;">: <?php echo select_value_other("sizeofplot","name",$sizeofplot2[$countproper]); ?></td>
			
                </tr>
				<tr>
                  <td style="border:0px solid;">3.Development to Site  </td>
              
              <td style="border:0px solid;">: <?php echo select_value_other("recentdevelopments","name",$recentdevelopmentsnear2[$countproper]); ?></td>

                </tr>
			
				<tr>
                 <td style="border:0px solid;">4.Resent Sale Details  </td>
        
			
				<td style="border:0px solid;">: <?php echo $project1['resentsaledetails'];?></td>  
				
			
				
                </tr>
				<tr>
                 <td style="border:0px solid;">5.Class of Construction   </td>
      
  <td style="border:0px solid;">: <?php echo select_value_other("classofconstruction","name",$classofconstruction2[$countproper]); ?></td>	
				 
                </tr>
				<tr>
                 <td style="border:0px solid;">6.Control Limit  </td>
         
  <td style="border:0px solid;">: <?php echo select_value_other("limits","name",$limits2[$countproper]); ?></td>	
			
                </tr>
				<tr>
                 <td style="border:0px solid;">7.Type of Roof  </td>

				  
  <td style="border:0px solid;">: <?php echo select_value_other("roof","name",$roof2[$countproper]); ?></td>
			
                </tr>

<?php } ?>
				
				
               
              </tbody>
            </table>
          </div>
		  <div class="col m12 s12" style="">
	
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;">
              <thead>
              
				<tr>
                  <th style="border:0px solid;border-top:1px solid;border-left:1px solid;border-right:1px solid;">S.No</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Description of the property</th>
				  <th colspan="2" style="border:0px solid;border-top:1px solid;border-right:1px solid;border-bottom:1px solid;">Size</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Area</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Rate</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Year</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Type of Roofing</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Deprciation</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Total</th>
                </tr>
					<tr>
                  <th style="border:0px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">L</th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">B</th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">Sq.Ft</th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
				   <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="border:1px solid;">1</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				   <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				    <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					 <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					   <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					   
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">2</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				   <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				    <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					 <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					   <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					   
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">3</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				   <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
				    <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					 <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					   <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					   
                 
                </tr>
				<tr>
                  
                  <td colspan="9" style="text-align:right;border:1px solid;">Grand Total:	</td>
       
					   <td colspan="1" style="text-align:right;border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
					   
                 
                </tr>
				
			
               
              </tbody>
            </table>
       
		  </div>
		
	  <div class="row invoice-info">
            <div class="col m6 s12">
			<table class="striped responsive-table" style="border:1px solid;">
    <tbody>
	           <tr >
                  <td style="border:0px solid;border-bottom:1px solid;">Services</td>
                  <td style="border:0px solid;border-bottom:1px solid;"></td>
                </tr>
                <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Water Supply Arrangements</td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo ucwords($project1['watersupplyarrangementsRs']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Drainage Arrangements</td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo ucwords($project1['drainagearrangementsRs']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Compound Wall L <br><table style="    border: 1px solid;
    width: 108.5%;
    margin-left: -10px;
    margin-bottom: -11px;"><tr><td style="border-right: 1px solid;border-top: 1px solid;">L-</td><td style="border-right: 1px solid;border-top: 1px solid;">H-</td></table></td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo $project1['compoundwallRs'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">E.B Deposit</td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo $project1['ebdepositRs'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:50px;border-bottom:1px solid;border-right:1px solid;">Pavar/Cement/Tiles</td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo $project1['paverrs'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"><table style="    border: 1px solid;
    border-bottom: 1px solid;
    width: 107.5%;
    margin-left: -11px;
    margin-bottom: -11px;
    margin-top: -11px;"><tr><td  style="border-right:1px solid;border-bottom:1px solid;">Sump</td><td style="border-bottom:1px solid">Rs.<?php echo $project1['sump'];?></td></tr><tr><td style="border-right:1px solid;border-bottom:1px solid;">OH Tank</td><td style="border-bottom:1px solid">Rs.<?php echo $project1['oht'];?></td></tr><tr><td style="border-right:1px solid;border-bottom:1px solid;">Sintex</td><td style="border-bottom:1px solid">Rs.<?php echo $project1['sintex'];?></td></tr></table></td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo $project1['sumpohtRs'];?></td>
                </tr>
					<tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Interior / Exterior </td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo $project1['interiorworkRs'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Open / Stair head  </td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo $project1['openstaircaseRs'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Total  </td>
                  <td style="border:0px solid;border-bottom:1px solid;"> Rs. <?php echo $project1['serviceovertotal'];?></td>
                </tr>
				</table>
	
            </div>
            <div class="col m6 s12" style="">
             
			 	<table class="striped responsive-table" style="margin-left:-32px;border:1px solid;">
    <tbody>
	 <tr>
                  <td style="border:0px solid;border-bottom:1px solid;">General Information				
</td>
                  <td style="border:0px solid;border-bottom:1px solid;"></td>
                </tr>
                <tr>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">Type of Construction</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-bottom:1px solid;">: <?php echo select_value_other("typeofconstruction","name",$project1['typeofconstruction']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:70px;border-bottom:1px solid;">Building Maintenance</td>
                  <td style="border:0px solid;border-bottom:1px solid;">: <?php echo select_value_other("maintananceofthebuilding","name",$project1['maintenanceofthebuilding']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">Drainage Arrangements</td>
                  <td style="border:0px solid;border-bottom:1px solid;">: <?php echo select_value_other("drainagearrangements","name",$project1['drainagearrangements']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">Character of Locality</td>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">: <?php echo select_value_other("characteroflocality","name",$project1['characteroflocality']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:50px;border-bottom:1px solid;">Road Facilities <br>Wide : <span style="text-decoration: underline;"><?php echo $project1['roadfacilities'];?></span> </td>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">: <?php echo select_value_other("roadfacilities","name",$project1['roadfacilitiesyes']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">Water Supply Arrangements</td>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">: <?php echo select_value_other("watersupplyarrangements","name",$project1['watersupplyarrangements']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">Type of Plot</td>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">: <?php echo select_value_other("cornerintermittentcommerciallot","name",$project1['cornerplotintermittentplot']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">Joineries</td>
                  <td style="border:0px solid;height:60px;border-bottom:1px solid;">: <?php echo select_value_other("joineries","name",$project1['joineries']); ?></td>
                </tr>
				
				</table>
			 
			 
	
            </div>
          </div>	  

<?php if(1!=1)
{?>
		  <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
              <thead>
                <tr>
                  <th style="border:1px solid;">Floor</th>
                  <th style="border:1px solid;">Sq.ft </th>
                  <th style="border:1px solid;">Rate</th>
                  <th style="border:1px solid;">Year</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="    border: 1px solid;
    height: 450px;"></td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                 
                </tr>
				
               
              </tbody>
            </table>
       
<?php } ?> 
		
		</div>
      </div>
    </div>
    <!-- invoice action  -->
    <div class="col xl3 m4 s12">
      <div class="card invoice-action-wrapper">
        <div class="card-content">
     
          <div class="invoice-action-btn">
            <a href="#" class="btn-block btn btn-light-indigo waves-effect waves-light invoice-print" style="    color: white !important;">
              <span>Print</span>
            </a>
          </div>
   
        </div>
      </div>
    </div>
  </div>
</section><!-- START RIGHT SIDEBAR NAV -->
<aside id="right-sidebar-nav">
  <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
    <div class="row">
      <div class="slide-out-right-title">
        <div class="col s12 border-bottom-1 pb-0 pt-1">
          <div class="row">
            <div class="col s2 pr-0 center">
              <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
            </div>
            <div class="col s10 pl-0">
              <ul class="tabs">
                <li class="tab col s4 p-0">
                  <a href="#messages" class="active">
                    <span>Messages</span>
                  </a>
                </li>
                <li class="tab col s4 p-0">
                  <a href="#settings">
                    <span>Settings</span>
                  </a>
                </li>
                <li class="tab col s4 p-0">
                  <a href="#activity">
                    <span>Activity</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="slide-out-right-body row pl-3">
        <div id="messages" class="col s12 pb-0">
          <div class="collection border-none mb-0">
            <input class="header-search-input mt-4 mb-2" type="text" name="Search" placeholder="Search Messages" />
            <ul class="collection right-sidebar-chat p-0 mb-0">
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Elizabeth Elliott</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                </div>
                <span class="secondary-content medium-small">5.00 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Mary Adams</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                </div>
                <span class="secondary-content medium-small">4.14 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-off avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-2.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Caleb Richards</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                </div>
                <span class="secondary-content medium-small">4.14 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-3.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Caleb Richards</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Keny !</p>
                </div>
                <span class="secondary-content medium-small">9.00 PM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-4.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">June Lane</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Ohh God</p>
                </div>
                <span class="secondary-content medium-small">4.14 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-off avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-5.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Edward Fletcher</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Love you</p>
                </div>
                <span class="secondary-content medium-small">5.15 PM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-6.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Crystal Bates</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can we</p>
                </div>
                <span class="secondary-content medium-small">8.00 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-off avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Nathan Watts</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Great!</p>
                </div>
                <span class="secondary-content medium-small">9.53 PM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-off avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-8.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Willard Wood</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Do it</p>
                </div>
                <span class="secondary-content medium-small">4.20 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Ronnie Ellis</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Got that</p>
                </div>
                <span class="secondary-content medium-small">5.20 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-9.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Daniel Russell</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                </div>
                <span class="secondary-content medium-small">12.00 AM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-off avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-10.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Sarah Graves</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Okay you</p>
                </div>
                <span class="secondary-content medium-small">11.14 PM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-off avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-11.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Andrew Hoffman</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can do</p>
                </div>
                <span class="secondary-content medium-small">7.30 PM</span>
              </li>
              <li class="collection-item right-sidebar-chat-item sidenav-trigger display-flex avatar pl-5 pb-0"
                data-target="slide-out-chat">
                <span class="avatar-status avatar-online avatar-50"><img
                    src="../../../app-assets/images/avatar/avatar-12.png" alt="avatar" />
                  <i></i>
                </span>
                <div class="user-content">
                  <h6 class="line-height-0">Camila Lynch</h6>
                  <p class="medium-small blue-grey-text text-lighten-3 pt-3">Leave it</p>
                </div>
                <span class="secondary-content medium-small">2.00 PM</span>
              </li>
            </ul>
          </div>
        </div>
        <div id="settings" class="col s12">
          <p class="setting-header mt-8 mb-3 ml-5 font-weight-900">GENERAL SETTINGS</p>
          <ul class="collection border-none">
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Notifications</span>
                <div class="switch right">
                  <label>
                    <input checked type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Show recent activity</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Show recent activity</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Show Task statistics</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Show your emails</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Email Notifications</span>
                <div class="switch right">
                  <label>
                    <input checked type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
          </ul>
          <p class="setting-header mt-7 mb-3 ml-5 font-weight-900">SYSTEM SETTINGS</p>
          <ul class="collection border-none">
            <li class="collection-item border-none">
              <div class="m-0">
                <span>System Logs</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Error Reporting</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Applications Logs</span>
                <div class="switch right">
                  <label>
                    <input checked type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Backup Servers</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
            <li class="collection-item border-none">
              <div class="m-0">
                <span>Audit Logs</span>
                <div class="switch right">
                  <label>
                    <input type="checkbox" />
                    <span class="lever"></span>
                  </label>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div id="activity" class="col s12">
          <div class="activity">
            <p class="mt-5 mb-0 ml-5 font-weight-900">SYSTEM LOGS</p>
            <ul class="widget-timeline mb-0">
              <li class="timeline-items timeline-icon-green active">
                <div class="timeline-time">Today</div>
                <h6 class="timeline-title">Homepage mockup design</h6>
                <p class="timeline-text">Melissa liked your activity.</p>
                <div class="timeline-content orange-text">Important</div>
              </li>
              <li class="timeline-items timeline-icon-cyan active">
                <div class="timeline-time">10 min</div>
                <h6 class="timeline-title">Melissa liked your activity Drinks.</h6>
                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                <div class="timeline-content green-text">Resolved</div>
              </li>
              <li class="timeline-items timeline-icon-red active">
                <div class="timeline-time">30 mins</div>
                <h6 class="timeline-title">12 new users registered</h6>
                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                <div class="timeline-content">
                  <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25"
                    class="mr-1">Registration.doc
                </div>
              </li>
              <li class="timeline-items timeline-icon-indigo active">
                <div class="timeline-time">2 Hrs</div>
                <h6 class="timeline-title">Tina is attending your activity</h6>
                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                <div class="timeline-content">
                  <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25"
                    class="mr-1">Activity.doc
                </div>
              </li>
              <li class="timeline-items timeline-icon-orange">
                <div class="timeline-time">5 hrs</div>
                <h6 class="timeline-title">Josh is now following you</h6>
                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                <div class="timeline-content red-text">Pending</div>
              </li>
            </ul>
            <p class="mt-5 mb-0 ml-5 font-weight-900">APPLICATIONS LOGS</p>
            <ul class="widget-timeline mb-0">
              <li class="timeline-items timeline-icon-green active">
                <div class="timeline-time">Just now</div>
                <h6 class="timeline-title">New order received urgent</h6>
                <p class="timeline-text">Melissa liked your activity.</p>
                <div class="timeline-content orange-text">Important</div>
              </li>
              <li class="timeline-items timeline-icon-cyan active">
                <div class="timeline-time">05 min</div>
                <h6 class="timeline-title">System shutdown.</h6>
                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                <div class="timeline-content blue-text">Urgent</div>
              </li>
              <li class="timeline-items timeline-icon-red">
                <div class="timeline-time">20 mins</div>
                <h6 class="timeline-title">Database overloaded 89%</h6>
                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                <div class="timeline-content">
                  <img src="../../../app-assets/images/icon/pdf.png" alt="document" height="30" width="25"
                    class="mr-1">Database-log.doc
                </div>
              </li>
            </ul>
            <p class="mt-5 mb-0 ml-5 font-weight-900">SERVER LOGS</p>
            <ul class="widget-timeline mb-0">
              <li class="timeline-items timeline-icon-green active">
                <div class="timeline-time">10 min</div>
                <h6 class="timeline-title">System error</h6>
                <p class="timeline-text">Melissa liked your activity.</p>
                <div class="timeline-content red-text">Error</div>
              </li>
              <li class="timeline-items timeline-icon-cyan">
                <div class="timeline-time">1 min</div>
                <h6 class="timeline-title">Production server down.</h6>
                <p class="timeline-text">Here are some news feed interactions concepts.</p>
                <div class="timeline-content blue-text">Urgent</div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Slide Out Chat -->
  <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat">
    <li class="center-align pt-2 pb-2 sidenav-close chat-head">
      <a href="#!"><i class="material-icons mr-0">chevron_left</i>Elizabeth Elliott</a>
    </li>
    <li class="chat-body">
      <ul class="collection">
        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
          <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
              alt="avatar" />
          </span>
          <div class="user-content speech-bubble">
            <p class="medium-small">hello!</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
          <div class="user-content speech-bubble-right">
            <p class="medium-small">How can we help? We're here for you!</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
          <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
              alt="avatar" />
          </span>
          <div class="user-content speech-bubble">
            <p class="medium-small">I am looking for the best admin template.?</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
          <div class="user-content speech-bubble-right">
            <p class="medium-small">Materialize admin is the responsive materializecss admin template.</p>
          </div>
        </li>

        <li class="collection-item display-grid width-100 center-align">
          <p>8:20 a.m.</p>
        </li>

        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
          <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
              alt="avatar" />
          </span>
          <div class="user-content speech-bubble">
            <p class="medium-small">Ohh! very nice</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
          <div class="user-content speech-bubble-right">
            <p class="medium-small">Thank you.</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
          <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
              alt="avatar" />
          </span>
          <div class="user-content speech-bubble">
            <p class="medium-small">How can I purchase it?</p>
          </div>
        </li>

        <li class="collection-item display-grid width-100 center-align">
          <p>9:00 a.m.</p>
        </li>

        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
          <div class="user-content speech-bubble-right">
            <p class="medium-small">From ThemeForest.</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
          <div class="user-content speech-bubble-right">
            <p class="medium-small">Only $24</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
          <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
              alt="avatar" />
          </span>
          <div class="user-content speech-bubble">
            <p class="medium-small">Ohh! Thank you.</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
          <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
              alt="avatar" />
          </span>
          <div class="user-content speech-bubble">
            <p class="medium-small">I will purchase it for sure.</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
          <div class="user-content speech-bubble-right">
            <p class="medium-small">Great, Feel free to get in touch on</p>
          </div>
        </li>
        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
          <div class="user-content speech-bubble-right">
            <p class="medium-small">https://pixinvent.ticksy.com/</p>
          </div>
        </li>
      </ul>
    </li>
    <li class="center-align chat-footer">
      <form class="col s12" onsubmit="slideOutChat()" action="javascript:void(0);">
        <div class="input-field">
          <input id="icon_prefix" type="text" class="search" />
          <label for="icon_prefix">Type here..</label>
          <a onclick="slideOutChat()"><i class="material-icons prefix">send</i></a>
        </div>
      </form>
    </li>
  </ul>
</aside>
<!-- END RIGHT SIDEBAR NAV -->
          </div>
          <div class="content-overlay"></div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->
	
	
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
<script src="<?php echo $web_url; ?>app-assets/js/scripts/app-invoice.min.js"></script>
<script>
  $(document).ready(function(){



    // Load more data

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
var table = 'project_details';
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

 
 