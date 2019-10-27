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
                <h2>Store Locations [ <span id="total_locations"><?= count($all_locations) ?></span> ]</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Store Locations</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Location List</strong>
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
                            <h5>Store Locations</h5>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover location_table" >
                                    <thead>
                                        <tr>
                                            <th>Heading</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($all_locations) && !empty($all_locations) && (count($all_locations)>0)) {
                                                foreach ($all_locations as $location) {
                                                    ?>
                                                    <tr id="location_id_<?=$location->id?>">
                                                        <td><?=$location->place_heading?></td>
                                                        <td><?=$location->contact?></td>
                                                        <td><?=$location->address . ', ' . $location->city . ', ' . $location->state . ', ' . $location->country?></td>
                                                        <td class="text-horizontally-center text-vertically-center">
                                                            <button class="btn btn-warning dim" onclick="edit_loaction('<?=$location->id?>')" style="padding: 2px 7px;margin-bottom: 5px !important;margin-right: unset;">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-outline btn-danger dim" style="padding: 2px 7px;margin-bottom: 5px !important;margin-right: unset;" onclick="delete_location('<?=$location->id?>')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else{
                                                ?>
                                                    <tr>
                                                        <td>No Store Location found</td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function delete_location(location_id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Store Location!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'get',
                    url: '<?=base_url()?>del-location/'+location_id,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status = 'TRUE') {
                            swal(res.message, { icon: "success", });
                            $("#location_id_"+location_id).remove();
                        }
                        else{
                            swal(res.message, { icon: "error", });
                        }
                    }
                });
            }
        });
    }
    function edit_loaction(location_id){
        window.location.href = '<?=base_url()?>edit-location/' + location_id;
    }
    function location_dataTable(){
        $('.location_table').DataTable({
            "order": [],
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: []
        });
    }
    $(document).ready(function(){
        location_dataTable();
    });
</script>
