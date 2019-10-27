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
                <h2>Device Products [ <span id="total_products"><?= count($all_products) ?></span> ]</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Device Products</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Product List</strong>
                    </li>
                </ol>
            </div>
        </div>
        <?php //$this->load->view('Common/notification-nav'); ?>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <?php
                    if(isset($all_products) && !empty($all_products) && (count($all_products)>0)) {
                        foreach ($all_products as $product) {
                            ?>
                            <div class="col-xs-6 col-sm-6 col-md-3" style="float: left;" id="div_<?=$product->id?>">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation" style="padding: 0px;">
                                            <img style="width: 100%;height: 200px;" src="<?= ROOT_DIR .'assets/images/brand_products/'.$product->image ?>"/>
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price" <?php if($product->stock==0){echo 'style="background-color: #e63333;"';} ?> ><?= $product->stock ?></span>
                                            <small class="text-muted"><?=$product->category_name . ' [' .$product->brand_name. ']' ?></small>
                                            <span class="product-name"> <?=$product->product_model?></span>
                                            <div class="small m-t-xs">
                                                <?php echo substr($product->product_detail, 0, 65); if(strlen($product->product_detail) >65){ echo "..."; }?>
                                            </div>
                                            <div class="m-t" style="text-align: right;">
                                                <span class="btn btn-xs btn-outline btn-danger" onclick="delete_product(<?=$product->id?>)">
                                                    Delete
                                                </span>
                                                <a href="<?=base_url()?>edit-device-product/<?=$product->id?>" class="btn btn-xs btn-outline btn-warning">
                                                    Edit
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
                                        <h1 style="text-align: center">No related PRODUCT found</h1>
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
    function delete_product(product_id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Device Product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'get',
                    url: '<?=base_url()?>del-device-product/'+product_id,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status = 'TRUE') {
                            swal(res.message, { icon: "success", });
                            $("#div_"+product_id).remove();
                            var total_products = $("#total_products").text();
                            total_products = parseInt(total_products);
                            total_products = total_products - 1;
                            $("#total_products").text(total_products);
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
