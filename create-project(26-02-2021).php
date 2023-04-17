<?php
include("config.php");
include('mobile_detect.php');
$detect = new Mobile_Detect();
include("header.php");
 $edit_id=end(explode("edit/",$_SERVER['REQUEST_URI']));
$seller_id="";
$staff_id="";
$vehicle_type_id=$_POST['vehicle_type_id'];
$staff_id=$_POST['staff_id'];
$date=$_POST['date'];
$ton=$_POST['ton'];
$owner_type_id=$_POST['owner_type_id'];
$dalmia_rate_ton=$_POST['dalmia_rate_ton'];
$transport_rate_ton=$_POST['transport_rate_ton'];
$vehicle_no=$_POST['vehicle_no'];
$cash_advance=$_POST['cash_advance'];
$driver_advance=$_POST['driver_advance'];

if($edit_id=='/create-project')
{

if(isset($_REQUEST['step1']))
{


 
$bank=$_POST['bank']; 
$date=$_POST['date']; 
$loanAmount=$_POST['loanAmount']; 
$inspected=$_POST['inspected']; 
$companyName=$_POST['companyName']; 
$advanceAmount=$_POST['advanceAmount']; 
$ownerAddress=$_POST['ownerAddress']; 
$purchaseAddress=$_POST['purchaseAddress']; 
$odoorno=$_POST['odoorno']; 
$ostreet=$_POST['ostreet']; 
$oarea=$_POST['oarea']; 
$opost=$_POST['opost']; 
$otaluk=$_POST['otaluk']; 
$odistrict=$_POST['odistrict']; 
$pdoorno=$_POST['pdoorno']; 
$pstreet=$_POST['pstreet']; 
$parea=$_POST['parea']; 
$pvillage=$_POST['pvillage']; 
$ptaluk=$_POST['ptaluk']; 
$pdistrict=$_POST['pdistrict']; 


$count = mysqli_query($conn,"SELECT * FROM `project_details` where bank like '%$bank%' and  loanAmount='$loanAmount' and  purchaseAddress='$purchaseAddress'"); 
$total_count=mysqli_num_rows($count);
if($total_count>='1')
{
$message='fail';
$alert="Data Already Exist.";	
}
else
{
	

	
     $query = "insert into project_details(bank,parea,date,loanAmount,inspected,companyName,advanceAmount,ownerAddress,purchaseAddress,odoorno,ostreet,oarea,opost,otaluk,odistrict,pdoorno,pstreet,pvillage,ptaluk,pdistrict,date_time,log_id) values ('$bank','$parea','$date','$loanAmount','$inspected','$companyName','$advanceAmount','$ownerAddress','$purchaseAddress','$odoorno','$ostreet','$oarea','$opost','$otaluk','$odistrict','$pdoorno','$pstreet','$pvillage','$ptaluk','$pdistrict','$date_time','$log_id')";
 

$inserted = mysqli_query($conn, $query);


$ins=mysqli_insert_id($conn);

$insid=base64_encode($ins);


if($inserted=='1')	
{
$alert="Succesfully Created.";	
$message="Success";	
}
else
{
$message="fail";		
}


if(isset($_REQUEST['next']))
{
	
    echo "<script> window.location.href = 'create-project?step=step2&stepid=$insid'</script>";
	

}




}
}
}
else
{
	
if(isset($_REQUEST['step1']))
{	


$edit_id=base64_decode($_REQUEST['stepid']);
$bank=$_POST['bank']; 
$date=$_POST['date']; 
$loanAmount=$_POST['loanAmount']; 
$inspected=$_POST['inspected']; 
$companyName=$_POST['companyName']; 
$advanceAmount=$_POST['advanceAmount']; 
$ownerAddress=$_POST['ownerAddress']; 
$purchaseAddress=$_POST['purchaseAddress']; 
$odoorno=$_POST['odoorno']; 
$ostreet=$_POST['ostreet']; 
$oarea=$_POST['oarea']; 
$opost=$_POST['opost']; 
$otaluk=$_POST['otaluk']; 
$odistrict=$_POST['odistrict']; 
$pdoorno=$_POST['pdoorno']; 
$pstreet=$_POST['pstreet']; 
$parea=$_POST['parea']; 
$pvillage=$_POST['pvillage']; 
$ptaluk=$_POST['ptaluk']; 
$pdistrict=$_POST['pdistrict']; 



$query = "UPDATE `project_details` SET `bank`='$bank',`date`='$date',`loanAmount`='$loanAmount',`inspected`='$inspected',`companyName`='$companyName',`advanceAmount`='$advanceAmount',`ownerAddress`='$ownerAddress',`purchaseAddress`='$purchaseAddress',`odoorno`='$odoorno',`ostreet`='$ostreet',`oarea`='$oarea',`opost`='$opost',`otaluk`='$otaluk',`odistrict`='$odistrict',`pdoorno`='$pdoorno',`pstreet`='$pstreet',`parea`='$parea',`pvillage`='$pvillage',`ptaluk`='$ptaluk',`pdistrict`='$pdistrict',`log_id`='$log_id',`date_time`='$date_time' where id='$edit_id'";


$inserted = mysqli_query($conn, $query);



if(isset($_REQUEST['step1']))
{


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



$insid=$_REQUEST['stepid'];


if(isset($_REQUEST['next']))
{
	
    echo "<script> window.location.href = 'create-project?step=step2&&stepid=$insid'</script>";
	

}


}	
	
	
	
	
if(isset($_REQUEST['step2']))
{	

$edit_id=base64_decode($_REQUEST['stepid']);

$propertydoorno=$_POST['propertydoorno']; 
$rsfno=$_POST['rsfno']; 
$propertystreet=$_POST['propertystreet']; 
$pattano=$_POST['pattano']; 
$propertyarea=$_POST['propertyarea']; 
$blockno=$_POST['blockno']; 
$propertyvillage=$_POST['propertyvillage']; 
$tsno=$_POST['tsno']; 
$propertytaluk=$_POST['propertytaluk']; 
$sro=$_POST['sro']; 
$propertydistict=$_POST['propertydistict']; 
$plotno=$_POST['plotno']; 
$propertycellno=$_POST['propertycellno']; 
$pincode=$_POST['pincode']; 
$landmark=$_POST['landmark']; 
$propertyoccupied=$_POST['propertyoccupied']; 
$nearestbustop=$_POST['nearestbustop']; 
$taxreceipt=$_POST['taxreceipt'];  
$ebserviceno=$_POST['ebserviceno']; 
$pattadtcp=$_POST['pattadtcp']; 
$nearestmainroad=$_POST['nearestmainroad']; 
$approvalplan=$_POST['approvalplan']; 
$civilamenities=$_POST['civilamenities']; 
$hdline=$_POST['hdline']; 
 

 if($_FILES["taxreceiptfile"]["name"]!='') {	
$array = explode('.', $_FILES['taxreceiptfile']['name']);
$taxreceiptfile = "tax".$date_time_micro.".".end($array);
$target_dir1 = "documents/tax/";
$target_file = $target_dir1 .$taxreceiptfile;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["taxreceiptfile"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("Tax");}
 }
 else
 {
	$taxreceiptfile=$_POST['taxreceiptfile_name'];
 }
 
 
 if($_FILES["ebservicenofile"]["name"]!='') {	
$array = explode('.', $_FILES['ebservicenofile']['name']);
$ebservicenofile = "ebservice".$date_time_micro.".".end($array);
$target_dir1 = "documents/ebservice/";
$target_file = $target_dir1 .$ebservicenofile;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["ebservicenofile"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("EB Service");}
 }
 else
 {
	$ebservicenofile=$_POST['ebservicenofile_name'];
 } 
 
 
  if($_FILES["pattadtcpfile"]["name"]!='') {	
$array = explode('.', $_FILES['pattadtcpfile']['name']);
$pattadtcpfile = "pattadtcp".$date_time_micro.".".end($array);
$target_dir1 = "documents/pattadtcp/";
$target_file = $target_dir1 .$pattadtcpfile;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["pattadtcpfile"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("Patta");}
 }
 else
 {
	$pattadtcpfile=$_POST['pattadtcpfile_name'];
 } 
 
 
  if($_FILES["approvalplanfile"]["name"]!='') {	
$array = explode('.', $_FILES['approvalplanfile']['name']);
$approvalplanfile = "approvalplan".$date_time_micro.".".end($array);
$target_dir1 = "documents/approvalplan/";
$target_file = $target_dir1 .$approvalplanfile;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["approvalplanfile"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("approvalplan");}
 }
 else
 {
	$approvalplanfile=$_POST['approvalplanfile_name'];
 } 


  if($_FILES["hdlinefile"]["name"]!='') {	
$array = explode('.', $_FILES['hdlinefile']['name']);
$hdlinefile = "hdline".$date_time_micro.".".end($array);
$target_dir1 = "documents/hdline/";
$target_file = $target_dir1 .$hdlinefile;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["hdlinefile"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("hdline");}
 }
 else
 {
	$hdlinefile=$_POST['hdlinefile_name'];
 } 




 $query = "UPDATE `project_details` SET `propertydoorno`='$propertydoorno',`rsfno`='$rsfno',`propertystreet`='$propertystreet',`pattano`='$pattano',`propertyarea`='$propertyarea',`blockno`='$blockno',`propertyvillage`='$propertyvillage',`tsno`='$tsno',`propertytaluk`='$propertytaluk',`sro`='$sro',`propertydistict`='$propertydistict',`plotno`='$plotno',`propertycellno`='$propertycellno',`pincode`='$pincode',`landmark`='$landmark',`propertyoccupied`='$propertyoccupied',`nearestbustop`='$nearestbustop',`taxreceipt`='$taxreceipt',`taxreceiptfile`='$taxreceiptfile',`ebserviceno`='$ebserviceno',`ebservicenofile`='$ebservicenofile',`distanceofrs`='$distanceofrs',`pattadtcp`='$pattadtcp',`pattadtcpfile`='$pattadtcpfile',`nearestmainroad`='$nearestmainroad',`approvalplan`='$approvalplan',`approvalplanfile`='$approvalplanfile',`civilamenities`='$civilamenities',`hdline`='$hdline',`log_id`='$log_id',`hdlinefile`='$hdlinefile',`log_id`='$log_id',`date_time`='$date_time' where id='$edit_id'";


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






$insid=$_REQUEST['stepid'];


if(isset($_REQUEST['prev']))
{
	
    echo "<script> window.location.href = 'create-project?step=step1&&stepid=$insid'</script>";
	

}



if(isset($_REQUEST['next']))
{
	
    echo "<script> window.location.href = 'create-project?step=step3&&stepid=$insid'</script>";
	

}


}
if(isset($_REQUEST['step3']))
{	
$edit_id=base64_decode($_REQUEST['stepid']);
$northboundary=implode(",",$_POST['northboundary']); 
$southboundary=implode(",",$_POST['southboundary']); 
$northdimensions=$_POST['northdimensions']; 
$southdimensions=$_POST['southdimensions']; 
$northremarks=$_POST['northremarks']; 
$southremarks=$_POST['southremarks']; 
$eastboundary=implode(",",$_POST['eastboundary']); 
$westboundary=implode(",",$_POST['westboundary']); 
$eastdimensions=$_POST['eastdimensions']; 
$westdimensions=$_POST['westdimensions']; 
$eastremarks=$_POST['eastremarks']; 
$westremarks=$_POST['westremarks']; 
$extent_of_site=$_POST['extent_of_site']; 
$typeofproperty=implode(",",$_POST['typeofproperty']); 
$sizeofplot=implode(",",$_POST['sizeofplot']); 
$recentdevelopmentsnear=implode(",",$_POST['recentdevelopmentsnear']); 
$resentsaledetails=implode(",",$_POST['resentsaledetails']); 
$prevailingmarketratefrom=implode(",",$_POST['prevailingmarketratefrom']); 
$classofconstruction=implode(",",$_POST['classofconstruction']); 
$roof=implode(",",$_POST['roof']); 
$limits=implode(",",$_POST['limits']); 
$prevailingmarketrateto=$_POST['prevailingmarketrateto']; 

$north1=implode(",",$_POST['north1']); 
$north2=implode(",",$_POST['north2']); 
$north3=implode(",",$_POST['north3']); 
$north4=implode(",",$_POST['north4']); 
$north5=implode(",",$_POST['north5']);
$north6=implode(",",$_POST['north6']);
$north7=implode(",",$_POST['north7']);
$north8=implode(",",$_POST['north8']);
$north9=implode(",",$_POST['north9']);
$south1=implode(",",$_POST['south1']);
$south2=implode(",",$_POST['south2']);
$south3=implode(",",$_POST['south3']);
$south4=implode(",",$_POST['south4']);
$south5=implode(",",$_POST['south5']);
$south6=implode(",",$_POST['south6']);
$south7=implode(",",$_POST['south7']);
$south8=implode(",",$_POST['south8']);
$south9=implode(",",$_POST['south9']);
$east1=implode(",",$_POST['east1']);
$east2=implode(",",$_POST['east2']);
$east2=implode(",",$_POST['east2']);
$east3=implode(",",$_POST['east3']);
$east4=implode(",",$_POST['east4']);
$east5=implode(",",$_POST['east5']);
$east6=implode(",",$_POST['east6']);
$east7=implode(",",$_POST['east7']);
$east8=implode(",",$_POST['east8']);
$east9=implode(",",$_POST['east9']);
$west1=implode(",",$_POST['west1']);
$west2=implode(",",$_POST['west2']);
$west3=implode(",",$_POST['west3']);
$west4=implode(",",$_POST['west4']);
$west5=implode(",",$_POST['west5']);
$west6=implode(",",$_POST['west6']);
$west7=implode(",",$_POST['west7']);
$west8=implode(",",$_POST['west8']);
$west9=implode(",",$_POST['west9']);
$estent1=implode(",",$_POST['estent1']);
$estent2=implode(",",$_POST['estent2']);
$estent3=implode(",",$_POST['estent3']);
$anyarea=implode(",",$_POST['anyarea']);
$dimensionsite=implode(",",$_POST['dimensionsite']);
$totalarea=implode(",",$_POST['totalarea']);
$totalrate=implode(",",$_POST['totalrate']);
$totallandvalue=implode(",",$_POST['totallandvalue']);




$query = "UPDATE `project_details` SET `north1`='$north1',`north2`='$north2',`north3`='$north3',`north4`='$north4',`north5`='$north5',`north6`='$north6',`north7`='$north7',`north8`='$north8',`north9`='$north9',`south1`='$south1',`south2`='$south2',`south3`='$south3',`south4`='$south4',`south5`='$south5',`south6`='$south6',`south7`='$south7',`south8`='$south8',`south9`='$south9',`east1`='$east1',`east2`='$east2',`east3`='$east3',`east4`='$east4',`east5`='$east5',`east6`='$east6',`east7`='$east7',`east8`='$east8',`east9`='$east9',`west1`='$west1',`west2`='$west2',`west3`='$west3',`west4`='$west4',`west5`='$west5',`west6`='$west6',`west7`='$west7',`west8`='$west8',`west9`='$west9',`estent1`='$estent1',`estent2`='$estent2',`estent3`='$estent3',`anyarea`='$anyarea',`dimensionsite`='$dimensionsite',`totalarea`='$totalarea',`totalrate`='$totalrate',`totallandvalue`='$totallandvalue',`prevailingmarketrateto`='$prevailingmarketrateto',`northboundary`='$northboundary',`southboundary`='$southboundary',`northdimensions`='$northdimensions',`southdimensions`='$southdimensions',`northremarks`='$northremarks',`southremarks`='$southremarks',`eastboundary`='$eastboundary',`westboundary`='$westboundary',`eastdimensions`='$eastdimensions',`westdimensions`='$westdimensions',`eastremarks`='$eastremarks',`westremarks`='$westremarks',`extent_of_site`='$extent_of_site',`typeofproperty`='$typeofproperty',`sizeofplot`='$sizeofplot',`recentdevelopmentsnear`='$recentdevelopmentsnear',`resentsaledetails`='$resentsaledetails',`prevailingmarketratefrom`='$prevailingmarketratefrom',`classofconstruction`='$classofconstruction',`roof`='$roof',`limits`='$limits',`log_id`='$log_id',`date_time`='$date_time' where id='$edit_id'";


$inserted = mysqli_query($conn, $query);

if($inserted=='1')	
{
$alert="Succesfully Updated.";
$message="Success";	
}

$insid=$_REQUEST['stepid'];


if(isset($_REQUEST['prev']))
{
	
    echo "<script> window.location.href = 'create-project?step=step2&&stepid=$insid'</script>";
	

}


if(isset($_REQUEST['next']))
{
	
    echo "<script> window.location.href = 'create-project?step=step4&&stepid=$insid'</script>";
	

}

}
if(isset($_REQUEST['step4']))
{	
$edit_id=base64_decode($_REQUEST['stepid']);
$typeofconstruction=$_POST['typeofconstruction']; 
$nooffloor=$_POST['nooffloor']; 
$maintenanceofthebuilding=$_POST['maintenanceofthebuilding']; 
$watersupplyarrangements=$_POST['watersupplyarrangements']; 
$watersupplyarrangementsyes=$_POST['watersupplyarrangementsyes']; 
$drainagearrangements=$_POST['drainagearrangements']; 
$drainagearrangementsyes=$_POST['drainagearrangementsyes']; 
$characteroflocality=$_POST['characteroflocality']; 
$roadfacilities=$_POST['roadfacilities']; 
$cornerplotintermittentplot=$_POST['cornerplotintermittentplot']; 
$floorfinishing=$_POST['floorfinishing']; 
$joineries=$_POST['joineries']; 
$watersupplyarrangementsRs=$_POST['watersupplyarrangementsRs']; 
$drainagearrangementsRs=$_POST['drainagearrangementsRs']; 
$compoundwallL=$_POST['compoundwallL']; 
$compoundwallH=$_POST['compoundwallH']; 
$compoundwallRs=$_POST['compoundwallRs']; 
$ebdepositI=$_POST['ebdepositI']; 
$ebdepositIII=$_POST['ebdepositIII']; 
$ebdepositRs=$_POST['ebdepositRs']; 
$paverrs=$_POST['paverrs']; 
$cementrs=$_POST['cementrs']; 
$tilesrs=$_POST['tilesrs']; 
$sump=$_POST['sump']; 
$oht=$_POST['oht']; 
$sumpohtRs=$_POST['sumpohtRs']; 
$interiorworkRs=$_POST['interiorworkRs']; 
$openstaircaseRs=$_POST['openstaircaseRs']; 
$roadfacilitiesyes=$_POST['roadfacilitiesyes']; 
$serviceovertotal=$_POST['serviceovertotal']; 
$sintex=$_POST['sintex'];
$compoundwallL1=$_POST['compoundwallL1'];
$compoundwallL2=$_POST['compoundwallL2'];
$compoundwallH1=$_POST['compoundwallH1'];
$compoundwallH2=$_POST['compoundwallH2'];

$desc_prop=implode(",",$_POST['desc_prop']);
$lengtha=implode(",",$_POST['lengtha']);
$lengthb=implode(",",$_POST['lengthb']);
$length=implode(",",$_POST['length']);
$breadtha=implode(",",$_POST['breadtha']);
$breadthb=implode(",",$_POST['breadthb']);
$breadth=implode(",",$_POST['breadth']);
$area=implode(",",$_POST['area']);
$rate=implode(",",$_POST['rate']);
$year=implode(",",$_POST['year']);
$roofselect=implode(",",$_POST['roofselect']);
$deprciation=implode(",",$_POST['deprciation']);
$total=implode(",",$_POST['total']);
$overalltotal=$_POST['overalltotal'];


$desc_prop1=implode(",",$_POST['desc_prop1']);
$lengtha1=implode(",",$_POST['lengtha1']);
$lengthb1=implode(",",$_POST['lengthb1']);
$length1=implode(",",$_POST['length1']);
$breadtha1=implode(",",$_POST['breadtha1']);
$breadthb1=implode(",",$_POST['breadthb1']);
$breadth1=implode(",",$_POST['breadth1']);
$area1=implode(",",$_POST['area1']);
$rate1=implode(",",$_POST['rate1']);
$year1=implode(",",$_POST['year1']);
$roofselect1=implode(",",$_POST['roofselect1']);
$deprciation1=implode(",",$_POST['deprciation1']);
$total1=implode(",",$_POST['total1']);
$overalltotal1=$_POST['overalltotal1'];

$desc_prop2=implode(",",$_POST['desc_prop2']);
$lengtha2=implode(",",$_POST['lengtha2']);
$lengthb2=implode(",",$_POST['lengthb2']);
$length2=implode(",",$_POST['length2']);
$breadtha2=implode(",",$_POST['breadtha2']);
$breadthb2=implode(",",$_POST['breadthb2']);
$breadth2=implode(",",$_POST['breadth2']);
$area2=implode(",",$_POST['area2']);
$rate2=implode(",",$_POST['rate2']);
$year2=implode(",",$_POST['year2']);
$roofselect2=implode(",",$_POST['roofselect2']);
$deprciation2=implode(",",$_POST['deprciation2']);
$total2=implode(",",$_POST['total2']);
$overalltotal2=$_POST['overalltotal2'];

$desc_prop3=implode(",",$_POST['desc_prop3']);
$lengtha3=implode(",",$_POST['lengtha3']);
$lengthb3=implode(",",$_POST['lengthb3']);
$length3=implode(",",$_POST['length3']);
$breadtha3=implode(",",$_POST['breadtha3']);
$breadthb3=implode(",",$_POST['breadthb3']);
$breadth3=implode(",",$_POST['breadth3']);
$area3=implode(",",$_POST['area3']);
$rate3=implode(",",$_POST['rate3']);
$year3=implode(",",$_POST['year3']);
$roofselect3=implode(",",$_POST['roofselect3']);
$deprciation3=implode(",",$_POST['deprciation3']);
$total3=implode(",",$_POST['total3']);
$overalltotal3=$_POST['overalltotal3'];



$query = "UPDATE `project_details` SET `typeofconstruction`='$typeofconstruction',`roadfacilitiesyes`='$roadfacilitiesyes',`nooffloor`='$nooffloor',`maintenanceofthebuilding`='$maintenanceofthebuilding',`watersupplyarrangements`='$watersupplyarrangements',`watersupplyarrangementsyes`='$watersupplyarrangementsyes',`drainagearrangements`='$drainagearrangements',`drainagearrangementsyes`='$drainagearrangementsyes',`characteroflocality`='$characteroflocality',`roadfacilities`='$roadfacilities',`cornerplotintermittentplot`='$cornerplotintermittentplot',`floorfinishing`='$floorfinishing',`joineries`='$joineries',`watersupplyarrangementsRs`='$watersupplyarrangementsRs',`drainagearrangementsRs`='$drainagearrangementsRs',`compoundwallL`='$compoundwallL',`compoundwallH`='$compoundwallH',`compoundwallRs`='$compoundwallRs',`ebdepositI`='$ebdepositI',`ebdepositIII`='$ebdepositIII',`ebdepositRs`='$ebdepositRs',`paverrs`='$paverrs',`cementrs`='$cementrs',`tilesrs`='$tilesrs',`sump`='$sump',`oht`='$oht',`sumpohtRs`='$sumpohtRs',`interiorworkRs`='$interiorworkRs',`openstaircaseRs`='$openstaircaseRs',`log_id`='$log_id',`serviceovertotal`='$serviceovertotal',`sintex`='$sintex',`compoundwallL1`='$compoundwallL1',`compoundwallL2`='$compoundwallL2',`compoundwallH1`='$compoundwallH1',`compoundwallH2`='$compoundwallH2',`date_time`='$date_time' where id='$edit_id'";


$inserted = mysqli_query($conn, $query);


 $sql2 = "DELETE FROM project_table WHERE project_id='$edit_id'";
$retval = mysqli_query($conn, $sql2);


    $query2 = "insert into project_table(project_id,desc_prop,lengtha,lengthb,length,breadtha,breadthb,breadth,area,rate,year,roofselect,deprciation,total,overalltotal,desc_prop1,lengtha1,lengthb1,length1,breadtha1,breadthb1,breadth1,area1,rate1,year1,roofselect1,deprciation1,total1,overalltotal1,desc_prop2,lengtha2,lengthb2,length2,breadtha2,breadthb2,breadth2,area2,rate2,year2,roofselect2,deprciation2,total2,overalltotal2,desc_prop3,lengtha3,lengthb3,length3,breadtha3,breadthb3,breadth3,area3,rate3,year3,roofselect3,deprciation3,total3,overalltotal3,date_time,log_id) values ('$edit_id','$desc_prop','$lengtha','$lengthb','$length','$breadtha','$breadthb','$breadth','$area','$rate','$year','$roofselect','$deprciation','$total','$overalltotal','$desc_prop1','$lengtha1','$lengthb1','$length1','$breadtha1','$breadthb1','$breadth1','$area1','$rate1','$year1','$roofselect1','$deprciation1','$total1','$overalltotal1','$desc_prop2','$lengtha2','$lengthb2','$length2','$breadtha2','$breadthb2','$breadth2','$area2','$rate2','$year2','$roofselect2','$deprciation2','$total2','$overalltotal2','$desc_prop3','$lengtha3','$lengthb3','$length3','$breadtha3','$breadthb3','$breadth3','$area3','$rate3','$year3','$roofselect3','$deprciation3','$total3','$overalltotal3','$date_time','$log_id')";
 $inserted2 = mysqli_query($conn, $query2);





if($inserted=='1')	
{
$alert="Succesfully Updated.";
$message="Success";	
}

$insid=$_REQUEST['stepid'];
if(isset($_REQUEST['prev']))
{
	
    echo "<script> window.location.href = 'create-project?step=step3&&stepid=$insid'</script>";
	

}

}



}

$edit_id=base64_decode($_REQUEST['stepid']);

$project = mysqli_query($conn,"SELECT * FROM `project_details` where 1=1 and id='$edit_id' ");   
$project1 = mysqli_fetch_array($project);

?>




<style>
.input-field{
    border: 1px solid gray;
    border-radius: 14px;
}
.tabs .tab a.active, .tabs .tab a:hover {
    color: white;
    background-color: green;
}
.tabs li
{
border: 1px solid;
    border-radius: 10px;	
}
.tabs .tab a:focus, .tabs .tab a:focus.active {
    outline: 0;
   background-color: green;
}
.activeal{
	 background-color: green;
}
.activea2{
	color: white !important;
}
. waves dark {
		 background-color: green;
}
.input-field label.active {
    width: 100%;
    color: green;
}
.product input
{
    width: unset !important;
    height: 1.5rem !important;
    border: 1px solid #bdbdbd !important;
    border-radius: 4px !important;
}
.product2 input
{
    height: 1.5rem !important;
    border: 1px solid #bdbdbd !important;
    border-radius: 4px !important;
}
.block {
    display: block;
}
input {
    width: 50%;
    display: inline-block;
}

</style>

    <div id="main">
	 <div id="prefixes" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title" style="margin-left: 16px;">CREATE PROJECT</h4>
	
	 <div class="row">
	      
                  <div class="col s12">
                     <div class="row" id="main-view">
                        <div class="col s12 ">
                           <ul class=" tab-demo z-depth-1">
                              <li class=" col m3  <?php if($_REQUEST['step']=='step1' || $_REQUEST['step']==''){?> activeal <?php }?> " style="border: 1px solid;border-radius: 10px;    
    padding: 5px 15px;
"><a <?php if($_REQUEST['step']=='step1' || $_REQUEST['step']==''){?> class="activea2" <?php }?> href="create-project?step=step1&stepid=<?php echo $_REQUEST['stepid'];?>" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>>Step 1</a></li>
							  
                              <li class=" col m3 <?php if($_REQUEST['step']=='step2'){?> activeal <?php }?> " style="border: 1px solid;border-radius: 10px;
       padding: 5px 10px;
    margin-left: 7px;
    width: 23%;
"><?php if($_REQUEST['stepid']!='') {?> <a <?php if($_REQUEST['step']=='step2'){?> class="activea2" <?php }?> href="create-project?step=step2&stepid=<?php echo $_REQUEST['stepid'];?>"  <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>> Step 2</a><?php } else {?> <a <?php if($_REQUEST['step']=='step2'){?> class="activea2" <?php }?> href="#" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>> Step 2</a> <?php } ?></li>
                              <li class=" col m3 <?php if($_REQUEST['step']=='step3'){?> activeal <?php }?> "  style="border: 1px solid;border-radius: 10px; 
       padding: 5px 10px;
    margin-left: 7px;
    width: 23%;
"><?php if($_REQUEST['stepid']!='') {?><a  <?php if($_REQUEST['step']=='step3'){?> class="activea2" <?php }?> href="create-project?step=step3&stepid=<?php echo $_REQUEST['stepid'];?>" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>>Step 3</a><?php } else {?> <a  <?php if($_REQUEST['step']=='step3'){?> class="activea2" <?php }?> href="#" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>>Step 3</a><?php } ?></li>
							  
							  
                              <li class=" col m3<?php if($_REQUEST['step']=='step4'){?> activeal <?php }?> " style="border: 1px solid;border-radius: 10px; 
       padding: 5px 10px;
    margin-left: 7px;
    width: 23%;
"><?php if($_REQUEST['stepid']!='') {?><a  <?php if($_REQUEST['step']=='step4'){?>class="activea2" <?php }?> href="create-project?step=step4&stepid=<?php echo $_REQUEST['stepid'];?>" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>>Step 4</a><?php } else {?><a  <?php if($_REQUEST['step']=='step4'){?>class="activea2" <?php }?> href="#" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>>Step 4</a> <?php } ?></li>
                           </ul>
                        </div>
                        <div class="col s12">
<?php if($_REQUEST['step']=='step1' || $_REQUEST['step']==''){?>
                           <div id="" class="col s12">
                      
							 
		   <div id="overlaynew"><img  id="loadingnew" src="<?php echo $web_url; ?>demo_wait.gif" width="150px" height="130px" /></div>
		   
		
		     <form class="login-form" class="formValidate" id="formValidate"  action="" method="post">
			 <div class="row" id="view-select2">
	
			  	   <?php if($message=='fail')
		  {?>
	  <div class="card-alert card red">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>Failed : <?php echo $alert; ?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>	
		  <?php if($message=='Success')
		  {?>
	  <div class="card-alert card green">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>SUCCESS : <?php echo $alert; ?>.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>
 
 <table class="highlight">
 <thead>
<tr>
<th colspan="4" style="text-align: center;">PROVISIONAL	VALUATION REPORT</th>
</tr>	
<tr>
<th>Name of the Bank: </th>
<th> <input  id="bank" name="bank" type="text" value="<?php echo $project1['bank'];?>" required></th>
<?php if ($detect->isMobile()){?> </tr><tr> <?php } ?>
<th>Date:	</th>
<th><input  id="date" name="date" type="date" value="<?php echo $project1['date'];?>" required></th>
</tr>
<tr>
<th>Loan Amount: </th>
<th><input  id="loanAmount" name="loanAmount" type="text" value="<?php echo $project1['loanAmount'];?>"></th>
<?php if ($detect->isMobile()){?> </tr><tr> <?php } ?>
<th>Inspected:	</th>
<th><input  id="inspected" name="inspected" type="text" value="<?php echo $project1['inspected'];?>"></th>
</tr>
<tr>
<th>Company Name: </th>
<th>   <input  id="companyName" name="companyName" type="text" value="<?php echo $project1['companyName'];?>"></th>
<?php if ($detect->isMobile()){?> </tr><tr> <?php } ?>
<th>Advance Amount:	</th>
<th> <input  id="advanceAmount" name="advanceAmount" type="number" value="<?php echo $project1['advanceAmount'];?>" ></th>
</tr>	
<tr>
<th>Name of  Applicant	: </th>
<th><input  id="ownerAddress" name="ownerAddress" type="text" value="<?php echo $project1['ownerAddress'];?>"></th>
<?php if ($detect->isMobile()){?> </tr><tr> <?php } ?>
<th>Name of the Purchaser:	:	</th>
<th>  <input  id="purchaseAddress" name="purchaseAddress" type="text" value="<?php echo $project1['purchaseAddress'];?>"></th>
</tr>
		
 </thead>
</table> 
		  		
		      
				
<table class="highlight">
 <thead>
<tr>
<th>Residential Address: </th>
<th>	</th>
<th> Purchaser Address:</th>
<th><p class="mb-1">
              <label>
                <input type="checkbox" class="filled-in" name="purchaseyes" id="purchaseyes" checked="checked">
                <span>Yes</span>
              </label>
            </p></th>
</tr>	

<tr>
<th>i) Door No: </th>
<th><input  id="odoorno" name="odoorno" type="text" value="<?php echo $project1['odoorno'];?>"></th>
<th>i) Door No:	</th>
<th><input  id="pdoorno" class="purchaseyescheck" name="pdoorno" type="text" value="<?php echo $project1['pdoorno'];?>"></th>
</tr>
<tr>
<th>ii) Street: </th>
<th> <input  id="ostreet" name="ostreet" type="text" value="<?php echo $project1['ostreet'];?>"></th>
<th>ii) Street:	</th>
<th> <input  id="pstreet" class="purchaseyescheck" name="pstreet" type="text" value="<?php echo $project1['pstreet'];?>"></th>
</tr>
<tr>
<th>iii) Area: </th>
<th>   <input  id="oarea" name="oarea" type="text" value="<?php echo $project1['oarea'];?>"></th>
<th>iii) Area:	</th>
<th> <input  id="parea" class="purchaseyescheck" name="parea" type="text" value="<?php echo $project1['parea'];?>"></th>
</tr>
<tr>
<th>vi) Post: </th>
<th>  <input  id="opost" name="opost" type="text" value="<?php echo $project1['opost'];?>"></th>
<th>vi) Post:	</th>
<th> <input  id="ppost" class="purchaseyescheck" name="ppost" type="text" value="<?php echo $project1['ppost'];?>"></th>
</tr>
<tr>
<th>v) Taluk: </th>
<th><input  id="otaluk" name="otaluk" type="text" value="<?php echo $project1['otaluk'];?>"></th>
<th>v) Taluk:	</th>
<th><input  id="ptaluk" class="purchaseyescheck" name="ptaluk" type="text" value="<?php echo $project1['ptaluk'];?>"></th>
</tr>
<tr>
<th>vi) District: </th>
<th><input  id="odistrict" name="odistrict" type="text" value="<?php echo $project1['odistrict'];?>"></th>
<th>vi) District:	</th>
<th><input  id="pdistrict" class="purchaseyescheck" name="pdistrict" type="text" value="<?php echo $project1['pdistrict'];?>"></th>
</tr>	
<tr>
<th>vii) Pincode: </th>
<th><input  id="opincode" name="opincode" type="text" value="<?php echo $project1['opincode'];?>"></th>
<th>vii) Pincode::	</th>
<th><input  id="ppincode" class="purchaseyescheck" name="ppincode" type="text" value="<?php echo $project1['ppincode'];?>"></th>
</tr>	
<tr>
<th>viii) Contact: </th>
<th><input  id="ocontact" name="ocontact" type="text" value="<?php echo $project1['ocontact'];?>"></th>
<th>viii) Contact::	</th>
<th><input  id="pcontact" class="purchaseyescheck" name="pcontact" type="text" value="<?php echo $project1['pcontact'];?>"></th>
</tr>		
 </thead>
