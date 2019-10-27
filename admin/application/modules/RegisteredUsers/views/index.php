<?php
$this->load->view('Common/header');
$this->load->view('Common/left-side-bar');
?>
<div id="page-wrapper" class="gray-bg">
    <?php $this->load->view('Common/header-top'); ?>
    <?php $this->load->view('Common/notification-nav'); ?>

        <div class="animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Register Users </a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Newsletter Subscribers </a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="ibox ">
                                        <div class="ibox-content" style="border: none;">
                                            <input style="margin: 0px 0px 20px 0px;" type="text" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Search in table">
                                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="20"  data-filter=#filter>
                                                <thead>
                                                <tr>
                                                    <th data-toggle="true">Name</th>
                                                    <th>Email</th>
                                                    <th>Conatct</th>
                                                    <th>City</th>
                                                    <th data-hide="all">Country</th>
                                                    <th data-hide="all">Address</th>
                                                    <th data-hide="all">Registeration Status</th>
                                                    <th data-hide="all">Registered On</th>
                                                    <th>Is Active</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(isset($user_info)){
                                                    foreach ($user_info as $user){
                                                        ?>
                                                        <tr>
                                                            <td><?= $user->first_name . " " . $user->last_name ?></td>
                                                            <td><?= $user->email ?></td>
                                                            <td><?= $user->contact ?></td>
                                                            <td><?= $user->city ?></td>
                                                            <td><?= $user->country ?></td>
                                                            <td><?= $user->address ?></td>
                                                            <td><span class="pie"><?=$user->is_verified + 0.5?>/1</span></td>
                                                            <td><?= date('M j, Y, g:i a', strtotime($user->created_on)) ?></td>
                                                            <td>
                                                                <?php if($user->is_active == '1'){ ?>
                                                                    <i class="fa fa-check text-navy"></i>
                                                                <?php } else { ?>
                                                                    <i class="fa fa-times" style="color: red;"></i>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="5">
                                                        <ul class="pagination float-right"></ul>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <div class="ibox ">
                                        <div class="ibox-content" style="border: none;">
                                            <input style="margin: 0px 0px 20px 0px;" type="text" class="form-control form-control-sm m-b-xs" id="filter_newsletter" placeholder="Search in table">
                                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="20"  data-filter=#filter_newsletter>
                                                <thead>
                                                <tr>
                                                    <th data-toggle="true">Name</th>
                                                    <th>Email</th>
                                                    <th data-hide="all">Subscribed On</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(isset($subscribers)){
                                                    foreach ($subscribers as $subscriber){
                                                        ?>
                                                        <tr>
                                                            <td><?= $subscriber->name ?></td>
                                                            <td><?= $subscriber->email ?></td>
                                                            <td><?= date('M j, Y, g:i a', strtotime($subscriber->subscribed_on)) ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="5">
                                                        <ul class="pagination float-right"></ul>
                                                    </td>
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
            </div>

        </div>
    </div>

<?php $this->load->view('footer-copy-right'); ?>
</div>

<!-- SMALL CHAT BOX INCLUDE -->
<!--<?php $this->load->view('small-chatbox'); ?>-->

<!-- RIGHT SIDE BAR INCLUDE -->
<?php //$this->load->view('right-side-bar'); ?>
</div>

<?php $this->load->view('footer'); ?>
<script>
    $(document).ready(function() {
        $('.footable').footable();
    });
</script>