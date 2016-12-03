<?php
Class DatBan extends My_Controller
{
    function __construct() {
        parent::__construct();
        
    }
    function index()
    {
        $this->load->model('ban_model');
        $this->load->model('phieudatban_model');
        $this->load->model('chitietdatban_model');
        $sql = 'SELECT p.*, k.TEN, k.SODT
                FROM phieudatban AS p
                JOIN khachhang AS k
                ON p.KHACHHANGID = k.ID';
        $phieu = $this->phieudatban_model->query($sql);
        
        $ban = $this->chitietdatban_model->getList();
        $this->data['phieu'] = $phieu;
        $this->data['ban'] = $ban;
        $this->data['temp'] = 'admin/DatBan/index';
        $this->load->view('admin/main', $this->data);       
    }
}
