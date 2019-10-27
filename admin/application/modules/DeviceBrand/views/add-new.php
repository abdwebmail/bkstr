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
                <h2>Authors</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Authors</a>
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
                        <h5>New Auhtor</h5>
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
                                <p>About Auhtor:</p>
                                <form role="form" id="newBrand_form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Auhtor Name </label>
                                                <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Author name ..." >
                                            </div>
                                        </div>
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
                                    </div>
                                    <div class="form-group">
                                        <label>Author Detail </label>
                                        <textarea class="form-control" placeholder="write details here ..." rows="4" name="brand_detail" id="brand_detail"></textarea>
                                    </div>
                                    <div>
                                        <label id="fields_check" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: red;">check</label>
                                        <label id="succes_result" style="display:none;padding-top: 10px;padding-left: 10px;font-weight: 600;color: green; ">success</label>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Add Author</strong></button>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                <img onclick="changePicture(); return false" id="image" style="cursor: pointer;" src="<?=base_url()?>assets/img/blog-01.jpg" alt="mobile image" class="logo" width="100%" >
                                <input accept="image/*" type="file" id="brand_image" name="brand_image" onchange="readURL(this);"style="visibility: hidden;" />
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
        $('#brand_image').click();
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
        // Add New Brand Form Submit
        $("#newBrand_form").submit(function(event){
            event.preventDefault();
            $("#fields_check").hide();
            $("#succes_result").hide();

            var category_id  = $("#category_id").val();
            var brand_name   = $("#brand_name").val().trim();
            var brand_detail = $("#brand_detail").val().trim();
            var brand_image  = $("#brand_image").val().trim();

            if (brand_name == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide brand name");
                $("#brand_name").focus();
                return;
            }
            if (category_id == '0') {
                $("#fields_check").show();
                $("#fields_check").text("Please choose Category ID");
                $("#category_id").focus();
                return;
            }
            if (brand_detail == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please provide brand detail");
                $("#brand_detail").focus();
                return;
            }
            if (brand_image == '') {
                $("#fields_check").show();
                $("#fields_check").text("Please choose brand image");
                return;
            }

            if (brand_name != '' && category_id != '' && brand_detail != '' && brand_image != '') {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                var formData = new FormData(this);
                $.ajax({
                    url: '<?=base_url()?>submit_deviceBrand',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status == 'TRUE') {
                            $("#succes_result").show();
                            $("#succes_result").text(res.message);
                            $('#newBrand_form')[0].reset();
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
