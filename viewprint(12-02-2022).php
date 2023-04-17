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
      <div class="card" style="padding: 13px;    background: white !important;">
<?php     
$totallandvalue22=explode(",",$project1['totallandvalue']);   
    $countot2=count($totallandvalue22); 

?>    
        <div class="card-content invoice-print-area" <?php if($countot2=='1') {?> style="font-size: 9px;background:white;" <?php } else {?> style="font-size: 9px;background:white;" <?php } ?>>
                  <style>
.topright {
  position: absolute;
  top: 0px;
  right: 16px;
  font-size: 13px;
}

.topleft {
    top: 0px;
    position: absolute;
    left: 16px;
    font-size: 13px;
}


      </style>
  
          <!-- header section -->
          <div class="row invoice-date-number" style=" background: white !important;">
     
       <table style="    margin-top: -23px;
    margin-bottom: 5px;"><tr><td style="width:34%;border:unset !important;"></td><td style="border:unset !important;font-size: 16px;"><span style="border-bottom:1px solid;"><?php echo strtoupper($project1['report_name']);?></span></td><td style="border:unset !important;"></td></tr>
  
     <tr><td style="width:34%;border:unset !important;"></td><td style="border:unset !important;font-size: 10px;"><span <?php if(strtoupper($project1['report_name'])=='EVEREST CONSTRUCTION') {?> style="margin-left:14px;" <?php } else {?> style="margin-left: -9px;"  <?php } ?>>PROVISIONAL VALUATION REPORT</span> </td></tr>
     </table>
          </div>

      
      <div class="row">
            <div class="col m12 s12 l12">
      
      
       <table class="striped responsive-table" <?php if($project1['totallandvalue']!='' ||  $project1['typeofconstruction']!='')   {?> style="border: 0px solid;
 width: 95.9%;
    margin-left: 1px;
    margin-bottom: 0px;   " <?php } else {?>  style="border: 0px solid;
 width: 95.9%;
    margin-left: 1px;
    margin-bottom: 0px;    border-bottom: 1px solid;" <?php } ?> >
  <tr> <td style="border:0px solid;text-align:left;"><span style="margin-left:-4px;"><?php if($project1['ref_no']!='') {?> REF N0:<?php echo ucwords($project1['ref_no']);?></span><?php } ?></td> <td style="border:0px solid;text-align:right;"><span style="margin-right:-4px;"><?php echo ucwords($project1['file_no']);?><span></td></tr>
  </table>
      
             <table class="striped responsive-table" <?php if($project1['totallandvalue']!='' ||  $project1['typeofconstruction']!='')   {?> style="border: 0px solid;
    border-left: 1px solid;
    border-right: 1px solid;
    border-top: 1px solid;
    width: 95.9%;
    margin-left: 1px;
    margin-bottom: -6px;" <?php } else {?>  style="border: 0px solid;
    border-left: 1px solid;
    border-right: 1px solid;
    border-top: 1px solid;
    width: 95.9%;
    margin-left: 1px;
    margin-bottom: -6px;" <?php } ?> >
    <tbody>
  
   <tr>
                  <td style="border:0px solid;width: 18% !important;">Name of the Bank<span style="float:right">:</span></td>
                  <td style="border:0px solid;width: 32% !important;border-right:1px solid;"><?php if(is_numeric($project1['bank'])) {?> <?php echo select_value_other("bank","name",$project1['bank']); ?> <?php if($project1['branch']!='') {?>-<?php echo select_value_other("branch","branch",$project1['branch']); ?> <?php } ?> <?php } else { ?><?php echo $project1['bank'];?><?php } ?> <?php if(1!=1) {?> <?php echo str_replace("-","",$project1['date']);?><?php } ?></td>
           <td style="border:0px solid;width: 25% !important;">Date<span style="float:right">:</span></td>
                  <td style="border:0px solid;width: 25% !important;"><?php echo ucwords(date("d-m-Y",strtotime($project1['date'])));?></td>
                </tr>
        <tr>
                  <td style="border:0px solid;">Loan Amount<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-right:1px solid;"><?php if($project1['loanAmount']!='') {?>Rs.<?php } ?><?php echo  str_replace(".00","",moneyFormatIndia($project1['loanAmount']));?></td>
          <td style="border:0px solid;">Inspected<span style="float:right">:</span></td>
                  <td style="border:0px solid;"><?php echo $project1['inspected'];?></td>
                </tr>
        <tr>
                  <td style="border:0px solid;">Company Name<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-right:1px solid;"><?php echo $project1['companyName'];?></td>
            <td style="border:0px solid;">Contact No<span style="float:right">:</span></td>
                  <td style="border:0px solid;"><?php echo $project1['inspect_contactno'];?></td>
                </tr>
      <tr>
                  <td style="border:0px solid;">Name of Applicant<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-right:1px solid;"><?php $first_cap=explode("--",str_replace(","," ",$project1['first_cap'])); $second_cap=explode("--",str_replace(","," ",$project1['second_cap'])); $ownerAddress1=explode("--",str_replace(","," ",$project1['ownerAddress1'])); $expld=explode("--",str_replace(","," ",$project1['ownerAddress']));?> 
           <?php $i=0; foreach ($expld as $expld1) { $i++;  $va=$i-1; echo $first_cap[$va]; echo $expld1." "; echo $second_cap[$va].""; echo $ownerAddress1[$va]; if($i>=1) { echo "<br>"; } } ?></td>
            <td style="border:0px solid;">Total/ Advance/ Balance <span style="float:right">:</span></td>
           <td style="border:0px solid;"><?php if($project1['totamount']!='') {?>T - ₹<?php echo  str_replace(".00","",moneyFormatIndia($project1['totamount']));?><?php } else {?><?php } ?><?php if($project1['advanceAmount']!='') {?>, A - ₹<?php echo str_replace(".00","",moneyFormatIndia($project1['advanceAmount']));?><?php } else {?><?php } ?><?php if($project1['balanceamount']!='') {?>, B - ₹<?php echo  str_replace(".00","",moneyFormatIndia($project1['balanceamount']));?><?php } else {?><?php } ?></td>
                </tr>
        <tr>
        <td style="border:0px solid;"></td>
        <td style="border:0px solid;border-right:1px solid;"></td>
         <td style="border:0px solid;">Name of the Purchaser<span style="float:right">:</span></td>
                  <td style="border:0px solid;"><?php echo ucwords($project1['purchaseAddress']);?> </td>
        </tr>
   <tr>
<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;">Residential Address: </td>
<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-right:1px solid;">Purchaser Address: </td>


 </tr>
  
                <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;    width: 18% !important;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;     width: 18%!important;" <?php } ?>>Door No<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px; width: 32% !important;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px; width: 32% !important;border-right:1px solid;" <?php } ?>> <?php echo ucwords($project1['odoorno']);?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px; width: 25% !important;" <?php } else {?> style="border:0px solid;height:10px; width: 25%!important;" <?php } ?>>Door No<span style="float:right">:</span></td>
   <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;width: 25% !important;" <?php } else {?> style="border:0px solid;height:10px; width: 30% !important;" <?php } ?>><?php echo ucwords($project1['pdoorno']);?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Street<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo $project1['ostreet'];?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Street<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>><?php echo $project1['pstreet'];?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Area<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo $project1['oarea'];?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Area<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>><?php echo $project1['parea'];?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Post<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo ucwords($project1['opost']);?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Post<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>> <?php echo ucwords($project1['ppost']);?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Taluk<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo ucwords($project1['otaluk']);?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Taluk<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>><?php echo ucwords($project1['ptaluk']);?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>District<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo ucwords($project1['odistrict']);?></td>
           <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>District<span style="float:right">:</span></td>
     <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>><?php echo ucwords($project1['pdistrict']);?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Pincode<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo ucwords($project1['opincode']);?></td>
           <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Pincode<span style="float:right">:</span></td>
     <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>><?php echo ucwords($project1['ppincode']);?></td>
   
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Contact<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?> <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo ucwords($project1['ocontact']);?></td>
            <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Contact<span style="float:right">:</span></td>
      <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>> <?php echo ucwords($project1['pcontact']);?></td>
    
                </tr>
         
          <tr>


<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;">Property Address: </td>
<td colspan="2" style="border-top:1px solid;border-bottom:1px solid;border-right:1px solid;">Revenue Details: </td>
</tr>
        <tr>
                  <td style="border:0px solid;border-left:1px solid;">Door No<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-right:1px solid;"><?php echo ucwords($project1['propertydoorno']);?></td>
          <td  style="border:0px solid;height:10px;" >
          
          <table style="border:unset !important;    margin-left: -5px;"><tr><td style="border:unset !important;    width: 48%;">Old S.F No<span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style=""><?php echo ucwords($project1['oldsfno']);?></p></td></tr></table>
          
           </td>
  <td style="border:0px solid;height:10px;">
  <table style="border:unset !important;    margin-left: 0px;"><tr><td style="border:unset !important;    width: 50%;"> Ward No <span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="  "><?php echo ucwords($project1['wardno']);?></p></td></tr></table></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Street<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>> <?php echo $project1['propertystreet'];?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>
          
          <table style="border:unset !important;    margin-left: -5px;"><tr><td style="border:unset !important;    width: 48%;">S.F NO<span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="   "><?php echo $project1['sfno'];?></p></td></tr></table>
       </td>
          
          
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>
          <table style="border:unset !important;    margin-left: 0px;"><tr><td style="border:unset !important;    width: 50%;">  Block No <span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="  "><?php echo ucwords($project1['blockno']);?></p></td></tr></table></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Area<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>> <?php echo $project1['propertyarea'];?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>
          <table style="border:unset !important;    margin-left: -5px;"><tr><td style="border:unset !important;    width: 48%;">New R.S.F No<span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="    width: 144%;"><?php echo ucwords($project1['newrsfno']);?></p></td></tr></table></td>
  <td <?php if($countot2=='1') {?>  style="border:0px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>
   <table style="border:unset !important;    margin-left: 0px;"><tr><td style="border:unset !important;    width: 50%;">  R.S.F No  <span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="    width: 144%;"><?php echo ucwords($project1['rsfno']);?></p></td></tr></table>
  
  </td> 
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Post Limit<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo ucwords($project1['propertyvillage']);?> <?php echo strtoupper($project1['property_address_limit']);?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>
          <table style="border:unset !important;    margin-left: -5px;"><tr><td style="border:unset !important;    width: 48%;">Patta No<span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="    width: 144%;"><?php echo $project1['pattano'];?></p></td></tr></table>
          
          </td>
    <td style="border:0px solid;">
  
   <table style="border:unset !important;    margin-left: 0px;"><tr><td style="border:unset !important;    width: 50%;">  T.S.No  <span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="    width: 144%;"><?php echo ucwords($project1['tsno']);?></p></td></tr></table>
  
  
  </td>
  
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Taluk<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo ucwords($project1['propertytaluk']);?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>
           <table style="border:unset !important;    margin-left: -5px;"><tr><td style="border:unset !important;    width: 48%;">Plot No<span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="   "><?php echo ucwords($project1['plotno']);?></p></td></tr></table></td>
    <td style="border:0px solid;">
  
  
   <table style="border:unset !important;    margin-left: 0px;"><tr><td style="border:unset !important;    width: 50%;">  Pymash No  <span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="    width: 144%;"><?php echo ucwords($project1['pymashno']);?></p></td></tr></table>
</td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:15px;" <?php } ?>>District<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:15px;border-right:1px solid;" <?php } ?>> <?php echo ucwords($project1['propertydistict']);?></td>
          <td colspan="2" <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>
           <table style="border:unset !important;    margin-left: -5px;"><tr><td style="border:unset !important;    width: 16%;"> S.R.O <span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="    width: 144%;"><?php echo ucwords($project1['sro']);?></p></td></tr></table>

          </td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:17px;" <?php } ?>>Pincode<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:17px;border-right:1px solid;" <?php } ?>> <?php echo ucwords($project1['propertypincode']);?></td>
          
          
          
          
          <td colspan="2" <?php if($countot2=='1') {?>  style="border:0px solid;height:20px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>><table style="border:unset !important;    margin-left: -5px;"><tr><td style="border:unset !important;    width: 15%;"> Ref Document <span style="float:right">:</span></td><td style="border:unset !important;    width: 52%;"><p style="    width: 144%;"><?php echo ucwords($project1['deed']);?> <?php echo ucwords($project1['deed_description']);?></p></td></tr></table></td>
                </tr>
    
    
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:35px;border-top: 1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-top: 1px solid;" <?php } ?> >Land Mark<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-top: 1px solid;border-right:1px solid;"> <?php echo ucwords($project1['landmark']);?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:35px;border-top:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-top:1px solid;" <?php } ?>>Property Occupied<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:35px;border-top:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-top:1px solid;" <?php } ?>><?php echo ucfirst($project1['propertyoccupied']); ?><?php if( $project1['monthly_rent']!='') {?> - <?php echo   str_replace(".00","",moneyFormatIndia($project1['monthly_rent'])); ?> <?php } ?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Nearest Bus Stop <span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo $project1['nearestbustop'];?></td>
          <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Tax Receipt<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>> <?php echo $project1['taxreceipt']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['taxreceipt_name']; ?> <?php } ?> <?php if( $project1['call_client']!='') {?> - <?php echo $project1['call_client']; ?> <?php } ?></td>
          
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Distance of Branch <span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>> <?php echo str_replace("Km","",$project1['distanceofbranch']);?><?php if($project1['distanceofbranch']!='') {?> Km <?php } ?></td>
          <td style="border:0px solid;">E.B. Service No<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>><?php echo $project1['ebserviceno']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['ebserviceno_name']; ?> <?php } ?><?php if( $project1['eb_call_client']!='') {?> - <?php echo $project1['eb_call_client']; ?> <?php } ?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Distance of R.S<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>><?php echo str_replace("Km","",$project1['distanceofrs']);?><?php if($project1['distanceofrs']!='') {?> Km<?php } ?> <?php if($project1['junction']!='') {?> From <?php echo $project1['junction']; ?> <?php } ?></td>
          <td style="border:0px solid;">Patta / DTCP<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>> <?php echo $project1['pattadtcp']; ?><?php if( $project1['pattadtcp']=='Yes') {?> - <?php echo $project1['pattadtcp_name']; ?> <?php } ?><?php if( $project1['patta_call_client']!='') {?> - <?php echo $project1['patta_call_client']; ?> <?php } ?></td> 
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Nearest Main Road<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>> <?php echo ucwords($project1['nearestmainroad']);?></td>
          <td style="border:0px solid;">Approval Plan<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>> <?php echo $project1['approvalplan']; ?><?php if( $project1['approvalplan']=='Yes') {?> - <?php echo $project1['approvalplan_name']; ?> <?php } ?><?php if( $project1['approval_call_client']!='') {?> - <?php echo $project1['approval_call_client']; ?> <?php } ?></td>
                </tr>
        <tr>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>>Civil Amenities<span style="float:right">:</span></td>
                  <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;border-right:1px solid;" <?php } else {?> style="border:0px solid;height:10px;border-right:1px solid;" <?php } ?>> <?php echo ucwords($project1['civilamenities']);?></td>
          <td style="border:0px solid;">H.D Line<span style="float:right">:</span></td>
    <td <?php if($countot2=='1') {?>  style="border:0px solid;height:17px;" <?php } else {?> style="border:0px solid;height:10px;" <?php } ?>> <?php echo $project1['hdline']; ?><?php if( $project1['taxreceipt']=='Yes') {?> - <?php echo $project1['hdline_name']; ?><?php } ?><?php if( $project1['hd_call_client']!='') {?> - <?php echo $project1['hd_call_client']; ?> <?php } ?></td>
                </tr>
        </tbody>
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
  <?php if($project1['totallandvalue']!='' )   {?>
    <div class="col m12 s12" style="">  
<?php 
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
$assignsqt=explode(",",$project1['assignsqt']);

$manual_type=explode(",",$project1['manual_type']);
$actual_type=explode(",",$project1['actual_type']);
$patta_type=explode(",",$project1['patta_type']);
$document_type=explode(",",$project1['document_type']);


$countot=count($totallandvalue2);
$countotval=$countot-1;
    
foreach($totallandvalue2 as $countproper1 =>$key1) {  $valdel="55".$countproper1;
  ?>

            <table class="striped responsive-table newtab"   style="    margin-left: -11px;
      width: 99%;    margin-top: 5px;" >
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
                  <th colspan="3" style="border:1px solid;">Dimensions    </th>
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
                  <td style="border:1px solid;"><?php if($estent[$countproper1]!='0.00' && $estent[$countproper1]!='') {?>As Per Manual<br><?php echo moneyFormatIndia($estent[$countproper1]);?><?php } ?> <?php if($manual_type[$countproper1]!='0.00' && $manual_type[$countproper1]!='') {?><?php echo $manual_type[$countproper1];?><?php } ?> </td>
                  <td style="border:1px solid;"><?php if($estent1[$countproper1]!='0.00' && $estent1[$countproper1]!='') {?>As Per Patta<br><?php echo $estent1[$countproper1];?><?php } ?> <?php if($patta_type[$countproper1]!='0.00' && $patta_type[$countproper1]!='') {?><?php echo $patta_type[$countproper1];?><?php } ?> </td>
                  <td style="border:1px solid;"><?php if($estent2[$countproper1]!='0.00' && $estent2[$countproper1]!='') {?> As Per Document<br><?php echo $estent2[$countproper1];?> <?php } ?>  <?php if($document_type[$countproper1]!='0.00' && $document_type[$countproper1]!='') {?><?php echo $document_type[$countproper1];?><?php } ?> </td>
          <td style="border:1px solid;"><?php if($estent3[$countproper1]!='0.00' && $estent3[$countproper1]!='') {?>As Per Actual<br><?php echo $estent3[$countproper1];?><?php } ?>  <?php if($actual_type[$countproper1]!='0.00' && $actual_type[$countproper1]!='') {?><?php echo $actual_type[$countproper1];?><?php } ?> </td>
                 
                </tr>
        
        <tr>
                  <td <?php if($countotval>1) {?> style="border:0px solid;    border-right: 1px solid;    border-left: 1px solid;text-align:center;" <?php } else {?> style="border:0px solid;    border-right: 1px solid;    border-left: 1px solid;text-align:center;padding:0px;" <?php } ?>>
          
            <p <?php if($countotval>1) {?> style="border-bottom: 1px solid;
    width: 122%;
          margin-left: -12px;" <?php } else {?> style="border-bottom: 1px solid;
    width: 122%;
          margin-left: -3px;" <?php } ?>>Total Area</p>
          
            <p><?php if($totalarea[$countproper1]!='') {?> <?php echo moneyFormatIndia($totalarea[$countproper1]);?> <?php } else {?> - <?php } ?> <?php if($manual_type[$countproper1]!='0.00' && $manual_type[$countproper1]!='') {?><?php echo $manual_type[$countproper1];?><?php } ?></p>
  
          
        </td>
  
  
  
                  <td   <?php if($countotval>1) {?> style="border:0px solid;    border-right: 1px solid;" <?php } else {?> style="border:0px solid;    border-right: 1px solid;padding:0px;"  <?php } ?>><div style="width: 50%;
    margin-top: 0px;">          <p style="           border-bottom: 1px solid;
    width: 101%;
    margin-left: -30px;
    text-align: center;
    border-right: 1px solid;">Rate</p>
         
            <p <?php if($countot2=='1') {?> style="    text-align: center;
    margin-left: -37.5px;
    border-right: 1px solid;
          width: 106%;" <?php } else {?> style="    text-align: center;
    margin-left: -36.5px;
    border-right: 1px solid;
          width: 106%;" <?php } ?>><?php if($totalrate[$countproper1]!='') {?> ₹<?php echo moneyFormatIndia($totalrate[$countproper1]);?> <?php } else {?> ₹0.00<?php } ?></p></div><div style="    width: 49%;
    float: right;
    margin-top: -27px;">          <p  <?php if($countotval>2) {?> style="       border-bottom: 1px solid;
    margin-left: -33px;
    text-align: center;" <?php }elseif($countotval>1) {?> style="       border-bottom: 1px solid;
    width: 122%;
    margin-left: -33px;
    text-align: center;" <?php } else {?> style="       border-bottom: 1px solid;
    margin-left: -33px;
    text-align: center;" <?php } ?>>Land Value Total</p>
          
            <p style="    text-align: center;
    margin-left: -13px;"><?php if($totallandvalue[$countproper1]!='' && $totallandvalue[$countproper1]!='0.00') {?> ₹<?php echo moneyFormatIndia($totallandvalue[$countproper1]);?> <?php } else {?> ₹0.00<?php } ?></p></div></td>
      
                  <td <?php if($countotval>1) {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;"  <?php } else {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;padding:0px;"   <?php } ?>  colspan="2">
         
</td>
          <td  <?php if($countotval>1) {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;"  <?php } else {?>  style="border:0px solid;    border-right: 1px solid;text-align:center;padding:0px;"   <?php } ?>>
          
  
</td>
                 
                </tr>
        
        
        
      <tr>
                  <td style="border-top:1px solid;    border-right: 1px solid;    border-left: 1px solid;border-bottom:1px solid;">Type of Property</td>
                  <td style="border-top:1px solid;     border-right: 1px solid;border-bottom:1px solid;">Size of Plot</td>
                  <td style="border-top:1px solid;     border-right: 1px solid;border-bottom:1px solid;">Development to Site</td>
                  <td style="border-top:1px solid;    border-right: 1px solid;border-bottom:1px solid;">Class of Construction</span>
</td>
          <td style="border-top:1px solid;    border-right: 1px solid;border-bottom:1px solid;">Control Limit
</td>
                 
                </tr>
        
        <tr>
                  <td style="border:1px solid;"><span style=""><?php echo select_value_other("typeofproperty","name",$typeofproperty2[$countproper1]); ?></td>
                  <td style="border:1px solid;"><span style=""><?php echo select_value_other("sizeofplot","name",$sizeofplot2[$countproper1]); ?></span></td>
                  <td style="border:1px solid;"><span style=""><?php echo select_value_other("recentdevelopments","name",$recentdevelopmentsnear2[$countproper1]); ?></span></td>
                  <td style="border:1px solid;"><span style=""><?php echo select_value_other("classofconstruction","name",$classofconstruction2[$countproper1]); ?></span>
</td>
          <td style="border:1px solid;"><br><span style=""><?php echo select_value_other("limits","name",$limits2[$countproper1]); ?></span>
</td>
                 
                </tr>
        
      
        
        <?php if($project1['land_type']=='Separate') {?> 
          <tr>
<td colspan="5" style="border:unset  !important;"></td>
                
                 
                </tr>
           <tr>
                  
           <td style="border:1px solid;">Total Area</td><td style="border:1px solid;">Convert To</td><td style="border:1px solid;">After Conversation
</td><td style="border:1px solid;">Guideline Rate</td><td style="border:1px solid;">Guideline Value</td>
                </tr>
          <tr>
                  
           <td style="border:1px solid;    width: 21%;"><?php echo moneyFormatIndia($totalarea[$countproper1]);?> <?php if($manual_type[$countproper1]!='0.00' && $manual_type[$countproper1]!='') {?><?php echo $manual_type[$countproper1];?><?php } ?></td><td style="border:1px solid;    width: 21%;"><?php echo $guideselect[$countproper1];?></td><td style="border:1px solid;    width: 21%;"><?php echo $assignsqt[$countproper1];?></td><td style="border:1px solid;    width: 21%;">₹<?php echo moneyFormatIndia($guide_rate[$countproper1]);?>
</td><td style="border:1px solid;    width: 21%;">₹<?php echo moneyFormatIndia($guidevalue[$countproper1]);?></td>
                </tr>
        <?php } ?>
        <tr>
<td colspan="5" style="border:unset  !important;"></td>
                
                 
                </tr>
        
        <tr>
                  <td style="border:1px solid;">Resent Sale Details </td>
                  <td style="border:1px solid;"><?php echo $sale_details[$countproper1];?></td>
                  <td style="border:1px solid;    text-align: center;" colspan="2"><span style=""><?php echo $sale_from[$countproper1];?></span> To <?php echo $sale_to[$countproper1];?></td>
          <td style="border:1px solid;"><?php echo $sale_type[$countproper1];?></td>
                 
                </tr>
        
         
              </tbody>
            </table>
       
    
    
  <?php } ?>  
<?php if($project1['land_type']=='Common') {?> 
   <table class="striped responsive-table newtab" style="    margin-left: -11px;
      width: 99%;    margin-top: 5px;" >
            
               <tr>
                  
           <td style="border:1px solid;">Total Area</td><td style="border:1px solid;">Convert To</td><td style="border:1px solid;" colspan="2"><table style="margin-top: -4px;
    margin-bottom: -4px;"><tr><td style="width: 31%;">After Conversation
</td><td style="border-right:1px solid;border-left:1px solid;width: 31%;text-align: center;">SARFAESI ACT</td><td style="width: 31%;">Guideline Rate</td></tr></table>
</td><td style="border:1px solid;">Guideline Value</td>
                </tr>
          <tr>
                  


           <td style="border:1px solid;    width: 21%;"><?php echo $project1['totalareacom'];?> <?php if($manual_type[$countproper1]!='0.00' && $manual_type[$countproper1]!='') {?><?php echo $manual_type[$countproper1];?><?php } ?></td><td style="border:1px solid;    width: 21%;"><?php echo $project1['guideselectcom'];?></td>
           
           
           <td style="border:1px solid;    width: 42%;" colspan="2"> <table style="margin-top: -4px;
    margin-bottom: -4px;"><tr><td style="width: 31%;"><?php echo $project1['assignsqttot'];?> <?php echo $project1['guideselectcom'];?>
</td><td style="border-right:1px solid;border-left:1px solid;width: 31%;text-align: center;"><?php echo $project1['surfact'];?></td><td style="width: 31%;">₹<?php echo moneyFormatIndia($project1['guide_ratecom']);?> </td></tr></table></td><td style="border:1px solid;    width: 21%;">₹<?php echo moneyFormatIndia($project1['guidevaluecom']);?></td>
                </tr>
            </table>  
<?php } ?>
   <table class="striped responsive-table newtab" style="    margin-left: -11px;
      width: 99%;    margin-top: 5px;       margin-bottom: 1px;" >
            
               <tr>
                  <?php if($project1['land_type']=='Common') {?> 
          <td style="border:1px solid;">Total Land Area</td> <?php } ?> <td style="border:1px solid;" <?php if($project1['land_type']=='Common') {?> colspan="2" <?php } ?>>Total Guideline</td><td style="border:1px solid;">Market Value</td><td style="border:1px solid;">Reasonable value
</td><td style="border:1px solid;">Forced value</td>
                </tr>
          <tr>
                  <?php if($project1['land_type']=='Common') {?> 
           <td style="border:1px solid;    width: 21%;"><?php echo moneyFormatIndia($project1['totalareaval']);?> <?php if($manual_type[$countproper1]!='0.00' && $manual_type[$countproper1]!='') {?><?php echo $manual_type[$countproper1];?><?php } ?></td>
          <?php } ?>
           <td style="border:1px solid;    width: 21%;" <?php if($project1['land_type']=='Common') {?> colspan="2" <?php } ?>>₹<?php echo moneyFormatIndia($project1['guideline_value']);?></td><td style="border:1px solid;    width: 21%;">₹<?php echo moneyFormatIndia($project1['market_value']);?></td><td style="border:1px solid;    width: 21%;">₹<?php echo moneyFormatIndia($project1['reasonable_value']);?>
</td><td style="border:1px solid;    width: 21%;">₹<?php echo moneyFormatIndia($project1['forced_value']);?></td>
                </tr>
            </table>
  
        
        </div>
           
             
      
<?php }  else {?> 
<?php
$project_ids=$project1['id']; 
$copy_project_table = mysqli_query($conn,"SELECT * FROM `copy_project_table` where 1=1 and project_id='$project_ids' ");   
$copy_project_table1 = mysqli_fetch_array($copy_project_table);
if($copy_project_table1['lengtha']=='' or $copy_project_table1['breadtha']=='') 
{ ?>
<?php if(1!=1)
{?>
<div class="col m12 s12" style="">       
            <table class="striped responsive-table" <?php if($countproper1==0) {?>  style="    margin-left: -11px;
      width: 99%;" <?php } else {?> style="    margin-left: 3px;
      width: 95%" <?php } ?>>
              <thead>
                <tr>
                  <th style="border:0px solid;border-top:1px solid;    border-left: 1px solid;border-right: 1px solid;">Direction</th>
                  <th style="border:0px solid;border-top:1px solid;    border-left: 1px solid;    border-right: 1px solid;">Boundary details of the property</th>
                  <th colspan="3" style="border:1px solid;">Dimensions    </th>
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
                  <td style="border:1px solid;height">Dimension of the <br><span style=""></span></td>
                  <td style="border:1px solid;">Total Area <br> <span style=""></span></td>
                  <td style="border:1px solid;">Rate<br><span style="">₹</span></td>
          <td style="border:1px solid;">Land Value Total<br><span style="">₹</span></td>
                 
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

<?php } ?>  
 <?php 
 $project_ids=$project1['id']; 
$copy_project_table = mysqli_query($conn,"SELECT * FROM `copy_project_table` where 1=1 and project_id='$project_ids' ");   
$copy_project_table1 = mysqli_fetch_array($copy_project_table);
if($copy_project_table1['area']!='' && $project1['totallandvalue']!='') 
  {?> 
 <table class="striped responsive-table newtab" style="    margin-left: -11px;
      width: 99%;    margin-top: 5px;       margin-bottom: 155px;" >
      </table><?php } ?>  
<br>
 <div class="row invoice-info" style="     width: 94.9% !important;
    margin-left: 4px;">
    <?php if($project1['typeofconstruction']!='' || $copy_project_table1['area']) 
  {?>   
      <table class="striped responsive-table" style="    width: 100%;  margin-left: 1px;">
    <tbody>
  <tr>
<td colspan="4" style="border-top:1px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;text-align:center;">General Information </td>



 </tr>
                <tr>
                  <td style="border:0px solid;border-left:1px solid;border-bottom:1px solid;">Type of Construction<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other("typeofconstruction","name",$project1['typeofconstruction']); ?></td>
          <td colspan="2" style="border:0px solid;border-left:1px solid;border-bottom:1px solid;border-right:1px solid;text-align:center;">
          <table>
          <tr>
          <td style="border:0px solid;width: 30%;">Road Width</td>
                  <td style="border:0px solid;border-left:1px solid;width: 35%;">Road Type</td>
           <td style="border:0px solid;border-left:1px solid;width: 35%;">Road SuB Type</td>
           </tr>
           </table>
           </td>
          
          
                </tr>
        <tr>
                  <td style="border:0px solid;border-left:1px solid;border-bottom:1px solid;">Building Maintenance<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-bottom:1px solid;"> <?php echo select_value_other("maintananceofthebuilding","name",$project1['maintenanceofthebuilding']); ?></td>
            <td colspan="2"  style="border:0px solid;border-left:1px solid;border-bottom:1px solid;border-right:1px solid;text-align:center;">
          <table>
          <tr>
        <td style="border:0px solid;width: 30%;"><?php echo $project1['roadwidth'];?></td>
                  <td style="border:0px solid;border-left:1px solid;width: 35%;"><?php echo $project1['roadfacilities'];?></td>
           <td style="border:0px solid;border-left:1px solid;width: 35%;"><?php echo select_value_other("roadfacilities","name",$project1['roadfacilitiesyes']); ?></td>
           </tr>
           </table>
           </td>
          
                </tr>
        <tr>
                  <td style="border:0px solid;border-left:1px solid;border-bottom:1px solid;">Drainage Arrangements<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other("drainagearrangements","name",$project1['drainagearrangements']); ?></td>
          
         <td style="border:0px solid;border-left:1px solid;border-bottom:1px solid;">Joineries<span style="float:right">:</span></td>
                  <td  style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"><?php  echo $project1['joineries'];  ?></td>
                </tr>
        <tr>
               <td style="border:0px solid;border-left:1px solid;border-bottom:1px solid;">Type of Plot<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other("cornerintermittentcommerciallot","name",$project1['cornerplotintermittentplot']); ?></td>
        <td colspan="2"  style="border:0px solid;border-left:1px solid;border-bottom:1px solid;border-right:1px solid;text-align:center;">
          <table>
          <tr>
        <td style="border:0px solid;width: 30%;">Floor</td>
                  <td style="border:0px solid;border-left:1px solid;width: 35%;">Floor Finishing</td>
           <td style="border:0px solid;border-left:1px solid;width: 35%;">Roofing</td>
           </tr>
           </table>
           </td>
          
                </tr>
          <tr>
              <td style="border:0px solid;border-left:1px solid;border-bottom:1px solid;">Character of Locality<span style="float:right">:</span></td>
                  <td style="border:0px solid;border-bottom:1px solid;"><?php echo select_value_other("characteroflocality","name",$project1['characteroflocality']); ?></td>

          <td colspan="2" style="border:0px solid;border-left:1px solid;border-bottom:1px solid;border-right:1px solid;text-align:center;    width: 50%;">
            <table style="margin-left: -4px;width: 103%;">
         <?php 
         
 $floorselect=explode(",",$project1['floorselect']);
$floorfinish=explode(",",$project1['floorfinish']);
$roofingselect=explode(",",$project1['roofingselect']);
$typecont=count($roofingselect);
if($project1['floorselect']!='') {
  $vx=0;
foreach($floorselect as $floorselectcount =>$key) {  $vx++; $floorselect[$floorselectcount]; ?>
                <tr>
                  <td <?php if($vx==$typecont) {?> style="border:0px solid;width: 30%;border-bottom:0px solid;" <?php } else { ?> style="border:0px solid;width: 30%;border-bottom:1px solid;" <?php } ?>><?php echo $floorselect[$floorselectcount];?> </td>
                  <td <?php if($vx==$typecont) {?>  style="border:0px solid;border-left:1px solid;width: 35%;border-bottom:0px solid;" <?php } else { ?> style="border:0px solid;border-left:1px solid;width: 35%;border-bottom:1px solid;" <?php } ?>><?php echo $floorfinish[$floorselectcount]; ?></td>
                  <td <?php if($vx==$typecont) {?> style="border:0px solid;border-left:1px solid;width: 35%;border-bottom:0px solid;" <?php } else {?> style="border:0px solid;border-left:1px solid;width: 35%;border-bottom:1px solid;" <?php } ?>><?php echo select_value_other("roof","name",$roofingselect[$floorselectcount]);?></td>
                </tr>
<?php } }?> 
           </td>
                </tr>
        
          <tbody>
        </table>
        
      </td>
   </tr>
           </table>
      
           
          </div>
          




      <div class="col m12 s12" style="  ">
<?php 

 
if($copy_project_table1['area']!='' && $copy_project_table1['area']!='0.00') 
{ ?>
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;">
              <thead>
              
        <tr>
                  <th style="border:0px solid;border-left:1px solid;border-t:1px solid;border-right:1px solid;">S.No</th>
          <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">Type</th>
           <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">Descrption</th>
          <th style="border:0px solid;border-right:1px solid;">Com(%)</th>
          <th colspan="2" style="border:0px solid;border-right:1px solid;border-bottom:1px solid;width: 16%;
">Size</th>
          <th style="border:0px solid;border-right:1px solid;">Area</th>
          <th style="border:0px solid;border-right:1px solid;">Rate</th>
            <th style="border:0px solid;border-right:1px solid;">Amount</th>
          <th style="border:0px solid;border-right:1px solid;">Year</th>
           <th style="border:0px solid;border-right:1px solid;">Age</th>
          <th style="border:0px solid;border-right:1px solid;">Type of Roof</th>
           <th style="border:0px solid;border-right:1px solid;">Dep (%)</th>
          <th style="border:0px solid;border-right:1px solid;    width: 12%;">Dep Amount</th>
          <th style="border:0px solid;border-right:1px solid;    width: 10%;">Total</th>
                </tr>
          <tr>
                  <th style="border:0px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
            <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">L</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">B</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">Sq.Ft</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
            <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
            <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
                </tr>
              </thead>
              <tbody>
        <?php 

$desc_prop=explode(",",$copy_project_table1['desc_prop']);        
$lengtha=explode(",",$copy_project_table1['lengtha']);  
$lengthb=explode(",",$copy_project_table1['lengthb']);
$length=explode(",",$copy_project_table1['length']);
$breadtha=explode(",",$copy_project_table1['breadtha']);
$breadthb=explode(",",$copy_project_table1['breadthb']);
$breadth=explode(",",$copy_project_table1['breadth']);
$area=explode(",",$copy_project_table1['area']);
$rate=explode(",",$copy_project_table1['rate']);
$year=explode(",",$copy_project_table1['year']);
$age=explode(",",$copy_project_table1['age']);
$roofselect=explode(",",$copy_project_table1['roofselect']);
$deprciation=explode(",",$copy_project_table1['deprciation']);
$total=explode(",",$copy_project_table1['total']);
$percentage=explode(",",$copy_project_table1['percentage']);
$overalltotal=explode(",",$copy_project_table1['overalltotal']);
$dep_per=explode(",",$copy_project_table1['dep_per']);
$amountval=explode(",",$copy_project_table1['amountval']);
$spaceall=explode(",",$copy_project_table1['spaceall']);
$i=0;
foreach($lengtha as $lengthacountproper =>$key) {$i++;  

$roofselectid=$roofselect[$lengthacountproper]; 
$roof = mysqli_query($conn,"SELECT * FROM `roof` where 1=1 and id='$roofselectid' ");   
$roof1 = mysqli_fetch_array($roof);
$total2a+=$total[$lengthacountproper];
?>  
                <tr>
                  <td style="border:1px solid;"><?php echo $i; ?></td>
          <td style="border:1px solid;"> <?php echo $spaceall[$lengthacountproper]; ?></td>
                  <td style="border:1px solid;"><?php echo $desc_prop[$lengthacountproper]; ?></td>
            <td style="border:1px solid;"><?php echo $percentage[$lengthacountproper]; ?></td>
            <td style="border:1px solid;"> <?php echo $length[$lengthacountproper]; ?></td> 
                  <td style="border:1px solid;"> <?php echo $breadth[$lengthacountproper]; ?></td>
          <td style="border:1px solid;"><?php echo $area[$lengthacountproper]; ?></td>
           <td style="border:1px solid;"> <?php echo moneyFormatIndia($rate[$lengthacountproper]); ?></td>
          <td style="border:1px solid;"> <?php echo moneyFormatIndia($amountval[$lengthacountproper]); ?></td>
            <td style="border:1px solid;"> <?php echo $year[$lengthacountproper]; ?></td>
           <td style="border:1px solid;"> <?php echo $age[$lengthacountproper]; ?></td>
           <td style="border:1px solid;"> <?php echo $roof1['name']; ?></td>
           <td style="border:1px solid;"> <?php if($dep_per[$lengthacountproper]!='NaN') {?> <?php echo moneyFormatIndia($dep_per[$lengthacountproper]); ?> <?php } ?></td>
            <td style="border:1px solid;"> <?php echo moneyFormatIndia($deprciation[$lengthacountproper]); ?></td>
             <td style="border:1px solid;"> <?php echo moneyFormatIndia($total[$lengthacountproper]); ?></td>
             
                 
                </tr>
<?php } ?>      
        <tr>
                  
                  <td colspan="14" style="text-align:right;border:1px solid;">Grand Total </td>
       
             <td colspan="1" style="text-align:left;border:1px solid;"> <?php echo moneyFormatIndia($copy_project_table1['overalltotal']);?></td>
             
                 
                </tr>
        
<?php


?>      
               
              </tbody>
            </table>
<?php } ?>


<?php 

 
if($copy_project_table1['area1']!='' && $copy_project_table1['area1']!='0.00') 
{ ?>
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;border-top:0px solid;">
              <thead>
              
        <tr>
                  <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">S.No</th>
          <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">Type</th>
           <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">Descrption</th>
          <th style="border:0px solid;border-right:1px solid;">Com(%)</th>
          <th colspan="2" style="border:0px solid;border-right:1px solid;border-bottom:1px solid;width: 16%;
">Size</th>
          <th style="border:0px solid;border-right:1px solid;">Area</th>
          <th style="border:0px solid;border-right:1px solid;">Rate</th>
            <th style="border:0px solid;border-right:1px solid;">Amount</th>
          <th style="border:0px solid;border-right:1px solid;">Year</th>
          <th style="border:0px solid;border-right:1px solid;">Type of Roof</th>
           <th style="border:0px solid;border-right:1px solid;">Dep (%)</th>
          <th style="border:0px solid;border-right:1px solid;    width: 12%;">Dep Amount</th>
          <th style="border:0px solid;border-right:1px solid;    width: 10%;">Total</th>
                </tr>
          <tr>
                  <th style="border:0px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
            <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">L</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">B</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">Sq.Ft</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
            <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
                </tr>
              </thead>
              <tbody>
        <?php 

$desc_prop1=explode(",",$copy_project_table1['desc_prop1']);        
$lengtha1=explode(",",$copy_project_table1['lengtha1']);  
$lengthb1=explode(",",$copy_project_table1['lengthb1']);
$length1=explode(",",$copy_project_table1['length1']);
$breadtha1=explode(",",$copy_project_table1['breadtha1']);
$breadthb1=explode(",",$copy_project_table1['breadthb']);
$breadth1=explode(",",$copy_project_table1['breadth1']);
$area1=explode(",",$copy_project_table1['area1']);
$rate1=explode(",",$copy_project_table1['rate1']);
$year1=explode(",",$copy_project_table1['year1']);
$roofselect1=explode(",",$copy_project_table1['roofselect1']);
$deprciation1=explode(",",$copy_project_table1['deprciation1']);
$total1=explode(",",$copy_project_table1['total1']);
$percentage1=explode(",",$copy_project_table1['percentage1']);
$overalltotal1=explode(",",$copy_project_table1['overalltotal1']);
$dep_per1=explode(",",$copy_project_table1['dep_per1']);
$amountval1=explode(",",$copy_project_table1['amountval1']);
$spaceall1=explode(",",$copy_project_table1['spaceall1']);
$i=0;
foreach($lengtha1 as $lengthacountproper1 =>$key) {$i++;  

$roofselectid=$roofselect1[$lengthacountproper1]; 
$roof = mysqli_query($conn,"SELECT * FROM `roof` where 1=1 and id='$roofselectid' ");   
$roof1 = mysqli_fetch_array($roof);
$total2a+=$total[$lengthacountproper];
?>  
                <tr>
                  <td style="border:1px solid;"><?php echo $i; ?></td>
          <td style="border:1px solid;"> <?php echo $spaceall1[$lengthacountproper1]; ?></td>
                  <td style="border:1px solid;"><?php echo $desc_prop1[$lengthacountproper1]; ?></td>
            <td style="border:1px solid;"><?php echo $percentage1[$lengthacountproper1]; ?></td>
            <td style="border:1px solid;"> <?php echo $length1[$lengthacountproper1]; ?></td> 
                  <td style="border:1px solid;"> <?php echo $breadth1[$lengthacountproper1]; ?></td>
          <td style="border:1px solid;"><?php echo $area1[$lengthacountproper1]; ?></td>
           <td style="border:1px solid;"> <?php echo $rate1[$lengthacountproper1]; ?></td>
          <td style="border:1px solid;"> <?php echo $amountval1[$lengthacountproper1]; ?></td>
            <td style="border:1px solid;"> <?php echo $year1[$lengthacountproper1]; ?></td>
           <td style="border:1px solid;"> <?php echo $roof1['name']; ?></td>
           <td style="border:1px solid;"> <?php echo $dep_per1[$lengthacountproper1]; ?></td>
            <td style="border:1px solid;"> <?php echo $deprciation1[$lengthacountproper1]; ?></td>
             <td style="border:1px solid;"> <?php echo $total1[$lengthacountproper1]; ?></td>
             
                 
                </tr>
<?php } ?>      
        <tr>
                  
                  <td colspan="13" style="text-align:right;border:1px solid;">Grand Total:  </td>
       
             <td colspan="1" style="text-align:left;border:1px solid;"> <?php echo $copy_project_table1['overalltotal1'];?></td>
             
                 
                </tr>
        
        
      
               
              </tbody>
            </table>
<?php } ?>


<?php
if($copy_project_table1['area2']!='' && $copy_project_table1['area2']!='0.00') 
{ ?>
            <table class="striped responsive-table" style="    margin-left: -11px;
    width: 99%;border-top:0px solid;">
              <thead>
              
            <tr>
                  <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">S.No</th>
          <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">Type</th>
           <th style="border:0px solid;border-left:1px solid;border-right:1px solid;">Descrption</th>
          <th style="border:0px solid;border-right:1px solid;">Com(%)</th>
          <th colspan="2" style="border:0px solid;border-right:1px solid;border-bottom:1px solid;width: 16%;
">Size</th>
          <th style="border:0px solid;border-right:1px solid;">Area</th>
          <th style="border:0px solid;border-right:1px solid;">Rate</th>
            <th style="border:0px solid;border-right:1px solid;">Amount</th>
          <th style="border:0px solid;border-right:1px solid;">Year</th>
          <th style="border:0px solid;border-right:1px solid;">Type of Roof</th>
           <th style="border:0px solid;border-right:1px solid;">Dep (%)</th>
          <th style="border:0px solid;border-right:1px solid;    width: 12%;">Dep Amount</th>
          <th style="border:0px solid;border-right:1px solid;    width: 10%;">Total</th>
                </tr>
          <tr>
                  <th style="border:0px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
            <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">L</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">B</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-top:1px solid;">Sq.Ft</th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
            <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
          <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
           <th style="border:0px solid;border-bottom:1px solid;border-right:1px solid;"></th>
                </tr>
              </thead>
              <tbody>
       <?php
$desc_prop2=explode(",",$copy_project_table2['desc_prop2']);        
$lengtha2=explode(",",$copy_project_table2['lengtha2']);  
$lengthb2=explode(",",$copy_project_table2['lengthb2']);
$length2=explode(",",$copy_project_table2['length2']);
$breadtha2=explode(",",$copy_project_table2['breadtha2']);
$breadthb2=explode(",",$copy_project_table2['breadthb']);
$breadth2=explode(",",$copy_project_table2['breadth2']);
$area2=explode(",",$copy_project_table2['area2']);
$rate2=explode(",",$copy_project_table2['rate2']);
$year2=explode(",",$copy_project_table2['year2']);
$roofselect2=explode(",",$copy_project_table2['roofselect2']);
$deprciation2=explode(",",$copy_project_table2['deprciation2']);
$total2=explode(",",$copy_project_table2['total2']);
$percentage2=explode(",",$copy_project_table2['percentage2']);
$overalltotal2=explode(",",$copy_project_table2['overalltotal2']);
$dep_per2=explode(",",$copy_project_table2['dep_per2']);
$amountval2=explode(",",$copy_project_table2['amountval2']);
$spaceall2=explode(",",$copy_project_table2['spaceall2']);
$i=0;
foreach($lengtha2 as $lengthacountproper2 =>$key) {$i++;  

$roofselectid=$roofselect2[$lengthacountproper2]; 
$roof = mysqli_query($conn,"SELECT * FROM `roof` where 2=2 and id='$roofselectid' ");   
$roof2 = mysqli_fetch_array($roof);
$total2a+=$total[$lengthacountproper];
?>  
                <tr>
                  <td style="border:2px solid;"><?php echo $i; ?></td>
          <td style="border:2px solid;"> <?php echo $spaceall2[$lengthacountproper2]; ?></td>
                  <td style="border:2px solid;"><?php echo $desc_prop2[$lengthacountproper2]; ?></td>
            <td style="border:2px solid;"><?php echo $percentage2[$lengthacountproper2]; ?></td>
            <td style="border:2px solid;"> <?php echo $length2[$lengthacountproper2]; ?></td> 
                  <td style="border:2px solid;"> <?php echo $breadth2[$lengthacountproper2]; ?></td>
          <td style="border:2px solid;"><?php echo $area2[$lengthacountproper2]; ?></td>
           <td style="border:2px solid;"> <?php echo $rate2[$lengthacountproper2]; ?></td>
          <td style="border:2px solid;"> <?php echo $amountval2[$lengthacountproper2]; ?></td>
            <td style="border:2px solid;"> <?php echo $year2[$lengthacountproper2]; ?></td>
           <td style="border:2px solid;"> <?php echo $roof2['name']; ?></td>
           <td style="border:2px solid;"> <?php echo $dep_per2[$lengthacountproper2]; ?></td>
            <td style="border:2px solid;"> <?php echo $deprciation2[$lengthacountproper2]; ?></td>
             <td style="border:2px solid;"> <?php echo $total2[$lengthacountproper2]; ?></td>
             
                 
                </tr>
<?php } ?>      
        <tr>
                  
                  <td colspan="23" style="text-align:right;border:2px solid;">Grand Total:  </td>
       
             <td colspan="2" style="text-align:left;border:2px solid;"> <?php echo $copy_project_table2['overalltotal2'];?></td>
             
                 
                </tr>
        
      
               
              </tbody>
            </table>
<?php } ?>
<?php $totalall=($copy_project_table1['overalltotal']+$copy_project_table1['overalltotal1']+$copy_project_table1['overalltotal2']+$copy_project_table1['overalltotal3']);?>
      </div>
  
    <div class="row invoice-info">

            <div class="col m6 s12">
      <table class="striped responsive-table" style="border-right:0px solid;border-left:1px solid;border-top:0px solid;">
    <tbody>
             <tr >
      
                  <td colspan="3" style="border:0px solid;border-bottom:1px solid;    font-size: 13px;text-align:center;border-right:1px solid;">Services       
</td>

                </tr>
                <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Water Supply Arrangements (Rs)
        <?php if($project1['waterall']!='') {?>  <br> <table style="    width: 105%;
    margin-left: -6px;"> <tr><?php  $drivercheckedval=explode(",",$project1['waterall']);
          
           $countval=count($drivercheckedval);
          $cv=0;
          foreach($drivercheckedval as $drivercheckedvalall) { $cv++;   
         ?> 
         <td <?php if($cv==$countval) {?>  style="border-top: 1px solid;border-bottom:1px solid;text-align: center;" <?php } {?> style="border-top: 1px solid;border-bottom:1px solid;border-right:1px solid;text-align: center;" <?php } ?>><?php echo $drivercheckedvalall;?></td>
          <?php }?>
          </tr>
          <tr><?php $drivercheckedval=explode(",",$project1['waterall']);
          $cd=0;
          foreach($drivercheckedval as $drivercheckedvalall) {$cd++;   
          $namm=strtolower(str_replace(" ","",str_replace("Panchayat Tap","PTap",$drivercheckedvalall)));
          
         ?> 
         <td <?php if($cd==$countval) {?>  <?php } else {?> style="border-right:1px solid;text-align: center;" <?php } ?>><?php echo $project1[$namm];?></td>
          <?php }?>
          </tr>
        </table> <?php } ?>
</td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['watersupplyarrangementsRs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['watersupplyarrangementsRs']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Drainage Arrangements (Rs)  </td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['drainagearrangementsRs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['drainagearrangementsRs']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Compound Wall L (Rs)
          <br>
          <table style="    width: 105%;
    margin-left: -6px;">
  <tr><td style="border-top: 1px solid;border-bottom:1px solid;border-right:1px solid;text-align: center;" >L</td><td style="border-top: 1px solid;border-bottom:1px solid;border-right:1px solid;text-align: center;" >B</td><td style="border-top: 1px solid;border-bottom:1px solid;border-right:1px solid;" >Sqft</td><td style="border-top: 1px solid;border-bottom:1px solid;text-align: center;" >Rate</td></tr>
  
  <tr><td style="border-top: 1px solid;;border-right:1px solid;    height: 17px;text-align: center;" ><?php echo $project1['compoundwallL1'];?></td><td style="border-top: 1px solid;border-right:1px solid;text-align: center;" ><?php echo $project1['compoundwallL2'];?></td><td style="border-top: 1px solid;border-right:1px solid;" ><?php echo $project1['compoundwallL'];?></td><td style="border-top: 1px solid;text-align: center;" ><?php echo moneyFormatIndia($project1['compoundwallrate']);?></td></tr>
  </table>
</td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['compoundwallRs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['compoundwallRs']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">E.B Deposit (Rs)
          
           <table style="    width: 105%;
    margin-left: -6px;">
  <tr><td colspan="2" style="border-top: 1px solid;border-bottom:1px solid;border-right:1px solid;text-align: center;" >I Phase</td><td colspan="2" style="border-top: 1px solid;border-bottom:1px solid;text-align: center;" >III Phase</td></tr>
  
  <tr><td style="border-top: 1px solid;;border-right:1px solid;    height: 17px;text-align: center;" ><?php echo $project1['pase1_service'];?></td><td style="border-top: 1px solid;border-right:1px solid;text-align: center;" ><?php echo $project1['pase1_rate'];?></td><td style="border-top: 1px solid;border-right:1px solid;text-align: center;" ><?php echo $project1['pase2_service'];?></td><td style="border-top: 1px solid;text-align: center;" ><?php echo $project1['pase2_rate'];?></td></tr>
  </table>
  
  
</td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['ebdepositRs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['ebdepositRs']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;"> <?php echo str_replace(",","/ ",$project1['pavertype']); ?> (Rs)
</td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['paverrs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['paverrs']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Interior (Rs) </td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['interiorworkRs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['interiorworkRs']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Exterior (Rs)   </td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['exteriorworkRs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['exteriorworkRs']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Land Scaping (Rs)   </td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['land_scaping']!='') {?> Rs. <?php echo moneyFormatIndia($project1['land_scaping']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Open Stair Case (Rs)</td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['openstaircaseRs']!='') {?> Rs. <?php echo moneyFormatIndia($project1['openstaircaseRs']);?><?php } ?></td>
                </tr>
         <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Stair Head Room (Rs) </td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['stairheadroom']!='') {?> Rs. <?php echo moneyFormatIndia($project1['stairheadroom']);?><?php } ?></td>
                </tr>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;">Open Toilet (Rs)  </td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($project1['open_toilet']!='') {?> Rs. <?php echo moneyFormatIndia($project1['open_toilet']);?><?php } ?></td>
                </tr>
        <?php
$convert_to_array = explode(',', $project1['servicessadd']);
$servicessadd_tot = explode(',', $project1['servicessadd_tot']);
$v=-1;

?>
<?php foreach($convert_to_array as $servicessadd) {$v++;?>
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;    height: 22px;"><?php echo $servicessadd;?> (Rs)  </td>
                  <td style="border:0px solid;border-bottom:1px solid;    height: 22px;border-right:1px solid; "><?php if($servicessadd_tot[$v]!='') {?> Rs. <?php echo moneyFormatIndia($servicessadd_tot[$v]);?><?php } ?></td>
                </tr> 
<?php } ?>
         <tr>
                  <td style="border:0px solid;border-right:1px solid;    height: 22px;">Total</td>
                  <td style="border:0px solid;    height: 22px;border-right:1px solid; "><?php if($project1['serviceovertotal']!='') {?> Rs. <?php echo moneyFormatIndia($project1['serviceovertotal']);?><?php } ?></td>
                </tr>
        
        </table>
  
  </div> 
  


      
  <div class="row invoice-info" style="    width: 91.8% !important;
    margin-left: 16px;
    margin-top: 25px;
    margin-bottom: 25px;">
        
      <table class="striped responsive-table">
    <tbody>

                <tr>
                   <td style="border:0px solid;border-bottom:1px solid;border-top:1px solid;border-right:1px solid;border-left:1px solid;">Land Value</td><td style="border:0px solid;border-bottom:1px solid;border-top:1px solid;text-align:right;border-right:1px solid;">₹ <?php echo moneyFormatIndia($project1['landtotal']);?></td> 
            <td style="border:0px solid;border-bottom:1px solid;border-top:1px solid;border-right:1px solid;">Market Value</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;border-top:1px solid;border-right:1px solid;">₹ <?php echo moneyFormatIndia($project1['newmarkettotal']);?></td> 
                </tr> 
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-left:1px solid;">Building </td><td style="border:0px solid;border-bottom:1px solid;text-align:right;border-right:1px solid;" >₹ <?php echo moneyFormatIndia($project1['buildingtotal']); ?></td>
          <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Reasonable Value</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;border-right:1px solid;" >₹ <?php echo moneyFormatIndia($project1['newreasontotal']); ?></td>
                </tr> 
         <tr>
                  <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-left:1px solid;">Services </td><td style="border:0px solid;border-bottom:1px solid;text-align:right;border-right:1px solid;">₹ <?php echo moneyFormatIndia($project1['serviceovertotal']);?></td>
          <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Forced value</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;border-right:1px solid;">₹ <?php echo moneyFormatIndia($project1['newforcedtotal']);?></td> 
                </tr> 
         <tr>
                    <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;border-left:1px solid;">Total  </td><td style="border:0px solid;border-bottom:1px solid;text-align:right;border-right:1px solid;">₹ <?php echo moneyFormatIndia($project1['alltotal']);?></td>
            <td style="border:0px solid;border-bottom:1px solid;border-right:1px solid;">Guideline Value</td><td style="border:0px solid;border-bottom:1px solid;text-align:right;border-right:1px solid;">₹ <?php echo  $alltot=moneyFormatIndia(($project1['newalltotal'])); ?></td>
                </tr> 
    </tbody></table> </div>   
      
      
      
      
  <?php } ?>
          </div>  

  <table class="striped responsive-table" style="    width: 96.5%%;
    margin-left: -27px; border:unset !important;margin-top: 0px;">
              <thead>
                <thead>
                <tr>
  
                  <th style="border:1px solid;border:unset !important;;"><p style=" 
 text-align: center;">Created by <?php if($project1['typed_by']!='') {?> - <?php echo $project1['created_by'];?> <?php } ?></p></th>
  <th style="width: 10%;border:unset !important;"></th>
                  <th style="border:1px solid;border:unset !important;"><p style="  
 text-align: center;">Typed by <?php if($project1['typed_by']!='') {?> - <?php echo $project1['typed_by'];?><?php } ?></p></th>
                  
                </tr>
        <?php if(1!=1) {?>
         <tr>
      
                  <th style="border:1px solid;border:unset !important;;"><p style="text-align: center;"><?php echo $project1['created_by'];?></p></th>
  <th style="border:unset !important;"></th>
                  <th style="border:1px solid;border:unset !important;"><p style="    
 text-align: center;
"><?php echo $project1['typed_by'];?></p></th>
                  
                </tr>
        <?php } ?>
              </thead>
              </thead>
             
            </table>  
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

 
 