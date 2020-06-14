<?php include("header.php");?>
<?php
if($_SESSION['admintype'] != "client")
{
	echo '<script language="javascript">alert("You are no allowed to register Policy.");window.location="index.php";</script>';
	exit;
}
$beg=$_POST["beg"];

if($beg=='')
$beg=$_GET["beg"];

if($beg=='')

$beg=0;


$qry="select * from cars where client_id='".$_SESSION['adminid']."'";
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

$qry.=" order by id limit $beg, ".Rec_PerPage;

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
                        Policies &raquo; List of cars (Total: <?= $total_rec;?>)
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">List of cars</li>
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
                                    <a href="add_car.php" class="plus-icon"><i class="fa fa-plus"></i></a>
                                    <div class="box-tools">
                                        
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <?php /*?><th><input type="checkbox" title="Select/Deselect all records" id="selde" name="selde" class="selde" /></th><?php */?>
                                            <th>#</th>
                                            <th>Registration No.</th>
                                            <th>Car Make</th>
                                            <th>Registration Year</th>
                                            <th>Manufacture Year</th>
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
													$car_register_no = $r["car_register_no"];
													$car_make = $r["car_make"];
													$car_year_register = $r["car_year_register"];
													$car_year_manufacture = $r["car_year_manufacture"];
													$policy_id = $r["policy_id"];
													$is_claim = $r["is_claim"];
													if($is_claim == "y")
													{
														$q="select claim_status from claims where car_id=".$id;
														$rss=mysqli_query($dbz_link,$q);
														if(mysqli_num_rows($rss) > 0)
														{
															$rr=mysqli_fetch_array($rss);
															if($rr["claim_status"] == "n")
															$status="Processing";
															else if($rr["claim_status"] == "a")
															$status="Accepted";
															else if($rr["claim_status"] == "r")
															$status="Rejected";
														}
														else
														{
															$status="N/A";
														}
													}
													else
													{
														$status="N/A";	
													}
													
													
                                                     ?>   
                                                        
                                                        <tr>
                                                        
                                                            <?php /*?><td><input type="checkbox" title="Select/Deselect record" id="rid" name="rid[]" value='<?=$mem_id;?>' class="selde2" /></td><?php */?>
                                                            <td><?= $x22; ?></td>
                                                            <td><?= $car_register_no; ?></td>
                                                            <td><?= $car_make; ?></td>
                                                            <td><?= $car_year_register; ?></td>
                                                            <td><?= $car_year_manufacture; ?></td>
                                                            <td><?= $status; ?></td>                                                        
                                                            <td>
                                                            <?php if($is_claim == 'n'){?> <a href="car_claim.php?id=<?php echo $id; ?>" title="Claim" >Claim Now</a> <?php } else {?>Claimed<?php } ?>
                                                            
                                                            </td>
                                                            
                                                        </tr>
                                                        
										  
										  <?php
														$x22++;
													
												}
											}
											else
											{
												echo '<tr>
												<td colspan=7 >'.$jsc_norec.'</td>
												</tr>';
											}

                                          ?>
                                       
                                        
                                        <tr>
                                        	<td colspan="7" align="center">
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