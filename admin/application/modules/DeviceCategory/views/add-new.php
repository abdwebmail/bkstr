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
                <h2>Device Category</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Device Category</a>
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
                        <h5>New Device Category</h5>
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
                                <p>Provide new category details:</p>
                                <form role="form" id="newCategory_form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category Name </label>
                                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category name ..." >
                                    </div>
                                    <div class="form-group">
                                        <label>Category Detail </label>
                                        <textarea class="form-control" placeholder="write details here ..." rows="4" name="category_detail" id="category_detail"></textarea>
                                    </div>
                                    <div>
                                        <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;">check</label>
                                        <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green; ">success</label>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Add Category</strong></button>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                <img onclick="changePicture(); return false" id="image" style="cursor: pointer;" src="<?=base_url()?>assets/img/blog-01.jpg" alt="mobile image" class="logo" width="100%" >
                                <input accept="image/*" type="file" id="category_image" name="category_image" onchange="readURL(this);"style="visibility: hidden;" />
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
    // select image
    function changePicture(){
        $('#category_image').click();
    }
    function readURL(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e)
            {
                $('#image')
                    .attr('src',e.target.result);

            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        // Add New Category Form Submit
        $("#newCategory_form").submit(function(event){
            event.preventDefault();
            $("#fields_check").hide();
            $("#succes_result").hide();

            var category_name   = $("#category_name").val().trim();
            var category_detail = $("#category_detail").val().trim();
            var category_image  = $("#category_image").val().trim();

            if (category_name == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide category name");
                $("#category_name").focus();
                return;
            }
            if (category_detail == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide category detail");
                $("#category_detail").focus();
                return;
            }
            if (category_image == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please choose category image");
                return;
            }

            if (category_name != '' && category_detail != '' && category_image != '') {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                var formData = new FormData(this);
                $.ajax({
                    url: '<?=base_url()?>submit_deviceCategory',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status == 'TRUE') {
                            $("#succes_result").show();
                            $("#succes_result").text(res.message);
                            $('#newCategory_form')[0].reset();
                            $('#image').attr('src','<?=base_url()?>assets/img/blog-01.jpg');
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
