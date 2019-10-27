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
                    <h2><?= $mail_detail->subject ?></h2>
                    <div class="mail-tools tooltip-demo m-t-md">
                        <h5>
                            <span class="float-right font-normal"><?= date('M j, Y, g:i a', strtotime($mail_detail->created_on)) ?></span>
                            <span class="font-normal">To: </span><?= $mail_detail->email ?>
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

<!-- Mainly scripts -->
<script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?=base_url()?>assets/js/popper.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
<script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>assets/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>
<!-- Navigation JS -->
<script>
    function num_reg_users(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/num_of_users',
            success: function (res) {
                $("#num_regUsers_loader").hide();
                $("#num_regUsers").html(res);
            }
        });
    }
    function num_active_users(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/active_users',
            success: function (res) {
                $("#num_activeUsers_loader").hide();
                $("#num_activeUsers").html(res);
            }
        });
    }

    function num_of_mails(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/num_of_mails',
            success: function (res) {
                $("#num_mails_loader").hide();
                $(".num_mails").html(res);
            }
        });
    }
    function num_of_unread_mails(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/num_of_unread_mails',
            success: function (res) {
                $("#num_unreadMails_loader").hide();
                $(".num_unreadMails").html(res);
            }
        });
    }
    function unread_mails(from=0){
        $.ajax({
            type: 'post',
            data: {"from":from},
            url: '<?=base_url()?>/unread_mails',
            dataType: 'json',
            success: function (res) {
                $("#unread_mails_loader").hide();
                if (res.status == "TRUE") {
                    $("#unread_mails").html(res.message);
                }
            }
        });
    }

    function num_of_selling_req(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/num_of_selling_req',
            success: function (res) {
                $("#num_sellReq_loader").hide();
                $("#num_sellReq").html(res);
            }
        });
    }
    function num_of_unread_selling_req(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/num_of_unread_selling_req',
            success: function (res) {
                $("#num_newSellReq_loader").hide();
                $("#num_newSellReq").html(res);
            }
        });
    }

    function num_of_buying_req(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/num_of_buying_req',
            success: function (res) {
                $("#num_buyReq_loader").hide();
                $("#num_buyReq").html(res);
            }
        });
    }
    function num_of_unread_buying_req(){
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/num_of_unread_buying_req',
            success: function (res) {
                $("#num_newBuyReq_loader").hide();
                $("#num_newBuyReq").html(res);
            }
        });
    }

    $(document).ready(function(){
        $("#num_regUsers_loader").show();
        $("#num_activeUsers_loader").show();
        $("#num_mails_loader").show();
        $("#num_unreadMails_loader").show();
        $("#num_sellReq_loader").show();
        $("#num_newSellReq_loader").show();
        $("#num_buyReq_loader").show();
        $("#num_newBuyReq_loader").show();

        num_reg_users();
        num_active_users();

        num_of_mails();
        num_of_unread_mails();
        unread_mails();

        num_of_selling_req();
        num_of_unread_selling_req();

        num_of_buying_req();
        num_of_unread_buying_req();
    });

</script>
</body>
</html>
