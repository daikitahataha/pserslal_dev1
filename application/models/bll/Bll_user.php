<?php

class Bll_user extends MY_Model{

  public function __construct(){

  }

  public function insert_id($param){
    $this->load->model('dal/Dal_user');
    $res = $this->Dal_user->dal_insert_id($param);

    return $res;
  }

  public function get_token($user_id, $time){
    $user = $this->_get_temp_user($user_id);

    if(empty($user['email']) || empty($user['password'])){
      return '';
    }

    //メールアドレス、、パスワード、タイムスタンプ、ソルトを組み合わせてハッシュを作成
    return hash('sha256', $user['mail'].'|'.$user['password'].'|'.$time.$this->config->item('salt'));
  }

  public function authentication($user_id){
    $this->load->model('dal/Dal_user');
    $res = $this->Dal_user->dal_authentication($user_id);

    return $res;
  }

  private function _get_temp_user($user_id){
    $this->load->model('dal/Dal_user');
    $user = $this->dal_get_temp_user($user_id);

    return $user;
  }
}

?>
