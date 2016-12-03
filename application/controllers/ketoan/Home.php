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
        
        $this->data['temp'] = 'ketoan/home/index';
        $this->load->view('ketoan/main', $this->data);
    }
    
    function bill()
    {
        $hoadonID = $this->uri->rsegment('3');
        //lay info hop 4 bang hoadon, chitiet, khachhang, phucvu
        $sql = 'SELECT hd.ID, banid, datbanid, hinhthucpvu.ID as PhucVuID, hinhthucpvu.PHIPV, 
                hd.TEN, hd.diachi, hd.sodt, tinhtrang, ngay, chitiet.thanhtien FROM 
                (SELECT hoadon.*, khachhang.ten, khachhang.diachi, khachhang.sodt FROM hoadon INNER JOIN khachhang 
                    ON hoadon.khachhangid = khachhang.id
                        AND hoadon.id = '.$hoadonID.') 
                AS hd JOIN 
                ( SELECT hoadonid, sum(soluong*dongia) AS thanhtien FROM chitiethoadon GROUP BY hoadonid ) 
                AS chitiet ON hd.id = chitiet.hoadonid 
                JOIN hinhthucpvu 
                ON hd.hinhthucid = hinhthucpvu.ID';
        $query = $this->chitiethoadon_model->query($sql);
        $this->data['query'] = $query;
        
        //lay ds mon an trong chi tiet theo hoadonid
        $sql2 = 'SELECT a.HOADONID, ta.TEN, a.SOLUONG, a.DONGIA FROM(
                        (SELECT ct.TA_ID, ct.SOLUONG, ct.DONGIA, ct.HOADONID
                    FROM chitiethoadon as ct
                    JOIN hoadon
                    ON hoadon.ID = ct.HOADONID
                     AND ct.HOADONID = '.$hoadonID.') AS a
                    JOIN thucan AS ta
                    ON a.TA_ID = ta.ID
                )';
        $food = $this->chitiethoadon_model->query($sql2);
        $this->data['food'] = $food;
        $hoadon = $this->hoadon_model->getInfoById($hoadonID);
        $datban = $hoadon->DATBANID;
        //if ke toan click vao nut thanh toan
        //update trang thai hoadon -> da thanh toan - 3
        //if tinhtrang != 3 moi update vao db
        if($query[0]->TINHTRANG != 3)
        {
            $data = array('tinhtrang' => 3);
            $this->hoadon_model->update($hoadonID, $data);
//            $status = array('status' => 1);
//            if($datban != NULL)//if co phieu dat ban thi update 1 - co khach nhan
//            {
//                $this->load->model('phieudatban_model');
//                $this->phieudatban_model->update($datban, $status);
//            }            
            $table = array('status' => 0);
            $this->load->model('ban_model');
            $this->ban_model->update($query[0]->BANID, $table);
        } 
        $this->load->view('ketoan/bill/ship', $this->data);
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
        
         
        $this->data['temp'] = 'ketoan/home/taiban';
        $this->load->view('ketoan/main', $this->data);
    }
    
    function taibanbill()
    {
        $hoadonID = $this->uri->rsegment('3');
        $sql = 'SELECT hd.ID, banid, datbanid, hinhthucpvu.ID as PhucVuID, '
                . 'hinhthucpvu.PHIPV, tinhtrang, ngay, chitiet.thanhtien '
                . 'FROM (SELECT * FROM hoadon WHERE hoadon.id = '.$hoadonID.') '
                . 'AS hd JOIN '
                . '( SELECT hoadonid, sum(soluong*dongia) AS thanhtien '
                . 'FROM chitiethoadon GROUP BY hoadonid ) AS chitiet '
                . 'ON hd.id = chitiet.hoadonid J'
                . 'OIN hinhthucpvu '
                . 'ON hd.hinhthucid = hinhthucpvu.ID';
        $query = $this->chitiethoadon_model->query($sql);
        $this->data['query'] = $query;
//        pre($query);
//        echo $query[0]->BANID;
        //lay ds mon an trong chi tiet theo hoadonid
        $sql2 = 'SELECT a.HOADONID, ta.TEN, a.SOLUONG, a.DONGIA FROM(
                        (SELECT ct.ID, ct.TA_ID, ct.SOLUONG, ct.DONGIA, ct.HOADONID
                    FROM chitiethoadon as ct
                    JOIN hoadon
                    ON hoadon.ID = ct.HOADONID
                     AND ct.HOADONID = '.$hoadonID.') AS a
                    JOIN thucan AS ta
                    ON a.TA_ID = ta.ID
                )';
        $food = $this->chitiethoadon_model->query($sql2);
//        pre($food);
        $this->data['food'] = $food;
        
        if($query[0]->TINHTRANG != 3)
        {
            $data = array('tinhtrang' => 3);
            $this->hoadon_model->update($hoadonID, $data);
            $table = array('status' => 0);
            $this->load->model('ban_model');
            $this->ban_model->update($query[0]->BANID, $table);
        }     
        
        $this->load->view('ketoan/bill/table', $this->data);
    }
}
