
<!-- BEGIN PAGE CONTENT -->
<div class="page-content page-app mailbox">
    <section class="app">
        <aside class="aside-md emails-list">
            <section>
                <div class="mailbox-page clearfix">
                    <h1 class="pull-left">Visitor's Mail Inbox</h1>
                    <div class="append-icon">
                        <input type="text" class="form-control form-white pull-right" id="email-search" placeholder="Search...">
                        <i class="icon-magnifier"></i>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="recent">
                        <div class="messages-list withScroll show-scroll" data-padding="180" data-height="window">
                                <?php 
                                foreach ($visitormails as $mail) {
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
                    <h1>Theory of <strong>Design</strong></h1>
                    <div class="clearfix">
                        <div class="go-back-list"><i data-rel="tooltip" data-placement="bottom" data-original-title="Back to email list" class="icon-arrow-left"></i></div>
                        <p>from <strong><span class="sender">Sandra Merlin</span></strong> &bull; <span class="date">16 January, 4:04pm</span></p>
                        <div class="pos-rel pull-left">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300"> 
                                <i class=" icon-rounded-arrow-down-thin"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="reorder-menu">Delete email</a></li>
                                <li><a href="#" class="remove-menu">Move</a></li>
                                <li><a href="#" class="hide-top-sidebar">Print</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="email-details-inner withScroll" data-height="window" data-padding="155">
                    <div class="email-content">
                        <p>Hi Steve,</p>
                        <p>Visual hierarchy is one of the most important principles behind effective web design. We will see how you can use some very basic exercises in your own designs to put these principles into practice.</p>
                        <blockquote class="blue">
                            <p><strong>Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it's really how it works.</strong></p>
                        </blockquote>
                        <p>At it's core, design is all about visual communication: To be an effective designer, you have to be able to clearly communicate your ideas to viewers or else lose their attention.</p>
                        <div class="email-attachment clearfix">
                            <div class="attachments">
                                <span><i class="fa fa-file-image-o"></i> Home.jpg <span class="small">(10mb)</span></span>
                                <span><i class="fa fa-file-pdf-o"></i> Resume.pdf <span class="small">(5.2mb)</span></span> 
                            </div>
                            <div class="attachments-actions">
                                <div class="move-attachments">
                                    <i class=" icon-rounded-arrow-left-thin"></i>
                                    <i class=" icon-rounded-arrow-right-thin"></i>
                                </div>
                                <div class="download-attachment">
                                    <i class="icon-rounded-download"></i>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="answers">
                        <div class="answer-subject">
                            <h2 class="answer-title"></h2>
                            <p>from <strong>me</strong> &bull; <span class="answer-date"></span></p>
                        </div>
                        <div class="answer-content"></div>
                    </div>
                    <div class="write-answer">
                        <div class="answer-textarea"></div>
                        <button id="save" class="btn btn-primary" type="button">Send</button>
                    </div>
                </div>
            </section>
        </aside>
    </section>
</div>
<!-- END PAGE CONTENT -->