</table> 
				
				<input type="hidden" name="step1"  id="" value="step1">
			     <div class="col xl8 s12 mb-6">
                      
                    </div>
					  <div class="col xl2 s6 mb-3">
					  
					  <input type="submit"  name="save"  value="Save"  style="  background-color: #d32e09;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;float:right;
  border-radius: 6px;
  ">
					
                    </div>
                    <div class="col xl2 s6 mb-3">
					
					 <input type="submit"  name="next"  value="Next >"  style="  background-color:green;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;" >
					 
					 
                    </div>
			  
			  </div>
		   
		   
		   
		   </form>
		  
                           </div> </div>
		  <?php } ?>                    
                            
<?php if($_REQUEST['step']=='step2'){?>		   
                           <div id="" class="col s12">
						   
						    
						  
                              <form class="login-form" class="formValidate" id="formValidate"  action="" method="post" enctype="multipart/form-data">
							  <br>
							  <h4 class="card-title"></h4>
			 <div class="row" id="view-select2">
			 
			  	   <?php if($message=='fail')
		  {?>
	  <div class="card-alert card red">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>Failed : <?php echo $alert; ?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>	
		  <?php if($message=='Success')
		  {?>
	  <div class="card-alert card green">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>SUCCESS : <?php echo $alert; ?>.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>
 
 <table class="highlight">
 <thead>
<tr>
<th>Property Address</th>
<th></th>
<th>Revenue Details</th>
<th></th>
</tr>
<tr>
<th>i) Door No</th>
<th>   <input  id="propertydoorno" name="propertydoorno" type="text" value="<?php echo $project1['propertydoorno'];?>" ></th>
<th>i) Old S.F No</th>
<th> <input  id="oldsfno" name="oldsfno" type="text" value="<?php echo $project1['oldsfno'];?>"></th>
</tr>
<tr>
<th>ii) Street</th>
<th>   <input  id="propertystreet" name="propertystreet" type="text" value="<?php echo $project1['propertystreet'];?>"></th>
<th>ii) S.F NO</th>
<th> <input  id="sfno" name="sfno" type="text" value="<?php echo $project1['sfno'];?>"></th>
</tr>
<tr>
<th>iii) Area</th>
<th>  <input  id="propertyarea" name="propertyarea" type="text" value="<?php echo $project1['propertyarea'];?>"></th>
<th>iii) Patta No</th>
<th>   <input  id="pattano" name="pattano" type="text" value="<?php echo $project1['pattano'];?>"></th>
</tr>
<tr>
<th>iv) Panchayat</th>
<th> <input  id="propertyvillage" name="propertyvillage" type="text" value="<?php echo $project1['propertyvillage'];?>"></th>
<th>iv) R.S.F No</th>
<th>  <input  id="rsfno" name="rsfno" type="text" value="<?php echo $project1['rsfno'];?>"></th>
</tr>
<tr>
<th>v) Taluk</th>
<th>   <input  id="propertytaluk" name="propertytaluk" type="text" value="<?php echo $project1['propertytaluk'];?>"></th>
<th>v) Block No</th>
<th> <input  id="blockno" name="blockno" type="text" value="<?php echo $project1['blockno'];?>"></th>
</tr>
<tr>
<th>vi) District</th>
<th> <input  id="propertydistict" name="propertydistict" type="text" value="<?php echo $project1['propertydistict'];?>"></th>
<th>vi) Pymash No</th>
<th> <input  id="pymashno" name="pymashno" type="text" value="<?php echo $project1['pymashno'];?>"></th>
</tr>
<tr>
<th>vii) Pincode</th>
<th> <input  id="propertypincode" name="propertypincode" type="text" value="<?php echo $project1['propertypincode'];?>"></th>
<th>vii) T.S.No</th>
<th> <input  id="tsno" name="tsno" type="text" value="<?php echo $project1['tsno'];?>"></th>
</tr>
<tr>
<th></th>
<th></th>
<th>viii) Ward No</th>
<th> <input  id="wardno" name="wardno" type="text" value="<?php echo $project1['wardno'];?>"></th>
</tr>
<tr>
<th></th>
<th> </th>
<th>ix) S.R.O</th>
<th>  <input  id="sro" name="sro" type="text" value="<?php echo $project1['sro'];?>"></th>
</tr>
<tr>
<th></th>
<th> </th>
<th>x) Plot No</th>
<th>  <input  id="plotno" name="plotno" type="text" value="<?php echo $project1['plotno'];?>"></th>
</tr>
</thead>
</table>
 
 
 
		      
				
	<table class="highlight">
