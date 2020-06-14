<?php include("header.php");?>
<?php

if($_SESSION['admintype'] != "client")
{
	echo '<script language="javascript">alert("You are no allowed to claim Policy.");window.location="index.php";</script>';
	exit;
}

$id=$_GET['id'];

$qry="select * from cars where client_id='".$_SESSION['adminid']."' and id='".$id."'";
$res=mysqli_query($dbz_link,$qry);
if(mysqli_num_rows($res) > 0)
{
	$r=mysqli_fetch_array($res);
	
	if($r["is_claim"]=="y")
	{
		echo '<script language="javascript">alert("Invalid claim.");window.location="show_policies.php";</script>';
		exit;
	}
	
	$q2="select policy_detail from policies where id=".$r["policy_id"];
	$res2=mysqli_query($dbz_link,$q2);
	if(mysqli_num_rows($res2) > 0)
	$r2=mysqli_fetch_array($res2);
	
	$policy=$r2["policy_detail"];
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

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include("left.php");?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Claim
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Claim</li>
                    </ol>
                </section>

                <!-- Main content -->
                <form action="manage_cars.php" method="post" enctype="multipart/form-data" name="frm" id="frm">
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
                                        <div class="form-group col-md-12">
                                            <label for="username">Client ID:<br />
                                            <?php echo $_SESSION['adminid']; ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="car_register_no">Registration Number of Car:<br />
                                            <?php echo $r["car_register_no"]; ?>
                                            </label>
                                            
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="car_make">Make of Car:<br />
                                            <?php echo $r["car_make"]; ?></label>
                                            
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="car_year_register">Year Registered:<br />
                                            <?php echo $r["car_year_register"]; ?></label>
                                            
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label for="car_year_manufacture">Year of Manufacture:<br />
                                            <?php echo $r["car_year_manufacture"]; ?></label>
                                            
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-4">
                                            <label for="policy">Selected Policy:<br />
                                            <?php echo $policy; ?></label>
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <label for="accident_date">Accident Date:*</label>
                                            <input name="accident_date" type="text" class="form-control datepicker" id="accident_date" value="<?php echo $accident_date; ?>" placeholder="Accident Date" />
                                        </div>
                                        <div class="form-group">
                                            <label for="damage">Damage in Percentage:*</label>
                                            <input name="damage" type="text" class="form-control" id="damage" value="<?php echo $damage; ?>" placeholder="Damage" />
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    
                               
                            </div><!-- /.box -->

                            

                        </div><!--/.col (left) -->

                    </div>   <!-- /.row -->
                    
                                    </div><!-- /.tab-pane -->
                                    
                                    
                                <div class="box-footer">
                                <input name="act" type="hidden" id="act" value="add_claim" />
                                <input name="id" type="hidden" id="id" value="<?php echo $_GET["id"];?>" />
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-primary" onClick="javascript:history.go(-1);">Back</button>
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