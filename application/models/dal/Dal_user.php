<?php

class Dal_user extends MY_Model{

  public function __construct(){

  }

  public function dal_insert_id($param){
    $res = $this->db->insert_id('auth_user', $param);
    return $res;
  }

  public function dal_get_temp_user($user_id){
    $this->db->select('id')->from('auth_user');

    $this->db->where('id', $suer_id);
    $this->db->where('permission_status', 0);
    $res = $this->db-get()->result_array();

    return $res;
  }

  public function dal_authentication($user_id){
    $this->db->select('*')->from('user_auth');
    $update_param['permission_status'] = 1;

    $res = $this->db->update($update_param);
    return $res;
  }
}

?>