<thead>
<tr>
<th>i) Land Mark</th>
<th><input  id="landmark" name="landmark" type="text" value="<?php echo $project1['landmark'];?>"></th>	
<th>i) Property Occupied</th>
<th><select name="propertyoccupied">
<option value="" >Property Occupied</option>
<option <?php if($project1['propertyoccupied']=='owner') {?> Selected <?php } ?> value="owner">Owner</option>
<option <?php if($project1['propertyoccupied']=='rent') {?> Selected <?php } ?> value="rent">Rent</option>
</select></th>	
</tr>
<tr>
<th>ii) Nearest Bus Stop</th>
<th><input  id="nearestbustop" name="nearestbustop" type="text" value="<?php echo $project1['nearestbustop'];?>"></th>	
<th>ii) Tax Receipt</th>
<th><select name="taxreceipt"  id="taxreceipt">
<option value="" >Tax Receipt</option>
<option <?php if($project1['taxreceipt']=='Yes') {?> Selected <?php } ?>  value="Yes">Yes</option>
<option <?php if($project1['taxreceipt']=='No') {?> Selected <?php } ?> value="No">No</option>
</select>
<br>
<input  id="taxreceiptfile" name="taxreceiptfile" type="file">
<input  id="taxreceiptfile_name" name="taxreceiptfile_name" type="hidden" value="<?php echo $project1['taxreceiptfile'];?>">
<?php if($project1['taxreceiptfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/tax/<?php echo $project1['taxreceiptfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?>
</th>	
</tr>
<tr>
<th>iii) Distance of Branch</th>
<th>  <input  id="distanceofbranch" name="distanceofbranch" type="text" value="<?php echo $project1['distanceofbranch'];?>"></th>	
<th>iii) Property Occupied</th>
<th><select name="ebserviceno" id="ebserviceno">
<option value="">E.B. Service No</option>
<option <?php if($project1['ebserviceno']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['ebserviceno']=='No') {?> Selected <?php } ?> value="No">No</option>
</select>
<br>
<input  id="ebservicenofile" name="ebservicenofile" type="file" value="<?php echo $project1['ebservicenofile'];?>">
<input  id="ebservicenofile_name" name="ebservicenofile_name" type="hidden" value="<?php echo $project1['ebservicenofile'];?>">
<?php if($project1['ebservicenofile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/ebservice/<?php echo $project1['ebservicenofile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>	
</tr>
<tr>
<th>iv) Distance of R.S</th>
<th><input  id="distanceofrs" name="distanceofrs" type="text" value="<?php echo $project1['distanceofrs'];?>">
</th>	
<th>iv) Patta / DTCP</th>
<th> <select name="pattadtcp" id="pattadtcp">
<option value="" >Patta / DTCP</option>
<option <?php if($project1['pattadtcp']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['pattadtcp']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="pattadtcpfile" name="pattadtcpfile" type="file" value="<?php echo $project1['pattadtcpfile'];?>">
<input  id="pattadtcpfile_name" name="pattadtcpfile_name" type="hidden" value="<?php echo $project1['pattadtcpfile'];?>"><?php if($project1['pattadtcpfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/pattadtcp/<?php echo $project1['pattadtcpfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>		
</tr>
<tr>
<th>v) Nearest Main Road</th>
<th> <input  id="nearestmainroad" name="nearestmainroad" type="text" value="<?php echo $project1['nearestmainroad'];?>"></th>	
<th>v) Approval Plan</th>
<th><select name="approvalplan" id="approvalplan">
<option value="" >Approval Plan</option>
<option <?php if($project1['approvalplan']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['approvalplan']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="approvalplanfile" name="approvalplanfile" type="file" value="<?php echo $project1['approvalplanfile'];?>"><input  id="approvalplanfile_name" name="approvalplanfile_name" type="hidden" value="<?php echo $project1['approvalplanfile'];?>"><?php if($project1['approvalplanfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/approvalplan/<?php echo $project1['approvalplanfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>	
</tr>
<tr>
<th>vi) Civil Amenities</th>
<th>  <input  id="civilamenities" name="civilamenities" type="text" value="<?php echo $project1['civilamenities'];?>"></th>	
<th>vi) H.D Line</th>
<th><select name="hdline" id="hdline">
<option value="" >H.D Line</option>
<option <?php if($project1['hdline']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['hdline']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="hdlinefile" name="hdlinefile" type="file" value="<?php echo $project1['hdlinefile'];?>">
<input  id="hdlinefile_name" name="hdlinefile_name" type="hidden" value="<?php echo $project1['hdlinefile'];?>">
<?php if($project1['hdlinefile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/hdline/<?php echo $project1['hdlinefile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>	
</tr>
</thead>
</table>		
				
				
				

				<input type="hidden" name="step2" value="step2">
				 <div class="col xl7 s12 mb-6">
				  </div>
			   <div class="col xl2 s4 mb-3">
					   <input type="submit"  name="prev"  value="< Prev"  style="  background-color: green;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;float:right;" >    </div>
  <div class="col xl1 s4 mb-3">
					  <input type="submit"  name="save"  value="Save"  style="  background-color:  #d32e09;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  border-radius: 6px;
      margin-left: -8px;">
					
                    </div>
                    <div class="col xl2 s4 mb-3">
					
					 <input type="submit"  name="next"  value="Next >"  style="  background-color: green;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;float:left;" >
					 
					 
                    </div>
			  
			  </div>
		   </form>
                           </div>
                  
<?php } ?>
<?php if($_REQUEST['step']=='step3'){?>
				  <div id="" class="col s12">
                                       <form class="login-form" class="formValidate" id="formValidate"  action="" method="post">
							  <br>
							  
			 <div class="row" id="view-select2">
			 
			  	   <?php if($message=='fail')
		  {?>
	  <div class="card-alert card red">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>Failed : <?php echo $alert; ?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>	
		  <?php if($message=='Success')
		  {?>
	  <div class="card-alert card green">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>SUCCESS : <?php echo $alert; ?>.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>
 <div class="product" id="table">
 <table class="highlight">
			  
			  
			  
          <thead>
		  
		   <tr>     <th>Direction</th>
		            <th>Boundary Details</th>
				    <th>Patta</th>
                    <th>Document</th>
					<th>Actual</th>
           

</tr>  		                  </thead>
                
<?php if($project1['totallandvalue']!='')	 {
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
		
foreach($totallandvalue2 as $countproper1 =>$key1) {	$valdel="55".$countproper1;
	?>			
				
<tbody <?php if($countproper1>0) {?> class="newTR<?php echo $valdel; ?>" <?php } else { ?> class="newTR1"  <?php } ?>>
				
				   <tr >
		            <td>North</td>
					<td><input  id="boundary1" name="northboundary[]" type="text"  value="<?php echo $northboundary[$countproper1];?>"></td>
				    <td><input  id="north1" name="north1[]" type="text"  value="<?php echo $north1[$countproper1];?>"><input  id="north2" name="north2[]" type="text" value="<?php echo $north2[$countproper1];?>"><input  id="north3" name="north3[]" type="text"  readonly value="<?php echo $north3[$countproper1];?>"></td>
                     <td><input  id="north4" name="north4[]" type="text" value="<?php echo $north4[$countproper1];?>"><input  id="north5" name="north5[]" type="text" value="<?php echo $north5[$countproper1];?>"><input  id="north6" name="north6[]" type="text" readonly value="<?php echo $north6[$countproper1];?>"></td>
					 <td><input  id="north7" name="north7[]" type="text" value="<?php echo $north7[$countproper1];?>"><input  id="north8" name="north8[]" type="text" value="<?php echo $north8[$countproper1];?>"><input  id="north9" name="north9[]" type="text" readonly value="<?php echo $north9[$countproper1];?>"></td>
					
                  </tr> 
                  <tr>
		            <td>South</td>
					<td><input  id="southboundary" name="southboundary[]" type="text"  value="<?php echo $southboundary[$countproper1];?>"></td>
				     <td><input  id="south1" name="south1[]" type="text" value="<?php echo $south1[$countproper1];?>"><input  id="south2" name="south2[]" type="text" value="<?php echo $south2[$countproper1];?>"><input  id="south3" name="south3[]" type="text" readonly value="<?php echo $south3[$countproper1];?>"></td>
                     <td><input  id="south4" name="south4[]" type="text" value="<?php echo $south4[$countproper1];?>"><input  id="south5" name="south5[]" type="text" value="<?php echo $south5[$countproper1];?>"><input  id="south6" name="south6[]" type="text" readonly value="<?php echo $south6[$countproper1];?>"></td>
					 <td><input  id="south7" name="south7[]" type="text" value="<?php echo $south7[$countproper1];?>"><input  id="south8" name="south8[]" type="text" value="<?php echo $south8[$countproper1];?>"><input  id="south9" name="south9[]" type="text" readonly value="<?php echo $south9[$countproper1];?>"></td>
					
                  </tr>
                 <tr>
		            <td>East</td>
					<td><input  id="eastboundary" name="eastboundary[]" type="text"  value="<?php echo $eastboundary[$countproper1];?>"></td>
				      <td><input  id="east1" name="east1[]" type="text" value="<?php echo $east1[$countproper1];?>"><input  id="east2" name="east2[]" type="text" value="<?php echo $east2[$countproper1];?>"><input  id="east3" name="east3[]" type="text" readonly value="<?php echo $east3[$countproper1];?>"></td>
                     <td><input  id="east4" name="east4[]" type="text" value="<?php echo $east4[$countproper1];?>"><input  id="east5" name="east5[]" type="text" value="<?php echo $east5[$countproper1];?>"><input  id="east6" name="east6[]" type="text" readonly value="<?php echo $east6[$countproper1];?>"></td>
					 <td><input  id="east7" name="east7[]" type="text" value="<?php echo $east7[$countproper1];?>"><input  id="east8" name="east8[]" type="text" value="<?php echo $east8[$countproper1];?>"><input  id="east9" name="east9[]" type="text" readonly value="<?php echo $east9[$countproper1];?>"></td>
					
                  </tr>
                      <tr>
		            <td>West</td>
					<td><input  id="westboundary" name="westboundary[]" type="text"  value="<?php echo $westboundary[$countproper1];?>"></td>
				     <td><input  id="west1" name="west1[]" type="text" value="<?php echo $west1[$countproper1];?>"><input  id="west2" name="west2[]" type="text" value="<?php echo $west2[$countproper1];?>"><input  id="west3" name="west3[]" type="text" readonly value="<?php echo $west3[$countproper1];?>"></td>
                     <td><input  id="west4" name="west4[]" type="text" value="<?php echo $west4[$countproper1];?>"><input  id="west5" name="west5[]" type="text" value="<?php echo $west5[$countproper1];?>"><input  id="west6" name="west6[]" type="text" readonly value="<?php echo $west6[$countproper1];?>"></td>
					 <td><input  id="west7" name="west7[]" type="text" value="<?php echo $north2[$countproper1];?>"><input  id="west8" name="west8[]" type="text" value="<?php echo $west8[$countproper1];?>"><input  id="west9" name="west9[]" type="text" readonly value="<?php echo $west9[$countproper1];?>"></td>
					
                  </tr>	

 <tr>
		            <td>Extent of Site </td>
					<td></td>
				     <td><input  id="estent1" name="estent1[]" readonly type="text" value="<?php echo $estent1[$countproper1];?>"></td>
                     <td><input  id="estent2" name="estent2[]" type="text" readonly value="<?php echo $estent2[$countproper1];?>"></td>
					 <td><input  id="estent3" name="estent3[]" type="text" readonly value="<?php echo $estent3[$countproper1];?>"></td>
					
                  </tr>		

 <tr>
		            <td colspan="2" >Total Area if Any</td>
				     <td><input  id="anyarea" name="anyarea[]"  type="text" value="<?php echo $anyarea[$countproper1];?>"></td>
                     <td></td>
					 <td></td>
					
					
                  </tr>		
				  
 <tr>
		           <td></td>  <td>Dimension of the<br><input  id="dimensionsite" name="dimensionsite[]"  type="text" value="<?php echo $dimensionsite[$countproper1];?>"></td>
				     <td>Total Area<br><input  id="totalarea" name="totalarea[]" readonly type="text" value="<?php echo $totalarea[$countproper1];?>"></td>
                     <td>Rate<br><input  id="totalrate" name="totalrate[]"  type="text" value="<?php echo $totalrate[$countproper1];?>"></td>
					 <td>Land Value Total<br><input  id="totallandvalue" name="totallandvalue[]" readonly type="text" value="<?php echo $totallandvalue[$countproper1];?>">   <a href="#" id="remove_more" class="dnewTR<?php echo $valdel; ?>" <?php if($countproper1>0) {?> style="    float: right;color:red;" <?php } else {?> style="    float: right;color:red;display:none;" <?php } ?> >Remove(X)</a>   </td>
					
                  </tr>					  

 <input class="delINP" id="delINP" type="hidden" value="1"/>
  <input class="addcoun" id="addcoun" type="hidden" value="1"/>
  
  
	
	
  </tbody>
  
<?php } } else { ?> 


 <tbody class="newTR1">
				
				   <tr >
		            <td>North</td>
					<td><input  id="boundary1" name="northboundary[]" type="text"  value=""></td>
				    <td><input  id="north1" name="north1[]" type="text"  value=""><input  id="north2" name="north2[]" type="text" value=""><input  id="north3" name="north3[]" type="text"  readonly value=""></td>
                     <td><input  id="north4" name="north4[]" type="text" value=""><input  id="north5" name="north5" type="text" value=""><input  id="north6" name="north6[]" type="text" readonly value=""></td>
					 <td><input  id="north7" name="north7[]" type="text" value=""><input  id="north8" name="north8[]" type="text" value="<?php echo $project1['hdlinefile'];?>"><input  id="north9" name="north9[]" type="text" readonly value=""></td>
					
                  </tr> 
                  <tr>
		            <td>South</td>
					<td><input  id="southboundary" name="southboundary[]" type="text"  value=""></td>
				     <td><input  id="south1" name="south1[]" type="text" value=""><input  id="south2" name="south2[]" type="text" value=""><input  id="south3" name="south3[]" type="text" readonly value=""></td>
                     <td><input  id="south4" name="south4[]" type="text" value=""><input  id="south5" name="south5[]" type="text" value=""><input  id="south6" name="south6[]" type="text" readonly value=""></td>
					 <td><input  id="south7" name="south7[]" type="text" value=""><input  id="south8" name="south8[]" type="text" value=""><input  id="south9" name="south9[]" type="text" readonly value=""></td>
					
                  </tr>
                 <tr>
		            <td>East</td>
					<td><input  id="eastboundary" name="eastboundary[]" type="text"  value=""></td>
				      <td><input  id="east1" name="east1[]" type="text" value=""><input  id="east2" name="east2[]" type="text" value=""><input  id="east3" name="east3[]" type="text" readonly value=""></td>
                     <td><input  id="east4" name="east4[]" type="text" value=""><input  id="east5" name="east5[]" type="text" value=""><input  id="east6" name="east6[]" type="text" readonly value=""></td>
					 <td><input  id="east7" name="east7[]" type="text" value=""><input  id="east8" name="east8[]" type="text" value=""><input  id="east9" name="east9[]" type="text" readonly value=""></td>
					
                  </tr>
                      <tr>
		            <td>West</td>
					<td><input  id="westboundary" name="westboundary[]" type="text"  value=""></td>
				     <td><input  id="west1" name="west1[]" type="text" value=""><input  id="west2" name="west2[]" type="text" value=""><input  id="west3" name="west3[]" type="text" readonly value=""></td>
                     <td><input  id="west4" name="west4[]" type="text" value=""><input  id="west5" name="west5[]" type="text" value=""><input  id="west6" name="west6[]" type="text" readonly value=""></td>
					 <td><input  id="west7" name="west7[]" type="text" value=""><input  id="west8" name="west8[]" type="text" value=""><input  id="west9" name="west9[]" type="text" readonly value=""></td>
					
                  </tr>	

 <tr>
		            <td>Extent of Site </td>
					<td></td>
				     <td><input  id="estent1" name="estent1[]" readonly type="text" value=""></td>
                     <td><input  id="estent2" name="estent2[]" type="text" readonly value=""></td>
					 <td><input  id="estent3" name="estent3[]" type="text" readonly value=""></td>
					
                  </tr>		

 <tr>
		            <td colspan="2">Total Area if Any</td>
				     <td><input  id="anyarea" name="anyarea[]"  type="text" value=""></td>
                     <td></td>
					 <td></td>
					
                  </tr>		
				  
 <tr> <td></td>
		            <td>Dimension of the<br><input  id="dimensionsite" name="dimensionsite[]"  type="text" value=""></td>
				     <td>Total Area<br><input  id="totalarea" name="totalarea[]" readonly type="text" value=""></td>
                     <td>Rate<br><input  id="totalrate" name="totalrate[]"  type="text" value=""></td>
					 <td>Land Value Total<br><input  id="totallandvalue" name="totallandvalue[]" readonly type="text" value="">   <a href="#" id="remove_more" class="" style="    float: right;color:red;display:none;" >Remove(X)</a>   </td>
					
                  </tr>					  

 <input class="delINP" id="delINP" type="hidden" value="1"/>
  <input class="addcoun" id="addcoun" type="hidden" value="1"/>
  
  
	
	
  </tbody> 
  
<?php } ?>  
  </table>
 
		</div>	
<div style="    margin-top: 16px;
    margin-bottom: 16px;">		
			  <a href="#" id="add_more" style="    padding: 6px;
    border: 1px solid;">Add More Rows</a>   
			  </div>
			  
 <?php if(1!=1)
 {?>
		        <div class="input-field col s12 xl6" >
                <input  id="northboundary" name="northboundary" type="text" value="<?php echo $project1['northboundary'];?>">
                <label for="northboundary">North Boundary</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                <input  id="southboundary" name="southboundary" type="text" value="<?php echo $project1['southboundary'];?>" >
                <label for="southboundary">South Boundary</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6">
                <input  id="northdimensions" name="northdimensions" type="text" value="<?php echo $project1['northdimensions'];?>">
                <label for="northdimensions">North Dimensions</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                <input  id="southdimensions" name="southdimensions" type="text" value="<?php echo $project1['southdimensions'];?>">
                <label for="southdimensions">South Dimensions</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6">
                <input  id="northremarks" name="northremarks" type="text" value="<?php echo $project1['northremarks'];?>">
                <label for="northremarks">North Remarks</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                <input  id="southremarks" name="southremarks" type="text" value="<?php echo $project1['southremarks'];?>">
                <label for="southremarks">South Remarks</label>
				<small class="errorTxt7"></small>	
                </div> 
			  <div class="input-field col s12 xl6">
                <input  id="eastboundary" name="eastboundary" type="text" value="<?php echo $project1['eastboundary'];?>">
                <label for="eastboundary">East Boundary</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                <input  id="westboundary" name="westboundary" type="text" value="<?php echo $project1['westboundary'];?>" >
                <label for="westboundary">West Boundary</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6">
                <input  id="eastdimensions" name="eastdimensions" type="text" value="<?php echo $project1['eastdimensions'];?>">
                <label for="eastdimensions">East Dimensions</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                <input  id="westdimensions" name="westdimensions" type="text" value="<?php echo $project1['westdimensions'];?>">
                <label for="westdimensions">West Dimensions</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6">
                <input  id="eastremarks" name="eastremarks" type="text" value="<?php echo $project1['eastremarks'];?>" >
                <label for="eastremarks">East Remarks</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                <input  id="westremarks" name="westremarks" type="text" value="<?php echo $project1['westremarks'];?>" >
                <label for="westremarks">West Remarks</label>
				<small class="errorTxt7"></small>	
                </div> 
				<div class="input-field col s12">
                <input  id="extent_of_site" name="extent_of_site" type="text" value="<?php echo $project1['extent_of_site'];?>" >
                <label for="extent_of_site">Extent of Site</label>
				<small class="errorTxt7"></small>	
                </div> 
 <?php } ?>		


 
			
			
				 <h4 class="card-title">Property</h4>
				 
<?php if($project1['typeofproperty']!='' or $project1['sizeofplot']!='') 
{
$typeofproperty2=explode(",",$project1['typeofproperty']);	
$counttypeofproperty=count($typeofproperty);
$sizeofplot2=explode(",",$project1['sizeofplot']);
$recentdevelopmentsnear2=explode(",",$project1['recentdevelopmentsnear']);
$resentsaledetails2=explode(",",$project1['resentsaledetails']);
$classofconstruction2=explode(",",$project1['classofconstruction']);
$limits2=explode(",",$project1['limits']);
$roof2=explode(",",$project1['roof']);
foreach($typeofproperty2 as $countproper =>$key) {
	


	?>		
		 
					<div class="row block s<?php echo $countproper; ?>">
					

<table class="highlight">
<thead>
<tr>
<th>Type of Property</th>
<th><select name="typeofproperty[]" id="typeofproperty">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th style="width: 22%;">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $resentsaledetails2[$countproper];?>"></th>
</tr>

<tr>
<th style="width: 22%;">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
<th>Control Limit</th>
<th> 	 <select name="limits[]" id="limits">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select></th>
</tr>

<tr>
<th style="width: 22%;">Type of Roof</th>
<th>
				<select name="roof[]" id="roof">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$roof2[$countproper]) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select>	</th>
<th><div class="input-field col s12 xl6" style="width:46%;margin-left:10px;border:0px solid;"><span class="remove" style="float: left;color:red;cursor:pointer;" id="s<?php echo $countproper; ?>">Remove(X)</span></div></th>
<th> 	 </th>
</tr>
</thead>
</table>
</div>
<?php } } else {?>
<div class="row block">
					

<table class="highlight">
<thead>
<tr>
<th>Type of Property</th>
<th><select name="typeofproperty[]" id="typeofproperty">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$project1['typeofproperty']) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$project1['sizeofplot']) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th style="width: 22%;">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$project1['recentdevelopmentsnear']) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $project1['resentsaledetails'];?>"></th>
</tr>

<tr>
<th style="width: 22%;">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$project1['classofconstruction']) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
<th>Control Limit</th>
<th> 	 <select name="limits[]" id="limits">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$project1['limits']) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select></th>
</tr>

<tr>
<th style="width: 22%;">Type of Roof</th>
<th>
				<select name="roof[]" id="roof">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select>	</th>
<th></th>
<th> 	 </th>
</tr>
</thead>
</table>
</div>
<?php } ?>
					

					<div class="block">
        <span class="add"style="    padding: 6px;
    border: 1px solid;cursor:pointer;color: #2196f3;">Add More Rows </span>
    </div>
					 
				<input type="hidden" name="step3" value="step3">
				
			<div class="col xl7 s12 mb-6">
				  </div>
		 <div class="col xl2 s4 mb-3">
					   <input type="submit"  name="prev"  value="< Prev"  style="  background-color: green;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;float:right;" >    </div>
  <div class="col xl1 s4 mb-3">
					  <input type="submit"  name="save"  value="Save"  style="  background-color:  #d32e09;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  border-radius: 6px;
      margin-left: -8px;">
					
                    </div>
                    <div class="col xl2 s4 mb-3">
					
					 <input type="submit"  name="next"  value="Next >"  style="  background-color: green;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;float:left;" >
					 
					 
                    </div>
			  
			  </div>
		   </form>
                         
                           </div>
<?php } ?>                    
<?php if($_REQUEST['step']=='step4'){?>
<style>
.divall .select-wrapper input.select-dropdown {
    font-size: 1rem;
    line-height: 3rem;
    position: relative;
    z-index: 1;
    display: none;
    width: 100%;
    height: 3rem;
    margin: 0 0 8px;
    padding: 0;
    cursor: pointer;
    user-select: none;
    border: none;
    border-bottom: 1px solid #9e9e9e;
    outline: 0;
    background-color: transparent;
}
</style>




					<div id="" class="col s12">
                                     <form class="login-form" class="formValidate" id="formValidate"  action="" method="post">
							  
			 <div class="row" id="view-select2">
			 
			  	   <?php if($message=='fail')
		  {?>
	  <div class="card-alert card red">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>Failed : <?php echo $alert; ?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>	
		  <?php if($message=='Success')
		  {?>
	  <div class="card-alert card green">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>SUCCESS : <?php echo $alert; ?>.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
 <?php } ?>
 <div class="product2" id="invoice">
  <p type="button" id="addline"  style="
       width: 167px;
    height: 39px;
    border: 1px solid;
    background: green;
    color: white;
    padding: 6px;
    margin-top: 7px;
    margin-bottom: 7px;">Add Another Table</p>
	
 <?php 
$project_ids=$project1['id']; 
$project_table = mysqli_query($conn,"SELECT * FROM `project_table` where 1=1 and project_id='$project_ids' ");   
$project_table1 = mysqli_fetch_array($project_table);
 
if($project_table1['lengtha']!='' or $project_table1['breadtha']!='') 
{ 




?>
  
  
  <div class="multi" id="">
<span class="multiall" id="">
 <table class="highlight addrow" id="addrowline1">
<thead>
 <tr>
		            
				    <th>Descrption of the Property </th>
                    <th>Size<br>L W</th>
					<th>Area</th>
					<th>Rate</th>
                    <th>Year</th>
                    <th>Type Of Roofing</th>	
                    <th>Deprciation</th>
                    <th>Total</th>					

</tr>  		                  </thead>
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
$overalltotal=explode(",",$project_table1['overalltotal']);
foreach($lengtha as $lengthacountproper =>$key) {	?>			
				   <tr >
		          
				    <td><input  id="desc_prop" name="desc_prop[]" type="text"  value="<?php echo $desc_prop[$lengthacountproper]; ?>"></td>
					<td style="width:200px;">
					<input  id="lengtha" name="lengtha[]" type="text" placeholder="L1" value="<?php echo $lengtha[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">
					<input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="<?php echo $lengthb[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">=
					<input  id="length" name="length[]" type="text" placeholder="L" value="<?php echo $length[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 25%;">
					<br>
					<input  id="breadtha" name="breadtha[]" type="text" placeholder="B1"  value="<?php echo $breadtha[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">
					<input  id="breadthb" name="breadthb[]" type="text" placeholder="B2"  value="<?php echo $breadthb[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">=
					<input  id="breadth" name="breadth[]" type="text"  placeholder="B"  value="<?php echo $breadth[$lengthacountproper]; ?>" style="margin-left: 10px;width: 25%;"></td>
					<td><input  id="area" name="area[]" type="text"  value="<?php echo $area[$lengthacountproper]; ?>"></td>
					<td><input  id="rate" name="rate[]" type="text"  value="<?php echo $rate[$lengthacountproper]; ?>"></td>
					<td><input  id="year" name="year[]" type="text"  value="<?php echo $year[$lengthacountproper]; ?>"></td>
					<td class="divall"><select class="selectin" name="roofselect[]" id="roofselect" style="display:block">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option value="<?php echo $roof1['id'];?>" <?php if($roofselect[$lengthacountproper]==$roof1['id']) {?> selected <?php } ?> data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select></td>
					<td><input  id="deprciation" name="deprciation[]" type="text"  value="<?php echo $deprciation[$lengthacountproper]; ?>"></td>
					<td><input  id="total" class="row-total" name="total[]" type="text"  value="<?php echo $total[$lengthacountproper]; ?>">
					<?php if($lengthacountproper>0) {?>
					<a href="javascript:void(0);" class="remCF">Remove</a>
					<?php } ?>
					</td>
					
                    
                  </tr> 
<?php } ?>				   

  </tbody></table><table>
                  <tbody>
    <tr >
					 <td></td>
					  <td></td>
					   <td></td>
					    <td></td>
						 <td></td>
						  <td></td>
						   <td></td>
						    <td style="float:right;">Total<input  class="row-overalltotal" id="overalltotal" name="overalltotal" type="text"  value="<?php echo $project_table1['overalltotal']; ?>">	<span class="removemul" style="float: left;color:red;cursor:pointer;display:none;" id="">Remove(X)</span></td>
					 </tr>
					   </tbody></table>
    <div style="    margin-top: 16px;
    margin-bottom: 16px;">		
			  <a href="javascript:void(0);" class="addCF" id="addCFid" style="    padding: 6px;
    border: 1px solid;">Add More Rows</a>   
			  </div>
		</span>	  
		</div>

<?php 
if($project_table1['lengtha1']!='' or $project_table1['breadtha1']!='') 
{ ?>
  <div class="multi" id="cddrow1">
<span class="multiall" id="vddrow1">
 <table class="highlight addrow1" id="addrowline1">
<thead>
 <tr>
		            
				    <th>Descrption of the Property </th>
                    <th>Size<br>L W</th>
					<th>Area</th>
					<th>Rate</th>
                    <th>Year</th>
                    <th>Type Of Roofing</th>	
                    <th>Deprciation</th>
                    <th>Total</th>					

</tr>  		                  </thead>
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
$overalltotal1=explode(",",$project_table1['overalltotal1']);
foreach($lengtha1 as $lengthacountproper =>$key) {	?>			
				   <tr >
		          
				    <td><input  id="desc_prop" name="desc_prop1[]" type="text"  value="<?php echo $desc_prop1[$lengthacountproper]; ?>"></td>
					<td style="width:200px;">
					<input  id="lengtha" name="lengtha1[]" type="text" placeholder="L1" value="<?php echo $lengtha1[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">
					<input  id="lengthb" name="lengthb1[]" type="text" placeholder="L2" value="<?php echo $lengthb1[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">=
					<input  id="length" name="length1[]" type="text" placeholder="L" value="<?php echo $length1[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 25%;">
					<br>
					<input  id="breadtha" name="breadtha1[]" type="text" placeholder="B1"  value="<?php echo $breadtha1[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">
					<input  id="breadthb" name="breadthb1[]" type="text" placeholder="B2"  value="<?php echo $breadthb1[$lengthacountproper]; ?>" style="  margin-left: 10px;width: 20%;">=
					<input  id="breadth" name="breadth1[]" type="text"  placeholder="B"  value="<?php echo $breadth1[$lengthacountproper]; ?>" style="margin-left: 10px;width: 25%;"></td>
					<td><input  id="area" name="area1[]" type="text"  value="<?php echo $area1[$lengthacountproper]; ?>"></td>
					<td><input  id="rate" name="rate1[]" type="text"  value="<?php echo $rate1[$lengthacountproper]; ?>"></td>
					<td><input  id="year" name="year1[]" type="text"  value="<?php echo $year1[$lengthacountproper]; ?>"></td>
					<td class="divall"><select class="selectin" name="roofselect1[]" id="roofselect" style="display:block">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option value="<?php echo $roof1['id'];?>" <?php if($roofselect1[$lengthacountproper]==$roof1['id']) {?> selected <?php } ?> data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select></td>
					<td><input  id="deprciation" name="deprciation1[]" type="text"  value="<?php echo $deprciation1[$lengthacountproper]; ?>"></td>
					<td><input  id="total" class="row-total1" name="total1[]" type="text"  value="<?php echo $total1[$lengthacountproper]; ?>">		<?php if($lengthacountproper>0) {?>
					<a href="javascript:void(0);" class="remCF">Remove</a>
					<?php } ?></td>
					
                    
                  </tr> 
<?php } ?>				   

  </tbody></table><table>
                  <tbody>
    <tr >
					 <td></td>
					  <td></td>
					   <td></td>
					    <td></td>
						 <td></td>
						  <td></td>
						   <td></td>
						    <td style="float:right;">Total<input  class="row-overalltotal1" id="overalltotala1" name="overalltotal1" type="text"  value="<?php echo $project_table1['overalltotal1']; ?>">	<span class="removemula1" style="float: left;color:red;cursor:pointer;" id="ddrow1">Remove(X)</span></td>
					 </tr>
					   </tbody></table>
    <div style="    margin-top: 16px;
    margin-bottom: 16px;">		
			  <a href="javascript:void(0);" class="addCF1" id="addCFid" style="    padding: 6px;
    border: 1px solid;">Add More Rows</a>   
			  </div>
		</span>	  
		</div>	
<?php } ?>				
		
		
<?php 
if($project_table1['lengtha2']!='' or $project_table1['breadtha2']!='') 
{ ?>
  <div class="multi" id="cddrow2">
<span class="multiall" id="vddrow2">
 <table class="highlight addrow2" id="addrowline2">
<thead>
 <tr>
		            
				    <th>Descrption of the Property </th>
                    <th>Size<br>L W</th>
					<th>Area</th>
					<th>Rate</th>
                    <th>Year</th>
                    <th>Type Of Roofing</th>	
                    <th>Deprciation</th>
                    <th>Total</th>					

</tr>  		                  </thead>
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
$overalltotal2=explode(",",$project_table1['overalltotal2']);
foreach($lengtha2 as $lengthacountproper2 =>$key) {	?>			
				   <tr >
		          
				    <td><input  id="desc_prop" name="desc_prop2[]" type="text"  value="<?php echo $desc_prop2[$lengthacountproper2]; ?>"></td>
					<td style="width:200px;">
					<input  id="lengtha" name="lengtha2[]" type="text" placeholder="L2" value="<?php echo $lengtha2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;">
					<input  id="lengthb" name="lengthb2[]" type="text" placeholder="L2" value="<?php echo $lengthb2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;">=
					<input  id="length" name="length2[]" type="text" placeholder="L" value="<?php echo $length2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 25%;">
					<br>
					<input  id="breadtha" name="breadtha2[]" type="text" placeholder="B2"  value="<?php echo $breadtha2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;">
					<input  id="breadthb" name="breadthb2[]" type="text" placeholder="B2"  value="<?php echo $breadthb2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;">=
					<input  id="breadth" name="breadth2[]" type="text"  placeholder="B"  value="<?php echo $breadth2[$lengthacountproper2]; ?>" style="margin-left: 20px;width: 25%;"></td>
					<td><input  id="area" name="area2[]" type="text"  value="<?php echo $area2[$lengthacountproper2]; ?>"></td>
					<td><input  id="rate" name="rate2[]" type="text"  value="<?php echo $rate2[$lengthacountproper2]; ?>"></td>
					<td><input  id="year" name="year2[]" type="text"  value="<?php echo $year2[$lengthacountproper2]; ?>"></td>
					<td class="divall"><select class="selectin" name="roofselect2[]" id="roofselect" style="display:block">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof2 = mysqli_fetch_array($roof)) {?>
                  <option value="<?php echo $roof2['id'];?>" <?php if($roofselect2[$lengthacountproper2]==$roof2['id']) {?> selected <?php } ?> data-id="<?php echo $roof2['percentage'];?>"><?php echo $roof2['name'];?></option>
<?php } ?>
                </select></td>
					<td><input  id="deprciation" name="deprciation2[]" type="text"  value="<?php echo $deprciation2[$lengthacountproper2]; ?>"></td>
					<td><input  id="total" class="row-total2" name="total2[]" type="text"  value="<?php echo $total2[$lengthacountproper2]; ?>">		<?php if($lengthacountproper2>0) {?>
					<a href="javascript:void(0);" class="remCF">Remove</a>
					<?php } ?></td>
					
                    
                  </tr> 
<?php } ?>				   

  </tbody></table><table>
                  <tbody>
    <tr >
					 <td></td>
					  <td></td>
					   <td></td>
					    <td></td>
						 <td></td>
						  <td></td>
						   <td></td>
						    <td style="float:right;">Total<input  class="row-overalltotal2" id="overalltotala2" name="overalltotal2" type="text"  value="<?php echo $project_table1['overalltotal2']; ?>">	<span class="removemula2" style="float: left;color:red;cursor:pointer;" id="ddrow2">Remove(X)</span></td>
					 </tr>
					   </tbody></table>
    <div style="    margin-top: 26px;
    margin-bottom: 26px;">		
			  <a href="javascript:void(0);" class="addCF2" id="addCFid" style="    padding: 6px;
    border: 2px solid;">Add More Rows</a>   
			  </div>
		</span>	  
		</div>	
<?php } ?>				

<?php 
if($project_table1['lengtha3']!='' or $project_table1['breadtha3']!='') 
{ ?>
  <div class="multi" id="cddrow3">
<span class="multiall" id="vddrow3">
 <table class="highlight addrow3" id="addrowline3">
<thead>
 <tr>
		            
				    <th>Descrption of the Property </th>
                    <th>Size<br>L W</th>
					<th>Area</th>
					<th>Rate</th>
                    <th>Year</th>
                    <th>Type Of Roofing</th>	
                    <th>Deprciation</th>
                    <th>Total</th>					

</tr>  		                  </thead>
                <tbody>
<?php 

$desc_prop3=explode(",",$project_table1['desc_prop3']);				
$lengtha3=explode(",",$project_table1['lengtha3']);	
$lengthb3=explode(",",$project_table1['lengthb3']);
$length3=explode(",",$project_table1['length3']);
$breadtha3=explode(",",$project_table1['breadtha3']);
$breadthb3=explode(",",$project_table1['breadthb3']);
$breadth3=explode(",",$project_table1['breadth3']);
$area3=explode(",",$project_table1['area3']);
$rate3=explode(",",$project_table1['rate3']);
$year3=explode(",",$project_table1['year3']);
$roofselect3=explode(",",$project_table1['roofselect3']);
$deprciation3=explode(",",$project_table1['deprciation3']);
$total3=explode(",",$project_table1['total3']);
$overalltotal3=explode(",",$project_table1['overalltotal3']);
foreach($lengtha3 as $lengthacountproper3 =>$key) {	?>			
				   <tr >
		          
				    <td><input  id="desc_prop" name="desc_prop3[]" type="text"  value="<?php echo $desc_prop3[$lengthacountproper3]; ?>"></td>
					<td style="width:300px;">
					<input  id="lengtha" name="lengtha3[]" type="text" placeholder="L3" value="<?php echo $lengtha3[$lengthacountproper3]; ?>" style="  margin-left: 30px;width: 30%;">
					<input  id="lengthb" name="lengthb3[]" type="text" placeholder="L3" value="<?php echo $lengthb3[$lengthacountproper3]; ?>" style="  margin-left: 30px;width: 30%;">=
					<input  id="length" name="length3[]" type="text" placeholder="L" value="<?php echo $length3[$lengthacountproper3]; ?>" style="  margin-left: 30px;width: 35%;">
					<br>
					<input  id="breadtha" name="breadtha3[]" type="text" placeholder="B3"  value="<?php echo $breadtha3[$lengthacountproper3]; ?>" style="  margin-left: 30px;width: 30%;">
					<input  id="breadthb" name="breadthb3[]" type="text" placeholder="B3"  value="<?php echo $breadthb3[$lengthacountproper3]; ?>" style="  margin-left: 30px;width: 30%;">=
					<input  id="breadth" name="breadth3[]" type="text"  placeholder="B"  value="<?php echo $breadth3[$lengthacountproper3]; ?>" style="margin-left: 30px;width: 35%;"></td>
					<td><input  id="area" name="area3[]" type="text"  value="<?php echo $area3[$lengthacountproper3]; ?>"></td>
					<td><input  id="rate" name="rate3[]" type="text"  value="<?php echo $rate3[$lengthacountproper3]; ?>"></td>
					<td><input  id="year" name="year3[]" type="text"  value="<?php echo $year3[$lengthacountproper3]; ?>"></td>
					<td class="divall"><select class="selectin" name="roofselect3[]" id="roofselect" style="display:block">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof3 = mysqli_fetch_array($roof)) {?>
                  <option value="<?php echo $roof3['id'];?>" <?php if($roofselect3[$lengthacountproper3]==$roof3['id']) {?> selected <?php } ?> data-id="<?php echo $roof3['percentage'];?>"><?php echo $roof3['name'];?></option>
<?php } ?>
                </select></td>
					<td><input  id="deprciation" name="deprciation3[]" type="text"  value="<?php echo $deprciation3[$lengthacountproper3]; ?>"></td>
					<td><input  id="total" class="row-total3" name="total3[]" type="text"  value="<?php echo $total3[$lengthacountproper3]; ?>">		<?php if($lengthacountproper3>0) {?>
					<a href="javascript:void(0);" class="remCF">Remove</a>
					<?php } ?></td>
					
                    
                  </tr> 
<?php } ?>				   

  </tbody></table><table>
                  <tbody>
    <tr >
					 <td></td>
					  <td></td>
					   <td></td>
					    <td></td>
						 <td></td>
						  <td></td>
						   <td></td>
						    <td style="float:right;">Total<input  class="row-overalltotal3" id="overalltotala3" name="overalltotal3" type="text"  value="<?php echo $project_table1['overalltotal3']; ?>">	<span class="removemula3" style="float: left;color:red;cursor:pointer;" id="ddrow3">Remove(X)</span></td>
					 </tr>
					   </tbody></table>
    <div style="    margin-top: 36px;
    margin-bottom: 36px;">		
			  <a href="javascript:void(0);" class="addCF3" id="addCFid" style="    padding: 6px;
    border: 3px solid;">Add More Rows</a>   
			  </div>
		</span>	  
		</div>	
<?php } ?>				
		
<?php } else {?>
 <div class="multi" id="">
<span class="multiall" id="">
 <table class="highlight addrow" id="addrowline1">
<thead>
 <tr>
		            
				    <th>Descrption of the Property</th>
                    <th>Size<br>L W</th>
					<th>Area</th>
					<th>Rate</th>
                    <th>Year</th>
                    <th>Type Of Roofing</th>	
                    <th>Deprciation</th>
                    <th>Total</th>					

</tr>  		                  </thead>
                <tbody>
				
				   <tr >
		          
				    <td><input  id="desc_prop" name="desc_prop[]" type="text"  value=""></td>
					<td style="width:200px;">
					<input  id="lengtha" name="lengtha[]" type="text" placeholder="L1" value="" style="  margin-left: 10px;width: 20%;">
					<input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="" style="  margin-left: 10px;width: 20%;">=
					<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 10px;width: 25%;">
					<br>
					<input  id="breadtha" name="breadtha[]" type="text" placeholder="B1" value="" style="  margin-left: 10px;width: 20%;">
					<input  id="breadthb" name="breadthb[]" type="text" placeholder="B2" value="" style="  margin-left: 10px;width: 20%;">=
					<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 10px;width: 25%;"></td>
					<td><input  id="area" name="area[]" type="text"  value=""></td>
					<td><input  id="rate" name="rate[]" type="text"  value=""></td>
					<td><input  id="year" name="year[]" type="text"  value=""></td>
					<td class="divall"><select class="selectin" name="roofselect[]" id="roofselect" style="display:block">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option value="<?php echo $roof1['id'];?>" data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select></td>
					<td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td>
					<td><input  id="total" class="row-total" name="total[]" type="text"  value=""></td>
					
                    
                  </tr> 
				   

  </tbody></table><table>
                  <tbody>
    <tr >
					 <td></td>
					  <td></td>
					   <td></td>
					    <td></td>
						 <td></td>
						  <td></td>
						   <td></td>
						    <td style="float:right;">Total<input  class="row-overalltotal" id="overalltotal" name="overalltotal" type="text"  value="">	<span class="removemul" style="float: left;color:red;cursor:pointer;" id="">Remove(X)</span></td>
					 </tr>
					   </tbody></table>
    <div style="    margin-top: 16px;
    margin-bottom: 16px;">		
			  <a href="javascript:void(0);" class="addCF" id="addCFid" style="    padding: 6px;
    border: 1px solid;">Add More Rows</a>   
			  </div>
		</span>	  
		</div>	

<?php } ?>		
		
		
	</div>	

 
