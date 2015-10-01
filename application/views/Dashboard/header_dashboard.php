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
        <link href="<?=base_url()?>public/dashboard_assets/css/chartist.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/theme.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
        <!-- BEGIN PAGE STYLE -->
        <link href="<?=base_url()?>public/dashboard_assets/plugins/metrojs/metrojs.min.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
        <!-- END PAGE STYLE -->
        <script src="<?=base_url()?>public/assets/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/js/chartist.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/highstock.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/charts-highstock/js/modules/exporting.min.js"></script> <!-- Financial Charts Export Tool -->
        <!-- BEGIN PAGE STYLE -->
        <link href="<?= base_url()?>public/dashboard_assets/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
    </head>
    <!-- BEGIN BODY -->
    <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section>
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar">
                <div class="logopanel">
                    <h1>
                        <a href=""></a>
                    </h1>
                </div>
                <div class="sidebar-inner">
                    <div class="sidebar-top">
                        <div class="userlogged clearfix">
                            <i class="icon icons-faces-users-01"></i>
                            <div class="user-details">
                                <h4><?php
                                    $session=  $this->session->all_userdata();
                                    if($session[USER_NAME])
                                    {
                                        print_r(ucwords($session[USER_NAME]));    
                                    }
                                    ?></h4>
                                        
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-sidebar">
                        <li class=" nav-active active">
                            <a href="<?= site_url('Dashboard/projects')?>"><i class="fa fa-laptop"></i><span data-translate="dashboard">Projects</span></a>
                        </li>
                    <?php
                    if($session[PROJECT_OPEN_STATUS] == PROJECT_OPEN_STATUS_TRUE){
                        
                        $href = 'Dashboard/settings/';
                        $href .= $session[USER_ID];
                        $href .= '/';
                        $href .= $session[PROJECT_ID];
                            
                        $href_graph = 'Dashboard/projectGraph/';
			$href_graph .= $session[USER_ID];
                        $href_graph .= '/';
                        $href_graph .= $session[PROJECT_ID];
                            
                        $href_table = 'Dashboard/tabularview/';
                        $href_table .= $session[USER_ID];
                        $href_table .= '/';
                        $href_table .= $session[PROJECT_ID];
                            
                            
                        $href_mainView = 'Dashboard/userDashboard/';
                        $href_mainView .= $session[USER_ID];
                        $href_mainView .= '/';
                        $href_mainView .= $session[PROJECT_ID];
                            
                    ?>
                        <li class="">
                            <a href="<?= site_url($href_mainView)?>"><i class="fa fa-cubes"></i><span data-translate="medias manager">Main View</span></a>
                        </li>
                        <li class="">
                            <a href="<?= site_url($href_table)?>"><i class="fa fa-table"></i><span data-translate="medias manager">Tabular View</span></a>
                        </li>
                        <li class="">
                            <a href="<?= site_url($href_graph)?>"><i class="icon-bar-chart"></i><span data-translate="dashboard">Graph</span></a>
                        </li>
                        <li class="">
                            <a href="<?= site_url($href)?>"><i class="icon-settings"></i><span data-translate="dashboard">Settings</span></a>
                        </li>
                    <?php
                    }
                    ?>
                        
                        <li class="">
                            <a href="<?= site_url('Home/docs')?>" target="_blank"><i class="icon-docs"></i><span data-translate="dashboard">Docs</span></a>
                        </li>
                        <li class="">
                            <a href="<?= site_url('Dashboard/contactus')?>"><i class="icon-docs"></i><span data-translate="pages">Contact Us</span></a>
                        </li>
                    </ul>
                    <!-- SIDEBAR WIDGET FOLDERS -->
                    <div class="sidebar-footer clearfix">
                        <a class="pull-left footer-settings"  data-rel="tooltip" data-placement="top" data-original-title="Add New Project" href="<?= site_url('Dashboard/addProject')?>">
                            <i class="icon-plus"></i>
                        </a>
                        <a class="pull-left footer-settings" href="<?= site_url('Dashboard/accountSettings')?>" data-rel="tooltip" data-placement="top" data-original-title="Account Settings">
                            <i class="icon-settings"></i>
                        </a>
                        <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                        <a class="pull-left btn-effect" href="<?= site_url('Dashboard/logout')?>" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
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
                                <li><a href="<?= site_url('Dashboard/projects')?>" class=""><span class="fa fa-laptop"></span></a></li>
                        <?php
                            if($session[PROJECT_OPEN_STATUS] == PROJECT_OPEN_STATUS_TRUE){
                                $href_graph = 'Dashboard/projectGraph/';
                                $href_graph .= $session[USER_ID];
                                $href_graph .= '/';
                                $href_graph .= $session[PROJECT_ID];
                        ?>
                                <li><a href="<?= site_url($href_table) ?>" class=""><span class="fa fa-table"></span></a></li>
                                <li><a href="<?= site_url($href_graph) ?>" class=""><span class="octicon octicon-graph"></span></a></li>
                        <?php
                            }
                        ?>
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
                                        print_r(ucwords($session[USER_NAME]));    
                                    }
                                    ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?= site_url('Dashboard/accountSettings')?>"><i class="icon-settings"></i><span>Account Settings</span></a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('Dashboard/logout')?>"><i class="icon-logout"></i><span>Logout</span></a>
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