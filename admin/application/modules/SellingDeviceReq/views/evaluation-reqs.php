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
                            <h5>Device Evaluation Requests</h5>
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
                                <table class="table table-bordered table-hover evaluation_table" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Device</th>
                                            <th>Req From</th>
                                            <th>Req Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php if(isset($selling_requests)){
                                         foreach ($selling_requests as $selling_request) {
                                             ?>
                                             <tr class="gradeU" id="<?=$selling_request->id?>" style="<?php if($selling_request->status == '0'){ echo "background-color:lightgray;'"; } ?>" >
                                                 <td class="text-vertically-center"><?= 'PBD - ' . $selling_request->id ?></td>
                                                 <td class="text-vertically-center" style="cursor: pointer;text-decoration: underline;" onclick="req_detail(<?=$selling_request->id?>)"><?php echo substr($selling_request->first_name, 0, 12); if(strlen($selling_request->first_name)>12){echo "...";} ?></td>
                                                 <td class="text-vertically-center"><?= $selling_request->device_type . ' => <strong>' . $selling_request->device_company . '</strong> - [' . $selling_request->device_model . ']' ?></td>
                                                 <td class="text-horizontally-center text-vertically-center"><?= $selling_request->received_through ?></td>
                                                 <td class="text-vertically-center"><?= date('j M y, g:i a', strtotime($selling_request->reqTime)) ?></td>
                                                 <td class="text-horizontally-center text-vertically-center">
                                                     <button class="btn btn-outline btn-danger dim" style="padding: 2px 7px;margin-bottom: 5px !important;" onclick="del_evaluationReq(<?=$selling_request->id?>)">
                                                         <i class="fa fa-trash"></i>
                                                     </button>
                                                 </td>
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
                                            <th>Req From</th>
                                            <th>Req Time</th>
                                            <th>Action</th>
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
                    $('#'+req_id).remove();
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
    function req_detail(req_id) {
        window.location.href = '<?=base_url()?>req-detail/'+req_id;
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

