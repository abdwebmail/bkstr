<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/7/2019
 * Time: 1:21 PM
 */

    function time_convert($time){
        $date1=date_create($time);
        $date2=date_create(date('Y-m-d H:i:s'));
        $diff=date_diff($date2,$date1);

        $srt = '';
        if ($diff->y>0) {
            if($diff->y == 1){ $srt = $diff->y . ' year ago';}
            else { $srt = $diff->y . ' years ago'; }
        }
        else{
            if ($diff->m>0) {
                if($diff->m == 1){ $srt = $diff->m . ' month ago';}
                else { $srt = $diff->m . ' months ago'; }
            }
            else{
                if ($diff->d>0) {
                    if($diff->d == 1){ $srt = $diff->d . ' day ago';}
                    else { $srt = $diff->d . ' days ago'; }
                }
                else{
                    if ($diff->h>0) {
                        if($diff->h == 1){ $srt = $diff->h . ' hour ago';}
                        else { $srt = $diff->h . ' hours ago'; }
                    }
                    else{
                        if ($diff->i>0) {
                            if($diff->i == 1){ $srt = $diff->i . ' min ago';}
                            else { $srt = $diff->i . ' mins ago'; }
                        }
                        else{
                            if ($diff->s>0) {
                                if($diff->s == 1){ $srt = $diff->s . ' seconds ago';}
                                else { $srt = $diff->s . ' seconds ago'; }
                            }
                            else{
                                $srt = '1 second ago';
                            }
                        }
                    }
                }
            }
        }
        return $srt;
    }

    function dateTime_format($dateTime){
        date('F j, Y, g:i a', strtotime($dateTime));
    }
    
    // Number of users registered
    function number_of_registered_users(){
        $ci =& get_instance();
        return json_decode($ci->requesttoserver->getDataCurl('num_of_users'));
    }

    // Number of users verified
    function number_of_verified_users(){
        $ci =& get_instance();
        return json_decode($ci->requesttoserver->getDataCurl('active_users'));
    }

    // Number of read mails
    function num_of_mails(){
        $ci =& get_instance();
        return json_decode($ci->requesttoserver->getDataCurl('num_of_mails'));
    }

    // Number of unread mails
    function num_of_unread_mails(){
        $ci =& get_instance();
        return json_decode($ci->requesttoserver->getDataCurl('num_of_unread_mails'));
    }
    
    // funcation admin rights
    function admin_right($admin_id){
        if($admin_id == '1'){
            return 'All Rights';
        }
        else if($admin_id == '2'){
            return 'Evaluation Person';
        }
        else if($admin_id == '3'){
            return 'Sale Person';
        }
        else if($admin_id == '4'){
            return 'Managing Person';
        }
        else{
            return 'Not Define';
        }
    }
?>