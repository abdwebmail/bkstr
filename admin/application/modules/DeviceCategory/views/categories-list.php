<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/26/2019
 * Time: 11:40 PM
 */
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('Common/header-top'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Device Category [ <span id="total_categories"><?= count($all_categories) ?></span> ]</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Device Category</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Categories List</strong>
                    </li>
                </ol>
            </div>
        </div>
        <?php //$this->load->view('Common/notification-nav'); ?>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <?php
                    if(isset($all_categories) && !empty($all_categories)) {
                        foreach ($all_categories as $category) {
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-3" style="float: left;" id="div_<?=$category->id?>">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation" style="padding: 0px;">
                                            <img style="width: 100%;height: 246px;" src="<?= ROOT_DIR .'assets/images/device_categories/'.$category->image ?>"/>
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-name"> <?=$category->category_name?></span>
                                            <div class="small m-t-xs">
                                                <?php echo substr($category->category_detail, 0, 65); if(strlen($category->category_detail) >65){ echo "..."; }?>
                                            </div>
                                            <div class="m-t" style="text-align: right;">
                                                <span class="btn btn-xs btn-outline btn-danger" onclick="delete_category(<?=$category->id?>)">
                                                    Delete
                                                </span>
                                                <a href="edit-device-category/<?=$category->id?>" class="btn btn-xs btn-outline btn-warning">
                                                    Edit
                                                </a>
                                                <a href="<?=base_url() . 'brands-list/'.$category->category_name.'-'.$category->id ?>" class="btn btn-xs btn-outline btn-primary">
                                                    Rel Brands <i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function delete_category(category_id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Device Category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'get',
                    url: '<?=base_url()?>del-device-category/'+category_id,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status = 'TRUE') {
                            swal(res.message, { icon: "success", });
                            $("#div_"+category_id).remove();
                            var total_categories = $("#total_categories").text();
                            total_categories = parseInt(total_categories);
                            total_categories = total_categories - 1;
                            $("#total_categories").text(total_categories);
                        }
                        else{
                            swal(res.message, { icon: "error", });
                        }
                    }
                });
            }
        });
    }
</script>
