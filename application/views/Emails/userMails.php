<?php
$session=  $this->session->all_userdata();

?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-app mailbox">
    <section class="app">
        <aside class="aside-md emails-list">
            <section>
                <div class="mailbox-page clearfix">
                    <h1 class="pull-left">User's Mail Inbox</h1>
                    <div class="append-icon">
                        <input type="text" class="form-control form-white pull-right" id="email-search" placeholder="Search...">
                        <i class="icon-magnifier"></i>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="recent">
                        <div class="messages-list withScroll show-scroll" data-padding="180" data-height="window">
                                <?php 
                                foreach ($usermails as $mail) {
                                    ?>
                            <div class="message-item media">
                                <div class="media">
                                    <!--<img src="<?=base_url()?>public/dashboard_assets/images/avatars/avatar6_big.png" alt="avatar 3" width="40" class="sender-img">-->
                                    <div class="media-body">
                                        <div class="sender"><?= $mail->Name ?></div>
                                        <div class="subject">
                                            <span class="subject-text"><?= $mail->Subject ?></span>
                                        </div>
                                        <div class="date"><strong> <?= $mail->date ?></strong></div>
                                        <div class="email-content">
                                            <p><?= $mail->message ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <?php
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </section>
        </aside>
        <aside class="email-details">
            <section>
                <div class="email-subject">
                    <h1><strong>User's </strong>Mail</h1>
                    <div class="clearfix">
                        <div class="go-back-list"><i data-rel="tooltip" data-placement="bottom" data-original-title="Back to email list" class="icon-arrow-left"></i></div>
                    </div>
                </div>
                <div class="email-details-inner withScroll" data-height="window" data-padding="155">
                    <div class="email-content">
                        <p>Hi, <?= print_r(ucwords($session[USER_NAME]))?>,</p>
                        <p>Click on any mail to see mail content here.</p>
                        <div style="margin-bottom: 300px;"></div>
                    </div>
                </div>
            </section>
        </aside>
    </section>
</div>
<!-- END PAGE CONTENT -->
