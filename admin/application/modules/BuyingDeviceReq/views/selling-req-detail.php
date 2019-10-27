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
                                            <dd class="mb-1"><?=$req_detail->first_name?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Email:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->email?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Contact:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->contact?></dd>
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
                                            <dt>Available Time:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><span class="text-navy"><?=$req_detail->available_time?></span></dd>
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
                                            <dt>Evaluated Price:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->evaluated_price?> <strong>Rs/...</strong></dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="col-lg-6" id="cluster_info">
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Device Type:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->device_type?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Device Company:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->device_company?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Device Model:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->device_model?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>Space:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?=$req_detail->space?></dd>
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
                                            <dt>Selling Type:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><span class="text-navy"><?=$req_detail->selling_type?></span></dd>
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
                        <form id="sellingComment-form">
                            <div class="form-group row" style="padding-top: 7px;">
                                <label class="col-lg-3 col-form-label">Comment</label>
                                <div class="col-lg-9">
                                    <textarea placeholder="Write here..." rows="3" class="form-control" name="comment" id="comment"><?php if(isset($req_detail->selling_comment)){echo $req_detail->selling_comment;}?></textarea>
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
                        <h5>Selling Price & Status</h5>
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
                        <form id="sale_status-form">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Selling Price</label>
                                <div class="col-lg-8">
                                    <input type="text" placeholder="0" class="form-control" name="sale_price" id="sale_price" value="<?=$req_detail->sale_price?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Selling Status</label>
                                <div class="col-lg-8">
                                    <select name="status_sale" id="status_sale" class="form-control">
                                        <option <?php if($req_detail->status_sale=='1' || $req_detail->status_sale=='2'){echo "selected";}?> value="2">Selling In Progress</option>
                                        <option <?php if($req_detail->status_sale=='3'){echo "selected";}?> value="3">Selling Completed</option>
                                        <option <?php if($req_detail->status_sale=='4'){echo "selected";}?> value="4">Selling Aborted</option>
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
    $("#sellingComment-form").submit(function(event){
        event.preventDefault();
        $("#fields_check").hide();
        var comment  = $('#comment').val().trim();
        if (comment == '') {
            $("#fields_check").show();
            $("#fields_check").text("Please enter comment");
            $("#comment").focus();
            return;
        }
        else{
            $('#loader').children('.ibox-content').toggleClass('sk-loading');
            var formData = new FormData(this);
            formData.append('req_id','<?=$req_detail->id?>');
            $.ajax({
                url: '<?=base_url()?>save_sellingComment',
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

    // sale price & status
    $("#sale_status-form").submit(function(event){
        event.preventDefault();
        $("#fields_check_status").hide();
        var sale_price      = $('#sale_price').val().trim();
        var status_sale     = $('#status_sale').val();
        if (sale_price == '') {
            $("#fields_check_status").show();
            $("#fields_check_status").text("Please provide Sale Price");
            $("#sale_price").focus();
            return;
        }
        if (status_sale == '') {
            $("#fields_check_status").show();
            $("#fields_check_status").text("Please Choose Sale Status");
            $("#status_sale").focus();
            return;
        }

        $('#loader').children('.ibox-content').toggleClass('sk-loading');
        var formData = new FormData(this);
        formData.append('req_id','<?=$req_detail->id?>');
        $.ajax({
            url: '<?=base_url()?>update_sale_status',
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