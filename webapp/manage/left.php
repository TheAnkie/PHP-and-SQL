<style>
.calcurrentdatebg {
	background-color: #33363F;
	border: 1px solid #003366;
	margin-left:4px;
	margin-right:4px;	
	
	color: #FFFFFF;
	font-weight:bold;
}
</style>
<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="#">
                            
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php"><i class="fa fa-angle-double-right"></i>Dashboard </a></li>
                                
                                
                            </ul>
                        </li>
                        
                         <?php if($_SESSION['admintype'] == "client") {?> 
                        <li>
                            <a href="add_car.php">
                                <i class="fa fa-car"></i> <span>Register Policy</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>                            
                        </li>
                        
                        <li>
                            <a href="show_policies.php">
                                <i class="fa fa-book"></i> <span>Claim Policy</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>                            
                        </li>
                        <?php } ?>
                        
                        <?php if($_SESSION['admintype'] == "inspector") {?> 
                        <li>
                            <a href="show_claims.php">
                                <i class="fa fa-book"></i> <span>View Claims</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>                            
                        </li>
                        <?php } ?>
                        
                        <li>
                            <a href="logout.php" onclick="GP_popupConfirmMsg('Do you want to logout?');return document.MM_returnValue">
                                <i class="fa fa-power-off"></i> <span>Sign out</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            
                        </li>
                        
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
 