<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="<?=base_url()?>public/dashboard_assets/images/favicon.png" type="image/png">
    <title>Make Admin Template &amp; Builder</title>
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
<!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
<!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
<!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
<!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
<!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
<!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
<!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
<!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
<!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->
<!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
<!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->
<!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
<!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
<!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
<!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
<!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
<!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
<!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
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
                            <h4>Mike Mayers</h4>

                        </div>
                    </div>
                </div>
                <ul class="nav nav-sidebar">
                    <li class=" nav-active active">
                        <a href="<?= site_url('Dashboard/projects')?>"><i class="icon-home"></i><span data-translate="dashboard">Projects</span></a>
                    </li>
                    <li class="">
                        <a href="<?= site_url('Dashboard/settings')?>"><i class="icon-settings"></i><span data-translate="dashboard">Settings</span></a>
                    </li>
                    <li class="">
                        <a href="<?= site_url('/')?>"><i class="icon-docs"></i><span data-translate="dashboard">Docs</span></a>
                    </li>
                    <li class="">
                        <a href="<?= site_url('Home/tour')?>"><i class="icon-home"></i><span data-translate="dashboard">Any Other</span></a>
                    </li>
                </ul>
                <!-- SIDEBAR WIDGET FOLDERS -->
                <div class="sidebar-footer clearfix">
                    <a class="pull-left footer-settings"  data-rel="tooltip" data-placement="top" data-original-title="Add New Project" href="<?= site_url('Dashboard/addProject')?>">
                        <i class="icon-plus"></i>
                    </a>
                    <a class="pull-left footer-settings" href="<?= site_url('Dashboard/settings')?>" data-rel="tooltip" data-placement="top" data-original-title="Settings">
                        <i class="icon-settings"></i>
                    </a>
                    <a class="pull-left btn-effect" href="#" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
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
                    </div>
                </div>
                <div class="header-right">
                    <ul class="header-menu nav navbar-nav">
                        <!-- BEGIN USER DROPDOWN -->
                        <li class="dropdown" id="user-header">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="<?=base_url()?>public/dashboard_assets/images/avatars/user1.png" alt="user image">
                                <span class="username">Hi,
                                    <?php
                                    $session=  $this->session->all_userdata();
                                    if($session["username"])
                                    {
                                        print_r($session["username"]);    
                                    }
                                    ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-calendar"></i><span>My Calendar</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-settings"></i><span>Account Settings</span></a>
                                </li>
                                <li>
                                    <a href="<?= site_url('/')?>"><i class="icon-logout"></i><span>Logout</span></a>
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