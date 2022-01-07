<?php

if (!isset($active_main_tab))
    $active_main_tab = '';
//die();
?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo base_url() ?>assets/images/library2.JPG" alt="Library Logo" class="" height="70px" width="230px" style="opacity: .8"> <br>
        <span class="brand-text font-weight-light">Library Management <br> System - Gampaha</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">

                <a href="#" class="d-block"> Welcome <?php echo $this->session->userdata('username'); ?> </a>
                <a href="#" class="d-block"> ID : <?php echo $this->session->userdata('id'); ?> </a>
                <a href="#" class="d-block"> Email : <?php echo $this->session->userdata('email'); ?> </a>
                <br>
                <a href="<?php echo base_url() ?>staff/logout" class="d-block"> Logout </a>
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url() ?>" class="nav-link <?php if ($active_tab == 'Dashboard') echo "active" ?>">
                        <i class="fas fa-columns"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview  <?php if ($active_main_tab == 'Users' || $active_tab == 'manageusers') echo "menu-open" ?> ">
                    <a href="#" class="nav-link <?php if ($active_main_tab == 'Users' || $active_tab == 'manageusers') echo "active" ?>">
                        <i class="fas fa-users"></i>
                        <p>
                            Staff Members
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Staff') ?>" class="nav-link <?php if ($active_tab == 'manageusers') echo "active" ?>">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Manage Staff</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item has-treeview  <?php if ($active_main_tab == 'Students' || $active_tab == 'managestudents' || $active_tab == 'membership') echo "menu-open" ?> ">
                    <a href="#" class="nav-link <?php if ($active_main_tab == 'Students' || $active_tab == 'managestudents' || $active_tab == 'membership') echo "active" ?>">
                        <i class="fas fa-users"></i>
                        <p>
                            Students
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Student" class="nav-link <?php if ($active_tab == 'managestudents') echo "active" ?>">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Manage Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Membership" class="nav-link <?php if ($active_tab == 'membership') echo "active" ?>">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Membership Log</p>
                            </a>
                        </li>


                    </ul>
                </li>


                <li class="nav-item has-treeview <?php if ($active_main_tab == 'Books' || $active_tab == 'managebooks' || $active_tab == 'book_copies' || $active_tab == 'borrowbook'  || $active_tab == 'addbooks' || $active_tab == 'issuebooks' || $active_tab == 'returnbooks' || $active_tab == 'borrowedbooks' ||  $active_tab == 'returnpay' ||  $active_tab == 'damagedbooks') echo "menu-open" ?> ">
                    <a href="#" class="nav-link <?php if ($active_main_tab == 'Books' || $active_tab == 'managebooks' || $active_tab == 'book_copies' || $active_tab == 'borrowbook'  || $active_tab == 'addbooks' || $active_tab == 'issuebooks' || $active_tab == 'returnbooks' ||  $active_tab == 'borrowedbooks' ||  $active_tab == 'returnpay' || $active_tab == 'damagedbooks') echo "active" ?>">
                        <i class="fas fa-book"></i>
                        <p>
                            Books
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Book" class="nav-link <?php if ($active_tab == 'managebooks') echo "active" ?>">

                                <i class="fas fa-swatchbook"></i>
                                <p>Manage Books</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Book_copies" class="nav-link <?php if ($active_tab == 'book_copies') echo "active" ?>">

                                <i class="fas fa-swatchbook"></i>
                                <p>Book Copies</p>
                            </a>
                        </li>

                        <li class="nav-header">Daily Transactions</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Borrow_books" class="nav-link <?php if ($active_tab == 'borrowbook') echo "active" ?>">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Borrow Books</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Return_payments" class="nav-link <?php if ($active_tab == 'returnpay') echo "active" ?>">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Late return payments</p>
                            </a>
                        </li>


                        <li class="nav-header">Damaged Books</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Book/damagedbooks" class="nav-link <?php if ($active_tab == 'damagedbooks') echo "active" ?>">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Record Damaged/Lost</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview <?php if ($active_main_tab == 'report1' || $active_tab == 'report2' || $active_tab == 'report3' || $active_tab == 'report4') echo "menu-open" ?> ">
                    <a href="#" class="nav-link <?php if ($active_main_tab == 'report1' || $active_tab == 'report2' || $active_tab == 'report3'  || $active_tab == 'report4') echo "active" ?>">
                        <i class="fas fa-book"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/damagedbooksreport" class="nav-link <?php if ($active_tab == 'report1') echo "active" ?>">

                                <i class="fas fa-swatchbook"></i>
                                <p>Damaged Books Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/studentreport" class="nav-link <?php if ($active_tab == 'report2') echo "active" ?>">

                                <i class="fas fa-swatchbook"></i>
                                <p>Student Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/membershipincomereport" class="nav-link <?php if ($active_tab == 'report3') echo "active" ?>">

                                <i class="fas fa-swatchbook"></i>
                                <p>Membership Income Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>Report/latereturnreport" class="nav-link <?php if ($active_tab == 'report4') echo "active" ?>">

                                <i class="fas fa-swatchbook"></i>
                                <p>Late Return Books Report</p>
                            </a>
                        </li>


                    </ul>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>