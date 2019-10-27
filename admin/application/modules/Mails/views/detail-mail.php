<?php
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>

    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('Common/header-top'); ?>
        <?php $this->load->view('Common/notification-nav'); ?>

        <div style="padding: 10px 5px 10px 10px;">
            <div class="row">
                <div class="col-lg-3" style="background-color: #ffffff; margin-bottom: 20px;">
                    <div class="ibox ">
                        <div class="ibox-content mailbox-content">
                            <div class="file-manager">
                                <a class="btn btn-block btn-primary compose-mail" href="<?=base_url()?>compose-mail">Compose Mail</a>
                                <div class="space-25"></div>
                                <h5>Folders</h5>
                                <ul class="folder-list m-b-md" style="padding: 0">
                                    <li><a href="<?=base_url()?>inbox"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning float-right num_unreadMails">0</span> </a></li>
                                    <li><a href="<?=base_url()?>sent-mails"> <i class="fa fa-envelope-o"></i> Sent Mails</a></li>
                                    <li><a href="<?=base_url()?>important-mails"> <i class="fa fa-certificate"></i> Important</a></li>
                                    <li><a href="<?=base_url()?>drafted-mails"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger float-right">2</span></a></li>
                                    <li><a href="<?=base_url()?>trash-mails"> <i class="fa fa-trash-o"></i> Trash</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="mail-box-header">
                        <h2><?= $mail_detail->user_name ?></h2>
                        <div class="mail-tools tooltip-demo m-t-md">
                            <h5>
                                <span class="float-right font-normal"><?= date('M j, Y, g:i a', strtotime($mail_detail->submission_date)) ?></span>
                                <span class="font-normal">From: </span><?= $mail_detail->email ?>
                            </h5>
                        </div>
                    </div>
                    <div class="mail-box">
                        <div class="mail-body">
                            <p><?= $mail_detail->message ?></p>
                        </div>
                        <div class="mail-body text-right tooltip-demo">
                            <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-reply"></i> Reply</a>
                            <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('footer-copy-right'); ?>
    </div>

<!-- SMALL CHAT BOX INCLUDE -->
<?php $this->load->view('small-chatbox'); ?>

<!-- RIGHT SIDE BAR INCLUDE -->
<?php //$this->load->view('right-side-bar'); ?>
</div>
<?php $this->load->view('detail-footer'); ?>
