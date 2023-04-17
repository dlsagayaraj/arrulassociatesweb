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
     <div>
	    <h4 class="card-title" style="    float: left;
    font-weight: bold;">Documents</h4>
        </div>  </div> 
      <div class="row">
	
		  <div>
		  <p style="font-size:20px;"> Ref Document</p>
		  <?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `refdocument` where 1=1 and  cat_id='$edit_id' and  delete_status='0'");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
	   <object data="<?php echo $web_url; ?>documents/refdocumentfile/<?php echo $ftaxreceipt1['file_name'];?>" type="application/pdf" width="100%" height="100%" style="    height: 1000px;
    WIDTH: 1000px;">
  <p> <a href="<?php echo $web_url; ?>documents/refdocumentfile/<?php echo $ftaxreceipt1['file_name'];?>">to the PDF!</a></p>
</object >
<?php } ?>
</div>

<div>
		  <p style="font-size:20px;">Tax Receipt</p>
	<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `taxreceipt` where 1=1 and  cat_id='$edit_id' and  delete_status='0'");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
	   <object data="<?php echo $web_url; ?>documents/tax/<?php echo $ftaxreceipt1['file_name'];?>" type="application/pdf" width="100%" height="100%" style="    height: 1000px;
    WIDTH: 1000px;">
  <p> <a href="<?php echo $web_url; ?>documents/tax/<?php echo $ftaxreceipt1['file_name'];?>">to the PDF!</a></p>
</object >
<?php } ?>
</div>


<div>
		  <p style="font-size:20px;">E.B. Service No</p>
<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `ebservice` where 1=1 and  cat_id='$edit_id' and  delete_status='0'");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
	   <object data="<?php echo $web_url; ?>documents/ebservice/<?php echo $ftaxreceipt1['file_name'];?>" type="application/pdf" width="100%" height="100%" style="    height: 1000px;
    WIDTH: 1000px;">
  <p> <a href="<?php echo $web_url; ?>documents/ebservice/<?php echo $ftaxreceipt1['file_name'];?>">to the PDF!</a></p>
</object >
<?php } ?>
</div>

<div>
		  <p style="font-size:20px;">Patta / DTCP</p>
<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `pattadtcp` where 1=1 and  cat_id='$edit_id' and  delete_status='0'");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
	   <object data="<?php echo $web_url; ?>documents/pattadtcp/<?php echo $ftaxreceipt1['file_name'];?>" type="application/pdf" width="100%" height="100%" style="    height: 1000px;
    WIDTH: 1000px;">
  <p> <a href="<?php echo $web_url; ?>documents/pattadtcp/<?php echo $ftaxreceipt1['file_name'];?>">to the PDF!</a></p>
</object >
<?php } ?>
</div>


<div>
		  <p style="font-size:20px;">Approval Plan</p>
<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `approvalplan` where 1=1 and  cat_id='$edit_id' and  delete_status='0'");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
	   <object data="<?php echo $web_url; ?>documents/approvalplan/<?php echo $ftaxreceipt1['file_name'];?>" type="application/pdf" width="100%" height="100%" style="    height: 1000px;
    WIDTH: 1000px;">
  <p> <a href="<?php echo $web_url; ?>documents/approvalplan/<?php echo $ftaxreceipt1['file_name'];?>">to the PDF!</a></p>
</object >
<?php } ?>
</div>

<div>
		  <p style="font-size:20px;">H.D Line</p>
<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `hdline` where 1=1 and  cat_id='$edit_id' and  delete_status='0'");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
	   <object data="<?php echo $web_url; ?>documents/hdline/<?php echo $ftaxreceipt1['file_name'];?>" type="application/pdf" width="100%" height="100%" style="    height: 1000px;
    WIDTH: 1000px;">
  <p> <a href="<?php echo $web_url; ?>documents/hdline/<?php echo $ftaxreceipt1['file_name'];?>"></a></p>
</object >
<?php } ?>
</div>

<div>
		  <p style="font-size:20px;">Guideline Value</p>
<?php
$ftaxreceipt = mysqli_query($conn,"SELECT * FROM `guideupload` where 1=1 and  cat_id='$edit_id' and  delete_status='0'");   
while($ftaxreceipt1 = mysqli_fetch_array($ftaxreceipt))
{
?>
	   <object data="<?php echo $web_url; ?>documents/guide/<?php echo $ftaxreceipt1['file_name'];?>" type="application/pdf" width="100%" height="100%" style="    height: 1000px;
    WIDTH: 1000px;">
  <p> <a href="<?php echo $web_url; ?>documents/guide/<?php echo $ftaxreceipt1['file_name'];?>"></a></p>
</object >
<?php } ?>
</div>    
 
  
   
    	 
		 
      </div>
   </div>

</div>
          </div>

        </div>
      </div>
    </div>
 <?php include("footer.php");?>