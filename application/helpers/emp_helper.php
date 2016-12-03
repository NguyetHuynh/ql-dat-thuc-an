<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//dan link tu cac thu muc nhan vien

/*
 * dan link tu waiter
 */
function waiter_url($url = '')
{
    return base_url('waiter/'.$url);
}

/*
 * dan link tu tiep tan
 */
function tieptan_url($url = '')
{
    return base_url('tieptan/'.$url);
}

