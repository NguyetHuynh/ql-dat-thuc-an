<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//dan link tu admin
function admin_url($url = '')
{
    return base_url('admin/'.$url);
}

//ko cho ten trung
function isExist($ten)
    {
        $ten = $this->input->post('ten');
        $where = array('ten' => $ten);
        if($this->DonViTinh_model->checkExist($where))
        {
            $this->form_validation->set_message(__FUNCTION__, '{field} đã tồn tại');
            return false;
        }
        return true;
    }