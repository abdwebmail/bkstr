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
            <h2>Device Category</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=base_url()?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?=base_url()?>categories-list">Category List</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Update Category</strong>
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
                        <h5>Update Device Category</h5>
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
                                <p>Provided category details:</p>
                                <form role="form" id="Category_form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category Name </label>
                                        <input type="hidden" class="form-control" name="category_id" id="category_id" placeholder="Category name ..." value="<?=$category_detail->id?>">
                                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category name ..." value="<?=$category_detail->category_name?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Detail </label>
                                        <textarea class="form-control" placeholder="write details here ..." rows="4" name="category_detail" id="category_detail"><?=$category_detail->category_detail?></textarea>
                                    </div>
                                    <div>
                                        <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;">check</label>
                                        <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green; ">success</label>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Update Category</strong></button>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                <img onclick="changePicture(); return false" id="image" style="cursor: pointer;" src="<?=ROOT_DIR . 'assets/images/device_categories/'.$category_detail->image ?>" alt="mobile image" class="logo" width="100%" >
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

<?php $this->load->view('detail-footer'); ?>
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
                $('#image').attr('src',e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        // Update Category Form Submit
        $("#Category_form").submit(function(event){
            event.preventDefault();
            $("#fields_check").hide();
            $("#succes_result").hide();

            var category_name   = $("#category_name").val().trim();
            var category_detail = $("#category_detail").val().trim();

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

            if (category_name != '' && category_detail != '') {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                var formData = new FormData(this);
                $.ajax({
                    url: '<?=base_url()?>update_deviceCategory',
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
