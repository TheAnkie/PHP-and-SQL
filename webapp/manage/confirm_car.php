<?php include("header.php");?>
<?php

if($_SESSION['admintype'] != "client")
{
	echo '<script language="javascript">alert("You are no allowed to register Policy.");window.location="index.php";</script>';
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
                        Confirm Add Car 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Confirm Add Car</li>
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
                                    <h3 class="box-title">Please see/confirm deails below:</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               
                                    <div class="box-body">
                                        
                                        <div class="form-group">
                                            <label for="car_register_no">Registration Number of Car:</label>
                                            <input name="car_register_no" type="text" class="form-control" id="car_register_no" value="<?php echo $_SESSION['car_register_no']; ?>" placeholder="Registration Number of Car" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="car_make">Make of Car:</label>
                                            <input name="car_make" type="text" class="form-control" id="car_make" value="<?php echo $_SESSION['car_make']; ?>" placeholder="Make of Car" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="car_year_register">Year Registered:</label>
                                            <input name="car_year_register" type="text" class="form-control" id="car_year_register" value="<?php echo $_SESSION['car_year_register']; ?>" placeholder="Year Registered" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Client ID:</label>
                                            <input name="username" type="text" class="form-control" id="username" value="<?php echo $_SESSION['adminid']; ?>" placeholder="Client ID" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="car_year_manufacture">Year of Manufacture:</label>
                                            <input name="car_year_manufacture" type="text" class="form-control" id="car_year_manufacture" value="<?php echo $_SESSION['car_year_manufacture']; ?>" placeholder="Year of Manufacture" readonly />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="car_year_manufacture">Selected Policy: <br >
                                            <?php $q="select * from policies where id='".$_POST['policy_id']."'";
											  $rs=mysqli_query($dbz_link,$q);
											  if(mysqli_num_rows($rs) > 0)
											  {
													while($r=mysqli_fetch_array($rs))
													{
													 echo $r["policy_detail"];
                                                    
													}
													
													
											  }	
										  ?>
                                            
                                            </label>
                                            <?php
											$_SESSION['policy_id'] = $_POST['policy_id'];
											?>
                                                                                        
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    
                               
                            </div><!-- /.box -->

                            

                        </div><!--/.col (left) -->

                    </div>   <!-- /.row -->
                    
                                    </div><!-- /.tab-pane -->
                                    
                                    
                                <div class="box-footer">
                                <input name="act" type="hidden" id="act" value="add2" />
                                        <button type="submit" class="btn btn-success">Confirm</button>
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