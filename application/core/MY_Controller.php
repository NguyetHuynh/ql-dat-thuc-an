<?php
Class My_Controller extends CI_Controller
{
    //bien gui DL qua view
    public $data = array();
    
    function __construct() {
        parent::__construct();
        $this->load->model('nhanvien_model');        
        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin':
            {
                //xu ly DL khi truy cap vao admin
                $this->load->helper('admin_helper');
                $this->check_login();
                break;
            }
            case 'waiter':
            {
                //xu ly DL khi truy cap vao waiter
                $this->load->helper('admin_helper');
                $this->load->helper('emp_helper');
                $id = $this->check_login();
                $user_info = $this->nhanvien_model->getInfoById($id);
                $this->data['user_info'] = $user_info;
                break;
            }
            case 'tieptan':
            {
                $this->load->helper('admin_helper');
                $this->load->helper('emp_helper');
                $id = $this->check_login();
                $user_info = $this->nhanvien_model->getInfoById($id);
                $this->data['user_info'] = $user_info;
                break;
            }
            case 'chef':
            {
                $this->load->helper('admin_helper');
                $this->load->helper('emp_helper');                
                break;
            }
            case 'ketoan':
            {
                $this->load->helper('admin_helper');
                $this->load->helper('emp_helper');
                $this->check_login();
                break;
            }
            default:
            {
                
            }
        }
    }
    
    private function check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);
        
        $login = $this->session->userdata('login');
        if($login)
        {
            $this->load->model('nhanvien_model');
//            $user_info = $this->nhanvien_model->getInfoById($login);
            return $login;
        }else{
            redirect('home');
        }
    }
}

