<?php
    $session=  $this->session->all_userdata();
    $temp=$userMails_months[0];
    $i=0;
    $count=array();
    $count[0]=0;
    foreach($userMails_months as $value){
        if($value==$temp){
            $count[$i]++;   
        }
        else{
            $i++;
            $count[$i]=1;
            $temp=$value;
        }
//array is already sorted and diff dates are indexed at:
// $index=0, $index=index+count[i]   
    }    
    $index=0;
    $each_month=array();
    foreach ($count as $x){
        $each_month[]=$userMails_months[$index];
        $index=$index+$x;
    }
    $all_months=array();
    $points1=array();
    $flag=true;
    for($i=1;$i<13;$i++){
        $all_months[]=date('0'.$i);
        for($j=0;$j<sizeof($each_month);$j++){
            if($all_months[$i-1]===$each_month[$j]){
                $flag=false;
                $points1[$i-1]=$count[$j];
            }
        }
        if($flag===true){
            $points1[$i-1]=0;
        }
        else {
            $flag=true;
        }
    }
    $temp=$visitorMails_months[0];
    $i=0;
    $count=array();
    $count[0]=0;
    foreach($visitorMails_months as $value){
        if($value==$temp){
            $count[$i]++;   
        }
        else{
            $i++;
            $count[$i]=1;
            $temp=$value;
        }
//array is already sorted and diff dates are indexed at:
// $index=0, $index=index+count[i]   
    }    
    $index=0;
    $each_month=array();
    foreach ($count as $x){
        $each_month[]=$visitorMails_months[$index];
        $index=$index+$x;
    }
    $all_months=array();
    $points2=array();
    $flag=true;
    for($i=1;$i<13;$i++){
        $all_months[]=date('0'.$i);
        for($j=0;$j<sizeof($each_month);$j++){
            if($all_months[$i-1]===$each_month[$j]){
                $flag=false;
                $points2[$i-1]=$count[$j];
            }
        }
        if($flag===true){
            $points2[$i-1]=0;
        }
        else {
            $flag=true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="admin-themes-lab">
        <meta name="author" content="themes-lab">
        <link rel="shortcut icon" type="image/png" href="<?=base_url()?>public/assets/base/img/content/misc/js1.png" />
        <title>Email's - jErrors - JavaScript Error Tracking for Modern Web</title>
        <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
        <link href="<?=base_url()?>public/dashboard_assets/css/style.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/theme.css" rel="stylesheet">
        <link href="<?=base_url()?>public/dashboard_assets/css/ui.css" rel="stylesheet">
        <script src="<?=base_url()?>public/dashboard_assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/charts-morris/raphael.min.js"></script> <!-- Morris Charts -->
        <script src="<?=base_url()?>public/dashboard_assets/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?=base_url()?>public/dashboard_assets/plugins/charts-morris/morris.min.js"></script>
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
                        <a href=""></a>
                    </h1>
                </div>
                <div class="sidebar-inner">
                    <div class="sidebar-top">   
                        <a href="<?= site_url('AdminDashboard/adminDashboard')?>" class="btn btn-primary btn-compose">Dashboard</a>
                    </div>
                    <ul class="nav nav-sidebar">
                        <?php
                        if($session[USER_EMAIL_STATUS] != USER_EMAIL_STATUS_TRUE ){
                        ?>
                        <li class="tm active"><a href="<?= site_url('Emails/userMails')?>"><span class="pull-right badge badge-primary"></span> <i class="icons-office-28"></i><span data-translate="inbpx">User's Mail Inbox</span></a></li>
                        <li class="tm"><a href="<?= site_url('Emails/visitorsMails')?>"><i class="icons-chat-messages-14"></i><span data-translate="portlets">Visitor's Mail Inbox</span></a></li>
                        <?php
                        }else{
                        ?>
                        <li class="tm "><a href="<?= site_url('Emails/userMails')?>"><span class="pull-right badge badge-primary"></span> <i class="icons-office-28"></i><span data-translate="inbpx">User's Mail Inbox</span></a></li>
                        <li class="tm active"><a href="<?= site_url('Emails/visitorsMails')?>"><i class="icons-chat-messages-14"></i><span data-translate="portlets">Visitor's Mail Inbox</span></a></li>
                        <?php
                        }
                        ?>
                        
                    </ul>
                    <div class="sidebar-charts">
                        <div id="chart-legend"></div>
                        <div id="morris-chart-network" class="morris-full-content"></div>
                    </div>
                    <div class="sidebar-footer clearfix">
                        <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-original-title="Fullscreen">
                            <i class="icon-size-fullscreen"></i></a>
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
                            </ul>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="header-menu nav navbar-nav">
                            <li class="dropdown" id="user-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <!--                        <img src="<?=base_url()?>public/dashboard_assets/images/avatars/user1.png" alt="user image">-->
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
                                        <a href="#"><i class="icon-settings"></i><span>Account Settings</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-logout"></i><span>Logout</span></a>
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
                <script src="<?=base_url()?>public/dashboard_assets/plugins/charts-morris/raphael.min.js"></script> <!-- Morris Charts -->
                <script src="<?=base_url()?>public/dashboard_assets/plugins/charts-morris/morris.min.js"></script> <!-- Morris Charts -->
                <script>
                    var day_data = [
                        { "elapsed": "January 2015", "value": <?php echo $points1[0]?>, b: <?php echo $points2[0]?> },
                        { "elapsed": "February 2015", "value": <?php echo $points1[1]?>, b: <?php echo $points2[1]?> },
                        { "elapsed": "March 2015", "value": <?php echo $points1[2]?>, b: <?php echo $points2[2]?> },
                        { "elapsed": "April 2015", "value": <?php echo $points1[3]?>, b: <?php echo $points2[3]?> },
                        { "elapsed": "May 2015", "value": <?php echo $points1[4]?>, b: <?php echo $points2[4]?> },
                        { "elapsed": "June 2015", "value": <?php echo $points1[5]?>, b: <?php echo $points2[5]?> },
                        { "elapsed": "July 2015", "value": <?php echo $points1[6]?>, b: <?php echo $points2[6]?> },
                        { "elapsed": "August 2015", "value": <?php echo $points1[7]?>, b: <?php echo $points2[7]?> },
                        { "elapsed": "September 2015", "value": <?php echo $points1[8]?>, b: <?php echo $points2[8]?> },
                        { "elapsed": "October 2015", "value": <?php echo $points1[9]?>, b: <?php echo $points2[9]?> },
                        { "elapsed": "November 2015", "value": <?php echo $points1[10]?>, b: <?php echo $points2[10]?> },
                        { "elapsed": "December 2015", "value": <?php echo $points1[11]?>, b: <?php echo $points2[11]?> }
                    ];
                    var chart = Morris.Area({
                        element: 'morris-chart-network',
                        data: day_data,
                        axes: false,
                        xkey: 'elapsed',
                        ykeys: ['value', 'b'],
                        labels: ['Visitor\'s Email Received', 'User\'s Email Sent'],
                        yLabelFormat: function (y) { return y.toString() + '  emails'; },
                        gridEnabled: false,
                        gridLineColor: 'transparent',
                        lineColors: ['#7faadd', '#005dad'],
                        lineWidth: 0,
                        pointSize: 0,
                        pointFillColors: ['#3e80bd'],
                        pointStrokeColors: '#3e80bd',
                        fillOpacity: .3,
                        gridTextColor: '#999',
                        parseTime: false,
                        resize: true,
                        behaveLikeLine: true,
                        hideHover: 'auto',
                        hoverCallback: function (index, options, content) {
                            $("#chart-legend").html("<div><strong>" + options.data[index].elapsed + "</strong><br>  " + options.labels[0] + ": " + options.data[index].value + "<br />" + options.labels[1] + ": " + options.data[index].b + "</div>");
                        },
                    });
                </script>