<table class="highlight">
<thead>
<tr>
<th>Services</th>
<th></th>
<th>General Information</th>
<th></th>
</tr>
<tr>
<th>Water Supply Arrangements (Rs)</th>
<th><input  class="servicetotal" id="watersupplyarrangementsRs" name="watersupplyarrangementsRs" type="text" value="<?php echo $project1['watersupplyarrangementsRs'];?>"></th>

<th>Type of Construction</th>
<th>	 <select name="typeofconstruction" id="typeofconstruction">
                  <option value="" selected>Type of Construction</option>
				  <?php
				  $typeofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofconstruction order by id asc"); 
while ($typeofconstruction1 = mysqli_fetch_array($typeofconstruction)) {?>
                  <option value="<?php echo $typeofconstruction1['id'];?>" <?php if($typeofconstruction1['id']==$project1['typeofconstruction']) {?> selected <?php } ?>><?php echo $typeofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
</tr>

<tr>
<th>Drainage Arrangements (Rs)</th>
<th><input  class="servicetotal" id="drainagearrangementsRs" name="drainagearrangementsRs" type="text" value="<?php echo $project1['drainagearrangementsRs'];?>"></th>
<th>Building Maintenance</th>
<th><select name="maintenanceofthebuilding" id="maintenanceofthebuilding">
                  <option value="" selected>Building Maintenance</option>
				  <?php
				  $maintananceofthebuilding = mysqli_query($GLOBALS['connect'],"SELECT * FROM  maintananceofthebuilding order by id asc"); 
while ($maintananceofthebuilding1 = mysqli_fetch_array($maintananceofthebuilding)) {?>
                  <option value="<?php echo $maintananceofthebuilding1['id'];?>" <?php if($maintananceofthebuilding1['id']==$project1['maintenanceofthebuilding']) {?> selected <?php } ?>><?php echo $maintananceofthebuilding1['name'];?></option>
<?php } ?>
                </select> </th>
</tr>

<tr>
<th>Compound Wall L
<br>
L- <input  class="compoundwalltotal" id="compoundwallL1" name="compoundwallL1" type="text" value="<?php echo $project1['compoundwallL1'];?>" style="    width: 10%;" placeholder="L1">
<input  class="compoundwalltotal" id="compoundwallL2" name="compoundwallL2" type="text" value="<?php echo $project1['compoundwallL2'];?>" style="    width: 10%;"  placeholder="L2">
<input  class="compoundwalltotal" id="compoundwallL" name="compoundwallL" type="text" value="<?php echo $project1['compoundwallL'];?>" style="    width: 40%;"  placeholder="L">
<br>
H- <input class="compoundwalltotal" id="compoundwallH1" name="compoundwallH1" type="text" value="<?php echo $project1['compoundwallH1'];?>" style="    width: 10%;" placeholder="H1">
<input  class="compoundwalltotal" id="compoundwallH2" name="compoundwallH2" type="text" value="<?php echo $project1['compoundwallH2'];?>" style="    width: 10%;" placeholder="H2">
<input  class="compoundwalltotal" id="compoundwallH" name="compoundwallH" type="text" value="<?php echo $project1['compoundwallH'];?>" style="    width: 40%;" placeholder="H">
</th>
<th><input  class="servicetotal" id="compoundwallRs" name="compoundwallRs" type="text" value="<?php echo $project1['compoundwallRs'];?>"></th>
<th>Drainage Arrangements</th>
<th > <select name="drainagearrangements" id="drainagearrangements">
                  <option value="" >Drainage Arrangements</option>
				  <?php
				  $drainagearrangements = mysqli_query($GLOBALS['connect'],"SELECT * FROM  maintananceofthebuilding order by id asc"); 
while ($drainagearrangements1 = mysqli_fetch_array($drainagearrangements)) {?>
                  <option value="<?php echo $drainagearrangements1['id'];?>" <?php if($drainagearrangements1['id']==$project1['drainagearrangements']) {?> selected <?php } ?>><?php echo $drainagearrangements1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th>E.B Deposit <div style="    width: 150px !important;
    margin-top: -38px;
    margin-left: 114px;"><select name="ebdepositI" id="ebdepositI" style="    width: 30%;">
                  <option value="" >Select</option>
                  <option <?php if($project1['ebdepositI']=='I') {?> selected <?php } ?> value="I" >I</option>
				  <option <?php if($project1['ebdepositI']=='III') {?> selected <?php } ?>  value="III" >III</option>
                </select></div></th>
<th><input  class="servicetotal" id="ebdepositRs" name="ebdepositRs" type="text" value="<?php echo $project1['ebdepositRs'];?>"></th>
<th>Character of Locality</th>
<th>  <select name="characteroflocality" id="characteroflocality">
                  <option value="">Character of Locality</option>
				  <?php
				  $characteroflocality = mysqli_query($GLOBALS['connect'],"SELECT * FROM  characteroflocality order by id asc"); 
while ($characteroflocality1 = mysqli_fetch_array($characteroflocality)) {?>
                  <option value="<?php echo $characteroflocality1['id'];?>" <?php if($characteroflocality1['id']==$project1['characteroflocality']) {?> selected <?php } ?>><?php echo $characteroflocality1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th>Pavar/Cement/Tiles</th>
<th><input  class="servicetotal" id="paverrs" name="paverrs" type="text" value="<?php echo $project1['paverrs'];?>"></th>
<th>Road Facilities
<span for="roadfacilities">Wide</span>
<input  id="roadfacilities" name="roadfacilities" type="text" value="<?php echo $project1['roadfacilities'];?>" style="width:30%;">
</th>

<th>   <select name="roadfacilitiesyes" id="roadfacilitiesyes">
                  <option value="">Road Facilities</option>
				  <?php
				  $roadfacilities = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roadfacilities order by id asc"); 
while ($roadfacilities1 = mysqli_fetch_array($roadfacilities)) {?>
                  <option value="<?php echo $roadfacilities1['id'];?>" <?php if($roadfacilities1['id']==$project1['roadfacilitiesyes']) {?> selected <?php } ?>><?php echo $roadfacilities1['name'];?></option>
<?php } ?>
                </select></th>
</tr>



<tr>
<th>
Sump<input  class="sumpclass" id="sump" name="sump" type="text" value="<?php echo $project1['sump'];?>" placeholder="Rs" style="width: 40%;margin-left: 52px;" value="">
<br>OH Tank<input class="sumpclass" id="oht" name="oht" type="text" value="<?php echo $project1['oht'];?>"  placeholder="Rs" style="width: 31%;margin-left: 30px;" value="">
<br>Sintex<input class="sumpclass" id="sintex" name="sintex" type="text" value="<?php echo $project1['sintex'];?>" placeholder="Rs" style="width: 39%;margin-left: 47px;" value=""></th>

<th ><input  class="servicetotal" id="sumpohtRs" name="sumpohtRs" type="text" value="<?php echo $project1['sumpohtRs'];?>"></th>
<th>Water Supply Arrangements</th>
<th>  <select name="watersupplyarrangements" id="watersupplyarrangements">
                  <option value="" >Select</option>
				  <?php
				  $watersupplyarrangements = mysqli_query($GLOBALS['connect'],"SELECT * FROM  watersupplyarrangements order by id asc"); 
while ($watersupplyarrangements1 = mysqli_fetch_array($watersupplyarrangements)) {?>
                  <option value="<?php echo $watersupplyarrangements1['id'];?>" <?php if($watersupplyarrangements1['id']==$project1['watersupplyarrangements']) {?> selected <?php } ?>><?php echo $watersupplyarrangements1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th> Interior / Exterior (Rs)</th>
<th><input  class="servicetotal" id="interiorworkRs" name="interiorworkRs" type="text" value="<?php echo $project1['interiorworkRs'];?>"></th>
<th>Type of Plot</th>
<th> <select name="cornerplotintermittentplot" id="cornerplotintermittentplot">
                  <option value="">Type of Plot</option>
				  <?php
				  $cornerintermittentcommerciallot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  cornerintermittentcommerciallot order by id asc"); 
while ($cornerintermittentcommerciallot1 = mysqli_fetch_array($cornerintermittentcommerciallot)) {?>
                  <option value="<?php echo $cornerintermittentcommerciallot1['id'];?>" <?php if($cornerintermittentcommerciallot1['id']==$project1['cornerplotintermittentplot']) {?> selected <?php } ?>><?php echo $cornerintermittentcommerciallot1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th>Open / Stair head (Rs)</th>
<th><input  class="servicetotal" id="openstaircaseRs" name="openstaircaseRs" type="text" value="<?php echo $project1['openstaircaseRs'];?>"></th>
<th>Joineries</th>
<th>  <select name="joineries" id="joineries">
                  <option value="" >Joineries</option>
				  <?php
				  $joineries = mysqli_query($GLOBALS['connect'],"SELECT * FROM  joineries order by id asc"); 
while ($joineries1 = mysqli_fetch_array($joineries)) {?>
                  <option value="<?php echo $joineries1['id'];?>" <?php if($joineries1['id']==$project1['joineries']) {?> selected <?php } ?>><?php echo $joineries1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th style="width: 25%;">Total</th>
<th><input  class="serviceovertotal" id="serviceovertotal" name="serviceovertotal" type="text" value="<?php echo $project1['serviceovertotal'];?>"></th>
<th></th>
<th></th>
</tr>

</thead>
</table>
	
	
							 
				 

<?php if(1!=1)	
{?>	
				  <div class="input-field col s12 xl6">
                <input  id="watersupplyarrangementsRs" name="watersupplyarrangementsRs" type="text" value="<?php echo $project1['watersupplyarrangementsRs'];?>">
                <label for="watersupplyarrangementsRs">Water Supply Arrangements (Rs)</label>
                </div> 
				
				
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                  <input  id="drainagearrangementsRs" name="drainagearrangementsRs" type="text" value="<?php echo $project1['drainagearrangementsRs'];?>">
                <label for="drainagearrangementsRs">Drainage Arrangements (Rs)</label>

                </div> 
				<div class="input-field col s12 xl6">
                 <input  id="compoundwallL" name="compoundwallL" type="text" value="<?php echo $project1['compoundwallL'];?>">
                <label for="compoundwallL">Compound Wall L</label>
                </div> 
					<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                 <input  id="compoundwallH" name="compoundwallH" type="text" value="<?php echo $project1['compoundwallH'];?>">
                <label for="compoundwallH">Compound Wall H</label>
                </div> 
				<div class="input-field col s12 xl6">
                 <input  id="compoundwallRs" name="compoundwallRs" type="text" value="<?php echo $project1['compoundwallRs'];?>">
                <label for="compoundwallRs">Compound Wall  L H (Rs)</label>
                </div> 
					<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                 <input  id="ebdepositI" name="ebdepositI" type="text" value="<?php echo $project1['ebdepositI'];?>">
                <label for="ebdepositI">.E.B Deposit I-</label>
                </div> 
					<div class="input-field col s12 xl6">
                 <input  id="ebdepositIII" name="ebdepositIII" type="text" value="<?php echo $project1['ebdepositIII'];?>">
                <label for="ebdepositIII">E.B Deposit III-</label>
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                 <input  id="ebdepositRs" name="ebdepositRs" type="text" value="<?php echo $project1['ebdepositRs'];?>">
                <label for="ebdepositRs">E.B Deposit I- III- (Rs)</label>
                </div> 
				<div class="input-field col s12 xl6">
                 <input  id="paverrs" name="paverrs" type="text" value="<?php echo $project1['paverrs'];?>">
                <label for="paverrs">Pavar (Rs)</label>
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                 <input  id="cementrs" name="cementrs" type="text" value="<?php echo $project1['cementrs'];?>">
                <label for="cementrs">Cement (Rs)</label>
                </div> 
				<div class="input-field col s12 xl6">
                 <input  id="tilesrs" name="tilesrs" type="text" value="<?php echo $project1['tilesrs'];?>">
                <label for="tilesrs">Tiles (Rs)</label>
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                 <input  id="sump" name="sump" type="text" value="<?php echo $project1['sump'];?>">
                <label for="sump">Sump-</label>
                </div> 
				
				<div class="input-field col s12 xl6">
                 <input  id="oht" name="oht" type="text" value="<?php echo $project1['oht'];?>">
                <label for="oht">OHT-</label>
                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                 <input  id="sumpohtRs" name="sumpohtRs" type="text" value="<?php echo $project1['sumpohtRs'];?>">
                <label for="sumpohtRs">Sump-/OHT- (Rs)</label>
                </div> 
				<div class="input-field col s12 xl6">
                  <input  id="interiorworkRs" name="interiorworkRs" type="text" value="<?php echo $project1['interiorworkRs'];?>">
                <label for="interiorworkRs">Interior / Exterior (Rs)</label>

                </div> 
				<div class="input-field col s12 xl6" style="width:46%;margin-left:10px;">
                  <input  id="openstaircaseRs" name="openstaircaseRs" type="text" value="<?php echo $project1['openstaircaseRs'];?>">
                <label for="openstaircaseRs">Open / Stair head (Rs)</label>

                </div> 
<?php } ?>				
						<input type="hidden" name="step4" value="step4">
			<div class="col xl8 s12 mb-6">
				  </div>
			   <div class="col xl2 s6 mb-3">
					   <input type="submit"  name="prev"  value="< Prev"  style="  background-color: green;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 6px;
  cursor: pointer;float:right;" >    </div>
  <div class="col xl2 s6 mb-3">
					  <input type="submit"  name="save"  value="Save"  style="  background-color:  #d32e09;
  border: none;
  color: white;
  padding: 7px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  border-radius: 6px;
      margin-left: -8px;">
					
                    </div>
              
			  
			  </div>
		   </form>
                         
                           </div>
<?php } ?>                      



					 
                     </div>
                  </div>
             

			 </div>
            </div>
          </div>
             

	
	
	
	
	
	</div>
<?php include("footer.php");?>

<script>

$('#taxreceiptfile').hide();
$('#ebservicenofile').hide();
$('#pattadtcpfile').hide();
$('#approvalplanfile').hide();
$('#hdlinefile').hide();

$('#watersupplyarrangementsyes1').hide();
$('#drainagearrangementsyes1').hide();
 
if($('#taxreceipt').val() == "Yes" ){$('#taxreceiptfile').show();}
if($('#ebserviceno').val() == "Yes" ){$('#ebservicenofile').show();}
if($('#pattadtcp').val() == "Yes" ){$('#pattadtcpfile').show();}
if($('#approvalplan').val() == "Yes" ){$('#approvalplanfile').show();}
if($('#hdline').val() == "Yes" ){$('#hdlinefile').show();} 

if($('#watersupplyarrangements').val() == "Yes" ){$('#watersupplyarrangementsyes1').show();} 
if($('#drainagearrangements').val() == "Yes" ){$('#drainagearrangementsyes1').show();} 

$('#taxreceipt').change(function(){ if($(this).val() == "Yes" ){$('#taxreceiptfile').show();}else{$('#taxreceiptfile').hide();}});
$('#ebserviceno').change(function(){ if($(this).val() == "Yes" ){$('#ebservicenofile').show();}else{$('#ebservicenofile').hide();}});
$('#pattadtcp').change(function(){ if($(this).val() == "Yes" ){$('#pattadtcpfile').show();}else{$('#pattadtcpfile').hide();}});
$('#approvalplan').change(function(){ if($(this).val() == "Yes" ){$('#approvalplanfile').show();}else{$('#approvalplanfile').hide();}});
$('#hdline').change(function(){ if($(this).val() == "Yes" ){$('#hdlinefile').show();}else{$('#hdlinefile').hide();}});

$('#watersupplyarrangements').change(function(){ if($(this).val() == "Yes" ){$('#watersupplyarrangementsyes1').show();}else{$('#watersupplyarrangementsyes1').hide();}});
$('#drainagearrangements').change(function(){ if($(this).val() == "Yes" ){$('#drainagearrangementsyes1').show();}else{$('#drainagearrangementsyes1').hide();}});





  $(document).ready(function(){   
  

$("#purchaseyes").click(function() {
    if($(this).is(":checked")) {
        $(".purchaseyescheck").show();
    } else {
        $(".purchaseyescheck").hide();
    }
});


  
$('.add').click(function() {
	
var min = 1;
var max = 99;
// and the formula is:
var random = Math.floor(Math.random() * (max - min + 1)) + min;


    $('.block:last').before('<div class="row block ' + random + '"><table class="highlight"><thead><tr><th>Type of Property</th><th><select name="typeofproperty[]" id="typeofproperty" style="display:block;"><option value="" >Type of Property </option> <?php $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?><option value="<?php echo $typeofproperty1['id'];?>"><?php echo $typeofproperty1['name'];?></option> <?php } ?> </select></th><th>Size of Plot</th><th> <select name="sizeofplot[]" id="sizeofplot" style="display:block;"><option value="" >Size of Plot</option> <?php $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?> <option value="<?php echo $sizeofplot1['id'];?>"><?php echo $sizeofplot1['name'];?></option><?php } ?></select></th></tr><tr><th style="width: 22%;">Development to site</th><th><select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block;"><option value="" >Select</option><?php $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?> <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$project1['recentdevelopmentsnear']) {?>  <?php } ?>><?php echo $recentdevelopments1['name'];?></option><?php } ?></select></th><th>Resent Sale Details</th><th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $project1['resentsaledetails'];?>"></th></tr><tr><th style="width: 22%;">Class of Construction</th><th><select name="classofconstruction[]" id="classofconstruction" style="display:block;"><option value="" >Class of Construction</option><?php $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?> <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$project1['classofconstruction']) {?>  <?php } ?>><?php echo $classofconstruction1['name'];?></option> <?php } ?></select></th><th>Control Limit</th><th> 	 <select name="limits[]" id="limits" style="display:block;"><option value="" >Limit</option><?php $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); while ($limits1 = mysqli_fetch_array($limits)) {?><option value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option><?php } ?></select></th></tr><tr><th style="width: 22%;">Type of Roof</th><th><select name="roof[]" id="roof" style="display:block;"><option value="" >Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?> </select>	</th><th></th><th><div class="input-field col s12 xl6" style="width:46%;margin-left:10px;border:0px solid;"><span class="remove" style="float: left;color:red;cursor:pointer;" id="' + random + '">Remove(X)</span></div> 	 </th></tr></thead></table></div>');
	
});
  

 $(document).on("click", ".remove", function(e) { //user click on remove text
        e.preventDefault();
		var idval=$(this).attr("id");
        $('.' + idval + '').remove();
        x--;
    });
	
	
	
	
     
	  
	  
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

$(".compoundwalltotal").on("blur", function(){ 
var compoundwallL1 = parseFloat($('#compoundwallL1').val());
var compoundwallL2 = parseFloat($('#compoundwallL2').val()); 
if(compoundwallL1=='') { var compoundwallL1=0;}if(compoundwallL2=='') { var compoundwallL2=0;}
var compoundwallL = (parseFloat(compoundwallL2)/12).toFixed(2);;
var compoundwallL3=(parseFloat(compoundwallL1)+parseFloat(compoundwallL2)).toFixed(2);
$('#compoundwallL').val(compoundwallL3);  

var compoundwallH1 = parseFloat($('#compoundwallH1').val());
var compoundwallH2 = parseFloat($('#compoundwallH2').val()); 
if(compoundwallH1=='') { var compoundwallH1=0;}if(compoundwallH2=='') { var compoundwallH2=0;}
var compoundwallH = (parseFloat(compoundwallH2)/12).toFixed(2);;
var compoundwallH3=(parseFloat(compoundwallH1)+parseFloat(compoundwallH2)).toFixed(2);
$('#compoundwallH').val(compoundwallH3); 
});

$(".sumpclass").on("blur", function(){
    var sum=0;
    $(".sumpclass").each(function(){
        if($(this).val() != "")
          sum += parseInt($(this).val());   
    });
    
    $("#sumpohtRs").val(sum);
	
	 var sum2=0;
    $(".servicetotal").each(function(){
        if($(this).val() != "")
          sum2 += parseInt($(this).val());   
    });
    
    $("#serviceovertotal").val(sum2);
	
})

$(".servicetotal").on("blur", function(){
    var sum=0;
    $(".servicetotal").each(function(){
        if($(this).val() != "")
          sum += parseInt($(this).val());   
    });
    
    $("#serviceovertotal").val(sum);
})


$('#addline').click(function() { 
var rowCount = $('#invoice > div.multi').length;


    var clone = $('#invoice > div.multi:first').clone();
    clone.find('input').val('');
	clone.find('select').val('');
    clone.insertAfter('#invoice > div.multi:last');
	$("#roofselect").clone(); 
var min = 1;
var max = 99;
// and the formula is:
var random22 =rowCount;


var randomprev="";




clone.find('.removemul').show();

clone.find('.removemul').attr({ id: "ddrow"+random22+""});
clone.find('.multiall').attr({ id: "vddrow"+random22+""});

 
clone.find('#desc_prop').attr({ name: "desc_prop"+random22+"[]"});
clone.find('#lengtha').attr({ name: "lengtha"+random22+"[]"});
clone.find('#lengthb').attr({ name: "lengthb"+random22+"[]"});
clone.find('#length').attr({ name: "length"+random22+"[]"});
clone.find('#breadtha').attr({ name: "breadtha"+random22+"[]"});
clone.find('#breadthb').attr({ name: "breadthb"+random22+"[]"});
clone.find('#breadth').attr({ name: "breadth"+random22+"[]"});
clone.find('#area').attr({ name: "area"+random22+"[]"});
clone.find('#rate').attr({ name: "rate"+random22+"[]"});
clone.find('#year').attr({ name: "year"+random22+"[]"});
clone.find('#roofselect').attr({ name: "roofselect"+random22+"[]"});
clone.find('#deprciation').attr({ name: "deprciation"+random22+"[]"});
clone.find('#total').attr({ name: "total"+random22+"[]"});
clone.find('#overalltotal').attr({ name: "overalltotal"+random22+""});

clone.find('#addrowline1').removeClass();
clone.find('#addrowline1').addClass('addrow' + random22);

clone.find('#addCFid').removeClass();
clone.find('#addCFid').addClass('addCF' + random22);

clone.find('#total').removeClass();
clone.find('#total').addClass('row-total' + random22);

clone.find('#overalltotal').removeClass();
clone.find('#overalltotal').addClass('row-overalltotal' + random22);


	
	$(".addCF" + random22).click(function(){
		$(".addrow"+ random22).append('<tr><td><input  id="desc_prop" name="desc_prop'+ random22+'[]" type="text"  value=""></td><td style="width:200px;"><input  id="lengtha" name="lengtha'+ random22+'[]" type="text" placeholder="L1" value="" style="  margin-left: 10px;width: 20%;"><input  id="lengthb" name="lengthb'+ random22+'[]" type="text" placeholder="L2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="length" name="length'+ random22+'[]" type="text" placeholder="L" value="" style="  margin-left: 10px;width: 25%;"><br><input  id="breadtha" name="breadtha'+ random22+'[]" type="text" placeholder="B1" value="" style="  margin-left: 10px;width: 20%;"><input  id="breadthb" name="breadthb'+ random22+'[]" type="text" placeholder="B2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="breadth" name="breadth'+ random22+'[]" type="text"  placeholder="B" value="" style="margin-left: 10px;width: 25%;"></td><td><input  id="area" name="area'+ random22+'[]" type="text"  value=""></td><td><input  id="rate" name="rate'+ random22+'[]" type="text"  value=""></td><td><input  id="year" name="year'+ random22+'[]" type="text"  value=""></td><td><select class="selectin" name="roofselect'+ random22+'[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>" data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation'+ random22+'[]" type="text"  value=""></td><td><input  id="total" class="row-total'+ random22+'" name="total'+ random22+'[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
	

			  $(".addrow"+ random22+" input").on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengtha').val();
if(lengtha=='') { var lengthb=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);				  
			  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total'+ random22).each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('.row-overalltotal'+ random22).val(sum.toFixed(2));
		
});	
		
	  $(".addrow"+ random22+" select").on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		  
		  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total'+ random22).each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('.row-overalltotal'+ random22).val(sum.toFixed(2));
	  });		
	});
	
	
	
	
	
	
	
	  $(".addrow"+ random22).on('click','.remCF',function(){
        $(this).parent().parent().remove();
		
var sum = 0;
$('.row-total'+ random22).each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});		
$('.row-overalltotal'+ random22).val(sum.toFixed(2));		
    });
	
	
 $('.removemul').on('click', function() { 
	      var idval=$(this).attr("id");
	      $('#vddrow1').remove();
});	
	
	
	  $(".addrow"+ random22+" input").on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);				  
			  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
	var sum = 0;
$('.row-total'+ random22).each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('.row-overalltotal'+ random22).val(sum.toFixed(2));
});	

  $(".addrow"+ random22+" select").on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		
	  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total'+ random22).each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('.row-overalltotal'+ random22).val(sum.toFixed(2));
	  });	
	
});
 
 
$(".addCF").click(function(){
$(".addrow").append('<tr><td><input  id="desc_prop" name="desc_prop[]" type="text"  value=""></td><td style="width:200px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L1" value="" style="  margin-left: 10px;width: 20%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 10px;width: 25%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B1" value="" style="  margin-left: 10px;width: 20%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 10px;width: 25%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td><input  id="year" name="year[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>" data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
$('.addrow input').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum);
});
$('.addrow select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotal').val(sum);
});	 
});


    
    $(".addrow").on('click','.remCF',function(){
        $(this).parent().parent().remove();
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum);
    });

 $('.addrow input').on('blur', function() {

var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		 
	 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum);
});

