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
    padding: 1px 10px;
}
tr {
    border: 0px solid rgba(0,0,0,.12);
    box-shadow: 0px 0px #302a2a0f;
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
      <div class="card" style="padding: 13px;">
<?php 	  
$totallandvalue22=explode(",",$project1['totallandvalue']);		
    $countot2=count($totallandvalue22); 

?>	  
        <div class="card-content invoice-print-area" <?php if($countot2=='1') {?> style="font-size: 9px;" <?php } else {?> style="font-size: 9px;" <?php } ?>>
          <!-- header section -->
          <div class="row invoice-date-number">
		     <div class="col m3 s3">
		     </div>
		     <div class="col m6 s6" style="margin-top: -13px;">
			 <span class="invoice-number" style="    border-bottom: 1px solid;
    font-size: 15px;
    font-weight: bold;    margin-left: -100px;"><?php echo strtoupper($project1['report_name']);?></span>
			 </div>
			 <div class="col m3 s3">
		     </div>
       
          </div>

		  
          <div class="row invoice-info">
            <div class="col m6 s12">
			<table class="striped responsive-table" style="">
    <tbody>
                <tr>
                  <td style="border:0px solid;">Name of the Bank</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['bank']);?> <?php if(1!=1) {?> <?php echo str_replace("-","",$project1['date']);?><?php } ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Loan Amount</td>
                  <td style="border:0px solid;">:<?php if($project1['loanAmount']!='') {?>Rs.<?php } ?><?php echo $project1['loanAmount'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;width: 40%;">Company Name</td>
                  <td style="border:0px solid;">: <?php echo $project1['companyName'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Name of Applicant</td>
                  <td style="border:0px solid;">:<?php $first_cap=explode("--",str_replace(","," ",$project1['first_cap'])); $second_cap=explode("--",str_replace(","," ",$project1['second_cap'])); $ownerAddress1=explode("--",str_replace(","," ",$project1['ownerAddress1'])); $expld=explode("--",str_replace(","," ",$project1['ownerAddress']));?> 
				   <?php $i=0; foreach ($expld as $expld1) { $i++;  $va=$i-1; echo $first_cap[$va]; echo $expld1." "; echo $second_cap[$va].""; echo $ownerAddress1[$va]; if($i>=1) { echo "<br>"; } } ?></td>
                </tr>
				
				
				</table>
	
            </div>
            <div class="col m6 s12" style="">
             
			 	<table class="striped responsive-table" style="margin-left:-31px;">
    <tbody>
                <tr>
                  <td style="border:0px solid;">Date</td>
                  <td style="border:0px solid;">: <?php echo ucwords(date("d-m-Y",strtotime($project1['date'])));?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Inspected</td>
                  <td style="border:0px solid;">: <?php echo $project1['inspected'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Advance Amount</td>
                  <td style="border:0px solid;">: <?php if($project1['advanceAmount']!='') {?>Rs.<?php } ?><?php echo $project1['advanceAmount'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Name of the Purchaser</td>
                  <td style="border:0px solid;">:<?php echo ucwords($project1['purchaseAddress']);?> </td>
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
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Door No</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['odoorno']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Street</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['ostreet'];?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Area</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['oarea'];?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Post</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['opost']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Taluk</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['otaluk']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>District</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['odistrict']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Pincode</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['opincode']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Contact</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['ocontact']);?></td>
                </tr>
				 
				  <tr>


<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;">Property Address: </td>

</tr>
				<tr>
                  <td style="border:0px solid;border-left:1px solid;">Door No</td>
                  <td style="border:0px solid;border-right:1px solid;">: <?php echo ucwords($project1['propertydoorno']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Street</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['propertystreet'];?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Area</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['propertyarea'];?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Post Limit</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['propertyvillage']);?> <?php echo strtoupper($project1['property_address_limit']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Taluk</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['propertytaluk']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>District</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['propertydistict']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Pincode</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['propertypincode']);?></td>
                </tr>
		
		
				<tr>
                  <td style="border:0px solid; height:20px;border-top: 1px solid;   width: 40%;">Land Mark</td>
                  <td style="border:0px solid;border-top: 1px solid;">: <?php echo ucwords($project1['landmark']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Nearest Bus Stop </td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['nearestbustop'];?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Distance of Branch</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo str_replace("Km","",$project1['distanceofbranch']);?><?php if($project1['distanceofbranch']!='') {?>Km<?php } ?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Distance of R.S</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo str_replace("Km","",$project1['distanceofrs']);?><?php if($project1['distanceofrs']!='') {?>Km<?php } ?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Nearest Main Road </td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['nearestmainroad']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Civil Amenities</td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['civilamenities']);?></td>
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
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Door No</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['pdoorno']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Street</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['pstreet'];?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Area</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['parea'];?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Village</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['pvillage']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Taluk</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['ptaluk']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>District</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['pdistrict']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Pincode</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['ppincode']);?></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Contact</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo ucwords($project1['pcontact']);?></td>
                </tr>
				
				 <tr>


<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-right:1px solid;">Revenue Details: </td>


 </tr>

				 <tr>
                  <td style="border:0px solid;height:20px;    width: 50%;    margin-left: 15px;">Old S.F No <span style="margin-left:16%;">:<?php echo ucwords($project1['oldsfno']);?></span> </td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Ward No <span style="margin-left:20%;">: <?php echo ucwords($project1['wardno']);?></span></td>

                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>S.F NO <span style="margin-left:27%;">:<?php echo $project1['sfno'];?></span> </td>
                  <td style="border:0px solid;">Block No <span style="margin-left:20%;">: <?php echo ucwords($project1['blockno']);?></span></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>R.S.F No 
				  <span style="margin-left:23%;">:<?php echo ucwords($project1['rsfno']);?></span>
	</td>
                  <td style="border:0px solid;">T.S.No <span style="margin-left:28%;">: <?php echo ucwords($project1['tsno']);?></span></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Patta No   <span style="margin-left:21%;">:<?php echo $project1['pattano'];?></span></td>
                  <td style="border:0px solid;">Pymash No <span style="margin-left:12%;">: <?php echo ucwords($project1['pymashno']);?></span></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Plot No <span style="margin-left:25%;">:<?php echo ucwords($project1['plotno']);?></span></td>
                  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>S.R.O  <span style="margin-left:31%;">:<?php echo ucwords($project1['sro']);?></span></td>
                  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Ref Document  <span style="margin-left:3%;">:<?php echo ucwords($project1['deed']);?> <?php echo ucwords($project1['deed_description']);?></span> </td>
                  <td style="border:0px solid;"><span style="margin-left:12%;"></span></td>
                </tr>
			
				 <tr>
                  <td style="border:0px solid;border-top: 1px solid;10px">Property Occupied</td>
                  <td style="border:0px solid;height:20px;border-top: 1px solid;">:  <?php echo ucfirst($project1['propertyoccupied']); ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Tax Receipt </td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['taxreceipt']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['taxreceipt_name']; ?> <?php } ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">E.B. Service No</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['ebserviceno']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['ebserviceno_name']; ?> <?php } ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Patta / DTCP</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['pattadtcp']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['pattadtcp_name']; ?> <?php } ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">Approval Plan</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['approvalplan']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['approvalplan_name']; ?><?php } ?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">H.D Line</td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>: <?php echo $project1['hdline']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['hdline_name']; ?><?php } ?></td>
                </tr>
		
				
				
				</table>
			
            </div>
          </div>
		 

