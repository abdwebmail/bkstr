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
                        <div class="ibox-title">
                            <h5>Device Buying Status Requests</h5>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover buy_status_table" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Device</th>
                                            <th class="text-horizontally-center">Contact</th>
                                            <th class="text-horizontally-center">Buying Status</th>
                                            <th class="text-horizontally-center">Buy Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php if(isset($buying_status_req)){
                                         foreach ($buying_status_req as $req) {
                                             ?>
                                             <tr class="gradeU" onclick="buy_req_status_detail(<?=$req->id?>)" style="cursor: pointer; <?php if($req->status_buy == '0'){ echo "background-color:lightgray;'"; } ?>" >
                                                 <td class="text-vertically-center"><?= 'PBD - ' . $req->id ?></td>
                                                 <td class="text-vertically-center"><?php echo substr($req->client_name, 0, 12); if(strlen($req->client_name)>12){echo "...";} ?></td>
                                                 <td class="text-vertically-center"><?= $req->category_name . ' => <strong>' . $req->product_model . '</strong>' ?></td>
                                                 <td class="text-horizontally-center text-vertically-center"><?= $req->client_contact ?></td>
                                                 <td class="text-horizontally-center text-vertically-center">
                                                     <?php if( ($req->status_buy=='0')||($req->status_buy=='1')||($req->status_buy=='2')){ echo "Pending"; }
                                                            else if ($req->status_buy == '3') { ?>
                                                            <label class="btn btn-primary btn-rounded" href="#">Completed</label>
                                                     <?php } else { echo "Abort"; } ?></td>
                                                 <td class="text-horizontally-center text-vertically-center"><?= $req->buying_price ?></td>
                                             </tr>
                                             <?php
                                         }
                                     }
                                     ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Device</th>
                                            <th class="text-horizontally-center">Contact</th>
                                            <th class="text-horizontally-center">Buying Status</th>
                                            <th class="text-horizontally-center">Buy Price</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
    function buy_req_status_detail(req_id) {
        window.location.href = '<?=base_url()?>buying-status-detail/'+req_id;
    }
    function buy_status_dataTable(){
        $('.buy_status_table').DataTable({
            pageLength: 15,
            "order": [],
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });
    }
    $(document).ready(function(){
        buy_status_dataTable();
    });
</script>

