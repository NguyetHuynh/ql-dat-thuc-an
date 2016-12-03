<?php
Class Home extends My_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('hoadon_model');
        $this->load->model('chitiethoadon_model');
    }
    
    function index()
    {
        $this->load->model('khachhang_model');
        //lay thong tin de in ra bang o index
        $sql = 'SELECT hd.ID, banid, datbanid, hinhthucpvu.ID as PhucVuID, hd.NGAY,
                hinhthucpvu.PHIPV, hd.khachhangid, tinhtrang, ngay, chitiet.thanhtien 
                FROM (SELECT * FROM hoadon WHERE tinhtrang <> 3) 
                AS hd JOIN 
                    ( SELECT hoadonid, sum(soluong*dongia) AS thanhtien 
                    FROM chitiethoadon GROUP BY hoadonid ) AS chitiet 
                    ON hd.id = chitiet.hoadonid 
                    JOIN hinhthucpvu 
                    ON hd.hinhthucid = hinhthucpvu.ID';

        $query = $this->chitiethoadon_model->query($sql);
        $this->data['query'] = $query;
        
        //lay tong so don hang
        $qty_bill = $this->hoadon_model->getTotal();
        $this->data['qty_bill'] = $qty_bill;
        //lay so don hang chua giao
        $chuagiao['where'] = array('tinhtrang <' => 2);
        $qty_chua = $this->hoadon_model->getTotal($chuagiao);
        $this->data['qty_chua'] = $qty_chua;
        //lay so don hang dang giao, da phuc vu, chua thanh toan
        $danggiao['where'] = array('tinhtrang' => 2);
        $qty_dang = $this->hoadon_model->getTotal($danggiao);
        $this->data['qty_dang'] = $qty_dang;
        
        //lay doanh thu theo ngay
        $day = 'SELECT curdate() AS NGAY, SUM(c.DONGIA) AS total
                FROM hoadon, chitiethoadon AS c
                WHERE date(hoadon.NGAY) = curdate()
                        AND c.HOADONID = hoadon.ID';        
        $theongay = $this->hoadon_model->query($day);
        $this->data['theongay'] = $theongay;
        
        //lay doanh theo thang
        $sql = 'SELECT month(curdate()) as thang, SUM(ct.SOLUONG*ct.DONGIA) AS total '
                . 'FROM hoadon as hd JOIN chitiethoadon AS ct '
                . 'ON hd.ID = ct.HOADONID '
                . 'AND month(hd.NGAY) = month(curdate())';
        $theothang = $this->hoadon_model->query($sql);
        $this->data['theothang'] = $theothang;
        
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}

