<?php include("config.php");
$typepage="printpage";
include('Classes/PHPExcel.php');
function moneyFormatIndia($amount)
    {

        $amount = round($amount,2);

        $amountArray =  explode('.', $amount);
        if(count($amountArray)==1)
        {
            $int = $amountArray[0];
            $des=00;
        }
        else {
            $int = $amountArray[0];
            $des=$amountArray[1];
        }
        if(strlen($des)==1)
        {
            $des=$des."0";
        }
        if($int>=0)
        {
            $int = numFormatIndia( $int );
            $themoney = $int.".".$des;
        }

        else
        {
            $int=abs($int);
            $int = numFormatIndia( $int );
            $themoney= "-".$int.".".$des;
        }   
        return $themoney;
    }

function numFormatIndia($num)
    {

        $explrestunits = "";
        if(strlen($num)>3)
        {
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if($i==0) {
                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
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

$edit_id=base64_decode($_REQUEST['check']);

$project = mysqli_query($conn,"SELECT * FROM `copy_project_details` where 1=1 and id='$edit_id' ");   
$project1 = mysqli_fetch_array($project);


$result=mysqli_query($conn,"SELECT count(*) as total from photocollect where cat_id='$edit_id' and delete_status='0'");
$data=mysqli_fetch_array($result);


$photocount=$data['total'];

if($project1['oldsfno']!=''){ $varialb.=1; }
if($project1['rsfno']!=''){ $varialb=1+$varialb; }
if($project1['pattano']!='') {$varialb=1+$varialb;}
if($project1['propertydoorno']!=''){ $varialb=1+$varialb;}
if($project1['wardno']!=''){ $varialb=1+$varialb;}
if($project1['propertyarea']!=''){ $varialb=1+$varialb;}
if($project1['pvillage']!=''){ $varialb=1+$varialb;}
if($project1['ptaluk']!=''){$varialb=1+$varialb; }
if($project1['pdistrict']!=''){ $varialb=1+$varialb;}

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
    padding: 1px 5px;
	border:unset !important;
}
tr {
    border: 0px solid rgba(0,0,0,.12);
    box-shadow: 0px 0px #302a2a0f;
}
.sidenav-main {display:none;}
.page-topbar {display:none;}
.page-footer {display:none;}
#main {
    padding-left: 0px;
}

</style>
<link rel="stylesheet" type="text/css" href="<?php echo $web_url; ?>app-assets/css/pages/app-invoice.min.css">
 <div id="main" style=" background: white !important;">
      <div class="row" style=" background: white !important;">
        <div class="content-wrapper-before blue-grey lighten-5" style=" background: white !important;"></div>
        <div class="col s12" style=" background: white !important;">
          <div class="container" style=" background: white !important;">
            <!-- app invoice View Page -->
<section class="invoice-view-wrapper section" style=" background: white !important;">
  <div class="row" style=" background: white !important;">
    <!-- invoice view page -->
    <div class="col xl9 m8 s12" style=" background: white !important;">
	<div class="card">
  <div class="row">
  
            <div class="col m12 s12 l12">
        <div class="card-content invoice-print-area">
		<h4 style="text-align: center;"><span style="border-bottom:1px solid;">
        <?php 
        if($type=='EVEREST CONSTRUCTION')
        {?>
        Technical Snaps View OF the Property
        <?php }else{ ?>
          Photography view of the property
          <?php } ?>
    </span>
  </h4>
		
		<?php
 $type=str_replace("-"," ",$_SESSION["typenew"]);
		if($type=='ARRUL ASSOCIATES')
		{?>
        <table style="width: 85%;
    margin-left: 7%;" >
		
		<?php    if($photocount=='2')
		{?>
	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' limit 2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
		<tr><td style="width:100%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:370px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:410px;" <?php } ?>></td></tr>
		
		<?php } } ?>
		<?php if($photocount=='3')
		{?>
		<tr>
	
		
		<td style="width:50%;">
		
			<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,1");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{?>
		<img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:800px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:820px;" <?php } ?>>
<?php } ?>		
		
		</td>

		<td style="width:50%;">
		<table>
		<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 1,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{?>
		<tr>
		<td>

		
		<td style="width:100%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:390px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:400px;" <?php } ?>></td>

