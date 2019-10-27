<script>
    // submit admin form
    function update_Admin() {
        $("#update_check_fields").hide();
        $("#update_success_res").hide();
        event.preventDefault();
        var admin_id            = $("#admin_id").val().trim();
        var admin_name          = $("#update_admin_name").val().trim();
        var admin_email         = $("#update_admin_email").val().trim();
        var password            = $("#update_password").val().trim();
        var confirm_password    = $("#update_confirm_password").val().trim();
        var contact             = $("#update_contact").val().trim();
        var admin_privileges    = $("#update_admin_privileges").val().trim();
        var is_active           = $('#is_active').is(':checked');
        var is_deleted          = $('#is_deleted').is(':checked');
        if(is_active){
            is_active = 1;
        }
        else{
            is_active = 0;
        }
        if(is_deleted){
            is_deleted = 1;
        }
        else{
            is_deleted = 0;
        }

        if (admin_name == '') {
            $("#update_check_fields").show();
            $("#update_check_fields").text('Please provide Admin Name....');
            $("#update_admin_name").focus();
            return;
        }
        if (admin_email == '') {
            $("#update_check_fields").show();
            $("#update_check_fields").text('Please provide Admin Email....');
            $("#update_admin_email").focus();
            return;
        }
        if (password != '') {
            if (confirm_password == '') {
                $("#update_check_fields").show();
                $("#update_check_fields").text('Please provide Confirm Password....');
                $("#update_confirm_password").focus();
                return;
            }
            if (password != confirm_password) {
                $("#update_check_fields").show();
                $("#update_check_fields").text('Password not matched....');
                $("#update_password").focus();
                return;
            }
        }
        else{
            password = '';
            confirm_password = '';
        }
        if (contact == '') {
            $("#update_check_fields").show();
            $("#update_check_fields").text('Please provide Admin Contact Number....');
            $("#update_contact").focus();
            return;
        }
        if (admin_privileges == '') {
            $("#update_check_fields").show();
            $("#update_check_fields").text('Please select Admin Privileges....');
            $("#update_admin_privileges").focus();
            return;
        }

        if ((admin_name != '') && (admin_email != '') && (contact != '') && (admin_privileges != '')) {
            $.ajax({
                url: '<?=base_url()?>/update_admin',
                type: 'POST',
                data: {'admin_id':admin_id,'admin_name':admin_name,'email':admin_email,'password':password,'confirm_password':confirm_password,'contact':contact,'admin_privileges':admin_privileges,'is_active':is_active,'is_deleted':is_deleted},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 'TRUE') {
                        $("#update_success_res").show();
                        $("#update_success_res").text(data.message);
                        return;
                    } else {
                        $("#update_check_fields").show();
                        $("#update_check_fields").text(data.message);
                        return;
                    }
                }
            });
        }
    }


</script>
<div class="modal inmodal" id="update_admin_modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header" style="padding: 10px 15px;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user-secret modal-icon"></i>
                <h4 class="modal-title">Update Admin</h4>
            </div>
            <div class="modal-body" style="padding: 20px 20px 10px 20px;">
                <form id="update_admin_form">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Name</label>
                        <div class="col-lg-10">
                            <input type="hidden" name="admin_id" id="admin_id" value="<?=$admin_detail->id?>">
                            <input type="text" placeholder="Muhammad ..." class="form-control" name="admin_name" id="update_admin_name" value="<?=$admin_detail->admin_name?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" placeholder="Email" class="form-control" name="email" id="update_admin_email" value="<?=$admin_detail->email?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password" id="update_password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Confirm</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="confirm_password" id="update_confirm_password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Contact</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="contact" id="update_contact" value="<?=$admin_detail->contact?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Rights</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="admin_privileges" id="update_admin_privileges">
                                <option <?php if($admin_detail->admin_privileges==''){ echo 'selected'; } ?> value="">Select Admin Rights</option>
                                <option <?php if($admin_detail->admin_privileges=='1'){ echo 'selected'; } ?> value="1">All Rights</option>
                                <option <?php if($admin_detail->admin_privileges=='2'){ echo 'selected'; } ?> value="2">Evaluation Person</option>
                                <option <?php if($admin_detail->admin_privileges=='3'){ echo 'selected'; } ?> value="3">Sale Person</option>
                                <option <?php if($admin_detail->admin_privileges=='4'){ echo 'selected'; } ?> value="4">Managing Person</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Delete</label>
                        <div class="col-lg-4 col-form-label">
                            <input type="checkbox" class="form-control" name="is_deleted" id="is_deleted" <?php if($admin_detail->is_deleted=='1'){echo "checked";} ?>>
                        </div>
                        <label class="col-lg-2 col-form-label">Active</label>
                        <div class="col-lg-4 col-form-label">
                            <input type="checkbox" class="form-control" name="is_active" id="is_active" <?php if($admin_detail->is_active=='1'){echo "checked";} ?>>
                        </div>
                    </div>
                    <label id="update_check_fields" style="display: none;color: red;font-weight: bold;padding: 0px 20px;"></label>
                    <label id="update_success_res" style="display: none;color: green;font-weight: bold;padding: 0px 20px;"></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" onclick="update_Admin()" class="btn btn-primary">Update Admin</button>
            </div>
            </form>
        </div>
    </div>
</div>
