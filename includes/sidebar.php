    
    
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="row">
                    <div class="col-6">
                            <img src= "\assets\PUBLIC WEBSITE\images\logo.png"/ style="margin-left: -25px">
                    </div>
                    <div class="col-6" style="margin-left: -55px;margin-top: 10px">   
                            <h3 style="color:white"><?=$app_title ?></h3> 
                    </div>      
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner" style="width: 100%!important">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="<?=urlHas(getURL(),"index")?>">
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                                
                                   
                            </li>
                            <?php
                                if($_SESSION['user']['isAdmin']){
                            ?>
                            <li class="<?=urlHas(getURL(),"account")?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Accounts
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="accounts.php">View Accounts</a></li>
                                    <li><a href="create_account.php">Create Account</a></li>
                                </ul>
                            </li>
                            <?php 
                            }
                            ?>
                            <?php
                                if($_SESSION['user']['isAdmin']){
                            ?>                            
                            <li class="<?=urlHas(getURL(),"disease")?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Diseases</span></a>
                                <ul class="collapse">
                                    <li><a href="diseases.php">View Diseases</a></li>
                                    <li><a href="create_disease.php">Add Discovered Disease</a></li>
                                </ul>
                            </li>
                            <?php 
                            }
                            ?>
                            <li class="<?=urlHas(getURL(),"record")?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Records</span></a>
                                <ul class="collapse">
                                    <li><a href="records.php">View Records</a></li>
                                    <li><a href="create_record.php">Add New Record</a></li>
                                </ul>
                            </li>
                            <?php
                                if($_SESSION['user']['isAdmin']){
                            ?>                            
                            <li class="<?=urlHas(getURL(),"hospital")?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-column4-alt"></i><span>Hospital</span></a>
                                <ul class="collapse">
                                    <li><a href="hospitals.php">View Hospital</a></li>
                                    <li><a href="create_hospital.php">Add New Hospital</a></li>
                                </ul>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="<?=urlHas(getURL(),"tip")?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Health Knowledge</span></a>
                                <ul class="collapse">
                                    <li><a href="tips.php">View Tips</a></li>
                                    <li><a href="create_tip.php">Add New Tip</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-gear"></i>
                                    <span>Settings</span></a>
                                <ul class="collapse">
                                <?php
                                    if($_SESSION['user']['isAdmin']){
                                ?>
                                    <li><a href="setup.php">Set Up</a></li>
                                <?php 
                                }
                                ?>
                                    <li class="changePassword"><a href="#changePass">Change Password</a></li>
                                    <li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->


