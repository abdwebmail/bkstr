<ul class="dropdown-menu dropdown-messages dropdown-menu-right">
    <?php
        if(isset($unread_mails)){
            foreach ($unread_mails as $unread_mail){
                ?>
                <li>
                    <div class="dropdown-messages-box">
                        <a class="dropdown-item float-left" href="<?=base_url()?>mail-detail/<?=$unread_mail->id?>">
                            <img alt="image" class="rounded-circle" src="<?=base_url()?>assets/img/user-contact.png">
                        </a>
                        <div class="media-body" style="cursor: pointer;" onclick="mail_detail('<?=base_url()?>mail-detail/<?=$unread_mail->id?>')">
                            <strong><?=$unread_mail->user_name?></strong><br>
                            <p style="margin: 0px;"><?php echo substr($unread_mail->message, 0, 25); if(strlen($unread_mail->message) > 25) { echo " ....."; } ?></p>
                            <small class="float-right"><?= date('M j, Y, g:i a', strtotime($unread_mail->submission_date)) ?></small>
                        </div>
                    </div>
                </li>
                <li class="dropdown-divider"></li>
            <?php
            }
        }
    ?>
    <li>
        <div class="text-center link-block">
            <a href="<?=base_url()?>inbox" class="dropdown-item">
                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
            </a>
        </div>
    </li>
</ul>
<script>
    function mail_detail(url){
        window.location.href = url;
    }
</script>