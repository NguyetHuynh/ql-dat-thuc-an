<?php
Class MY_Model extends CI_Model
{
    var  $table = '';
    var $key = 'id';
    var $order = '';
    var $select = '';
    
    function __construct() {
        parent::__construct();
    }
    
    //them du lieu vao bang
    //$data = array('tenchucvu' => $ten);
    function add($data = array())
    {
        if($this->db->insert($this->table, $data))
        {
            return TRUE;
        }else {
            return FALSE;
        }
    }
 
    //update DL by id
    /*$data = array(
          'tenchucvu' => 'Tiep tan'  
        );
     * $id = 3
     * */
    function update($id, $data)
    {
        if (!$id)
        {
            return FALSE;
        }

        $where = array();
        $where[$this->key] = $id;
        $this->update_rule($where, $data);
         
        return TRUE;
    }
    
    function update_rule($where, $data)
    {
        if (!$where)
        {
            return FALSE;
        }

        $this->db->where($where);
        $this->db->update($this->table, $data);

        return TRUE;
    }
    
    /*
     * xoa voi id
     * $id = 4 hoac $id = '1,2,3'
     */
    function delete($id)
    {
        if(isset($id))
        {
            if(is_numeric($id))
            {
                $where = array();
                $where[$this->key] = $id;
            }else{
                //xoa nhieu id cung luc
                $where = $this->key . " IN (" . $id . ") ";
            }
            $this->deleteWhere($where);
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    
    /*
     * xoa DL by id
     * $id = 4;
     */
    function deleteWhere($where)
    {
        if(isset($where))
        {
//            $where = array();
//            $where[$this->key] = $id;
            $this->db->where($where);
            $this->db->delete($this->table);
            return TRUE;
        }  else {
            return FALSE;
        }
    }

    //Lay DS theo dk input
    function getList($input = array())
    {
        $this->setInput($input);
        $query = $this->db->get($this->table);
        return $query->result();
    }
        
    /*Tao cac dieu kien input*/
    protected function setInput($input = array())
    {
        //dieu kien where
        //$input['where'] = array('id' => 1)
        if((isset($input['where'])) && $input['where'])
        {
            $this->db->where($input['where']);
        }
        
        //dieu kien like
        //$input['like'] = array('id' => 1)
        if((isset($input['like'])) && $input['like'])
        {
            $this->db->like($input['like']);
        }
        //sap xep theo thu tu
        //$input['order'] = array('id', 'DESC')
        if(isset($input['order_by'][0]) && isset($input['order_by'][1]))
        {
            $this->db->order_by($input['order'][0], $input['order'][1]);
        }
    }
    
    //get info by id
    function getInfoById($id, $col = '')
    {
        if(!$id)
        {
            return FALSE;
        }
        $where = array();
        $where[$this->key] = $id;
        return $this->getInfoRule($where, $col);
    }
    
    //lay info tu cac cot col voi dk where
    //$this->db->select('id, ho, ten');
    //$col ='ho, ten, luong';
    //kq tra ve la 1 row, nhieu kq tra ve kq 1st
    function getInfoRule($where = array(), $col = '')
    {
        if(isset($col))
        {
            $this->db->select($col);
        }
        $this->db->where($where);
        $query = $this->db->get($this->table);
        //if co ket qua tra ve -> in kq ra, nguoc lai return false
        if($query->num_rows()!=0)
        {   
            //row() return obj
            return $query->row();
        }
        return FALSE;
    }
    /*
     * gion getInfoRow nhun tra ve mang kq
     */
    function getMultiRow($where = array(), $col = '')
    {
        if(isset($col))
        {
            $this->db->select($col);
        }
        $this->db->where($where);
        $query = $this->db->get($this->table);
        //if co ket qua tra ve -> in kq ra, nguoc lai return false
        if($query->num_rows()!=0)
        {   
            //row() return obj
            return $query->result();
        }
        return FALSE;
    }
    
    /*
     * lay 1 row
     */
    function getRow($input = array())
    {
        $this->setInput($input);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    /*
     * lay so ket qua tra ve
     */
    function getTotal($input = array())
    {
        $this->setInput($input);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }
    
    /*
     * lay tong cong
     */
    function getSum($col, $where = array())
    {
        $this->db->select_sum($col);
        $this->db->where($where);
        $this->db->from($this->table);
        
        $row = $this->db->get()->row();
        foreach ($row as $f => $v)
        {
            $sum = $v;
        }
        return $sum;
    }
    
    /*
     * kiem tra DL co ton tai theo dk $where ko
     */
    function checkExist($where = array())
    {
        $this->db->where($where);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    /**
     * Thực hiện câu lệnh query cho 1 bảng
     * $sql : cau lenh sql
     */
    function query($sql){
        $rows = $this->db->query($sql);
        return $rows->result();
    }
    
    /*
     * select max
     */
    function getMax($col)
    {
        $this->db->select_max($col);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    /*
     * number of result
     */
    function getQuanty($sql)
    {
        $rows = $this->db->query($sql);
        return $rows->num_rows();
    }
}