///////////////////////////////////// Start //////////////////

$(".addCF1").click(function(){
$(".addrow1").append('<tr><td><input  id="desc_prop" name="desc_prop[]" type="text"  value=""></td><td style="width:200px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L1" value="" style="  margin-left: 10px;width: 20%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 10px;width: 25%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B1" value="" style="  margin-left: 10px;width: 20%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 10px;width: 25%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td><input  id="year" name="year[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>" data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total1" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
$('.addrow1 input').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total1').each(function(){
    sum += parseFloat($(this).val());  
});

$('#overalltotala1').val(sum);
});
$('.addrow1 select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total1').each(function(){
sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotala1').val(sum.toFixed(2));
});	 
});
$('.addrow1 input').on('blur', function() { 
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total1').each(function(){
    sum += parseFloat($(this).val()); 
});

$('#overalltotala1').val(sum.toFixed(2));
});
 $('.addrow1 select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total1').each(function(){
    sum += parseFloat($(this).val()); 
});

$('#overalltotala1').val(sum.toFixed(2));
})

$(".addrow1").on('click','.remCF',function(){
$(this).parent().parent().remove();
var sum = 0;
$('.row-total1').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotala1').val(sum);
});
 $('.removemula1').on('click', function() { 
	      var idval=$(this).attr("id");
	      $('#cddrow1').remove();
});	
///////////////////////////////////// End //////////////////


