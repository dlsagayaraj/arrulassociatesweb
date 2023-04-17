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
             
              <div class="invoice-address">
                <span>Name of the Bank </span>
              </div>
              <div class="invoice-address">
                <span>Loan Amount </span>
              </div>
              <div class="invoice-address">
                <span>Company Name</span>
              </div>
              <div class="invoice-address">
                <span>Name of the Owner Address</span>
              </div>
            </div>
            <div class="col m6 s12">
             
              <div class="invoice-address">
                <span>Date</span>
              </div>
              <div class="invoice-address">
                <span>Inspected</span>
              </div>
              <div class="invoice-address">
                <span>Advance Amount</span>
              </div>
              <div class="invoice-address">
                <span>Name of the purchaser address</span>
              </div>
            </div>
          </div>
		  
		  <div class="row invoice-info">
            <div class="col m6 s12" style="border: 1px solid;">
             
              <div class="invoice-address">
                <span>i)Door No </span>
              </div>
              <div class="invoice-address">
                <span>ii)Street  </span>
              </div>
              <div class="invoice-address">
                <span>iii)Area </span>
              </div>
              <div class="invoice-address">
                <span>iv)Post  </span>
              </div>
			  <div class="invoice-address">
                <span>v)Taluk  </span>
              </div>
			  <div class="invoice-address">
                <span>vi)District </span>
              </div>
            </div>
            <div class="col m6 s12" style="border: 1px solid;">
             
              <div class="invoice-address">
                <span>i)Door No </span>
              </div>
              <div class="invoice-address">
                <span>ii)Street  </span>
              </div>
              <div class="invoice-address">
                <span>iii)Area </span>
              </div>
              <div class="invoice-address">
                <span>iv)Village </span>
              </div>
			   <div class="invoice-address">
                <span>v)Taluk </span>
              </div>
			   <div class="invoice-address">
                <span>vi)District </span>
              </div>
            </div>
          </div>
		 

		 <div class="row invoice-info">
            <div class="col m6 s12" style="border: 1px solid;">
              <h6 class="invoice-from">5.Property Address </h6>
              <div class="invoice-address">
                <span>i)Door No </span>
              </div>
              <div class="invoice-address">
                <span>ii)Street </span>
              </div>
              <div class="invoice-address">
                <span>iii)Area </span>
              </div>
              <div class="invoice-address">
                <span>iv)Village </span>
              </div>
			   <div class="invoice-address">
                <span>v)Taluk </span>
              </div>
			   <div class="invoice-address">
                <span>vi)District </span>
              </div>
			   <div class="invoice-address">
                <span>vii)Cell No </span>
              </div>
            </div>
            <div class="col m6 s12" style="border: 1px solid;">
             <h6 class="invoice-from" style="margin-bottom: 41px;"></h6>
			 
               <div class="invoice-address" >
                <span>i)R.S.F No </span>
              </div>
              <div class="invoice-address">
                <span>ii)Patta No </span>
              </div>
              <div class="invoice-address">
                <span>iii)Block No </span>
              </div>
              <div class="invoice-address">
                <span>iv)T.S.No </span>
              </div>
			   <div class="invoice-address">
                <span>v)S.R.O </span>
              </div>
			   <div class="invoice-address">
                <span>vi)Plot No </span>
              </div>
			   <div class="invoice-address">
                <span>vii)Pin Code </span>
              </div>
            </div>
          </div>
		  