<?php if($countot2=='1') {?>
		     <style>
			 .newtab  td
			 {
            padding: 4px;
			 }
			 .newtab  th
			 {
            padding: 6px;
			 }
			</style>
    <?php } ?>
<?php if($project1['totallandvalue']!='' )	 {
$totallandvalue2=explode(",",$project1['totallandvalue']);	
$northboundary=explode(",",$project1['northboundary']);
$southboundary=explode(",",$project1['southboundary']);
$eastboundary=explode(",",$project1['eastboundary']);
$westboundary=explode(",",$project1['westboundary']);
$north1=explode(",",$project1['north1']);
$north2=explode(",",$project1['north2']);
$north3=explode(",",$project1['north3']);
$north4=explode(",",$project1['north4']);
$north5=explode(",",$project1['north5']);
$north6=explode(",",$project1['north6']);
$north7=explode(",",$project1['north7']);
$north8=explode(",",$project1['north8']);	
$north9=explode(",",$project1['north9']);
$south1=explode(",",$project1['south1']);
$south2=explode(",",$project1['south2']);
$south3=explode(",",$project1['south3']);
$south4=explode(",",$project1['south4']);
$south5=explode(",",$project1['south5']);
$south6=explode(",",$project1['south6']);
$south7=explode(",",$project1['south7']);
$south8=explode(",",$project1['south8']);	
$south9=explode(",",$project1['south9']);
$east1=explode(",",$project1['east1']);
$east2=explode(",",$project1['east2']);
$east3=explode(",",$project1['east3']);
$east4=explode(",",$project1['east4']);
$east5=explode(",",$project1['east5']);
$east6=explode(",",$project1['east6']);
$east7=explode(",",$project1['east7']);
$east8=explode(",",$project1['east8']);	
$east9=explode(",",$project1['east9']);
$west1=explode(",",$project1['west1']);
$west2=explode(",",$project1['west2']);
$west3=explode(",",$project1['west3']);
$west4=explode(",",$project1['west4']);
$west5=explode(",",$project1['west5']);
$west6=explode(",",$project1['west6']);
$west7=explode(",",$project1['west7']);
$west8=explode(",",$project1['west8']);	
$west9=explode(",",$project1['west9']);	
$estent1=explode(",",$project1['estent1']);	
$estent2=explode(",",$project1['estent2']);	
$estent3=explode(",",$project1['estent3']);	
$anyarea=explode(",",$project1['anyarea']);	
$dimensionsite=explode(",",$project1['dimensionsite']);
$totalarea=explode(",",$project1['totalarea']);
$totalrate=explode(",",$project1['totalrate']);
$totallandvalue=explode(",",$project1['totallandvalue']);
$typeofproperty2=explode(",",$project1['typeofproperty']);	
$counttypeofproperty=count($typeofproperty);
$sizeofplot2=explode(",",$project1['sizeofplot']);
$recentdevelopmentsnear2=explode(",",$project1['recentdevelopmentsnear']);
$resentsaledetails2=explode(",",$project1['resentsaledetails']);
$classofconstruction2=explode(",",$project1['classofconstruction']);
$limits2=explode(",",$project1['limits']);
$land_description=explode(",",$project1['land_description']);

$estent=explode(",",$project1['estent']);
$sale_details=explode(",",$project1['sale_details']);
$sale_from=explode(",",$project1['sale_from']);
$sale_to=explode(",",$project1['sale_to']);
$sale_type=explode(",",$project1['sale_type']);
$guide_rate=explode(",",$project1['guide_rate']);
$guideselect=explode(",",$project1['guideselect']);
$guidevalue=explode(",",$project1['guidevalue']);



$countot=count($totallandvalue2);
$countotval=$countot-1;
		
foreach($totallandvalue2 as $countproper1 =>$key1) {	$valdel="55".$countproper1;
	?>	<div class="col m12 s12" style="">	

            <table class="striped responsive-table newtab" <?php if($countproper1==0) {?>  style="    margin-left: -11px;
			width: 99%;" <?php } else {?> style="    margin-left: 3px;
			width: 95%" <?php } ?>>
              <thead>
			  <?php if($land_description[$countproper1]!='')
			  {?>
			     <tr>
                  <th style="border:0px solid;border-top:1px solid;    border-left: 1px solid;border-right: 1px solid;border-bottom:1px solid;  " colspan="5"><?php echo ucwords($land_description[$countproper1]);?></th>
               
			  </tr> <?php } else { ?> <tr>
                  <th style="border:0px solid;border-top:1px solid;    border-left: 1px solid;border-right: 1px solid;border-bottom:1px solid; height:15px; " colspan="5"><?php echo ucwords($land_description[$countproper1]);?></th>
               
			  </tr> <?php } ?>
                <tr>    
                  <th style="border:0px solid;border-bottom:1px solid;    border-left: 1px solid;border-right: 1px solid; width: 20%;">Direction</th>
                  <th <?php if($countproper1==$countotval)
				  {?> style="border:0px solid;border-bottom:1px solid;    border-left: 1px solid;border-right: 1px solid;width: 37%;" <?php } else {?> style="border:0px solid;border-bottom:1px solid;    border-left: 1px solid;border-right: 1px solid;width: 40.2%;"<?php } ?>>Boundary details of the property</th>
                  <th colspan="3" style="border:1px solid;">Dimensions		</th>
                </tr>
				<tr>
                  <th style="border:0px solid;border-bottom:1px solid;    border-left: 1px solid;border-right: 1px solid;"></th>
                  <th style="border:0px solid;border-bottom:1px solid;    border-left: 1px solid;border-right: 1px solid;"></th>
                  <th style="border:1px solid;    width: 8.4%;">Patta</th>
                  <th style="border:1px solid;">Document</th>
				  <th style="border:1px solid;width: 20%;">Actual</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="border:1px solid;">North</td>
                  <td style="border:1px solid;"> <?php if($northboundary[$countproper1]!='0.00') {?><?php echo ucwords($northboundary[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"><?php if($north3[$countproper1]!='0.00') {?> <?php echo ucwords($north3[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"> <?php if($north6[$countproper1]!='0.00') {?><?php echo ucwords($north6[$countproper1]);?><?php } ?></td>
				  <td style="border:1px solid;"><?php if($north9[$countproper1]!='0.00') {?> <?php echo ucwords($north9[$countproper1]);?> <?php } ?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">South</td>
                  <td style="border:1px solid;"> <?php if($southboundary[$countproper1]!='0.00') {?><?php echo ucwords($southboundary[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"> <?php if($south3[$countproper1]!='0.00') {?><?php echo ucwords($south3[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"> <?php if($south6[$countproper1]!='0.00') {?><?php echo ucwords($south6[$countproper1]);?><?php } ?></td>
				  <td style="border:1px solid;"><?php if($south9[$countproper1]!='0.00') {?> <?php echo ucwords($south9[$countproper1]);?><?php } ?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">East</td>
                  <td style="border:1px solid;"> <?php if($eastboundary[$countproper1]!='0.00') {?><?php echo ucwords($eastboundary[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"><?php if($east3[$countproper1]!='0.00') {?> <?php echo ucwords($east3[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"><?php if($east6[$countproper1]!='0.00') {?> <?php echo ucwords($east6[$countproper1]);?><?php } ?></td>
				  <td style="border:1px solid;"><?php if($east9[$countproper1]!='0.00') {?> <?php echo ucwords($east9[$countproper1]);?> <?php } ?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">West</td>
                  <td style="border:1px solid;"> <?php if($westboundary[$countproper1]!='0.00') {?><?php echo ucwords($westboundary[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"> <?php if($west3[$countproper1]!='0.00') {?><?php echo ucwords($west3[$countproper1]);?><?php } ?></td>
                  <td style="border:1px solid;"><?php if($west6[$countproper1]!='0.00') {?> <?php echo ucwords($west6[$countproper1]);?><?php } ?></td>
				  <td style="border:1px solid;"> <?php if($west9[$countproper1]!='0.00') {?><?php echo ucwords($west9[$countproper1]);?><?php } ?></td>
                 
                </tr>
				
				<tr>
                  <td style="border:1px solid;">Extent of site</td>
                  <td style="border:1px solid;"><?php if($estent[$countproper1]!='0.00' && $estent[$countproper1]!='') {?>As Per Manual<br><?php echo number_format($estent[$countproper1],2);?><?php } ?></td>
                  <td style="border:1px solid;"><?php if($estent1[$countproper1]!='0.00' && $estent1[$countproper1]!='') {?>As Per Patta<br><?php echo $estent1[$countproper1];?><?php } ?></td>
                  <td style="border:1px solid;"><?php if($estent2[$countproper1]!='0.00' && $estent2[$countproper1]!='') {?> As Per Document<br><?php echo $estent2[$countproper1];?> <?php } ?></td>
				  <td style="border:1px solid;"><?php if($estent3[$countproper1]!='0.00' && $estent3[$countproper1]!='') {?>As Per Actual<br><?php echo $estent3[$countproper1];?><?php } ?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">Resent Sale Details	</td>
                  <td style="border:1px solid;"><?php echo $sale_details[$countproper1];?></td>
                  <td style="border:1px solid;    text-align: center;" colspan="2"><span style="font-size:13px;font-weight:bold;"><?php echo $sale_from[$countproper1];?></span> To <?php echo $sale_to[$countproper1];?></td>
				  <td style="border:1px solid;"><?php echo $sale_type[$countproper1];?></td>
                 
                </tr>
				<tr>
                  <td <?php if($countotval>1) {?> style="border:0px solid;    border-right: 1px solid;    border-left: 1px solid;text-align:center;" <?php } else {?> style="border:0px solid;    border-right: 1px solid;    border-left: 1px solid;text-align:center;padding:0px;" <?php } ?>>
				  
				    <p <?php if($countotval>1) {?> style="border-bottom: 1px solid;
    width: 122%;
					margin-left: -12px;" <?php } else {?> style="border-bottom: 1px solid;
    width: 122%;
					margin-left: -3px;" <?php } ?>>Total Area</p>
				  
				    <p><?php if($totalarea[$countproper1]!='') {?> <?php echo number_format($totalarea[$countproper1],2);?> <?php } else {?> - <?php } ?></p>
	
				  
				</td>
	
	
	
                  <td   <?php if($countotval>1) {?> style="border:0px solid;    border-right: 1px solid;" <?php } else {?> style="border:0px solid;    border-right: 1px solid;padding:0px;"  <?php } ?>><div style="width: 50%;
    margin-top: 0px;">			    <p style="           border-bottom: 1px solid;
    width: 101%;
    margin-left: -31px;
    text-align: center;
    border-right: 1px solid;">Rate</p>
				 
				    <p style="    text-align: center;
    margin-left: -36.5px;
    border-right: 1px solid;
    width: 106%;"><?php if($totalrate[$countproper1]!='') {?> ₹<?php echo number_format($totalrate[$countproper1],2);?> <?php } else {?> ₹0.00<?php } ?></p></div><div style="    width: 49%;
    float: right;
    margin-top: -27px;">			    <p  <?php if($countotval>2) {?> style="       border-bottom: 1px solid;
    width: 136%;
    margin-left: -33px;
    text-align: center;" <?php }elseif($countotval>1) {?> style="       border-bottom: 1px solid;
    width: 122%;
    margin-left: -33px;
    text-align: center;" <?php } else {?> style="       border-bottom: 1px solid;
    width: 136%;
    margin-left: -33px;
    text-align: center;" <?php } ?>>Land Value Total</p>
				  
				    <p style="    text-align: center;
    margin-left: -13px;"><?php if($totallandvalue[$countproper1]!='' && $totallandvalue[$countproper1]!='0.00') {?> ₹<?php echo number_format($totallandvalue[$countproper1],2);?> <?php } else {?> ₹0.00<?php } ?></p></div></td>
      
                  <td <?php if($countotval>1) {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;"  <?php } else {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;padding:0px;"   <?php } ?>  colspan="2">
				 
				 
				    <p style="border-bottom: 1px solid;
    width: 117%;
    margin-left: -12px;">Guideline Rate</p>
				  
				    <p><?php if($guide_rate[$countproper1]!='' && $guide_rate[$countproper1]!='0.00') {?> ₹<?php echo number_format($guide_rate[$countproper1],2);?> <?php } ?></p>
</td>
				  <td  <?php if($countotval>1) {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;"  <?php } else {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;padding:0px;"   <?php } ?>>
				  
	
				  
				    <p <?php if($countotval>1) {?> style="border-bottom: 1px solid;
    width: 117%;
    margin-left: -12px;"<?php } else {?> style="border-bottom: 1px solid;
    width: 109%;
    margin-left: -12px;"<?php } ?> >Guideline Value</p>
				  
				    <p> <?php if($guidevalue[$countproper1]!='') {?> ₹<?php echo number_format($guidevalue[$countproper1],2);?> <?php } ?></p>
				
</td>
                 
                </tr>
				
			 <?php if($countproper1!=$countotval)
				  {?>	<tr>
                  <td style="border-top:1px solid;    border-right: 1px solid;    border-left: 1px solid;border-bottom:1px solid;">Type of Property</td>
                  <td style="border-top:1px solid;     border-right: 1px solid;border-bottom:1px solid;">Size of Plot</td>
                  <td style="border-top:1px solid;     border-right: 1px solid;border-bottom:1px solid;">Development to Site</td>
                  <td style="border-top:1px solid;    border-right: 1px solid;border-bottom:1px solid;">Class of Construction</span>
</td>
				  <td style="border-top:1px solid;    border-right: 1px solid;border-bottom:1px solid;">Control Limit
</td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;"><span style="font-weight:bold;"><?php echo select_value_other("typeofproperty","name",$typeofproperty2[$countproper1]); ?></td>
                  <td style="border:1px solid;"><span style="font-weight:bold;"><?php echo select_value_other("sizeofplot","name",$sizeofplot2[$countproper1]); ?></span></td>
                  <td style="border:1px solid;"><span style="font-weight:bold;"><?php echo select_value_other("recentdevelopments","name",$recentdevelopmentsnear2[$countproper1]); ?></span></td>
                  <td style="border:1px solid;"><span style="font-weight:bold;"><?php echo select_value_other("classofconstruction","name",$classofconstruction2[$countproper1]); ?></span>
</td>
				  <td style="border:1px solid;"><br><span style="font-weight:bold;"><?php echo select_value_other("limits","name",$limits2[$countproper1]); ?></span>
</td>
                 
                </tr>
				  <?php } ?>
              </tbody>
            </table>
       
		  </div>
		
		<!-- product details table-->
          <div class="invoice-product-details"   <?php if($countproper1==$countotval)
				  {?> style="margin-bottom: 117px;" <?php } ?>>
            <table class="striped responsive-table newtab" style=" border-top: 1px solid;border-right:1px solid;border-left:1px solid;width: 94.8%;margin-left:4px;">
            
              <tbody>
			   <?php if($countproper1==$countotval)
				  {?>
 <tr>
                  <td  <?php if($countotval>1) {?> style="border:0px solid;    width: 34%;border:1px solid;" <?php } else {?> style="border:0px solid;    width: 34.3%;border:1px solid;" <?php } ?> ></td>
                  <td style="border:0px solid;border:1px solid;"></td>
				  <?php if($countproper1==$countotval)
				  {?>
				   <td <?php if($countotval>1) {?> style="border:1px solid; width: 23.5%;" <?php } else {?> style="border:1px solid; width: 23.2%;" <?php } ?>>Total Sq.ft</td>
                  <td <?php if($countotval>1) {?> style="border:1px solid;width: 20%;" <?php } else {?> style="border:1px solid;width: 20%;" <?php } ?>><?php echo number_format($project1['totalareaval'],2);?></td>
				  <?php } ?>
				  
                </tr>
                <tr>
                  <td style="border:0px solid;    width: 34%;border:1px solid;">1.Type of Property </td>
                  <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("typeofproperty","name",$typeofproperty2[$countproper1]); ?></td>
				  <?php if($countproper1==$countotval)
				  {?>
				   <td style="border:1px solid; width: 20%;">Total Guideline value</td>
                  <td style="border:1px solid;width: 20%;"> ₹<?php echo number_format($project1['guideline_value'],2);?></td>
				  <?php } ?>
                </tr>
				<tr>
                  <td style="border:0px solid;border:1px solid;">2.Size of Plot  </td>
          
				     <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("sizeofplot","name",$sizeofplot2[$countproper1]); ?></td>
					  <?php if($countproper1==$countotval)
				  {?>
			<td colspan="2" style="text-align: center;border:1px solid;">Land Value</td>  <?php } ?>
                </tr>
				<tr>
                  <td style="border:0px solid;border:1px solid;">3.Development to Site  </td>
              
              <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("recentdevelopments","name",$recentdevelopmentsnear2[$countproper1]); ?></td>
			    <?php if($countproper1==$countotval)
				  {?>
<td style="border:1px solid;">1.Market Value</td><td style="border:1px solid;">₹<?php echo $project1['market_value'];?></td><?php } ?>
                </tr>
			
				<tr>
                 <td style="border:0px solid;border:1px solid;">4.Class of Construction   </td>
      
  <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("classofconstruction","name",$classofconstruction2[$countproper1]); ?></td>	
				  <?php if($countproper1==$countotval)
				  {?>
			<td style="border:1px solid;">2.Reasonable value
				<br>
				<?php if($project1['reasonable_perce1'])  {?> <?php echo $project1['reasonable_perce1'];?>%<?php } ?></td><td style="border:1px solid;">₹<?php echo number_format($project1['reasonable_value'],2);?></td></tr>
				  <?php } ?>

				<tr>
                <td   <?php if($countproper1==$countotval)
				  {?>  style="border:1px solid;"   <?php } else {?> style="border:0px solid;    border-right: 1px solid;" <?php } ?>>5.Control Limit  </td>
         
  <td <?php if($countproper1==$countotval)
				  {?>  style="border:1px solid;"  <?php } else {?> style="border:0px solid;    border-right: 1px solid;" <?php } ?>> <?php echo select_value_other("limits","name",$limits2[$countproper1]); ?></td>	
    <?php if($countproper1==$countotval)
				  {?>
				  <td style="border:1px solid;">3.Forced value<br><?php if($project1['forced_percen1'])  {?><?php echo $project1['forced_percen1'];?> <?php echo $project1['foreced_perc'];?><?php } ?> <?php if(1!=1) {?><p style="    margin-top: -30px;
    margin-left: 72px;
				  border-left: 1px solid; padding: 7px;"><?php echo $project1['foreced_perc'];?></p><?php } ?></td><td style="border:1px solid;">₹<?php echo number_format($project1['forced_value'],2);?></td> <?php } ?>
				
                </tr>
				<?php if($countproper1==$countotval && 1!=1)
				  {?>
				<tr>
				
                 <td style="border:0px solid;border:1px solid;">  </td>
				 <td style="border:0px solid;border:1px solid;">  </td>
    <?php if($countproper1==$countotval)
				  {?>
				  <td <?php if($countproper1==$countotval)
				  {?>  style="    border: 1px solid;" <?php } else {?>  style="    border-right: 1px solid;" <?php } ?>>4.Guideline value</td><td style="border:1px solid;">₹<?php echo number_format($project1['guideline_value'],2);?></td>  <?php } ?>
				  </tr> <?php } ?>
				<?php if(1!=1) {?>
				<tr>
                 <td style="border:0px solid;border:1px solid;">7.Type of Roof  </td>

				  
  <td style="border:0px solid;border:1px solid;"> <?php 
  if($countproper1==0) { $roof2=explode(",",$project1['roof']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } }   if($countproper1==1) { $roof2=explode(",",$project1['roof1']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } } if($countproper1==2) { $roof2=explode(",",$project1['roof2']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } } if($countproper1==3) { $roof2=explode(",",$project1['roof3']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } }?></td>
  <?php if($countproper1==$countotval)
				  {?> 
			<td style="border:1px solid;"></td><td style="border:1px solid;"></td> 
				  <?php } ?>
			
                </tr> <?php } ?>

<?php } ?>
	<?php } ?>			
				
               
              </tbody>
            </table>
          </div>
		  
<?php }  else {?>	
<?php
$project_ids=$project1['id']; 
$project_table = mysqli_query($conn,"SELECT * FROM `project_table` where 1=1 and project_id='$project_ids' ");   
$project_table1 = mysqli_fetch_array($project_table);
if($project_table1['lengtha']=='' or $project_table1['breadtha']=='') 
{ ?>
<div class="col m12 s12" style="">		   
            <table class="striped responsive-table" <?php if($countproper1==0) {?>  style="    margin-left: -11px;
			width: 99%;" <?php } else {?> style="    margin-left: 3px;
			width: 95%" <?php } ?>>
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
                  <td style="border:1px solid;"> <?php echo ucwords($northboundary[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($north3[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($north6[$countproper1]);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($north9[$countproper1]);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">South</td>
                  <td style="border:1px solid;"> <?php echo ucwords($southboundary[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($south3[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($south6[$countproper1]);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($south9[$countproper1]);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">East</td>
                  <td style="border:1px solid;"> <?php echo ucwords($eastboundary[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($east3[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($east6[$countproper1]);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($east9[$countproper1]);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">West</td>
                  <td style="border:1px solid;"> <?php echo ucwords($westboundary[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($west3[$countproper1]);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($west6[$countproper1]);?></td>
				  <td style="border:1px solid;"> <?php echo ucwords($west9[$countproper1]);?></td>
                 
                </tr>
				
				<tr>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;">Extent of site</td>
                  <td style="border:1px solid;"><?php echo $estent1[$countproper1];?></td>
                  <td style="border:1px solid;"><?php echo $estent2[$countproper1];?></td>
				  <td style="border:1px solid;"><?php echo $estent3[$countproper1];?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;">Total Area if Any</td>
                  <td style="border:1px solid;"><?php echo $anyarea[$countproper1];?></td>
                  <td style="border:1px solid;"></td>
				  <td style="border:1px solid;"></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;height">Dimension of the <br><span style="font-weight:bold;"></span></td>
                  <td style="border:1px solid;">Total Area <br> <span style="font-weight:bold;"></span></td>
                  <td style="border:1px solid;">Rate<br><span style="font-weight:bold;">₹</span></td>
				  <td style="border:1px solid;">Land Value Total<br><span style="font-weight:bold;">₹</span></td>
                 
                </tr>
               
              </tbody>
            </table>
       
		  </div>
		
		<!-- product details table-->
          <div class="invoice-product-details" style="margin-bottom:10px;">
            <table class="striped responsive-table" style="border-right:1px solid;border-left:1px solid;width: 95%;margin-left:4px;">
            
              <tbody>

                <tr>
                  <td style="border:0px solid;    width: 36%;border:1px solid;">1.Type of Property </td>
                  <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("typeofproperty","name",$typeofproperty2[$countproper1]); ?></td>
				  <?php if($countproper1==$countotval)
				  {?>
				   <td style="border:1px solid; width: 20%;">Guideline Rate</td>
                  <td style="border:1px solid;width: 20%;">₹</td>
				  <?php } ?>
                </tr>
				<tr>
                  <td style="border:0px solid;border:1px solid;">2.Size of Plot  </td>
          
				     <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("sizeofplot","name",$sizeofplot2[$countproper1]); ?></td>
					  <?php if($countproper1==$countotval)
				  {?>
			<td colspan="2" style="text-align: center;border:1px solid;">Land Value</td>  <?php } ?>
                </tr>
				<tr>
                  <td style="border:0px solid;border:1px solid;">3.Development to Site  </td>
              
              <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("recentdevelopments","name",$recentdevelopmentsnear2[$countproper1]); ?></td>
			    <?php if($countproper1==$countotval)
				  {?>
<td style="border:1px solid;">1.Market Value</td><td style="border:1px solid;">₹</td><?php } ?>
                </tr>
			
				<tr>
                 <td style="border:0px solid;border:1px solid;">4.Resent Sale Details  </td>
        
			
				<td style="border:0px solid;border:1px solid;"> <?php echo $resentsaledetails2[$countproper1];?></td>  
				  <?php if($countproper1==$countotval)
				  {?>
			<td style="border:1px solid;">2.Reasonable value
				<br>
				<?php echo $project1['reasonable_perce1'];?>%
<?php echo $project1['reasonable_perce'];?></td><td style="border:1px solid;">₹</td></tr>
				  <?php } ?>

				<tr>
                 <td style="border:0px solid;border:1px solid;">5.Class of Construction   </td>
      
  <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("classofconstruction","name",$classofconstruction2[$countproper1]); ?></td>	
    <?php if($countproper1==$countotval)
				  {?>
				  <td style="border:1px solid;">3.Forced value<br><?php echo $project1['forced_percen1'];?>% <?php echo $project1['forced_percen'];?></td><td style="border:1px solid;">₹</td> <?php } ?>
				
                </tr>
				<tr>
                 <td style="border:0px solid;border:1px solid;">6.Control Limit  </td>
         
  <td style="border:0px solid;border:1px solid;"> <?php echo select_value_other("limits","name",$limits2[$countproper1]); ?></td>	
    <?php if($countproper1==$countotval)
				  {?>
				  <td style="border:1px solid;">4.Guideline value</td><td style="border:1px solid;">₹</td>  <?php } ?>
                </tr>
						<?php if(1!=1) {?>
				<tr>
                 <td style="border:0px solid;border:1px solid;">7.Type of Roof  </td>

				  
  <td style="border:0px solid;border:1px solid;"> <?php 
  if($countproper1==0) { $roof2=explode(",",$project1['roof']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } }   if($countproper1==1) { $roof2=explode(",",$project1['roof1']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } } if($countproper1==2) { $roof2=explode(",",$project1['roof2']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } } if($countproper1==3) { $roof2=explode(",",$project1['roof3']);
  foreach($roof2 as $lengthacountproper2 =>$key) {
	  
  echo select_value_other("roof","name",$key); echo ", "; } }?></td>
  <?php if($countproper1==$countotval)
				  {?> 
			<td style="border:1px solid;"></td><td style="border:1px solid;"></td> 
				  <?php } ?>
			
                </tr><?php } ?>


				
				
               
              </tbody>
            </table>
          </div>
<?php } ?>
<?php } ?>		  
		  <div class="col m12 s12" style="  ">
<?php 
$project_ids=$project1['id']; 
$project_table = mysqli_query($conn,"SELECT * FROM `project_table` where 1=1 and project_id='$project_ids' ");   
$project_table1 = mysqli_fetch_array($project_table);
 
if($project_table1['area']!='' && $project_table1['area']!='0.00') 
{ ?>
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;">
              <thead>
              
				<tr>
                  <th style="border:0px solid;border-top:1px solid;border-left:1px solid;border-right:1px solid;">S.No</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Description of the property</th>
				  <th colspan="2" style="border:0px solid;border-top:1px solid;border-right:1px solid;border-bottom:1px solid;width: 16%;
">Size</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Area</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Rate</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;">Year</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;    width: 14%;">Type of Roofing</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;    width: 12%;">Deprciation</th>
				  <th style="border:0px solid;border-top:1px solid;border-right:1px solid;    width: 10%;">Total</th>
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
			  <?php 

$desc_prop=explode(",",$project_table1['desc_prop']);				
$lengtha=explode(",",$project_table1['lengtha']);	
$lengthb=explode(",",$project_table1['lengthb']);
$length=explode(",",$project_table1['length']);
$breadtha=explode(",",$project_table1['breadtha']);
$breadthb=explode(",",$project_table1['breadthb']);
$breadth=explode(",",$project_table1['breadth']);
$area=explode(",",$project_table1['area']);
$rate=explode(",",$project_table1['rate']);
$year=explode(",",$project_table1['year']);
$roofselect=explode(",",$project_table1['roofselect']);
$deprciation=explode(",",$project_table1['deprciation']);
$total=explode(",",$project_table1['total']);
$percentage=explode(",",$project_table1['percentage']);
$overalltotal=explode(",",$project_table1['overalltotal']);
foreach($lengtha as $lengthacountproper =>$key) {	

$roofselectid=$roofselect[$lengthacountproper]; 
$roof = mysqli_query($conn,"SELECT * FROM `roof` where 1=1 and id='$roofselectid' ");   
$roof1 = mysqli_fetch_array($roof);
$total2a+=$total[$lengthacountproper];
?>	
                <tr>
                  <td style="border:1px solid;"><?php echo $i; ?></td>
                  <td style="border:1px solid;"><?php echo $desc_prop[$lengthacountproper]; ?></td>
                  <td style="border:1px solid;"> <?php echo $length[$lengthacountproper]; ?></td>
                  <td style="border:1px solid;"> <?php echo $breadth[$lengthacountproper]; ?></td>
				  <td style="border:1px solid;"><?php echo $area[$lengthacountproper]; ?></td>
				   <td style="border:1px solid;"> <?php echo $rate[$lengthacountproper]; ?></td>
				    <td style="border:1px solid;"> <?php echo $year[$lengthacountproper]; ?></td>
					 <td style="border:1px solid;"> <?php echo $roof1['name']; ?></td>
					  <td style="border:1px solid;"> <?php echo $deprciation[$lengthacountproper]; ?></td>
					   <td style="border:1px solid;"> <?php echo $total[$lengthacountproper]; ?></td>
					   
                 
                </tr>
<?php } ?>			
				<tr>
                  
                  <td colspan="9" style="text-align:right;border:1px solid;">Grand Total:	</td>
       
					   <td colspan="1" style="text-align:left;border:1px solid;"> <?php echo $project_table1['overalltotal'];?></td>
					   
                 
                </tr>
				
<?php


?>			
               
              </tbody>
            </table>
<?php } ?>


<?php 

 
if($project_table1['area1']!='' && $project_table1['area1']!='0.00') 
{ ?>
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;border-top:0px solid;">
              <thead>
              
				<tr>
                  <th style="border:0px solid;border-top:0px solid;border-left:1px solid;border-right:1px solid;">S.No</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Description of the property</th>
				  <th colspan="2" style="border:0px solid;border-top:0px solid;border-right:1px solid;border-bottom:1px solid;">Size</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Area</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Rate</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Year</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid; width: 14%;">Type of Roofing</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid; width: 12%;">Deprciation</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid; width: 10%;">Total</th>
                </tr>
					<tr>
                  <th style="border:0px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;border-top:1px solid;">L</th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;border-top:1px solid;">B</th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;border-top:1px solid;">Sq.Ft</th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				   <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
                </tr>
              </thead>
              <tbody>
			  <?php 

$desc_prop1=explode(",",$project_table1['desc_prop1']);				
$lengtha1=explode(",",$project_table1['lengtha1']);	
$lengthb1=explode(",",$project_table1['lengthb1']);
$length1=explode(",",$project_table1['length1']);
$breadtha1=explode(",",$project_table1['breadtha1']);
$breadthb1=explode(",",$project_table1['breadthb1']);
$breadth1=explode(",",$project_table1['breadth1']);
$area1=explode(",",$project_table1['area1']);
$rate1=explode(",",$project_table1['rate1']);
$year1=explode(",",$project_table1['year1']);
$roofselect1=explode(",",$project_table1['roofselect1']);
$deprciation1=explode(",",$project_table1['deprciation1']);
$total1=explode(",",$project_table1['total1']);
$percentage1=explode(",",$project_table1['percentage1']);
$overalltotal1=explode(",",$project_table1['overalltotal1']);
foreach($lengtha1 as $lengthacountproper =>$key) {	

$roofselectid=$roofselect1[$lengthacountproper]; 
$roof = mysqli_query($conn,"SELECT * FROM `roof` where 1=1 and id='$roofselectid' ");   
$roof1 = mysqli_fetch_array($roof);
?>	
                <tr>
                  <td style="border:1px solid;"><?php echo $i; ?></td>
                  <td style="border:1px solid;"><?php echo $desc_prop1[$lengthacountproper]; ?></td>
                  <td style="border:1px solid;"> <?php echo $length1[$lengthacountproper]; ?></td>
                  <td style="border:1px solid;"> <?php echo $breadth1[$lengthacountproper]; ?></td>
				  <td style="border:1px solid;"><?php echo $area1[$lengthacountproper]; ?></td>
				   <td style="border:1px solid;"> <?php echo $rate1[$lengthacountproper]; ?></td>
				    <td style="border:1px solid;"> <?php echo $year1[$lengthacountproper]; ?></td>
					 <td style="border:1px solid;"> <?php echo $roof1['name']; ?></td>
					  <td style="border:1px solid;"> <?php echo $deprciation1[$lengthacountproper]; ?></td>
					   <td style="border:1px solid;"> <?php echo $total1[$lengthacountproper]; ?></td>
					   
                 
                </tr>
<?php } ?>			
				<tr>
                  
                  <td colspan="9" style="text-align:right;border:1px solid;">Grand Total:	</td>
       
					   <td colspan="1" style="text-align:left;border:1px solid;"><?php echo $project_table1['overalltotal1'];?></td>
					   
                 
                </tr>
				
			
               
              </tbody>
            </table>
<?php } ?>


<?php
if($project_table1['area2']!='' && $project_table1['area2']!='0.00') 
{ ?>
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;border-top:0px solid;">
              <thead>
              
				<tr>
                  <th style="border:0px solid;border-top:0px solid;border-left:1px solid;border-right:1px solid;">S.No</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Description of the property</th>
				  <th colspan="2" style="border:0px solid;border-top:0px solid;border-right:1px solid;border-bottom:1px solid;">Size</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Area</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Rate</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid;">Year</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid; width: 14%;">Type of Roofing</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid; width: 12%;">Deprciation</th>
				  <th style="border:0px solid;border-top:0px solid;border-right:1px solid; width: 10%;">Total</th>
                </tr>
					<tr>
                  <th style="border:0px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;border-top:1px solid;">L</th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;border-top:1px solid;">B</th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;border-top:1px solid;">Sq.Ft</th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				  <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
				   <th style="border:0px solid;border-bottom:0px solid;border-right:1px solid;"></th>
                </tr>
              </thead>
              <tbody>
			  <?php 

$desc_prop2=explode(",",$project_table1['desc_prop2']);				
$lengtha2=explode(",",$project_table1['lengtha2']);	
$lengthb2=explode(",",$project_table1['lengthb2']);
$length2=explode(",",$project_table1['length2']);
$breadtha2=explode(",",$project_table1['breadtha2']);
$breadthb2=explode(",",$project_table1['breadthb2']);
$breadth2=explode(",",$project_table1['breadth2']);
$area2=explode(",",$project_table1['area2']);
$rate2=explode(",",$project_table1['rate2']);
$year2=explode(",",$project_table1['year2']);
$roofselect2=explode(",",$project_table1['roofselect2']);
$deprciation2=explode(",",$project_table1['deprciation2']);
$total2=explode(",",$project_table1['total2']);
$percentage2=explode(",",$project_table1['percentage2']);
$overalltotal2=explode(",",$project_table1['overalltotal2']);
foreach($lengtha2 as $lengthacountproper =>$key) {	

$roofselectid=$roofselect2[$lengthacountproper]; 
$roof = mysqli_query($conn,"SELECT * FROM `roof` where 1=1 and id='$roofselectid' ");   
$roof1 = mysqli_fetch_array($roof);
?>	
                <tr>
                  <td style="border:1px solid;"><?php echo $i; ?></td>
                  <td style="border:1px solid;"><?php echo $desc_prop2[$lengthacountproper]; ?></td>
                  <td style="border:1px solid;"> <?php echo $length2[$lengthacountproper]; ?></td>
                  <td style="border:1px solid;"> <?php echo $breadth2[$lengthacountproper]; ?></td>
				  <td style="border:1px solid;"><?php echo $area2[$lengthacountproper]; ?></td>
				   <td style="border:1px solid;"> <?php echo $rate2[$lengthacountproper]; ?></td>
				    <td style="border:1px solid;"> <?php echo $year2[$lengthacountproper]; ?></td>
					 <td style="border:1px solid;"> <?php echo $roof1['name']; ?></td>
					  <td style="border:1px solid;"> <?php echo $deprciation2[$lengthacountproper]; ?></td>
					   <td style="border:1px solid;"> <?php echo $total2[$lengthacountproper]; ?></td>
					   
                 
                </tr>
<?php } ?>			
				<tr>
                  
                  <td colspan="9" style="text-align:right;border:1px solid;">Grand Total:	</td>
       
					   <td colspan="1" style="text-align:left;border:1px solid;"><?php echo $project_table1['overalltotal2'];?></td>
					   
                 
                </tr>
				
			
               
              </tbody>
            </table>
<?php } ?>
<?php $totalall=($project_table1['overalltotal']+$project_table1['overalltotal1']+$project_table1['overalltotal2']+$project_table1['overalltotal3']);?>
		  </div>
	
	  <div class="row invoice-info">
	<?php if($project1['servicevisible']=='Yes') {?>
            <div class="col m6 s12">
			<table class="striped responsive-table" style="border-bottom:1px solid;border-right:0px solid;border-left:1px solid;border-top:0px solid;">
    <tbody>
	           <tr >
			
                  <td colspan="3" style="border:0px solid;border-bottom:1px solid;font-weight:bold;    font-size: 13px;text-align:center;">Services				
</td>

                </tr>
                <tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">1</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Water Supply Arrangements</td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;"><?php if($project1['watersupplyarrangementsRs']!='') {?> Rs. <?php echo ucwords($project1['watersupplyarrangementsRs']);?><?php } ?></td>
                </tr>
				<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 28px;">2</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 28px;">Drainage Arrangements</td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 28px;"><?php if($project1['drainagearrangementsRs']!='') {?> Rs. <?php echo ucwords($project1['drainagearrangementsRs']);?><?php } ?></td>
                </tr>
			<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">3</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Compound Wall L<br>
				  
<table style="       width: 111%;
    margin-left: -11px;"><tr><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 25%;">L</td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 25%;">B</td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 25%;">Sqft</td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 25%;">Rate</td></tr>
<tr><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 25%;"><?php echo $project1['compoundwallL1'];?></td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 25%;"><?php echo $project1['compoundwallL2'];?></td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 25%;"><?php echo $project1['compoundwallL'];?></td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 25%;"><?php echo $project1['compoundwallrate'];?></td></tr>

</table>				  
</td>
<td style="border:0px solid;border-bottom:1px solid;"><?php if($project1['compoundwallRs']!='') {?> Rs. <?php echo ucwords($project1['compoundwallRs']);?><?php } ?></td>
                </tr>
				<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">4</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">
				  
<table style="       width: 111%;
    margin-left: -11px;"><?php if($project1['sump']!='') {?><tr> <td style="border-top:0px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 50%;">Sump</td><td style="border-top:0px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 50%;">Rs. <?php echo $project1['sump'];?></td></tr><?php } ?><?php if($project1['oht']!='') {?><tr><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 50%;">OH Tank</td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 50%;">Rs. <?php echo $project1['oht'];?></td></tr><?php } ?><?php if($project1['sintex']!='') {?><tr><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 50%;">Sintex</td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 50%;">Rs. <?php echo $project1['sintex'];?></td></tr><?php } ?>
</table>				  
</td>
<td style="border:0px solid;border-bottom:1px solid;"><?php if($project1['sumpohtRs']!='') {?> Rs. <?php echo ucwords($project1['sumpohtRs']);?><?php } ?></td>
                </tr>
				
					<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">5</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">
				  
<table style="       width: 111%;
    margin-left: -11px;"><tr> <td style="border-top:0px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 50%;">E.B Deposit
</td><td style="border-top:0px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 50%;"><?php echo $project1['ebdepositI'];?></td></tr><tr><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:1px solid;width: 50%;">No.of Services </td><td style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;width: 50%;"><?php echo $project1['ebdep1'];?></td></tr>
</table>				  
</td>
<td style="border:0px solid;border-bottom:1px solid;"><?php if($project1['ebdepositRs']!='') {?> Rs. <?php echo ucwords($project1['ebdepositRs']);?><?php } ?></td>
                </tr>
				
			<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">6</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">
<?php if($project1['pavertype']!='')		{?>		  
<table style="       width: 111%;
    margin-left: -11px;"><?php $checkedval=explode(",",$project1['pavertype']); ?> <?php $c=0; foreach($checkedval as $checkedval12) { $c++;?><tr> <?php if($c==1) {?><td  style="border-top:0px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;"><?php echo $checkedval12; ?></td><?php } ?><?php if($c==2) {?><td  style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;"><?php echo $checkedval12; ?></td><?php } ?>
	<?php if($c==3) {?><td  style="border-top:1px solid;border-bottom:0px solid;border-left:1px solid;border-right:0px solid;"><?php echo $checkedval12; ?></td><?php } ?></tr><?php } ?>
</table> <?php } else {?> Paver/Cement/Tiles	
 <?php } ?>				  
</td>
<td style="border:0px solid;border-bottom:1px solid;"><?php if($project1['paverrs']!='') {?> Rs. <?php echo ucwords($project1['paverrs']);?><?php } ?></td>
                </tr>		
					<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    ">7</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Interior / Exterior</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php if($project1['interiorworkRs']!='') {?> Rs. <?php echo ucwords($project1['interiorworkRs']);?><?php } ?></td>
                </tr>
					<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;   ">8</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Open / Stair head</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php if($project1['openstaircaseRs']!='') {?> Rs. <?php echo ucwords($project1['openstaircaseRs']);?><?php } ?></td>
                </tr>
					<tr><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    "></td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Total</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php if($project1['serviceovertotal']!='') {?> Rs. <?php echo ucwords($project1['serviceovertotal']);?><?php } ?></td>
                </tr>
				</table>
	
	</div> <?php } ?>
	
		<?php if($project1['generalvisible']=='Yes') {?>
            <div class="col m6 s12" style="    margin-left: -31px !important;">
             
		<table class="striped responsive-table" style="border-bottom:1px solid;border-right:1px solid;border-left:1px solid;border-top:0px solid;">
    <tbody>
	           <tr>
			  
                  <td colspan="3" style="border:0px solid;border-bottom:1px solid;font-weight:bold;    font-size: 13px;text-align:center;">General Information</td>
    
                </tr>
                <tr style="height: 28px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">1</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Type of Construction</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other('typeofconstruction','name',$project1['typeofconstruction']);?></td>
                  </tr>
				  <tr style="height: 28px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">2</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Building Maintenance	</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other('maintananceofthebuilding','name',$project1['maintenanceofthebuilding']);?></td></tr>
				   <tr style="height: 28px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">3</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Drainage Arrangement</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other('drainagearrangements','name',$project1['drainagearrangements']);?></td></tr>
				    <tr style="height: 28px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">4</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Water Supply Arrangement</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo str_replace(",",", ",$project1['watersupplyarrangements']);?></td></tr>
				  
				  			    <tr style="height: 28px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">5</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Joineries</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo str_replace(",",", ",$project1['joineries']);?></td></tr>
				  
				  <tr style="height: 28px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">6</td>
             
                  <td colspan="2" style="border:0px solid;border-bottom:0px solid;"><?php $floorselect=explode(",",$project1['floorselect']);
$floorfinish=explode(",",$project1['floorfinish']);
$roofingselect=explode(",",$project1['roofingselect']);
if($project1['floorselect']!='') { ?> <table id="b" style="    width: 105.5%;
    margin-left: -10px;"><tr  id="c"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Floor</td><td style="border:0px solid;border-bottom:0px solid;border-right:1px solid;">Floor Finishing</td><td style="border:0px solid;border-bottom:0px solid;">Roofing</td></tr><?php 
foreach($floorselect as $floorselectcount =>$key) {
	
	
		?><tr><td style="border:0px solid;border-top:1px solid;border-right:1px solid;"><?php echo $floorselect[$floorselectcount]; ?></td><td style="border:0px solid;border-top:1px solid;border-right:1px solid;"><?php echo $floorfinish[$floorselectcount]; ?></td><td style="border:0px solid;border-top:1px solid;border-right:0px solid;"><?php echo select_value_other('roof','name',$roofingselect[$floorselectcount]);   ?></td></tr><?php }  ?></table> <?php } else { ?>

<table id="b" style="    width: 105.5%;
    margin-left: -10px;"><tr  id="c"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Floor</td><td style="border:0px solid;border-bottom:0px solid;border-right:1px solid;">Floor Finishing</td><td style="border:0px solid;border-bottom:0px solid;">Roofing</td></tr><tr><td style="border:0px solid;border-top:1px solid;border-right:1px solid;"><?php echo $floorselect[$floorselectcount]; ?></td><td style="border:0px solid;border-top:1px solid;border-right:1px solid;"><?php echo $floorfinish[$floorselectcount]; ?></td><td style="border:0px solid;border-top:1px solid;border-right:0px solid;"><?php echo select_value_other('roof','name',$roofingselect[$floorselectcount]);   ?></td></tr></table>

		<?php } ?></td></tr>
				  
				    <tr style="height: 28.5px;"><td style="border:0px solid;border-bottom:1px solid;border-top:1px solid;border-right:1px solid;">7</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-top:1px solid;border-right:1px solid;">Road facilities - <?php  if($project1['roadfacilities']=='Public') {?> Public <?php } ?>   <?php  if($project1['roadfacilities']=='Private') {?> Private <?php } ?>
				  
				  </td>
                  <td style="border:0px solid;border-bottom:1px solid;border-top:1px solid;"><?php echo select_value_other('roadfacilities','name',$project1['roadfacilitiesyes']);?></td></tr>
				  
				  	 <tr style="height: 28.5px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">8</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Type of Plot</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other('cornerintermittentcommerciallot','name',$project1['cornerplotintermittentplot']);?></td></tr>
	
				  
				   <tr style="height: 30px;"><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">9</td>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Character of Locality</td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other('characteroflocality','name',$project1['characteroflocality']);?></td></tr>
				  

			
				</table>		 
	
	
            </div>
		<?php } ?>
				<?php if($totalall!='' && $project1['serviceovertotal']!='' ) {?>
	 <div class="col m6 s12" style="    margin-top: 24px;    font-size: 12px;    margin-left: -6px;">
	 <table class="striped responsive-table" style="border-bottom:0px solid;border:1px solid;">
    <tbody>
	          
				  <tr >
			
               <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">1</td> <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Land Value</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;">₹ <?php echo number_format($totallandvalue[$countproper1],2);?></td> </tr>
				 <tr >
				<td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">2</td><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Building	</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;" >₹ <?php echo $totalall; ?></td> </tr>
				 <tr >
				<td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">3</td><td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Services	</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;">₹ <?php echo ucwords($project1['serviceovertotal']);?></td> </tr>
				 <tr >
			<td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></td>	<td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Total	</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;">₹ <?php echo  $alltot=($totallandvalue[$countproper1]+$totalall+$project1['serviceovertotal']); ?></td>

                </tr>
         
			    </tbody>	
				</table>
				</div> <?php } ?>
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

 
 