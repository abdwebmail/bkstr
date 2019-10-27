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
                            <h5>Device Evaluated Selling Requests</h5>
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
                                <table class="table table-bordered table-hover evaluation_table" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Device</th>
                                            <th>Contact</th>
                                            <th>Selling Status</th>
                                            <th>Sell Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php if(isset($eval_selling_requests)){
                                         foreach ($eval_selling_requests as $eval_selling_request) {
                                             ?>
                                             <tr class="gradeU" onclick="sell_req_detail(<?=$eval_selling_request->id?>)" style="cursor: pointer; <?php if($eval_selling_request->status_sale == '0'){ echo "background-color:lightgray;'"; } ?>" >
                                                 <td class="text-vertically-center"><?= 'PBD - ' . $eval_selling_request->id ?></td>
                                                 <td class="text-vertically-center"><?php echo substr($eval_selling_request->first_name, 0, 12); if(strlen($eval_selling_request->first_name)>12){echo "...";} ?></td>
                                                 <td class="text-vertically-center"><?= $eval_selling_request->device_type . ' => <strong>' . $eval_selling_request->device_company . '</strong> - [' . $eval_selling_request->device_model . ']' ?></td>
                                                 <td class="text-horizontally-center text-vertically-center"><?= $eval_selling_request->contact ?></td>
                                                 <td class="text-horizontally-center text-vertically-center"><?php if( ($eval_selling_request->status_sale == '0') || ($eval_selling_request->status_sale == '1') || ($eval_selling_request->status_sale == '2') ){ echo "Selling Pending"; } else if ($eval_selling_request->status_sale == '3') { echo "Selling Completed"; } else { echo "Selling Abort"; } ?></td>
                                                 <td class="text-horizontally-center text-vertically-center"><?= $eval_selling_request->sale_price ?></td>
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
                                            <th>Contact</th>
                                            <th>Selling Status</th>
                                            <th>Sell Price</th>
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
    function del_evaluationReq(req_id){
        $('#loader').children('.ibox-content').toggleClass('sk-loading');
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>trash_sellingReq',
            data: {'id':req_id},
            dataType: 'json',
            success: function (res) {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                if(res.status = 'TRUE') {
                    swal({
                        title: "Evaluation Request",
                        text: res.message,
                        type: "success"
                    });
                }
                else{
                    swal({
                        title: "Evaluation Request",
                        text: res.message,
                        type: "error"
                    });
                }
            }
        });
    }
    function sell_req_detail(req_id) {
        window.location.href = '<?=base_url()?>selling-req-detail/'+req_id;
    }
    function evaluate_dataTable(){
        $('.evaluation_table').DataTable({
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
        evaluate_dataTable();
    });
</script>