</td>

	</tr>
	<?php } ?>
</table>
			</td>
		
</tr>
		<?php }  ?>
		<?php if($photocount=='4')
		{?>
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:360px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:400px;" <?php } ?>></td>	<?php } ?></tr>
		
	


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:360px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:400px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		<?php } ?>
		
		
		<?php if($photocount=='5')
		{?>
		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:225px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:230px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,1");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:100%;" colspan="2"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:305px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:310px;" <?php } ?>></td><?php }
?>
		</tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 3,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:225px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:230px;" <?php } ?>></td><?php }

		?></tr>
		<?php } ?>
		
			<?php if($photocount=='6'  || $photocount>'8')
		{?>
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:260px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:260px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 4,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:260px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		<?php } ?>
		
		
		<?php if($photocount=='8')
		{?>
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:185px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:190px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:185px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:190px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 4,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:185px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:190px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>

	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 6,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:195px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:200px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		<?php } ?>
		
		</table>
		<br>
		<table src="" style="    width: 85%;
    margin-left: 7%;margin-top: -8px;
    font-size: 10px;
">
		<?php if($project1['companyName']!='')
		{?>			
		<tr><td style="    width: 50%;">Company Name <span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['companyName']);?></td></tr>
		<?php } ?>
		<?php if($project1['ownerAddress']!='')
		{?>			
		<tr><td style="    width: 50%;">Name of Applicant <span style="float:right">:</span></td><td style="    width: 50%;"><?php $first_cap=explode("--",str_replace(","," ",$project1['first_cap'])); $second_cap=explode("--",str_replace(","," ",$project1['second_cap'])); $ownerAddress1=explode("--",str_replace(","," ",$project1['ownerAddress1'])); $expld=explode("--",str_replace(","," ",$project1['ownerAddress']));?> 
				   <?php $i=0; foreach ($expld as $expld1) { $i++;  $va=$i-1; echo $first_cap[$va]; echo $expld1." "; echo $second_cap[$va].""; echo $ownerAddress1[$va]; if($i>=1) { echo "<br>"; } } ?></td></tr>
		<?php } ?>
		<?php if($project1['propertydoorno']!='')
		{?>	
		<tr><td style="    width: 50%;">Door No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertydoorno']);?></td></tr>
		<?php } ?>
		<?php if($project1['sfno']!='')
		{?>			
		<tr><td style="    width: 50%;">S.F NO <span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['sfno']);?></td></tr>
		<?php } ?>
	
	
		<?php if($project1['rsfno']!='')
		{?>	
		<tr><td style="    width: 50%;">R.S.F No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['rsfno']);?></td></tr>
		<?php } ?>
		
		<?php if($project1['pattano']!='')
		{?>	
		<tr><td style="    width: 50%;">Patta No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo $project1['pattano'];?></td></tr>
		<?php } ?>
		
		<?php if($project1['wardno']!='')
		{?>	
		<tr><td style="    width: 50%;">Ward No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['wardno']);?></td></tr>
		<?php } ?>
		<?php if($project1['propertyarea']!='')
		{?>	
		<tr><td style="    width: 50%;">Area<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo $project1['propertyarea'];?></td></tr>
		<?php } ?>
		<?php if($project1['propertyvill']!='')
		{?>	
		<tr><td style="    width: 50%;">Village<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertyvill']);?></td></tr>
		<?php } ?>
		<?php if($project1['propertytaluk']!='')
		{?>	
		<tr><td style="    width: 50%;">Taluk<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertytaluk']);?></td></tr>
		<?php } ?>
			<?php if($project1['propertydistict']!='')
		{?>	
		<tr><td style="    width: 50%;">District<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertydistict']);?></td></tr>
		<?php } ?>
	
		
	
		</table>
			<br>
			
			
			
			
			
			
		<?php if($photocount>'8')
		{?>
	<p style="    margin-top: 14px;"></p>
			<br>
			
			 <table style="width: 85%;
    margin-left: 7%;" >
		
		
		
		
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 6,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 8,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 10,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>

	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 12,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		
		
		</table>
		
	<?php } ?>	
	
	<?php if($photocount>'14')
		{?>
	
			<p style="    margin-top: 14px;"></p>
			
			 <table style="width: 85%;
    margin-left: 7%;" >
		
		
		
		
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 14,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 16,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 18,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>

	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 20,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius:26px; height:250px;" <?php } else {?> style="    width: 100%;border-radius:26px; height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		
		
		</table>
		
	<?php } ?>	
		
		
		
		<?php } ?>	
		
		
		
		
				
		<?php

		if($type=='EVEREST CONSTRUCTION')
		{?>
        <table style="width: 85%;
    margin-left: 7%;" >
		
		<?php    if($photocount=='2')
		{?>
	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' limit 2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
		<tr><td style="width:100%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:370px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:410px;" <?php } ?>></td></tr>
		
		<?php } } ?>
		<?php if($photocount=='3')
		{?>
		<tr>
	
		
		<td style="width:50%;">
		
			<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,1");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{?>
		<img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:800px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:820px;" <?php } ?>>
<?php } ?>		
		
		</td>

		<td style="width:50%;">
		<table>
		<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 1,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{?>
		<tr>
		<td>

		
		<td style="width:100%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:400px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:410px;" <?php } ?>></td>

