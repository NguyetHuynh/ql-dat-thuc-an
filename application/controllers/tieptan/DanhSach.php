<?php
Class DanhSach extends My_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->model('hoadon_model');
        $this->load->model('chitiethoadon_model');
        $this->load->model('khachhang_model');
        
        $hoadon = $this->hoadon_model->getList();
        $this->data['hoadon'] = $hoadon;
        
        $this->data['temp'] = 'tieptan/danhsach/index';
        $this->load->view('tieptan/main', $this->data);
    }
}
