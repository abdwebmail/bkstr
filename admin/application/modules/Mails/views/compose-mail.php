<?php
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>
<div id="page-wrapper" class="gray-bg">
    <?php $this->load->view('Common/header-top'); ?>

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
                                <li><a href="<?=base_url()?>sent-mails"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
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
                    <h2>Compse mail</h2>
                </div>
                <div class="mail-box">
                    <div class="loader_main">
                        <div class="loader_load" id="send_mail_loader"></div>
                        <form id="compose_mail-form">
                            <div class="mail-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">To:</label>
                                    <div class="col-sm-10">
                                        <div id="individual_email_id_row" class="form-group" style="display: none;">
                                            <input class="form-control" type="email" id="individual_email" name="individual_email" placeholder="Email:">
                                        </div>
                                        <div class="form-group" id="all_emails_group_row">
                                            <select id="email_ids" name="email_ids[]" class="form-control email_ids" multiple="multiple" style="width: 100%;" >
                                                <option value="users">Registered Users</option>
                                                <option value="tbl_mails">User contacted us</option>
                                                <option value="tbl_subscribers">Subscribers</option>
                                                <option value="device_sell_requests">Users Requested for Sell Device</option>
                                                <option value="device_buy_requests">Users Requested for Buy Device</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Subject:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="subject" id="subject">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: 10px;margin-bottom: 0px;">
                                    <div class="col-md-2">Sending Type</div>
                                    <div class="col-md-10">
                                        <input type="checkbox" id="individual_check" name="individual_check" value="individual_check"> Send Email to individual person
                                    </div>
                                </div>
                            </div>
                            <div class="h-200" style="padding: 10px 20px;">
                                <div class="summernote">
                                    <textarea id="message" class="message form-control" style="height: 300px" name="message"></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;"></label>
                                <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green;"></label>
                            </div>
                            <div class="mail-body text-right tooltip-demo">
                                <button class="btn btn-white btn-sm"><i class="fa fa-times"></i> Discard</button>
                                <button class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Draft</button>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> Send</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
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

<?php $this->load->view('footer'); ?>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
<script>
    // load ckeditor
    function CKupdate(){
        for ( instance in CKEDITOR.instances ){
            CKEDITOR.instances[instance].updateElement();
            CKEDITOR.instances[instance].setData('');
        }
    }
    $(document).ready(function(){
        CKEDITOR.replace('message');
        CKupdate();
        $("#email_ids").select2({
            placeholder: "Select Module"
        });

        // check individual user checkbox checked or not
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                $("#all_emails_group_row").hide();
                $("#individual_email_id_row").show();
                $("#email_ids").select2("val", "");
            }
            else if($(this).is(":not(:checked)")){
                $("#all_emails_group_row").show();
                $("#individual_email_id_row").hide();
                $("#individual_email").val('');
            }
        });
    });

    // mail send
    $("#compose_mail-form").submit(function(event){
        CKupdate();
        event.preventDefault();
        $("#fields_check").hide();
        var url = '';
        var check_individual_email = $('#individual_check').is(':checked');
        if(!check_individual_email) {
            var len = $('#email_ids').val().length;
            if (len < 1) {
                $("#fields_check").show();
                $("#fields_check").text("Please select at least one email");
                return;
            }
            url = 'send email of mulitple tables';
        }
        else{
            var email  = $('#individual_email').val().trim();
            if (email == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide email");
                return;
            }
            url = 'send individual email';
        }

        var subject = $("#subject").val().trim();
        var message = $("#message").val();
        if (subject == '') {
            $("#fields_check").show();
            $("#fields_check").text("Please provide subject");
            return;
        }
        if (message == '') {
            $("#fields_check").show();
            $("#fields_check").text("Please provide message");
            return;
        }


        if ((url != '') && (subject != '') && (message != '')) {
            $("#send_mail_loader").show();
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>send_mail_to_users',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    if(res.status == 'TRUE') {
                        $("#succes_result").show();
                        $("#succes_result").text(res.message);
                        $("#send_mail_loader").hide();
                        $("#email_ids").select2("val", "");
                        $("#individual_email").val('');
                        $('#compose_mail-form')[0].reset();
                        // setTimeout(function () {
                        //     location.reload();
                        // }, 2000);
                        CKupdate();
                    }
                    else{
                        $("#fields_check").show();
                        $("#fields_check").text(res.message);
                        return;
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }

    });

</script>