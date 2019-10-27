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
                            <h5>Device Buying Requests</h5>
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
                                <table class="table table-bordered table-hover buying_table" >
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
                                     <?php if(isset($buying_requests)){
                                         foreach ($buying_requests as $buying_request) {
                                             ?>
                                             <tr class="gradeU" id="<?=$buying_request->id?>" style="<?php if($buying_request->status == '0'){ echo "background-color:lightgray;'"; } ?>" >
                                                 <td class="text-vertically-center"><?= 'PBD - ' . $buying_request->id ?></td>
                                                 <td class="text-vertically-center" style="cursor: pointer;text-decoration: underline;" onclick="buy_req_detail(<?=$buying_request->id?>)"><?php echo substr($buying_request->client_name, 0, 12); if(strlen($buying_request->client_name)>12){echo "...";} ?></td>
                                                 <td class="text-vertically-center"><?= $buying_request->category_name . ' => <strong>' . $buying_request->product_model . '</strong>' ?></td>
                                                 <td class="text-horizontally-center text-vertically-center"><?= $buying_request->received_through ?></td>
                                                 <td class="text-vertically-center"><?= date('j M y, g:i a', strtotime($buying_request->reqTime)) ?></td>
                                                 <td class="text-horizontally-center text-vertically-center">
                                                     <?php if($buying_request->status_buy == '3'){
                                                         ?>
                                                         <button class="btn btn-primary btn-circle" type="button"><i class="fa fa-check"></i></button>
                                                     <?php } else{ ?>
                                                         <button class="btn btn-outline btn-danger dim" style="padding: 2px 7px;margin-right: 0px;margin-bottom: 5px !important;" onclick="del_buyingReq(<?=$buying_request->id?>)"><i class="fa fa-trash"></i></button>
                                                     <?php } ?>
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
    function del_buyingReq(req_id){
        $('#loader').children('.ibox-content').toggleClass('sk-loading');
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>trash_buyingingReq',
            data: {'id':req_id},
            dataType: 'json',
            success: function (res) {
                $('#loader').children('.ibox-content').toggleClass('sk-loading');
                if(res.status = 'TRUE') {
                    swal({
                        title: "Buying Request",
                        text: res.message,
                        type: "success"
                    });
                    $('#'+req_id).remove();
                }
                else{
                    swal({
                        title: "Buying Request",
                        text: res.message,
                        type: "error"
                    });
                }
            }
        });
    }
    function buy_req_detail(req_id) {
        window.location.href = '<?=base_url()?>buy-req-detail/'+req_id;
    }
    function buying_dataTable(){
        $('.buying_table').DataTable({
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
        buying_dataTable();
    });
</script>

