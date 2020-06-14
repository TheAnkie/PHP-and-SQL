<?php include("header.php");?>
<?php

if($_SESSION['admintype'] != "inspector")
{
	echo '<script language="javascript">alert("You are no allowed to view claims.");window.location="index.php";</script>';
	exit;
}

$id=$_GET['id'];

$qry="select * from claims where claim_assign_to=".$_SESSION['adminid']." and id='".$id."'";
$res=mysqli_query($dbz_link,$qry);
if(mysqli_num_rows($res) > 0)
{
	$r=mysqli_fetch_array($res);
	
	$claim_id = $r["id"];							
	$car_id = $r["car_id"];
	$accident_date = $r["accident_date"];
	$damage = $r["damage"];
	$date_added = $r["date_added"];
	$claim_status = $r["claim_status"];
	
	if($claim_status == "n")
	$status="Processing";
	else if($claim_status == "a")
	$status="Accepted";
	else if($claim_status == "r")
	$status="Rejected";
	else
	$status="Processing";
	
	$q2="select * from cars where id=".$car_id;
	$rs2=mysqli_query($dbz_link,$q2);
	if(mysqli_num_rows($rs2) > 0)
	{
		$r2=mysqli_fetch_array($rs2);
		
		$client_id = $r2["client_id"];
		$car_register_no = $r2["car_register_no"];
		$car_make = $r2["car_make"];
		$car_year_register = $r2["car_year_register"];
		$car_year_manufacture = $r2["car_year_manufacture"];
		$policy_id = $r2["policy_id"];
		
		$q3="select * from clients where client_id=".$client_id;
		$rs3=mysqli_query($dbz_link,$q3);
		if(mysqli_num_rows($rs3) > 0)
		{
			$r3=mysqli_fetch_array($rs3);
			
			$client_id = $r3["client_id"];
			$client_name = $r3["client_name"];
			$client_phone = $r3["client_phone"];
			$client_email = $r3["client_email"];
			
		}
	
		$q21="select policy_detail from policies where id=".$policy_id;
		$res21=mysqli_query($dbz_link,$q21);
		if(mysqli_num_rows($res21) > 0)
		$r21=mysqli_fetch_array($res21);
		
		$policy=$r21["policy_detail"];
	}
}
else
{
	echo '<script language="javascript">alert("Invalid claim.");window.location="index.php";</script>';
	exit;
}

$errmsg="";

if(isset($_GET['err']))
{
	$err=$_GET['err'];
	$err=base64_decode($err);
	$error=explode("^",$err);
///	echo count($error);
	
	
	for($x=0;$x<count($error)-1;$x++)
	{
		//echo $error[$x];
		if($errmsg =="")
		{
			$errmsg=$msg_arr[$error[$x]];
		}
		else
		$errmsg .="<br>".$msg_arr[$error[$x]];
	}
	
}
?>
<script language="javascript">
function accept_claim(id)
{
	if(confirm("Are you sure to accept this claim?"))
	{
		window.location='manage_claims.php?act=accept&id='+id;
	}
}
function reject_claim(id)
{
	if(confirm("Are you sure to reject this claim?"))
	{
		window.location='manage_claims.php?act=reject&id='+id;
	}
}

</script>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include("left.php");?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Claims
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Claim detail</li>
                    </ol>
                </section>

                <!-- Main content -->
                <form action="" method="post" enctype="multipart/form-data" name="frm" id="frm">
                <section class="content">
					
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <?php /*?><ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Contents</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Meta Tags</a></li>
                                                                       
                                </ul><?php */?>
                                <div class="tab-content">
                                <?php	if($errmsg !=""){ ?>
                                  
                                    <?php include("errors.php"); ?>
                                                        
                                <?php } ?>	
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                    
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Please see details below:</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               
                                    <div class="box-body">
                                        <div class="form-group col-md-4 bg-aqua">
                                            <label for="client_id">Client ID:<br />
                                            <?php echo $client_id; ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-4 bg-aqua">
                                            <label for="client_name">Client Name:<br />
                                            <?php echo $client_name; ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-4 bg-aqua">
                                            <label for="client_email">Client Email:<br />
                                            <?php echo $client_email; ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-4 bg-teal">
                                            <label for="car_register_no">Registration Number of Car:<br />
                                            <?php echo $car_register_no; ?>
                                            </label>
                                            
                                        </div>
                                        <div class="form-group col-md-4 bg-teal">
                                            <label for="car_make">Make of Car:<br />
                                            <?php echo $car_make; ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-4 bg-teal">
                                            <label for="car_year_register">Year Registered:<br />
                                            <?php echo $car_year_register; ?></label>
                                            
                                        </div>
                                        
                                        <div class="form-group col-md-4 bg-teal">
                                            <label for="car_year_manufacture">Year of Manufacture:<br />
                                            <?php echo $car_year_manufacture; ?></label>
                                            
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-8 bg-teal">
                                            <label for="policy">Selected Policy:<br />
                                            <?php echo $policy; ?></label>
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group col-md-12 bg-gray">
                                            <label for="accident_date">Accident Date:<br />
                                            <?php echo formatdt($accident_date); ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-12 bg-gray">
                                            <label for="damage">Damage in Percentage:<br />
                                            <?php echo $damage; ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-12 bg-gray">
                                            <label for="date_added">Claim Date:<br />
                                            <?php echo formatdt($date_added); ?></label>
                                            
                                        </div>
                                        <div class="form-group bg-gray">
                                            <label for="status">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claim Status:<br />
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $status; ?></label>
                                            
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    
                               
                            </div><!-- /.box -->

                            

                        </div><!--/.col (left) -->

                    </div>   <!-- /.row -->
                    
                                    </div><!-- /.tab-pane -->
                                    
                                    
                                <div class="box-footer">
                                <input name="id" type="hidden" id="id" value="<?php echo $_GET["id"];?>" />
                                <?php if($claim_status == "n"){?>
                                <button type="button" class="btn btn-success" onClick="javascript:accept_claim('<?php echo $_GET["id"];?>')">Accept</button>
                                        <button type="button" class="btn btn-danger" onClick="javascript:reject_claim('<?php echo $_GET["id"];?>')">Reject</button>
                                <?php } ?>
                                        <button type="button" class="btn btn-primary" onClick="javascript:window.location='show_claims.php';">Back</button>
                                    </div>
                                
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->

                    </div> <!-- /.row -->
                    
                </section><!-- /.content -->
                </form>
            </aside><!-- /.right-side -->
<?php
unset($_SESSION['frm']);
?>
<?php include("footer.php");?>