</td>

	</tr>
	<?php } ?>
</table>
			</td>
		
</tr>
		<?php }  ?>
		<?php if($photocount=='4')
		{?>
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:370px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:410px;" <?php } ?>></td>	<?php } ?></tr>
		
	


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:370px;" <?php } else {?> style="    width: 100%;border-radius:20px;transform: skewX(-0deg);  height:410px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		<?php } ?>
		
		
		<?php if($photocount=='5')
		{?>
		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:235px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:240px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,1");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:100%;" colspan="2"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:315px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:320px;" <?php } ?>></td><?php }
?>
		</tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 3,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:235px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:240px;" <?php } ?>></td><?php }

		?></tr>
		<?php } ?>
		
			<?php if($photocount=='6' || $photocount>'8')
		{?>
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:260px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:270px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:260px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:270px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 4,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:260px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:270px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		<?php } ?>
		
		
		<?php if($photocount=='8')
		{?>
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 0,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:195px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:200px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 2,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:195px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:200px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 4,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:195px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:200px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>

	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 6,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:195px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:200px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		<?php } ?>
		
		</table>
		<br>
	<table src="" style="    width: 85%;
    margin-left: 7%;margin-top: -8px;
    font-size: 10px;
">
		<?php if($project1['companyName']!='')
		{?>			
		<tr><td style="    width: 50%;">Company Name <span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['companyName']);?></td></tr>
		<?php } ?>
		<?php if($project1['ownerAddress']!='')
		{?>			
		<tr><td style="    width: 50%;">Name of Applicant <span style="float:right">:</span></td><td style="    width: 50%;"><?php $first_cap=explode("--",str_replace(","," ",$project1['first_cap'])); $second_cap=explode("--",str_replace(","," ",$project1['second_cap'])); $ownerAddress1=explode("--",str_replace(","," ",$project1['ownerAddress1'])); $expld=explode("--",str_replace(","," ",$project1['ownerAddress']));?> 
				   <?php $i=0; foreach ($expld as $expld1) { $i++;  $va=$i-1; echo $first_cap[$va]; echo $expld1." "; echo $second_cap[$va].""; echo $ownerAddress1[$va]; if($i>=1) { echo "<br>"; } } ?></td></tr>
		<?php } ?>
		<?php if($project1['propertydoorno']!='')
		{?>	
		<tr><td style="    width: 50%;">Door No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertydoorno']);?></td></tr>
		<?php } ?>
		<?php if($project1['sfno']!='')
		{?>			
		<tr><td style="    width: 50%;">S.F NO <span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['sfno']);?></td></tr>
		<?php } ?>

		<?php if($project1['rsfno']!='')
		{?>	
		<tr><td style="    width: 50%;">R.S.F No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['rsfno']);?></td></tr>
		<?php } ?>
		
		<?php if($project1['pattano']!='')
		{?>	
		<tr><td style="    width: 50%;">Patta No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo $project1['pattano'];?></td></tr>
		<?php } ?>
		
		<?php if($project1['wardno']!='')
		{?>	
		<tr><td style="    width: 50%;">Ward No<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['wardno']);?></td></tr>
		<?php } ?>
		<?php if($project1['propertyarea']!='')
		{?>	
		<tr><td style="    width: 50%;">Area<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo $project1['propertyarea'];?></td></tr>
		<?php } ?>
		<?php if($project1['propertyvill']!='')
		{?>	
		<tr><td style="    width: 50%;">Village<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertyvill']);?></td></tr>
		<?php } ?>
		<?php if($project1['propertytaluk']!='')
		{?>	
		<tr><td style="    width: 50%;">Taluk<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertytaluk']);?></td></tr>
		<?php } ?>
			<?php if($project1['propertydistict']!='')
		{?>	
		<tr><td style="    width: 50%;">District<span style="float:right">:</span></td><td style="    width: 50%;"><?php echo ucwords($project1['propertydistict']);?></td></tr>
		<?php } ?>
	
		
	
		</table>
			<br>
			<?php if($photocount>'8')
		{?>
	<p style="    margin-top: 14px;"></p>
			  <table style="width: 85%;
    margin-left: 7%;" >
				
		
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 6,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 8,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 10,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>

	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 12,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		
		
		</table>
			<?php } ?>
			
			
			
				<?php if($photocount>'14')
		{?>
	<p style="    margin-top: 14px;"></p>
<table style="width: 85%;
    margin-left: 7%;" >
				
		
	
	

		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 14,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td>	<?php } ?></tr>
		
	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 16,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td>	<?php } ?></tr>


		<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 18,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>

	<tr>	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `photocollect` where 1=1 and  cat_id='$edit_id' and  delete_status='0' order by id asc limit 20,2");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?><td style="width:50%;"><img src="<?php echo $web_url; ?>documents/photocollect/<?php echo $ftaxreceipt1['file_name'];?>" <?php if($varialb>5){?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg); height:250px;" <?php } else {?> style="    width: 100%;border-radius: 20px;transform: skewX(-0deg);  height:250px;" <?php } ?>></td><?php } ?>