///////////////////////////////////// Start //////////////////

$(".addCF2").click(function(){
$(".addrow2").append('<tr><td><input  id="desc_prop" name="desc_prop[]" type="text"  value=""></td><td style="width:200px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L2" value="" style="  margin-left: 20px;width: 20%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="" style="  margin-left: 20px;width: 20%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 20px;width: 25%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B2" value="" style="  margin-left: 20px;width: 20%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B2" value="" style="  margin-left: 20px;width: 20%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 20px;width: 25%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td><input  id="year" name="year[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof2 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof2['id'];?>" data-id="<?php echo $roof2['percentage'];?>"><?php echo $roof2['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total2" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
$('.addrow2 input').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length32=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length32);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth32=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth32);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/200).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/200);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total2').each(function(){
    sum += parseFloat($(this).val());  
});

$('#overalltotala2').val(sum.toFixed(2));
});
$('.addrow2 select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length32=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length32);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth32=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth32);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/200).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/200);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total2').each(function(){
sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotala2').val(sum.toFixed(2));
});	 
});
$('.addrow2 input').on('blur', function() { 
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length32=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length32);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth32=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth32);		 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/200).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/200);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total2').each(function(){
    sum += parseFloat($(this).val()); 
});

$('#overalltotala2').val(sum.toFixed(2));
});
 $('.addrow2 select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length32=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length32);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth32=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth32);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/200).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/200);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total2').each(function(){
    sum += parseFloat($(this).val()); 
});

