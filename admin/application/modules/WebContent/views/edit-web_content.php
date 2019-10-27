<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/28/2019
 * Time: 12:57 PM
 */
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>
<div id="page-wrapper" class="gray-bg">
    <?php $this->load->view('Common/header-top'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Web Content</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=base_url()?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Update Web Content</strong>
                </li>
            </ol>
        </div>
    </div>
    <?php //$this->load->view('Common/notification-nav'); ?>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox" id="loader">
                    <div class="ibox-title">
                        <h5>Update Web Content</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="sk-spinner sk-spinner-wave">
                            <div class="sk-rect1"></div>
                            <div class="sk-rect2"></div>
                            <div class="sk-rect3"></div>
                            <div class="sk-rect4"></div>
                            <div class="sk-rect5"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 b-r">
                                <form role="form" id="updateWebContent_form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Office Timing</label>
                                                <input type="text" class="form-control" name="office_time" id="office_time" value="<?=$content_detail->office_time?>" placeholder="Office Timing..." >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Office Address</label>
                                                <input type="text" class="form-control" name="address" id="address" value="<?=$content_detail->address?>" placeholder="Office Address..." >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control" name="contact_num" id="contact_num" value="<?=$content_detail->contact_num?>" placeholder="Office contact number ..." >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Last Updated Time</label>
                                                <input type="text" class="form-control" disabled value="<?=$content_detail->updated_on?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;">check</label>
                                        <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green; ">success</label>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Update Web Content</strong></button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('footer-copy-right'); ?>
</div>

<!-- SMALL CHAT BOX INCLUDE -->
<?php //$this->load->view('small-chatbox'); ?>

<!-- RIGHT SIDE BAR INCLUDE -->
<?php //$this->load->view('right-side-bar'); ?>
</div>

<?php $this->load->view('detail-footer'); ?>
<script>

    $(document).ready(function () {
        // Update Web Contact Form Submit
        $("#updateWebContent_form").submit(function(event){
            event.preventDefault();
            $("#fields_check").hide();
            $("#succes_result").hide();

            var office_time   = $("#office_time").val();
            var address    = $("#address").val().trim();
            var contact_num         = $("#contact_num").val().trim();

            if (office_time == '') {
                $("#fields_check").show();
                $("#fields_check").text("Office timing can not be null or empty.");
                $("#office_time").focus();
                return;
            }
            if (address == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide office address");
                $("#address").focus();
                return;
            }
            if (contact_num == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide office contact number");
                $("#contact_num").focus();
                return;
            }


            if (office_time != '' && address != '' && contact_num != '') {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                var formData = new FormData(this);
                $.ajax({
                    url: '<?=base_url()?>update_webContent',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status == 'TRUE') {
                            $("#succes_result").show();
                            $("#succes_result").text(res.message);
                            $('#loader').children('.ibox-content').toggleClass('sk-loading');
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
    });
</script>
