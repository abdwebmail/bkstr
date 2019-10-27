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
    <div class="modal inmodal" id="add_Admin" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header" style="padding: 10px 15px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-user-secret modal-icon"></i>
                    <h4 class="modal-title">Add New Admin</h4>
                </div>
                <div class="modal-body" style="padding: 20px 20px 10px 20px;">
                    <form id="add_admin_form">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Muhammad ..." class="form-control" name="admin_name" id="admin_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" placeholder="Email" class="form-control" name="email" id="admin_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Confirm</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Contact</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="contact" id="contact">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Rights</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="admin_privileges" id="admin_privileges">
                                    <option value="">Select Admin Rights</option>
                                    <option value="1">All Rights</option>
                                    <option value="2">Evaluation Person</option>
                                    <option value="3">Sale Person</option>
                                    <option value="4">Managing Person</option>
                                </select>
                            </div>
                        </div>
                        <label id="check_fields" style="display: none;color: red;font-weight: bold;padding: 0px 20px;"></label>
                        <label id="success_res" style="display: none;color: green;font-weight: bold;padding: 0px 20px;"></label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add New</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('Common/header-top'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Admin [ <span id="total_admins"><?= count($all_admins) ?></span> ]</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Admin List</strong>
                    </li>
                </ol>
            </div>
        </div>
        <?php //$this->load->view('Common/notification-nav'); ?>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Admin List</h5>
                            <div class="ibox-tools">
                                <a data-toggle="modal" data-target="#add_Admin">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control form-control-sm m-b-xs" id="filter2" placeholder="Search in table">
                            <table class="admin_table table table-stripped toggle-arrow-tiny"  data-filter=#filter2>
                                <thead>
                                    <tr>
                                        <th data-toggle="true">Admin Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th data-hide="all">Admin Rights: </th>
                                        <th data-hide="all">Is Active: </th>
                                        <th data-hide="all">Is Deleted: </th>
                                        <th data-hide="all">Updated On: </th>
                                        <th data-hide="all">Created On: </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($all_admins) && !empty($all_admins)) {
                                            foreach ($all_admins as $admin) {
                                                ?>
                                                <tr id="div_<?=$admin->id?>">
                                                    <td><?=$admin->admin_name?></td>
                                                    <td><?=$admin->email?></td>
                                                    <td><?=$admin->contact?></td>
                                                    <td><?=admin_right($admin->admin_privileges)?></td>
                                                    <td>
                                                        <span class="<?php if($admin->is_active==1){ echo 'text-navy'; } else { echo 'text-danger'; }?>" >
                                                            <?php
                                                                $result = $admin->is_active = 1 ? "Yes" : "No";
                                                                echo $result;
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="<?php if($admin->is_deleted==0){ $admin_deleted="No"; echo 'text-navy'; } else { $admin_deleted="Yes"; echo 'text-danger'; }?>">
                                                            <?= $admin_deleted ?>
                                                        </span>
                                                    <td><?=$admin->updated_on?></td>
                                                    <td><?=$admin->created_on?></td>
                                                    <td class="text-center">
                                                        <span onclick="del_admin('<?=$admin->id?>')">
                                                            <i class="fa fa-trash-o"></i>
                                                        </span>
                                                        <span onclick="update_admin_view('<?=$admin->id?>')">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="div_update_admin"></div>
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
    $('.admin_table').footable();
    function del_admin(admin_id){
        swal({
            title: "Are you sure to Delete Admin?",
            icon: "warning",
            buttons: true,
            buttons: ["Cancel", "Yes"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'get',
                    url: '<?=base_url()?>del-admin/'+admin_id,
                    dataType: 'json',
                    success: function (res) {
                        if(res.status = 'TRUE') {
                            swal(res.message, { icon: "success", });
                        }
                        else{
                            swal(res.message, { icon: "error", });
                        }
                    }
                });
            }
        });
    }
    // submit admin form
    $("#add_admin_form").submit(function(event){
        $("#check_fields").hide();
        $("#success_res").hide();
        event.preventDefault();
        var admin_name          = $("#admin_name").val().trim();
        var admin_email         = $("#admin_email").val().trim();
        var password            = $("#password").val().trim();
        var confirm_password    = $("#confirm_password").val().trim();
        var contact             = $("#contact").val().trim();
        var admin_privileges    = $("#admin_privileges").val().trim();

        if(admin_name == ''){
            $("#check_fields").show();
            $("#check_fields").text('Please provide Admin Name....');
            $("#admin_name").focus();
            return;
        }
        if(admin_email == ''){
            $("#check_fields").show();
            $("#check_fields").text('Please provide Admin Email....');
            $("#admin_email").focus();
            return;
        }
        if(password == ''){
            $("#check_fields").show();
            $("#check_fields").text('Please provide Admin Password....');
            $("#password").focus();
            return;
        }
        if(confirm_password == ''){
            $("#check_fields").show();
            $("#check_fields").text('Please provide Confirm Password....');
            $("#confirm_password").focus();
            return;
        }
        if(contact == ''){
            $("#check_fields").show();
            $("#check_fields").text('Please provide Admin Contact Number....');
            $("#contact").focus();
            return;
        }
        if(admin_privileges == ''){
            $("#check_fields").show();
            $("#check_fields").text('Please select Admin Privileges....');
            $("#admin_privileges").focus();
            return;
        }
        if(password != confirm_password){
            $("#check_fields").show();
            $("#check_fields").text('Password not matched....');
            $("#password").focus();
            return;
        }

        if((admin_name != '') && (admin_email != '') && (password != '') && (confirm_password != '') && (password == confirm_password) && (contact != '') && (admin_privileges != '')){
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>/submit_newAdmin',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    if(data.status == 'TRUE'){
                        $("#success_res").show();
                        $("#success_res").text(data.message);
                        return;
                    }
                    else{
                        $("#check_fields").show();
                        $("#check_fields").text(data.message);
                        return;
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }

    });

    // Update Admin View
    function update_admin_view(admin_id) {
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>edit-admin_view',
            data: {'admin_id':admin_id},
            dataType: 'json',
            success: function (res) {
                if(res.status == 'TRUE') {
                    $("#div_update_admin").html(res.message);
                    $('#update_admin_modal').modal('show');
                }
                else{
                    swal(res.message, { icon: "error", });
                }
            }
        });
    }

</script>