$('#overalltotala2').val(sum.toFixed(2));
})

$(".addrow2").on('click','.remCF',function(){
$(this).parent().parent().remove();
var sum = 0;
$('.row-total2').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotala2').val(sum);
});
 $('.removemula2').on('click', function() { 
	      var idval=$(this).attr("id");
	      $('#cddrow2').remove();
});	
///////////////////////////////////// End //////////////////

///////////////////////////////////// Start //////////////////

$(".addCF3").click(function(){
$(".addrow3").append('<tr><td><input  id="desc_prop" name="desc_prop[]" type="text"  value=""></td><td style="width:300px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L3" value="" style="  margin-left: 30px;width: 30%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L3" value="" style="  margin-left: 30px;width: 30%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 30px;width: 35%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B3" value="" style="  margin-left: 30px;width: 30%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B3" value="" style="  margin-left: 30px;width: 30%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 30px;width: 35%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td><input  id="year" name="year[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof3 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof3['id'];?>" data-id="<?php echo $roof3['percentage'];?>"><?php echo $roof3['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total3" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
$('.addrow3 input').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length33=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length33);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth33=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth33);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(3));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total3').each(function(){
    sum += parseFloat($(this).val());  
});

$('#overalltotala3').val(sum.toFixed(2));
});
$('.addrow3 select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length33=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length33);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth33=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth33);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total3').each(function(){
sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotala3').val(sum.toFixed(2));
});	 
});
$('.addrow3 input').on('blur', function() { 
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length33=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length33);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth33=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth33);		 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total3').each(function(){
    sum += parseFloat($(this).val()); 
});

