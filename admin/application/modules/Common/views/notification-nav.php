<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <!--<span class="label label-success float-right">Monthly</span>-->
                    <h5>Registered Users</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="num_regUsers">
                        <div class="loader_main">
                            <div class="loader_load" id="num_regUsers_loader"></div>
                            0
                        </div>
                    </h1>
                    <a href="<?=base_url()?>users">
                        <div class="loader_main">
                            <div class="loader_load" id="num_activeUsers_loader"></div>
                            <div class="stat-percent font-bold text-success">
                                <span id="num_activeUsers">0 </span>
                                <i class="fa fa-bolt"></i>
                            </div>
                            <small>Active Users</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Mails</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins num_mails" id="num_mails">
                        <div class="loader_main">
                            <div class="loader_load" id="num_mails_loader"></div>
                            0
                        </div>
                    </h1>
                    <a href="<?=base_url()?>inbox">
                        <div class="loader_main">
                            <div class="loader_load" id="num_unreadMails_loader"></div>
                            <div class="stat-percent font-bold text-info">
                                <span class="num_unreadMails">0 </span>
                            </div>
                            <small>New Mail</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Selling Requests</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="num_sellReq">
                        <div class="loader_main">
                            <div class="loader_load" id="num_sellReq_loader"></div>
                            0
                        </div>
                    </h1>
                    <a href="<?=base_url()?>selling-reqs">
                        <div class="loader_main">
                            <div class="loader_load" id="num_newSellReq_loader"></div>
                            <div class="stat-percent font-bold text-navy">
                                <span id="num_newSellReq">0 </span>
                            </div>
                            <small>New Request</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Buying Requests</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="num_buyReq">
                        <div class="loader_main">
                            <div class="loader_load" id="num_buyReq_loader"></div>
                            0
                        </div>
                    </h1>
                    <a href="<?=base_url()?>buy-req">
                        <div class="loader_main">
                            <div class="loader_load" id="num_newBuyReq_loader"></div>
                            <div class="stat-percent font-bold text-danger">
                                <span id="num_newBuyReq">0 </span>
                            </div>
                            <small>New Request</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    