<?php
include("config.php");
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
$diesel_advance=$_POST['diesel_advance'];



if(isset($_REQUEST['unique_column']))
{
	
	
	
$file = $_FILES['bill1_doc']['tmp_name'];
if($file) {

          $handle = fopen($file, "r");
          $row = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
$A=0;$B=0;$C=0;$D=0;$E=0;$F=0;$G=0;$H=0;$I=0;$J=0;$K=0;$L=0;$M=0;$N=0;$O=0;$P=0;$Q=0;$R=0;$S=0;$T=0;;$U=0;;$V=0;;$W=0;;$X=0;;$Y=0;;$Z=0;		
        $A = $filesop[0];
$B = $filesop[1];
$C = $filesop[2];
$D = $filesop[3];
$E = $filesop[4];
$F = $filesop[5];
$G = $filesop[6];
$H = $filesop[7];
$I = $filesop[8];
$J = $filesop[9];
$K = $filesop[10];
$L = $filesop[11];
$M = $filesop[12];
$N = $filesop[13];
$O = $filesop[14];
$P = $filesop[15];
$Q = $filesop[16];
$R = $filesop[17];
$S = $filesop[18];
$T = $filesop[19];
$U = $filesop[20];
$V = $filesop[21];
$W = $filesop[22];
$X = $filesop[23];
$Y = $filesop[24];
$Z = $filesop[25];
		
          $sql = "insert into bill(A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,date_time,log_id) values ('$A','$B','$C','$D','$E','$F','$G','$H','$I','$J','$K','$L','$M','$N','$O','$P','$Q','$R','$S','$T','$U','$V','$W','$X','$Y','$Z','$date_time','$log_id')";
          $stmt = mysqli_prepare($conn,$sql);
          mysqli_stmt_execute($stmt);

         $row = $row + 1;
           }

}





$file2 = $_FILES['bill2_doc']['tmp_name'];
if($file2) {

          $handle2 = fopen($file2, "r");
          $row2 = 0;
          while(($filesop1 = fgetcsv($handle2, 1000, ",")) !== false)
                    {
$AA=0;$AB=0;$AC=0;$AD=0;$AE=0;$AF=0;$AG=0;$AH=0;$AI=0;$AJ=0;$AK=0;$L=0;$AM=0;$AN=0;$AO=0;$AP=0;$AQ=0;$AR=0;$AS=0;$AT=0;;$AU=0;;$AV=0;;$AW=0;;$AX=0;;$AY=0;;$AZ=0;					
$AA = $filesop1[0];
$AB = $filesop1[1];
$AC = $filesop1[2];
$AD = $filesop1[3];
$AE = $filesop1[4];
$AF = $filesop1[5];
$AG = $filesop1[6];
$AH = $filesop1[7];
$AI = $filesop1[8];
$AJ = $filesop1[9];
$AK = $filesop1[10];
$AL = $filesop1[11];
$AM = $filesop1[12];
$AN = $filesop1[13];
$AO = $filesop1[14];
$AP = $filesop1[15];
$AQ = $filesop1[16];
$AR = $filesop1[17];
$AS = $filesop1[18];
$AT = $filesop1[19];
$AU = $filesop1[20];
$AV = $filesop1[21];
$AW = $filesop1[22];
$AX = $filesop1[23];
$AY = $filesop1[24];
$AZ = $filesop1[25];
		
          $sql2 = "insert into bill2(A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,date_time,log_id) values ('$AA','$AB','$AC','$AD','$AE','$AF','$AG','$AH','$AI','$AJ','$AK','$AL','$AM','$AN','$AO','$AP','$AQ','$AR','$AS','$AT','$AU','$AV','$AW','$AX','$AY','$AZ','$date_time','$log_id')";
          $stmt2 = mysqli_prepare($conn,$sql2);
          mysqli_stmt_execute($stmt2);

         $row2 = $row2 + 1;
           }

}



}


