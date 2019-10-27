<?php
    $this->load->view('Common/header');
    $this->load->view('Common/left-side-bar');
?>
        <div id="page-wrapper" class="gray-bg">
            <?php $this->load->view('Common/header-top'); ?>

            <?php $this->load->view('Common/notification-nav'); ?>


                <!--<div class="row">-->
                <!--    <div class="col-lg-8">-->
                <!--        <div class="ibox ">-->
                <!--            <div class="ibox-title">-->
                <!--                <h5>Orders</h5>-->
                <!--                <div class="float-right">-->
                <!--                    <div class="btn-group">-->
                <!--                        <button type="button" class="btn btn-xs btn-white active">Today</button>-->
                <!--                        <button type="button" class="btn btn-xs btn-white">Monthly</button>-->
                <!--                        <button type="button" class="btn btn-xs btn-white">Annual</button>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="ibox-content">-->
                <!--                <div class="row">-->
                <!--                    <div class="col-lg-12">-->
                <!--                        <div>-->
                <!--                            <canvas id="lineChart" height="97%"></canvas>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->

                <!--        </div>-->
                <!--    </div>-->
                    <!--<div class="col-lg-4">-->
                    <!--    <div class="ibox ">-->
                    <!--        <div class="ibox-title">-->
                    <!--            <span class="label label-warning float-right">Data has changed</span>-->
                    <!--            <h5>User activity</h5>-->
                    <!--        </div>-->
                    <!--        <div class="ibox-content">-->
                    <!--            <div class="row">-->
                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">Pages / Visit</small>-->
                    <!--                    <h4>236 321.80</h4>-->
                    <!--                </div>-->

                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">% New Visits</small>-->
                    <!--                    <h4>46.11%</h4>-->
                    <!--                </div>-->
                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">Last week</small>-->
                    <!--                    <h4>432.021</h4>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="ibox-content">-->
                    <!--            <div class="row">-->
                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">Pages / Visit</small>-->
                    <!--                    <h4>643 321.10</h4>-->
                    <!--                </div>-->

                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">% New Visits</small>-->
                    <!--                    <h4>92.43%</h4>-->
                    <!--                </div>-->
                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">Last week</small>-->
                    <!--                    <h4>564.554</h4>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="ibox-content">-->
                    <!--            <div class="row">-->
                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">Pages / Visit</small>-->
                    <!--                    <h4>436 547.20</h4>-->
                    <!--                </div>-->

                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">% New Visits</small>-->
                    <!--                    <h4>150.23%</h4>-->
                    <!--                </div>-->
                    <!--                <div class="col-4">-->
                    <!--                    <small class="stats-label">Last week</small>-->
                    <!--                    <h4>124.990</h4>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="row">-->
                <!--    <div class="col-lg-4">-->
                <!--        <div class="ibox ">-->
                <!--            <div class="ibox-title">-->
                <!--                <h5>Small todo list</h5>-->
                <!--                <div class="ibox-tools">-->
                <!--                    <a class="collapse-link">-->
                <!--                        <i class="fa fa-chevron-up"></i>-->
                <!--                    </a>-->
                <!--                    <a class="close-link">-->
                <!--                        <i class="fa fa-times"></i>-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="ibox-content">-->
                <!--                <ul class="todo-list m-t small-list">-->
                <!--                    <li>-->
                <!--                        <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>-->
                <!--                        <span class="m-l-xs todo-completed">Buy a milk</span>-->

                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
                <!--                        <span class="m-l-xs">Go to shop and find some products.</span>-->

                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
                <!--                        <span class="m-l-xs">Send documents to Mike</span>-->
                <!--                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
                <!--                        <span class="m-l-xs">Go to the doctor dr Smith</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>-->
                <!--                        <span class="m-l-xs todo-completed">Plan vacation</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
                <!--                        <span class="m-l-xs">Create new stuff</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
                <!--                        <span class="m-l-xs">Call to Anna for dinner</span>-->
                <!--                    </li>-->
                <!--                </ul>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-lg-8">-->
                <!--        <div class="ibox ">-->
                <!--            <div class="ibox-title">-->
                <!--                <h5>User project list</h5>-->
                <!--                <div class="ibox-tools">-->
                <!--                    <a class="collapse-link">-->
                <!--                        <i class="fa fa-chevron-up"></i>-->
                <!--                    </a>-->
                <!--                    <a class="close-link">-->
                <!--                        <i class="fa fa-times"></i>-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="ibox-content table-responsive">-->
                <!--                <table class="table table-hover no-margins">-->
                <!--                    <thead>-->
                <!--                    <tr>-->
                <!--                        <th>Status</th>-->
                <!--                        <th>Date</th>-->
                <!--                        <th>User</th>-->
                <!--                        <th>Value</th>-->
                <!--                    </tr>-->
                <!--                    </thead>-->
                <!--                    <tbody>-->
                <!--                    <tr>-->
                <!--                        <td><small>Pending...</small></td>-->
                <!--                        <td><i class="fa fa-clock-o"></i> 11:20pm</td>-->
                <!--                        <td>Samantha</td>-->
                <!--                        <td class="text-navy"> <i class="fa fa-level-up"></i> 24% </td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td><span class="label label-warning">Canceled</span> </td>-->
                <!--                        <td><i class="fa fa-clock-o"></i> 10:40am</td>-->
                <!--                        <td>Monica</td>-->
                <!--                        <td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td><small>Pending...</small> </td>-->
                <!--                        <td><i class="fa fa-clock-o"></i> 01:30pm</td>-->
                <!--                        <td>John</td>-->
                <!--                        <td class="text-navy"> <i class="fa fa-level-up"></i> 54% </td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td><small>Pending...</small> </td>-->
                <!--                        <td><i class="fa fa-clock-o"></i> 02:20pm</td>-->
                <!--                        <td>Agnes</td>-->
                <!--                        <td class="text-navy"> <i class="fa fa-level-up"></i> 12% </td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td><small>Pending...</small> </td>-->
                <!--                        <td><i class="fa fa-clock-o"></i> 09:40pm</td>-->
                <!--                        <td>Janet</td>-->
                <!--                        <td class="text-navy"> <i class="fa fa-level-up"></i> 22% </td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td><span class="label label-primary">Completed</span> </td>-->
                <!--                        <td><i class="fa fa-clock-o"></i> 04:10am</td>-->
                <!--                        <td>Amelia</td>-->
                <!--                        <td class="text-navy"> <i class="fa fa-level-up"></i> 66% </td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td><small>Pending...</small> </td>-->
                <!--                        <td><i class="fa fa-clock-o"></i> 12:08am</td>-->
                <!--                        <td>Damian</td>-->
                <!--                        <td class="text-navy"> <i class="fa fa-level-up"></i> 23% </td>-->
                <!--                    </tr>-->
                <!--                    </tbody>-->
                <!--                </table>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

            <?php $this->load->view('footer-copy-right'); ?>
        </div>

            <!-- SMALL CHAT BOX INCLUDE -->
        <!--<?php $this->load->view('small-chatbox'); ?>-->

            <!-- RIGHT SIDE BAR INCLUDE -->
        <?php //$this->load->view('right-side-bar'); ?>
    </div>

<?php $this->load->view('footer'); ?>
<!-- ChartJS-->
<script src="<?=base_url()?>assets/js/plugins/chartJs/Chart.min.js"></script>

<script>
    $(document).ready(function () {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('Welcome to Famous Book Store');

        }, 1300);

        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Example dataset",
                    backgroundColor: "rgba(26,179,148,0.5)",
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: "Example dataset",
                    backgroundColor: "rgba(220,220,220,0.5)",
                    borderColor: "rgba(220,220,220,1)",
                    pointBackgroundColor: "rgba(220,220,220,1)",
                    pointBorderColor: "#fff",
                    data: [65, 59, 80, 81, 56, 55, 40]
                }
            ]
        };

        var lineOptions = {
            responsive: true
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
    });
</script>