<div class="row invoice-info" >
            <div class="col m6 s12" style="border: 1px solid;">
             
              <div class="invoice-address">
                <span>i)Land Mark</span>
              </div>
              <div class="invoice-address">
                <span>ii)Nearest Bus Stop </span>
              </div>
              <div class="invoice-address">
                <span>iii)Distance of Branch</span>
              </div>
              <div class="invoice-address">
                <span>iv)Distance of R.S  </span>
              </div>
			   <div class="invoice-address">
                <span>iv)Nearest Main Road  </span>
              </div>
			   <div class="invoice-address">
                <span>iv)Civil Amenities  </span>
              </div>
            </div>
            <div class="col m6 s12" style="border: 1px solid;">
             
              <div class="invoice-address">
                <span> i)Property Occupied :  Owner </span>
              </div>
              <div class="invoice-address">
                <span>  ii)Tax Receipt      : Y/N </span>
              </div>
              <div class="invoice-address">
                <span> iii)E.B. Service No : Y/N</span>
              </div>
              <div class="invoice-address">
                <span>iv)Patta / DTCP     :</span>
              </div>
			   <div class="invoice-address">
                <span>v)Approval Plan     :</span>
              </div>
			   <div class="invoice-address">
                <span>vi)H.D Line     :</span>
              </div>
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
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">South</td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">East</td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                 
                </tr>
				<tr>
                  <td style="border:1px solid;">West</td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                  <td style="border:1px solid;"></td>
                 
                </tr>
				
				<tr>
                  <td colspan="2" style="border:1px solid;">Extent of Site:</td>
                  <td colspan="2" style="border:1px solid;"></td>
               
                 
                </tr>
               
              </tbody>
            </table>
       
		  
		      <!-- product details table-->
          <div class="invoice-product-details" style="border-top:1px solid;">
            <table class="striped responsive-table">
            
              <tbody>
			  
                <tr>
                  <td style="border:0px solid;">1.Type of Property </td>
                  <td style="border:0px solid;"><i class="material-icons  check1">check</i>Residential/</td>
				  <td style="border:0px solid;">Commercial/ </td>
				  <td style="border:0px solid;">Industrial/</td>
				  <td style="border:0px solid;"><span style="margin-left: -49px;">Vacant Land/</span></td>
				  <td style="border:0px solid;"><span style="margin-left: -29px;">Agricultural/</span></td>
				  <td colspan="1" style="border:0px solid;"><span style="margin-left: -49px;">Dry Land</span></td>
				 
                 
                </tr>
				<tr>
                  <td style="border:0px solid;">2.Size of Plot  </td>
                   <td style="border:0px solid;"><span style="margin-left: -5px;">Rectangular /</span></td>
				  <td style="border:0px solid;">Regular /</td>
				  <td style="border:0px solid;">Irrecgular /</td>
				  <td style="border:0px solid;"></i>Odd</td>
				  <td style="border:0px solid;"></i></td>
				  <td style="border:0px solid;"></i></td>
				  <td style="border:0px solid;"></td>
                 
                </tr>
				<tr>
                  <td style="border:0px solid;">3.Recent Developments Near to the Site  </td>
                   <td style="border:0px solid;">Residential / </td>
				  <td style="border:0px solid;">Commercial/</td>
				  <td style="border:0px solid;">Industrial/</td>
				  <td style="border:0px solid;">Mixed/</td>
				  <td style="border:0px solid;">Agricultural</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                </tr>
			
				<tr>
                 <td style="border:0px solid;">4.Resent Sale Details  </td>
                  <td style="border:0px solid;"></td>
				  <td colspan="5" style="border:0px solid;"></td>
				 
                </tr>
				
				<tr>
                 <td style="border:0px solid;">5.Prevailing Market Rate  </td>
                  <td style="border:0px solid;">Rs.</td>
				  <td style="border:0px solid;">(to) </td>
				  <td style="border:0px solid;"> Rs</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">6.Class of Construction   </td>
                  <td style="border:0px solid;">I -Class /</td>
				  <td style="border:0px solid;">II - Class/</td>
				  <td style="border:0px solid;">III- Class/</td>
				  <td colspan="2" style="border:0px solid;"><span style="margin-left: -29px;">Building Under Construction</span></td>
				  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">7.Roof  </td>
                  <td style="border:0px solid;">RCC/</td>
				  <td style="border:0px solid;">AC Sheet/</td>
				  <td style="border:0px solid;">Galvalume/</td>
				  <td style="border:0px solid;">M.Tiled/</td>
				  <td style="border:0px solid;">Madras Terrace</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">8.Limit  </td>
                  <td style="border:0px solid;">Corporation/</td>
				  <td style="border:0px solid;">Municipality/</td>
				  <td style="border:0px solid;">Town Panchayat/</td>
				  <td style="border:0px solid;">Panchayat</td>
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
                  <td colspan="2" style="border:0px solid;">Load Bearing Structure /</td>
				  <td colspan="2" style="border:0px solid;">Framed Structure/ </td>
				 
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                 
                </tr>
				<tr>
                  <td style="border:0px solid;">2.No of floor    </td>
                   <td style="border:0px solid;">Ground/</td>
				  <td style="border:0px solid;">First/</td>
				  <td style="border:0px solid;">Second/</td>
				  <td style="border:0px solid;">Third Floor</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
                  
                </tr>
				<tr>
                  <td style="border:0px solid;">3.Maintenance of the Building </td>
                   <td style="border:0px solid;">Normal/</td>
				  <td style="border:0px solid;">Poor/</td>
				  <td style="border:0px solid;">Good/</td>
				  <td style="border:0px solid;">Fair/</td>
				  <td style="border:0px solid;">Excellent</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				 
                </tr>
			
				<tr>
                 <td style="border:0px solid;">4.Water Supply Arrangements </td>
                  <td style="border:0px solid;">Yes/No</td>
				  <td style="border:0px solid;">Bore Well/</td>
				  <td style="border:0px solid;">Sump/</td>
				  <td style="border:0px solid;">Panchayat Tap/</td>
				  <td style="border:0px solid;">Well/</td>
				  <td style="border:0px solid;">OHT/</td>
				  <td style="border:0px solid;">Sintex/</td>
                </tr>
				
				<tr>
                 <td style="border:0px solid;">5.Drainage Arrangements </td>
                  <td style="border:0px solid;"> Yes/ No</td>
				  <td style="border:0px solid;">Septic Tank/</td>
				  <td style="border:0px solid;">Open</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  	  <td></td>
                </tr>
				<tr>
                 <td style="border:0px solid;">6.Character of Locality</td>
                  <td style="border:0px solid;">Residential/</td>
				  <td style="border:0px solid;">Commercial/</td>
				  <td style="border:0px solid;">Industrial/</td>
				  <td style="border:0px solid;">Agricultural/</td>
				  <td style="border:0px solid;">Mixed</td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				
                </tr>
				<tr>
                 <td style="border:0px solid;">7.Road Facilities  </td>
                  <td style="border:0px solid;"> Wide:    </td>
				  <td style="border:0px solid;">/Tar/</td>
				  <td style="border:0px solid;">Bitumen/</td>
				  <td style="border:0px solid;">Mud/</td>
				  <td style="border:0px solid;">Cement/</td>
				  <td style="border:0px solid;">Concrete/</td>
				  <td style="border:0px solid;">Mixed</td>
				  	 
                </tr>
				<tr>
                 <td style="border:0px solid;">8.Corner Plot, Intermittent Plot</td>
                  <td style="border:0px solid;">Corener/</td>
				  <td style="border:0px solid;">Intermittent</td>
				 <td style="border:0px solid;"></td>
				 <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  <td style="border:0px solid;"></td>
				  	  
                </tr>
				<tr>
                 <td style="border:0px solid;">9.Floor Finishing</td>
                  <td style="border:0px solid;">Tiles/</td>
				  <td style="border:0px solid;">Moasic/</td>
				  <td style="border:0px solid;">C.M/</td>
				  <td style="border:0px solid;">Granite/</td>
				  <td style="border:0px solid;">Marble/</td>
				  <td style="border:0px solid;">Italian Marble/</td>
				  <td style="border:0px solid;">Co Stone</td>
				  	  
                </tr>
				<tr>
                 <td style="border:0px solid;">10.Joineries </td>
                  <td style="border:0px solid;">C-W/</td>
				  <td style="border:0px solid;">T-W/</td>
				  <td style="border:0px solid;">Steel/</td>
				  <td style="border:0px solid;">Roll-Shutter/</td>
				  <td style="border:0px solid;">U PVC</td>
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
				   <td style="border:0px solid;"></td>
				 
				 
                </tr>
				<tr>
                  <td style="border:0px solid;">2.Drainage Arrangements   </td>
                  <td style="border:0px solid;">-Rs.</td>
				  <td style="border:0px solid;"></td>
				 
                </tr>
				<tr>
                  <td style="border:0px solid;">Compound Wall L-    H-   </td>
                   <td style="border:0px solid;">-Rs.</td>
				
				   <td style="border:0px solid;"></td>
				 
                </tr>
			
				<tr>
                 <td style="border:0px solid;">4.E.B Deposit I-  III- </td>
                  <td style="border:0px solid;"> -Rs.</td>
				   <td style="border:0px solid;"></td>
				
				 
                </tr>
				
				<tr>
                 <td style="border:0px solid;">5.Pavar/ Cement/ Tiles </td>
                  <td style="border:0px solid;"> -Rs.</td>
				 
				   <td style="border:0px solid;"></td>
				
                </tr>
				<tr>
                 <td style="border:0px solid;">6.Sump-    /OHT-  </td>
                  <td style="border:0px solid;"> -Rs.</td>
	
				  <td style="border:0px solid;"></td>
				 
                </tr>
				<tr>
                 <td style="border:0px solid;">7.Interior Work  </td>
                  <td style="border:0px solid;"> -Rs.</td>
			
				  <td style="border:0px solid;"></td>
				 
                </tr>
				<tr>
                 <td style="border:0px solid;">8.Open Staircase </td>
          <td style="border:0px solid;"> -Rs.</td>
				  <td style="border:0px solid;"></td>
				 
		
                </tr>
				
				
               
              </tbody>
            </table>
          </div>
		   </div>
		    <div class="col m6 s12"> </div>
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

 
 