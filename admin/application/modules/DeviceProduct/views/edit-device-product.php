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
            <h2>Device Product</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=base_url()?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?=base_url()?>products-list">Product List</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Update Product</strong>
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
                        <h5>Update Device Product</h5>
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
                            <div class="col-sm-8 b-r">
                                <p>Provided product details:</p>
                                <form role="form" id="updateProduct_form" enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" name="product_id" id="product_id" value="<?=$product_detail->id?>" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Device Category Name </label>
                                                <select class="form-control" name="category_id" id="category_id" >
                                                    <option value="0">Select Category</option>
                                                    <?php
                                                    if(isset($categories) && !empty($categories)){
                                                        foreach ($categories as $category){
                                                            ?>
                                                            <option <?php if($product_detail->category_id == $category->id){ echo "selected";} ?> value="<?=$category->id?>"><?=$category->category_name?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Device Brand</label>
                                                <select class="form-control" name="brand_id" id="brand_id" >
                                                    <option value="0">Select Brand</option>
                                                    <?php
                                                    if(isset($rel_brands) && !empty($rel_brands)){
                                                        foreach ($rel_brands as $brand){
                                                            ?>
                                                            <option <?php if($product_detail->brand_id == $brand->id){ echo "selected";} ?> value="<?=$brand->id?>"><?=$brand->brand_name?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Priority (Top Device)</label>
                                                <select class="form-control" name="top_product" id="top_product" >
                                                    <option <?php if($product_detail->top_product == "1"){ echo "selected";} ?> value="1">No</option>
                                                    <option <?php if($product_detail->top_product == "2"){ echo "selected";} ?> value="2">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. of products In Stock</label>
                                                <input type="number" min="0" class="form-control" name="stock" id="stock" placeholder="0" value="<?=$product_detail->stock?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product Model</label>
                                                <input type="text" class="form-control" name="product_model" id="product_model" placeholder="F7 Lite..." value="<?=$product_detail->product_model?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>New Price</label>
                                                <input type="number" class="form-control" name="new_price" id="new_price" placeholder="0000.00" value="<?=$product_detail->new_price?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Like New Price</label>
                                                <input type="number" class="form-control" name="perfect_price" id="perfect_price" placeholder="0000.00" value="<?=$product_detail->perfect_price?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Good Price</label>
                                                <input type="number" class="form-control" name="good_price" id="good_price" placeholder="0000.00" value="<?=$product_detail->good_price?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Average Price</label>
                                                <input type="number" class="form-control" name="normal_price" id="normal_price" placeholder="0000.00" value="<?=$product_detail->normal_price?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Faulty Price</label>
                                                <input type="text" class="form-control" name="faulty_price" id="faulty_price" placeholder="0000.00" value="<?=$product_detail->faulty_price?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Critical Precision By </label>
                                        <input class="form-control" placeholder="critical_precision_by ..." rows="4" name="critical_precision_by" id="critical_precision_by" value="<?=$product_detail->critical_precision_by?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Product Detail </label>
                                        <textarea class="form-control" placeholder="write details here ..." rows="4" name="product_detail" id="product_detail"><?=$product_detail->product_detail?></textarea>
                                    </div>
                                    <div>
                                        <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;">check</label>
                                        <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green; ">success</label>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Update Product</strong></button>
                                    </div>
                            </div>
                            <div class="col-sm-4" style="padding-top: 2pc;">
                                <img onclick="changePicture(); return false" id="image" style="cursor: pointer;" src="<?=ROOT_DIR . 'assets/images/brand_products/'.$product_detail->image ?>" alt="mobile image" class="logo" width="100%" >
                                <input accept="image/*" type="file" id="product_image" name="product_image" onchange="readURL(this);"style="visibility: hidden;" />
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
    // select image
    function changePicture(){
        $('#product_image').click();
    }
    function readURL(input){
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e)
            {
                $('#image').attr('src',e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // adjust respective prices
    function related_prices(price){
        var perfect_price  = Math.ceil((price*70)/100);
        var good_price     = Math.ceil((price*50)/100);
        var average_price  = Math.ceil((price*30)/100);
        var faulty_price  =  'Inquire for evaluation';
        $('input#perfect_price').val(perfect_price);
        $('input#good_price').val(good_price);
        $('input#normal_price').val(average_price);
        $('input#faulty_price').val(faulty_price);
    }
    // on price change
    $('#new_price').keyup(function(){
        var price = $(this).val().trim();
        if(price != '')
        {
            related_prices(price);
        }
        else
        {
            $('input#perfect_price').val('');
            $('input#good_price').val('');
            $('input#normal_price').val('');
            $('input#faulty_price').val('');
        }
    });

    // related brands against category
    function related_brands(category_id){
        $.ajax({
            type:   'POST',
            url:    '<?=base_url()?>related-brands/'+category_id,
            dataType: 'json',
            success: function(data){
                if(data.status == 'FALSE'){
                    swal({
                        title: "Something Goes Wrong!",
                        text: data.message,
                        icon: "error",
                        button: "OK",
                    });
                }
                else{
                    $("#brand_id").html(data.message);
                }
            }
        });
    }
    $("#category_id").change(function() {
        var category_id = $("option:selected", this).val();
        related_brands(category_id);
    });

    $(document).ready(function () {
        // Update PRoduct Form Submit
        $("#updateProduct_form").submit(function(event){
            event.preventDefault();
            $("#fields_check").hide();
            $("#succes_result").hide();

            var category_id     = $("#category_id").val();
            var brand_id        = $("#brand_id").val();
            var top_product     = $("#top_product").val();
            var product_model   = $("#product_model").val().trim();
            var stock           = $("#stock").val().trim();
            var new_price       = $("#new_price").val().trim();
            var perfect_price   = $("#perfect_price").val().trim();
            var good_price      = $("#good_price").val().trim();
            var normal_price    = $("#normal_price").val().trim();
            var faulty_price    = $("#faulty_price").val().trim();
            var product_detail  = $("#product_detail").val().trim();
            var critical_precision_by = $("#critical_precision_by").val().trim();
            
            if (category_id == '0') {
                $("#fields_check").show();
                $("#fields_check").text("Please choose Category ID");
                $("#category_id").focus();
                return;
            }
            if (brand_id == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please choose Brand");
                $("#brand_id").focus();
                return;
            }
            if (top_product == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please choose Either is it Top Device or Not.");
                $("#top_product").focus();
                return;
            }
            if (stock == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide number of products in stock");
                $("#stock").focus();
                return;
            }
            if (product_model == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide product model");
                $("#product_model").focus();
                return;
            }
            if (critical_precision_by == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide critcal precision by");
                $("#critical_precision_by").focus();
                return;
            }
            if (new_price == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide product New Price");
                $("#new_price").focus();
                return;
            }
            if (perfect_price == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide product Like New Price");
                $("#perfect_price").focus();
                return;
            }
            if (good_price == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide product Good Price");
                $("#good_price").focus();
                return;
            }
            if (normal_price == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide product Average Price");
                $("#normal_price").focus();
                return;
            }
            if (faulty_price == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide product Faulty Price");
                $("#faulty_price").focus();
                return;
            }
            if (product_detail == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide product detail");
                $("#product_detail").focus();
                return;
            }
            
            $('#loader').children('.ibox-content').toggleClass('sk-loading');
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>update_deviceProduct',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    $('#loader').children('.ibox-content').toggleClass('sk-loading');
                    if(res.status == 'TRUE') {
                        $("#succes_result").show();
                        $("#succes_result").text(res.message);
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

        });
    });
</script>
