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
                        Add Car / Select Policy
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Car / Select Policy</li>
                    </ol>
                </section>

                <!-- Main content -->
                <form action="confirm_car.php" method="post" enctype="multipart/form-data" name="frm" id="frm">
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
                                    &nbsp;
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               
                                    <div class="box-body">
                                        <?php $q="select * from policies";
											  $rs=mysqli_query($dbz_link,$q);
											  if(mysqli_num_rows($rs) > 0)
											  {
													while($r=mysqli_fetch_array($rs))
													{
													?>
                                                    <div class="form-group">
                                            <label><input name="policy_id" id="policy_id" type="radio" class="form-control" value="<?php echo $r["id"];?>"> <?php echo $r["policy_detail"];?></label>                                            
                                        </div>
                                                    <?php	
													}
													
													
											  }	
										  ?>	  
                                     
                                     <div><br />
                                     <h4>Policies Details:</h4>
                                    <a href="img/1.jpg" target="_blank">View Liability Coverage</a><br />
                                    <a href="img/2.jpg" target="_blank">View Uninsured and Underinsured Motorist Coverage</a><br />
                                    <a href="img/3.jpg" target="_blank">View Comprehensive Coverage</a><br />
                                    <a href="img/4.jpg" target="_blank">View Collision Coverage</a><br />
                                    
                                    
                                    </div>   
                                    </div><!-- /.box-body -->

                                    
                               
                            </div><!-- /.box -->

                            

                        </div><!--/.col (left) -->

                    </div>   <!-- /.row -->
                    
                                    </div><!-- /.tab-pane -->
                                    
                                    
                                <div class="box-footer">
                                <input name="act" type="hidden" id="act" value="add" />
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
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