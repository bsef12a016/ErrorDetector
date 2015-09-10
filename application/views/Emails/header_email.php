<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="admin-themes-lab">
        <meta name="author" content="themes-lab">
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        <title>Make Admin Template &amp; Builder</title>
        <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
        <link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/theme.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
        <script src="<?=base_url()?>public/dashboard_assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- BEGIN PAGE STYLE -->
        <link href="<?=base_url()?>public/dashboard_assets/plugins/charts-morris/morris.min.css" rel="stylesheet">
        <!-- END PAGE STYLE -->
    </head>
    <body class="fixed-topbar fixed-sidebar theme-sdtl color-default mailbox">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section>
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar sidebar-mailbox">
                <div class="logopanel">
                    <h1>
                        <a href="dashboard.html"></a>
                    </h1>
                </div>
                <div class="sidebar-inner">
                    <div class="sidebar-top">   
                        <a href="<?= site_url('AdminDashboard/adminDashboard')?>" class="btn btn-primary btn-compose">Dashboard</a>
                    </div>
                    <ul class="nav nav-sidebar">
                        <li class="tm nav-active active"><a href="<?= site_url('Emails/userMails')?>"><span class="pull-right badge badge-primary">8</span> <i class="icons-office-28"></i><span data-translate="inbpx">User's Mail Inbox</span></a></li>
                        <li class="tm"><a href="<?= site_url('Emails/visitorsMails')?>"><i class="icons-chat-messages-14"></i><span data-translate="portlets">Visitor's Mail Inbox</span></a></li>
                    </ul>
                    <div class="sidebar-charts">
                        <div id="chart-legend"></div>
                        <div id="morris-chart-network" class="morris-full-content"></div>
                    </div>
                    <div class="sidebar-footer clearfix">
                        <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-original-title="Settings">
                            <i class="icon-settings"></i></a>
                        <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-original-title="Fullscreen">
                            <i class="icon-size-fullscreen"></i></a>
                        <a class="pull-left" href="#" data-rel="tooltip" data-original-title="Lockscreen">
                            <i class="icon-lock"></i></a>
                        <a class="pull-left btn-effect" href="#" data-modal="modal-1" data-rel="tooltip" data-original-title="Logout">
                            <i class="icon-power"></i></a>
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
                            <li class="dropdown" id="user-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <!--                        <img src="<?=base_url()?>public/dashboard_assets/images/avatars/user1.png" alt="user image">-->
                                    <span class="username">Hi, John Doe</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><i class="icon-settings"></i><span>Account Settings</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-logout"></i><span>Logout</span></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER DROPDOWN -->
                            <!-- CHAT BAR ICON -->
                            <li id="quickview-toggle"><a href="#"><i class="icon-bubbles"></i></a></li>
                        </ul>
                    </div>
                    <!-- header-right -->
                </div>
                <!-- END TOPBAR -->