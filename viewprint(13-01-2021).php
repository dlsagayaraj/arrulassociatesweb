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
        <div class="card-content invoice-print-area" style="font-size: 14px;">
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
			<table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
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
                  <td style="border:0px solid;">Name of the Owner Address</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['ownerAddress']);?></td>
                </tr>
				
				</table>
	
            </div>
            <div class="col m6 s12" style="border-bottom: 1px solid;">
             
			 	<table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
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
                  <td style="border:0px solid;">Name of the purchaser address</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['purchaseAddress']);?></td>
                </tr>
				
				</table>
			 
			 
	
            </div>
          </div>
		  
		  <div class="row invoice-info">
            <div class="col m6 s12" style="border: 1px solid;border-top: 1px solid;">
             <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
    <tbody>
                <tr>
                  <td style="border:0px solid;">i)Door No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['odoorno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">ii)Street</td>
                  <td style="border:0px solid;">: <?php echo $project1['ostreet'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iii)Area</td>
                  <td style="border:0px solid;">: <?php echo $project1['oarea'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iv)Post</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['opost']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">v)Taluk</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['otaluk']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vi)District</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['odistrict']);?></td>
                </tr>
				
				</table>
			
            </div>
            <div class="col m6 s12" style="border: 1px solid;border-top: 1px solid;">
             
			 
			     <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
    <tbody>
                <tr>
                  <td style="border:0px solid;">i)Door No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['pdoorno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">ii)Street</td>
                  <td style="border:0px solid;">: <?php echo $project1['pstreet'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iii)Area</td>
                  <td style="border:0px solid;">: <?php echo $project1['parea'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iv)Village</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['pvillage']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">v)Taluk</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['ptaluk']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vi)District</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['pdistrict']);?></td>
                </tr>
				
				</table>
			
            </div>
          </div>
		 

		 <div class="row invoice-info">
            <div class="col m6 s12" style="border: 1px solid;">
              <h6 class="invoice-from">5.Property Address </h6>
           
			   <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
    <tbody>
                <tr>
                  <td style="border:0px solid;">i)Door No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['propertydoorno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">ii)Street</td>
                  <td style="border:0px solid;">: <?php echo $project1['propertystreet'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iii)Area</td>
                  <td style="border:0px solid;">: <?php echo $project1['propertyarea'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iv)Village</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['propertyvillage']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">v)Taluk</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['propertytaluk']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vi)District</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['propertydistict']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vii)Cell No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['propertycellno']);?></td>
                </tr>
				
				</table>
			
			  
			  
            </div>
            <div class="col m6 s12" style="border: 1px solid;">
             <h6 class="invoice-from" style="margin-bottom: 41px;"></h6>
			 
			   <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
    <tbody>
                <tr>
                  <td style="border:0px solid;">i)R.S.F No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['rsfno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">ii)Patta No</td>
                  <td style="border:0px solid;">: <?php echo $project1['pattano'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iii)Block No</td>
                  <td style="border:0px solid;">: <?php echo $project1['blockno'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iv)T.S.No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['tsno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">v)S.R.O</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['sro']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vi)Plot No</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['plotno']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vii)Pin Code</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['pincode']);?></td>
                </tr>
				
				</table>
			
			 
			 
              
            </div>
          </div>
		  
<div class="row invoice-info" >
            <div class="col m6 s12" style="border: 1px solid;">
             
			 <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
    <tbody>
                <tr>
                  <td style="border:0px solid; height: 52px;">i)Land Mark</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['landmark']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height: 52px;">ii)Nearest Bus Stop </td>
                  <td style="border:0px solid;">: <?php echo $project1['nearestbustop'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height: 52px;">iii)Distance of Branch</td>
                  <td style="border:0px solid;">: <?php echo $project1['distanceofbranch'];?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height: 52px;">iv)Distance of R.S</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['distanceofrs']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height: 52px;">v)Nearest Main Road </td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['nearestmainroad']);?></td>
                </tr>
				<tr>
                  <td style="border:0px solid; height: 52px;">vi)Civil Amenities</td>
                  <td style="border:0px solid;">: <?php echo ucwords($project1['civilamenities']);?></td>
                </tr>
		
				
				</table>

            </div>
            <div class="col m6 s12" style="border: 1px solid;">
             
	 <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
    <tbody>
                <tr>
                  <td style="border:0px solid;">i)Property Occupied</td>
                  <td style="border:0px solid;height: 52px;">:  <?php if($project1['propertyoccupied']=='owner') {?> <i class="material-icons  check1">check</i> <?php } ?>Owner / <?php if($project1['propertyoccupied']=='rent') {?> <i class="material-icons  check1">check</i> <?php } ?>Rent</td>
                </tr>
				<tr>
                  <td style="border:0px solid;">ii)Tax Receipt </td>
                  <td style="border:0px solid;height: 52px;">: <?php if($project1['taxreceipt']=='Yes') {?> <i class="material-icons  check1">check</i> <?php } ?>Y / <?php if($project1['taxreceipt']=='No') {?> <i class="material-icons  check1">check</i> <?php } ?>N</td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iii)E.B. Service No</td>
                  <td style="border:0px solid;height: 52px;">: <?php if($project1['ebserviceno']=='Yes') {?> <i class="material-icons  check1">check</i> <?php } ?>Y / <?php if($project1['ebserviceno']=='No') {?> <i class="material-icons  check1">check</i> <?php } ?>N</td>
                </tr>
				<tr>
                  <td style="border:0px solid;">iv)Patta / DTCP</td>
                  <td style="border:0px solid;height: 52px;">: <?php if($project1['pattadtcp']=='Yes') {?> <i class="material-icons  check1">check</i> <?php } ?>Y / <?php if($project1['pattadtcp']=='No') {?> <i class="material-icons  check1">check</i> <?php } ?>N</td>
                </tr>
				<tr>
                  <td style="border:0px solid;">v)Approval Plan</td>
                  <td style="border:0px solid;height: 52px;">: <?php if($project1['approvalplan']=='Yes') {?> <i class="material-icons  check1">check</i> <?php } ?>Y / <?php if($project1['approvalplan']=='No') {?> <i class="material-icons  check1">check</i> <?php } ?>N</td>
                </tr>
				<tr>
                  <td style="border:0px solid;">vi)H.D Line</td>
                  <td style="border:0px solid;height: 52px;">: <?php if($project1['hdline']=='Yes') {?> <i class="material-icons  check1">check</i> <?php } ?>Y / <?php if($project1['hdline']=='No') {?> <i class="material-icons  check1">check</i> <?php } ?>N</td>
                </tr>
		
				
				</table>		 
		
            </div>
          </div>		  
	
            <table class="striped responsive-table" style="    width: 102.5%;
    margin-left: -12px;">
              <thead>
                <tr>
                  <th style="border:1px solid;"></th>
                  <th style="border:1px solid;">Boundary Details </th>
                  <th style="border:1px solid;">Dimensions</th>
                  <th style="border:1px solid;">Remarks</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="border:1px solid;">North</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['northremarks']);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">South</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['southboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['southdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['southremarks']);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">East</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['eastboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['eastdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['eastremarks']);?></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">West</td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['westboundary']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['westdimensions']);?></td>
                  <td style="border:1px solid;"> <?php echo ucwords($project1['westremarks']);?></td>
                 
                </tr>
				
				<tr>
                  <td colspan="2" style="border:1px solid;">Extent of Site:</td>
                  <td colspan="2" style="border:1px solid;"> <?php echo ucwords($project1['extent_of_site']);?></td>
               
                 
                </tr>
               
              </tbody>
            </table>
       
		  
		      <!-- product details table-->
          <div class="invoice-product-details" style="border-top:1px solid;">
            <table class="striped responsive-table">
            
              <tbody>
			  
                <tr>
                  <td style="border:0px solid;">1.Type of Property </td>
                  <td style="border:0px solid;"><?php if($project1['typeofproperty']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Residential/</td>
				  <td style="border:0px solid;"><?php if($project1['typeofproperty']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Commercial/ </td>
				  <td style="border:0px solid;"><?php if($project1['typeofproperty']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Industrial/</td>
				  <td style="border:0px solid;"><span style="margin-left: -49px;"><?php if($project1['typeofproperty']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Vacant Land/</span></td>
				  <td style="border:0px solid;"><span style="margin-left: -29px;"><?php if($project1['typeofproperty']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>Agricultural/</span></td>
				  <td colspan="1" style="border:0px solid;"><span style="margin-left: -49px;"><?php if($project1['typeofproperty']=='6') {?> <i class="material-icons  check1">check</i> <?php } ?>Dry Land</span></td>
				 
                 
                </tr>
				<tr>
                  <td style="border:0px solid;">2.Size of Plot  </td>
                   <td style="border:0px solid;"><span style="margin-left: -5px;"><?php if($project1['sizeofplot']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Rectangular /</span></td>
				  <td style="border:0px solid;"><?php if($project1['sizeofplot']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Regular /</td>
				  <td style="border:0px solid;"><?php if($project1['sizeofplot']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Irrecgular /</td>
				  <td style="border:0px solid;"><?php if($project1['sizeofplot']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>dd</td>
				  <td style="border:0px solid;"><?php if($project1['sizeofplot']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?></td>
				  <td style="border:0px solid;"><?php if($project1['sizeofplot']=='6') {?> <i class="material-icons  check1">check</i> <?php } ?></td>
				  <td style="border:0px solid;"><?php if($project1['sizeofplot']=='7') {?> <i class="material-icons  check1">check</i> <?php } ?></td>
                 
                </tr>
				<tr>
                  <td style="border:0px solid;">3.Recent Developments Near to the Site  </td>
                   <td style="border:0px solid;"><?php if($project1['recentdevelopmentsnear']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Residential / </td>
				  <td style="border:0px solid;"><?php if($project1['recentdevelopmentsnear']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Commercial/</td>
				  <td style="border:0px solid;"><?php if($project1['recentdevelopmentsnear']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Industrial/</td>
				  <td style="border:0px solid;"><?php if($project1['recentdevelopmentsnear']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Mixed/</td>
				  <td style="border:0px solid;"><?php if($project1['recentdevelopmentsnear']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>Agricultural</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                </tr>
			
				<tr>
                 <td style="border:0px solid;">4.Resent Sale Details  </td>
                  <td style="border:0px solid;"></td>
				  <td colspan="5" style="border:0px solid;"><?php echo $project1['resentsaledetails'];?></td>
				 
                </tr>
				
				<tr>
                 <td style="border:0px solid;">5.Prevailing Market Rate  </td>
                  <td style="border:0px solid;">Rs.   <?php echo $project1['prevailingmarketratefrom'];?></td>
				  <td style="border:0px solid;">(to) </td>
				  <td style="border:0px solid;"> Rs.  <?php echo $project1['prevailingmarketrateto'];?></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">6.Class of Construction   </td>
                  <td style="border:0px solid;"><?php if($project1['classofconstruction']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>I -Class /</td>
				  <td style="border:0px solid;"><?php if($project1['classofconstruction']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>II - Class/</td>
				  <td style="border:0px solid;"><?php if($project1['classofconstruction']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>III- Class/</td>
				  <td colspan="2" style="border:0px solid;"><span style="margin-left: -29px;"><?php if($project1['classofconstruction']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Building Under Construction</span></td>
				  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">7.Roof  </td>
                  <td style="border:0px solid;"><?php if($project1['roof']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>RCC/</td>
				  <td style="border:0px solid;"><?php if($project1['roof']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>AC Sheet/</td>
				  <td style="border:0px solid;"><?php if($project1['roof']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Galvalume/</td>
				  <td style="border:0px solid;"><?php if($project1['roof']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>M.Tiled/</td>
				  <td style="border:0px solid;"><?php if($project1['roof']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>Madras Terrace</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">8.Limit  </td>
                  <td style="border:0px solid;"><?php if($project1['limits']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Corporation/</td>
				  <td style="border:0px solid;"><?php if($project1['limits']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Municipality/</td>
				  <td style="border:0px solid;"><?php if($project1['limits']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Town Panchayat/</td>
				  <td style="border:0px solid;"><?php if($project1['limits']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Panchayat</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                </tr>
				
				
               
              </tbody>
            </table>
          </div>
		  
		  
		     <div class="invoice-product-details">
            <table class="striped responsive-table">
             
              <tbody>
                <tr>
                  <td style="border:0px solid;">1.Type of Construction </td>
                  <td colspan="2" style="border:0px solid;"><?php if($project1['typeofconstruction']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Load Bearing Structure /</td>
				  <td colspan="2" style="border:0px solid;"><?php if($project1['typeofconstruction']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Framed Structure/ </td>
				 
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                 
                </tr>
				<tr>
                  <td style="border:0px solid;">2.No of floor    </td>
                   <td style="border:0px solid;"><?php if($project1['nooffloor']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Ground/</td>
				  <td style="border:0px solid;"><?php if($project1['nooffloor']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>First/</td>
				  <td style="border:0px solid;"><?php if($project1['nooffloor']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Second/</td>
				  <td style="border:0px solid;"><?php if($project1['nooffloor']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Third Floor</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                  
                </tr>
				<tr>
                  <td style="border:0px solid;">3.Maintenance of the Building </td>
                   <td style="border:0px solid;"><?php if($project1['maintenanceofthebuilding']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Normal/</td>
				  <td style="border:0px solid;"><?php if($project1['maintenanceofthebuilding']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Poor/</td>
				  <td style="border:0px solid;"><?php if($project1['maintenanceofthebuilding']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Good/</td>
				  <td style="border:0px solid;"><?php if($project1['maintenanceofthebuilding']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Fair/</td>
				  <td style="border:0px solid;"><?php if($project1['maintenanceofthebuilding']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>Excellent</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				 
                </tr>
			
				<tr>
                 <td style="border:0px solid;">4.Water Supply Arrangements </td>
                  <td style="border:0px solid;"><?php if($project1['maintenanceofthebuilding']=='Yes') {?> <i class="material-icons  check1">check</i> <?php } ?>Yes / <?php if($project1['maintenanceofthebuilding']=='No') {?> <i class="material-icons  check1">check</i> <?php } ?>No</td>
				  <td style="border:0px solid;"><?php if($project1['watersupplyarrangementsyes']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Bore Well/</td>
				  <td style="border:0px solid;"><?php if($project1['watersupplyarrangementsyes']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Sump/</td>
				  <td style="border:0px solid;"><?php if($project1['watersupplyarrangementsyes']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Panchayat Tap/</td>
				  <td style="border:0px solid;"><?php if($project1['watersupplyarrangementsyes']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Well/</td>
				  <td style="border:0px solid;"><?php if($project1['watersupplyarrangementsyes']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>OHT/</td>
				  <td style="border:0px solid;"><?php if($project1['watersupplyarrangementsyes']=='6') {?> <i class="material-icons  check1">check</i> <?php } ?>Sintex/</td>
                </tr>
				
				<tr>
                 <td style="border:0px solid;">5.Drainage Arrangements </td>
                  <td style="border:0px solid;"><?php if($project1['drainagearrangements']=='Yes') {?> <i class="material-icons  check1">check</i> <?php } ?>Yes/ <?php if($project1['drainagearrangements']=='No') {?> <i class="material-icons  check1">check</i> <?php } ?>No</td>
				  <td style="border:0px solid;"><?php if($project1['drainagearrangementsyes']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Septic Tank/</td>
				  <td style="border:0px solid;"><?php if($project1['drainagearrangementsyes']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Open</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  	  <td></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">6.Character of Locality</td>
                  <td style="border:0px solid;"><?php if($project1['characteroflocality']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Residential/</td>
				  <td style="border:0px solid;"><?php if($project1['characteroflocality']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Commercial/</td>
				  <td style="border:0px solid;"><?php if($project1['characteroflocality']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Industrial/</td>
				  <td style="border:0px solid;"><?php if($project1['characteroflocality']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Agricultural/</td>
				  <td style="border:0px solid;"><?php if($project1['characteroflocality']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>Mixed</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				
                </tr>
				<tr>
                 <td style="border:0px solid;">7.Road Facilities  </td>
                  <td style="border:0px solid;"> Wide:  <?php echo $project1['roadfacilities'];?>  </td>
				  <td style="border:0px solid;">/<?php if($project1['roadfacilities']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Tar/</td>
				  <td style="border:0px solid;"><?php if($project1['roadfacilities']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Bitumen/</td>
				  <td style="border:0px solid;"><?php if($project1['roadfacilities']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Mud/</td>
				  <td style="border:0px solid;"><?php if($project1['roadfacilities']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Cement/</td>
				  <td style="border:0px solid;"><?php if($project1['roadfacilities']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>Concrete/</td>
				  <td style="border:0px solid;"><?php if($project1['roadfacilities']=='6') {?> <i class="material-icons  check1">check</i> <?php } ?>Mixed</td>
				  	 
                </tr>
				<tr>
                 <td style="border:0px solid;">8.Corner Plot, Intermittent Plot</td>
                  <td style="border:0px solid;"><?php if($project1['cornerplotintermittentplot']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Corener/</td>
				  <td style="border:0px solid;"><?php if($project1['cornerplotintermittentplot']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Intermittent</td>
				 <td style="border:0px solid;"></td>
				 <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  	  
                </tr>
				<tr>
                 <td style="border:0px solid;">9.Floor Finishing</td>
                  <td style="border:0px solid;"><?php if($project1['floorfinishing']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>Tiles/</td>
				  <td style="border:0px solid;"><?php if($project1['floorfinishing']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>Moasic/</td>
				  <td style="border:0px solid;"><?php if($project1['floorfinishing']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>C.M/</td>
				  <td style="border:0px solid;"><?php if($project1['floorfinishing']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Granite/</td>
				  <td style="border:0px solid;"><?php if($project1['floorfinishing']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>Marble/</td>
				  <td style="border:0px solid;"><?php if($project1['floorfinishing']=='6') {?> <i class="material-icons  check1">check</i> <?php } ?>Italian Marble/</td>
				  <td style="border:0px solid;"><?php if($project1['floorfinishing']=='7') {?> <i class="material-icons  check1">check</i> <?php } ?>Co Stone</td>
				  	  
                </tr>
				<tr>
                 <td style="border:0px solid;">10.Joineries </td>
                  <td style="border:0px solid;"><?php if($project1['joineries']=='1') {?> <i class="material-icons  check1">check</i> <?php } ?>C-W/</td>
				  <td style="border:0px solid;"><?php if($project1['joineries']=='2') {?> <i class="material-icons  check1">check</i> <?php } ?>T-W/</td>
				  <td style="border:0px solid;"><?php if($project1['joineries']=='3') {?> <i class="material-icons  check1">check</i> <?php } ?>Steel/</td>
				  <td style="border:0px solid;"><?php if($project1['joineries']=='4') {?> <i class="material-icons  check1">check</i> <?php } ?>Roll-Shutter/</td>
				  <td style="border:0px solid;"><?php if($project1['joineries']=='5') {?> <i class="material-icons  check1">check</i> <?php } ?>U PVC</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  	
                </tr>
				
				
               
              </tbody>
            </table>
          </div>
		   <div class="row invoice-info">
            <div class="col m6 s12">
		   <div class="invoice-product-details">
            <table class="striped responsive-table">
              <thead>
          
              </thead>
              <tbody>
                <tr>
                  <td style="border:0px solid;">1.Water Supply Arrangements </td>
                  <td style="border:0px solid;">-Rs.</td>
				   <td style="border:0px solid;"><?php echo $project1['watersupplyarrangementsRs'];?></td>
				 
				 
                </tr>
				<tr>
                  <td style="border:0px solid;">2.Drainage Arrangements   </td>
                  <td style="border:0px solid;">-Rs.</td>
				  <td style="border:0px solid;"><?php echo $project1['drainagearrangementsRs'];?></td>
				 
                </tr>
				<tr>
                  <td style="border:0px solid;">Compound Wall L-<?php echo $project1['compoundwallL'];?>    H- <?php echo $project1['compoundwallH'];?>  </td>
                   <td style="border:0px solid;">-Rs.</td>
				
				   <td style="border:0px solid;"><?php echo $project1['compoundwallRs'];?></td>
				 
                </tr>
			
				<tr>
                 <td style="border:0px solid;">4.E.B Deposit I-<?php echo $project1['ebdepositI'];?>  III-<?php echo $project1['ebdepositIII'];?> </td>
                  <td style="border:0px solid;"> -Rs.</td>
				   <td style="border:0px solid;"><?php echo $project1['ebdepositRs'];?></td>
				
				 
                </tr>
				
				<tr>
                 <td style="border:0px solid;">5. <?php if($project1['paverrs']!='') {?> <i class="material-icons  check1">check</i> <?php } ?>Pavar/ <?php if($project1['cementrs']!='') {?> <i class="material-icons  check1">check</i> <?php } ?>Cement/ <?php if($project1['tilesrs']!='') {?> <i class="material-icons  check1">check</i> <?php } ?>Tiles </td>
                  <td style="border:0px solid;"> -Rs.</td>
				 
				   <td style="border:0px solid;"><?php if($project1['paverrs']!='') {echo $project1['paverrs'];} if($project1['cementrs']!='') {echo $project1['cementrs'];} if($project1['tilesrs']!='') {echo $project1['tilesrs'];}?></td>
				
                </tr>
				<tr>
                 <td style="border:0px solid;">6.Sump-<?php echo $project1['sump'];?>    /OHT-<?php echo $project1['oht'];?>  </td>
                  <td style="border:0px solid;"> -Rs.</td>
	
				  <td style="border:0px solid;"><?php echo $project1['sumpohtRs'];?></td>
				 
                </tr>
				<tr>
                 <td style="border:0px solid;">7.Interior Work  </td>
                  <td style="border:0px solid;"> -Rs.</td>
			
				  <td style="border:0px solid;"><?php echo $project1['interiorworkRs'];?></td>
				 
                </tr>
				<tr>
                 <td style="border:0px solid;">8.Open Staircase </td>
          <td style="border:0px solid;"> -Rs.</td>
				  <td style="border:0px solid;"><?php echo $project1['openstaircaseRs'];?></td>
				 
		
                </tr>
				
				
               
              </tbody>
            </table>
          </div>
		   </div>
		    <div class="col m6 s12"> 
			 <h6 class="invoice-from" style="color:black;    ">i.Any Other Note Point </h6>
			  <div class="invoice-product-details" style="border:1px solid;height: 198px;">
			</div>
			</div>
		    </div>
		  
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

 
 