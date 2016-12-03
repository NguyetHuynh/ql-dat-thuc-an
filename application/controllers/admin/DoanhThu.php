<?php
Class DoanhThu extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('hoadon_model');
        $this->load->model('chitiethoadon_model');
    }
    /*
     * lay doanh thu theo ngay
     */
    function index()
    {
        $sql = 'SELECT date(hd.NGAY) as ngaythu, SUM(ct.SOLUONG*ct.DONGIA) AS total '
                . 'FROM hoadon as hd '
                . 'JOIN chitiethoadon AS ct '
                . 'ON hd.ID = ct.HOADONID GROUP BY date(hd.NGAY)';
        
        $list = $this->hoadon_model->query($sql);
        $this->data['list'] = $list;
//        pre($list);
        
        $this->data['temp'] = 'admin/DoanhThu/index';
        $this->load->view('admin/main', $this->data);
    }
    /*
     * lay doanh thu theo thang
     */
    function thang()
    {
        $sql = 'SELECT month(hd.NGAY) AS thang, SUM(ct.SOLUONG*ct.DONGIA) AS total '
                . 'FROM hoadon as hd '
                . 'JOIN chitiethoadon AS ct '
                . 'ON hd.ID = ct.HOADONID GROUP BY month(hd.NGAY)';
        $list = $this->hoadon_model->query($sql);
        $this->data['list'] = $list;
//        pre($list);
        
        $this->data['temp'] = 'admin/DoanhThu/thang';
        $this->load->view('admin/main', $this->data);        
    }
}