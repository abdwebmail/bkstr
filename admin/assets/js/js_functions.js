function num_reg_users(){
    $.ajax({
        type: 'post',
        url: 'num_of_users',
        success: function (res) {
            $("#num_regUsers_loader").hide();
            $("#num_regUsers").html(res);
        }
    });
}
function num_active_users(){
    $.ajax({
        type: 'post',
        url: 'active_users',
        success: function (res) {
            $("#num_activeUsers_loader").hide();
            $("#num_activeUsers").html(res);
        }
    });
}

function num_of_mails(){
    $.ajax({
        type: 'post',
        url: 'num_of_mails',
        success: function (res) {
            $("#num_mails_loader").hide();
            $(".num_mails").html(res);
        }
    });
}
function num_of_sent_mails(){
    $.ajax({
        type: 'post',
        url: 'num_of_sent_mails',
        success: function (res) {
            $(".num_sentMails").html(res);
        }
    });
}
function num_of_unread_mails(){
    $.ajax({
        type: 'post',
        url: 'num_of_unread_mails',
        success: function (res) {
            $("#num_unreadMails_loader").hide();
            $(".num_unreadMails").html(res);
        }
    });
}
function unread_mails(from=0){
    $.ajax({
        type: 'post',
        data: {"from":from},
        url: 'unread_mails',
        dataType: 'json',
        success: function (res) {
            $("#unread_mails_loader").hide();
            if (res.status == "TRUE") {
                $("#unread_mails").html(res.message);
            }
        }
    });
}

function num_of_selling_req(){
    $.ajax({
        type: 'post',
        url: 'num_of_selling_req',
        success: function (res) {
            $("#num_sellReq_loader").hide();
            $("#num_sellReq").html(res);
        }
    });
}
function num_of_unread_selling_req(){
    $.ajax({
        type: 'post',
        url: 'num_of_unread_selling_req',
        success: function (res) {
            $("#num_newSellReq_loader").hide();
            $("#num_newSellReq").html(res);
        }
    });
}

function num_of_buying_req(){
    $.ajax({
        type: 'post',
        url: 'num_of_buying_req',
        success: function (res) {
            $("#num_buyReq_loader").hide();
            $("#num_buyReq").html(res);
        }
    });
}
function num_of_unread_buying_req(){
    $.ajax({
        type: 'post',
        url: 'num_of_unread_buying_req',
        success: function (res) {
            $("#num_newBuyReq_loader").hide();
            $("#num_newBuyReq").html(res);
        }
    });
}

$(document).ready(function(){
    $("#num_regUsers_loader").show();
    $("#num_activeUsers_loader").show();
    $("#num_mails_loader").show();
    $("#num_unreadMails_loader").show();
    $("#num_sellReq_loader").show();
    $("#num_newSellReq_loader").show();
    $("#num_buyReq_loader").show();
    $("#num_newBuyReq_loader").show();

    num_reg_users();
    num_active_users();

    num_of_mails();
    num_of_sent_mails();
    num_of_unread_mails();
    unread_mails();

    num_of_selling_req();
    num_of_unread_selling_req();

    num_of_buying_req();
    num_of_unread_buying_req();
});