if($edit_id=='/bill/create-bill')
{




if(isset($_REQUEST['ton']))
{

$count = mysqli_query($conn,"SELECT * FROM `bill` where vehicle_no like '%$vehicle_no%' and  ton='$ton' and  date='$date'"); 
$total_count=mysqli_num_rows($count);
if($total_count>='1')
{
$message='fail';
$alert="Data Already Exist.";	
}
else
{

if($_FILES["bill1_doc"]["name"]!='') {	
$array = explode('.', $_FILES['bill1_doc']['name']);
$bill1_doc = "bill".$date_time_micro.".".end($array);
$target_dir1 = "documents/bill1/";
$target_file = $target_dir1 .$bill1_doc;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["bill1_doc"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("Bill");}
 }
 
 if($_FILES["bill2_doc"]["name"]!='') {	
$array = explode('.', $_FILES['bill2_doc']['name']);
$bill2_doc = "gc".$date_time_micro.".".end($array);
$target_dir2 = "documents/bill2/";
$target_file = $target_dir2 .$bill2_doc;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["bill2_doc"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("GC");}
 }




$totaldalton=($dalmia_rate_ton*$ton);	
$totaltransportton=($transport_rate_ton*$ton);	
	
   $query = "insert into bill(bill_doc,gc_doc,totaldalton,totaltransportton,vehicle_type_id,staff_id,date,ton,owner_type_id,vehicle_no,dalmia_rate_ton,transport_rate_ton,cash_advance,diesel_advance,date_time,log_id) values ('$bill_doc','$gc_doc','$totaldalton','$totaltransportton','$vehicle_type_id','$staff_id','$date','$ton','$owner_type_id','$vehicle_no','$dalmia_rate_ton','$transport_rate_ton','$cash_advance','$diesel_advance','$date_time','$log_id')";
 

$inserted = mysqli_query($conn, $query);
if($inserted=='1')	
{
$alert="Succesfully Created.";	
$message="Success";	
}
else
{
$message="fail";		
}
}
}
}
else
{
if(isset($_REQUEST['ton']))
{	

 $totaldalton=($dalmia_rate_ton*$ton);	
 $totaltransportton=($transport_rate_ton*$ton);	


if($_FILES["bill_doc"]["name"]!='') {	
$array = explode('.', $_FILES['bill_doc']['name']);
$bill_doc = "bill".$date_time_micro.".".end($array);
$target_dir1 = "documents/bill1/";
$target_file = $target_dir1 .$bill_doc;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["bill_doc"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("Bill");}
 }
 else
 {
	$bill_doc=$_POST['bill_doc_name'];
 }
 
 if($_FILES["gc_doc"]["name"]!='') {	
$array = explode('.', $_FILES['gc_doc']['name']);
$gc_doc = "gc".$date_time_micro.".".end($array);
$target_dir1 = "documents/bill2/";
$target_file = $target_dir1 .$gc_doc;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["gc_doc"]["tmp_name"], $target_file)) {  } else { echo failure_message_image("GC");}
 }
 else
 {
	$gc_doc=$_POST['gc_doc_name'];
 }




 $query = "UPDATE `bill` SET `gc_doc`='$gc_doc',`bill_doc`='$bill_doc',`totaldalton`='$totaldalton',`totaltransportton`='$totaltransportton',`vehicle_type_id`='$vehicle_type_id',`vehicle_no`='$vehicle_no',`staff_id`='$staff_id',`date`='$date',`ton`='$ton',`owner_type_id`='$owner_type_id',`dalmia_rate_ton`='$dalmia_rate_ton',`transport_rate_ton`='$transport_rate_ton',`cash_advance`='$cash_advance',`diesel_advance`='$diesel_advance',`log_id`='$log_id',`date_time`='$date_time' where id='$edit_id'";



$inserted = mysqli_query($conn, $query);

if($inserted=='1')	
{
$alert="Succesfully Updated.";
$message="Success";	
}
//else
//{
//$message="fail";		
//}	
}
}
$user = mysqli_query($conn,"SELECT * FROM `bill` where 1=1 and id='$edit_id' ");   
$user1 = mysqli_fetch_array($user);



?>

    <div id="main">
      <div class="row">
        
		<div class="col s12">
          <div class="container">
            <div class="seaction">

<div class="row">
<div class="col s12 m12 l12">

      <div id="prefixes" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">UPLOAD BILL</h4>
		   <?php if($message=='fail')
		  {?>
		  <span class="red-text center"><?php echo $alert; ?></span> <?php } ?>	
		  <?php if($message=='Success')
		  {?>
		  <span class="green-text center"><?php echo $alert; ?></span> <?php } ?>
		   <div id="overlaynew"><img  id="loadingnew" src="<?php echo $web_url; ?>demo_wait.gif" width="150px" height="130px" /></div>
           <form class="login-form" class="formValidate" id="formValidate"  enctype="multipart/form-data" action="" method="post">
          

			<div class="row">
              <div class="input-field col s12">
               <input  id="bill_name" name="bill_name" type="text" value="<?php echo $user1['bill_name'];?>" style="text-transform:uppercase"  required data-error=".errorTxt7">
                <label for="unique_column">Bill Name</label>
				<small class="errorTxt1"></small>	
              </div>
            </div>
			
			<div class="row">
              <div class="input-field col s12">
               <input  id="unique_column" name="unique_column" type="text" value="<?php echo $user1['unique_column'];?>" style="text-transform:uppercase"  required data-error=".errorTxt7">
                <label for="unique_column">Unique Column</label>
				<small class="errorTxt1"></small>	
              </div>
            </div>
			
			
			 <div class="row">
              <div class="input-field col s12">
			     <p for="litre">BILL 1 (.csv,.xls) </p>
               <input  id="bill1_doc" name="bill1_doc" type="file" value="">
               <input  id="bill1_doc_name" name="bill1_doc_name" type="hidden" value="<?php echo $user1['bill1_doc'];?>">
				  <?php if($user1['bill1']!='') {?> <a href="<?php echo $web_url; ?>documents/bill1/<?php echo $user1['bill1'];?>" target="_blank">View</a> <?php } ?>
              </div>
            </div>
			
			 <div class="row">
              <div class="input-field col s12">
			  <p for="litre">BILL 2 (.csv,.xls)</p>
               <input  id="bill2_doc" name="bill2_doc" type="file" value="">
                  <input  id="bill2_doc_name" name="bill2_doc_name" type="hidden" value="<?php echo $user1['bill2_doc'];?>">
				  <?php if($user1['bill2']!='') {?> <a href="<?php echo $web_url; ?>documents/bill2/<?php echo $user1['bill2'];?>" target="_blank">View</a> <?php } ?>
				
              </div>
            </div>
			
			
			

            <div class="row">
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn green waves-effect waves-light right" type="submit" name="action">Submit
                  
                  </button>
                </div>
              </div>
            </div>
          </form>
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

<script>

  $(document).ready(function(){   
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
	 
	 
	 
	  unique_column: {
        required: true,
      },
	  
     
    },
    //For custom messages
    messages: {
	 
      unique_column: {
        required: "Enter a Unique Column",
      }
	  
	 
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
</script>