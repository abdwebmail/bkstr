<?php
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>
<div id="page-wrapper" class="gray-bg">
    <?php $this->load->view('Common/header-top'); ?>
    <?php $this->load->view('Common/notification-nav'); ?>

        <div class="row">
            <div class="col-lg-3" style="background-color: #ffffff; margin-bottom: 20px;">
                <div class="ibox">
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
            <div class="col-lg-9 animated fadeInRight" style="overflow-y: -webkit-paged-x; overflow-x: hidden;">
                <div class="mail-box-header">
                    <form method="get" class="float-right mail-search">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="search" placeholder="Search email">
                        </div>
                    </form>
                    <h2>
                        Inbox (<span class="num_unreadMails">0</span>)
                    </h2>
                    <div class="mail-tools tooltip-demo m-t-md">
                        <div class="btn-group float-right">
                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
                        </div>
                        <button class="btn btn-white btn-sm" onclick="inbox_load(0)"><i class="fa fa-refresh"></i> Refresh</button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-eye"></i> </button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-exclamation"></i> </button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> </button>

                    </div>
                </div>
                <div class="loader_main">
                    <div class="loader_load" id="inbox_load_loader"></div>
                    <div class="mail-box" id="mail-box"></div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('footer-copy-right'); ?>
</div>

<!-- SMALL CHAT BOX INCLUDE -->
<!--<?php $this->load->view('small-chatbox'); ?>-->

</div>

<?php $this->load->view('footer'); ?>

<script>
    function inbox_load(from=0){
        $("#inbox_load_loader").show();
        $.ajax({
            type: 'post',
            url: 'inbox_load',
            data: {'from':from},
            dataType: 'json',
            success: function (res) {
                $("#inbox_load_loader").hide();
                $("#mail-box").html(res.message);
            }
        });
    }
    $(document).ready(function(){
        inbox_load();
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