<?php
?>
</tr>
		
		
		</table>
			<?php } ?>
			
		<?php } ?>	
		<?php
 
		if($type=='ARRUL ASSOCIATES')
		{?>
	 <table style="width:105%;position: fixed;
    height: 50px;
    bottom: -16px;
    left: 0px;
    right: 0px;
    margin-bottom: 0px;">
	 <tr >
	
	 <td style="width:40%;"><img class="hide-on-med-and-down " src="<?php echo $web_url;?>app-assets/images/logo/logonew20.png" alt="materialize logo" style="color:white;    width: 3%;   ">
	<p style="    background: #082742;
    padding-left: 12px;
    color: white;
    margin-top: -21px;
    padding-top: 2px;
    margin-left: 13px;
    font-family: 'Berkshire Swash' !important;
    font-weight: 600;">Arrul Associates</p >
	 </td>
	  <td style="width:60%; ">
	<p style="    background: yellow;
    margin-left: -89px;
	    margin-top: 2px;
    padding-left: 12px;padding-top: 2px;">BO:81/1D, Chairman Building, Ottametthai, Pallipalayam.</p>
	 </td>
	 
	 <tr>
	</table>	
		<?php } ?>
		<?php
 
		if($type=='EVEREST CONSTRUCTION')
		{?>
	 <table style="width:105%;position: fixed;
    height: 50px;
    bottom: -16px;
    left: 0px;
    right: 0px;
    margin-bottom: 0px;">
	 <tr>
	
	 <td style="width:40%;"><img class="hide-on-med-and-down " src="<?php echo $web_url;?>app-assets/images/logo/logonew20.png" alt="materialize logo" style="color:white;    width: 3%;   ">
	<p style="    background: #082742;
    padding-left: 12px;
    color: white;
    margin-top: -23px;
    padding-top: 2px;
    margin-left: 13px;
    font-family: 'Berkshire Swash' !important;
    font-weight: 600;">Everest Construction</p >
	 </td>
	  <td style="width:60%; ">
	<p style="    background: yellow;
    margin-left: -89px;
    padding-left: 12px;padding-top: 2px;">BO:81/1D, Chairman Building, Ottametthai, Pallipalayam.</p>
	 </td>
	 
	 <tr>
	</table>	
		<?php } ?>
	   </div>
	    </div>
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

 
 