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
                <h2>Brand Products</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="products-list">Books</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Add New</strong>
                    </li>
                </ol>
            </div>
        </div>
    <?php //$this->load->view('Common/notification-nav'); ?>

    <div class="wrapper wrapper-content animated fadeInRight">
        <!--
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox" id="loader">
                        <div class="ibox-title">
                            <h5>New Brand Product</h5>
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
                                    <p>Provide new product details:</p>
                                    <form role="form" id="newProduct_form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Device Category Name </label>
                                                    <select class="form-control" name="category_id" id="category_id" >
                                                        <option value="0">Select Category</option>
                                                        <?php
                                                        //if(isset($categories) && !empty($categories)){
                                                          //  foreach ($categories as $category){
                                                                ?>
                                                                <option value="<?php //$category->id?>"><?php//$category->category_name?></option>
                                                                <?php
                                                            //}
                                                        //}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Device Brand</label>
                                                    <select class="form-control" name="brand_id" id="brand_id" >
                                                        <option value="0">Select Brand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Product Priority (Top Device)</label>
                                                    <select class="form-control" name="top_product" id="top_product" >
                                                        <option value="1" selected>No</option>
                                                        <option value="2">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Product Model</label>
                                                    <input type="text" class="form-control" name="product_model" id="product_model" placeholder="F7 Lite..." >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>New Price</label>
                                                    <input type="number" class="form-control" name="new_price" id="new_price" placeholder="0000.00" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Like New Price</label>
                                                    <input type="number" class="form-control" name="perfect_price" id="perfect_price" placeholder="0000.00" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Good Price</label>
                                                    <input type="number" class="form-control" name="good_price" id="good_price" placeholder="0000.00" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Average Price</label>
                                                    <input type="number" class="form-control" name="normal_price" id="normal_price" placeholder="0000.00" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Faulty Price</label>
                                                    <input type="text" class="form-control" name="faulty_price" id="faulty_price" placeholder="0000.00" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Detail </label>
                                            <textarea class="form-control" placeholder="write details here ..." rows="4" name="product_detail" id="product_detail"></textarea>
                                        </div>
                                        <div>
                                            <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;">check</label>
                                            <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green; ">success</label>
                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Add Product</strong></button>
                                        </div>
                                </div>
                                <div class="col-sm-4" style="padding-top: 2pc;">
                                    <img onclick="changePicture(); return false" id="image" style="cursor: pointer;" src="<?=base_url()?>assets/img/blog-01.jpg" alt="mobile image" class="logo" width="100%" >
                                    <input accept="image/*" type="file" id="product_image" name="product_image" onchange="readURL(this);"style="visibility: hidden;" />
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        -->
        <style>
            .wizard > .content{ background-color: #ffffff !important;}
            .wizard > .content > .body { }
        </style>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox" id="loader">
                    <div class="ibox-title">
                        <h5>New Books</h5>
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
                        <form role="form" id="newProduct_form" enctype="multipart/form-data" class="wizard-big">
                            <h1>Book Detail</h1>
                            <fieldset style="position: unset; width: 100%;padding: 2.5% 0.5%;">
                                <div class="col-sm-8 b-r" style="float:left;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Book Category</label>
                                                <select class="form-control" name="category_id" id="category_id" >
                                                    <option value="0">Select Category</option>
                                                    <?php
                                                    if(isset($categories) && !empty($categories)){
                                                        foreach ($categories as $category){
                                                            ?>
                                                            <option value="<?=$category->id?>"><?=$category->category_name?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Book Author</label>
                                                <select class="form-control" name="brand_id" id="brand_id" >
                                                    <option value="0">Select Author</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Book Name</label>
                                        <input type="text" class="form-control" name="product_model" id="product_model" placeholder="Book title..." >
                                    </div>
                                    <div class="form-group">
                                        <label>Book Detail </label>
                                        <textarea class="form-control" placeholder="write details here ..." rows="4" name="product_detail" id="product_detail"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Critical Precision By </label>
                                        <input type="text" class="form-control" placeholder="critical precision ..." name="critical_precision_by" id="critical_precision_by" />
                                    </div>
                                </div>
                                <div class="col-sm-4" style="float: left;padding-top: 2pc;">
                                    <img onclick="changePicture(); return false" id="image" style="cursor: pointer;max-height: 232px;" src="<?=base_url()?>assets/img/blog-01.jpg" alt="mobile image" class="logo" width="100%" >
                                    <input accept="image/*" type="file" id="product_image" name="product_image" onchange="readURL(this);"style="visibility: hidden;" />
                                </div>
                                <script>
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
                                </script>
                            </fieldset>

                            <h1>Book Price</h1>
                            <fieldset style="position: unset; width: 100%;padding: 2.5% 0.5%;">
                                <div class="col-sm-8 b-r" style="float:left;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Book Priority (Top Books)</label>
                                                <select class="form-control" name="top_product" id="top_product" >
                                                    <option value="2" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" class="form-control" name="new_price" id="new_price" placeholder="0000.00" >
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. of products In Stock</label>
                                                <input type="number" min="0" class="form-control" name="stock" id="stock" placeholder="0" >
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">

                                </div>
                                <div class="col-sm-4" style="float: left;padding-top: 2pc;">
                                    <img id="second_image" style="max-height: 232px;" src="<?=base_url()?>assets/img/blog-01.jpg" alt="mobile image" class="logo" width="100%" >
                                </div>

                              
                            </fieldset>
                            <div>
                                <label id="fields_check" style="display: none;padding-left: 1.5pc;font-weight: 600;color: red;">check</label>
                                <label id="succes_result" style="display:none;padding-left: 1.5pc;font-weight: 600;color: green; ">success</label>
                            </div>
                        </form>

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
                $('#second_image').attr('src',e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {


        $("#newProduct_form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                var category_id     = $("#category_id").val();
                var brand_id        = $("#brand_id").val();
                var product_model   = $("#product_model").val().trim();
                var product_detail  = $("#product_detail").val().trim();
                var critical_precision_by  = $("#critical_precision_by").val().trim();
                var product_image   = $("#product_image").val().trim();

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
                if (product_model == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide product model");
                    $("#product_model").focus();
                    return;
                }
                if (product_detail == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide product detail");
                    $("#product_detail").focus();
                    return;
                }
                if (critical_precision_by == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide critical precision by");
                    $("#critical_precision_by").focus();
                    return;
                }
                if (product_image == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please choose Product image");
                    return;
                }

                if(category_id != '0' && brand_id != '' && product_model != '' && product_detail != '' && critical_precision_by != '' && product_image != ''){
                    $("#fields_check").hide();
                    return true;
                }
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                $("#fields_check").hide();
                $("#succes_result").hide();

                var category_id     = $("#category_id").val();
                var brand_id        = $("#brand_id").val();
                var top_product     = $("#top_product").val();
                var product_model   = $("#product_model").val().trim();
                var stock           = $("#stock").val().trim();
                var new_price       = $("#new_price").val().trim();
                var product_detail  = $("#product_detail").val().trim();
                var critical_precision_by  = $("#critical_precision_by").val().trim();
                var product_image   = $("#product_image").val().trim();

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
                if (product_model == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide product model");
                    $("#product_model").focus();
                    return;
                }
                if (stock == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide number of products in stock");
                    $("#stock").focus();
                    return;
                }
                if (new_price == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide product New Price");
                    $("#new_price").focus();
                    return;
                }
                if (product_detail == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide product detail");
                    $("#product_detail").focus();
                    return;
                }
                if (critical_precision_by == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please provide critical_precision_by");
                    $("#critical_precision_by").focus();
                    return;
                }
                if (product_image == '') {
                    $("#fields_check").show();
                    $("#fields_check").text("Please choose Product image");
                    return;
                }

                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                var formData = new FormData(this);
                $.ajax({
                    url: '<?=base_url()?>submit_deviceProduct',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status == 'TRUE') {
                            $("#succes_result").show();
                            $("#succes_result").text(res.message);
                            $('#newProduct_form')[0].reset();
                            $('#image').attr('src','<?=base_url()?>assets/img/blog-01.jpg');
                            $('#second_image').attr('src','<?=base_url()?>assets/img/blog-01.jpg');
                            $('#loader').children('.ibox-content').toggleClass('sk-loading');
                            return true;
                        }
                        else{
                            $("#fields_check").show();
                            $("#fields_check").text(res.message);
                            return false;
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
