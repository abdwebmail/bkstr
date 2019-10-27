<?php
/**
 * Created by PhpStorm.
 * User: MkTech
 * Date: 4/1/2019
 * Time: 9:32 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    public function index(){
        if(isset($this->session->userdata['admin_name']) && !empty($this->session->userdata['admin_name'])) {
            $data['title'] = 'FBS-Admin | Dashboard';
            $this->load->view('dashboard',$data);
        }
        else{
            header('Location: '. base_url().'signin');
        }
    }
    public function dashboard2(){
        $this->load->view('dashboard2');
    }
}