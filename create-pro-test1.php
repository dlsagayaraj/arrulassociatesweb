<?php
include("config.php");
include('mobile_detect.php');
$detect = new Mobile_Detect();
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
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


 
$bank=mysqli_real_escape_string($conn,$_POST['bank']); 
$date=$_POST['date']; 
$loanAmount=$_POST['loanAmount']; 
$inspected=mysqli_real_escape_string($conn,$_POST['inspected']); 
$companyName=mysqli_real_escape_string($conn,$_POST['companyName']); 
$advanceAmount=$_POST['advanceAmount']; 
$first_cap=implode("--,",$_POST['first_cap']); 
$ownerAddress=mysqli_real_escape_string($conn,implode("--,",$_POST['ownerAddress']));
$second_cap=implode("--,",$_POST['second_cap']);
$ownerAddress1=mysqli_real_escape_string($conn,implode("--,",$_POST['ownerAddress1']));
$purchaseAddress=mysqli_real_escape_string($conn,$_POST['purchaseAddress']); 
$odoorno=mysqli_real_escape_string($conn,$_POST['odoorno']); 
$ostreet=mysqli_real_escape_string($conn,$_POST['ostreet']); 
$oarea=mysqli_real_escape_string($conn,$_POST['oarea']); 
$opost=mysqli_real_escape_string($conn,$_POST['opost']); 
$otaluk=mysqli_real_escape_string($conn,$_POST['otaluk']); 
$odistrict=mysqli_real_escape_string($conn,$_POST['odistrict']); 
$pdoorno=mysqli_real_escape_string($conn,$_POST['pdoorno']); 
$pstreet=mysqli_real_escape_string($conn,$_POST['pstreet']); 
$parea=mysqli_real_escape_string($conn,$_POST['parea']); 
$pvillage=mysqli_real_escape_string($conn,$_POST['pvillage']); 
$ptaluk=mysqli_real_escape_string($conn,$_POST['ptaluk']); 
$pdistrict=mysqli_real_escape_string($conn,$_POST['pdistrict']); 
$opincode=mysqli_real_escape_string($conn,$_POST['opincode']); 
$ocontact=mysqli_real_escape_string($conn,$_POST['ocontact']); 



$propertydoorno=mysqli_real_escape_string($conn,$_POST['propertydoorno']); 
$rsfno=mysqli_real_escape_string($conn,$_POST['rsfno']); 
$propertystreet=mysqli_real_escape_string($conn,$_POST['propertystreet']); 
$pattano=mysqli_real_escape_string($conn,$_POST['pattano']); 
$propertyarea=mysqli_real_escape_string($conn,$_POST['propertyarea']); 
$blockno=mysqli_real_escape_string($conn,$_POST['blockno']); 
$propertyvillage=mysqli_real_escape_string($conn,$_POST['propertyvillage']); 
$tsno=mysqli_real_escape_string($conn,$_POST['tsno']); 
$propertytaluk=mysqli_real_escape_string($conn,$_POST['propertytaluk']); 
$sro=mysqli_real_escape_string($conn,$_POST['sro']); 
$propertydistict=mysqli_real_escape_string($conn,$_POST['propertydistict']); 
$plotno=mysqli_real_escape_string($conn,$_POST['plotno']); 
$propertycellno=mysqli_real_escape_string($conn,$_POST['propertycellno']); 
$pincode=mysqli_real_escape_string($conn,$_POST['pincode']); 
$landmark=mysqli_real_escape_string($conn,$_POST['landmark']); 
$propertyoccupied=mysqli_real_escape_string($conn,$_POST['propertyoccupied']); 
$nearestbustop=mysqli_real_escape_string($conn,$_POST['nearestbustop']); 
$taxreceipt=mysqli_real_escape_string($conn,$_POST['taxreceipt']);  
$ebserviceno=mysqli_real_escape_string($conn,$_POST['ebserviceno']); 
$pattadtcp=mysqli_real_escape_string($conn,$_POST['pattadtcp']); 
$nearestmainroad=mysqli_real_escape_string($conn,$_POST['nearestmainroad']); 
$approvalplan=mysqli_real_escape_string($conn,$_POST['approvalplan']); 
$civilamenities=mysqli_real_escape_string($conn,$_POST['civilamenities']); 
$hdline=mysqli_real_escape_string($conn,$_POST['hdline']); 
 $residentialautofill=mysqli_real_escape_string($conn,$_POST['residentialautofill']);

$oldsfno=mysqli_real_escape_string($conn,$_POST['oldsfno']); 
$sfno=mysqli_real_escape_string($conn,$_POST['sfno']);
$pymashno=mysqli_real_escape_string($conn,$_POST['pymashno']);
$wardno=mysqli_real_escape_string($conn,$_POST['wardno']);



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



$edit_id=base64_decode($_REQUEST['stepid']);
$northboundary=mysqli_real_escape_string($conn,implode(",",$_POST['northboundary'])); 
$southboundary=mysqli_real_escape_string($conn,implode(",",$_POST['southboundary'])); 
$northdimensions=mysqli_real_escape_string($conn,$_POST['northdimensions']); 
$southdimensions=mysqli_real_escape_string($conn,$_POST['southdimensions']); 
$northremarks=mysqli_real_escape_string($conn,$_POST['northremarks']); 
$southremarks=mysqli_real_escape_string($conn,$_POST['southremarks']); 
$eastboundary=mysqli_real_escape_string($conn,implode(",",$_POST['eastboundary'])); 
$westboundary=mysqli_real_escape_string($conn,implode(",",$_POST['westboundary'])); 
$eastdimensions=mysqli_real_escape_string($conn,$_POST['eastdimensions']); 
$westdimensions=mysqli_real_escape_string($conn,$_POST['westdimensions']); 
$eastremarks=mysqli_real_escape_string($conn,$_POST['eastremarks']); 
$westremarks=mysqli_real_escape_string($conn,$_POST['westremarks']); 
$extent_of_site=mysqli_real_escape_string($conn,$_POST['extent_of_site']); 
$typeofproperty=mysqli_real_escape_string($conn,implode(",",$_POST['typeofproperty'])); 
$sizeofplot=mysqli_real_escape_string($conn,implode(",",$_POST['sizeofplot'])); 
$recentdevelopmentsnear=mysqli_real_escape_string($conn,implode(",",$_POST['recentdevelopmentsnear'])); 
$resentsaledetails=mysqli_real_escape_string($conn,implode(",",$_POST['resentsaledetails'])); 
$prevailingmarketratefrom=mysqli_real_escape_string($conn,implode(",",$_POST['prevailingmarketratefrom'])); 
$classofconstruction=mysqli_real_escape_string($conn,implode(",",$_POST['classofconstruction'])); 
$roof=mysqli_real_escape_string($conn,implode(",",$_POST['roof'])); 
$roof1=mysqli_real_escape_string($conn,implode(",",$_POST['roof1'])); 
$roof2=mysqli_real_escape_string($conn,implode(",",$_POST['roof2'])); 
$roof3=mysqli_real_escape_string($conn,implode(",",$_POST['roof3'])); 
$roof4=mysqli_real_escape_string($conn,implode(",",$_POST['roof4'])); 
$roof5=mysqli_real_escape_string($conn,implode(",",$_POST['roof5'])); 
$limits=mysqli_real_escape_string($conn,implode(",",$_POST['limits'])); 
$prevailingmarketrateto=mysqli_real_escape_string($conn,$_POST['prevailingmarketrateto']); 



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
$estent=implode(",",$_POST['estent']);
$estent1=implode(",",$_POST['estent1']);
$estent2=implode(",",$_POST['estent2']);
$estent3=implode(",",$_POST['estent3']);
$anyarea=implode(",",$_POST['anyarea']);
$dimensionsite=implode(",",$_POST['dimensionsite']);
$totalarea=implode(",",$_POST['totalarea']);
$totalrate=implode(",",$_POST['totalrate']);
$totallandvalue=implode(",",$_POST['totallandvalue']);
$sale_details=implode(",",$_POST['sale_details']);
$sale_from=implode(",",$_POST['sale_from']);
$sale_to=implode(",",$_POST['sale_to']);
$sale_type=implode(",",$_POST['sale_type']);

$guide_rate=implode(",",$_POST['guide_rate']);
$guideselect=implode(",",$_POST['guideselect']);
$guidevalue=implode(",",$_POST['guidevalue']);

$guideupload=implode(",",$_FILES['guideupload']['name']);

$countfiles = count($_FILES['guideupload']['name']);

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['guideupload']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['guideupload']['tmp_name'][$i],'documents/guide/'.$filename);

 }



$distanceofbranch=mysqli_real_escape_string($conn,$_POST['distanceofbranch']);
$distanceofrs=mysqli_real_escape_string($conn,$_POST['distanceofrs']); 
$guideline_rate=mysqli_real_escape_string($conn,$_POST['guideline_rate']); 
$totalareaval=mysqli_real_escape_string($conn,$_POST['totalareaval']); 
$market_value=mysqli_real_escape_string($conn,$_POST['market_value']); 
$reasonable_perce1=mysqli_real_escape_string($conn,$_POST['reasonable_perce1']); 
$reasonable_perce=mysqli_real_escape_string($conn,$_POST['reasonable_perce']); 
$reasonable_value=mysqli_real_escape_string($conn,$_POST['reasonable_value']); 
$forced_percen1=mysqli_real_escape_string($conn,$_POST['forced_percen1']); 
$forced_percen=mysqli_real_escape_string($conn,$_POST['forced_percen']); 
$forced_value=mysqli_real_escape_string($conn,$_POST['forced_value']); 
$guideline_value=mysqli_real_escape_string($conn,$_POST['guideline_value']); 
$propertypincode=mysqli_real_escape_string($conn,$_POST['propertypincode']); 

$taxreceipt_name=mysqli_real_escape_string($conn,$_POST['taxreceipt_name']); 
$ebserviceno_name=mysqli_real_escape_string($conn,$_POST['ebserviceno_name']); 
$pattadtcp_name=mysqli_real_escape_string($conn,$_POST['pattadtcp_name']); 
$approvalplan_name=mysqli_real_escape_string($conn,$_POST['approvalplan_name']); 
$hdline_name=mysqli_real_escape_string($conn,$_POST['hdline_name']); 

$pattavisible=mysqli_real_escape_string($conn,$_POST['pattavisible']); 
$documentvisible=mysqli_real_escape_string($conn,$_POST['documentvisible']); 

$land_description=mysqli_real_escape_string($conn,implode(",",$_POST['land_description'])); 


$report_name=mysqli_real_escape_string($conn,$_POST['report_name']); 

$count = mysqli_query($conn,"SELECT * FROM `project_details` where bank like '%$bank%' and  date='$date' and  companyName='$companyName'  and  ownerAddress='$ownerAddress' and  purchaseAddress='$purchaseAddress' and  inspected='$inspected' and  date_time='$date_time'"); 
$total_count=mysqli_num_rows($count);
if($total_count>='1')
{
$message='fail';
$alert="Data Already Exist.";	
}
else
{
	

	
     $query = "insert into project_details(guideupload,guide_rate,guideselect,guidevalue,sale_details,estent,sale_from,sale_to,sale_type,report_name,land_description,pattavisible,documentvisible,taxreceipt_name,ebserviceno_name,pattadtcp_name,approvalplan_name,hdline_name,propertypincode,ocontact,opincode,bank,parea,date,loanAmount,inspected,companyName,advanceAmount,first_cap,second_cap,ownerAddress,ownerAddress1,purchaseAddress,odoorno,ostreet,oarea,opost,otaluk,odistrict,pdoorno,pstreet,pvillage,ptaluk,pdistrict,wardno,pymashno,sfno,oldsfno,residentialautofill,propertydoorno,rsfno,propertystreet,pattano,propertyarea,blockno,propertyvillage,tsno,propertytaluk,sro,propertydistict,plotno,propertycellno,pincode,landmark,propertyoccupied,nearestbustop,taxreceipt,taxreceiptfile,ebserviceno,ebservicenofile,distanceofrs,distanceofbranch,pattadtcp,pattadtcpfile,nearestmainroad,approvalplan,approvalplanfile,civilamenities,hdline,hdlinefile,guideline_value,forced_value,forced_percen,forced_percen1,reasonable_value,reasonable_perce,reasonable_perce1,guideline_rate,totalareaval,market_value,north1,north2,north3,north4,north5,north6,north7,north8,north9,south1,south2,south3,south4,south5,south6,south7,south8,south9,east1,east2,east3,east4,east5,east6,east7,east8,east9,west1,west2,west3,west4,west5,west6,west7,west8,west9,estent1,estent2,estent3,anyarea,dimensionsite,totalarea,totalrate,totallandvalue,prevailingmarketrateto,northboundary,southboundary,northdimensions,southdimensions,northremarks,southremarks,eastboundary,westboundary,eastdimensions,westdimensions,eastremarks,westremarks,extent_of_site,typeofproperty,sizeofplot,recentdevelopmentsnear,resentsaledetails,prevailingmarketratefrom,classofconstruction,roof,roof1,roof2,roof3,roof4,roof5,limits,date_time,log_id) values ('$guideupload','$guide_rate','$guideselect','$guidevalue','$sale_details','$estent','$sale_from','$sale_to','$sale_type','$report_name','$land_description','$pattavisible','$documentvisible','$taxreceipt_name','$ebserviceno_name','$pattadtcp_name','$approvalplan_name','$hdline_name','$propertypincode','$ocontact','$opincode','$bank','$parea','$date','$loanAmount','$inspected','$companyName','$advanceAmount','$first_cap','$second_cap','$ownerAddress','$ownerAddress1','$purchaseAddress','$odoorno','$ostreet','$oarea','$opost','$otaluk','$odistrict','$pdoorno','$pstreet','$pvillage','$ptaluk','$pdistrict','$wardno','$pymashno','$sfno','$oldsfno','$residentialautofill','$propertydoorno','$rsfno','$propertystreet','$pattano','$propertyarea','$blockno','$propertyvillage','$tsno','$propertytaluk','$sro','$propertydistict','$plotno','$propertycellno','$pincode','$landmark','$propertyoccupied','$nearestbustop','$taxreceipt','$taxreceiptfile','$ebserviceno','$ebservicenofile','$distanceofrs','$distanceofbranch','$pattadtcp','$pattadtcpfile','$nearestmainroad','$approvalplan','$approvalplanfile','$civilamenities','$hdline','$hdlinefile','$guideline_value','$forced_value','$forced_percen','$forced_percen1','$reasonable_value','$reasonable_perce','$reasonable_perce1','$guideline_rate','$totalareaval','$market_value','$north1','$north2','$north3','$north4','$north5','$north6','$north7','$north8','$north9','$south1','$south2','$south3','$south4','$south5','$south6','$south7','$south8','$south9','$east1','$east2','$east3','$east4','$east5','$east6','$east7','$east8','$east9','$west1','$west2','$west3','$west4','$west5','$west6','$west7','$west8','$west9','$estent1','$estent2','$estent3','$anyarea','$dimensionsite','$totalarea','$totalrate','$totallandvalue','$prevailingmarketrateto','$northboundary','$southboundary','$northdimensions','$southdimensions','$northremarks','$southremarks','$eastboundary','$westboundary','$eastdimensions','$westdimensions','$eastremarks','$westremarks','$extent_of_site','$typeofproperty','$sizeofplot','$recentdevelopmentsnear','$resentsaledetails','$prevailingmarketratefrom','$classofconstruction','$roof','$roof1','$roof2','$roof3','$roof4','$roof5','$limits','$date_time','$log_id')";
 

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

if(isset($_REQUEST['save']))
{
	
    echo "<script> window.location.href = 'create-project?step=step1&stepsave=Yes&stepid=$insid'</script>";
	

}




if(isset($_REQUEST['next']))
{
	
    echo "<script> window.location.href = 'create-project?step=step4&stepid=$insid'</script>";
	

}




}
}







}
elseif($edit_id=='/create-project?step=step4')
{
if(isset($_REQUEST['step4']))
{		
$typeofconstruction=$_POST['typeofconstruction']; 
$nooffloor=$_POST['nooffloor']; 
$maintenanceofthebuilding=$_POST['maintenanceofthebuilding']; 
$watersupplyarrangements=implode(",",$_POST['watersupplyarrangements']); 
$watersupplyarrangementsyes=$_POST['watersupplyarrangementsyes']; 
$drainagearrangements=$_POST['drainagearrangements']; 
$drainagearrangementsyes=$_POST['drainagearrangementsyes']; 
$characteroflocality=$_POST['characteroflocality']; 
$roadfacilities=$_POST['roadfacilities']; 
$cornerplotintermittentplot=$_POST['cornerplotintermittentplot']; 
$floorfinishing=$_POST['floorfinishing']; 
$joineries=implode(",",$_POST['joineries']); 
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

$floorselect=implode(",",$_POST['floorselect']);
$floorfinish=implode(",",$_POST['floorfinish']);
$roofingselect=implode(",",$_POST['roofingselect']);



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
$percentage=implode(",",$_POST['percentage']);
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
$percentage1=implode(",",$_POST['percentage1']);
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
$percentage2=implode(",",$_POST['percentage2']);
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
$percentage3=implode(",",$_POST['percentage3']);
$roofselect3=implode(",",$_POST['roofselect3']);
$deprciation3=implode(",",$_POST['deprciation3']);
$total3=implode(",",$_POST['total3']);
$overalltotal3=$_POST['overalltotal3'];

$generalvisible=$_POST['generalvisible'];
$servicevisible=$_POST['servicevisible'];

$compoundwallrate=$_POST['compoundwallrate'];

$ebdep1=$_POST['ebdep1'];
$ebdep2=$_POST['ebdep2'];
$ebdep3=$_POST['ebdep3'];

$pavertype=implode(",",$_POST['pavertype']);

$query = "insert into project_details(floorselect,floorfinish,roofingselect,ebdep1,pavertype,ebdep2,ebdep3,typeofconstruction,generalvisible,servicevisible,roadfacilitiesyes,nooffloor,maintenanceofthebuilding,watersupplyarrangements,watersupplyarrangementsyes,drainagearrangements,drainagearrangementsyes,characteroflocality,roadfacilities,cornerplotintermittentplot,floorfinishing,joineries,watersupplyarrangementsRs,drainagearrangementsRs,compoundwallL,compoundwallH,compoundwallrate,compoundwallRs,ebdepositI,ebdepositIII,ebdepositRs,paverrs,cementrs,tilesrs,sump,oht,sumpohtRs,interiorworkRs,openstaircaseRs,serviceovertotal,sintex,compoundwallL1,compoundwallL2,compoundwallH1,compoundwallH2,date_time,log_id) values ('$floorselect','$floorfinish','$roofingselect','$ebdep1','$pavertype','$ebdep2','$ebdep3','$typeofconstruction','$generalvisible','$servicevisible','$roadfacilitiesyes','$nooffloor','$maintenanceofthebuilding','$watersupplyarrangements','$watersupplyarrangementsyes','$drainagearrangements','$drainagearrangementsyes','$characteroflocality','$roadfacilities','$cornerplotintermittentplot','$floorfinishing','$joineries','$watersupplyarrangementsRs','$drainagearrangementsRs','$compoundwallL','$compoundwallH','$compoundwallrate','$compoundwallRs','$ebdepositI','$ebdepositIII','$ebdepositRs','$paverrs','$cementrs','$tilesrs','$sump','$oht','$sumpohtRs','$interiorworkRs','$openstaircaseRs','$serviceovertotal','$sintex','$compoundwallL1','$compoundwallL2','$compoundwallH1','$compoundwallH2','$date_time','$log_id')";


$inserted = mysqli_query($conn, $query);

$ins=mysqli_insert_id($conn);

 //$sql2 = "DELETE FROM project_table WHERE project_id='$edit_id'";
//$retval = mysqli_query($conn, $sql2);
$insid=base64_encode($ins);

    $query2 = "insert into project_table(project_id,desc_prop,lengtha,lengthb,length,breadtha,breadthb,breadth,area,rate,year,percentage,roofselect,deprciation,total,overalltotal,desc_prop1,lengtha1,lengthb1,length1,breadtha1,breadthb1,breadth1,area1,rate1,year1,percentage1,roofselect1,deprciation1,total1,overalltotal1,desc_prop2,lengtha2,lengthb2,length2,breadtha2,breadthb2,breadth2,area2,rate2,year2,percentage2,roofselect2,deprciation2,total2,overalltotal2,desc_prop3,lengtha3,lengthb3,length3,breadtha3,breadthb3,breadth3,area3,rate3,year3,percentage3,roofselect3,deprciation3,total3,overalltotal3,date_time,log_id) values ('$ins','$desc_prop','$lengtha','$lengthb','$length','$breadtha','$breadthb','$breadth','$area','$rate','$year','$percentage','$roofselect','$deprciation','$total','$overalltotal','$desc_prop1','$lengtha1','$lengthb1','$length1','$breadtha1','$breadthb1','$breadth1','$area1','$rate1','$year1','$percentage1','$roofselect1','$deprciation1','$total1','$overalltotal1','$desc_prop2','$lengtha2','$lengthb2','$length2','$breadtha2','$breadthb2','$breadth2','$area2','$rate2','$year2','$percentage2','$roofselect2','$deprciation2','$total2','$overalltotal2','$desc_prop3','$lengtha3','$lengthb3','$length3','$breadtha3','$breadthb3','$breadth3','$area3','$rate3','$year3','$percentage3','$roofselect3','$deprciation3','$total3','$overalltotal3','$date_time','$log_id')";
 $inserted2 = mysqli_query($conn, $query2);





if($inserted=='1')	
{
$alert="Succesfully Inserted.";
$message="Success";	
}	
	

if(isset($_REQUEST['save']))
{
	
    echo "<script> window.location.href = 'create-project?step=step4&stepsave=Yes&stepid=$insid'</script>";
	

}



$insid=$_REQUEST['stepid'];
if(isset($_REQUEST['prev']))
{
	
    echo "<script> window.location.href = 'create-project?step=step1&&stepid=$insid'</script>";
	

}

}
	
}

else
{
	
if(isset($_REQUEST['step1']))
{	


$edit_id=base64_decode($_REQUEST['stepid']);

 
$bank=mysqli_real_escape_string($conn,$_POST['bank']); 
$date=$_POST['date']; 
$loanAmount=$_POST['loanAmount']; 
$inspected=mysqli_real_escape_string($conn,$_POST['inspected']); 
$companyName=mysqli_real_escape_string($conn,$_POST['companyName']); 
$advanceAmount=$_POST['advanceAmount']; 
$first_cap=implode("--,",$_POST['first_cap']); 
$ownerAddress=mysqli_real_escape_string($conn,implode("--,",$_POST['ownerAddress']));
$second_cap=implode("--,",$_POST['second_cap']);
$ownerAddress1=mysqli_real_escape_string($conn,implode("--,",$_POST['ownerAddress1']));
$purchaseAddress=mysqli_real_escape_string($conn,$_POST['purchaseAddress']); 
$odoorno=mysqli_real_escape_string($conn,$_POST['odoorno']); 
$ostreet=mysqli_real_escape_string($conn,$_POST['ostreet']); 
$oarea=mysqli_real_escape_string($conn,$_POST['oarea']); 
$opost=mysqli_real_escape_string($conn,$_POST['opost']); 
$otaluk=mysqli_real_escape_string($conn,$_POST['otaluk']); 
$odistrict=mysqli_real_escape_string($conn,$_POST['odistrict']); 
$pdoorno=mysqli_real_escape_string($conn,$_POST['pdoorno']); 
$pstreet=mysqli_real_escape_string($conn,$_POST['pstreet']); 
$parea=mysqli_real_escape_string($conn,$_POST['parea']); 
$pvillage=mysqli_real_escape_string($conn,$_POST['pvillage']); 
$ptaluk=mysqli_real_escape_string($conn,$_POST['ptaluk']); 
$pdistrict=mysqli_real_escape_string($conn,$_POST['pdistrict']); 
$opincode=mysqli_real_escape_string($conn,$_POST['opincode']); 
$ocontact=mysqli_real_escape_string($conn,$_POST['ocontact']); 



$propertydoorno=mysqli_real_escape_string($conn,$_POST['propertydoorno']); 
$rsfno=mysqli_real_escape_string($conn,$_POST['rsfno']); 
$propertystreet=mysqli_real_escape_string($conn,$_POST['propertystreet']); 
$pattano=mysqli_real_escape_string($conn,$_POST['pattano']); 
$propertyarea=mysqli_real_escape_string($conn,$_POST['propertyarea']); 
$blockno=mysqli_real_escape_string($conn,$_POST['blockno']); 
$propertyvillage=mysqli_real_escape_string($conn,$_POST['propertyvillage']); 
$tsno=mysqli_real_escape_string($conn,$_POST['tsno']); 
$propertytaluk=mysqli_real_escape_string($conn,$_POST['propertytaluk']); 
$sro=mysqli_real_escape_string($conn,$_POST['sro']); 
$propertydistict=mysqli_real_escape_string($conn,$_POST['propertydistict']); 
$plotno=mysqli_real_escape_string($conn,$_POST['plotno']); 
$propertycellno=mysqli_real_escape_string($conn,$_POST['propertycellno']); 
$pincode=mysqli_real_escape_string($conn,$_POST['pincode']); 
$landmark=mysqli_real_escape_string($conn,$_POST['landmark']); 
$propertyoccupied=mysqli_real_escape_string($conn,$_POST['propertyoccupied']); 
$nearestbustop=mysqli_real_escape_string($conn,$_POST['nearestbustop']); 
$taxreceipt=mysqli_real_escape_string($conn,$_POST['taxreceipt']);  
$ebserviceno=mysqli_real_escape_string($conn,$_POST['ebserviceno']); 
$pattadtcp=mysqli_real_escape_string($conn,$_POST['pattadtcp']); 
$nearestmainroad=mysqli_real_escape_string($conn,$_POST['nearestmainroad']); 
$approvalplan=mysqli_real_escape_string($conn,$_POST['approvalplan']); 
$civilamenities=mysqli_real_escape_string($conn,$_POST['civilamenities']); 
$hdline=mysqli_real_escape_string($conn,$_POST['hdline']); 
 $residentialautofill=mysqli_real_escape_string($conn,$_POST['residentialautofill']);

$oldsfno=mysqli_real_escape_string($conn,$_POST['oldsfno']); 
$sfno=mysqli_real_escape_string($conn,$_POST['sfno']);
$pymashno=mysqli_real_escape_string($conn,$_POST['pymashno']);
$wardno=mysqli_real_escape_string($conn,$_POST['wardno']);


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


$edit_id=base64_decode($_REQUEST['stepid']);
$northboundary=mysqli_real_escape_string($conn,implode(",",$_POST['northboundary'])); 
$southboundary=mysqli_real_escape_string($conn,implode(",",$_POST['southboundary'])); 
$northdimensions=mysqli_real_escape_string($conn,$_POST['northdimensions']); 
$southdimensions=mysqli_real_escape_string($conn,$_POST['southdimensions']); 
$northremarks=mysqli_real_escape_string($conn,$_POST['northremarks']); 
$southremarks=mysqli_real_escape_string($conn,$_POST['southremarks']); 
$eastboundary=mysqli_real_escape_string($conn,implode(",",$_POST['eastboundary'])); 
$westboundary=mysqli_real_escape_string($conn,implode(",",$_POST['westboundary'])); 
$eastdimensions=mysqli_real_escape_string($conn,$_POST['eastdimensions']); 
$westdimensions=mysqli_real_escape_string($conn,$_POST['westdimensions']); 
$eastremarks=mysqli_real_escape_string($conn,$_POST['eastremarks']); 
$westremarks=mysqli_real_escape_string($conn,$_POST['westremarks']); 
$extent_of_site=mysqli_real_escape_string($conn,$_POST['extent_of_site']); 
$typeofproperty=mysqli_real_escape_string($conn,implode(",",$_POST['typeofproperty'])); 
$sizeofplot=mysqli_real_escape_string($conn,implode(",",$_POST['sizeofplot'])); 
$recentdevelopmentsnear=mysqli_real_escape_string($conn,implode(",",$_POST['recentdevelopmentsnear'])); 
$resentsaledetails=mysqli_real_escape_string($conn,implode(",",$_POST['resentsaledetails'])); 
$prevailingmarketratefrom=mysqli_real_escape_string($conn,implode(",",$_POST['prevailingmarketratefrom'])); 
$classofconstruction=mysqli_real_escape_string($conn,implode(",",$_POST['classofconstruction'])); 
$roof=mysqli_real_escape_string($conn,implode(",",$_POST['roof'])); 
$roof1=mysqli_real_escape_string($conn,implode(",",$_POST['roof1'])); 
$roof2=mysqli_real_escape_string($conn,implode(",",$_POST['roof2'])); 
$roof3=mysqli_real_escape_string($conn,implode(",",$_POST['roof3'])); 
$roof4=mysqli_real_escape_string($conn,implode(",",$_POST['roof4'])); 
$roof5=mysqli_real_escape_string($conn,implode(",",$_POST['roof5'])); 
$limits=mysqli_real_escape_string($conn,implode(",",$_POST['limits'])); 
$prevailingmarketrateto=mysqli_real_escape_string($conn,$_POST['prevailingmarketrateto']); 



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
$estent=implode(",",$_POST['estent']);
$estent1=implode(",",$_POST['estent1']);
$estent2=implode(",",$_POST['estent2']);
$estent3=implode(",",$_POST['estent3']);
$anyarea=implode(",",$_POST['anyarea']);
$dimensionsite=implode(",",$_POST['dimensionsite']);
$totalarea=implode(",",$_POST['totalarea']);
$totalrate=implode(",",$_POST['totalrate']);
$totallandvalue=implode(",",$_POST['totallandvalue']);
$sale_details=implode(",",$_POST['sale_details']);
$sale_from=implode(",",$_POST['sale_from']);
$sale_to=implode(",",$_POST['sale_to']);
$sale_type=implode(",",$_POST['sale_type']);

$guide_rate=implode(",",$_POST['guide_rate']);
$guideselect=implode(",",$_POST['guideselect']);
$guidevalue=implode(",",$_POST['guidevalue']);

 $guideupload=implode(",",$_FILES['guideupload']['name']);

 $countfiles = count($_FILES['guideupload']['name']);
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['guideupload']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['guideupload']['tmp_name'][$i],'documents/guide/'.$filename);

 }


$distanceofbranch=mysqli_real_escape_string($conn,$_POST['distanceofbranch']);
$distanceofrs=mysqli_real_escape_string($conn,$_POST['distanceofrs']); 
$guideline_rate=mysqli_real_escape_string($conn,$_POST['guideline_rate']); 
$totalareaval=mysqli_real_escape_string($conn,$_POST['totalareaval']); 
$market_value=mysqli_real_escape_string($conn,$_POST['market_value']); 
$reasonable_perce1=mysqli_real_escape_string($conn,$_POST['reasonable_perce1']); 
$reasonable_perce=mysqli_real_escape_string($conn,$_POST['reasonable_perce']); 
$reasonable_value=mysqli_real_escape_string($conn,$_POST['reasonable_value']); 
$forced_percen1=mysqli_real_escape_string($conn,$_POST['forced_percen1']); 
$forced_percen=mysqli_real_escape_string($conn,$_POST['forced_percen']); 
$forced_value=mysqli_real_escape_string($conn,$_POST['forced_value']); 
$guideline_value=mysqli_real_escape_string($conn,$_POST['guideline_value']); 
$propertypincode=mysqli_real_escape_string($conn,$_POST['propertypincode']); 

$taxreceipt_name=mysqli_real_escape_string($conn,$_POST['taxreceipt_name']); 
$ebserviceno_name=mysqli_real_escape_string($conn,$_POST['ebserviceno_name']); 
$pattadtcp_name=mysqli_real_escape_string($conn,$_POST['pattadtcp_name']); 
$approvalplan_name=mysqli_real_escape_string($conn,$_POST['approvalplan_name']); 
$hdline_name=mysqli_real_escape_string($conn,$_POST['hdline_name']); 

$land_description=mysqli_real_escape_string($conn,implode(",",$_POST['land_description'])); 
$pattavisible=mysqli_real_escape_string($conn,$_POST['pattavisible']); 
$documentvisible=mysqli_real_escape_string($conn,$_POST['documentvisible']); 

$report_name=mysqli_real_escape_string($conn,$_POST['report_name']); 

