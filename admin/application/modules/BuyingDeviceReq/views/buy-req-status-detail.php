<?php
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>
<div id="page-wrapper" class="gray-bg">
    <?php $this->load->view('Common/header-top'); ?>

    <?php $this->load->view('Common/notification-nav'); ?>

    <style>
        .text-horizontally-center{
            text-align: center;
        }
        .text-vertically-center{
            vertical-align: middle !important;
        }
    </style>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox" id="loader">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Evaluated Selling Request Detail</h5>
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Name:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->client_name?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Email:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->client_email?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Contact:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->client_contact?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Received Through:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->received_through?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Request Time:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->reqTime?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Buying Price:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->buying_price?> <strong>Rs/...</strong></dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="col-lg-6" id="cluster_info">
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Device Type:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->category_name?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Device Company:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->brand_name?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Device Model:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->product_model?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Device Condition:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->device_condition?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Evaluated Comment:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->comment?></dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox" id="loader">
                    <div class="ibox-title">
                        <h5>Selling Comment <small> Write comment about this Selling Request</small></h5>
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
                        <form id="buyingComment-form">
                            <div class="form-group row" style="padding-top: 7px;">
                                <label class="col-lg-3 col-form-label">Comment</label>
                                <div class="col-lg-9">
                                    <textarea placeholder="Write here..." rows="3" class="form-control" name="buying_comment" id="buying_comment"><?php if(isset($req_detail->buying_comment)){echo $req_detail->buying_comment;}?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-12">
                                    <label id="fields_check" style="display: none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;"></label>
                                    <label id="succes_result" style="display: none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green;"></label>
                                    <button class="btn btn-sm btn-white" style="float: right;" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Buy Price & Status</h5>
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
                        <form id="buy_status-form">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Buying Price</label>
                                <div class="col-lg-8">
                                    <input type="hidden" name="device_id" id="device_id" value="<?=$req_detail->product_id?>">
                                    <input type="text" placeholder="0" class="form-control" name="buy_price" id="buy_price" value="<?=$req_detail->buying_price?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Buying Status</label>
                                <div class="col-lg-8">
                                    <select name="status_buy" id="status_buy" class="form-control">
                                        <option <?php if($req_detail->status_buy=='1' || $req_detail->status_buy=='2'){echo "selected";}?> value="2">Buying In Progress</option>
                                        <option <?php if($req_detail->status_buy=='3'){echo "selected";}?> value="3">Buying Completed</option>
                                        <option <?php if($req_detail->status_buy=='4'){echo "selected";}?> value="4">Buying Aborted</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-12">
                                    <label id="fields_check_status" style="display: none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;"></label>
                                    <label id="succes_result_status" style="display: none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green;"></label>
                                    <button class="btn btn-sm btn-white" style="float: right;" type="submit">Save</button>
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
    // comment save
    $("#buyingComment-form").submit(function(event){
        event.preventDefault();
        $("#fields_check").hide();
        var buying_comment  = $('#buying_comment').val().trim();
        if (buying_comment == '') {
            $("#fields_check").show();
            $("#fields_check").text("Please enter comment");
            $("#buying_comment").focus();
            return;
        }
        else{
            $('#loader').children('.ibox-content').toggleClass('sk-loading');
            var formData = new FormData(this);
            formData.append('req_id','<?=$req_detail->id?>');
            $.ajax({
                url: '<?=base_url()?>save_buyingComment',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    $('#loader').children('.ibox-content').toggleClass('sk-loading');
                    if(res.status = 'TRUE') {
                        $("#succes_result").show();
                        $("#succes_result").text(res.message);
                    }
                    else{
                        $("#fields_check").show();
                        $("#fields_check").text(res.message);
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });

    // buy price & status
    $("#buy_status-form").submit(function(event){
        event.preventDefault();
        $("#fields_check_status").hide();
        var buy_price      = $('#buy_price').val().trim();
        var status_buy     = $('#status_buy').val();
        if (buy_price == '') {
            $("#fields_check_status").show();
            $("#fields_check_status").text("Please provide User Buy Price");
            $("#buy_price").focus();
            return;
        }
        if (status_buy == '') {
            $("#fields_check_status").show();
            $("#fields_check_status").text("Please Choose Buy Status");
            $("#status_buy").focus();
            return;
        }

        $('#loader').children('.ibox-content').toggleClass('sk-loading');
        var formData = new FormData(this);
        formData.append('req_id','<?=$req_detail->id?>');
        $.ajax({
            url: '<?=base_url()?>update_buy_status',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (res) {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                if(res.status = 'TRUE') {
                    $("#succes_result_status").show();
                    $("#succes_result_status").text(res.message);
                }
                else{
                    $("#fields_check_status").show();
                    $("#fields_check_status").text(res.message);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>