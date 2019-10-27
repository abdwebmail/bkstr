<?= $this->load->view('Common/header'); ?>

    <body class="gray-bg">

        <div class="loginColumns animated fadeInDown">
            <div class="row">

                <div class="col-md-6">
                    <h2 class="font-bold">Welcome to FamousBooks</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled </p>
                    <p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <p><small>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled </small></p>
                </div>
                <div class="col-md-6">
                    <div class="ibox-content" style="margin-top: 30px;">
                        <div class="loader_main">
                            <div class="loader_load" id="admin_signin_form_loader"></div>
                            <form class="m-t" role="form" id="admin_signin_form">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Admin Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                                <label style="display:none;padding-left: 10px;color: green;font-weight: 600;" id="lbl_success_login"></label>
                                <label style="display:none;padding-left: 10px;color: red;font-weight: 600;" id="lbl_fields_check"></label>
                                <button type="submit" id="admin-login-submit" class="btn btn-primary block full-width m-b">Login</button>
                                <a href="#">
                                    <small>Forgot password?</small>
                                </a>
                            </form>
                        </div>
                        <p class="m-t">
                            <small>Famous Books &copy; 2018-19</small>
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <a href="#" >Abdullah Tariq</a>
                </div>
                <div class="col-md-6 text-right">
                    <small>© 2019</small>
                </div>
            </div>
        </div>

    </body>
</html>
<script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
<script>
    $("#admin_signin_form").submit(function(e){
        e.preventDefault();
        $("#lbl_fields_check").hide();
        var email 		= $("#email").val().trim();
        var password 	= $("#password").val().trim();

        if(email == ''){
            $("#lbl_fields_check").show();
            $("#lbl_fields_check").text("Email required");
            $("#email").focus();
        }
        if(password == ''){
            $("#lbl_fields_check").show();
            $("#lbl_fields_check").text("Password required");
            $("#password").focus();
        }

        if ((email != '') && (password != '')){
            $("#admin_signin_form_loader").show();
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>/admin_login',
                dataType: 'json',
                data: {
                    'login-modal': 'Login from nav bar model.',
                    'email': email,
                    'password': password
                },
                success: function (res) {
                    if(res.status == 'TRUE'){
                        $("#lbl_success_login").show();
                        $("#lbl_success_login").text('Credentials match, successfully logeddIn.');
                        setTimeout(function(){
                            $("#admin_signin_form_loader").hide();
                            location.href =  '<?=base_url()?>';
                        }, 3000);
                    }
                    else{
                        $("#lbl_fields_check").show();
                        $("#lbl_fields_check").text(res.message);
                        $("#admin_signin_form_loader").hide();
                    }
                },
                error: function (res) {
                    $("#lbl_fields_check").show();
                    $("#lbl_fields_check").text("Something went wrong, please try again.");
                    $("#admin_signin_form_loader").hide();
                }
            });
        }

    });
</script>
