<?php
include_once APPPATH.'config/project_constants.php';
/**
 * Date: 12/28/2018
 * Time: 11:07 AM
 */
class RequestToServer
{
    protected $base_url_api;
    function __construct()
    {
        $this->base_url_api = base_url();
    }

    /**********************************************
    * Send Curl Request to Get data
    **********************************************/
    public function getDataCurl($action)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->base_url_api.$action);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return $server_output;
    }

    /**********************************************
    * send Curl Request to Delete data
    **********************************************/
    public function deleteReqCurl($action)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->base_url_api.$action);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return $server_output;
    }

    /**********************************************
    * Send Curl Request With Post data
    **********************************************/
    public function sendDataCurl($data,$action)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->base_url_api.$action);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return $server_output;
    }
}