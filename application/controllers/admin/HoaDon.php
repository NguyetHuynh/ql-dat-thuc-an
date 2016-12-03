<?php
Class HoaDon extends My_Controller
{
    function __construct() {        
        parent::__construct();
        $this->load->model('hoadon_model');
        $this->load->model('chitiethoadon_model');
        
    }
    /*
     * danh sach phieu giao hang
     */
    function index()
    {
        $this->load->model('khachhang_model');
        $sql = 'SELECT hd.ID, banid, datbanid, hinhthucpvu.ID as PhucVuID, 
                hinhthucpvu.PHIPV, hd.khachhangid, tinhtrang, ngay, chitiet.thanhtien 
                FROM (SELECT * FROM hoadon WHERE hoadon.HINHTHUCID = 2) 
                AS hd JOIN 
                    ( SELECT hoadonid, sum(soluong*dongia) AS thanhtien 
                    FROM chitiethoadon GROUP BY hoadonid ) AS chitiet 
                    ON hd.id = chitiet.hoadonid 
                    JOIN hinhthucpvu 
                    ON hd.hinhthucid = hinhthucpvu.ID';

        $query = $this->chitiethoadon_model->query($sql);
        $this->data['query'] = $query;
        
        $this->data['temp'] = 'admin/hoadon/index';
        $this->load->view('admin/main', $this->data);
    }
    
        
    /*
     * danh sach hoa don tai ban
     */
    function taiban()
    {
        $this->load->model('khachhang_model');
        $sql = 'SELECT hd.ID, banid, datbanid, hinhthucpvu.ID as PhucVuID, hinhthucpvu.PHIPV, hd.khachhangid, 
                tinhtrang, ngay, chitiet.thanhtien 
                FROM (SELECT * FROM hoadon WHERE hoadon.HINHTHUCID = 1) 
                AS hd JOIN 
                    ( SELECT hoadonid, sum(soluong*dongia) AS thanhtien 
                    FROM chitiethoadon GROUP BY hoadonid ) 
                    AS chitiet ON hd.id = chitiet.hoadonid 
                    JOIN hinhthucpvu 
                    ON hd.hinhthucid = hinhthucpvu.ID';

        $query = $this->chitiethoadon_model->query($sql);
        $this->data['query'] = $query;
        
         
        $this->data['temp'] = 'admin/hoadon/taiban';
        $this->load->view('admin/main', $this->data);
    }
}