$('#overalltotala3').val(sum.toFixed(2));
});
 $('.addrow3 select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length33=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length33);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth33=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth33);		
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total3').each(function(){
    sum += parseFloat($(this).val()); 
});

$('#overalltotala3').val(sum.toFixed(2));
})

$(".addrow3").on('click','.remCF',function(){
$(this).parent().parent().remove();
var sum = 0;
$('.row-total3').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotala3').val(sum.toFixed(2));
});
 $('.removemula3').on('click', function() { 
	      var idval=$(this).attr("id");
	      $('#cddrow3').remove();
});	
///////////////////////////////////// End //////////////////


	  $(".addrow").on('click','.remCF',function(){
        $(this).parent().parent().remove();
		
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});		
$('.row-overalltotal').val(sum.toFixed(2));		
    });
	
 $('.addrow select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
$(this).closest('tr').find('#length').val(length31);
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
$(this).closest('tr').find('#breadth').val(breadth31);		
	 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=(parseFloat(length)*parseFloat(breadth));
$(this).closest('tr').find('#area').val(totlb);
var area =  $(this).closest('tr').find('#area').val();
if(area) { var area=area;} else { var area=0;}
var rate =  $(this).closest('tr').find('#rate').val();
if(rate) { var rate=rate;} else { var rate=0;}
var yearval =  $(this).closest('tr').find('#year').val();
if(yearval) { var yearval=yearval;} else { var yearval=0;}
var currentTime = new Date();
var year = currentTime.getFullYear();
var yeardiff=(parseFloat(year)-parseFloat(yearval));
var roofselect =  $(this).closest('tr').find('#roofselect option:selected').data('id');
if(roofselect) { var roofselect=roofselect;} else { var roofselect=0;}
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(2));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation))/100);
$(this).closest('tr').find('#total').val(totall.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum);
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
	 
	 
	 
	  ton: {
        required: true,
      },
	   date: {
        required: true,
      },
	   vehicle_no: {
        required: true,
      },
     
    },
    //For custom messages
    messages: {
	 
      ton: {
        required: "Enter a Ton",
      },
	  date: {
        required: "Enter a Date",
      },
	   vehicle_no: {
        required: "Enter a Vehicle Number",
      },
	  
	 
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



  $(document).ready(function() {
	  
	  $("#add_more").on('click', function(e) { 
      e.preventDefault();
      var clone = $("#table tbody:last").clone();
	  var cloneaddcoun = $("#table #addcoun:last").val();
	     clone.find('input').val('');
	clone.find('select').val('');
	   var cloneaddcoun1 = 1;
	   
	   var cloneaddcountval = parseFloat(cloneaddcoun)+ parseFloat(cloneaddcoun1);
      clone.removeClass();
            clone.addClass('newTR' + cloneaddcountval).css("background-color", "#fafafa14");  ;

		   clone.find('#remove_more').removeClass();

	 clone.find('#remove_more').addClass('dnewTR' + cloneaddcountval);;
	 
  clone.find('.dnewTR'+ cloneaddcountval).show();
 


    if ((cloneaddcoun % 2 == 0)) {

     $(".newTR"+ cloneaddcoun).css("background-color", "#76e70ea6");
	  } else {
		  $(".newTR"+ cloneaddcoun).css("background-color", "#f8bb86c9"); 
	  }
	   


     
      $("#table table").append(clone);
	  $('#table #addcoun:last').val(cloneaddcountval);
	  
	  
	  ///////////// start
	 	
  $('.newTR2 input').on('blur', function() {

      var north1 = $('.newTR2 #north1').val();
	  
      var north2 = $('.newTR2 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR2 #north3').val(north31);
	  
	  var north4 = $('.newTR2 #north4').val();
	  
      var north5 = $('.newTR2 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR2 #north6').val(north61);
	  
	  var north7 = $('.newTR2 #north7').val();
	  
      var north8 = $('.newTR2 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR2 #north9').val(north91);
	  
	  
      var south1 = $('.newTR2 #south1').val();
	  
      var south2 = $('.newTR2 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR2 #south3').val(south31);
	  
	  var south4 = $('.newTR2 #south4').val();
	  
      var south5 = $('.newTR2 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR2 #south6').val(south61);
	  
	  var south7 = $('.newTR2 #south7').val();
	  
      var south8 = $('.newTR2 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR2 #south9').val(south91);	  
	  
	  var west1 = $('.newTR2 #west1').val();
	  
      var west2 = $('.newTR2 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR2 #west3').val(west31);
	  
	  var west4 = $('.newTR2 #west4').val();
	  
      var west5 = $('.newTR2 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR2 #west6').val(west61);
	  
	  var west7 = $('.newTR2 #west7').val();
	  
      var west8 = $('.newTR2 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR2 #west9').val(west91);
	  
	  var east1 = $('.newTR2 #east1').val();
	  
      var east2 = $('.newTR2 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR2 #east3').val(east31);
	  
	  var east4 = $('.newTR2 #east4').val();
	  
      var east5 = $('.newTR2 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR2 #east6').val(east61);
	  
	  var east7 = $('.newTR2 #east7').val();
	  
      var east8 = $('.newTR2 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR2 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)+parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR2 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)+parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR2 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)+parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR2 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	  
	  else if(estent1!='0.00')
	  {
	  var estentotal = Math.min(estent1);	  
	  }
	   else if(estent2!='0.00')
	  {
	  var estentotal = Math.min(estent2);	  
	  }
	   else if(estent3!='0.00')
	  {
	  var estentotal = Math.min(estent3);	  
	  }
	  
	  
	  
	  var anyarea = $('.newTR2 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR2 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR2 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR2 #totallandvalue').val(totallandvalue);
	 
	
    
 }); 
	  
//////////// end 

///////////// start
  $('.newTR3 input').on('blur', function() {

      var north1 = $('.newTR3 #north1').val();
	  
      var north2 = $('.newTR3 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR3 #north3').val(north31);
	  
	  var north4 = $('.newTR3 #north4').val();
	  
      var north5 = $('.newTR3 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR3 #north6').val(north61);
	  
	  var north7 = $('.newTR3 #north7').val();
	  
      var north8 = $('.newTR3 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR3 #north9').val(north91);
	  
	  
      var south1 = $('.newTR3 #south1').val();
	  
      var south2 = $('.newTR3 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR3 #south3').val(south31);
	  
	  var south4 = $('.newTR3 #south4').val();
	  
      var south5 = $('.newTR3 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR3 #south6').val(south61);
	  
	  var south7 = $('.newTR3 #south7').val();
	  
      var south8 = $('.newTR3 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR3 #south9').val(south91);	  
	  
	  var west1 = $('.newTR3 #west1').val();
	  
      var west2 = $('.newTR3 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR3 #west3').val(west31);
	  
	  var west4 = $('.newTR3 #west4').val();
	  
      var west5 = $('.newTR3 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR3 #west6').val(west61);
	  
	  var west7 = $('.newTR3 #west7').val();
	  
      var west8 = $('.newTR3 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR3 #west9').val(west91);
	  
	  var east1 = $('.newTR3 #east1').val();
	  
      var east2 = $('.newTR3 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR3 #east3').val(east31);
	  
	  var east4 = $('.newTR3 #east4').val();
	  
      var east5 = $('.newTR3 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR3 #east6').val(east61);
	  
	  var east7 = $('.newTR3 #east7').val();
	  
      var east8 = $('.newTR3 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR3 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)+parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR3 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)+parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR3 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)+parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR3 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	  
	  else if(estent1!='0.00')
	  {
	  var estentotal = Math.min(estent1);	  
	  }
	   else if(estent2!='0.00')
	  {
	  var estentotal = Math.min(estent2);	  
	  }
	   else if(estent3!='0.00')
	  {
	  var estentotal = Math.min(estent3);	  
	  }
	  
	  
	  var anyarea = $('.newTR3 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR3 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR3 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR3 #totallandvalue').val(totallandvalue);
	 
	
    
 }); 
///// end 

////////////// start
  $('.newTR4 input').on('blur', function() {

      var north1 = $('.newTR4 #north1').val();
	  
      var north2 = $('.newTR4 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR4 #north3').val(north31);
	  
	  var north4 = $('.newTR4 #north4').val();
	  
      var north5 = $('.newTR4 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR4 #north6').val(north61);
	  
	  var north7 = $('.newTR4 #north7').val();
	  
      var north8 = $('.newTR4 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR4 #north9').val(north91);
	  
	  
      var south1 = $('.newTR4 #south1').val();
	  
      var south2 = $('.newTR4 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR4 #south3').val(south31);
	  
	  var south4 = $('.newTR4 #south4').val();
	  
      var south5 = $('.newTR4 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR4 #south6').val(south61);
	  
	  var south7 = $('.newTR4 #south7').val();
	  
      var south8 = $('.newTR4 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR4 #south9').val(south91);	  
	  
	  var west1 = $('.newTR4 #west1').val();
	  
      var west2 = $('.newTR4 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR4 #west3').val(west31);
	  
	  var west4 = $('.newTR4 #west4').val();
	  
      var west5 = $('.newTR4 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR4 #west6').val(west61);
	  
	  var west7 = $('.newTR4 #west7').val();
	  
      var west8 = $('.newTR4 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR4 #west9').val(west91);
	  
	  var east1 = $('.newTR4 #east1').val();
	  
      var east2 = $('.newTR4 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR4 #east3').val(east31);
	  
	  var east4 = $('.newTR4 #east4').val();
	  
      var east5 = $('.newTR4 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR4 #east6').val(east61);
	  
	  var east7 = $('.newTR4 #east7').val();
	  
      var east8 = $('.newTR4 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR4 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)+parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR4 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)+parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR4 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)+parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR4 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	  
	   else if(estent1!='0.00')
	  {
	  var estentotal = Math.min(estent1);	  
	  }
	   else if(estent2!='0.00')
	  {
	  var estentotal = Math.min(estent2);	  
	  }
	   else if(estent3!='0.00')
	  {
	  var estentotal = Math.min(estent3);	  
	  }
	  
	  
	  
	  var anyarea = $('.newTR4 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR4 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR4 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR4 #totallandvalue').val(totallandvalue);
	 
	
    
 }); 
///////

/////////// start
   $('.newTR5 input').on('blur', function() {

      var north1 = $('.newTR5 #north1').val();
	  
      var north2 = $('.newTR5 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR5 #north3').val(north31);
	  
	  var north4 = $('.newTR5 #north4').val();
	  
      var north5 = $('.newTR5 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR5 #north6').val(north61);
	  
	  var north7 = $('.newTR5 #north7').val();
	  
      var north8 = $('.newTR5 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR5 #north9').val(north91);
	  
	  
      var south1 = $('.newTR5 #south1').val();
	  
      var south2 = $('.newTR5 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR5 #south3').val(south31);
	  
	  var south4 = $('.newTR5 #south4').val();
	  
      var south5 = $('.newTR5 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR5 #south6').val(south61);
	  
	  var south7 = $('.newTR5 #south7').val();
	  
      var south8 = $('.newTR5 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR5 #south9').val(south91);	  
	  
	  var west1 = $('.newTR5 #west1').val();
	  
      var west2 = $('.newTR5 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR5 #west3').val(west31);
	  
	  var west4 = $('.newTR5 #west4').val();
	  
      var west5 = $('.newTR5 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR5 #west6').val(west61);
	  
	  var west7 = $('.newTR5 #west7').val();
	  
      var west8 = $('.newTR5 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR5 #west9').val(west91);
	  
	  var east1 = $('.newTR5 #east1').val();
	  
      var east2 = $('.newTR5 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR5 #east3').val(east31);
	  
	  var east4 = $('.newTR5 #east4').val();
	  
      var east5 = $('.newTR5 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR5 #east6').val(east61);
	  
	  var east7 = $('.newTR5 #east7').val();
	  
      var east8 = $('.newTR5 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR5 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(east31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)+parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR5 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(east61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)+parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR5 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(east91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)+parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR5 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	  
	  else if(estent1!='0.00')
	  {
	  var estentotal = Math.min(estent1);	  
	  }
	   else if(estent2!='0.00')
	  {
	  var estentotal = Math.min(estent2);	  
	  }
	   else if(estent3!='0.00')
	  {
	  var estentotal = Math.min(estent3);	  
	  }
	  
	  
	  
	  var anyarea = $('.newTR5 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR5 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR5 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR5 #totallandvalue').val(totallandvalue);
	 
	
    
 }); 
 
 
 ///////////////// end 
 
 
	  
	
    });
	

 $(document).on('click', '#remove_more', function() { 
      var rr = $(this).attr('class');


       var newclass=rr.replace("d", "");
	
	   $('.'+newclass).remove();
	  
	   return false;
    });  
	  


  $('.newTR1 input').on('blur', function() {

      var north1 = $('.newTR1 #north1').val();
	  
      var north2 = $('.newTR1 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR1 #north3').val(north31);
	  
	  var north4 = $('.newTR1 #north4').val();
	  
      var north5 = $('.newTR1 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR1 #north6').val(north61);
	  
	  var north7 = $('.newTR1 #north7').val();
	  
      var north8 = $('.newTR1 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR1 #north9').val(north91);
	  
	  
      var south1 = $('.newTR1 #south1').val();
	  
      var south2 = $('.newTR1 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR1 #south3').val(south31);
	  
	  var south4 = $('.newTR1 #south4').val();
	  
      var south5 = $('.newTR1 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR1 #south6').val(south61);
	  
	  var south7 = $('.newTR1 #south7').val();
	  
      var south8 = $('.newTR1 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR1 #south9').val(south91);	  
	  
	  var west1 = $('.newTR1 #west1').val();
	  
      var west2 = $('.newTR1 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR1 #west3').val(west31);
	  
	  var west4 = $('.newTR1 #west4').val();
	  
      var west5 = $('.newTR1 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR1 #west6').val(west61);
	  
	  var west7 = $('.newTR1 #west7').val();
	  
      var west8 = $('.newTR1 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR1 #west9').val(west91);
	  
	  var east1 = $('.newTR1 #east1').val();
	  
      var east2 = $('.newTR1 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR1 #east3').val(east31);
	  
	  var east4 = $('.newTR1 #east4').val();
	  
      var east5 = $('.newTR1 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR1 #east6').val(east61);
	  
	  var east7 = $('.newTR1 #east7').val();
	  
      var east8 = $('.newTR1 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR1 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR1 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR1 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	 
	  
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR1 #estent3').val(estent3);
	  
	  if((estent1!='0.00') && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	  
	  else if(estent1!='0.00')
	  {
	  var estentotal = Math.min(estent1);	  
	  }
	   else if(estent2!='0.00')
	  {
	  var estentotal = Math.min(estent2);	  
	  }
	   else if(estent3!='0.00')
	  {
	  var estentotal = Math.min(estent3);	  
	  }
	  
	  
	  
	  var anyarea = $('.newTR1 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR1 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR1 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR1 #totallandvalue').val(totallandvalue);
	 

    
 });


	
  });

  


  
	
	




</script>