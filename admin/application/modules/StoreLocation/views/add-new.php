<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:41 PM
 */
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>
<div id="page-wrapper" class="gray-bg">
    <?php $this->load->view('Common/header-top'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Store Location</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Store Location</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Add New</strong>
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
                        <h5>New Store Location</h5>
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
                                <p>Provide new store location details:</p>
                                <form role="form" id="newlocation_form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Place Heading </label>
                                                <input type="text" class="form-control" name="place_heading" id="place_heading" placeholder="Place heading..." >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Place Detail</label>
                                                <input type="text" class="form-control" name="place_detail" id="place_detail" placeholder="Place detail..." >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" name="country" id="country" placeholder="Country ..." >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" name="state" id="state" placeholder="State ..." >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="City ..." >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" id="address" placeholder="Address ..." >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact ..." >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Google Map Iframe</label>
                                                <input type="text" class="form-control" name="google_iframe" id="google_iframe" placeholder="Google Map Iframe..." >
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;">check</label>
                                        <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green; ">success</label>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Add Store Location</strong></button>
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

<?php $this->load->view('footer'); ?>
<script>
    $(document).ready(function () {
        // Add New Store Location Submit
        $("#newlocation_form").submit(function(event){
            event.preventDefault();
            $("#fields_check").hide();
            $("#succes_result").hide();

            var place_heading   = $("#place_heading").val();
            var place_detail    = $("#place_detail").val().trim();
            var country         = $("#country").val().trim();
            var state           = $("#state").val().trim();
            var city            = $("#city").val().trim();
            var address         = $("#address").val().trim();
            var contact         = $("#contact").val().trim();
            var google_iframe   = $("#google_iframe").val().trim();

            if (place_heading == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide place heading");
                $("#place_heading").focus();
                return;
            }
            if (place_detail == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide place detail");
                $("#place_detail").focus();
                return;
            }
            if (country == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide country");
                $("#country").focus();
                return;
            }
            if (state == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide state");
                $("#state").focus();
                return;
            }
            if (city == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide city");
                $("#city").focus();
                return;
            }
            if (address == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide address");
                $("#address").focus();
                return;
            }
            if (contact == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide contact");
                $("#contact").focus();
                return;
            }
            if (google_iframe == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide google map iframe");
                $("#google_iframe").focus();
                return;
            }

            if (place_heading != '' && place_detail != '' && country != '' && state != '' && city != '' && address != '' && contact != '' && google_iframe != '') {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                var formData = new FormData(this);
                $.ajax({
                    url: '<?=base_url()?>submit_newStore',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status == 'TRUE') {
                            $("#succes_result").show();
                            $("#succes_result").text(res.message);
                            $('#newlocation_form')[0].reset();
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