if($guideupload!='')
{
 $query23 = "UPDATE `project_details` SET `guideupload`='$guideupload' where id='$edit_id'";


$inserted = mysqli_query($conn, $query23);
}

 $query = "UPDATE `project_details` SET `guide_rate`='$guide_rate',`guidevalue`='$guidevalue',`guideselect`='$guideselect',`sale_details`='$sale_details',`estent`='$estent',`sale_from`='$sale_from',`sale_to`='$sale_to',`report_name`='$report_name',`sale_type`='$sale_type',`land_description`='$land_description',`pattavisible`='$pattavisible',`documentvisible`='$documentvisible',`taxreceipt_name`='$taxreceipt_name',`ebserviceno_name`='$ebserviceno_name',`pattadtcp_name`='$pattadtcp_name',`approvalplan_name`='$approvalplan_name',`hdline_name`='$hdline_name',`opincode`='$opincode',`propertypincode`='$propertypincode',`ocontact`='$ocontact',`purchaseyes`='$purchaseyes',`bank`='$bank',`date`='$date',`loanAmount`='$loanAmount',`inspected`='$inspected',`companyName`='$companyName',`advanceAmount`='$advanceAmount',`first_cap`='$first_cap',`second_cap`='$second_cap',`ownerAddress`='$ownerAddress',`ownerAddress1`='$ownerAddress1',`purchaseAddress`='$purchaseAddress',`odoorno`='$odoorno',`ostreet`='$ostreet',`oarea`='$oarea',`opost`='$opost',`otaluk`='$otaluk',`odistrict`='$odistrict',`pdoorno`='$pdoorno',`pstreet`='$pstreet',`parea`='$parea',`pvillage`='$pvillage',`ptaluk`='$ptaluk',`pdistrict`='$pdistrict',`log_id`='$log_id',`date_time`='$date_time',`wardno`='$wardno',`pymashno`='$pymashno',`sfno`='$sfno',`oldsfno`='$oldsfno',`residentialautofill`='$residentialautofill',`propertydoorno`='$propertydoorno',`rsfno`='$rsfno',`propertystreet`='$propertystreet',`pattano`='$pattano',`propertyarea`='$propertyarea',`blockno`='$blockno',`propertyvillage`='$propertyvillage',`tsno`='$tsno',`propertytaluk`='$propertytaluk',`sro`='$sro',`propertydistict`='$propertydistict',`plotno`='$plotno',`propertycellno`='$propertycellno',`pincode`='$pincode',`landmark`='$landmark',`propertyoccupied`='$propertyoccupied',`nearestbustop`='$nearestbustop',`taxreceipt`='$taxreceipt',`taxreceiptfile`='$taxreceiptfile',`ebserviceno`='$ebserviceno',`ebservicenofile`='$ebservicenofile',`distanceofrs`='$distanceofrs',`distanceofbranch`='$distanceofbranch',`pattadtcp`='$pattadtcp',`pattadtcpfile`='$pattadtcpfile',`nearestmainroad`='$nearestmainroad',`approvalplan`='$approvalplan',`approvalplanfile`='$approvalplanfile',`civilamenities`='$civilamenities',`hdline`='$hdline',`hdlinefile`='$hdlinefile',`guideline_value`='$guideline_value',`forced_value`='$forced_value',`forced_percen`='$forced_percen',`forced_percen1`='$forced_percen1',`reasonable_value`='$reasonable_value',`reasonable_perce`='$reasonable_perce',`reasonable_perce1`='$reasonable_perce1',`guideline_rate`='$guideline_rate',`totalareaval`='$totalareaval',`market_value`='$market_value',`north1`='$north1',`north2`='$north2',`north3`='$north3',`north4`='$north4',`north5`='$north5',`north6`='$north6',`north7`='$north7',`north8`='$north8',`north9`='$north9',`south1`='$south1',`south2`='$south2',`south3`='$south3',`south4`='$south4',`south5`='$south5',`south6`='$south6',`south7`='$south7',`south8`='$south8',`south9`='$south9',`east1`='$east1',`east2`='$east2',`east3`='$east3',`east4`='$east4',`east5`='$east5',`east6`='$east6',`east7`='$east7',`east8`='$east8',`east9`='$east9',`west1`='$west1',`west2`='$west2',`west3`='$west3',`west4`='$west4',`west5`='$west5',`west6`='$west6',`west7`='$west7',`west8`='$west8',`west9`='$west9',`estent1`='$estent1',`estent2`='$estent2',`estent3`='$estent3',`anyarea`='$anyarea',`dimensionsite`='$dimensionsite',`totalarea`='$totalarea',`totalrate`='$totalrate',`totallandvalue`='$totallandvalue',`prevailingmarketrateto`='$prevailingmarketrateto',`northboundary`='$northboundary',`southboundary`='$southboundary',`northdimensions`='$northdimensions',`southdimensions`='$southdimensions',`northremarks`='$northremarks',`southremarks`='$southremarks',`eastboundary`='$eastboundary',`westboundary`='$westboundary',`eastdimensions`='$eastdimensions',`westdimensions`='$westdimensions',`eastremarks`='$eastremarks',`westremarks`='$westremarks',`extent_of_site`='$extent_of_site',`typeofproperty`='$typeofproperty',`sizeofplot`='$sizeofplot',`recentdevelopmentsnear`='$recentdevelopmentsnear',`resentsaledetails`='$resentsaledetails',`prevailingmarketratefrom`='$prevailingmarketratefrom',`classofconstruction`='$classofconstruction',`roof`='$roof',`roof1`='$roof1',`roof2`='$roof2',`roof3`='$roof3',`roof4`='$roof4',`roof5`='$roof5',`limits`='$limits' where id='$edit_id'";


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
	
    echo "<script> window.location.href = 'create-project?step=step4&&stepid=$insid'</script>";
	

}


}	
	
	

if(isset($_REQUEST['step4']))
{	
$edit_id=base64_decode($_REQUEST['stepid']);
$typeofconstruction=$_POST['typeofconstruction']; 
$nooffloor=$_POST['nooffloor']; 
$maintenanceofthebuilding=$_POST['maintenanceofthebuilding']; 
$watersupplyarrangements=implode(",",$_POST['watersupplyarrangements']); 
$watersupplyarrangementsyes=$_POST['watersupplyarrangementsyes']; 
$drainagearrangements=$_POST['drainagearrangements']; 
$drainagearrangementsyes=$_POST['drainagearrangementsyes']; 
$characteroflocality=$_POST['characteroflocality']; 
$roadfacilities=$_POST['roadfacilities']; 
$cornerplotintermittentplot=$_POST['cornerplotintermittentplot']; 
$floorfinishing=$_POST['floorfinishing']; 
$joineries=implode(",",$_POST['joineries']); 
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
$percentage=implode(",",$_POST['percentage']);
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
$percentage1=implode(",",$_POST['percentage1']);
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
$percentage2=implode(",",$_POST['percentage2']);
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
$percentage3=implode(",",$_POST['percentage3']);
$roofselect3=implode(",",$_POST['roofselect3']);
$deprciation3=implode(",",$_POST['deprciation3']);
$total3=implode(",",$_POST['total3']);
$overalltotal3=$_POST['overalltotal3'];

$generalvisible=$_POST['generalvisible'];
$servicevisible=$_POST['servicevisible'];

$compoundwallrate=$_POST['compoundwallrate'];

$ebdep1=$_POST['ebdep1'];
$ebdep2=$_POST['ebdep2'];
$ebdep3=$_POST['ebdep3'];

$floorselect=implode(",",$_POST['floorselect']);
$floorfinish=implode(",",$_POST['floorfinish']);
$roofingselect=implode(",",$_POST['roofingselect']);

$pavertype=implode(",",$_POST['pavertype']);

 $query = "UPDATE `project_details` SET `floorselect`='$floorselect',`floorfinish`='$floorfinish',`roofingselect`='$roofingselect',`ebdep1`='$ebdep1',`pavertype`='$pavertype',`ebdep2`='$ebdep2',`ebdep3`='$ebdep3',`typeofconstruction`='$typeofconstruction',`generalvisible`='$generalvisible',`servicevisible`='$servicevisible',`roadfacilitiesyes`='$roadfacilitiesyes',`nooffloor`='$nooffloor',`maintenanceofthebuilding`='$maintenanceofthebuilding',`watersupplyarrangements`='$watersupplyarrangements',`watersupplyarrangementsyes`='$watersupplyarrangementsyes',`drainagearrangements`='$drainagearrangements',`drainagearrangementsyes`='$drainagearrangementsyes',`characteroflocality`='$characteroflocality',`roadfacilities`='$roadfacilities',`cornerplotintermittentplot`='$cornerplotintermittentplot',`floorfinishing`='$floorfinishing',`joineries`='$joineries',`watersupplyarrangementsRs`='$watersupplyarrangementsRs',`drainagearrangementsRs`='$drainagearrangementsRs',`compoundwallL`='$compoundwallL',`compoundwallH`='$compoundwallH',`compoundwallrate`='$compoundwallrate',`compoundwallRs`='$compoundwallRs',`ebdepositI`='$ebdepositI',`ebdepositIII`='$ebdepositIII',`ebdepositRs`='$ebdepositRs',`paverrs`='$paverrs',`cementrs`='$cementrs',`tilesrs`='$tilesrs',`sump`='$sump',`oht`='$oht',`sumpohtRs`='$sumpohtRs',`interiorworkRs`='$interiorworkRs',`openstaircaseRs`='$openstaircaseRs',`log_id`='$log_id',`serviceovertotal`='$serviceovertotal',`sintex`='$sintex',`compoundwallL1`='$compoundwallL1',`compoundwallL2`='$compoundwallL2',`compoundwallH1`='$compoundwallH1',`compoundwallH2`='$compoundwallH2',`date_time`='$date_time' where id='$edit_id'";


$inserted = mysqli_query($conn, $query);


 $sql2 = "DELETE FROM project_table WHERE project_id='$edit_id'";
$retval = mysqli_query($conn, $sql2);


     $query2 = "insert into project_table(project_id,desc_prop,lengtha,lengthb,length,breadtha,breadthb,breadth,area,rate,year,percentage,roofselect,deprciation,total,overalltotal,desc_prop1,lengtha1,lengthb1,length1,breadtha1,breadthb1,breadth1,area1,rate1,year1,percentage1,roofselect1,deprciation1,total1,overalltotal1,desc_prop2,lengtha2,lengthb2,length2,breadtha2,breadthb2,breadth2,area2,rate2,year2,percentage2,roofselect2,deprciation2,total2,overalltotal2,desc_prop3,lengtha3,lengthb3,length3,breadtha3,breadthb3,breadth3,area3,rate3,year3,percentage3,roofselect3,deprciation3,total3,overalltotal3,date_time,log_id) values ('$edit_id','$desc_prop','$lengtha','$lengthb','$length','$breadtha','$breadthb','$breadth','$area','$rate','$year','$percentage','$roofselect','$deprciation','$total','$overalltotal','$desc_prop1','$lengtha1','$lengthb1','$length1','$breadtha1','$breadthb1','$breadth1','$area1','$rate1','$year1','$percentage1','$roofselect1','$deprciation1','$total1','$overalltotal1','$desc_prop2','$lengtha2','$lengthb2','$length2','$breadtha2','$breadthb2','$breadth2','$area2','$rate2','$year2','$percentage2','$roofselect2','$deprciation2','$total2','$overalltotal2','$desc_prop3','$lengtha3','$lengthb3','$length3','$breadtha3','$breadthb3','$breadth3','$area3','$rate3','$year3','$percentage3','$roofselect3','$deprciation3','$total3','$overalltotal3','$date_time','$log_id')";
 $inserted2 = mysqli_query($conn, $query2);





if($inserted=='1')	
{
$alert="Succesfully Updated.";
$message="Success";	
}

$insid=$_REQUEST['stepid'];
if(isset($_REQUEST['prev']))
{
	
    echo "<script> window.location.href = 'create-project?step=step1&&stepid=$insid'</script>";
	

}

}



}

$edit_id=base64_decode($_REQUEST['stepid']);

$project = mysqli_query($conn,"SELECT * FROM `project_details` where 1=1 and id='$edit_id' ");   
$project1 = mysqli_fetch_array($project);

?>




<style>

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
.select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single, .select2-container--default.select2-container--focus .select2-selection--multiple {
    height: 46px;
    border: none;
    border-bottom: 0px solid #9e9e9e;
    border-radius: 0;
    outline: 0;
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
   
}
.block {
    display: block;
}
input {
    width: 50%;
    display: inline-block;
}


.caret { display:none;}

.error{color:red;}

input {
     border: 1px solid #767676 !important;
    border-radius: 0px !important;
	    height: 2rem !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 34px;
    padding-left: 0;
     border: 1px solid #767676 !important;
    border-radius: 0px !important;
}
select {
 border: 1px solid #767676 !important;
    border-radius: 0px !important;	
}
.product input {
     border: 1px solid #767676 !important;
    border-radius: 0px !important;	
	 height: 2rem !important;
}
select {
    width: 100%;
    height: 3rem;
}	


.input-field>label {
    top: -5px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: rgba(48,48,48,.7);;
    line-height: 28px;
}
.input-field focus+label{
 color :black;
}
td, th {
    display: table-cell;
    padding: 1px 5px;
    text-align: left;
    vertical-align: middle;
    border-radius: 2px;
}
input:not([type]):focus.valid~label, input[type=date]:not(.browser-default):focus.valid~label, input[type=datetime-local]:not(.browser-default):focus.valid~label, input[type=datetime]:not(.browser-default):focus.valid~label, input[type=email]:not(.browser-default):focus.valid~label, input[type=number]:not(.browser-default):focus.valid~label, input[type=password]:not(.browser-default):focus.valid~label, input[type=search]:not(.browser-default):focus.valid~label, input[type=tel]:not(.browser-default):focus.valid~label, input[type=text]:not(.browser-default):focus.valid~label, input[type=time]:not(.browser-default):focus.valid~label, input[type=url]:not(.browser-default):focus.valid~label, textarea.materialize-textarea:focus.valid~label {
       color: rgba(48,48,48,.7);
}
input:not([type]):focus:not([readonly])+label, input[type=date]:not(.browser-default):focus:not([readonly])+label, input[type=datetime-local]:not(.browser-default):focus:not([readonly])+label, input[type=datetime]:not(.browser-default):focus:not([readonly])+label, input[type=email]:not(.browser-default):focus:not([readonly])+label, input[type=number]:not(.browser-default):focus:not([readonly])+label, input[type=password]:not(.browser-default):focus:not([readonly])+label, input[type=search]:not(.browser-default):focus:not([readonly])+label, input[type=tel]:not(.browser-default):focus:not([readonly])+label, input[type=text]:not(.browser-default):focus:not([readonly])+label, input[type=time]:not(.browser-default):focus:not([readonly])+label, input[type=url]:not(.browser-default):focus:not([readonly])+label, textarea.materialize-textarea:focus:not([readonly])+label{
       color: rgba(48,48,48,.7);
}

.divheight{
	height:32px !important;
	margin-top:12px;
}

.firstborder label:focus {
color:#21058f;
}

.firstborder input:focus + label {color: #21058f !important;}
.firstborder textarea:focus + label {color: #21058f !important;}
.firstborder select:focus + label {color: #21058f !important;}

.firstborder input:focus {
border:2px solid #21058f !important ;box-shadow:unset !important ;
}
.firstborder textarea:focus {
border:2px solid #21058f !important ;box-shadow:unset !important ;
}
.firstborder select:focus {
border:2px solid #21058f !important ;box-shadow:unset !important;
}


.secondborder input:focus + label {color: #f60707 !important;}
.secondborder textarea:focus + label {color: #f60707 !important;}
.secondborder select:focus + label {color: #f60707 !important;}

.secondborder input:focus {
border:2px solid #f60707 !important ;box-shadow:unset !important;
}
.secondborder textarea:focus {
border:2px solid #f60707 !important ;box-shadow:unset !important;
}
.secondborder select:focus {
border:2px solid #f60707 !important ;box-shadow:unset !important;
}



.thirdborder input:focus + label {color: #009933 !important;}
.thirdborder textarea:focus + label {color: #009933 !important;}
.thirdborder select:focus + label {color: #009933 !important;}

.thirdborder select:focus {
border:2px solid #009933 !important ;box-shadow:unset !important ;
}
.thirdborder input:focus {
border:2px solid #009933 !important ;box-shadow:unset !important  ;
}
.thirdborder textarea:focus {
border:2px solid #009933 !important ;box-shadow:unset !important  ;
}

.fourthborder input:focus + label {color: #05529f !important;}
.fourthborder textarea:focus + label {color: #05529f !important;}
.fourthborder select:focus + label {color: #05529f !important;}


.fourthborder select:focus {
border:1px solid #05529f !important ;box-shadow:unset !important ;
}
.fourthborder input:focus {
border:1px solid #05529f !important ;box-shadow:unset !important ;
}
.fourthborder textarea:focus {
border:1px solid #05529f !important ;box-shadow:unset !important ;
}

.fifthborder input:focus + label {color: #ff0080 !important;}
.fifthborder textarea:focus + label {color: #ff0080 !important;}
.fifthborder select:focus + label {color: #ff0080 !important;}

.fifthborder select:focus {
border:1px solid #ff0080 !important ;box-shadow:unset !important ;
}
.fifthborder input:focus {
border:1px solid #ff0080 !important ;box-shadow:unset !important ;
}
.fifthborder textarea:focus {
border:1px solid #ff0080 !important ;box-shadow:unset !important ;
}

.sixthborder input:focus + label {color: #c300dc !important;}
.sixthborder textarea:focus + label {color: #c300dc !important;}
.sixthborder select:focus + label {color: #c300dc !important;}

.sixthborder select:focus {
border:1px solid #c300dc !important ;box-shadow:unset !important ;
}
.sixthborder input:focus {
border:1px solid #c300dc !important ;box-shadow:unset !important ;
}
.sixthborder textarea:focus {
border:1px solid #c300dc !important ;box-shadow:unset !important ;
}

.seventhborder input:focus + label {color: #139830 !important;}
.seventhborder textarea:focus + label {color: #139830 !important;}
.seventhborder select:focus + label {color: #139830 !important;}


.seventhborder select:focus {
border:2px solid #139830 !important ;box-shadow:unset !important ;
}
.seventhborder input:focus {
border:2px solid #139830 !important ;box-shadow:unset !important ;
}
.seventhborder textarea:focus {
border:2px solid #139830 !important ;box-shadow:unset !important ;
}

.eighthborder input:focus + label {color: #082cdc !important;}
.eighthborder textarea:focus + label {color: #082cdc !important;}
.eighthborder select:focus + label {color: #082cdc !important;}


.eighthborder select:focus {
border:2px solid #082cdc !important ;box-shadow:unset !important ;
}
.eighthborder input:focus {
border:2px solid #082cdc !important ;box-shadow:unset !important ;
}
.eighthborder textarea:focus {
border:2px solid #082cdc !important ;box-shadow:unset !important ;
}

button, input, optgroup, select, textarea {
    font-size: 100%;
    line-height: 2;
    margin: 0;
}
[type=radio]:checked, [type=radio]:not(:checked) {
    position: absolute;
    pointer-events: unset;
    opacity: 4;
    padding: 5px !important;
    margin-left: 6px;
	    margin-top: -3px;
}
table {
    border-spacing: 0px;
    border-collapse: separate !important;	
}

div.input-block {
  position: relative;
}

div.input-block input {
  font-weight: 500;
  font-size: 1.6rem;
  color: #495055;

  width: 350px;
  padding: 15px 15px;
  border-radius: 1rem;
  border: 2px solid  #D9D9D9;
  outline:none;
}

div.input-block span.placeholder {
  position: absolute;
  margin: 17px 0;
  padding: 0 4px;
  font-family: Roboto, sans-serif;

  color:  #6c757d;

  display: flex;
  align-items: center;

  font-size: 1.6rem;

  top: 0;
  left: 17px;

  transition: all 0.2s;
  transform-origin: 0% 0%;
  background: none;
  pointer-events: none;
}

div.input-block input:valid + span.placeholder,
div.input-block input:focus + span.placeholder {
transform: scale(0.8) translateY(-30px);
background: #fff;
}

div.input-block input:focus{
color: #284B63;
border-color: #284B63;
}

div.input-form input:focus + span.placeholder {
color: #284B63;
}
.input-field label.active {
    margin-top: 10px;
    width: unset;
	background:white;
	color: #9e9e9e !important;
}

.select-wrapper.valid>input.select-dropdown, input.valid:not([type]), input.valid:not([type]):focus, input.valid[type=date]:not(.browser-default), input.valid[type=date]:not(.browser-default):focus, input.valid[type=datetime-local]:not(.browser-default), input.valid[type=datetime-local]:not(.browser-default):focus, input.valid[type=datetime]:not(.browser-default), input.valid[type=datetime]:not(.browser-default):focus, input.valid[type=email]:not(.browser-default), input.valid[type=email]:not(.browser-default):focus, input.valid[type=number]:not(.browser-default), input.valid[type=number]:not(.browser-default):focus, input.valid[type=password]:not(.browser-default), input.valid[type=password]:not(.browser-default):focus, input.valid[type=search]:not(.browser-default), input.valid[type=search]:not(.browser-default):focus, input.valid[type=tel]:not(.browser-default), input.valid[type=tel]:not(.browser-default):focus, input.valid[type=text]:not(.browser-default), input.valid[type=text]:not(.browser-default):focus, input.valid[type=time]:not(.browser-default), input.valid[type=time]:not(.browser-default):focus, input.valid[type=url]:not(.browser-default), input.valid[type=url]:not(.browser-default):focus, textarea.materialize-textarea.valid, textarea.materialize-textarea.valid:focus { 	color: black; !important;box-shadow: 0 1px 0 0 #9e9e9e; }


</style>
<?php if($deviceType=='phone' || $deviceType=='tablet') { if($project1['bank']!='') {?>
<style>
.select2 {
 width: 150px !important;
}
</style><?php } } ?>
    <div id="main">
	 <div id="prefixes" class="card card card-default scrollspy">
        <div class="card-content">
	
	 <div class="row">
	      
                  <div class="col s12">
                     <div class="row" id="main-view">
                        <div class="col s12 ">
                           <ul class=" tab-demo z-depth-1">
                              <li class=" col m3  <?php if($_REQUEST['step']=='step1' || $_REQUEST['step']==''){?> activeal <?php }?> " style="border: 1px solid;border-radius: 10px;    
    padding: 5px 15px;
"><a <?php if($_REQUEST['step']=='step1' || $_REQUEST['step']==''){?> class="activea2" <?php }?> href="create-project?step=step1&stepid=<?php echo $_REQUEST['stepid'];?>" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>>Land</a></li>
							  
                              <li class=" col m3 <?php if($_REQUEST['step']=='step4'){?> activeal <?php }?> " style="border: 1px solid;border-radius: 10px;
       padding: 5px 10px;
    margin-left: 7px;
    width: 23%;
"><?php if($_REQUEST['stepid']!='') {?> <a <?php if($_REQUEST['step']=='step4'){?> class="activea2" <?php }?> href="create-project?step=step4&stepid=<?php echo $_REQUEST['stepid'];?>"  <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>> Building</a><?php } else {?> <a <?php if($_REQUEST['step']=='step4'){?> class="activea2" <?php }?> href="create-project?step=step4" <?php if ($detect->isMobile()){?> style="color:black;"<?php } else {?> style="    padding-left: 25%;
							  padding-right: 56%;color:black;" <?php } ?>> Building</a> <?php } ?></li>
							  
							  <?php if(1!=1) {?>
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
							  padding-right: 56%;color:black;" <?php } ?>>Step 4</a> <?php } ?></li> <?php } ?>
                           </ul>
                        </div>
                        <div class="col s12">
<?php if($_REQUEST['step']=='step1' || $_REQUEST['step']==''){?>
                           <div id="" class="col s12">
                      
							 
		   <div id="overlaynew"><img  id="loadingnew" src="<?php echo $web_url; ?>demo_wait.gif" width="150px" height="130px" /></div>
		   
		
		     <form class="login-form" class="formValidate" id="formValidate" enctype='multipart/form-data' action="" method="post">
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
 
  <?php if($_REQUEST['stepsave']=='Yes')
		  {?>
	  <div class="card-alert card green">
                <div class="card-content white-text" style="padding: 7px;">
                  <p>SUCCESS : Succesfully Created.</p>
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
 <table class="highlight" style="    margin-top: 18px;">
 <thead>
<tr>
<th <?php if($deviceType=='phone' || $deviceType=='tablet') {?> colspan="2"  <?php } else {?> colspan="1" <?php } ?> style="text-align: center;    background: white; border:1px solid #21058f;width:49%; ">PROVISIONAL VALUATION REPORT </th> <th style="width:0% "></th><th  colspan="1" style="text-align: center;     background: white;border:1px solid #f60707; width:49%; "> <div class="input-field divheight secondborder"><select name="report_name" id="report_name"  class="select2 browser-default" style=" background: white;"> 
                <option value="" disabled selected>Select</option>
                <option <?php if($project1['report_name']=='ARRUL ASSOCIATES') {?> selected <?php } ?> value="ARRUL ASSOCIATES" >ARRUL ASSOCIATES</option>
			   <option <?php if($project1['report_name']=='EVEREST CONSTRUCTION') {?> selected <?php } ?> value="EVEREST ASSOCIATES">EVEREST CONSTRUCTION</option>
              </select></div></th>
</tr>	
	
<tr>

<th <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="width:50%;"<?php } else { ?> style="border-left:1px solid #21058f;border-right:1px solid #21058f;"  <?php } ?>> <?php if(1!=1) {?> Name of the Bank:<?php } ?>  <div class="input-field divheight firstborder"> <select name="bank" id="bank"  class="select2" required  <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="width:50% !important; "<?php } else { ?> style="margin-left: -14px !important;
    width: 104% !important;" <?php } ?>> 
                <option value="" disabled selected>Name of the Bank</option>
				<?php
$shop = mysqli_query($conn,"SELECT * FROM `bank` where delete_status='0' ");   
while($shop1 = mysqli_fetch_array($shop))
{
?>					
                <option <?php if($project1['bank']==$shop1['name'].'-'.$shop1['branch']) {?> selected <?php } ?> value="<?php echo $shop1['name'].'-'.$shop1['branch'];?>"><?php echo $shop1['name'].'-'.$shop1['branch'];?></option>
<?php } ?>				
              </select> </div></th><th></th>
<?php if($deviceType=='phone' || $deviceType=='tablet') {?> </tr><tr><?php } ?>

<th style="border-left:1px solid #f60707; border-right:1px solid #f60707;"><div class="input-field col s12 divheight date secondborder" style="    height: 31px !important;"><input  id="date" name="date" type="date" value="<?php echo $project1['date'];?>"  style=" margin-left: -14px !important;
    width: 104% !important;"> <label  for="date" style="    margin-top: 11px;
    background: white;" >Date</label>
                  </div></th>
</tr>
<tr>

<th style="border:1px solid #21058f;">
<div class="input-field col s12 divheight loan firstborder">
                    <input  id="loanAmount" name="loanAmount" type="number" value="<?php echo $project1['loanAmount'];?>" style=" margin-left: -14px !important;
    width: 104% !important;">
                    <label  for="loanAmount" style="">Loan Amount (Rs.)</label>
                  </div>
				  
				  
				  
				  </th><th></th>
<?php if($deviceType=='phone' || $deviceType=='tablet') {?> </tr><tr><?php } ?>
<th style="border:1px solid #f60707; "><div class="input-field col s12 divheight ins secondborder">	<input  id="inspected" name="inspected" type="text" value="<?php echo $project1['inspected'];?>" required style=" margin-left: -14px !important;
    width: 104% !important;">          <label  for="inspected" style="">Inspected</label></div></th>
</tr>
<tr>
<th style="border-left:1px solid #21058f;border-right:1px solid #21058f;">  <div class="input-field col s12 divheight company firstborder"> <textarea id="companyName" name="companyName" rows="3" cols="23" style="    height: 3rem;margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['companyName'];?>
</textarea><label  for="companyName" style="">Company Name</label></div></th><th></th>
<?php if($deviceType=='phone' || $deviceType=='tablet') {?> </tr><tr><?php } ?>
<th style="border-left:1px solid #f60707; border-right:1px solid #f60707; "><div class="input-field col s12 divheight secondborder"><input  id="advanceAmount" name="advanceAmount" type="number" value="<?php echo $project1['advanceAmount'];?>"  style=" margin-left: -14px !important;
    width: 104% !important;"> <label  for="advanceAmount" style="">Advance Amount (Rs.)</label></div></th>
</tr>	
<tr>
<th style="width:50%;border:1px solid #21058f;"><?php $ownerAddress2=explode("--,",$project1['ownerAddress']);
$first_cap=explode("--,",$project1['first_cap']);
$second_cap=explode("--,",$project1['second_cap']);
$ownerAddress1=explode("--,",$project1['ownerAddress1']);
if($project1['ownerAddress']!='') { foreach($ownerAddress2 as $lengthacountproper2 =>$key) {	?><div id="a">	<table><tr><td style="border:0px solid;border:unset !important;"><select name="first_cap[]" <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="display:block;width: 100%;" <?php } else {?>  style="display:block;" <?php } ?>><option value="">Select</option><option <?php if($first_cap[$lengthacountproper2]=='Mr.') {?> selected <?php } ?> value="Mr.">Mr.</option><option <?php if($first_cap[$lengthacountproper2]=='Mrs.') {?> selected <?php } ?>  value="Mrs.">Mrs.</option></select></td><td style="border:0px solid;border:unset !important;"><input  id="ownerAddress" name="ownerAddress[]" type="text" value="<?php echo $key;?>"  style="border:0px solid;"></td></tr><tr><td style="border:unset !important;"><select name="second_cap[]" <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="display:block;width: 100%;" <?php } else {?>  style="display:block;" <?php } ?>><option value="">Select</option><option <?php if($second_cap[$lengthacountproper2]=='S/o.') {?> selected <?php } ?> value="S/o.">S/o.</option><option <?php if($second_cap[$lengthacountproper2]=='W/o.') {?> selected <?php } ?> value="W/o.">W/o.</option><option <?php if($second_cap[$lengthacountproper2]=='D/o.') {?> selected <?php } ?> value="D/o.">D/o.</option></select></td><td style="border:unset !important;"><input  id="ownerAddress1" name="ownerAddress1[]" type="text" value="<?php echo $ownerAddress1[$lengthacountproper2];?>" style="width:100%;"></td></tr></table><input type="button" class="btnRemove" value="X" style=" width: 10%;background: red;color: white;border-color: red;font-weight: bold;float:right;"/></div> <?php } } else { ?> <div id="a"><table style="border:unset !important;"><tr><td style="border:unset !important;"><div class="input-field divheight firstborder"><select name="first_cap[]" <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="display:block;width: 100%;" <?php } else {?>  style="    display: block;
     margin-left: -4px;" <?php } ?>><option value="">Select</option><option value="Mr.">Mr.</option><option value="Mrs.">Mrs.</option></select></div></td><td style="border:unset !important;"><div class="input-field col s12 divheight ownera firstborder">	<input  id="ownerAddress" name="ownerAddress[]" type="text" value="" style=" margin-left: -14px !important;
    width: 107% !important;"> <label  for="ownerAddress" style="">Name of  Applicant</label></div></td></tr><tr><td style="border:unset !important;"><div class="input-field divheight firstborder"><select name="second_cap[]" <?php if($deviceType=='phone' || $deviceType=='tablet') {?> style="display:block;width: 100%;" <?php } else {?>  style="display:block; margin-left: -4px;" <?php } ?>><option value="">Select</option><option value="S/o.">S/o.</option><option value="W/o.">W/o.</option><option value="D/o.">D/o.</option></div></select></td><td style="border:unset !important;"><div class="input-field col s12  divheight ownera firstborder"><input  id="ownerAddress1" name="ownerAddress1[]" type="text" value="" style=" margin-left: -14px !important;
    width: 107% !important;"> <label  for="ownerAddress1" style="">Name of  Applicant</label></div></td></tr></table></div> <?php } ?>
<input id="btnAdd" type="button" value="+" style="    width: 14%;
    background: green;
    color: white;
    border-radius: 6px;"/>
</th><th></th>
<?php if($deviceType=='phone' || $deviceType=='tablet') {?> </tr><tr><?php } ?>
<th style="border:1px solid #f60707; "><div class="input-field col s12 purchase secondborder"><input  id="purchaseAddress" name="purchaseAddress" type="text" value="<?php echo $project1['purchaseAddress'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="purchaseAddress" style="">Name of the Purchaser</label></div></th>
</tr>
		
 </thead>
</table> 
		  		
				
 <!--  Residential  Purchaser --> 		
				
				
	<?php if($deviceType=='phone' || $deviceType=='tablet') {?>

<table class="highlight" >
 <thead>
<tr style="background: #ddd;">
<th style="border:1px solid #21058f;">Residential Address: </th>
<th style="border:1px solid #21058f;"></th>
</tr>
<tr>

<th style="border:1px solid #21058f;">i) Door No: <textarea id="odoorno" name="odoorno" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['odoorno'];?>
</textarea></th>
</tr>
<tr>
<th>ii) Street: </th>
<th> <textarea id="ostreet" name="ostreet" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['ostreet'];?>
</textarea></th>
</tr>
<tr>
<th>iii) Area: </th>
<th >  <textarea id="oarea" name="oarea" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['oarea'];?>
</textarea></th>
</tr>
<tr>
<th>vi) Post: </th>
<th>  <input  id="opost" name="opost" type="text" value="<?php echo $project1['opost'];?>"></th>
</tr>
<tr>
<th>v) Taluk: </th>
<th ><input  id="otaluk" name="otaluk" type="text" value="<?php echo $project1['otaluk'];?>"></th>
</tr>
<tr>
<th>vi) District: </th>
<th><input  id="odistrict" name="odistrict" type="text" value="<?php echo $project1['odistrict'];?>"></th>
</tr>
<tr>
<th>vii) Pincode: </th>
<th><input  id="opincode" name="opincode" type="text" value="<?php echo $project1['opincode'];?>"></th>
</tr>
<th>viii) Contact: </th>
<th><input  id="ocontact" name="ocontact" type="text" value="<?php echo $project1['ocontact'];?>"></th>
</tr>
<tr style="background: #ddd;">
<th> Purchaser Available:</th>
<th><p class="mb-1">
              <label>
                <input type="checkbox" class="filled-in" name="purchaseyes" id="purchaseyes" <?php if($project1['purchaseyes']=='Yes') { ?> checked <?php } ?>  value="Yes">
                <span>Yes</span>
              </label>
            </p></th>
</tr>	


<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">i) Door No:	</div></th>
<th><div class="purchaseyescheck"><textarea id="pdoorno" class="purchaseyescheck"  name="pdoorno" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['pdoorno'];?>
</textarea></div></th>
</tr>


<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">ii) Street:	</div></th>
<th><div class="purchaseyescheck"> <textarea id="pstreet" class="purchaseyescheck" name="pstreet" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['pstreet'];?>
</textarea></div></th>
</tr>
<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">iii) Area:	</div></th>
<th><div class="purchaseyescheck"><textarea id="parea" class="purchaseyescheck" name="parea"  rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['parea'];?>
</textarea></div></th>
</tr>
<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">vi) Post:	</div></th>
<th><div class="purchaseyescheck"> <input  id="ppost" class="purchaseyescheck" name="ppost" type="text" value="<?php echo $project1['ppost'];?>"></div></th>
</tr>
<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">v) Taluk:	</div></th>
<th><div class="purchaseyescheck"><input  id="ptaluk" class="purchaseyescheck" name="ptaluk" type="text" value="<?php echo $project1['ptaluk'];?>"></div></th>
</tr>
<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">vi) District:	</div></th>
<th><div class="purchaseyescheck"><input  id="pdistrict" class="purchaseyescheck" name="pdistrict" type="text" value="<?php echo $project1['pdistrict'];?>"></div></th>
</tr>	
<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">vii) Pincode:	</div></th>
<th><div class="purchaseyescheck"><input  id="ppincode" class="purchaseyescheck" name="ppincode" type="text" value="<?php echo $project1['ppincode'];?>"></div></th>
</tr>	
<tr class="purchaseyescheck">
<th><div class="purchaseyescheck">viii) Contact:</div>	</th>
<th><div class="purchaseyescheck"><input  id="pcontact" class="purchaseyescheck" name="pcontact" type="text" value="<?php echo $project1['pcontact'];?>"></div></th>
</tr>		
 </thead>
</table> 
		

	<?php } else { ?>	      
				
	<table class="highlight" style="    margin-top: 7px;">
 <thead>
<tr style="background: white;">
<th style="width:50%;border:1px solid #009933;">Residential Address: </th> <th style="width:0%;"></th>
<th style="border:1px solid #05529f;width:49%;"> <p class="mb-1"> Purchaser Available:
              <label>
                <input type="checkbox" class="filled-in" name="purchaseyes" id="purchaseyes" <?php if($project1['purchaseyes']=='Yes') { ?> checked <?php } ?>  value="Yes">
                <span>Yes</span>
              </label>
            </p></th>
</tr>	
<tr>

<th style="border-left:1px solid #009933; border-right:1px solid #009933;"><div class="input-field col s12 divheight  address thirdborder"><textarea id="odoorno" name="odoorno" rows="3" cols="23" style="    height: 3rem; margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['odoorno'];?>
</textarea><label  for="odoorno" style="">Door No </label></div></th>
<th></th>
<th style="border-left:1px solid #05529f; border-right:1px solid #05529f;"><div class="input-field col s12 divheight address purchaseyescheck fourthborder"><textarea id="pdoorno" class="purchaseyescheck"  name="pdoorno" rows="3" cols="23" style="    height: 3rem; margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['pdoorno'];?>
</textarea><label  for="pdoorno" style="">Door No</label></div></th>
</tr>
<tr>
<th style="border:1px solid #009933;"> <div class="input-field col s12 divheight street thirdborder"> <textarea id="ostreet" name="ostreet" rows="3" cols="23" style="    height: 3rem;margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['ostreet'];?>
</textarea><label  for="ostreet" style="">Street </label></div></th>
<th></th>
<th style="border:1px solid #05529f;"><div class="input-field col s12 divheight street purchaseyescheck fourthborder"> <textarea id="pstreet" class="purchaseyescheck" name="pstreet" rows="3" cols="23" style="    height: 3rem; margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['pstreet'];?>
</textarea><label  for="pstreet" style="">Street </label></div></th>
</tr>

<tr>
<th style="border-left:1px solid #009933; border-right:1px solid #009933;"> <div class="input-field col s12 divheight street thirdborder"><textarea id="oarea" name="oarea" rows="3" cols="23" style="    height: 3rem;margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['oarea'];?>
</textarea><label  for="oarea" style="">Area  </label></div></th>
<th></th>
<th style="border-left:1px solid #05529f; border-right:1px solid #05529f;"><div class="input-field col s12 divheight street purchaseyescheck fourthborder"><textarea id="parea" class="purchaseyescheck" name="parea"  rows="3" cols="23" style="   height: 3rem;margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['parea'];?>
</textarea><label  for="parea" style="">Area  </label></div></th>
</tr>
<tr>
<th style="border:1px solid #009933;"><div class="input-field col s12 divheight street thirdborder"> <input  id="opost" name="opost" type="text" value="<?php echo $project1['opost'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="opost" style="">Post  </label></div></th>
	<th></th>
<th style="border:1px solid #05529f;"><div class="input-field col s12 divheight street purchaseyescheck fourthborder"> <input  id="ppost" class="purchaseyescheck" name="ppost" type="text" value="<?php echo $project1['ppost'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="ppost" style="">Post  </label></div></th>
</tr>

<tr>
<th style="border-left:1px solid #009933; border-right:1px solid #009933;"><div class="input-field col s12 divheight street thirdborder">  <input  id="otaluk" name="otaluk" type="text" value="<?php echo $project1['otaluk'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="otaluk" style="">Taluk </label></div></th>
	<th></th>
<th style="border-left:1px solid #05529f; border-right:1px solid #05529f;"><div class="input-field col s12 divheight street purchaseyescheck fourthborder"><input  id="ptaluk" class="purchaseyescheck" name="ptaluk" type="text" value="<?php echo $project1['ptaluk'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="ptaluk" style="">Taluk </label></div></th>
</tr>
<tr>
<th style="border:1px solid #009933;"><div class="input-field col s12 divheight contact thirdborder">  <input  id="odistrict" name="odistrict" type="text" value="<?php echo $project1['odistrict'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="odistrict" style="">District </label></div></th>
	<th></th>
<th style="border:1px solid #05529f;"><div class="input-field col s12 divheight contact purchaseyescheck fourthborder"><input  id="pdistrict" class="purchaseyescheck" name="pdistrict" type="text" value="<?php echo $project1['pdistrict'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="pdistrict" style="">District </label></div></th>
</tr>	
<tr>

<th style="border-left:1px solid #009933; border-right:1px solid #009933;"><div class="input-field col s12 divheight contact thirdborder"> <input  id="opincode" name="opincode" type="text" value="<?php echo $project1['opincode'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="opincode" style="">Pincode </label></div></th>
	<th></th>
<th style="border-left:1px solid #05529f; border-right:1px solid #05529f;"><div class="input-field col s12 divheight contact purchaseyescheck fourthborder"><input  id="ppincode" class="purchaseyescheck" name="ppincode" type="text" value="<?php echo $project1['ppincode'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="ppincode" style="">Pincode </label></div></th>
</tr>	
<tr>
<th style="border:1px solid #009933;"><div class="input-field col s12 divheight contact thirdborder"><input  id="ocontact" name="ocontact" type="text" value="<?php echo $project1['ocontact'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="ocontact" style="">Contact </label></div></th>
	<th></th>
<th style="border:1px solid #05529f;"><div class="input-field col s12 divheight contact purchaseyescheck fourthborder"><input  id="pcontact" class="purchaseyescheck" name="pcontact" type="text" value="<?php echo $project1['pcontact'];?>" style="margin-left: -14px !important;
    width: 104% !important;"><label  for="pcontact" style="">Contact </label></div></th>
</tr>		
 </thead>
</table> 
					
				
	<?php } ?>
	
	
 <!--  Residential  Purchaser end --> 	
 
 
  <!--  Property Address  Revenue Details Start--> 	
 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>

 <table class="highlight">
 <thead>
<tr style="background: #ddd;">
<th style="border:1px solid #05529f;">Property Address</th>
<th style="border:1px solid #05529f;"><p class="mb-1">
<label>
<input type="checkbox" class="filled-in" name="residentialautofill" id="residentialautofill" <?php if($project1['residentialautofill']=='Yes') { ?> checked<?php } ?> value="Yes">
<span>Auto Fill</span>
</label></p></th>
</tr>
<tr>
<th style="width: 15%;">i) Door No</th>
<th style="width: 39%;">  <textarea id="propertydoorno" name="propertydoorno" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['propertydoorno'];?>
</textarea> </th> 
</tr>
<tr>
<th>ii) Street</th>
<th>   <textarea id="propertystreet" name="propertystreet" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['propertystreet'];?>
</textarea>   </th>
</tr>
<tr>
<th>iii) Area</th>
<th>  <textarea id="propertyarea" name="propertyarea" rows="3" cols="23" style="    height: 3rem;">
<?php echo $project1['propertyarea'];?>
</textarea></th>
</tr>
<tr>
<th>iv) Post</th>
<th> <input  id="propertyvillage" name="propertyvillage" type="text" value="<?php echo $project1['propertyvillage'];?>"></th>
</tr>
<tr>
<th>v) Taluk</th>
<th>   <input  id="propertytaluk" name="propertytaluk" type="text" value="<?php echo $project1['propertytaluk'];?>"></th>
</tr>
<tr>
<th>vii) Pincode</th>
<th> <input  id="propertypincode" name="propertypincode" type="text" value="<?php echo $project1['propertypincode'];?>"> </th>
</tr>
<tr style="background: #ddd;">
<th>Revenue Details</th>
<th></th>
</tr>
<tr>
<th>vi) District</th>
<th> <input  id="propertydistict" name="propertydistict" type="text" value="<?php echo $project1['propertydistict'];?>"></th>
</tr>
<tr>  
<th>i) Old S.F No </th><th><input  id="oldsfno" name="oldsfno" type="text" value="<?php echo $project1['oldsfno'];?>"></th>
</tr>
<tr>
<th>ii) S.F NO   </th><th><input  id="sfno" name="sfno" type="text" value="<?php echo $project1['sfno'];?>"></th>
</tr>
<tr>
<th>iii) R.S.F No  </th><th> <input  id="rsfno" name="rsfno" type="text" value="<?php echo $project1['rsfno'];?>"></th>
</tr>
<tr>
<th>iv) Patta No</th>
<th><input  id="pattano" name="pattano" type="text" value="<?php echo $project1['pattano'];?>"></th>
</tr>
<tr>
<th>v) Plot No</th>
<th> <input  id="plotno" name="plotno" type="text" value="<?php echo $project1['plotno'];?>"></th>
</tr>
<tr>
<th>vi) Pymash No</th>
<th> <input  id="pymashno" name="pymashno" type="text" value="<?php echo $project1['pymashno'];?>"></th>
</tr>
<tr>
<th>vii) T.S.No</th>
<th> <input  id="tsno" name="tsno" type="text" value="<?php echo $project1['tsno'];?>"></th>
</tr>
<tr>
<th>viii) Ward No  </th><th><input  id="wardno" name="wardno" type="text" value="<?php echo $project1['wardno'];?>"></th>
</tr>
<tr>
<th>ix)  Block No  </th><th><input  id="blockno" name="blockno" type="text" value="<?php echo $project1['blockno'];?>"></th>
</tr>
<tr>
<th>x) S.R.O  </th><th><input  id="sro" name="sro" type="text" value="<?php echo $project1['sro'];?>"></th>
</tr>
<tr style="background: #ddd;">
<th></th>
<th></th>
</tr>
<tr>
<th>i) Land Mark</th>
<th><input  id="landmark" name="landmark" type="text" value="<?php echo $project1['landmark'];?>"></th>	
</tr>
<tr>
<th>ii) Nearest Bus Stop</th>
<th><input  id="nearestbustop" name="nearestbustop" type="text" value="<?php echo $project1['nearestbustop'];?>"></th>	
</tr>
<tr>
<th>iii) Distance of Branch (KM)</th>
<th>  <input  id="distanceofbranch" name="distanceofbranch" type="text" value="<?php echo $project1['distanceofbranch'];?>"></th>
</tr>
<tr>
<th>iv) Distance of R.S (KM)</th>
<th><input  id="distanceofrs" name="distanceofrs" type="text" value="<?php echo $project1['distanceofrs'];?>"> 
</th>
</tr>	
<tr>
<th>v) Nearest Main Road</th>
<th> <input  id="nearestmainroad" name="nearestmainroad" type="text" value="<?php echo $project1['nearestmainroad'];?>"></th>
</tr>	
<tr>
<th>vi) Civil Amenities</th>
<th>  <input  id="civilamenities" name="civilamenities" type="text" value="<?php echo $project1['civilamenities'];?>"></th>		
</tr>	
<tr style="background: #ddd;">
<th></th>
<th></th>
</tr>
<tr>
<th>i) Property Occupied</th>
<th><select name="propertyoccupied" style="display:block;">
<option value="" >Property Occupied</option>
<option <?php if($project1['propertyoccupied']=='owner') {?> Selected <?php } ?> value="owner">Owner</option>
<option <?php if($project1['propertyoccupied']=='rent') {?> Selected <?php } ?> value="rent">Rent</option>
</select></th>	
</tr>
<tr>
<th>ii) Tax Receipt</th>
<th><select name="taxreceipt"  id="taxreceipt" style="display:block;">
<option value="" >Tax Receipt</option>
<option <?php if($project1['taxreceipt']=='Yes') {?> Selected <?php } ?>  value="Yes">Yes</option>
<option <?php if($project1['taxreceipt']=='No') {?> Selected <?php } ?> value="No">No</option>
</select>
<br>
<input  id="taxreceiptfile" name="taxreceiptfile" type="file">
<input  id="taxreceiptfile_name" name="taxreceiptfile_name" type="hidden" value="<?php echo $project1['taxreceiptfile'];?>">

