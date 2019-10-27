<table class="table table-hover table-mail">
    <tbody>
    <?php
    if(isset($sent_mails) && !empty($sent_mails)) {
        foreach ($sent_mails as $mail) {
            ?>
            <tr class="read">
                <td class="check-mail">
                    <input type="checkbox" class="i-checks">
                </td>
                <td class="mail-ontact">
                    <a href="<?= base_url() ?>sent-mailDetail/<?= $mail->id ?>">
                        <?php echo substr($mail->email, 0, 30);
                        if (strlen($mail->email) > 30) {
                            echo ' ...';
                        } ?>
                    </a>
                </td>
                <td class="mail-subject">
                    <a href="<?= base_url() ?>sent-mailDetail/<?= $mail->id ?>">
                        <?php echo substr($mail->subject, 0, 40);
                        if (strlen($mail->subject) > 40) {
                            echo ' ...';
                        } ?>
                    </a>
                </td>
                <td class="text-right mail-date"><?= date('M j, Y, g:i a', strtotime($mail->created_on)) ?></td>
            </tr>
            <?php
        }
    }
    else{
        ?>
            <tr class="read">
                <td>No mail has been sent.</td>
            </tr>
        <?php
    }
    ?>
    </tbody>
</table>