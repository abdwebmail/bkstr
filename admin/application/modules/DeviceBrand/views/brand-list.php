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
                <h2>Device Brand [ <span id="total_brands"><?= count($all_brands) ?></span> ]</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Device Brands</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Brands List</strong>
                    </li>
                </ol>
            </div>
        </div>
        <?php //$this->load->view('Common/notification-nav'); ?>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <?php
                    if(isset($all_brands) && !empty($all_brands) && (count($all_brands)>0)) {
                        foreach ($all_brands as $brand) {
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-3" style="float: left;" id="div_<?=$brand->id?>">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation" style="padding: 0px;">
                                            <img style="width: 100%;height: 246px;" src="<?= ROOT_DIR .'assets/images/category_brands/'.$brand->image ?>"/>
                                        </div>
                                        <div class="product-desc">
                                            <small class="text-muted"><?=$brand->category_name ?></small>
                                            <span class="product-name"> <?=$brand->brand_name?></span>
                                            <div class="small m-t-xs">
                                                <?php echo substr($brand->brand_detail, 0, 65); if(strlen($brand->brand_detail) >65){ echo "..."; }?>
                                            </div>
                                            <div class="m-t" style="text-align: right;">
                                                <span class="btn btn-xs btn-outline btn-danger" onclick="delete_brand(<?=$brand->id?>)">
                                                    Delete
                                                </span>
                                                <a href="<?=base_url()?>edit-device-brand/<?=$brand->id?>" class="btn btn-xs btn-outline btn-warning">
                                                    Edit
                                                </a>
                                                <a href="<?=base_url() . 'products-list/'.$brand->brand_name.'-'.$brand->id ?>" class="btn btn-xs btn-outline btn-primary">
                                                    Rel Products <i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div class="col-xs-12 col-sm-12 col-md-12" style="float: left;">
                                <div class="ibox">
                                    <div class="ibox-content product-box" style="padding: 2pc 0px;">
                                        <h1 style="text-align: center">No related BRAND found</h1>
                                    </div>
                                </div>
                            </div>
                        <?php
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

<?php $this->load->view('detail-footer'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function delete_brand(brand_id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Device Brand!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'get',
                    url: '<?=base_url()?>del-device-brand/'+brand_id,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status = 'TRUE') {
                            swal(res.message, { icon: "success", });
                            $("#div_"+brand_id).remove();
                            var total_brands = $("#total_brands").text();
                            total_brands = parseInt(total_brands);
                            total_brands = total_brands - 1;
                            $("#total_brands").text(total_brands);
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