<input  id="taxreceipt_name" name="taxreceipt_name" type="text" value="<?php echo $project1['taxreceipt_name'];?>" placeholder="Tax Receipt">

<?php if($project1['taxreceiptfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/tax/<?php echo $project1['taxreceiptfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?>
</th>	
</tr>
<tr>	
<th>iii) E.B. Service No</th>
<th><select name="ebserviceno" id="ebserviceno" style="display:block;">
<option value="">E.B. Service No</option>
<option <?php if($project1['ebserviceno']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['ebserviceno']=='No') {?> Selected <?php } ?> value="No">No</option>
</select>
<br>
<input  id="ebservicenofile" name="ebservicenofile" type="file" value="<?php echo $project1['ebservicenofile'];?>">
<input  id="ebservicenofile_name" name="ebservicenofile_name" type="hidden" value="<?php echo $project1['ebservicenofile'];?>">
<input  id="ebserviceno_name" name="ebserviceno_name" type="text" value="<?php echo $project1['ebserviceno_name'];?>"  placeholder="E.B. Service No">
<?php if($project1['ebservicenofile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/ebservice/<?php echo $project1['ebservicenofile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>	
</tr>
<tr>
<th>iv) Patta / DTCP</th>
<th> <select name="pattadtcp" id="pattadtcp" style="display:block;">
<option value="" >Patta / DTCP</option>
<option <?php if($project1['pattadtcp']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['pattadtcp']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="pattadtcpfile" name="pattadtcpfile" type="file" value="<?php echo $project1['pattadtcpfile'];?>">
<input  id="pattadtcp_name" name="pattadtcp_name" type="text" value="<?php echo $project1['pattadtcp_name'];?>" placeholder="Patta No">
<input  id="pattadtcpfile_name" name="pattadtcpfile_name" type="hidden" value="<?php echo $project1['pattadtcpfile'];?>"><?php if($project1['pattadtcpfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/pattadtcp/<?php echo $project1['pattadtcpfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>		
</tr>
<tr>
<th>v) Approval Plan</th>
<th><select name="approvalplan" id="approvalplan" style="display:block;">
<option value="" >Approval Plan</option>
<option <?php if($project1['approvalplan']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['approvalplan']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="approvalplanfile" name="approvalplanfile" type="file" value="<?php echo $project1['approvalplanfile'];?>"><input  id="approvalplan_name" name="approvalplan_name" type="text" value="<?php echo $project1['approvalplan_name'];?>" placeholder="Approval"><input  id="approvalplanfile_name" name="approvalplanfile_name" type="hidden" value="<?php echo $project1['approvalplanfile'];?>"><?php if($project1['approvalplanfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/approvalplan/<?php echo $project1['approvalplanfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>	
</tr>
<tr>
<th>vi) H.D Line</th>
<th><select name="hdline" id="hdline" style="display:block;">
<option value="" >H.D Line</option>
<option <?php if($project1['hdline']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['hdline']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="hdlinefile" name="hdlinefile" type="file" value="<?php echo $project1['hdlinefile'];?>">
<input  id="hdline_name" name="hdline_name" type="text" value="<?php echo $project1['hdline_name'];?>" placeholder="H.D Line">
<input  id="hdlinefile_name" name="hdlinefile_name" type="hidden" value="<?php echo $project1['hdlinefile'];?>">
<?php if($project1['hdlinefile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/hdline/<?php echo $project1['hdlinefile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></th>	
</tr>

</thead>
</table>		
<?php } else {?>

 <table class="highlight" style="  margin-top: 7px ;  margin-bottom: 5px;    width: 101%;">
 <thead>
<tr style="">
<th style="    width: 50%;;border:1px solid #ff0080;"><p class="mb-1">Property Address
              <label>
                <input type="checkbox" class="filled-in" name="residentialautofill" id="residentialautofill" <?php if($project1['residentialautofill']=='Yes') { ?> checked<?php } ?> value="Yes">
                <span>Auto Fill</span>
              </label>
            </p></th><th style="width:1%;"></th>
<th style="border:1px solid #c300dc;width:49%;">Revenue Details</th>
</tr>

<tr>
<th style="width: 39%;border-left:1px solid #ff0080; border-right:1px solid #ff0080;"><div class="input-field col s12 divheight  address fifthborder"><textarea id="propertydoorno" name="propertydoorno" rows="3" cols="23" style="    height: 3rem;margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['propertydoorno'];?>
</textarea>  <label  for="propertydoorno" style="">Door No </label> </div></th><th></th>
<th style="border-left:1px solid #c300dc; border-right:1px solid #c300dc;"><table><tr><td style="border:unset !important;width:50%"><div class="input-field col s12 divheight  oldsf sixthborder"><input  id="oldsfno" name="oldsfno" type="text" value="<?php echo $project1['oldsfno'];?>"  style="margin-left: -14px !important;"><label  for="oldsfno" style="">Old S.F No </label></div> </td><td style="border:unset !important"><div class="input-field col s12 divheight  oldsf sixthborder"><input  id="wardno" name="wardno" type="text" value="<?php echo $project1['wardno'];?>"  style="margin-left: -14px !important;"><label  for="wardno" style="">Ward No  </label></div> </td></tr></table></th>
</tr>
<tr>
<th style="border:1px solid #ff0080;"> <div class="input-field col s12 divheight  address fifthborder"><textarea id="propertystreet" name="propertystreet" rows="3" cols="23" style="    height: 3rem;margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['propertystreet'];?>
</textarea> <label  for="propertystreet" style="">Street </label> </div>  </th><th></th>
<th style="border:1px solid #c300dc;"><table><tr><td style="border:unset !important;width:50%"><div class="input-field col s12 divheight  oldsf sixthborder"><input  id="sfno" name="sfno" type="text" value="<?php echo $project1['sfno'];?>"  style="margin-left: -14px !important;"><label  for="sfno" style="">S.F NO  </label></div> </td><td style="border:unset !important"><div class="input-field col s12 divheight  oldsf sixthborder" >  <input  id="blockno" name="blockno" type="text" value="<?php echo $project1['blockno'];?>" style="margin-left: -14px !important;"><label  for="blockno" style="">Block No   </label></div></td></tr></table></th><th></th>
</tr>

<tr>
<th style="border-left:1px solid #ff0080; border-right:1px solid #ff0080;">   <div class="input-field col s12 divheight  address fifthborder"><textarea id="propertyarea" name="propertyarea" rows="3" cols="23" style="    height: 3rem;margin-left: -14px !important;
    width: 104% !important;">
<?php echo $project1['propertyarea'];?>
</textarea><label  for="propertyarea" style="">Area </label> </div></th><th></th>
<th style="border-left:1px solid #c300dc; border-right:1px solid #c300dc;"><table><tr><td style="border:unset !important;width:50%"><div class="input-field col s12 divheight  oldsf sixthborder">  <input  id="rsfno" name="rsfno" type="text" value="<?php echo $project1['rsfno'];?>" style="margin-left: -14px !important;"><label  for="rsfno" style="">R.S.F No  </label></div> </td><td style="border:unset !important"><div class="input-field col s12 divheight  address sixthborder"><input  id="tsno" name="tsno" type="text" value="<?php echo $project1['tsno'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="tsno" style="">T.S.No</label> </div>  </td></tr></table></th>

</tr>


<tr>
<th style="border:1px solid #ff0080;"><div class="input-field col s12 divheight  address fifthborder"> <input  id="propertyvillage" name="propertyvillage" type="text" value="<?php echo $project1['propertyvillage'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="propertyvillage" style="">Post </label> </div></th><th></th>
<th style="border:1px solid #c300dc;"><div class="input-field col s12 divheight  oldsf sixthborder"><input  id="pattano" name="pattano" type="text" value="<?php echo $project1['pattano'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="pattano" style="">Patta No </label></th>
</tr>
<tr>
<th style="border-left:1px solid #ff0080; border-right:1px solid #ff0080;"><div class="input-field col s12 divheight  address fifthborder">  <input  id="propertytaluk" name="propertytaluk" type="text" value="<?php echo $project1['propertytaluk'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="propertytaluk" style="">Taluk </label> </div></th><th></th>
<th style="border-left:1px solid #c300dc; border-right:1px solid #c300dc;"><div class="input-field col s12 divheight  address sixthborder"><input  id="plotno" name="plotno" type="text" value="<?php echo $project1['plotno'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="plotno" style="">Plot No </label></th>
</tr>
<tr>
<th style="border:1px solid #ff0080;"><div class="input-field col s12 divheight  address fifthborder"> <input  id="propertydistict" name="propertydistict" type="text" value="<?php echo $project1['propertydistict'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="propertytaluk" style="">District</label> </div></th><th></th>
<th style="border:1px solid #c300dc;"><div class="input-field col s12 divheight  sro sixthborder"> <input  id="pymashno" name="pymashno" type="text" value="<?php echo $project1['pymashno'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="pymashno" style="">Pymash No</label> </div></th>
</tr>

<tr>
<th style="border-left:1px solid #ff0080; border-right:1px solid #ff0080;border-bottom:1px solid #ff0080;"><div class="input-field col s12 divheight  contact fifthborder"> <input  id="propertypincode" name="propertypincode" type="text" value="<?php echo $project1['propertypincode'];?>" style=" margin-left: -14px !important;
    width: 104% !important;"><label  for="propertypincode" style="">Pincode</label> </div> </th><th></th>
<th style="border-left:1px solid #c300dc; border-right:1px solid #c300dc;border-bottom:1px solid #c300dc;"><div class="input-field col s12 divheight  address sixthborder"><input  id="sro" name="sro" type="text" value="<?php echo $project1['sro'];?>" style="margin-left: -14px !important;"><label  for="sro" style="">S.R.O </label></div></th>
</tr>
</thead>
</table>
 <table class="highlight" style="  margin-bottom: 5px;">
 <thead>
<tr>
<th style="border:1px solid #139830;width:50%;"><div class="input-field col s12 divheight  sro seventhborder"><input  id="landmark" name="landmark" type="text" value="<?php echo $project1['landmark'];?>" style=" margin-left: -14px !important;
    width: 104% !important; height: 3rem !important;"><label  for="landmark" style="">Land Mark</label> </div></th>	<th style="width:0%;"></th>
<th style="border:1px solid #082cdc;width:49%;"><div class="input-field divheight eighthborder"><select name="propertyoccupied" style="display:block;">
<option value="" >Property Occupied</option>
<option <?php if($project1['propertyoccupied']=='owner') {?> Selected <?php } ?> value="owner">Owner</option>
<option <?php if($project1['propertyoccupied']=='rent') {?> Selected <?php } ?> value="rent">Rent</option>
</select></div></th>	
</tr>
<tr>
<th style="border-left:1px solid #139830; border-right:1px solid #139830;"><div class="input-field col s12 divheight  oldsf seventhborder"><input  id="nearestbustop" name="nearestbustop" type="text" value="<?php echo $project1['nearestbustop'];?>" style=" margin-left: -14px !important;
    width: 104% !important; height: 3rem !important;"><label  for="nearestbustop" style="">Nearest Bus Stop</label> </div></th>	<th></th>
<th style="border-left:1px solid #082cdc; border-right:1px solid #082cdc;"><div class="input-field eighthborder"><select name="taxreceipt"  id="taxreceipt" style="display:block;">
<option value="" >Tax Receipt</option>
<option <?php if($project1['taxreceipt']=='Yes') {?> Selected <?php } ?>  value="Yes">Yes</option>
<option <?php if($project1['taxreceipt']=='No') {?> Selected <?php } ?> value="No">No</option>
</select>
<br>
<input  id="taxreceiptfile" name="taxreceiptfile" type="file">
<input  id="taxreceiptfile_name" name="taxreceiptfile_name" type="hidden" value="<?php echo $project1['taxreceiptfile'];?>">

<div class="input-field col s12 divheight  oldsf eighthborder" id="taxreceipt_name" >
<input  id="taxreceipt_name1" name="taxreceipt_name" type="text" value="<?php echo $project1['taxreceipt_name'];?>"  Style="margin-left: -14px !important;
    width: 104% !important;">
<label  for="taxreceipt_name1" style="">Tax Receipt No</label>
</div>
<?php if($project1['taxreceiptfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/tax/<?php echo $project1['taxreceiptfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?>
</div></th>	
</tr>
<tr>

<th style="border:1px solid #139830;"> <div class="input-field col s12 divheight  distanceofbranch seventhborder"><input  id="distanceofbranch" name="distanceofbranch" type="text" value="<?php echo $project1['distanceofbranch'];?>"style=" margin-left: -14px !important;
    width: 104% !important; height: 3rem !important;"><label  for="distanceofbranch" style="">Distance of Branch (KM) </label> </div></th>	<th></th>
<th style="border:1px solid #082cdc;"><div class="input-field eighthborder"><select name="ebserviceno" id="ebserviceno" style="display:block;">
<option value="">E.B. Service No</option>
<option <?php if($project1['ebserviceno']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['ebserviceno']=='No') {?> Selected <?php } ?> value="No">No</option>
</select>
<br>
<input  id="ebservicenofile" name="ebservicenofile" type="file" value="<?php echo $project1['ebservicenofile'];?>">
<input  id="ebservicenofile_name" name="ebservicenofile_name" type="hidden" value="<?php echo $project1['ebservicenofile'];?>">
<div class="input-field col s12 eighthborder" id="ebserviceno_name">
<input  id="ebserviceno_name1" name="ebserviceno_name" type="text" value="<?php echo $project1['ebserviceno_name'];?>"  Style="margin-left: -14px !important;
    width: 104% !important;">
<label  for="ebserviceno_name1" style="">E.B. Service No</label>
</div>
<?php if($project1['ebservicenofile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/ebservice/<?php echo $project1['ebservicenofile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></div></th>	
</tr>

<tr>
<th style="border-left:1px solid #139830; border-right:1px solid #139830;"><div class="input-field col s12 divheight  oldsf seventhborder"><input  id="distanceofrs" name="distanceofrs" type="text" value="<?php echo $project1['distanceofrs'];?>" style=" margin-left: -14px !important;
    width: 104% !important; height: 3rem !important;"><label  for="distanceofrs" style="">Distance of R.S  (KM)</label></div>
</th>	<th></th>
<th style="border-left:1px solid #082cdc; border-right:1px solid #082cdc;"><div class="input-field eighthborder"><select name="pattadtcp" id="pattadtcp" style="display:block;">
<option value="" >Patta / DTCP</option>
<option <?php if($project1['pattadtcp']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['pattadtcp']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="pattadtcpfile" name="pattadtcpfile" type="file" value="<?php echo $project1['pattadtcpfile'];?>">
<div class="input-field  col s12 eighthborder" id="pattadtcp_name">
<input  id="pattadtcp_name1" name="pattadtcp_name" type="text" value="<?php echo $project1['pattadtcp_name'];?>" Style="margin-left: -14px !important;
    width: 104% !important;">
<label  for="pattadtcp_name1" style="">Patta No</label>
</div>
<input  id="pattadtcpfile_name" name="pattadtcpfile_name" type="hidden" value="<?php echo $project1['pattadtcpfile'];?>"><?php if($project1['pattadtcpfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/pattadtcp/<?php echo $project1['pattadtcpfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></div></th>		
</tr>
<tr>
<th style="border:1px solid #139830;"><div class="input-field col s12 divheight  oldsf seventhborder"><input  id="nearestmainroad" name="nearestmainroad" type="text" value="<?php echo $project1['nearestmainroad'];?>" style=" margin-left: -14px !important;
    width: 104% !important; height: 3rem !important;"><label  for="nearestmainroad" style="">Nearest Main Road </label></div></th><th></th>	
<th style="border:1px solid #082cdc;"><div class="input-field eighthborder"><select name="approvalplan" id="approvalplan" style="display:block;">
<option value="" >Approval Plan</option>
<option <?php if($project1['approvalplan']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['approvalplan']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="approvalplanfile" name="approvalplanfile" type="file" value="<?php echo $project1['approvalplanfile'];?>">
<div class="input-field col s12 eighthborder" id="approvalplan_name">
<input  id="approvalplan_name1" name="approvalplan_name" type="text" value="<?php echo $project1['approvalplan_name'];?>" Style="margin-left: -14px !important;
    width: 104% !important;">
<label  for="approvalplan_name1" style="">Approvalo No</label>
</div>
<input  id="approvalplanfile_name" name="approvalplanfile_name" type="hidden" value="<?php echo $project1['approvalplanfile'];?>"><?php if($project1['approvalplanfile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/approvalplan/<?php echo $project1['approvalplanfile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></div></th>	
</tr>
<tr>

<th style="border-left:1px solid #139830; border-right:1px solid #139830;border-bottom:1px solid #082cdc;"><div class="input-field col s12 divheight  oldsf seventhborder"><input  id="civilamenities" name="civilamenities" type="text" value="<?php echo $project1['civilamenities'];?>" style=" margin-left: -14px !important;
    width: 104% !important; height: 3rem !important;"><label  for="civilamenities" style="">Civil Amenities</label></div></th>	<th></th>
<th style="border-left:1px solid #139830; border-right:1px solid #082cdc;border-bottom:1px solid #082cdc;"><div class="input-field eighthborder"><select name="hdline" id="hdline" style="display:block;">
<option value="" >H.D Line</option>
<option <?php if($project1['hdline']=='Yes') {?> Selected <?php } ?> value="Yes">Yes</option>
<option <?php if($project1['hdline']=='No') {?> Selected <?php } ?> value="No">No</option>
</select><br><input  id="hdlinefile" name="hdlinefile" type="file" value="<?php echo $project1['hdlinefile'];?>">

<div class="input-field col s12 eighthborder" id="hdline_name">
<input  id="hdline_name1" name="hdline_name" type="text" value="<?php echo $project1['hdline_name'];?>" Style="margin-left: -14px !important;
    width: 104% !important;">
<label  for="hdline_name1" style="">H.D Line</label>
</div>

<input  id="hdlinefile_name" name="hdlinefile_name" type="hidden" value="<?php echo $project1['hdlinefile'];?>">
<?php if($project1['hdlinefile']!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/hdline/<?php echo $project1['hdlinefile'];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?></div></th>	
</tr>

</thead>
</table>

<?php } ?>		

 <div class="product totallandvalall" id="table">
 
   <!--  table Start Mobile--> 	
 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>
 
 <table class="highlight">
			  
		  
			  
          <thead>
			    
		  	<tr style="background: #ddd;">
<th colspan="2">Land</th>
</tr>
<tr>
<th colspan="1" style="width: 30%;">Patta</th><th colspan="1"><label>
<input type="checkbox" class="filled-in" name="pattavisible" id="pattavisible" <?php if($project1['pattavisible']=='Yes') { ?> checked<?php } ?> value="Yes"><span>Visible</span></label></th></tr>
<tr>
<th  style="width: 30%;">Document</th><th><label>
<input type="checkbox" class="filled-in" name="documentvisible" id="documentvisible" <?php if($project1['documentvisible']=='Yes') { ?> checked<?php } ?> value="Yes"><span>Visible</span></label></th>
</tr>
		  		                  </thead>
                
<?php if($project1['totallandvalue']!='')	 {
$totallandvalue2=explode(",",$project1['totallandvalue']);	
$northboundary=explode(",",$project1['northboundary']);
$southboundary=explode(",",$project1['southboundary']);
$eastboundary=explode(",",$project1['eastboundary']);
$westboundary=explode(",",$project1['westboundary']);
$land_description=explode(",",$project1['land_description']);
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
		
foreach($totallandvalue2 as $countproper1 =>$key1) {	$valdel="55".$countproper1;
	?>			
				
<tbody <?php if($countproper1>0) {?> class="newTR<?php echo $valdel; ?>" <?php } else { ?> class="newTR1"  <?php } ?>>
					  <tr><td colspan="2">Descrption</td></tr>
				  <tr>  <td colspan="2"> <textarea id="land_description" name="land_description[]" rows="3" cols="23" style="    height: 3rem;">
<?php echo $land_description[$countproper1];?>
</textarea></td></tr>
					
				   <tr >
		            <td  colspan="2">North</td></tr >
					<tr><td colspan="2"><textarea id="boundary1" name="northboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $northboundary[$countproper1];?></textarea></td></tr >

				    <tr><th class="pattashow">Patta   </th><td class="pattashow"><input  id="north1" name="north1[]" type="number"  value="<?php echo $north1[$countproper1];?>" style="width:45% !important;"><input  id="north2" name="north2[]" type="number" value="<?php echo $north2[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="north3" name="north3[]" type="number"  readonly value="<?php echo $north3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
                     <tr><th class="documentshow">Document </th><td class="documentshow"><input  id="north4" name="north4[]" type="number" value="<?php echo $north4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="north5" name="north5[]" type="number" value="<?php echo $north5[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="north6" name="north6[]" type="number" readonly value="<?php echo $north6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					 <tr><td>Actual</td><td><input  id="north7" name="north7[]" type="number" value="<?php echo $north7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="north8" name="north8[]" type="number" value="<?php echo $north8[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="north9" name="north9[]" type="number" readonly value="<?php echo $north9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					
                  </tr> 
                  <tr>
		            <td  colspan="2">South</td></tr>
					<tr><td colspan="2"><textarea id="southboundary" name="southboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $southboundary[$countproper1];?></textarea></td></tr>
				    <tr><th class="pattashow">Patta   </th> <td class="pattashow"><input  id="south1" name="south1[]" type="number" value="<?php echo $south1[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south2" name="south2[]" type="number" value="<?php echo $south2[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="south3" name="south3[]" type="number" readonly value="<?php echo $south3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
                     <tr><th class="documentshow">Document </th><td class="documentshow"><input  id="south4" name="south4[]" type="number" value="<?php echo $south4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south5" name="south5[]" type="number" value="<?php echo $south5[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="south6" name="south6[]" type="number" readonly value="<?php echo $south6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					 <tr><td>Actual</td><td><input  id="south7" name="south7[]" type="number" value="<?php echo $south7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south8" name="south8[]" type="number" value="<?php echo $south8[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south9" name="south9[]" type="number" readonly value="<?php echo $south9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					
                  </tr>
                 <tr>
		            <td colspan="2">East</td> </tr>
					<tr><td colspan="2"><textarea id="eastboundary" name="eastboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $eastboundary[$countproper1];?></textarea></td> </tr>
				     <tr><th class="pattashow">Patta   </th> <td class="pattashow"><input  id="east1" name="east1[]" type="number" value="<?php echo $east1[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east2" name="east2[]" type="number" value="<?php echo $east2[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east3" name="east3[]" type="number" readonly value="<?php echo $east3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
                     <tr><th class="documentshow">Document </th><td class="documentshow"><input  id="east4" name="east4[]" type="number" value="<?php echo $east4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east5" name="east5[]" type="number" value="<?php echo $east5[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east6" name="east6[]" type="number" readonly value="<?php echo $east6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					  <tr><td>Actual</td><td><input  id="east7" name="east7[]" type="number" value="<?php echo $east7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east8" name="east8[]" type="number" value="<?php echo $east8[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east9" name="east9[]" type="number" readonly value="<?php echo $east9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					
                  </tr>
                      <tr>
		            <td colspan="2">West</td></tr>
					<td colspan="2"><textarea id="westboundary" name="westboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $westboundary[$countproper1];?></textarea></td></tr>
				     <tr><th class="pattashow">Patta   </th> <td class="pattashow"><input  id="west1" name="west1[]" type="number" value="<?php echo $west1[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west2" name="west2[]" type="number" value="<?php echo $west2[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west3" name="west3[]" type="number" readonly value="<?php echo $west3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
                     <tr><th class="documentshow">Document </th><td class="documentshow"><input  id="west4" name="west4[]" type="number" value="<?php echo $west4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west5" name="west5[]" type="number" value="<?php echo $west5[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west6" name="west6[]" type="number" readonly value="<?php echo $west6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					 <tr><td>Actual</td><td><input  id="west7" name="west7[]" type="number" value="<?php echo $west7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west8" name="west8[]" type="number" value="<?php echo $west8[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west9" name="west9[]" type="number" readonly value="<?php echo $west9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td></tr>
					
                  </tr>	

 <tr>
		           <tr> <td  colspan="2">Extent of Site </td></tr>
				    <tr><td class="pattashow">Patta   </td> <td class="pattashow"><input  id="estent1" name="estent1[]" readonly type="text" value="<?php echo $estent1[$countproper1];?>" style="width:40% !important;margin-left: 3px;"></td></tr>
                    <tr><td class="documentshow">Document </td> <td class="documentshow"><input  id="estent2" name="estent2[]" type="text" readonly value="<?php echo $estent2[$countproper1];?>" style="width:40% !important;margin-left: 3px;"></td></tr>
					 <tr><td>Actual</td><td><input  id="estent3" name="estent3[]" type="text" readonly value="<?php echo $estent3[$countproper1];?>" style="width:40% !important;margin-left: 3px;"></td></tr>
					
                  </tr>		

 <tr>

				     <tr><td>Total Area if Any</td><td><input  id="anyarea" name="anyarea[]"  type="text" value="<?php echo $anyarea[$countproper1];?>"></td></tr>	
                   <tr> <td>Dimension of the</td><td><input  id="dimensionsite" name="dimensionsite[]"  type="text" value="<?php echo $dimensionsite[$countproper1];?>"></td></tr>	
					<tr><td>Total Area</td><td><input  id="totalarea" class="totalareatot" name="totalarea[]"  type="text" value="<?php echo $totalarea[$countproper1];?>"></td></tr>	
                    <tr> <td>Rate</td><td><input  id="totalrate" name="totalrate[]"  type="text" value="<?php echo $totalrate[$countproper1];?>"></td></tr>	
					<tr> <td>Land Value Total</td><td><input  class="totallandvalue" id="totallandvalue" name="totallandvalue[]" readonly type="text" value="<?php echo $totallandvalue[$countproper1];?>">    </td></tr>	
					
				
                  </tr>		
				  
	
<style>
.select-wrapper input.select-dropdown {
    display: none;	
}
</style>

 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>
<tr>
<th colspan="1">Type of Property</th>
<th colspan="1"><select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
				<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th> 
</tr>
		

<tr>
<th colspan="1">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
				<tr>
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $resentsaledetails2[$countproper1];?>"></th>				
				</tr>
<tr>
<th colspan="1">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
				<tr>
<th>Control Limit</th>
<th> 	  <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select>  <a href="#" id="remove_more" class="dnewTR<?php echo $valdel; ?>" <?php if($countproper1>0) {?> style="    float: right;color:red;" <?php } else {?> style="    float: right;color:red;display:none;" <?php } ?> >Remove(X)</a> </th>

				</tr>
				
 <?php } else {?>

<tr>
<th colspan="2">Type of Property</th>
<th colspan="1"><select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
				<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th> <th></th>
</tr>
		

<tr>
<th colspan="2">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
<?php if(1!=1)	
{?>	
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $resentsaledetails2[$countproper1];?>"></th>				<th></th>
<?php } ?>
<th>Control Limit</th>
<th> 	  <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select>  <a href="#" id="remove_more" class="dnewTR<?php echo $valdel; ?>" <?php if($countproper1>0) {?> style="    float: right;color:red;" <?php } else {?> style="    float: right;color:red;display:none;" <?php } ?> >Remove(X)</a> </th>
		
		<th></th>
				</tr>
<tr>
<th colspan="2">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>

				</tr>
 <?php } ?>				
				<tr>
				
	
	<?php if(1!=1)
	{?>			
<tr>
<th colspan="1"> Roof	: </th>
<th colspan="2"><?php if($countproper1==0) { $roof2=explode(",",$project1['roof']);
if($project1['roof']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php
foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  }else if($countproper1==1) { $roof2=explode(",",$project1['roof1']);
if($project1['roof1']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof1[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  }  else if($countproper1==2) { $roof2=explode(",",$project1['roof2']);
if($project1['roof2']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof2[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else if($countproper1==3) { $roof3=explode(",",$project1['roof3']);
if($project1['roof3']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof3[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else if($countproper1==4) { $roof4=explode(",",$project1['roof4']);
if($project1['roof4']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof4[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else if($countproper1==5) { $roof4=explode(",",$project1['roof5']);
if($project1['roof5']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof5[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else { ?> <div id="a1" style="    margin-bottom: 11px;">	<div class="con1"><select name="roof[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select></div></div> <?php } ?>
<a id="btnAdd1" type="button"  style="    padding: 8px;
    background: green;
    color: white;
    border-radius: 6px;
    height: 33px !important;
    width: 33px !important;
    margin-bottom: 8px;"/>+</a>


	<?php } ?>
 <input class="delINP" id="delINP" type="hidden" value="1"/>
  <input class="addcoun" id="addcoun" type="hidden" value="1"/>
<?php } } else { ?> 


 <tbody class="newTR1">
				 <tr><td colspan="2">Descrption</td></tr>	 <tr>
				    <td colspan="2"> <textarea id="land_description" name="land_description[]" rows="3" cols="23" style="    height: 3rem;">
</textarea></td>
					</tr>  
				   <tr >
		            <td colspan="2" style="background: #ddd;">North</td></tr>
					<tr><td colspan="2"><textarea id="boundary1" name="northboundary[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td></tr >
				     <tr > 	<th class="pattashow">Patta   </th><td class="pattashow"><input  id="north1" name="north1[]" type="number"  value="" style="width:45% !important;"><input  id="north2" name="north2[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="north3" name="north3[]" type="number"  readonly value="" style="width:45% !important;margin-left: 3px;"></td></tr >
                     <tr > <th class="documentshow">Document </th> <td class="documentshow"><input  id="north4" name="north4[]" type="number" value="" style="width:45% !important;"><input  id="north5" name="north5" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="north6" name="north6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;"></td></tr >
					 <tr >  <th>Actual </th><td><input  id="north7" name="north7[]" type="number" value="" style="width:45% !important;"><input  id="north8" name="north8[]" type="number" value="<?php echo $project1['hdlinefile'];?>" style="width:45% !important;margin-left: 3px;"><input  id="north9" name="north9[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;"></td></tr >
					
                  </tr> 
                  <tr>
		            <td colspan="2" style="background: #ddd;"> South</td>   </tr> 
					<tr><td colspan="2"><textarea id="southboundary" name="southboundary[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td>     </tr> 
				     <tr > 	<th class="pattashow">Patta   </th><td class="pattashow"><input  id="south1" name="south1[]" type="number" value="" style="width:45% !important;"><input  id="south2" name="south2[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="south3" name="south3[]" type="number" readonly value=""style="width:45% !important;margin-left: 3px;"></td>
                     <tr > <th class="documentshow">Document </th> <td class="documentshow"><input  id="south4" name="south4[]" type="number" value="" style="width:45% !important;"><input  id="south5" name="south5[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="south6" name="south6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;" style="width:45% !important;margin-left: 3px;"></td>
					<tr >  <th>Actual </th> <td><input  id="south7" name="south7[]" type="number" value="" style="width:45% !important;"><input  id="south8" name="south8[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="south9" name="south9[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;"></td>
					
                  </tr>
                 <tr>
		            <td colspan="2" style="background: #ddd;">East</td></tr>
					<tr><td colspan="2"><textarea id="eastboundary" name="eastboundary[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td></tr>
				      <tr > 	<th class="pattashow">Patta   </th><td class="pattashow"><input  id="east1" name="east1[]" type="number" value="" style="width:45% !important;"><input  id="east2" name="east2[]" type="number" value=""  style="width:45% !important;margin-left: 3px;"><input  id="east3" name="east3[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;"></td>
                   <tr > <th class="documentshow">Document </th>  <td class="documentshow"><input  id="east4" name="east4[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="east5" name="east5[]" type="number" value=""  style="width:45% !important;margin-left: 3px;"><input  id="east6" name="east6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;"></td>
					<tr >  <th>Actual </th> <td><input  id="east7" name="east7[]" type="number" value=""style="width:45% !important;"><input  id="east8" name="east8[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="east9" name="east9[]" type="number" readonly value=""style="width:45% !important;margin-left: 3px;"></td>
					
                  </tr>
                      <tr>
		            <td colspan="2" style="background: #ddd;">West</td></tr>
					<tr><td  colspan="2"><textarea id="westboundary" name="westboundary[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td></tr>
				     <tr > 	<th class="pattashow">Patta   </th><td class="pattashow"><input  id="west1" name="west1[]" type="number" value="" style="width:45% !important;"><input  id="west2" name="west2[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="west3" name="west3[]" type="number" readonly value=""style="width:45% !important;margin-left: 3px;"></td></tr>
                    <tr > <th class="documentshow">Document </th>  <td class="documentshow"><input  id="west4" name="west4[]" type="number" value=""  style="width:45% !important;margin-left: 3px;"><input  id="west5" name="west5[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="west6" name="west6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;"></td></tr>
					<tr >  <th>Actual </th>  <td><input  id="west7" name="west7[]" type="number" value=""  style="width:45% !important;"><input  id="west8" name="west8[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="west9" name="west9[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;"></td></tr>
					
                  </tr>	

 <tr style="background: #ddd;">
		            <td colspan="2">Extent of Site </td>
</tr > 
				     <tr > 	<th class="pattashow">Patta   </th><td><input  id="estent1" name="estent1[]" readonly type="text" value="" style="width:40% !important;margin-left: 3px;"></td> </tr > 
                    <tr > <th class="documentshow">Document </th> <td><input  id="estent2" name="estent2[]" type="text" readonly value="" style="width:40% !important;margin-left: 3px;"></td> </tr > 
					<tr >  <th>Actual </th> <td><input  id="estent3" name="estent3[]" type="text" readonly value="" style="width:40% !important;margin-left: 3px;"></td>
					
                  </tr>		


 <tr style="background: #ddd;"></tr > 

		            <tr>
				     <td>Total Area if Any</td><td><input  id="anyarea" name="anyarea[]"  type="text" value=""></td></tr>		
                    <tr> <td >Dimension of the</td><td><input  id="dimensionsite" name="dimensionsite[]"  type="text" value=""></td></tr>	
				    <tr> <td>Total Area</td><td><input  id="totalarea" name="totalarea[]" class="totalareatot" type="text" value=""></td></tr>	
                     <tr> <td>Rate</td><td><input  id="totalrate" name="totalrate[]"  type="text" value=""></td></tr>
					 <tr> <td>Land Value Total</td><td><input  id="totallandvalue" class="totallandvalue" name="totallandvalue[]" readonly type="text" value="">     </td></tr>
					
                  </tr>		
				  
 <tr> <td></td>
		            
					
                  </tr>		
<style>
.select-wrapper input.select-dropdown {
    display: none;	
}
</style>
 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>
<tr>
<th colspan="1">Type of Property</th>
<th colspan="1"><select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>				
				<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th>
			
</tr>
	

<tr>
<th colspan="1">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
<tr>
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $project1['resentsaledetails'];?>"></th>	
				</tr>
<tr>
<th colspan="1">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
<tr>
<th>Control Limit</th>
<th> 	  <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select> <a href="#" id="remove_more" class="" style="    float: right;color:red;display:none;" >Remove(X)</a> </th>	

			
				</tr>
				
	 <?php } else { ?>		

<tr>
<th colspan="2">Type of Property</th>
<th colspan="1"><select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
				<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th>
				<th></th>
</tr>
	

<tr>
<th colspan="2">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
<?php if(1!=1) {?>				
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $project1['resentsaledetails'];?>"></th>	<th></th>	
<?php } ?>	

<th>Control Limit</th>
<th> 	  <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select> <a href="#" id="remove_more" class="" style="    float: right;color:red;display:none;" >Remove(X)</a> </th>	

				<th></th>	
				</tr>
<tr>
<th colspan="2">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>

				</tr>

	 <?php } ?>	 
	<?php if(1!=1)
	{?>		
<tr>
<th colspan="1"> Roof	: </th>
<th colspan="2"> <div id="a1" style="    margin-bottom: 11px;">	<div class="con1"><select name="roof[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select></div></div>
<a id="btnAdd1" type="button"  style="    padding: 8px;
    background: green;
    color: white;
    border-radius: 6px;
    height: 33px !important;
    width: 33px !important;
    margin-bottom: 8px;"/>+</a>
</th>
</tr>	
	<?php } ?>
				  

 <input class="delINP" id="delINP" type="hidden" value="1"/>
  <input class="addcoun" id="addcoun" type="hidden" value="1"/>
  
  
	
	
  </tbody> 
  
<?php } ?>  




  </table>
  
  
  
  <?php } else { ?> 
  
     <!--  table Start Mobile end--> 
	 
	 
	 
	  <table class="highlight" style="margin-top: 9px;">
			  
		  
			  
          <thead>
			   
		  	<tr style="">
<th style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important; border-bottom: 1px solid gray;padding: 5px 8px !important;">Land</th>
<th colspan="2" style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important; border-bottom: 1px solid gray;padding: 5px 8px !important;"></th>
<th style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important; border-bottom: 1px solid gray;padding: 5px 8px !important;">Actual</th>
<th style="border-top: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important; border-bottom: 1px solid gray;padding: 5px 8px !important;">Patta<label>
                <input type="checkbox" class="filled-in" name="pattavisible" id="pattavisible" <?php if($project1['pattavisible']=='Yes') { ?> checked<?php } ?> value="Yes"><span>Visible</span></label></th>
<th style="border-top: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important; ; border-bottom: 1px solid gray;padding: 5px 8px !important;">Document<label>
                <input type="checkbox" class="filled-in" name="documentvisible" id="documentvisible" <?php if($project1['documentvisible']=='Yes') { ?> checked<?php } ?> value="Yes"><span>Visible</span></label></th>

</tr>
		   <tr>     <th style="border-bottom: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;">Direction</th>
		            <th colspan="2" style="border-bottom: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;">Boundary Details</th>
					<th style="border-bottom: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;">Actual</th>
				    <th class="pattashow" style="border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;">Patta   </th>
                    <th class="documentshow" style="border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;">Document </th>
			
           

</tr>  		                  </thead>
                
<?php if($project1['totallandvalue']!='')	 {
$totallandvalue2=explode(",",$project1['totallandvalue']);	
$northboundary=explode(",",$project1['northboundary']);
$southboundary=explode(",",$project1['southboundary']);
$eastboundary=explode(",",$project1['eastboundary']);
$westboundary=explode(",",$project1['westboundary']);
$land_description=explode(",",$project1['land_description']);
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
$estent=explode(",",$project1['estent']);
$sale_details=explode(",",$project1['sale_details']);
$sale_from=explode(",",$project1['sale_from']);
$sale_to=explode(",",$project1['sale_to']);
$sale_type=explode(",",$project1['sale_type']);
	
$guide_rate=explode(",",$project1['guide_rate']);
$guidevalue=explode(",",$project1['guidevalue']);
$guideselect=explode(",",$project1['guideselect']);
$guideupload=explode(",",$project1['guideupload']);
	
foreach($totallandvalue2 as $countproper1 =>$key1) {	$valdel="55".$countproper1;
	?>			
				
<tbody <?php if($countproper1>0) {?> class="newTR<?php echo $valdel; ?>" <?php } else { ?> class="newTR1"  <?php } ?>>
					  <tr><td colspan="1">Descrption</td>
				    <td colspan="2"> <textarea id="land_description" name="land_description[]" rows="3" cols="23" style="    height: 3rem;">
<?php echo $land_description[$countproper1];?>
</textarea></td>
					<td style="border:unset !important"></td><td style="border:unset !important"></td>
           <td style="border:unset !important"></td></tr>  
				   <tr >
		            <td>North</td>
					<td colspan="2"><textarea id="boundary1" name="northboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $northboundary[$countproper1];?></textarea></td>

				    <td class="pattashow"><input  id="north1" name="north1[]" type="number"  value="<?php echo $north1[$countproper1];?>" style="width:45% !important;"><input  id="north2" name="north2[]" type="number" value="<?php echo $north2[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="north3" name="north3[]" type="number"  readonly value="<?php echo $north3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
                     <td class="documentshow"><input  id="north4" name="north4[]" type="number" value="<?php echo $north4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="north5" name="north5[]" type="number" value="<?php echo $north5[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="north6" name="north6[]" type="number" readonly value="<?php echo $north6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					 <td><input  id="north7" name="north7[]" type="number" value="<?php echo $north7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="north8" name="north8[]" type="number" value="<?php echo $north8[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="north9" name="north9[]" type="number" readonly value="<?php echo $north9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					
                  </tr> 
                  <tr>
		            <td >South</td>
					<td colspan="2"><textarea id="southboundary" name="southboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $southboundary[$countproper1];?></textarea></td>
				     <td class="pattashow"><input  id="south1" name="south1[]" type="number" value="<?php echo $south1[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south2" name="south2[]" type="number" value="<?php echo $south2[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="south3" name="south3[]" type="number" readonly value="<?php echo $south3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
                     <td class="documentshow"><input  id="south4" name="south4[]" type="number" value="<?php echo $south4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south5" name="south5[]" type="number" value="<?php echo $south5[$countproper1];?>"style="width:45% !important;margin-left: 3px;"><input  id="south6" name="south6[]" type="number" readonly value="<?php echo $south6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					 <td><input  id="south7" name="south7[]" type="number" value="<?php echo $south7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south8" name="south8[]" type="number" value="<?php echo $south8[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="south9" name="south9[]" type="number" readonly value="<?php echo $south9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					
                  </tr>
                 <tr>
		            <td>East</td>
					<td colspan="2"><textarea id="eastboundary" name="eastboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $eastboundary[$countproper1];?></textarea></td>
				      <td class="pattashow"><input  id="east1" name="east1[]" type="number" value="<?php echo $east1[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east2" name="east2[]" type="number" value="<?php echo $east2[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east3" name="east3[]" type="number" readonly value="<?php echo $east3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
                     <td class="documentshow"><input  id="east4" name="east4[]" type="number" value="<?php echo $east4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east5" name="east5[]" type="number" value="<?php echo $east5[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east6" name="east6[]" type="number" readonly value="<?php echo $east6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					 <td><input  id="east7" name="east7[]" type="number" value="<?php echo $east7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east8" name="east8[]" type="number" value="<?php echo $east8[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="east9" name="east9[]" type="number" readonly value="<?php echo $east9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					
                  </tr>
                      <tr>
		            <td>West</td>
					<td colspan="2"><textarea id="westboundary" name="westboundary[]" rows="3" cols="23" style="    height: 4rem;">
<?php echo $westboundary[$countproper1];?></textarea></td>
				     <td class="pattashow"><input  id="west1" name="west1[]" type="number" value="<?php echo $west1[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west2" name="west2[]" type="number" value="<?php echo $west2[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west3" name="west3[]" type="number" readonly value="<?php echo $west3[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
                     <td class="documentshow"><input  id="west4" name="west4[]" type="number" value="<?php echo $west4[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west5" name="west5[]" type="number" value="<?php echo $west5[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west6" name="west6[]" type="number" readonly value="<?php echo $west6[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					 <td><input  id="west7" name="west7[]" type="number" value="<?php echo $west7[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west8" name="west8[]" type="number" value="<?php echo $west8[$countproper1];?>" style="width:45% !important;margin-left: 3px;"><input  id="west9" name="west9[]" type="number" readonly value="<?php echo $west9[$countproper1];?>" style="width:45% !important;margin-left: 3px;"></td>
					
                  </tr>	

 <tr>
		            <td>Extent of Site </td>
					<td colspan="2">As Per Manual<br><input  id="estent" name="estent[]"  type="number" value="<?php echo $estent[$countproper1];?>" style="width:60% !important;margin-left: 3px;"></td>
				     <td class="pattashow">As Per Patta<br><input  id="estent1" name="estent1[]"  type="number" value="<?php echo $estent1[$countproper1];?>" style="width:60% !important;margin-left: 3px;"></td>
                     <td class="documentshow">As Per Document<br><input  id="estent2" name="estent2[]" type="number"  value="<?php echo $estent2[$countproper1];?>" style="width:60% !important;margin-left: 3px;"></td>
					 <td>As Per Actual<br><input  id="estent3" name="estent3[]" type="number"  value="<?php echo $estent3[$countproper1];?>" style="width:60% !important;margin-left: 3px;"></td>
					
                  </tr>		
				   <tr><td colspan="1">Resent Sale Details</td>
				    <td colspan="2"> <textarea id="sale_details[]" name="sale_details[]" rows="3" cols="23" style="    height: 3rem;">
<?php echo $sale_details[$countproper1];?></textarea></td>
					<td colspan="2"><input  id="sale_from" name="sale_from[]"  type="number" value="<?php echo $sale_from[$countproper1];?>" style="    font-weight: bold;
    font-size: 18px;
    width: 30% !important;"> TO <input  id="sale_to" name="sale_to[]"  type="number" value="<?php echo $sale_to[$countproper1];?>"></td><td><select name="sale_type[]" id="sale_type" style="display:block">
                  <option value="" >Select</option>
				   <option <?php if($sale_type[$countproper1]=='Sq ft') {?> selected  <?php } ?> value="Sq ft" >Sq ft</option>
				    <option <?php if($sale_type[$countproper1]=='Cent') {?> selected <?php } ?> value="Cent" >Cent</option>
					 <option <?php if($sale_type[$countproper1]=='Acre') {?> selected <?php } ?>  value="Acre" >Acre</option>
				   <option <?php if($sale_type[$countproper1]=='Hectare') {?> selected <?php } ?>  value="Acre" >Hectare</option>
				    <option <?php if($sale_type[$countproper1]=='Sq.m') {?> selected <?php } ?>  value="Acre" >Sq.m</option>
                </select></td></tr>  
				<style>
.guideselect {
   width:45% !important;
margin-top: -55px;
float:right;   
}</style>
 <tr> <?php if(1!=1) {?>
		         	<td style="border:unset !important"></td>
				   <td>Total Area if Any<input  id="anyarea" name="anyarea[]"  type="text" value="<?php echo $anyarea[$countproper1];?>"></td>
                    <td>Dimension of the<br><input  id="dimensionsite" name="dimensionsite[]"  type="text" value="<?php echo $dimensionsite[$countproper1];?>"></td>
					<td  style="width:50%;border:unset !important"></td><?php  } ?>
					<td>Total Area<br><input  id="totalarea" class="totalareatot" name="totalarea[]"  type="text" value="<?php echo $totalarea[$countproper1];?>"></td>
                     <td colspan="2" >Rate <span class="assignsq" id="assignsq"><?php echo $sale_type[$countproper1]; ?></span><br><input  id="totalrate" name="totalrate[]"  type="text" value="<?php echo $totalrate[$countproper1];?>"></td>
					 <td style="    width: 15%;">Land Value Total<br><input  class="totallandvalue" id="totallandvalue" name="totallandvalue[]" readonly type="text" value="<?php echo $totallandvalue[$countproper1];?>">    </td>
					<td style="    width: 33%;">Guideline Rate<br><input  id="guide_rate" name="guide_rate[]" class="guide_rate" type="number" value="<?php echo $guide_rate[$countproper1];?>" style="
    font-size: 18px;
    width: 45% !important;"><select name="guideselect[]" id="guideselect" style="display:block" class="guideselect">
                  <option value="" >Select</option>
				   <option <?php if($guideselect[$countproper1]=='Sq ft') {?> selected  <?php } ?> value="Sq ft" >Sq ft</option>
				    <option <?php if($guideselect[$countproper1]=='Cent') {?> selected <?php } ?> value="Cent" >Cent</option>
					 <option <?php if($guideselect[$countproper1]=='Acre') {?> selected <?php } ?> value="Acre" >Acre</option>
					 				 <option <?php if($guideselect[$countproper1]=='Hectare') {?> selected <?php } ?> value="Acre" >Hectare</option>
									 				 <option <?php if($guideselect[$countproper1]=='Sq.m') {?> selected <?php } ?> value="Acre" >Sq.m</option>
				  
                </select></td>
					<td>Guideline Value<br><input  id="guidevalue" class="guidevalue" name="guidevalue[]" readonly type="text" value="<?php echo $guidevalue[$countproper1];?>"> <br> <input  id="guideupload" name="guideupload[]" type="file" value="" style="    width: 100% !important;"><?php if($guideupload[$countproper1]!='')  {?> <a target="_blank" href="<?php echo $web_url; ?>documents/guide/<?php echo $guideupload[$countproper1];?>"><i class="material-icons dp48" style="color: green;font-size: 22px;font-weight: bold;">check</i>View</a><?php } ?>   </td>
				
                  </tr>		
				  
	
<style>
.select-wrapper input.select-dropdown {
    display: none;	
}
</style>

 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>
<tr>
<th colspan="1">Type of Property</th>
<th colspan="1"><select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
				<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th> 
</tr>
		

<tr>
<th colspan="1">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
				<tr>
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $resentsaledetails2[$countproper1];?>"></th>				
				</tr>
<tr>
<th colspan="1">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
				<tr>
<th>Control Limit</th>
<th> 	  <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select>  <a href="#" id="remove_more" class="dnewTR<?php echo $valdel; ?>" <?php if($countproper1>0) {?> style="    float: right;color:red;" <?php } else {?> style="    float: right;color:red;display:none;" <?php } ?> >Remove(X)</a> </th>

				</tr>
				
 <?php } else {?>

<tr>
<th colspan="1"  style="width:20%">Type of Property <select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
<th colspan="1" style="width:30%">Size of Plot<select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th>
	<th colspan="2"> Development to site
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>	
<th> 	 Control Limit <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select>  </th>
<th>Class of Construction
				 <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select><a href="#" id="remove_more" class="dnewTR<?php echo $valdel; ?>" <?php if($countproper1>0) {?> style="    float: right;color:red;" <?php } else {?> style="    float: right;color:red;display:none;" <?php } ?> >Remove(X)</a> </th>				
</tr>
		


 <?php } ?>				
				<tr>
				
	
	<?php if(1!=1)
	{?>			
<tr>
<th colspan="1"> Roof	: </th>
<th colspan="2"><?php if($countproper1==0) { $roof2=explode(",",$project1['roof']);
if($project1['roof']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  }else if($countproper1==1) { $roof2=explode(",",$project1['roof1']);
if($project1['roof1']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof1[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  }  else if($countproper1==2) { $roof2=explode(",",$project1['roof2']);
if($project1['roof2']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof2[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else if($countproper1==3) { $roof3=explode(",",$project1['roof3']);
if($project1['roof3']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof3[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else if($countproper1==4) { $roof4=explode(",",$project1['roof4']);
if($project1['roof4']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof4[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else if($countproper1==5) { $roof4=explode(",",$project1['roof5']);
if($project1['roof5']!='') {
	?>
	<div id="a1" style="    margin-bottom: 11px;">
	<?php foreach($roof2 as $lengthacountproper2 =>$key) {	?>	<div class="con1" style="  "><select name="roof5[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$key) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><a type="button" class="btnRemove1" style="background: red;
    padding: 3px;
    color: white;
    border-color: red;
    font-weight: bold;
    float: right;"/>X</a></div><?php } ?> </div> 
<?php }  } else { ?> <div id="a1" style="    margin-bottom: 11px;">	<div class="con1"><select name="roof[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select></div></div> <?php } ?>
<a id="btnAdd1" type="button"  style="    padding: 8px;
    background: green;
    color: white;
    border-radius: 6px;
    height: 33px !important;
    width: 33px !important;
    margin-bottom: 8px;"/>+</a>


	<?php } ?>
 <input class="delINP" id="delINP" type="hidden" value="1"/>
  <input class="addcoun" id="addcoun" type="hidden" value="1"/>
<?php } } else { ?> 


 <tbody class="newTR1">
				 <tr><td colspan="1" style="border-left: 1px solid gray;padding: 5px 8px !important;">Descrption</td>
				    <td colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;"> <textarea id="land_description" name="land_description[]" rows="3" cols="23" style="    height: 3rem;">
</textarea></td>
					<td class="pattashow" style="border-left: 1px solid gray;padding: 5px 8px !important;"></td><td class="documentshow"></td>
           <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"></td></tr>  
				   <tr >
		            <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">North</td>
					<td colspan="2" style="    width: 24%;border-left: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"><textarea id="boundary1" name="northboundary[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td>
 <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="north7" name="north7[]" type="number" value="" style="width:45% !important;"><input  id="north8" name="north8[]" type="number" value="<?php echo $project1['hdlinefile'];?>" style="width:45% !important;margin-left: 3px;"><input  id="north9" name="north9[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
				    <td class="pattashow" style="border-top: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"><input  id="north1" name="north1[]" type="number"  value="" style="width:45% !important;"><input  id="north2" name="north2[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="north3" name="north3[]" type="number"  readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
                     <td class="documentshow" style="border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="north4" name="north4[]" type="number" value="" style="width:45% !important;"><input  id="north5" name="north5" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="north6" name="north6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
					
					
                  </tr> 
                  <tr>
		            <td style="border-left: 1px solid gray;padding: 5px 8px !important;">South</td>
					<td colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;"><textarea id="southboundary" name="southboundary[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td>
	 <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="south7" name="south7[]" type="number" value="" style="width:45% !important;"><input  id="south8" name="south8[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="south9" name="south9[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
				     <td class="pattashow" style="border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="south1" name="south1[]" type="number" value="" style="width:45% !important;"><input  id="south2" name="south2[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="south3" name="south3[]" type="number" readonly value=""style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
                     <td class="documentshow" style="border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="south4" name="south4[]" type="number" value="" style="width:45% !important;"><input  id="south5" name="south5[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="south6" name="south6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
				
					
                  </tr>
                 <tr>
		            <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">East</td>
					<td colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"><textarea id="eastboundary" name="eastboundary[]" rows="3" cols="23" style="    height: 4rem;    ">
</textarea></td>
 <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;;border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="east7" name="east7[]" type="number" value=""style="width:45% !important;"><input  id="east8" name="east8[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="east9" name="east9[]" type="number" readonly value=""style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
				      <td class="pattashow" style="border-right: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"><input  id="east1" name="east1[]" type="number" value="" style="width:45% !important;"><input  id="east2" name="east2[]" type="number" value=""  style="width:45% !important;margin-left: 3px;"><input  id="east3" name="east3[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
                     <td class="documentshow" style="border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="east4" name="east4[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="east5" name="east5[]" type="number" value=""  style="width:45% !important;margin-left: 3px;"><input  id="east6" name="east6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
					
					
                  </tr>
                      <tr>
		            <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">West</td>
					<td  colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"><textarea id="westboundary" name="westboundary[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td>
		 <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="west7" name="west7[]" type="number" value=""  style="width:45% !important;"><input  id="west8" name="west8[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="west9" name="west9[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
				     <td class="pattashow" style="border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="west1" name="west1[]" type="number" value="" style="width:45% !important;"><input  id="west2" name="west2[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="west3" name="west3[]" type="number" readonly value=""style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
                     <td class="documentshow" style="border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="west4" name="west4[]" type="number" value=""  style="width:45% !important;margin-left: 3px;"><input  id="west5" name="west5[]" type="number" value="" style="width:45% !important;margin-left: 3px;"><input  id="west6" name="west6[]" type="number" readonly value="" style="width:45% !important;margin-left: 3px;    width: 45% !important;
    margin-left: 3px;
    background: #3d7509;
    color: white;
    border: unset !important;
    border-radius: 2px !important;
    text-align: center;display:none;"></td>
			
					
                  </tr>	
				  
		  

 <tr>
		            <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Extent of Site </td>
					<td colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">As Per Manual<br><input  id="estent" name="estent[]"  type="number" value="" style="width:60% !important;margin-left: 3px;"><select name="manual_type[]" id="manual_type" style="display:block;display: block;
    width: 37%;
    margin-top: -41px;
    float: right;
    height: 33px;" class="assignast1">
                  <option value="" >Select</option>
				  <option value="Sq ft" >Sq ft</option>
				  <option value="Cent" >Cent</option>
				  <option value="Acre" >Acre</option>
				  <option value="Hectare" >Hectare</option>
				  <option value="Sq m" >Sq m</option>
				</select><span id="manualtype"></span></td>
					 <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;width:21% !important;">As Per Actual<input type="radio" id="est3" name="est3" value="ON"><label style="margin-left: 21px;font-size: 12px;color: black;">ON</label> <input type="radio" id="est3" name="est3" value="OFF"> <label style="margin-left: 21px;font-size: 12px;color: black;">OFF</label><br><input  id="estent3" name="estent3[]" type="number"  value="" style="width:60% !important;margin-left: 3px;"><select name="actual_type[]" id="actual_type" style="display:block;display: block;
    width: 37%;
    margin-top: -41px;
    float: right;
    height: 33px;" class="assignast1">
                  <option value="" >Select</option>
				  <option value="Sq ft" >Sq ft</option>
				  <option value="Cent" >Cent</option>
				  <option value="Acre" >Acre</option>
				  <option value="Hectare" >Hectare</option>
				  <option value="Sq m" >Sq m</option>
				</select><span id="actualtype"></span></td>
				     <td class="pattashow" style="
    border-right: 1px solid gray;padding: 5px 8px !important;width: 23%;
">As Per Patta<input type="radio" id="est1" name="est1" value="ON"><label style="margin-left: 21px;font-size: 12px;color: black;">ON</label> <input type="radio" id="est1" name="est1" value="OFF"> <label style="margin-left: 21px;font-size: 12px;color: black;">OFF</label><br><input  id="estent1" name="estent1[]"  type="number" value="" style="width:60% !important;margin-left: 3px;"><select name="patta_type[]" id="patta_type" style="display:block;display: block;
    width: 37%;
    margin-top: -41px;
    float: right;
    height: 33px;" class="assignast1">
                  <option value="" >Select</option>
				  <option value="Sq ft" >Sq ft</option>
				  <option value="Cent" >Cent</option>
				  <option value="Acre" >Acre</option>
				  <option value="Hectare" >Hectare</option>
				  <option value="Sq m" >Sq m</option>
				</select><span id="pattatype"></span></td>
                     <td class="documentshow" style="border-right: 1px solid gray;padding: 5px 8px !important;">As Per Document<input type="radio" id="est2" name="est2" value="ON"><label style="margin-left: 21px;font-size: 12px;color: black;">ON</label> <input type="radio" id="est2" name="est2" value="OFF"> <label style="margin-left: 21px;font-size: 12px;color: black;">OFF</label><br> <input  id="estent2" name="estent2[]" type="number"  value="" style="width:60% !important;margin-left: 3px;"><select name="document_type[]" id="document_type" style="display:block;display: block;
    width: 37%;
    margin-top: -41px;
    float: right;
    height: 33px;" class="assignast1">
                  <option value="" >Select</option>
				  <option value="Sq ft" >Sq ft</option>
				  <option value="Cent" >Cent</option>
				  <option value="Acre" >Acre</option>
				  <option value="Hectare" >Hectare</option>
				  <option value="Sq m" >Sq m</option>
				</select><span id="documentype"></span></td>
					
					
                  </tr>		
				  
				  <tr><td colspan="1" style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Resent Sale Details</td>
				    <td colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"> <textarea id="sale_details[]" name="sale_details[]" rows="3" cols="23" style="    height: 3rem;">
</textarea></td>
					<td colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;"><input  id="sale_from" name="sale_from[]"  type="number" value="" style="font-weight:bold;font-size:18px;    width: 40% !important;"> TO <input  id="sale_to" name="sale_to[]"  type="number" value=""></td><td style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;border-top: 1px solid gray;padding: 5px 8px !important;"><select name="sale_type[]" id="sale_type" style="display:block" class="assignast1">
                  <option value="" >Select</option>
				  <option value="Sq ft" >Sq ft</option>
				  <option value="Cent" >Cent</option>
				  <option value="Acre" >Acre</option>
				  <option value="Hectare" >Hectare</option>
				  <option value="Sq m" >Sq m</option>
				</select></td></tr>  

 <tr>
 <style>
.guideselect {
   width:45% !important;
margin-top: -55px;
float:right;   
}
</style>
 
<?php if(1!=1) {?>
		            <td  style="border:unset !important"></td>
			
				     <td colspan="2"  style="border:unset !important">		<?php if(1!=1) {?>Total Area if Any<input  id="anyarea" name="anyarea[]"  type="text" value=""><?php } ?></td>
                  	  <td style="border: 1px solid gray;padding: 5px 8px !important;">	Dimension of the<br><input  id="dimensionsite" name="dimensionsite[]"  type="text" value=""></td><?php } ?> 
					  
				     <td style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Total Area<br><input  id="totalarea" name="totalarea[]" class="totalareatot" type="text" value=""></td>
                     <td colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;" >Rate <span class="assignsq" id="assignsq"></span><br><input  id="totalrate" name="totalrate[]"  type="text" value=""></td>
					 <td style="width:15%;border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Land Value Total<br><input  id="totallandvalue" class="totallandvalue" name="totallandvalue[]" readonly type="text" value="">     </td>
					<td style="width: 23%;border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Guideline Rate<br><input  id="guide_rate" name="guide_rate[]"  class="guide_rate" type="number" value="" style="
    font-size: 18px;
    width: 45% !important;border: 1px solid gray;padding: 5px 8px !important;"><select name="guideselect[]" id="guideselect" style="display:block;argin-top: -51px;" class="guideselect">
                    <option value="" >Select</option>
				    <option value="Sq ft" >Sq ft</option>
				    <option value="Cent" >Cent</option>
					<option value="Acre" >Acre</option>
					<option value="Hectare" >Hectare</option>
					<option value="Sq m" >Sq m</option>
				  
                </select> </td>
					<td style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;">Guideline Value<br><input  id="guidevalue" class="guidevalue" name="guidevalue[]" readonly type="text" value="">   <input  id="guideupload" name="guideupload[]" type="file" value="" style="    width: 100% !important;">   </td>
                  </tr>		
				  
	
<style>
.select-wrapper input.select-dropdown {
    display: none;	
}
</style>
 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>
<tr>
<th colspan="1" style="">Type of Property</th>
<th colspan="1"><select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>				
				<th>Size of Plot</th>
<th> <select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th>
			
</tr>
	

<tr>
<th colspan="1">Development to site</th>
<th>
				<select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
<tr>
<th>Resent Sale Details</th>
<th>  <input  id="resentsaledetails" name="resentsaledetails[]" type="text"  value="<?php echo $project1['resentsaledetails'];?>"></th>	
				</tr>
<tr>
<th colspan="1">Class of Construction</th>
<th>
				 <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
				</tr>
<tr>
<th>Control Limit</th>
<th> 	  <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select> <a href="#" id="remove_more" class="" style="    float: right;color:red;display:none;" >Remove(X)</a> </th>	

			
				</tr>
				
	 <?php } else { ?>		

<tr>
<th colspan="1" style="width:16%;border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Type of Property <select name="typeofproperty[]" id="typeofproperty" style="display:block">
                  <option value="" >Type of Property </option>
				  <?php
				  $typeofproperty = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofproperty order by id asc"); 
while ($typeofproperty1 = mysqli_fetch_array($typeofproperty)) {?>
                  <option value="<?php echo $typeofproperty1['id'];?>" <?php if($typeofproperty1['id']==$typeofproperty2[$countproper1]) {?> selected <?php } ?>><?php echo $typeofproperty1['name'];?></option>
<?php } ?>
                </select></th>
<th colspan="1" style="width:20%; border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Size of Plot <select name="sizeofplot[]" id="sizeofplot" style="display:block">
                  <option value="" >Size of Plot</option>
				  <?php
				  $sizeofplot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  sizeofplot order by id asc"); 
while ($sizeofplot1 = mysqli_fetch_array($sizeofplot)) {?>
                  <option value="<?php echo $sizeofplot1['id'];?>" <?php if($sizeofplot1['id']==$sizeofplot2[$countproper1]) {?> selected <?php } ?>><?php echo $sizeofplot1['name'];?></option>
<?php } ?>
                </select></th>
				<th colspan="2" style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Development to site <select name="recentdevelopmentsnear[]" id="recentdevelopmentsnear" style="display:block">
                  <option value="" >Select</option>
				  <?php
				  $recentdevelopments = mysqli_query($GLOBALS['connect'],"SELECT * FROM  recentdevelopments order by id asc"); 
while ($recentdevelopments1 = mysqli_fetch_array($recentdevelopments)) {?>
                  <option value="<?php echo $recentdevelopments1['id'];?>" <?php if($recentdevelopments1['id']==$recentdevelopmentsnear2[$countproper1]) {?> selected <?php } ?>><?php echo $recentdevelopments1['name'];?></option>
<?php } ?>
                </select></th>
<th style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"> Control Limit <select name="limits[]" id="limits" style="display:block">
                  <option value="" selected>Limit</option>
				  <?php
				  $limits = mysqli_query($GLOBALS['connect'],"SELECT * FROM  limits order by id asc"); 
while ($limits1 = mysqli_fetch_array($limits)) {?>
                  <option <?php if($limits1['id']==$limits2[$countproper1]) {?> selected <?php } ?> value="<?php echo $limits1['id'];?>"><?php echo $limits1['name'];?></option>
<?php } ?>
                </select></th>
				<th style="border-left: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;">Class of Construction  <select name="classofconstruction[]" id="classofconstruction" style="display:block">
                  <option value="" selected>Class of Construction</option>
				  <?php
				  $classofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  classofconstruction order by id asc"); 
while ($classofconstruction1 = mysqli_fetch_array($classofconstruction)) {?>
                  <option value="<?php echo $classofconstruction1['id'];?>" <?php if($classofconstruction1['id']==$classofconstruction2[$countproper1]) {?> selected <?php } ?>><?php echo $classofconstruction1['name'];?></option>
<?php } ?>
                </select><a href="#" id="remove_more" class="" style="    float: right;color:red;display:none;" >Remove(X)</a> </th>
</tr>
	



	 <?php } ?>	 
	<?php if(1!=1)
	{?>		
<tr>
<th colspan="1"> Roof	: </th>
<th colspan="2"> <div id="a1" style="    margin-bottom: 11px;">	<div class="con1"><select name="roof[]" id="roof" style="display:block;    border: 1px solid;
    margin-top: 33px;">
                  <option value="" selected>Roof</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select></div></div>
<a id="btnAdd1" type="button"  style="    padding: 8px;
    background: green;
    color: white;
    border-radius: 6px;
    height: 33px !important;
    width: 33px !important;
    margin-bottom: 8px;"/>+</a>
</th>
</tr>	
	<?php } ?>
				  

 <input class="delINP" id="delINP" type="hidden" value="1"/>
  <input class="addcoun" id="addcoun" type="hidden" value="1"/>
  
  
	
	
  </tbody> 
  
<?php } ?>  




  </table>
  
  
  
  <?php } ?> 
  

  
 	</div>	
	
<div style="    margin-top: 16px;
    margin-bottom: 16px;">		
			  <a href="#" id="add_more" style="    padding: 6px;
    border: 1px solid;">Add More Rows</a>   
			  </div>
	 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>	
<div id="" class="col s12">
<table class="totallandvalall" style="margin-left: -8px;">
<tbody>
<tr><td>Total Sq.ft</td><td><input id="totalareaval" name="totalareaval" type="text" value="<?php echo $project1['totalareaval'];?>"></td></tr>
<tr><td>Guideline Rate</td><td><input  id="guideline_rate" name="guideline_rate" type="text"  value="<?php echo $project1['guideline_rate'];?>"></td></tr>
<tr><td colspan="2" style="text-align: center;">Land Value</td></tr>
<tr><td>1.Market Value</td><td><input  id="market_value" name="market_value" type="text"  value="<?php echo $project1['market_value'];?>"></td></tr>
<tr><td>2.Reasonable value
<select name="reasonable_perce1" id="reasonable_perce1" style="display:block;width:30%;" > <option value="" selected>Percentage</option><?php
				  $reasonable_perce = mysqli_query($GLOBALS['connect'],"SELECT * FROM  reasonable_value order by id asc"); 
while ($reasonable_perce1 = mysqli_fetch_array($reasonable_perce)) {?>
                  <option <?php if($reasonable_perce1['name']==$project1['reasonable_perce1']) {?> selected <?php } ?> value="<?php echo $reasonable_perce1['name'];?>"><?php echo $reasonable_perce1['name'];?>%</option>
<?php } ?>
                </select><?php if(1!=1) {?><input  id="reasonable_perce" name="reasonable_perce" type="text"  value="<?php echo $project1['reasonable_perce'];?>" 	<?php if($deviceType=='phone' || $deviceType=='tablet') {?>style="width: 30%;margin-right: 112px;margin-top: -31px;" <?php } else {?> style="width: 30%;float: right;margin-right: 112px;margin-top: -31px;" <?php } ?>><?php } ?></td><td><input  id="reasonable_value" name="reasonable_value" type="text"  value="<?php echo $project1['reasonable_value'];?>"></td></tr>
<tr><td>3.Forced value<br><input  id="forced_percen1" name="forced_percen1" type="text"  value="<?php echo $project1['forced_percen1'];?>" placeholder="%" style="width:30%;"><?php if(1!=1) {?> <input  id="forced_percen" name="forced_percen" type="text"  value="<?php echo $project1['forced_percen'];?>" placeholder="Percentage" style="width:30%;"> Market<?php } ?></td><td><input  id="forced_value" name="forced_value" type="text"  value="<?php echo $project1['forced_value'];?>"></td></tr>
<tr><td>4.Guideline value</td><td><input  id="guideline_value" name="guideline_value" type="text"  value="<?php echo $project1['guideline_value'];?>"></td></tr>
</tbody>
</table>

</div>
	 <?php  } else {?> 
	 
	 <div id="" class="col s6">
</div>		
<div id="" class="col s6 totallandvalall">
<table class="totallandval">
<tbody>
<tr><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;">Total Sq.ft</td><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input id="totalareaval" name="totalareaval" type="text" value="<?php echo $project1['totalareaval'];?>"></td></tr>
<tr><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;">Total Guideline value</td><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;"><input  id="guideline_value" name="guideline_value" type="text"  value="<?php echo $project1['guideline_value'];?>"><input  id="guideline_rate" name="guideline_rate" type="hidden"  value="<?php echo $project1['guideline_rate'];?>"></td></tr>
<?php if(1!=1) {?>
<tr><td style="border: 1px solid gray;padding: 5px 8px !important;">Guideline Rate</td><td style="border: 1px solid gray;padding: 5px 8px !important;"><input  id="guideline_rate" name="guideline_rate" type="text"  value="<?php echo $project1['guideline_rate'];?>"></td></tr>
<?php } ?>
<tr><td colspan="2" style="text-align: center;" style="border: 1px solid gray;padding: 5px 8px !important;">Land Value</td></tr>
<tr><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;">1.Market Value</td><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="market_value" name="market_value" type="text"  value="<?php echo $project1['market_value'];?>"></td></tr>
<tr><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;">2.Reasonable value
<select name="reasonable_perce1" id="reasonable_perce1" style="display:block;width:100%;" > <option value="" selected>Percentage</option><?php
				  $reasonable_perce = mysqli_query($GLOBALS['connect'],"SELECT * FROM  reasonable_value order by id asc"); 
while ($reasonable_perce1 = mysqli_fetch_array($reasonable_perce)) {?>
                  <option <?php if($reasonable_perce1['name']==$project1['reasonable_perce1']) {?> selected <?php } ?> value="<?php echo $reasonable_perce1['name'];?>"><?php echo $reasonable_perce1['name'];?>%</option>
<?php } ?>
                </select><input  id="reasonable_perce" name="reasonable_perce" type="hidden"  value="<?php echo $project1['reasonable_perce'];?>" style="width: 30%;float: right;margin-right: 112px;margin-top: -31px;"></td><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;"><input  id="reasonable_value" name="reasonable_value" type="text"  value="<?php echo $project1['reasonable_value'];?>"></td></tr>
<tr><td style="border-top: 1px solid gray;padding: 5px 8px !important;;border-bottom: 1px solid gray;border-left: 1px solid gray;padding: 5px 8px !important;">3.Forced value<br><input  id="forced_percen1" name="forced_percen1" type="text"  value="<?php echo $project1['forced_percen1'];?>" placeholder="%" style="width:100%;"> <input  id="forced_percen" name="forced_percen" type="hidden"  value="<?php echo $project1['forced_percen'];?>" placeholder="Percentage" style="width:30%;"> <?php if(1!=1) {?>Market<?php } ?></td><td style="border-top: 1px solid gray;padding: 5px 8px !important;border-bottom: 1px solid gray;padding: 5px 8px !important;border-left: 1px solid gray;padding: 5px 8px !important;border-right: 1px solid gray;padding: 5px 8px !important;"><input  id="forced_value" name="forced_value" type="text"  value="<?php echo $project1['forced_value'];?>"></td></tr>
<?php if(1!=1) {?>
<tr><td style="border: 1px solid gray;padding: 5px 8px !important;">4.Guideline value</td><td style="border: 1px solid gray;padding: 5px 8px !important;"><input  id="guideline_value" name="guideline_value" type="text"  value="<?php echo $project1['guideline_value'];?>"></td></tr><?php } ?>
</tbody>
</table>

</div> 
	 <?php } ?>


				 <?php if($deviceType=='phone' || $deviceType=='tablet') {?>		
	
		 <div class="col x6 s6 mb-6" style="    margin-top: 23px;">
					  <input type="submit"  name="save"  value="Save"  style=" margin-left:3%; background-color:  #d32e09;width: 100%;color:white;    color: white;
    border-radius: 9px;
    padding: 0px;
    border-color: #d32e09;">
					</div>
<div class="col x6 s6 mb-6" style="    margin-top: 23px;">
					
					 <input type="submit"  name="next"  value="Next >"  style=" margin-left:3%; background-color: green;width: 100%;color:white;    color: white;
    border-radius: 9px;
    padding: 0px;
    border-color: green;" >
					 
					<input type="hidden" name="step1" value="step1"> 
                    </div>
				 <?php } else {?>


<div class="col xl6 s12 mb-6">
				  </div>
		 <div class="col xl6 s4 mb-3" style="    margin-top: 23px;">
					  <input type="submit"  name="save"  value="Save"  style=" margin-left:3%; background-color:  #d32e09;width: 18%;color:white;    color: white;
    border-radius: 9px;
    padding: 0px;
    border-color: #d32e09;">
					

					
					 <input type="submit"  name="next"  value="Next >"  style=" margin-left:3%; background-color: green;width: 18%;color:white;    color: white;
    border-radius: 9px;
    padding: 0px;
    border-color: green;" >
					 
					<input type="hidden" name="step1" value="step1"> 
                    </div>
				 <?php } ?>
			  
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
       width: 213px;
    height: 39px;
    border: 1px solid;
    background: green;
    color: white;
    padding: 6px;
    margin-top: 7px;
    margin-bottom: 7px;">Add Another Building</p>
	
 <?php 
$project_ids=$project1['id']; 
$project_table = mysqli_query($conn,"SELECT * FROM `project_table` where 1=1 and project_id='$project_ids' ");   
$project_table1 = mysqli_fetch_array($project_table);
 
if($project_table1['area']!='' && $project_table1['area']!='0.00') 
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
					<th>Percentage</th>
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
$percentage=explode(",",$project_table1['percentage']);
$overalltotal=explode(",",$project_table1['overalltotal']);
foreach($area as $lengthacountproper =>$key) {	?>			
				   <tr >
		          
				    <td style="width:200px;"><textarea id="desc_prop" name="desc_prop[]" rows="3" cols="23" style="    height: 4rem;"><?php echo $desc_prop[$lengthacountproper]; ?></textarea></td>
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
					<td style="width: 53px;"><input  id="year" name="year[]" type="text"  value="<?php echo $year[$lengthacountproper]; ?>"></td>
								<td  style="width: 53px;" >
								<input  id="percentage" name="percentage[]" type="text"  value="<?php echo $percentage[$lengthacountproper]; ?>"></td>
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
if($project_table1['area1']!='' && $project_table1['area1']!='0.00') 
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
					<th>Percentage</th>
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
$percentage1=explode(",",$project_table1['percentage1']);
$overalltotal1=explode(",",$project_table1['overalltotal1']);
foreach($area1 as $lengthacountproper =>$key) {	?>			
				   <tr >
		          
				    <td style="width:200px;"><textarea id="desc_prop" name="desc_prop1[]" rows="3" cols="23" style="    height: 4rem;"><?php echo $desc_prop1[$lengthacountproper]; ?></textarea></td>
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
					<td style="width: 53px;"><input  id="year" name="year1[]" type="text"  value="<?php echo $year1[$lengthacountproper]; ?>"></td>
					<td  style="width: 53px;" > <input  id="percentage" name="percentage1[]" type="text"  value="<?php echo $percentage1[$lengthacountproper]; ?>"></td>
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
if($project_table1['area2']!='' && $project_table1['area2']!='0.00') 
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
					<th>Percentage</th>
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
$percentage2=explode(",",$project_table1['percentage2']);
$overalltotal2=explode(",",$project_table1['overalltotal2']);
foreach($area2 as $lengthacountproper2 =>$key) {	?>			
				   <tr >
		          
				    <td style="width:200px;"><textarea id="desc_prop" name="desc_prop2[]" rows="3" cols="23" style="    height: 4rem;"><?php echo $desc_prop2[$lengthacountproper2]; ?></textarea></td>
					<td style="width:200px;">
					<input  id="lengtha" name="lengtha2[]" type="text" placeholder="L2" value="<?php echo $lengtha2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;" >
					<input  id="lengthb" name="lengthb2[]" type="text" placeholder="L2" value="<?php echo $lengthb2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;">=
					<input  id="length" name="length2[]" type="text" placeholder="L" value="<?php echo $length2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 25%;">
					<br>
					<input  id="breadtha" name="breadtha2[]" type="text" placeholder="B2"  value="<?php echo $breadtha2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;">
					<input  id="breadthb" name="breadthb2[]" type="text" placeholder="B2"  value="<?php echo $breadthb2[$lengthacountproper2]; ?>" style="  margin-left: 20px;width: 20%;">=
					<input  id="breadth" name="breadth2[]" type="text"  placeholder="B"  value="<?php echo $breadth2[$lengthacountproper2]; ?>" style="margin-left: 20px;width: 25%;"></td>
					<td><input  id="area" name="area2[]" type="text"  value="<?php echo $area2[$lengthacountproper2]; ?>"></td>
					<td><input  id="rate" name="rate2[]" type="text"  value="<?php echo $rate2[$lengthacountproper2]; ?>"></td>
					<td style="width: 53px;"><input  id="year" name="year2[]" type="text"  value="<?php echo $year2[$lengthacountproper2]; ?>"></td>
					<td  style="width: 53px;" ><input  id="percentage" name="percentage2[]" type="text"  value="<?php echo $percentage2[$lengthacountproper2]; ?>"></td>
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
if($project_table1['area3']!='' && $project_table1['area3']!='0.00') 
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
					<th>Percentage</th>
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
$percentage3=explode(",",$project_table1['percentage3']);
$overalltotal3=explode(",",$project_table1['overalltotal3']);
foreach($area3 as $lengthacountproper3 =>$key) {	?>			
				   <tr >
		            <td style="width:200px;"><textarea id="desc_prop" name="desc_prop3[]" rows="3" cols="23" style="    height: 4rem;"><?php echo $desc_prop3[$lengthacountproper3]; ?></textarea></td>
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
					<td style="width: 53px;"><input  id="year" name="year3[]" type="text"  value="<?php echo $year3[$lengthacountproper3]; ?>"></td>
					<td  style="width: 53px;" ><input  id="percentage" name="percentage3[]" type="text"  value="<?php echo $percentage3[$lengthacountproper3]; ?>"></td>
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
					 <th>Percentage</th>
                    <th>Type Of Roofing</th>	
                    <th>Deprciation</th>
                    <th>Total</th>					

</tr>  		                  </thead>
                <tbody>
				
				   <tr >
		          
				    <td style="width:200px;"><textarea id="desc_prop" name="desc_prop[]" rows="3" cols="23" style="    height: 4rem;">
</textarea></td>
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
					<td style="width: 53px;"><input  id="year" name="year[]" type="text"  value=""></td>
				<td style="width: 53px;" class="divall"><input  id="percentage" name="percentage[]" type="text"  value=""></td>
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
<th>Services  <label><input type="checkbox" class="filled-in" name="servicevisible" id="servicevisible" <?php if($project1['servicevisible']=='Yes') { ?> checked<?php } ?> value="Yes"><span>Visible</span></label> </th>
<th></th>
<th>General Information <label><input type="checkbox" class="filled-in" name="generalvisible" id="generalvisible" <?php if($project1['generalvisible']=='Yes') { ?> checked<?php } ?> value="Yes"><span>Visible</span></label> </th>
<th></th>
</tr>
<tr>
<th class="serviceshow">Water Supply Arrangements (Rs)</th>
<th class="serviceshow"><input  class="servicetotal" id="watersupplyarrangementsRs" name="watersupplyarrangementsRs" type="number" value="<?php echo $project1['watersupplyarrangementsRs'];?>"></th>



<th class="generalshow">Type of Construction</th>
<th class="generalshow">	 <select name="typeofconstruction" id="typeofconstruction">
                  <option value="" selected>Type of Construction</option>
				  <?php
				  $typeofconstruction = mysqli_query($GLOBALS['connect'],"SELECT * FROM  typeofconstruction order by id asc"); 
while ($typeofconstruction1 = mysqli_fetch_array($typeofconstruction)) {?>
                  <option value="<?php echo $typeofconstruction1['id'];?>" <?php if($typeofconstruction1['id']==$project1['typeofconstruction']) {?> selected <?php } ?>><?php echo $typeofconstruction1['name'];?></option>
<?php } ?>
                </select></th>
</tr>



<tr>
<th class="serviceshow">Drainage Arrangements (Rs)</th>
<th class="serviceshow"><input  class="servicetotal" id="drainagearrangementsRs" name="drainagearrangementsRs" type="number" value="<?php echo $project1['drainagearrangementsRs'];?>"></th>
<th class="generalshow">Building Maintenance</th>
<th class="generalshow"><select name="maintenanceofthebuilding" id="maintenanceofthebuilding">
                  <option value="" selected>Building Maintenance</option>
				  <?php
				  $maintananceofthebuilding = mysqli_query($GLOBALS['connect'],"SELECT * FROM  maintananceofthebuilding order by id asc"); 
while ($maintananceofthebuilding1 = mysqli_fetch_array($maintananceofthebuilding)) {?>
                  <option value="<?php echo $maintananceofthebuilding1['id'];?>" <?php if($maintananceofthebuilding1['id']==$project1['maintenanceofthebuilding']) {?> selected <?php } ?>><?php echo $maintananceofthebuilding1['name'];?></option>
<?php } ?>
                </select> </th>
</tr>

<tr>
<th class="serviceshow">Compound Wall L
<br>
<input  class="compoundwalltotal" id="compoundwallL1" name="compoundwallL1" type="text" value="<?php echo $project1['compoundwallL1'];?>" style="    width: 10%;" placeholder="L" value="">
<input  class="compoundwalltotal" id="compoundwallL2" name="compoundwallL2" type="text" value="<?php echo $project1['compoundwallL2'];?>" style="    width: 10%;"  placeholder="B"  value="">
<input  class="compoundwalltotal" id="compoundwallL" name="compoundwallL" type="text" value="<?php echo $project1['compoundwallL'];?>" style="    width: 30%;"  placeholder="Sqft">
<input  class="compoundwalltotal" id="compoundwallrate" name="compoundwallrate" type="number" value="<?php echo $project1['compoundwallrate'];?>" style="    width: 30%;"  placeholder="Rate">
<?php if(1!=1)
{?>
<br>
<br>
H- <input class="compoundwalltotal" id="compoundwallH1" name="compoundwallH1" type="text" value="<?php echo $project1['compoundwallH1'];?>" style="    width: 10%;" placeholder="H1">
<input  class="compoundwalltotal" id="compoundwallH2" name="compoundwallH2" type="text" value="<?php echo $project1['compoundwallH2'];?>" style="    width: 10%;" placeholder="H2">
<input  class="compoundwalltotal" id="compoundwallH" name="compoundwallH" type="text" value="<?php echo $project1['compoundwallH'];?>" style="    width: 40%;" placeholder="H">
<?php } ?>
</th>
<th class="serviceshow"><input  class="servicetotal" id="compoundwallRs" name="compoundwallRs" type="text" value="<?php echo $project1['compoundwallRs'];?>"></th>
<th class="generalshow">Drainage Arrangements</th>
<th class="generalshow"> <select name="drainagearrangements" id="drainagearrangements">
                  <option value="" >Drainage Arrangements</option>
				  <?php
				  $drainagearrangements = mysqli_query($GLOBALS['connect'],"SELECT * FROM  drainagearrangements order by id asc"); 
while ($drainagearrangements1 = mysqli_fetch_array($drainagearrangements)) {?>
                  <option value="<?php echo $drainagearrangements1['id'];?>" <?php if($drainagearrangements1['id']==$project1['drainagearrangements']) {?> selected <?php } ?>><?php echo $drainagearrangements1['name'];?></option>
<?php } ?>
                </select></th>
</tr>

<tr>
<th class="serviceshow">
Sump<input  class="sumpclass" id="sump" name="sump" type="text" value="<?php echo $project1['sump'];?>" placeholder="Rs" style="width: 40%;margin-left: 52px;" value="">
<br>OH Tank<input class="sumpclass" id="oht" name="oht" type="text" value="<?php echo $project1['oht'];?>"  placeholder="Rs" style="width: 31%;margin-left: 30px;" value="">
<br>Sintex<input class="sumpclass" id="sintex" name="sintex" type="text" value="<?php echo $project1['sintex'];?>" placeholder="Rs" style="width: 39%;margin-left: 47px;" value=""></th>

<th class="serviceshow"><input  class="servicetotal" id="sumpohtRs" name="sumpohtRs" type="number" value="<?php echo $project1['sumpohtRs'];?>"></th>
<th class="generalshow">Water Supply Arrangements</th>
<th class="generalshow">  <select name="watersupplyarrangements[]" id="watersupplyarrangements" multiple="multiple">
                 
				  <?php
				  $drivercheckedval=explode(",",$project1['watersupplyarrangements']);
				  $watersupplyarrangements = mysqli_query($GLOBALS['connect'],"SELECT * FROM  watersupplyarrangements order by id asc"); 
while ($watersupplyarrangements1 = mysqli_fetch_array($watersupplyarrangements)) {?>
                  <option value="<?php echo $watersupplyarrangements1['name'];?>" <?php  if (in_array($watersupplyarrangements1['name'], $drivercheckedval))
  {?> selected <?php } ?>><?php echo $watersupplyarrangements1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>

<tr>
<th class="serviceshow"></th>
<th class="serviceshow"></th>
<th class="generalshow" colspan="2"><table id="b"><tr  id="c"><td>Floor</td><td>Floor Finishing</td><td>Roofing</td></tr>

<?php 
$floorselect=explode(",",$project1['floorselect']);
$floorfinish=explode(",",$project1['floorfinish']);
$roofingselect=explode(",",$project1['roofingselect']);
if($project1['floorselect']!='') {
foreach($floorselect as $floorselectcount =>$key) {?>

<tr><td><select class="selectin" name="floorselect[]" id="floorselect" ><option value="" selected>Select</option>
                  <option value="Ground" <?php if($floorselect[$floorselectcount]=='Ground') {?> selected <?php } ?>>Ground</option><option value="First" <?php if($floorselect[$floorselectcount]=='First') {?> selected <?php } ?>>First</option><option value="Second" <?php if($floorselect[$floorselectcount]=='Second') {?> selected <?php } ?>>Second
</option><option value="Third" <?php if($floorselect[$floorselectcount]=='Third') {?> selected <?php } ?>>Third</option></select></td><td><select class="selectin" name="floorfinish[]" id="floorfinish" ><option value="" selected >Select</option>
                  <option value="Tiles" <?php if($floorfinish[$floorselectcount]=='Tiles') {?> selected <?php } ?>>Tiles</option><option value="Mosaic" <?php if($floorfinish[$floorselectcount]=='Mosaic') {?> selected <?php } ?>>Mosaic</option><option value="C.M" <?php if($floorfinish[$floorselectcount]=='C.M') {?> selected <?php } ?>>C.M
</option><option value="Granite" <?php if($floorfinish[$floorselectcount]=='Granite') {?> selected <?php } ?>>Granite</option><option value="Marble" <?php if($floorfinish[$floorselectcount]=='Marble') {?> selected <?php } ?>>Marble</option><option value="Italian Marble" <?php if($floorfinish[$floorselectcount]=='Italian Marble') {?> selected <?php } ?>>Italian Marble</option><option value="Co Stone" <?php if($floorfinish[$floorselectcount]=='Co Stone') {?> selected <?php } ?>>Co Stone</option></select></td><td><select class="selectin" name="roofingselect[]" id="roofingselect">
                  <option value="" selected>Select</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option value="<?php echo $roof1['id'];?>" <?php if($roofingselect[$floorselectcount]==$roof1['id']) {?> selected <?php } ?> data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
                </select><input type="button" class="btnRemove333" value="X" style=" width: 10%;background: red;color: white;border-color: red;font-weight: bold;" ></td></tr>
				
				
<?php } }  else {?>

<tr><td><select class="selectin" name="floorselect[]" id="floorselect" ><option value="" selected>Select</option>
                  <option value="Ground">Ground</option><option value="First">First</option><option value="Second">Second
</option><option value="Third">Third</option></select></td><td><select class="selectin" name="floorfinish[]" id="floorfinish" ><option value="" selected>Select</option>
                  <option value="Tiles">Tiles</option><option value="Mosaic">Mosaic</option><option value="C.M">C.M
</option><option value="Granite">Granite</option><option value="Marble">Marble</option><option value="Italian Marble">Italian Marble</option><option value="Co Stone">Co Stone</option></select></td><td><select class="selectin" name="roofingselect[]" id="roofingselect">
                  <option value="" selected>Select</option>
				  <?php
				  $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); 
while ($roof1 = mysqli_fetch_array($roof)) {?>
                  <option value="<?php echo $roof1['id'];?>" <?php if($roofselect1[$lengthacountproper]==$roof1['id']) {?> selected <?php } ?> data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option>
<?php } ?>
</select></td></tr> <?php } ?>
				
				
				</table>
<input id="btnAdd33" type="button" value="+" style="    width: 14%;
    background: green;
    color: white;
    border-radius: 6px;"/></th>
</tr>

<th class="serviceshow">E.B Deposit <div style="    width: 150px !important;
    margin-top: -38px;
    margin-left: 114px;"><select name="ebdepositI" id="ebdepositI" style="    width: 30%;">
                  <option value="" >Select</option>
                  <option <?php if($project1['ebdepositI']=='I Phase') {?> selected <?php } ?> value="I Phase" >I Phase</option>
				  <option <?php if($project1['ebdepositI']=='III Phase') {?> selected <?php } ?>  value="III Phase" >III Phase</option>
                </select></div>
No.of Services <input class="compoundwalltotal" id="ebdep1" name="ebdep1" type="text" value="<?php echo $project1['ebdep1'];?>" style="    width: 40%;" placeholder="No.of Services">
		</th>
				<th class="serviceshow"><input  class="servicetotal" id="ebdepositRs" name="ebdepositRs" type="number" value="<?php echo $project1['ebdepositRs'];?>"></th>
	<th class="generalshow">Joineries</th>
<th class="generalshow">  <select name="joineries[]" id="joineries" multiple="multiple">
                  
				  <?php
				   $joineriesedval=explode(",",$project1['joineries']);
				  $joineries = mysqli_query($GLOBALS['connect'],"SELECT * FROM  joineries order by id asc"); 
while ($joineries1 = mysqli_fetch_array($joineries)) {?>
                  <option value="<?php echo $joineries1['name'];?>" <?php  if (in_array($joineries1['name'], $joineriesedval))
  {?> selected <?php } ?>><?php echo $joineries1['name'];?></option>
<?php } ?>
                </select></th>
			

</tr>
<tr>
<th class="serviceshow">Pavar/Cement/Tiles    <p class="mb-1">
	
              <label>
                <input type="checkbox" <?php  $checkedval=explode(",",$project1['pavertype']);	 if (in_array('Pavements', $checkedval))
  {?> checked <?php } ?>  value="Pavements" name="pavertype[]" id="pavertype"/>
                <span style="color: black;">Pavar</span>
              </label>
			  
			    <label>
                <input type="checkbox" <?php 	 if (in_array('Cement', $checkedval))
  {?> checked <?php } ?>  value="Cement" name="pavertype[]" id="pavertype"/>
                <span style="color: black;">Cement</span>
              </label>
		  
		  
		    <label>
                <input type="checkbox" <?php  	 if (in_array('Tiles', $checkedval))
  {?> checked <?php } ?>  value="Tiles" name="pavertype[]" id="pavertype"/>
                <span style="color: black;">Tiles</span>
              </label>
		  
		  
            </p></th>
<th class="serviceshow"><input  class="servicetotal" id="paverrs" name="paverrs" type="number" value="<?php echo $project1['paverrs'];?>">
</th>
<th class="generalshow">Road Facilities
<select name="roadfacilities" id="roadfacilities">
<option value="" >Wide</option>
<option <?php if($project1['roadfacilities']=='Public') {?> <?php } ?> value="Public" >Public</option>
<option <?php if($project1['roadfacilities']=='Private') {?> <?php } ?> value="Private" >Private</option></select>

</th>

<th class="generalshow">   <select name="roadfacilitiesyes" id="roadfacilitiesyes">
                  <option value="">Road Facilities</option>
				  <?php
				  $roadfacilities = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roadfacilities order by id asc"); 
while ($roadfacilities1 = mysqli_fetch_array($roadfacilities)) {?>
                  <option value="<?php echo $roadfacilities1['id'];?>" <?php if($roadfacilities1['id']==$project1['roadfacilitiesyes']) {?> selected <?php } ?>><?php echo $roadfacilities1['name'];?></option>
<?php } ?>
                </select></th>
</tr>




<tr>
<th class="serviceshow"> Interior / Exterior (Rs)</th>
<th class="serviceshow"><input  class="servicetotal" id="interiorworkRs" name="interiorworkRs" type="number" value="<?php echo $project1['interiorworkRs'];?>"></th>
<th class="generalshow">Type of Plot</th>
<th class="generalshow"> <select name="cornerplotintermittentplot" id="cornerplotintermittentplot">
                  <option value="">Type of Plot</option>
				  <?php
				  $cornerintermittentcommerciallot = mysqli_query($GLOBALS['connect'],"SELECT * FROM  cornerintermittentcommerciallot order by id asc"); 
while ($cornerintermittentcommerciallot1 = mysqli_fetch_array($cornerintermittentcommerciallot)) {?>
                  <option value="<?php echo $cornerintermittentcommerciallot1['id'];?>" <?php if($cornerintermittentcommerciallot1['id']==$project1['cornerplotintermittentplot']) {?> selected <?php } ?>><?php echo $cornerintermittentcommerciallot1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th class="serviceshow">Open / Stair head (Rs)</th>
<th class="serviceshow"><input  class="servicetotal" id="openstaircaseRs" name="openstaircaseRs" type="number" value="<?php echo $project1['openstaircaseRs'];?>"></th>
<th class="generalshow">Character of Locality</th>
<th class="generalshow">  <select name="characteroflocality" id="characteroflocality">
                  <option value="">Character of Locality</option>
				  <?php
				  $characteroflocality = mysqli_query($GLOBALS['connect'],"SELECT * FROM  characteroflocality order by id asc"); 
while ($characteroflocality1 = mysqli_fetch_array($characteroflocality)) {?>
                  <option value="<?php echo $characteroflocality1['id'];?>" <?php if($characteroflocality1['id']==$project1['characteroflocality']) {?> selected <?php } ?>><?php echo $characteroflocality1['name'];?></option>
<?php } ?>
                </select></th>
</tr>
<tr>
<th style="width: 25%;" class="serviceshow">Total</th>
<th class="serviceshow"><input  class="serviceovertotal" id="serviceovertotal" name="serviceovertotal" type="text" value="<?php echo $project1['serviceovertotal'];?>"></th>
<th class="generalshow"></th>
<th class="generalshow"></th>
</tr>

</thead>
</table>

<?php if(1!=1)
{?>	
	 <div class="input-field col s12 xl6">
	 <table>
      <tr>
<?php 
$totalsum=explode(",",$project1['totallandvalue']);
$totalsum1=array_sum($totalsum);

$buildoveralltot=($project_table1['overalltotal']+$project_table1['overalltotal1']+$project_table1['overalltotal2']+$project_table1['overalltotal3']);

$service=$project1['serviceovertotal'];

$total=$totalsum1+$buildoveralltot+$service;


?>
	  
<th style="width: 25%;" class="serviceshow">1.Land Value	</th>
<th class="serviceshow"><input  class="landtotal" id="landtotal" name="landtotal" type="text" value="<?php echo number_format($totalsum1,2);?>"></th>
<th class="generalshow"></th>
<th class="generalshow"></th>
</tr>
 <tr>
<th style="width: 25%;" class="serviceshow">2.Building	</th>
<th class="serviceshow"><input  class="building_total" id="building_total" name="building_total" type="text" value="<?php echo number_format($buildoveralltot,2);?>"></th>
<th class="generalshow"></th>
<th class="generalshow"></th>
</tr>
 <tr>
<th style="width: 25%;" class="serviceshow">3.Services	</th>
<th class="serviceshow"><input  class="servicetotalall" id="servicetotalall" name="servicetotalall" type="text" value="<?php echo number_format($project1['serviceovertotal'],2);?>"></th>
<th class="generalshow"></th>
<th class="generalshow"></th>
</tr>
 <tr>
<th style="width: 25%;" class="serviceshow">Total	</th>
<th class="serviceshow"><input  class="overallalltotal" id="overallalltotal" name="overallalltotal" type="text" value="<?php echo number_format($total,2);?>"></th>
<th class="generalshow"></th>
<th class="generalshow"></th>
</tr>

</table>
                </div> 
				
<?php } ?>
							 
				 

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

 if($("#generalvisible").is(":checked")) {
        $("generalshow").show();
    } else {
        $(".generalshow").hide();
    }
	
$("#generalvisible").click(function() {
    if($(this).is(":checked")) {
        $(".generalshow").show();
    } else {
        $(".generalshow").hide();
    }
});


 if($("#servicevisible").is(":checked")) {
        $("serviceshow").show();
    } else {
        $(".serviceshow").hide();
    }
	
$("#servicevisible").click(function() {
    if($(this).is(":checked")) {
        $(".serviceshow").show();
    } else {
        $(".serviceshow").hide();
    }
});


$('#taxreceiptfile').hide();
$('#ebservicenofile').hide();
$('#pattadtcpfile').hide();
$('#approvalplanfile').hide();
$('#hdlinefile').hide();

$('#taxreceipt_name').hide();
$('#ebserviceno_name').hide();
$('#pattadtcp_name').hide();
$('#approvalplan_name').hide();
$('#hdline_name').hide();

$('#watersupplyarrangementsyes1').hide();
$('#drainagearrangementsyes1').hide();
 
 if($("#pattavisible").is(":checked")) {
        $(".pattashow").show();
    } else {
        $(".pattashow").hide();
    }
	
$("#pattavisible").click(function() {
    if($(this).is(":checked")) {
        $(".pattashow").show();
    } else {
        $(".pattashow").hide();
    }
});

  if($("#documentvisible").is(":checked")) {
        $(".documentshow").show();
    } else {
        $(".documentshow").hide();
    }
	
$("#documentvisible").click(function() {
    if($(this).is(":checked")) {
        $(".documentshow").show();
    } else {
        $(".documentshow").hide();
    }
});


if($('#taxreceipt').val() == "Yes" ){$('#taxreceiptfile').show(); $('#taxreceipt_name').show();}
if($('#ebserviceno').val() == "Yes" ){$('#ebservicenofile').show(); $('#ebserviceno_name').show();}
if($('#pattadtcp').val() == "Yes" ){$('#pattadtcpfile').show(); $('#pattadtcp_name').show();}
if($('#approvalplan').val() == "Yes" ){$('#approvalplanfile').show(); $('#approvalplan_name').show();}
if($('#hdline').val() == "Yes" ){$('#hdlinefile').show(); $('#hdline_name').show();} 

if($('#watersupplyarrangements').val() == "Yes" ){$('#watersupplyarrangementsyes1').show();} 
if($('#drainagearrangements').val() == "Yes" ){$('#drainagearrangementsyes1').show();} 

$('#taxreceipt').change(function(){ if($(this).val() == "Yes" ){$('#taxreceiptfile').show(); $('#taxreceipt_name').show(); }else{$('#taxreceiptfile').hide(); $('#taxreceipt_name').val('');}});
$('#ebserviceno').change(function(){ if($(this).val() == "Yes" ){$('#ebservicenofile').show(); $('#ebserviceno_name').show(); }else{$('#ebservicenofile').hide(); $('#ebserviceno_name').val(''); }});
$('#pattadtcp').change(function(){ if($(this).val() == "Yes" ){$('#pattadtcpfile').show(); $('#pattadtcp_name').show();}else{$('#pattadtcpfile').hide();$('#pattadtcp_name').val('');}});
$('#approvalplan').change(function(){ if($(this).val() == "Yes" ){$('#approvalplanfile').show();   $('#approvalplan_name').show();}else{$('#approvalplanfile').hide();$('#approvalplan_name').val('');}});
$('#hdline').change(function(){ if($(this).val() == "Yes" ){$('#hdlinefile').show();  $('#hdline_name').show(); }else{$('#hdlinefile').hide();  $('#hdline_name').val('');}});

$('#watersupplyarrangements').change(function(){ if($(this).val() == "Yes" ){$('#watersupplyarrangementsyes1').show();}else{$('#watersupplyarrangementsyes1').hide();}});
$('#drainagearrangements').change(function(){ if($(this).val() == "Yes" ){$('#drainagearrangementsyes1').show();}else{$('#drainagearrangementsyes1').hide();}});





  $(document).ready(function(){   
  
   $('.newTR1 #sale_type').change(function() {             
            var x = 'Per '+$(this).val();    
			
            $('.newTR1 #assignsq').text(x);         
        }); 

		
  
if($("#purchaseyes").is(":checked")) {
        $(".purchaseyescheck").show();
    } else {
        $(".purchaseyescheck").hide();
    }

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


    $('.block:last').before('<div class="row block ' + random + '" style="    width: 100%;margin-left: 2px;"><table class="highlight"><thead><tr><th style="width: 22%;">Type of Roof</th><th><select name="roof[]" id="roof" style="display:block;"><option value="" >Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?> </select>	</th><th></th><th><div class="input-field col s12 xl6" style="width:46%;margin-left:10px;border:0px solid;"><span class="remove" style="float: left;color:red;cursor:pointer;" id="' + random + '">Remove(X)</span></div> 	 </th></tr></thead></table></div>');
	
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
var compoundwallL1 = $('#compoundwallL1').val();
var compoundwallL2 = $('#compoundwallL2').val(); 
if(compoundwallL1=='') { var compoundwallL1=0;}if(compoundwallL2=='') { var compoundwallL2=0;}
var compoundwallL3=(parseFloat(compoundwallL1)*parseFloat(compoundwallL2)).toFixed(2);
if(compoundwallL3=='') { var compoundwallL3=0;}
if(compoundwallL3!='0.00')
{
$('#compoundwallL').val(compoundwallL3);  

}

var compoundwallL32 = $('#compoundwallL').val(); 
var compoundwallrate = $('#compoundwallrate').val(); 
if(compoundwallrate=='') { var compoundwallrate=0;}
var compoundwalltotal=(parseFloat(compoundwallL32)*parseFloat(compoundwallrate)).toFixed(2);

if(compoundwalltotal=='') { var compoundwalltotal=0;}
if(compoundwalltotal!='0.00')
{
$('#compoundwallRs').val(compoundwalltotal); 
}

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
          sum += parseFloat($(this).val());   
    });
    if(sum)
{
    $("#sumpohtRs").val(sum.toFixed(2));
}
	
	 var sum2=0;
    $(".servicetotal").each(function(){
        if($(this).val() != "")
          sum2 += parseFloat($(this).val());   
    });
    
    $("#serviceovertotal").val(sum2);
	
	  $("#servicetotalall").val(sum.toFixed(2));
	
 });

$(".servicetotal").on("blur", function(){
    var sum=0;
    $(".servicetotal").each(function(){
        if($(this).val() != "")
          sum += parseFloat($(this).val());   
    });
    
    $("#serviceovertotal").val(sum.toFixed(2));
	
	  $("#servicetotalall").val(sum.toFixed(2));
	

 });
 
 




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
		$(".addrow"+ random22).append('<tr><td style="width: 200px;"><textarea id="desc_prop" name="desc_prop'+ random22+'[]" rows="3" cols="23" style="    height: 4rem;"></textarea></td><td style="width:200px;"><input  id="lengtha" name="lengtha'+ random22+'[]" type="text" placeholder="L1" value="" style="  margin-left: 10px;width: 20%;"><input  id="lengthb" name="lengthb'+ random22+'[]" type="text" placeholder="L2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="length" name="length'+ random22+'[]" type="text" placeholder="L" value="" style="  margin-left: 10px;width: 25%;"><br><input  id="breadtha" name="breadtha'+ random22+'[]" type="text" placeholder="B1" value="" style="  margin-left: 10px;width: 20%;"><input  id="breadthb" name="breadthb'+ random22+'[]" type="text" placeholder="B2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="breadth" name="breadth'+ random22+'[]" type="text"  placeholder="B" value="" style="margin-left: 10px;width: 25%;"></td><td><input  id="area" name="area'+ random22+'[]" type="text"  value=""></td><td><input  id="rate" name="rate'+ random22+'[]" type="text"  value=""></td><td style="width: 53px;"><input  id="year" name="year'+ random22+'[]" type="text"  value=""></td><td><input  id="percentage" name="percentage'+ random22+'[]" type="text"  value=""> </td><td><select class="selectin" name="roofselect'+ random22+'[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>" data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation'+ random22+'[]" type="text"  value=""></td><td><input  id="total" class="row-total'+ random22+'" name="total'+ random22+'[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
	

			  $(".addrow"+ random22+" input").on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengtha').val();
if(lengtha=='') { var lengthb=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);				  
}			  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);	
}	  
		  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);				  
}			  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);		
}	  
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
var sum = 0;
$('.row-total'+ random22).each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('.row-overalltotal'+ random22).val(sum.toFixed(2));
	  });	
	
});
 
 
$(".addCF").click(function(){ 
$(".addrow").append('<tr><td><textarea id="desc_prop" name="desc_prop[]" rows="3" cols="23" style="    height: 4rem;"></textarea></td><td style="width:200px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L1" value="" style="  margin-left: 10px;width: 20%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 10px;width: 25%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B1" value="" style="  margin-left: 10px;width: 20%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 10px;width: 25%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td style="width: 53px;"><input  id="year" name="year[]" type="text"  value=""></td><td  style="width: 53px;" ><input  id="percentage" name="percentage[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>" data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
$('.addrow input').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);	
}	
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum.toFixed(2));
});
$('.addrow select').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);	
}	
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});
$('#overalltotal').val(sum.toFixed(2));
});	 
});


    
    $(".addrow").on('click','.remCF',function(){
        $(this).parent().parent().remove();
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum.toFixed(2));
    });

 $('.addrow input').on('blur', function() {  

var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);	
}	 
	 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum.toFixed(2));
});

///////////////////////////////////// Start //////////////////

$(".addCF1").click(function(){
$(".addrow1").append('<tr><td><textarea id="desc_prop" name="desc_prop" rows="3" cols="23" style="    height: 4rem;"></textarea></td><td style="width:200px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L1" value="" style="  margin-left: 10px;width: 20%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 10px;width: 25%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B1" value="" style="  margin-left: 10px;width: 20%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B2" value="" style="  margin-left: 10px;width: 20%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 10px;width: 25%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td style="width: 53px;"><input  id="year" name="year[]" type="text"  value=""></td><td  style="width: 53px;" ><input  id="percentage" name="percentage[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>" data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total1" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
$('.addrow1 input').on('blur', function() {
var lengtha =  $(this).closest('tr').find('#lengtha').val();
var lengthb =  $(this).closest('tr').find('#lengthb').val();
if(lengtha=='') { var lengtha=0;}if(lengthb=='') { var lengthb=0;}
var length3 = (parseFloat(lengthb)/12).toFixed(2);;
var length31=(parseFloat(lengtha)+parseFloat(length3)).toFixed(2);
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);	
}	
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=0;}
var percentagetot=(percentage*(totall/100));
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
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);		
}
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);	
}	 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);	
}	
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
$('#overalltotala1').val(sum.toFixed(2));
});
 $('.removemula1').on('click', function() { 
	      var idval=$(this).attr("id");
	      $('#cddrow1').remove();
});	
///////////////////////////////////// End //////////////////


///////////////////////////////////// Start //////////////////

$(".addCF2").click(function(){
$(".addrow2").append('<tr><td><textarea id="desc_prop" name="desc_prop[]" rows="3" cols="23" style="    height: 4rem;"></textarea></td><td style="width:200px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L2" value="" style="  margin-left: 20px;width: 20%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L2" value="" style="  margin-left: 20px;width: 20%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 20px;width: 25%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B2" value="" style="  margin-left: 20px;width: 20%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B2" value="" style="  margin-left: 20px;width: 20%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 20px;width: 25%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td style="width: 53px;"><input  id="year" name="year[]" type="text"  value=""></td><td  style="width: 53px;" ><input  id="percentage" name="percentage[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof2 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof2['id'];?>" data-id="<?php echo $roof2['percentage'];?>"><?php echo $roof2['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total2" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
$('#overalltotala2').val(sum.toFixed(2));
});
 $('.removemula2').on('click', function() { 
	      var idval=$(this).attr("id");
	      $('#cddrow2').remove();
});	
///////////////////////////////////// End //////////////////

///////////////////////////////////// Start //////////////////

$(".addCF3").click(function(){
$(".addrow3").append('<tr><td><textarea id="desc_prop" name="desc_prop[]" rows="3" cols="23" style="    height: 4rem;"></textarea></td><td style="width:300px;"><input  id="lengtha" name="lengtha[]" type="text" placeholder="L3" value="" style="  margin-left: 30px;width: 30%;"><input  id="lengthb" name="lengthb[]" type="text" placeholder="L3" value="" style="  margin-left: 30px;width: 30%;">=<input  id="length" name="length[]" type="text" placeholder="L" value="" style="  margin-left: 30px;width: 35%;"><br><input  id="breadtha" name="breadtha[]" type="text" placeholder="B3" value="" style="  margin-left: 30px;width: 30%;"><input  id="breadthb" name="breadthb[]" type="text" placeholder="B3" value="" style="  margin-left: 30px;width: 30%;">=<input  id="breadth" name="breadth[]" type="text"  placeholder="B" value="" style="margin-left: 30px;width: 35%;"></td><td><input  id="area" name="area[]" type="text"  value=""></td><td><input  id="rate" name="rate[]" type="text"  value=""></td><td style="width: 53px;"><input  id="year" name="year[]" type="text"  value=""></td><td  style="width: 53px;" ><input  id="percentage" name="percentage[]" type="text"  value=""></td><td><select class="selectin" name="roofselect[]" id="roofselect" style="display:block"> <option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof3 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof3['id'];?>" data-id="<?php echo $roof3['percentage'];?>"><?php echo $roof3['name'];?></option><?php } ?></select></td><td><input  id="deprciation" name="deprciation[]" type="text"  value=""></td><td><input  class="row-total3" id="total" name="total[]" type="text"  value=""><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
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
if(length31!='0.00') {
$(this).closest('tr').find('#length').val(length31);
}
var breadtha =  $(this).closest('tr').find('#breadtha').val();
var breadthb =  $(this).closest('tr').find('#breadthb').val();
if(breadtha=='') { var breadtha=0;}if(breadthb=='') { var breadthb=0;}
var breadth3 = (parseFloat(breadthb)/12).toFixed(2);;
var breadth31=(parseFloat(breadtha)+parseFloat(breadth3)).toFixed(2);
if(breadth31!='0.00') {
$(this).closest('tr').find('#breadth').val(breadth31);		
}	 
var length =  $(this).closest('tr').find('#length').val();
if(length) { var length=length;} else { var length=0;}
var breadth =  $(this).closest('tr').find('#breadth').val();
if(breadth) { var breadth=breadth;} else { var breadth=0;}
var totlb=((parseFloat(length)*parseFloat(breadth)).toFixed(2));
if(totlb!='0.00')
{
$(this).closest('tr').find('#area').val(totlb);
}
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
var deprciation=(((parseFloat(yeardiff)*parseFloat(rate)*parseFloat(area)*(parseFloat(roofselect)))/100).toFixed(1));
$(this).closest('tr').find('#deprciation').val(deprciation);
var totall=((parseFloat(rate)*parseFloat(area))-(parseFloat(deprciation)));
var percentage =  $(this).closest('tr').find('#percentage').val();
if(percentage) { var percentage=percentage;} else { var percentage=100;}
var percentagetot=(percentage*(totall/100));
$(this).closest('tr').find('#total').val(percentagetot.toFixed(2));
var sum = 0;
$('.row-total').each(function(){
    sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
});

$('#overalltotal').val(sum.toFixed(2));
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
	 
	 
	 
	  bankee: {
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
	 
      bankee: {
        required: "Select a Bank",
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
	
	
$(".newTR2 #btnAdd1").click(function() {
    $(".newTR2 #a1").append('<div class="con1"><select name="roof[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
  });
$('.newTR2 #roof').attr({ name: "roof1[]"});

$(".newTR3 #btnAdd1").click(function() {
$(".newTR3 #a1").append('<div class="con1"><select name="roof[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
});
$('.newTR3 #roof').attr({ name: "roof2[]"});
	  	  
	   $('.newTR2 #sale_type').change(function() {             
            var x = 'Per '+$(this).val();    
			
            $('.newTR2 #assignsq').text(x);         
        }); 
	  ///////////// start
	 	
  $('.newTR2 input').on('blur', function() {
	  
	

      var north1 = $('.newTR2 #north1').val();
	  
      var north2 = $('.newTR2 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	  	   $('.newTR2 #north3').show();
	  $('.newTR2 #north3').val(north31);
	  }
	     else 
	  {
		   $('.newTR2 #north3').val();
		 $('.newTR2 #north3').hide();  
		 
	  }
	  
	  var north4 = $('.newTR2 #north4').val();
	  
      var north5 = $('.newTR2 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
    $('.newTR2 #north6').show();
	  $('.newTR2 #north6').val(north61);
	  }
	    else 
	  {
		   $('.newTR2 #north6').val();
		 $('.newTR2 #north6').hide();  
		 
	  }
	  var north7 = $('.newTR2 #north7').val();
	  
      var north8 = $('.newTR2 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
		   $('.newTR2 #north9').show();
	  $('.newTR2 #north9').val(north91);
	  }
	    else 
	  {
		   $('.newTR2 #north9').val();
		 $('.newTR2 #north9').hide();  
		 
	  }
      var south1 = $('.newTR2 #south1').val();
	  
      var south2 = $('.newTR2 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
		  	   $('.newTR2 #south3').show();
	  $('.newTR2 #south3').val(south31);
	  }
	    else 
	  {
		   $('.newTR2 #south3').val();
		 $('.newTR2 #south3').hide();  
		 
	  }
	  var south4 = $('.newTR2 #south4').val();
	  
      var south5 = $('.newTR2 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
		   $('.newTR2 #south6').show();
	  $('.newTR2 #south6').val(south61);
	  }
	  
	    else 
	  {
		   $('.newTR2 #south6').val();
		 $('.newTR2 #south6').hide();  
		 
	  }
	  var south7 = $('.newTR2 #south7').val();
	  
      var south8 = $('.newTR2 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
		    $('.newTR2 #south9').show();
	  $('.newTR2 #south9').val(south91);	  
	  }
	   else 
	  {
		   $('.newTR2 #south9').val();
		 $('.newTR2 #south9').hide();  
		 
	  }
	  var west1 = $('.newTR2 #west1').val();
	  
      var west2 = $('.newTR2 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
		   $('.newTR2 #west3').show();
	  $('.newTR2 #west3').val(west31);
	  }
	   else 
	  {
		   $('.newTR2 #west3').val();
		 $('.newTR2 #west3').hide();  
		 
	  }
	  var west4 = $('.newTR2 #west4').val();
	  
      var west5 = $('.newTR2 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
		     $('.newTR2 #west6').show();
	  $('.newTR2 #west6').val(west61);
	  }
	   else 
	  {
		   $('.newTR2 #west6').val();
		 $('.newTR2 #west6').hide();  
		 
	  }
	  var west7 = $('.newTR2 #west7').val();
	  
      var west8 = $('.newTR2 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
		       $('.newTR2 #west9').show();
	  $('.newTR2 #west9').val(west91);
	  }
	    else 
	  {
		   $('.newTR2 #west9').val();
		 $('.newTR2 #west9').hide();  
		 
	  }
	  var east1 = $('.newTR2 #east1').val();
	  
      var east2 = $('.newTR2 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
		      $('.newTR2 #east3').show();
	  $('.newTR2 #east3').val(east31);
	  }
	    else 
	  {
		   $('.newTR2 #east3').val();
		 $('.newTR2 #east3').hide();  
		 
	  }
	  var east4 = $('.newTR2 #east4').val();
	  
      var east5 = $('.newTR2 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
		       $('.newTR2 #east6').show();
	  $('.newTR2 #east6').val(east61);
	  }
	  
	    else 
	  {
		   $('.newTR2 #east6').val();
		 $('.newTR2 #east6').hide();  
		 
	  }
	  var east7 = $('.newTR2 #east7').val();
	  
      var east8 = $('.newTR2 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
		      $('.newTR2 #east9').show();
	  $('.newTR2 #east9').val(east91);
	  }
	    else 
	  {
		   $('.newTR2 #east9').val();
		 $('.newTR2 #east9').hide();  
		 
	  }
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR2 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR2 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR2 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR2 #estent').val();
	   var estentnew1 = $('.newTR2 #estent1').val();
	   var estentnew2 = $('.newTR2 #estent2').val();
	   var estentnew3 = $('.newTR2 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR2 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR2 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR2 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR2 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR2 #guideselect').val();
	  var guide_rate = $('.newTR2 #guide_rate').val();
	  var sale_type = $('.newTR2 #sale_type').val();
	  var totalarea = $('.newTR2 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	   if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR2 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 	
  $('.newTR2 select').on('blur', function() {
	  
	

      var north1 = $('.newTR2 #north1').val();
	  
      var north2 = $('.newTR2 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	       $('.newTR2 #north3').show();
	  $('.newTR2 #north3').val(north31);
	  
	  }
	   else 
	  {
		   $('.newTR2 #north3').val();
		 $('.newTR2 #north3').hide();  
		 
	  }
	  
	  var north4 = $('.newTR2 #north4').val();
	  
      var north5 = $('.newTR2 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
   $('.newTR2 #north6').show();
	  $('.newTR2 #north6').val(north61);
	  }
	   else 
	  {
		   $('.newTR2 #north6').val();
		 $('.newTR2 #north6').hide();  
		 
	  }
	  var north7 = $('.newTR2 #north7').val();
	  
      var north8 = $('.newTR2 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
		     $('.newTR2 #north9').show();
	  $('.newTR2 #north9').val(north91);
	  }
	   else 
	  {
		   $('.newTR2 #north9').val();
		 $('.newTR2 #north9').hide();  
		 
	  }
      var south1 = $('.newTR2 #south1').val();
	  
      var south2 = $('.newTR2 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
		      $('.newTR2 #south3').show();
	  $('.newTR2 #south3').val(south31);
	  }
	    else 
	  {
		   $('.newTR2 #south3').val();
		 $('.newTR2 #south3').hide();  
		 
	  }
	  var south4 = $('.newTR2 #south4').val();
	  
      var south5 = $('.newTR2 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
		   $('.newTR2 #south6').show();
	  $('.newTR2 #south6').val(south61);
	  }
	    else 
	  {
		   $('.newTR2 #south6').val();
		 $('.newTR2 #south6').hide();  
		 
	  }
	  var south7 = $('.newTR2 #south7').val();
	  
      var south8 = $('.newTR2 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
		   $('.newTR2 #south9').show();
	  $('.newTR2 #south9').val(south91);	  
	  }
	   else 
	  {
		   $('.newTR2 #south9').val();
		 $('.newTR2 #south9').hide();  
		 
	  }
	  var west1 = $('.newTR2 #west1').val();
	  
      var west2 = $('.newTR2 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
		     $('.newTR2 #west3').show();
	  $('.newTR2 #west3').val(west31);
	  }
	    else 
	  {
		   $('.newTR2 #west3').val();
		 $('.newTR2 #west3').hide();  
		 
	  }
	  var west4 = $('.newTR2 #west4').val();
	  
      var west5 = $('.newTR2 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
		   $('.newTR2 #west6').show();
	  $('.newTR2 #west6').val(west61);
	  }
	   else 
	  {
		   $('.newTR2 #west6').val();
		 $('.newTR2 #west6').hide();  
		 
	  }
	  var west7 = $('.newTR2 #west7').val();
	  
      var west8 = $('.newTR2 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
		    $('.newTR2 #west9').show();
	  $('.newTR2 #west9').val(west91);
	  }
	   else 
	  {
		   $('.newTR2 #west9').val();
		 $('.newTR2 #west9').hide();  
		 
	  }
	  var east1 = $('.newTR2 #east1').val();
	  
      var east2 = $('.newTR2 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
		    $('.newTR2 #east3').show();
	  $('.newTR2 #east3').val(east31);
	  }
	     else 
	  {
		   $('.newTR2 #east3').val();
		 $('.newTR2 #east3').hide();  
		 
	  }
	  var east4 = $('.newTR2 #east4').val();
	  
      var east5 = $('.newTR2 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
		     $('.newTR2 #east6').show();
	  $('.newTR2 #east6').val(east61);
	  }
	      else 
	  {
		   $('.newTR2 #east6').val();
		 $('.newTR2 #east6').hide();  
		 
	  }
	  var east7 = $('.newTR2 #east7').val();
	  
      var east8 = $('.newTR2 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
		    $('.newTR2 #east9').show();
	  $('.newTR2 #east9').val(east91);
	  }
	      else 
	  {
		   $('.newTR2 #east9').val();
		 $('.newTR2 #east9').hide();  
		 
	  }
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR2 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR2 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR2 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR2 #estent').val();
	   var estentnew1 = $('.newTR2 #estent1').val();
	   var estentnew2 = $('.newTR2 #estent2').val();
	   var estentnew3 = $('.newTR2 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR2 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR2 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR2 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR2 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR2 #guideselect').val();
	  var guide_rate = $('.newTR2 #guide_rate').val();
	  var sale_type = $('.newTR2 #sale_type').val();
	  var totalarea = $('.newTR2 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	      if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  } 
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR2 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR2 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});





//////////// end 

///////////// start
    $('.newTR3 #sale_type').change(function() {             
            var x = 'Per '+$(this).val();    
			
            $('.newTR3 #assignsq').text(x);         
        }); 
	  ///////////// start
	 	
  $('.newTR3 input').on('blur', function() {
	  
	

      var north1 = $('.newTR3 #north1').val();
	  
      var north2 = $('.newTR3 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	      $('.newTR3 #north3').show();
	  $('.newTR3 #north3').val(north31);
	  }
	     else 
	  {
		   $('.north3 #north3').val();
		 $('.north3 #north3').hide();  
		 
	  }
	  var north4 = $('.newTR3 #north4').val();
	  
      var north5 = $('.newTR3 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
   $('.newTR3 #north6').show();
	  $('.newTR3 #north6').val(north61);
	  }
	     else 
	  {
		   $('.north3 #north6').val();
		 $('.north3 #north6').hide();  
		 
	  }
	  var north7 = $('.newTR3 #north7').val();
	  
      var north8 = $('.newTR3 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
		   $('.newTR3 #north9').show();
	  $('.newTR3 #north9').val(north91);
	  }
	   else 
	  {
		   $('.north3 #north9').val();
		 $('.north3 #north9').hide();  
		 
	  }
      var south1 = $('.newTR3 #south1').val();
	  
      var south2 = $('.newTR3 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
		   $('.newTR3 #south3').show();
	  $('.newTR3 #south3').val(south31);
	  }
	     else 
	  {
		   $('.north3 #south3').val();
		 $('.north3 #south3').hide();  
		 
	  }
	  var south4 = $('.newTR3 #south4').val();
	  
      var south5 = $('.newTR3 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
		  $('.newTR3 #south6').show();
	  $('.newTR3 #south6').val(south61);
	  }
	   else 
	  {
		   $('.north3 #south6').val();
		 $('.north3 #south6').hide();  
		 
	  }
	  var south7 = $('.newTR3 #south7').val();
	  
      var south8 = $('.newTR3 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
		    $('.newTR3 #south9').show();
	  $('.newTR3 #south9').val(south91);	  
	  }
	    else 
	  {
		   $('.north3 #south9').val();
		 $('.north3 #south9').hide();  
		 
	  }
	  var west1 = $('.newTR3 #west1').val();
	  
      var west2 = $('.newTR3 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
		    $('.newTR3 #west3').show();
	  $('.newTR3 #west3').val(west31);
	  }
	    else 
	  {
		   $('.north3 #west3').val();
		 $('.north3 #west3').hide();  
		 
	  }
	  var west4 = $('.newTR3 #west4').val();
	  
      var west5 = $('.newTR3 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
		      $('.newTR3 #west6').show();
	  $('.newTR3 #west6').val(west61);
	  }
	    else 
	  {
		   $('.north3 #west6').val();
		 $('.north3 #west6').hide();  
		 
	  }
	  var west7 = $('.newTR3 #west7').val();
	  
      var west8 = $('.newTR3 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
		    $('.newTR3 #west9').show();
	  $('.newTR3 #west9').val(west91);
	  }
	   else 
	  {
		   $('.north3 #west9').val();
		 $('.north3 #west9').hide();  
		 
	  }
	  var east1 = $('.newTR3 #east1').val();
	  
      var east2 = $('.newTR3 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
		   $('.newTR3 #east3').show();
	  $('.newTR3 #east3').val(east31);
	  }
	   else 
	  {
		   $('.north3 #east3').val();
		 $('.north3 #east3').hide();  
		 
	  }
	  var east4 = $('.newTR3 #east4').val();
	  
      var east5 = $('.newTR3 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
		    $('.newTR3 #east6').show();
	  $('.newTR3 #east6').val(east61);
	  }
	   else 
	  {
		   $('.north3 #east6').val();
		 $('.north3 #east6').hide();  
		 
	  }
	  var east7 = $('.newTR3 #east7').val();
	  
      var east8 = $('.newTR3 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
		   $('.newTR3 #east9').show();
	  $('.newTR3 #east9').val(east91);
	  }  else 
	  {
		   $('.north3 #east9').val();
		 $('.north3 #east9').hide();  
		 
	  }
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR3 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR3 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR3 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR3 #estent').val();
	   var estentnew1 = $('.newTR3 #estent1').val();
	   var estentnew2 = $('.newTR3 #estent2').val();
	   var estentnew3 = $('.newTR3 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR3 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR3 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR3 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR3 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR3 #guideselect').val();
	  var guide_rate = $('.newTR3 #guide_rate').val();
	  var sale_type = $('.newTR3 #sale_type').val();
	  var totalarea = $('.newTR3 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	     if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR3 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 	
  $('.newTR3 select').on('blur', function() {
	  
	

      var north1 = $('.newTR3 #north1').val();
	  
      var north2 = $('.newTR3 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	  $('.newTR3 #north3').show();
	  $('.newTR3 #north3').val(north31);
	  }
	   else 
	  {
		   $('.north3 #east9').val();
		 $('.north3 #east9').hide();  
		 
	  }
	  var north4 = $('.newTR3 #north4').val();
	  
      var north5 = $('.newTR3 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
  $('.newTR3 #north6').show();
	  $('.newTR3 #north6').val(north61);
	  }
	   else 
	  {
		   $('.north3 #north6').val();
		 $('.north3 #north6').hide();  
		 
	  }
	  var north7 = $('.newTR3 #north7').val();
	  
      var north8 = $('.newTR3 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
		  $('.newTR3 #north9').show();
	  $('.newTR3 #north9').val(north91);
	  }
	   else 
	  {
		   $('.north3 #north9').val();
		 $('.north3 #north9').hide();  
		 
	  }
	  
      var south1 = $('.newTR3 #south1').val();
	  
      var south2 = $('.newTR3 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
		   $('.newTR3 #south3').show();
	  $('.newTR3 #south3').val(south31);
	  }
	    else 
	  {
		   $('.north3 #south3').val();
		 $('.north3 #south3').hide();  
		 
	  }
	  
	  var south4 = $('.newTR3 #south4').val();
	  
      var south5 = $('.newTR3 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
		     $('.newTR3 #south6').show();
	  $('.newTR3 #south6').val(south61);
	  }
	   else 
	  {
		   $('.north3 #south6').val();
		 $('.north3 #south6').hide();  
		 
	  }
	  var south7 = $('.newTR3 #south7').val();
	  
      var south8 = $('.newTR3 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
		  $('.newTR3 #south9').show();
	  $('.newTR3 #south9').val(south91);	  
	  }
	    else 
	  {
		   $('.north3 #south9').val();
		 $('.north3 #south9').hide();  
		 
	  }
	  var west1 = $('.newTR3 #west1').val();
	  
      var west2 = $('.newTR3 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
		  $('.newTR3 #west3').show();
	  $('.newTR3 #west3').val(west31);
	  }
	   else 
	  {
		   $('.north3 #west3').val();
		 $('.north3 #west3').hide();  
		 
	  }
	  var west4 = $('.newTR3 #west4').val();
	  
      var west5 = $('.newTR3 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
		   $('.newTR3 #west6').show();
	  $('.newTR3 #west6').val(west61);
	  }
	   else 
	  {
		   $('.north3 #west6').val();
		 $('.north3 #west6').hide();  
		 
	  }
	  var west7 = $('.newTR3 #west7').val();
	  
      var west8 = $('.newTR3 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
		   $('.newTR3 #west9').show();
	  $('.newTR3 #west9').val(west91);
	  }
	     else 
	  {
		   $('.north3 #west9').val();
		 $('.north3 #west9').hide();  
		 
	  }
	  var east1 = $('.newTR3 #east1').val();
	  
      var east2 = $('.newTR3 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
		  $('.newTR3 #east3').show();
	  $('.newTR3 #east3').val(east31);
	  }
	      else 
	  {
		   $('.north3 #east3').val();
		 $('.north3 #east3').hide();  
		 
	  }
	  var east4 = $('.newTR3 #east4').val();
	  
      var east5 = $('.newTR3 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
		  $('.newTR3 #east6').show();
	  $('.newTR3 #east6').val(east61);
	  }
	      else 
	  {
		   $('.north3 #east6').val();
		 $('.north3 #east6').hide();  
		 
	  }
	  var east7 = $('.newTR3 #east7').val();
	  
      var east8 = $('.newTR3 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
		   $('.newTR3 #east9').show();
	  $('.newTR3 #east9').val(east91);
	  }  else 
	  {
		   $('.north3 #east9').val();
		 $('.north3 #east9').hide();  
		 
	  }
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR3 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR3 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR3 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR3 #estent').val();
	   var estentnew1 = $('.newTR3 #estent1').val();
	   var estentnew2 = $('.newTR3 #estent2').val();
	   var estentnew3 = $('.newTR3 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR3 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR3 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR3 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR3 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR3 #guideselect').val();
	  var guide_rate = $('.newTR3 #guide_rate').val();
	  var sale_type = $('.newTR3 #sale_type').val();
	  var totalarea = $('.newTR3 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
 if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  } 
	   
	   
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR3 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR3 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});



////////////// start
    $('.newTR4 #sale_type').change(function() {             
            var x = 'Per '+$(this).val();    
			
            $('.newTR4 #assignsq').text(x);         
        }); 
	  ///////////// start
	 	
  $('.newTR4 input').on('blur', function() {
	  
	

      var north1 = $('.newTR4 #north1').val();
	  
      var north2 = $('.newTR4 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	   $('.newTR4 #north3').show();
	  $('.newTR4 #north3').val(north31);
	  }
	    else 
	  {
		   $('.newTR4 #north3').val();
		 $('.newTR4 #north3').hide();  
		 
	  }
	  
	  var north4 = $('.newTR4 #north4').val();
	  
      var north5 = $('.newTR4 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
   $('.newTR4 #north6').show();
	  $('.newTR4 #north6').val(north61);
	  }
	     else 
	  {
		   $('.newTR4 #north6').val();
		 $('.newTR4 #north6').hide();  
		 
	  }
	  var north7 = $('.newTR4 #north7').val();
	  
      var north8 = $('.newTR4 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
		  $('.newTR4 #north9').show();
	  $('.newTR4 #north9').val(north91);
	  }
	    else 
	  {
		   $('.newTR4 #north9').val();
		 $('.newTR4 #north9').hide();  
		 
	  }
      var south1 = $('.newTR4 #south1').val();
	  
      var south2 = $('.newTR4 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
		   $('.newTR4 #south3').show();
	  $('.newTR4 #south3').val(south31);
	  }
	      else 
	  {
		   $('.newTR4 #south3').val();
		 $('.newTR4 #south3').hide();  
		 
	  }
	  var south4 = $('.newTR4 #south4').val();
	  
      var south5 = $('.newTR4 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
		   $('.newTR4 #south6').show();
	  $('.newTR4 #south6').val(south61);
	  }
	    else 
	  {
		   $('.newTR4 #south6').val();
		 $('.newTR4 #south6').hide();  
		 
	  }
	  var south7 = $('.newTR4 #south7').val();
	  
      var south8 = $('.newTR4 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
		   $('.newTR4 #south9').show();
	  $('.newTR4 #south9').val(south91);	  
	  }
	    else 
	  {
		   $('.newTR4 #south9').val();
		 $('.newTR4 #south9').hide();  
		 
	  }
	  var west1 = $('.newTR4 #west1').val();
	  
      var west2 = $('.newTR4 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
		    $('.newTR4 #west3').show();
	  $('.newTR4 #west3').val(west31);
	  }
	     else 
	  {
		   $('.newTR4 #west3').val();
		 $('.newTR4 #west3').hide();  
		 
	  }
	  var west4 = $('.newTR4 #west4').val();
	  
      var west5 = $('.newTR4 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
		  $('.newTR4 #west6').show();
	  $('.newTR4 #west6').val(west61);
	  }
	     else 
	  {
		   $('.newTR4 #west6').val();
		 $('.newTR4 #west6').hide();  
		 
	  }
	  var west7 = $('.newTR4 #west7').val();
	  
      var west8 = $('.newTR4 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
		    $('.newTR4 #west9').show();
	  $('.newTR4 #west9').val(west91);
	  }
	  else 
	  {
		   $('.newTR4 #west9').val();
		 $('.newTR4 #west9').hide();  
		 
	  }
	  var east1 = $('.newTR4 #east1').val();
	  
      var east2 = $('.newTR4 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
		  $('.newTR4 #east3').show();
	  $('.newTR4 #east3').val(east31);
	  }
	    else 
	  {
		   $('.newTR4 #east3').val();
		 $('.newTR4 #east3').hide();  
		 
	  }
	  var east4 = $('.newTR4 #east4').val();
	  
      var east5 = $('.newTR4 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
		   $('.newTR4 #east6').show();
	  $('.newTR4 #east6').val(east61);
	  }
	      else 
	  {
		   $('.newTR4 #east6').val();
		 $('.newTR4 #east6').hide();  
		 
	  }
	  var east7 = $('.newTR4 #east7').val();
	  
      var east8 = $('.newTR4 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
		   $('.newTR4 #east8').show();
	  $('.newTR4 #east9').val(east91);
	  }
	       else 
	  {
		   $('.newTR4 #east9').val();
		 $('.newTR4 #east9').hide();  
		 
	  }
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR4 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR4 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR4 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR4 #estent').val();
	   var estentnew1 = $('.newTR4 #estent1').val();
	   var estentnew2 = $('.newTR4 #estent2').val();
	   var estentnew3 = $('.newTR4 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR4 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR4 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR4 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR4 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR4 #guideselect').val();
	  var guide_rate = $('.newTR4 #guide_rate').val();
	  var sale_type = $('.newTR4 #sale_type').val();
	  var totalarea = $('.newTR4 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	    if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   
	   
	   
	   
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR4 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 	
  $('.newTR4 select').on('blur', function() {
	  
	

      var north1 = $('.newTR4 #north1').val();
	  
      var north2 = $('.newTR4 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	   $('.newTR4 #north3').show();
	  $('.newTR4 #north3').val(north31);
	  }
	  
	  var north4 = $('.newTR4 #north4').val();
	  
      var north5 = $('.newTR4 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
  	   $('.newTR4 #north6').show();
	  $('.newTR4 #north6').val(north61);
	  }
	  var north7 = $('.newTR4 #north7').val();
	  
      var north8 = $('.newTR4 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
		   $('.newTR4 #north9').show();
	  $('.newTR4 #north9').val(north91);
	  }
	  
      var south1 = $('.newTR4 #south1').val();
	  
      var south2 = $('.newTR4 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
		     $('.newTR4 #south3').show();
	  $('.newTR4 #south3').val(south31);
	  }
	  
	  var south4 = $('.newTR4 #south4').val();
	  
      var south5 = $('.newTR4 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
		   $('.newTR4 #south6').show();
	  $('.newTR4 #south6').val(south61);
	  }
	  var south7 = $('.newTR4 #south7').val();
	  
      var south8 = $('.newTR4 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
		  $('.newTR4 #south9').show();
	  $('.newTR4 #south9').val(south91);	  
	  }
	  var west1 = $('.newTR4 #west1').val();
	  
      var west2 = $('.newTR4 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
		    $('.newTR4 #west3').show();
	  $('.newTR4 #west3').val(west31);
	  }
	  var west4 = $('.newTR4 #west4').val();
	  
      var west5 = $('.newTR4 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
		    $('.newTR4 #west6').show();
	  $('.newTR4 #west6').val(west61);
	  }
	  var west7 = $('.newTR4 #west7').val();
	  
      var west8 = $('.newTR4 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
		   $('.newTR4 #west9').show();
		  
	  $('.newTR4 #west9').val(west91);
	  }
	  var east1 = $('.newTR4 #east1').val();
	  
      var east2 = $('.newTR4 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
		  $('.newTR4 #east3').show();
	  $('.newTR4 #east3').val(east31);
	  }
	  var east4 = $('.newTR4 #east4').val();
	  
      var east5 = $('.newTR4 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
		   $('.newTR4 #east6').show();
	  $('.newTR4 #east6').val(east61);
	  }
	  var east7 = $('.newTR4 #east7').val();
	  
      var east8 = $('.newTR4 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
		   $('.newTR4 #east9').show();
	  $('.newTR4 #east9').val(east91);
	  }
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR4 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR4 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR4 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR4 #estent').val();
	   var estentnew1 = $('.newTR4 #estent1').val();
	   var estentnew2 = $('.newTR4 #estent2').val();
	   var estentnew3 = $('.newTR4 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR4 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR4 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR4 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR4 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR4 #guideselect').val();
	  var guide_rate = $('.newTR4 #guide_rate').val();
	  var sale_type = $('.newTR4 #sale_type').val();
	  var totalarea = $('.newTR4 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	     if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  } 
	   
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR4 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR4 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});



/////////// start
     $('.newTR5 #sale_type').change(function() {             
            var x = 'Per '+$(this).val();    
			
            $('.newTR5 #assignsq').text(x);         
        }); 
	  ///////////// start
	 	
  $('.newTR5 input').on('blur', function() {
	  
	

      var north1 = $('.newTR5 #north1').val();
	  
      var north2 = $('.newTR5 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	  
	  $('.newTR5 #north3').val(north31);
	  }
	  
	  var north4 = $('.newTR5 #north4').val();
	  
      var north5 = $('.newTR5 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
	  $('.newTR5 #north6').val(north61);
	  }
	  var north7 = $('.newTR5 #north7').val();
	  
      var north8 = $('.newTR5 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
	  $('.newTR5 #north9').val(north91);
	  }
	  
      var south1 = $('.newTR5 #south1').val();
	  
      var south2 = $('.newTR5 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
	  $('.newTR5 #south3').val(south31);
	  }
	  
	  var south4 = $('.newTR5 #south4').val();
	  
      var south5 = $('.newTR5 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
	  $('.newTR5 #south6').val(south61);
	  }
	  var south7 = $('.newTR5 #south7').val();
	  
      var south8 = $('.newTR5 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
	  $('.newTR5 #south9').val(south91);	  
	  }
	  var west1 = $('.newTR5 #west1').val();
	  
      var west2 = $('.newTR5 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
	  $('.newTR5 #west3').val(west31);
	  }
	  var west4 = $('.newTR5 #west4').val();
	  
      var west5 = $('.newTR5 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
	  $('.newTR5 #west6').val(west61);
	  }
	  var west7 = $('.newTR5 #west7').val();
	  
      var west8 = $('.newTR5 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
	  $('.newTR5 #west9').val(west91);
	  }
	  var east1 = $('.newTR5 #east1').val();
	  
      var east2 = $('.newTR5 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
	  $('.newTR5 #east3').val(east31);
	  }
	  var east4 = $('.newTR5 #east4').val();
	  
      var east5 = $('.newTR5 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
	  $('.newTR5 #east6').val(east61);
	  }
	  var east7 = $('.newTR5 #east7').val();
	  
      var east8 = $('.newTR5 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
	  $('.newTR5 #east9').val(east91);
	  }
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR5 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR5 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR5 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR5 #estent').val();
	   var estentnew1 = $('.newTR5 #estent1').val();
	   var estentnew2 = $('.newTR5 #estent2').val();
	   var estentnew3 = $('.newTR5 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR5 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR5 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR5 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR5 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR5 #guideselect').val();
	  var guide_rate = $('.newTR5 #guide_rate').val();
	  var sale_type = $('.newTR5 #sale_type').val();
	  var totalarea = $('.newTR5 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	    if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   
	   
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR5 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 	
  $('.newTR5 select').on('blur', function() {
	  
	

      var north1 = $('.newTR5 #north1').val();
	  
      var north2 = $('.newTR5 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='')
	  { 
	  
	  $('.newTR5 #north3').val(north31);
	  }
	  
	  var north4 = $('.newTR5 #north4').val();
	  
      var north5 = $('.newTR5 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  if(north4!='' || north5!='')
	  { 
	  $('.newTR5 #north6').val(north61);
	  }
	  var north7 = $('.newTR5 #north7').val();
	  
      var north8 = $('.newTR5 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	   if(north7!='' || north8!='')
	  {
	  $('.newTR5 #north9').val(north91);
	  }
	  
      var south1 = $('.newTR5 #south1').val();
	  
      var south2 = $('.newTR5 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	   if(south1!='' || south2!='')
	  {
	  $('.newTR5 #south3').val(south31);
	  }
	  
	  var south4 = $('.newTR5 #south4').val();
	  
      var south5 = $('.newTR5 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	     if(south4!='' || south5!='')
	  {
	  $('.newTR5 #south6').val(south61);
	  }
	  var south7 = $('.newTR5 #south7').val();
	  
      var south8 = $('.newTR5 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	     if(south7!='' || south8!='')
	  {
	  $('.newTR5 #south9').val(south91);	  
	  }
	  var west1 = $('.newTR5 #west1').val();
	  
      var west2 = $('.newTR5 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	     if(west1!='' || west2!='')
	  {
	  $('.newTR5 #west3').val(west31);
	  }
	  var west4 = $('.newTR5 #west4').val();
	  
      var west5 = $('.newTR5 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	     if(west4!='' || west5!='')
	  {
	  $('.newTR5 #west6').val(west61);
	  }
	  var west7 = $('.newTR5 #west7').val();
	  
      var west8 = $('.newTR5 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	    if(west7!='' || west8!='')
	  {
	  $('.newTR5 #west9').val(west91);
	  }
	  var east1 = $('.newTR5 #east1').val();
	  
      var east2 = $('.newTR5 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	   if(east1!='' || east2!='')
	  {
	  $('.newTR5 #east3').val(east31);
	  }
	  var east4 = $('.newTR5 #east4').val();
	  
      var east5 = $('.newTR5 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	   if(east4!='' || east5!='')
	  {
	  $('.newTR5 #east6').val(east61);
	  }
	  var east7 = $('.newTR5 #east7').val();
	  
      var east8 = $('.newTR5 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='')
	  {
	  $('.newTR5 #east9').val(east91);
	  }
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	    if(estent1!='0.00') {
	  $('.newTR5 #estent1').val(estent1);
		}
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	    if(estent2!='0.00') {
	  $('.newTR5 #estent2').val(estent2);
		}
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	    if(estent3!='0.00') {
	  $('.newTR5 #estent3').val(estent3);
		}
	  
	  
	 var estentnew = $('.newTR5 #estent').val();
	   var estentnew1 = $('.newTR5 #estent1').val();
	   var estentnew2 = $('.newTR5 #estent2').val();
	   var estentnew3 = $('.newTR5 #estent3').val();
	   
if(estentnew=='') { var estentnewal=10000000;} else { var estentnewal=estentnew; }
if(estentnew1=='') { var estentnewal1=10000000;} else { var estentnewal1=estentnew1; }
if(estentnew2=='') { var estentnewal2=10000000;} else { var estentnewal2=estentnew2; }
if(estentnew3=='') { var estentnewal3=10000000;} else { var estentnewal3=estentnew3; }
	  
	   var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	   
	     var anyarea = $('.newTR5 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR5 #totalarea').val(estentotal);
	  }
	  var totalrate = $('.newTR5 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR5 #totallandvalue').val(totallandvalue);
	 
	 var guideselect = $('.newTR5 #guideselect').val();
	  var guide_rate = $('.newTR5 #guide_rate').val();
	  var sale_type = $('.newTR5 #sale_type').val();
	  var totalarea = $('.newTR5 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	   if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  } 
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR5 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR5 #guidevalue').val(guidevalue);  }
	  
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;

$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});
var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 
 ///////////////// end 
 
 
	  
	
    });
	

 $(document).on('click', '#remove_more', function() { 
      var rr = $(this).attr('class');


       var newclass=rr.replace("d", "");
	
	   $('.'+newclass).remove();
	  
	   return false;
    });  
	  
$(".newTR1 #btnAdd1").click(function() {
    $(".newTR1 #a1").append('<div class="con1"><select name="roof[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
  });
  

  
  $('body').on('click','.btnRemove1',function() { alert();
    $(this).parent('div.con1').remove()

  });
  
  
     $('.newTR1 select').on('blur', function() {
	 var north1 = $('.newTR1 #north1').val();
	  
      var north2 = $('.newTR1 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='') {
		  	 $('.newTR1 #north3').show();  
	  $('.newTR1 #north3').val(north31);
	  }
	  else 
	  {
		   $('.newTR1 #north3').val();
		 $('.newTR1 #north3').hide();  
		 
	  }
	  
	  var north4 = $('.newTR1 #north4').val();
	  
      var north5 = $('.newTR1 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	   if(north4!='' || north5!='') {
		        $('.newTR1 #north6').show();
	  $('.newTR1 #north6').val(north61);
	   }
	     else 
	  {
		   $('.newTR1 #north6').val();
		 $('.newTR1 #north6').hide();  
		 
	  }
	  var north7 = $('.newTR1 #north7').val();
	  
      var north8 = $('.newTR1 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  if(north7!='' || north8!='') {
		   $('.newTR1 #north9').show();
	  $('.newTR1 #north9').val(north91);
	  }
	    else 
	  {
		   $('.newTR1 #north9').val();
		 $('.newTR1 #north9').hide();  
		 
	  }
      var south1 = $('.newTR1 #south1').val();
	  
      var south2 = $('.newTR1 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  if(south1!='' || south2!='') {
		   $('.newTR1 #south3').show();
	  $('.newTR1 #south3').val(south31);
	  }
	   else 
	  {
		   $('.newTR1 #south3').val();
		 $('.newTR1 #south3').hide();  
		 
	  }
	  
	  var south4 = $('.newTR1 #south4').val();
	  
      var south5 = $('.newTR1 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  if(south4!='' || south5!='') {
		    $('.newTR1 #south6').show();
	  $('.newTR1 #south6').val(south61);
	  }
	   else 
	  {
		   $('.newTR1 #south6').val();
		 $('.newTR1 #south6').hide();  
		 
	  }
	  var south7 = $('.newTR1 #south7').val();
	  
      var south8 = $('.newTR1 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	    if(south7!='' || south8!='') {
			$('.newTR1 #south9').show();
	  $('.newTR1 #south9').val(south91);	  
		}
		 else 
	  {
		   $('.newTR1 #south9').val();
		 $('.newTR1 #south9').hide();  
		 
	  }
	  var west1 = $('.newTR1 #west1').val();
	  
      var west2 = $('.newTR1 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	    if(west1!='' || west2!='') {
			$('.newTR1 #west3').show();
	  $('.newTR1 #west3').val(west31);
		}
		 else 
	  {
		   $('.newTR1 #west3').val();
		 $('.newTR1 #west3').hide();  
		 
	  }
	  var west4 = $('.newTR1 #west4').val();
	  
      var west5 = $('.newTR1 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	   if(west4!='' || west5!='') {
		   	$('.newTR1 #west6').show();
	  $('.newTR1 #west6').val(west61);
	   }
	   	 else 
	  {
		   $('.newTR1 #west6').val();
		 $('.newTR1 #west6').hide();  
		 
	  }
	  var west7 = $('.newTR1 #west7').val();
	  
      var west8 = $('.newTR1 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  if(west7!='' || west8!='') {
		     	$('.newTR1 #west9').show();
	  $('.newTR1 #west9').val(west91);
	  }
	   else 
	  {
		   $('.newTR1 #west9').val();
		 $('.newTR1 #west9').hide();  
		 
	  }
	  var east1 = $('.newTR1 #east1').val();
	  
      var east2 = $('.newTR1 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	    if(east1!='' || east2!='') {
			 	$('.newTR1 #east3').show();
	  $('.newTR1 #east3').val(east31);
		}
		  else 
	  {
		   $('.newTR1 #east3').val();
		 $('.newTR1 #east3').hide();  
		 
	  }
	  var east4 = $('.newTR1 #east4').val();
	  
      var east5 = $('.newTR1 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  if(east4!='' || east5!='') {
		  	$('.newTR1 #east6').show();
	  $('.newTR1 #east6').val(east61);
	  }
	    else 
	  {
		   $('.newTR1 #east6').val();
		 $('.newTR1 #east6').hide();  
		 
	  }
	  var east7 = $('.newTR1 #east7').val();
	  
      var east8 = $('.newTR1 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='') {
		   		  	$('.newTR1 #east9').show();
	  $('.newTR1 #east9').val(east91);
	   }
	       else 
	  {
		   $('.newTR1 #east9').val();
		 $('.newTR1 #east9').hide();  
		 
	  }
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
  if(estent1!='0.00') {
	  $('.newTR1 #estent1').val(estent1);
  }
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	   if(estent2!='0.00') {
	  $('.newTR1 #estent2').val(estent2);
	   }
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	 
	  
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	   if(estent3!='0.00') {
	  $('.newTR1 #estent3').val(estent3);
	  }
	  
	  
	   var estentnew = $('.newTR1 #estent').val();
	   var estentnew1 = $('.newTR1 #estent1').val();
	   var estentnew2 = $('.newTR1 #estent2').val();
	   var estentnew3 = $('.newTR1 #estent3').val();
	   
   var estentnew_type = $('.newTR1 #manual_type').val();
	   var estentnew1_type = $('.newTR1 #patta_type').val();
	   var estentnew2_type = $('.newTR1 #document_type').val();
	   var estentnew3_type = $('.newTR1 #actual_type').val();
	   
	   

	   
	   
	   
if(estentnew=='') { var estentnewal=10000000; var estentnewvalue=1000000000;} else { var estentnewal=estentnew;      
if(estentnew_type=='Sq ft'){ var estentnewvalue = parseFloat(estentnew).toFixed(2);  } 
if(estentnew_type=='Cent'){  var estentnewvalue = (parseFloat(estentnew)*435.6).toFixed(2); } 
if(estentnew_type=='Acre'){ var estentnewvalue = (parseFloat(estentnew)*43560).toFixed(2);}
if(estentnew_type=='Hectare'){ var estentnewvalue = (parseFloat(estentnew)*107639).toFixed(2); }
if(estentnew_type=='Sq m'){   var estentnewvalue = (parseFloat(estentnew)*10.7639).toFixed(2);; }      

  $('.newTR1 #manualtype').text(estentnewvalue);
}


if(estentnew1=='') { var estentnewal1=10000000; var estentnew1value=1000000000;} else { var estentnewal1=estentnew1;     

if(estentnew1_type=='Sq ft'){ var estentnew1value = parseFloat(estentnew1).toFixed(2);  } 
if(estentnew1_type=='Cent'){  var estentnew1value = (parseFloat(estentnew1)*435.6).toFixed(2); } 
if(estentnew1_type=='Acre'){ var estentnew1value = (parseFloat(estentnew1)*43560).toFixed(2);}
if(estentnew1_type=='Hectare'){ var estentnew1value = (parseFloat(estentnew1)*107639).toFixed(2); }
if(estentnew1_type=='Sq m'){   var estentnew1value = (parseFloat(estentnew1)*10.7639).toFixed(2);; }
  $('.newTR1 #pattatype').text(estentnew1value);
           }
if(estentnew2=='') { var estentnewal2=10000000; var estentnew2value=1000000000;} else { var estentnewal2=estentnew2;    
if(estentnew2_type=='Sq ft'){ var estentnew2value = parseFloat(estentnew2).toFixed(2);  } 
if(estentnew2_type=='Cent'){  var estentnew2value = (parseFloat(estentnew2)*435.6).toFixed(2); } 
if(estentnew2_type=='Acre'){ var estentnew2value = (parseFloat(estentnew2)*43560).toFixed(2);}
if(estentnew2_type=='Hectare'){ var estentnew2value = (parseFloat(estentnew2)*107639).toFixed(2); }
if(estentnew2_type=='Sq m'){   var estentnew2value = (parseFloat(estentnew2)*10.7639).toFixed(2);; }
  $('.newTR1 #documentype').text(estentnew2value);
            }
			
if(estentnew3=='') { var estentnewal3=10000000; var estentnew3value=1000000000;} else { var estentnewal3=estentnew3;        


if(estentnew3_type=='Sq ft'){ var estentnew3value = parseFloat(estentnew3).toFixed(2);  } 
if(estentnew3_type=='Cent'){  var estentnew3value = (parseFloat(estentnew3)*435.6).toFixed(2); } 
if(estentnew3_type=='Acre'){ var estentnew3value = (parseFloat(estentnew3)*43560).toFixed(2);}
if(estentnew3_type=='Hectare'){ var estentnew3value = (parseFloat(estentnew3)*107639).toFixed(2); }
if(estentnew3_type=='Sq m'){   var estentnew3value = (parseFloat(estentnew3)*10.7639).toFixed(2);; }
  $('.newTR1 #actualtype').text(estentnew3value);

        }
		
		
		
	  var estentotalall = Math.min(estentnewvalue,estentnew1value,estentnew2value,estentnew3value);	
		
	 if(estentotalall==estentnewvalue) {  var estentotal =estentnewal;  }
	 if(estentotalall==estentnew1value) { var estentotal =estentnew1;  }
	 if(estentotalall==estentnew2value) { var estentotal =estentnew2; }
	 if(estentotalall==estentnew3value) { var estentotal =estentnew3; }
	  
	  
	  if(estentnew_type=='' && estentnew1_type=='' && estentnew2_type=='' && estentnew3_type=='')
	  {
	  var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	  }
	  
	  
	  var anyarea = $('.newTR1 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR1 #totalarea').val(estentotal);
	  }
	  
	  var totalrate = $('.newTR1 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR1 #totallandvalue').val(totallandvalue);
	 
	 
	  var guideselect = $('.newTR1 #guideselect').val();
	  var guide_rate = $('.newTR1 #guide_rate').val();
	  var sale_type = $('.newTR1 #sale_type').val();
	  var totalarea = $('.newTR1 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	   if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   
	   
	   
		 
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR1 #guidevalue').val(guidevalue);  }
	  
	 
	 
	    var sum3=0;
    $(".totallandvalue").each(function(){
        if($(this).val() != "")
          sum3 += parseFloat($(this).val());   
    });




       $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
	
	
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});
var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

	   
	   
 });
  $('.newTR1 input').on('blur', function() {

      var north1 = $('.newTR1 #north1').val();
	  
      var north2 = $('.newTR1 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  if(north1!='' || north2!='') {
	 $('.newTR1 #north3').show();  
	  $('.newTR1 #north3').val(north31);
	  }
	  else 
	  {
		   $('.newTR1 #north3').val();
		 $('.newTR1 #north3').hide();  
		 
	  }
	  
	  var north4 = $('.newTR1 #north4').val();
	  
      var north5 = $('.newTR1 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	   if(north4!='' || north5!='') {
		 $('.newTR1 #north6').show();  
	  $('.newTR1 #north6').val(north61);
	   }
	    else 
	  {
		   $('.newTR1 #north6').val();
		 $('.newTR1 #north6').hide();  
		 
	  }
	  var north7 = $('.newTR1 #north7').val();
	  
      var north8 = $('.newTR1 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  if(north7!='' || north8!='') {
   $('.newTR1 #north9').show();  
	  $('.newTR1 #north9').val(north91);
	  }
	    else 
	  {
		   $('.newTR1 #north9').val();
		 $('.newTR1 #north9').hide();  
		 
	  }
	  
      var south1 = $('.newTR1 #south1').val();
	  
      var south2 = $('.newTR1 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  if(south1!='' || south2!='') {
		     $('.newTR1 #south3').show();  
	  $('.newTR1 #south3').val(south31);
	  }
	    else 
	  {
		   $('.newTR1 #south3').val();
		 $('.newTR1 #south3').hide();  
		 
	  }
	  var south4 = $('.newTR1 #south4').val();
	  
      var south5 = $('.newTR1 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  if(south4!='' || south5!='') {
		   $('.newTR1 #south6').show();  
	  $('.newTR1 #south6').val(south61);
	  }
	    else 
	  {
		   $('.newTR1 #south6').val();
		 $('.newTR1 #south6').hide();  
		 
	  }
	  var south7 = $('.newTR1 #south7').val();
	  
      var south8 = $('.newTR1 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	    if(south7!='' || south8!='') {
			  $('.newTR1 #south9').show();  
	  $('.newTR1 #south9').val(south91);	  
		}  else 
	  {
		   $('.newTR1 #south9').val();
		 $('.newTR1 #south9').hide();  
		 
	  }
	  var west1 = $('.newTR1 #west1').val();
	  
      var west2 = $('.newTR1 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	    if(west1!='' || west2!='') {
			  $('.newTR1 #west3').show(); 
	  $('.newTR1 #west3').val(west31);
		}
		 else 
	  {
		   $('.newTR1 #west3').val();
		 $('.newTR1 #west3').hide();  
		 
	  }
	  var west4 = $('.newTR1 #west4').val();
	  
      var west5 = $('.newTR1 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	   if(west4!='' || west5!='') {
		     $('.newTR1 #west6').show(); 
	  $('.newTR1 #west6').val(west61);
	   }
	    else 
	  {
		   $('.newTR1 #west6').val();
		 $('.newTR1 #west6').hide();  
		 
	  }
	  var west7 = $('.newTR1 #west7').val();
	  
      var west8 = $('.newTR1 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  if(west7!='' || west8!='') {
		  	     $('.newTR1 #west9').show(); 
	  $('.newTR1 #west9').val(west91);
	  }
	    else 
	  {
		   $('.newTR1 #west9').val();
		 $('.newTR1 #west9').hide();  
		 
	  }
	  var east1 = $('.newTR1 #east1').val();
	  
      var east2 = $('.newTR1 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	    if(east1!='' || east2!='') {
			    $('.newTR1 #east3').show(); 
	  $('.newTR1 #east3').val(east31);
		}
		  else 
	  {
		   $('.newTR1 #east3').val();
		 $('.newTR1 #east3').hide();  
		 
	  }
	  var east4 = $('.newTR1 #east4').val();
	  
      var east5 = $('.newTR1 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  if(east4!='' || east5!='') {
		      $('.newTR1 #east6').show(); 
	  $('.newTR1 #east6').val(east61);
	  }
	    else 
	  {
		   $('.newTR1 #east6').val();
		 $('.newTR1 #east6').hide();  
		 
	  }
	  var east7 = $('.newTR1 #east7').val();
	  
      var east8 = $('.newTR1 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	   if(east7!='' || east8!='') {
		     $('.newTR1 #east9').show(); 
	  $('.newTR1 #east9').val(east91);
	   }
	     else 
	  {
		   $('.newTR1 #east9').val();
		 $('.newTR1 #east9').hide();  
		 
	  }
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	  
	
	  $("input[type='radio']").click(function(){ 
            
			
       var estent1Value = $("input[name='est1']:checked").val();
	   if(estent1Value=='OFF') {
	   $('.newTR1 #estent1').val('');
	   }
	   else {  $('.newTR1 #estent1').val(estent1);  }
			
	   var estent2Value = $("input[name='est2']:checked").val();
	     if(estent2Value=='OFF') {
	   $('.newTR1 #estent2').val('');
	   }
	   else {  $('.newTR1 #estent2').val(estent2);  }
						  
	   var estent3Value = $("input[name='est3']:checked").val();
        if(estent3Value=='OFF') {
	   $('.newTR1 #estent3').val('');
	   }
	   else {  $('.newTR1 #estent3').val(estent3);  }
	   
	   
	   
        });

	     var estent1Value = $("input[name='est1']:checked").val();
		 
	     var estent2Value = $("input[name='est2']:checked").val();
		 
	     var estent3Value = $("input[name='est3']:checked").val();
		
	
  if(estent1!='0.00' && estent1Value!='OFF') {
	  $('.newTR1 #estent1').val(estent1);
  }
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	   if(estent2!='0.00' && estent2Value!='OFF') {
	  $('.newTR1 #estent2').val(estent2);
	   }
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	 
	  
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	   if(estent3!='0.00' && estent3Value!='OFF') {
	  $('.newTR1 #estent3').val(estent3);
	  }
	  
	  
	   var estentnew = $('.newTR1 #estent').val();
	   var estentnew1 = $('.newTR1 #estent1').val();
	   var estentnew2 = $('.newTR1 #estent2').val();
	   var estentnew3 = $('.newTR1 #estent3').val();
	   
	   
	  var estentnew_type = $('.newTR1 #manual_type').val();
	   var estentnew1_type = $('.newTR1 #patta_type').val();
	   var estentnew2_type = $('.newTR1 #document_type').val();
	   var estentnew3_type = $('.newTR1 #actual_type').val();
	   
	   

	   
	   
	   
if(estentnew=='') { var estentnewal=10000000; var estentnewvalue=1000000000;} else { var estentnewal=estentnew;      
if(estentnew_type=='Sq ft'){ var estentnewvalue = parseFloat(estentnew).toFixed(2);  } 
if(estentnew_type=='Cent'){  var estentnewvalue = (parseFloat(estentnew)*435.6).toFixed(2); } 
if(estentnew_type=='Acre'){ var estentnewvalue = (parseFloat(estentnew)*43560).toFixed(2);}
if(estentnew_type=='Hectare'){ var estentnewvalue = (parseFloat(estentnew)*107639).toFixed(2); }
if(estentnew_type=='Sq m'){   var estentnewvalue = (parseFloat(estentnew)*10.7639).toFixed(2);; }      

  $('.newTR1 #manualtype').text(estentnewvalue);
}


if(estentnew1=='') { var estentnewal1=10000000; var estentnew1value=1000000000;} else { var estentnewal1=estentnew1;     

if(estentnew1_type=='Sq ft'){ var estentnew1value = parseFloat(estentnew1).toFixed(2);  } 
if(estentnew1_type=='Cent'){  var estentnew1value = (parseFloat(estentnew1)*435.6).toFixed(2); } 
if(estentnew1_type=='Acre'){ var estentnew1value = (parseFloat(estentnew1)*43560).toFixed(2);}
if(estentnew1_type=='Hectare'){ var estentnew1value = (parseFloat(estentnew1)*107639).toFixed(2); }
if(estentnew1_type=='Sq m'){   var estentnew1value = (parseFloat(estentnew1)*10.7639).toFixed(2);; }
  $('.newTR1 #pattatype').text(estentnew1value);
           }
if(estentnew2=='') { var estentnewal2=10000000; var estentnew2value=1000000000;} else { var estentnewal2=estentnew2;    
if(estentnew2_type=='Sq ft'){ var estentnew2value = parseFloat(estentnew2).toFixed(2);  } 
if(estentnew2_type=='Cent'){  var estentnew2value = (parseFloat(estentnew2)*435.6).toFixed(2); } 
if(estentnew2_type=='Acre'){ var estentnew2value = (parseFloat(estentnew2)*43560).toFixed(2);}
if(estentnew2_type=='Hectare'){ var estentnew2value = (parseFloat(estentnew2)*107639).toFixed(2); }
if(estentnew2_type=='Sq m'){   var estentnew2value = (parseFloat(estentnew2)*10.7639).toFixed(2);; }
  $('.newTR1 #documentype').text(estentnew2value);
            }
			
if(estentnew3=='') { var estentnewal3=10000000; var estentnew3value=1000000000;} else { var estentnewal3=estentnew3;        


if(estentnew3_type=='Sq ft'){ var estentnew3value = parseFloat(estentnew3).toFixed(2);  } 
if(estentnew3_type=='Cent'){  var estentnew3value = (parseFloat(estentnew3)*435.6).toFixed(2); } 
if(estentnew3_type=='Acre'){ var estentnew3value = (parseFloat(estentnew3)*43560).toFixed(2);}
if(estentnew3_type=='Hectare'){ var estentnew3value = (parseFloat(estentnew3)*107639).toFixed(2); }
if(estentnew3_type=='Sq m'){   var estentnew3value = (parseFloat(estentnew3)*10.7639).toFixed(2);; }
  $('.newTR1 #actualtype').text(estentnew3value);

        }
		
		
		
	  var estentotalall = Math.min(estentnewvalue,estentnew1value,estentnew2value,estentnew3value);	
		
	 if(estentotalall==estentnewvalue) {  var estentotal =estentnewal;  }
	 if(estentotalall==estentnew1value) { var estentotal =estentnew1;  }
	 if(estentotalall==estentnew2value) { var estentotal =estentnew2; }
	 if(estentotalall==estentnew3value) { var estentotal =estentnew3; }
	  
	  
	  if(estentnew_type=='' && estentnew1_type=='' && estentnew2_type=='' && estentnew3_type=='')
	  {
	  var estentotal = Math.min(estentnewal,estentnewal1,estentnewal2,estentnewal3);
	  }
	  
	  
	  var anyarea = $('.newTR1 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  if(estentnew!='' || estentnew1!='' || estentnew2!='' || estentnew3) {
	  $('.newTR1 #totalarea').val(estentotal);
	  }
	  
	  var totalrate = $('.newTR1 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(estentotal)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR1 #totallandvalue').val(totallandvalue);
	 
	 
	  var guideselect = $('.newTR1 #guideselect').val();
	  var guide_rate = $('.newTR1 #guide_rate').val();
	  var sale_type = $('.newTR1 #sale_type').val();
	  var totalarea = $('.newTR1 #totalarea').val();
	  
	  //////////////// step 1  ///////////// 
	  
	  
	   if(sale_type=='Sq ft' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/435.559)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/107639)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq m') {  var guidevalue = ((parseFloat(guide_rate)/10.7639)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/247.1280747)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Cent' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*40.46*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
      if(sale_type=='Acre' && guideselect=='Hectare') {  var guidevalue = ((parseFloat(guide_rate)/2.47105)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Acre' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*4046.86*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	  if(sale_type=='Hectare' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*107639*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Cent') {  var guidevalue = (parseFloat(guide_rate)*247.1280747*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Acre') {  var guidevalue = (parseFloat(guide_rate)*2.47105*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Hectare' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Hectare' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*10.7639*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Cent') {  var guidevalue = ((parseFloat(guide_rate)/40.46)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	 if(sale_type=='Sq m' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/4046.86)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	  if(sale_type=='Sq m' && guideselect=='Sq m') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   if(sale_type=='Sq m' && guideselect=='Hectare') {  var guidevalue = (parseFloat(guide_rate)*10000*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  } 
	   
	   
	   
	   if(sale_type=='Sq ft' && guideselect=='Acre') {  var guidevalue = ((parseFloat(guide_rate)/43560)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Sq ft' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Sq ft') {  var guidevalue = (parseFloat(guide_rate)*435.559*parseFloat(totalarea)).toFixed(2);; $('.newTR1 #guidevalue').val(guidevalue);  }
	   if(sale_type=='Cent' && guideselect=='Acre') {   var guidevalue = ((parseFloat(guide_rate)/100.0091836)*parseFloat(totalarea)).toFixed(2);;  $('.newTR1 #guidevalue').val(guidevalue);  }
	  
	 
	 
	    var sum3=0;
    $(".totallandvalue").each(function(){
        if($(this).val() != "")
          sum3 += parseFloat($(this).val());   
    });




       $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
	
	
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	

 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_percen = $('#forced_percen').val() || 0;

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});




  $('.totallandval input').on('blur', function() {

var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	

 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_percen = $('#forced_percen').val() || 0;

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);
	
	
    
 });

  $('.totallandval select').on('blur', function() {

var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});
var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);
	
	
    
 });
 
 ///////////// start
 
$(".newTR551 #btnAdd1").click(function() {
    $(".newTR551 #a1").append('<div class="con1"><select name="roof1[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
  });
  $(".newTR552 #btnAdd1").click(function() {
    $(".newTR552 #a1").append('<div class="con1"><select name="roof2[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
  });
    $(".newTR553 #btnAdd1").click(function() {
    $(".newTR553 #a1").append('<div class="con1"><select name="roof3[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
  });
  
    $(".newTR554 #btnAdd1").click(function() {
    $(".newTR554 #a1").append('<div class="con1"><select name="roof4[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
  });
  
    $(".newTR555 #btnAdd1").click(function() {
    $(".newTR555 #a1").append('<div class="con1"><select name="roof5[]" id="roof" style="display:block;    border: 1px solid;margin-top: 33px;"><option value="" selected>Roof</option><?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc"); while ($roof1 = mysqli_fetch_array($roof)) {?><option <?php if($roof1['id']==$project1['roof']) {?> selected <?php } ?> value="<?php echo $roof1['id'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<a type="button" class="btnRemove1" style="background: red;padding: 3px;color: white;border-color: red;font-weight: bold;float: right;">X</a></div>');
  });
	 	
  $('.newTR551 input').on('blur', function() {
	  
	  
	  

      var north1 = $('.newTR551 #north1').val();
	  
      var north2 = $('.newTR551 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR551 #north3').val(north31);
	  
	  var north4 = $('.newTR551 #north4').val();
	  
      var north5 = $('.newTR551 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR551 #north6').val(north61);
	  
	  var north7 = $('.newTR551 #north7').val();
	  
      var north8 = $('.newTR551 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR551 #north9').val(north91);
	  
	  
      var south1 = $('.newTR551 #south1').val();
	  
      var south2 = $('.newTR551 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR551 #south3').val(south31);
	  
	  var south4 = $('.newTR551 #south4').val();
	  
      var south5 = $('.newTR551 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR551 #south6').val(south61);
	  
	  var south7 = $('.newTR551 #south7').val();
	  
      var south8 = $('.newTR551 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR551 #south9').val(south91);	  
	  
	  var west1 = $('.newTR551 #west1').val();
	  
      var west2 = $('.newTR551 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR551 #west3').val(west31);
	  
	  var west4 = $('.newTR551 #west4').val();
	  
      var west5 = $('.newTR551 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR551 #west6').val(west61);
	  
	  var west7 = $('.newTR551 #west7').val();
	  
      var west8 = $('.newTR551 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR551 #west9').val(west91);
	  
	  var east1 = $('.newTR551 #east1').val();
	  
      var east2 = $('.newTR551 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR551 #east3').val(east31);
	  
	  var east4 = $('.newTR551 #east4').val();
	  
      var east5 = $('.newTR551 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR551 #east6').val(east61);
	  
	  var east7 = $('.newTR551 #east7').val();
	  
      var east8 = $('.newTR551 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR551 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR551 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR551 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR551 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	
      else if(estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent2,estent3);	
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
	  
	  
	  
	  var anyarea = $('.newTR551 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR551 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR551 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR551 #totallandvalue').val(totallandvalue);
	 
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));

var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});
var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 
	  ///////////// start
	 	
  $('.newTR552 input').on('blur', function() {

      var north1 = $('.newTR552 #north1').val();
	  
      var north2 = $('.newTR552 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR552 #north3').val(north31);
	  
	  var north4 = $('.newTR552 #north4').val();
	  
      var north5 = $('.newTR552 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR552 #north6').val(north61);
	  
	  var north7 = $('.newTR552 #north7').val();
	  
      var north8 = $('.newTR552 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR552 #north9').val(north91);
	  
	  
      var south1 = $('.newTR552 #south1').val();
	  
      var south2 = $('.newTR552 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR552 #south3').val(south31);
	  
	  var south4 = $('.newTR552 #south4').val();
	  
      var south5 = $('.newTR552 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR552 #south6').val(south61);
	  
	  var south7 = $('.newTR552 #south7').val();
	  
      var south8 = $('.newTR552 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR552 #south9').val(south91);	  
	  
	  var west1 = $('.newTR552 #west1').val();
	  
      var west2 = $('.newTR552 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR552 #west3').val(west31);
	  
	  var west4 = $('.newTR552 #west4').val();
	  
      var west5 = $('.newTR552 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR552 #west6').val(west61);
	  
	  var west7 = $('.newTR552 #west7').val();
	  
      var west8 = $('.newTR552 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR552 #west9').val(west91);
	  
	  var east1 = $('.newTR552 #east1').val();
	  
      var east2 = $('.newTR552 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR552 #east3').val(east31);
	  
	  var east4 = $('.newTR552 #east4').val();
	  
      var east5 = $('.newTR552 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR552 #east6').val(east61);
	  
	  var east7 = $('.newTR552 #east7').val();
	  
      var east8 = $('.newTR552 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR552 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR552 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR552 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR552 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	
 else if(estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent2,estent3);	
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
	  
	  
	  
	  var anyarea = $('.newTR552 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR552 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR552 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR552 #totallandvalue').val(totallandvalue);
	 
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


	  ///////////// start
	 	
  $('.newTR553 input').on('blur', function() {

      var north1 = $('.newTR553 #north1').val();
	  
      var north2 = $('.newTR553 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR553 #north3').val(north31);
	  
	  var north4 = $('.newTR553 #north4').val();
	  
      var north5 = $('.newTR553 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR553 #north6').val(north61);
	  
	  var north7 = $('.newTR553 #north7').val();
	  
      var north8 = $('.newTR553 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR553 #north9').val(north91);
	  
	  
      var south1 = $('.newTR553 #south1').val();
	  
      var south2 = $('.newTR553 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR553 #south3').val(south31);
	  
	  var south4 = $('.newTR553 #south4').val();
	  
      var south5 = $('.newTR553 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR553 #south6').val(south61);
	  
	  var south7 = $('.newTR553 #south7').val();
	  
      var south8 = $('.newTR553 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR553 #south9').val(south91);	  
	  
	  var west1 = $('.newTR553 #west1').val();
	  
      var west2 = $('.newTR553 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR553 #west3').val(west31);
	  
	  var west4 = $('.newTR553 #west4').val();
	  
      var west5 = $('.newTR553 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR553 #west6').val(west61);
	  
	  var west7 = $('.newTR553 #west7').val();
	  
      var west8 = $('.newTR553 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR553 #west9').val(west91);
	  
	  var east1 = $('.newTR553 #east1').val();
	  
      var east2 = $('.newTR553 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR553 #east3').val(east31);
	  
	  var east4 = $('.newTR553 #east4').val();
	  
      var east5 = $('.newTR553 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR553 #east6').val(east61);
	  
	  var east7 = $('.newTR553 #east7').val();
	  
      var east8 = $('.newTR553 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR553 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR553 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR553 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR553 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	 
 else if(estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent2,estent3);	
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
	  
	  
	  
	  var anyarea = $('.newTR553 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR553 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR553 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR553 #totallandvalue').val(totallandvalue);
	 
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 
	  ///////////// start
	 	
  $('.newTR554 input').on('blur', function() {

      var north1 = $('.newTR554 #north1').val();
	  
      var north2 = $('.newTR554 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR554 #north3').val(north31);
	  
	  var north4 = $('.newTR554 #north4').val();
	  
      var north5 = $('.newTR554 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR554 #north6').val(north61);
	  
	  var north7 = $('.newTR554 #north7').val();
	  
      var north8 = $('.newTR554 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR554 #north9').val(north91);
	  
	  
      var south1 = $('.newTR554 #south1').val();
	  
      var south2 = $('.newTR554 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR554 #south3').val(south31);
	  
	  var south4 = $('.newTR554 #south4').val();
	  
      var south5 = $('.newTR554 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR554 #south6').val(south61);
	  
	  var south7 = $('.newTR554 #south7').val();
	  
      var south8 = $('.newTR554 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR554 #south9').val(south91);	  
	  
	  var west1 = $('.newTR554 #west1').val();
	  
      var west2 = $('.newTR554 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR554 #west3').val(west31);
	  
	  var west4 = $('.newTR554 #west4').val();
	  
      var west5 = $('.newTR554 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR554 #west6').val(west61);
	  
	  var west7 = $('.newTR554 #west7').val();
	  
      var west8 = $('.newTR554 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR554 #west9').val(west91);
	  
	  var east1 = $('.newTR554 #east1').val();
	  
      var east2 = $('.newTR554 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR554 #east3').val(east31);
	  
	  var east4 = $('.newTR554 #east4').val();
	  
      var east5 = $('.newTR554 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR554 #east6').val(east61);
	  
	  var east7 = $('.newTR554 #east7').val();
	  
      var east8 = $('.newTR554 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR554 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR554 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR554 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR554 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	  
	   else if(estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent2,estent3);	
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
	  
	  
	  
	  var anyarea = $('.newTR554 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR554 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR554 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR554 #totallandvalue').val(totallandvalue);
	 
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});


 
	  ///////////// start
	 	
  $('.newTR555 input').on('blur', function() {

      var north1 = $('.newTR555 #north1').val();
	  
      var north2 = $('.newTR555 #north2').val();
	  
	  if(north1=='') { var north1=0;}if(north2=='') { var north2=0;}
	  
      var north3 = (parseFloat(north2)/12).toFixed(2);;
	  
      var north31=(parseFloat(north1)+parseFloat(north3)).toFixed(2);;
	  
	  $('.newTR555 #north3').val(north31);
	  
	  var north4 = $('.newTR555 #north4').val();
	  
      var north5 = $('.newTR555 #north5').val();
	  
	  if(north4=='') { var north4=0;}if(north5=='') { var north5=0;}
	  
      var north6 = (parseFloat(north5)/12).toFixed(2);;
	  
      var north61=(parseFloat(north4)+parseFloat(north6)).toFixed(2);;
	  
	  $('.newTR555 #north6').val(north61);
	  
	  var north7 = $('.newTR555 #north7').val();
	  
      var north8 = $('.newTR555 #north8').val();
	  
	  if(north7=='') { var north7=0;} if(north8=='') { var north8=0;}
	  
      var north9 = (parseFloat(north8)/12).toFixed(2);;
	  
      var north91=(parseFloat(north7)+parseFloat(north9)).toFixed(2);;
	  
	  $('.newTR555 #north9').val(north91);
	  
	  
      var south1 = $('.newTR555 #south1').val();
	  
      var south2 = $('.newTR555 #south2').val();
	  
	  if(south1=='') { var south1=0;}if(south2=='') { var south2=0;}
	  
      var south3 = (parseFloat(south2)/12).toFixed(2);;
	  
      var south31=(parseFloat(south1)+parseFloat(south3)).toFixed(2);;
	  
	  $('.newTR555 #south3').val(south31);
	  
	  var south4 = $('.newTR555 #south4').val();
	  
      var south5 = $('.newTR555 #south5').val();
	  
	  if(south4=='') { var south4=0;}if(south5=='') { var south5=0;}
	  
      var south6 = (parseFloat(south5)/12).toFixed(2);;
	  
      var south61=(parseFloat(south4)+parseFloat(south6)).toFixed(2);;
	  
	  $('.newTR555 #south6').val(south61);
	  
	  var south7 = $('.newTR555 #south7').val();
	  
      var south8 = $('.newTR555 #south8').val();
	  
	  if(south7=='') { var south7=0;} if(south8=='') { var south8=0;}
	  
      var south9 = (parseFloat(south8)/12).toFixed(2);;
	  
      var south91=(parseFloat(south7)+parseFloat(south9)).toFixed(2);;
	  
	  $('.newTR555 #south9').val(south91);	  
	  
	  var west1 = $('.newTR555 #west1').val();
	  
      var west2 = $('.newTR555 #west2').val();
	  
	  if(west1=='') { var west1=0;}if(west2=='') { var west2=0;}
	  
      var west3 = (parseFloat(west2)/12).toFixed(2);;
	  
      var west31=(parseFloat(west1)+parseFloat(west3)).toFixed(2);;
	  
	  $('.newTR555 #west3').val(west31);
	  
	  var west4 = $('.newTR555 #west4').val();
	  
      var west5 = $('.newTR555 #west5').val();
	  
	  if(west4=='') { var west4=0;}if(west5=='') { var west5=0;}
	  
      var west6 = (parseFloat(west5)/12).toFixed(2);;
	  
      var west61=(parseFloat(west4)+parseFloat(west6)).toFixed(2);;
	  
	  $('.newTR555 #west6').val(west61);
	  
	  var west7 = $('.newTR555 #west7').val();
	  
      var west8 = $('.newTR555 #west8').val();
	  
	  if(west7=='') { var west7=0;} if(west8=='') { var west8=0;}
	  
      var west9 = (parseFloat(west8)/12).toFixed(2);;
	  
      var west91=(parseFloat(west7)+parseFloat(west9)).toFixed(2);;
	  
	  $('.newTR555 #west9').val(west91);
	  
	  var east1 = $('.newTR555 #east1').val();
	  
      var east2 = $('.newTR555 #east2').val();
	  
	  if(east1=='') { var east1=0;}if(east2=='') { var east2=0;}
	  
      var east3 = (parseFloat(east2)/12).toFixed(2);;
	  
      var east31=(parseFloat(east1)+parseFloat(east3)).toFixed(2);;
	  
	  $('.newTR555 #east3').val(east31);
	  
	  var east4 = $('.newTR555 #east4').val();
	  
      var east5 = $('.newTR555 #east5').val();
	  
	  if(east4=='') { var east4=0;}if(east5=='') { var east5=0;}
	  
      var east6 = (parseFloat(east5)/12).toFixed(2);;
	  
      var east61=(parseFloat(east4)+parseFloat(east6)).toFixed(2);;
	  
	  $('.newTR555 #east6').val(east61);
	  
	  var east7 = $('.newTR555 #east7').val();
	  
      var east8 = $('.newTR555 #east8').val();
	  
	  if(east7=='') { var east7=0;} if(east8=='') { var east8=0;}
	  
      var east9 = (parseFloat(east8)/12).toFixed(2);;
	  
      var east91=(parseFloat(east7)+parseFloat(east9)).toFixed(2);;
	  
	  $('.newTR555 #east9').val(east91);
	  
	  
	  
	  var northsoouth1=((parseFloat(north31)+parseFloat(south31))/2).toFixed(2);
	  var eastwest1=((parseFloat(east31)+parseFloat(west31))/2).toFixed(2);
	  var estent1=(parseFloat(northsoouth1)*parseFloat(eastwest1)).toFixed(2);;
	  $('.newTR555 #estent1').val(estent1);
	  
	  var northsoouth2=((parseFloat(north61)+parseFloat(south61))/2).toFixed(2);
	  var eastwest2=((parseFloat(east61)+parseFloat(west61))/2).toFixed(2);
	  var estent2=(parseFloat(northsoouth2)*parseFloat(eastwest2)).toFixed(2);;
	  $('.newTR555 #estent2').val(estent2);
	  
	  var northsoouth3=((parseFloat(north91)+parseFloat(south91))/2).toFixed(2);
	  var eastwest3=((parseFloat(east91)+parseFloat(west91))/2).toFixed(2);
	  var estent3=(parseFloat(northsoouth3)*parseFloat(eastwest3)).toFixed(2);;
	  
	  $('.newTR555 #estent3').val(estent3);
	  
	  if(estent1!='0.00' && estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2,estent3);
	  }
	  else if(estent1!='0.00' && estent2!='0.00')
	  {
	  var estentotal = Math.min(estent1,estent2);	
	  }	 
 else if(estent2!='0.00' && estent3!='0.00')
	  {
	  var estentotal = Math.min(estent2,estent3);	
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
	  
	  
	  
	  var anyarea = $('.newTR555 #anyarea').val();
	  if(anyarea!='') { var anyareatot=anyarea;}else{ var anyareatot=estentotal;}
	  
	  $('.newTR555 #totalarea').val(anyareatot);
	  
	  var totalrate = $('.newTR555 #totalrate').val();
	  
	  if(totalrate!='') { var totalrate=totalrate;} else {var totalrate=0;}
	  
	  var totallandvalue=(parseFloat(anyareatot)*parseFloat(totalrate)).toFixed(2);;

	  $('.newTR555 #totallandvalue').val(totallandvalue);
	 
	 
	 
	 var sum3=0;
$(".totallandvalue").each(function(){
if($(this).val() != "")
sum3 += parseFloat($(this).val());   
});

   $("#market_value").val((100 * Math.ceil(sum3 / 100)).toFixed(2));
var sum4=0;
$(".totalareatot").each(function(){
if($(this).val() != "")
sum4 += parseFloat($(this).val());   
});

var sum56=0;
$(".guidevalue").each(function(){
if($(this).val() != "")
sum56 += parseFloat($(this).val());   
});

var sum57=0;
$(".guide_rate").each(function(){
if($(this).val() != "")
sum57 += parseFloat($(this).val());   
});

$("#totalareaval").val(sum4.toFixed(2));
	
var forced_percen = $('#forced_percen').val() || 0;
 
var guideline_rate = $('#guideline_rate').val() || 0;
 
var totalareaval = $('#totalareaval').val() || 0;
 
//var guideline_value=(parseFloat(totalareaval)*parseFloat(guideline_rate)).toFixed(2);	


$("#guideline_value").val(sum56);
$("#guideline_rate").val(sum57);	
	
	
var market_value = $('#market_value').val()  || 0;
 
 
var reasonable_perce1 = $('#reasonable_perce1 :selected').val() || 0;
 
$("#reasonable_perce").val(reasonable_perce1/100);
 
 
var reasonable_perce = $("#reasonable_perce").val(); 
 
var reasonable_value=(parseFloat(market_value)*parseFloat(reasonable_perce)).toFixed(2);;
 
$("#reasonable_value").val(reasonable_value);
 
  
var forced_percen12 = $('#forced_percen1').val() || 0;
 
var forced_percen1 = forced_percen12.replace("%", "");
 
$("#forced_percen").val(forced_percen1/100);

var forced_value=(parseFloat(market_value)*parseFloat(forced_percen)).toFixed(2);;

$("#forced_value").val(forced_value);

});





  $("#btnAdd").click(function() {
    $("#a").append('<div class="con"><table><tr><td style="border:unset !important;"><select name="first_cap[]" style="display:block;"><option value="">Select</option><option value="Mr.">Mr.</option><option value="Mrs.">Mrs.</option></select></td><td style="border:unset !important;"><input  id="ownerAddress" name="ownerAddress[]" type="text" value=""></td></tr><td style="border:unset !important;"><select name="second_cap[]" style="display:block;"><option value="">Select</option><option value="S/o.">S/o.</option><option value="W/o.">W/o.</option><option value="D/o.">D/o.</option></select></td><td style="border:unset !important;"><input  id="ownerAddress1" name="ownerAddress1[]" type="text" value="" style="width: 100%;"></td></tr></table>' + '<input type="button" class="btnRemove" value="X" style=" width: 10%;background: red;color: white;border-color: red;font-weight: bold;float: right;"/></div>');
  });
  $('body').on('click','.btnRemove',function() { 
    $(this).parent('div').remove()

  });
 

 
 
  $("#btnAdd33").click(function() {
    $("#b").append(' <tr class="conall"><td><select class="selectin" name="floorselect[]" id="floorselect" style="display:block;"><option value="" selected>Select</option><option value="Ground">Ground</option><option value="First">First</option><option value="Second">Second</option><option value="Third">Third</option></select></td><td><select class="selectin" name="floorfinish[]" id="floorfinish"  style="display:block;"><option value="" selected>Select</option><option value="Tiles">Tiles</option><option value="Mosaic">Mosaic</option><option value="C.M">C.M</option><option value="Granite">Granite</option><option value="Marble">Marble</option><option value="Italian Marble">Italian Marble</option><option value="Co Stone">Co Stone</option></select></td><td><select class="selectin" name="roofingselect[]" id="roofingselect"  style="display:block;"><option value="" selected>Select</option> <?php $roof = mysqli_query($GLOBALS['connect'],"SELECT * FROM  roof order by id asc");  while ($roof1 = mysqli_fetch_array($roof)) {?><option value="<?php echo $roof1['id'];?>" <?php if($roofselect1[$lengthacountproper]==$roof1['id']) {?> selected <?php } ?> data-id="<?php echo $roof1['percentage'];?>"><?php echo $roof1['name'];?></option><?php } ?></select>' + '<input type="button" class="btnRemove333" value="X" style=" width: 10%;background: red;color: white;border-color: red;font-weight: bold;"/></td></tr>');
  });
  $('body').on('click','.btnRemove333',function() { 
    $(this).closest("tr").remove();;

  });
 
  
 	
	
	  $("#residentialautofill").click(function() {
		if($('input[name="residentialautofill"]').is(':checked'))
{
	
 var propertydoornof = $("#odoorno").val();
 $("#propertydoorno").val(propertydoornof);
 var propertystreetf = $("#ostreet").val();
  $("#propertystreet").val(propertystreetf);
 var propertyareaf = $("#oarea").val();
  $("#propertyarea").val(propertyareaf);
 var propertyvillagef = $("#opost").val();
  $("#propertyvillage").val(propertyvillagef);
 var propertytalukf = $("#otaluk").val();
  $("#propertytaluk").val(propertytalukf);
 var propertydistictf = $("#odistrict").val();
  $("#propertydistict").val(propertydistictf);
 var propertypincodef = $("#opincode").val();
  $("#propertypincode").val(propertypincodef);
 
 
}else
{
 $("#propertydoorno").val('');
 $("#propertystreet").val('');
 $("#propertyarea").val('');
 $("#propertyvillage").val('');
 $("#propertytaluk").val('');
 $("#propertydistict").val('');
 $("#propertypincode").val('');
}
	
	  });
	
  });


	  


  
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});	
	




</script>