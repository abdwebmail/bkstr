<table class="table table-hover table-mail">
    <tbody>
    <?php if(isset($all_mails)){
        foreach ($all_mails as $mail){
            ?>
            <tr class="<?php if($mail->_read=='1'){echo 'read';} else { echo 'unread';} ?> ">
                <td class="check-mail">
                    <input type="checkbox" class="i-checks">
                </td>
                <td class="mail-ontact">
                    <a href="<?=base_url()?>mail-detail/<?=$mail->id?>">
                        <?php echo substr($mail->user_name, 0, 15); if(strlen($mail->user_name)>15){echo ' ...'; } ?>
                    </a>
                </td>
                <td class="mail-subject">
                    <a href="<?=base_url()?>mail-detail/<?=$mail->id?>">
                        <?php echo substr($mail->message,0,40); if(strlen($mail->message)>40){echo ' ...'; } ?>
                    </a>
                </td>
                <td class="text-right mail-date"><?= date('M j, Y, g:i a', strtotime($mail->submission_date)) ?></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>