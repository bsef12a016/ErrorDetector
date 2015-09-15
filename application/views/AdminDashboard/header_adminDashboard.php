<?php
 $session=  $this->session->all_userdata();
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="admin-themes-lab">
        <meta name="author" content="themes-lab">
        <link rel="shortcut icon" type="image/png" href="<?=base_url()?>public/assets/base/img/content/misc/js1.png" />
        <title>Dashboard - jErrors - JavaScript Error Tracking for Modern Web</title>
        <link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/theme.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
        <!-- BEGIN PAGE STYLE -->
        <link href="<?=base_url()?>public/dashboard_assets/plugins/metrojs/metrojs.min.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
        <!-- END PAGE STYLE -->
        <script src="<?=base_url()?>public/dashboard_assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
            
        <!-- BEGIN PAGE STYLE -->
        <link href="<?= base_url()?>public/dashboard_assets/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
    </head>
    <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section>
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar">
                <div class="logopanel">
                    <h1>
                        <a href="dashboard.html"></a>
                    </h1>
                </div>
                <div class="sidebar-inner">
                    <div class="sidebar-top">
                        <form action="search-result.html" method="post" class="searchform" id="search-results">
                            <input type="text" class="form-control" name="keyword" placeholder="Search...">
                        </form>
                        <div class="userlogged clearfix">
                            <i class="icon icons-faces-users-01"></i>
                            <div class="user-details">
                                <h4><?php
                                    $session=  $this->session->all_userdata();
                                    if($session[USER_NAME])
                                    {
                                        print_r($session[USER_NAME]);    
                                    }
                                    ?></h4>
                                        
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-sidebar">
                        <li class=" nav-active active">
                            <a href="<?= site_url('AdminDashboard/adminDashboard')?>"><i class="fa fa-dashboard"></i><span data-translate="dashboard">Dashboard</span></a>
                        </li>
                        <li class="">
                            <a href="<?= site_url('AdminDashboard/graphs')?>"><i class="icon-bar-chart"></i><span data-translate="dashboard">Graph</span></a>
                        </li>
                        <li class="">
                            <a href="<?= site_url('Emails/userMails')?>"><i class="octicon octicon-mail-read"></i><span data-translate="Mailbox">Mailbox</span></a>
                        </li>
                        <!--                        <li class="nav-parent">
                                                    <a href=""><i class="icon-basket"></i><span data-translate="pages">eCommerce </span><span class="fa arrow"></span></a>
                                                    <ul class="children collapse">
                                                        <li><a href="ecommerce-cart.html"> Shopping Cart</a></li>
                                                        <li><a href="ecommerce-invoice.html"> Invoice</a></li>
                                                        <li><a href="ecommerce-pricing-table.html"><span class="pull-right badge badge-success">5</span> Pricing Table</a></li>
                                                    </ul>
                                                </li>-->
                    </ul>
                    <!-- SIDEBAR WIDGET FOLDERS -->
                    <div class="sidebar-footer clearfix">
                        <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                        <a class="pull-left btn-effect" href="<?= site_url('AdminDashboard/logout')?>" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
                            <i class="icon-power"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR -->
                
            <div class="main-content">
                <!-- BEGIN TOPBAR -->
                <div class="topbar">
                    <div class="header-left">
                        <div class="topnav">
                            <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                            <ul class="nav nav-icons">
                                <li><a href="<?= site_url('AdminDashboard/adminDashboard')?>" class=""><span class="fa fa-dashboard"></span></a></li>
                                <li><a href="<?= site_url('Emails/userMails')?>"><span class="octicon octicon-mail-read"></span></a></li>
                                <li><a href="<?= site_url('AdminDashboard/graphs')?>"><span class="octicon octicon-graph"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="header-menu nav navbar-nav">
                            <!-- BEGIN USER DROPDOWN -->
                            <li class="dropdown" id="user-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
    <!--                                <img src="<?=base_url()?>public/dashboard_assets/images/avatars/user1.png" alt="user image">-->
                                    <span class="username">Hi,
                                    <?php
                                    $session=  $this->session->all_userdata();
                                    if($session[USER_NAME])
                                    {
                                        print_r($session[USER_NAME]);    
                                    }
                                    ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!--                                    <li>
                                                                            <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><i class="icon-calendar"></i><span>My Calendar</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="<?= site_url('Dashboard/accountSettings')?>"><i class="icon-settings"></i><span>Account Settings</span></a>
                                                                        </li>-->
                                    <li>
                                        <a href="<?= site_url('AdminDashboard/logout')?>"><i class="icon-logout"></i><span>Logout</span></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER DROPDOWN -->
                            <!-- CHAT BAR ICON -->
                        </ul>
                    </div>
                    <!-- header-right -->
                </div>
                <!-- END TOPBAR -->