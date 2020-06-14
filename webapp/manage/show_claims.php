<?php include("header.php");?>
<?php

if($_SESSION['admintype'] != "inspector")
{
	echo '<script language="javascript">alert("You are no allowed to view claims.");window.location="index.php";</script>';
	exit;
}

$beg=$_POST["beg"];

if($beg=='')
$beg=$_GET["beg"];

if($beg=='')

$beg=0;


$qry="select * from claims where claim_assign_to=".$_SESSION['adminid'];
$res=mysqli_query($dbz_link,$qry);

$end= Rec_PerPage; //define a constant for records per page in connection.php

$total_rec = mysqli_num_rows($res);

if($total_rec >= 1)//for check if no record found

{	
	$total_pages=ceil($total_rec/Rec_PerPage);
	
	if($total_pages == 1)
	{
		$current_page = 1;
		$beg=0;
	}
	else 
	$current_page=floor($beg/Rec_PerPage) +1;
	
	if($total_pages < $current_page)
	{
		$current_page = $total_pages;
		$beg -= Rec_PerPage;
	}
	
	if($beg <= $total_rec){
	
		if($beg + Rec_PerPage < $total_rec)
	
			$end = $beg + Rec_PerPage;
	
		else
	
			$end = $total_rec;	
	
	}//end if
	
}

$qry.=" order by date_added desc limit $beg, ".Rec_PerPage;

$res=mysqli_query($dbz_link,$qry);	

if(isset($_GET['err']))
{
	$err=$_GET['err'];
	$err=base64_decode($err);
	$error=explode("^",$err);
///	echo count($error);
	$errmsg="";
	
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
	//echo $errmsg;
}

?>
<script language="javascript">

function emp_job_del(id)
{
	if(confirm("<?= $jsc_rec_del;?>"))
	{
		window.location='manage_admin.php?act=del&id='+id;
	}
}

function mem_activate(id)
{
	if(confirm("<?= $jsc_admin_active;?>"))
	{
		window.location='manage_admin.php?act=activate&id='+id;
	}
}
function mem_block(id)
{
	if(confirm("<?= $jsc_admin_block;?>"))
	{
		window.location='manage_admin.php?act=block&id='+id;
	}
}

</script>
<script language="JavaScript">
function prevp(beg1)
{
	document.frm.beg.value=(beg1*1)- <?= Rec_PerPage ; ?>;
	document.frm.submit();
}
function nextp(beg1)
{
	document.frm.beg.value=(beg1*1)+ <?= Rec_PerPage ; ?>;
	document.frm.submit();
}
function gotopage()
{
	var abc=document.frm.jumppage.selectedIndex;
	//alert(abc);
	var val=document.frm.jumppage[abc*1].value;
	//alert(val);
	document.frm.beg.value=((val*1)* <?= Rec_PerPage ; ?>)- <?= Rec_PerPage ; ?>;
	//alert(document.frm.beg.value);
	document.frm.submit();
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
                        Claims &raquo; List of Claims (Total: <?= $total_rec;?>)
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">List of Claims</li>
                    </ol>
                </section>

                <!-- Main content -->
                <form method="get" name="frm" id="frm">
                <section class="content">
					
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="box">
                            
                                                        
                            <?php	if($errmsg !=""){ ?>
                                  
                                    <?php include("errors.php"); ?>
                                                        
                                <?php } ?>
                                
                                <div class="box-header">
                                    
                                    <div class="box-tools">
                                        
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <?php /*?><th><input type="checkbox" title="Select/Deselect all records" id="selde" name="selde" class="selde" /></th><?php */?>
                                            <th>#</th>
                                            <th>Client</th>
                                            <th>Registration No.</th>
                                            <th>Car Make</th>
                                            <th>Registration Year</th>
                                            <th>Date Claim</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                        
                                        <?php
										  if(mysqli_num_rows($res) > 0)
											{
												$x22=$beg + 1;
												$counter = 1;
												while($r=mysqli_fetch_array($res))
												{
													if($x22 %2 ==1)
													{
														$cls="row1";
													}
													else
													{
														$cls="row2";
													}
													$id = $r["id"];							
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
														
														$q3="select client_name from clients where client_id=".$client_id;
														$rs3=mysqli_query($dbz_link,$q3);
														if(mysqli_num_rows($rs3) > 0)
														{
															$r3=mysqli_fetch_array($rs3);
															
															$client_name = $r3["client_name"];
															
														}
														
														
													}
													
                                                     ?>   
                                                        
                                                        <tr>
                                                        
                                                            <?php /*?><td><input type="checkbox" title="Select/Deselect record" id="rid" name="rid[]" value='<?=$mem_id;?>' class="selde2" /></td><?php */?>
                                                            <td><?= $x22; ?></td>
                                                            <td><?= $client_name; ?></td>
                                                            <td><?= $car_register_no; ?></td>
                                                            <td><?= $car_make; ?></td>
                                                            <td><?= $car_year_register; ?></td>
                                                            <td><?= formatdt($date_added); ?></td>
                                                             <td><?= $status; ?></td>                                                       
                                                            <td>
                                                            <a href="view_claim.php?id=<?php echo $id; ?>" title="View Claim" >View Claim</a>
                                                            
                                                            </td>
                                                            
                                                        </tr>
                                                        
										  
										  <?php
														$x22++;
													
												}
											}
											else
											{
												echo '<tr>
												<td colspan=8 >'.$jsc_norec.'</td>
												</tr>';
											}

                                          ?>
                                       
                                        
                                        <tr>
                                        	<td colspan="8" align="center">
                                            <input name="beg" type="hidden" id="beg" value="<?= $beg; ?>" />
                                                <input name="act" type="hidden" id="act" />
                                            <?php

																		if($beg > 0)
											
																		echo "<input type=\"button\" name=\"Button\" value=\"Previous\" class=\"btn btn-primary\" onClick=\"javascript:prevp('$beg')\">";
																		else
																		echo "<input type=\"button\" name=\"Button\" value=\"Previous\" class=\"btn btn-primary\" onClick=\"javascript:prevp('$beg')\" disabled>";
										
																	?>
                    &nbsp;&nbsp;
                    <? if($total_rec > 0) {?>
                    <select name="jumppage" onchange="gotopage()">
                      <?php
						
												  for($x=1; $x <= $total_pages; $x++)
						
												  {
						
													if($x==$current_page){
						
														echo "<OPTION value=\"$x\" selected>$x</OPTION>";
						
														}
						
													else
						
														{
						
														echo "<OPTION value=\"$x\">$x</OPTION>";
						
														}
						
												  }						  	
						
												  ?>
                    </select>
                    &nbsp;of
                    <?= $total_pages; ?>
                    <? } ?>
                    &nbsp;&nbsp;
                    <?php
						
										if($end < $total_rec)
		
											echo "<input type=\"button\" name=\"Submit5\" value=\"Next\" class=\"btn btn-primary\" onClick=\"javascript:nextp($beg)\">";
										else
											echo "<input type=\"button\" name=\"Submit5\" value=\"Next\" class=\"btn btn-primary\" onClick=\"javascript:nextp($beg)\" disabled>";
		
								  ?>
                                            </td>
                                        </tr>
                                        
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div><!-- /.row -->
                    
                   
                </section><!-- /.content -->
                </form>
            </aside><!-- /.right-side -->
<?php
unset($_SESSION['frm']);
?>

<?php include("footer.php");?>