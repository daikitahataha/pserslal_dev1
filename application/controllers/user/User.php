<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('User_abstract.php');

class User extends User_abstract {

	public function __construct(){
		parent::__construct();
		$this->load->library('email');
		$this->load->model('bll/Bll_user');
	}

	public function index()
	{

	}

	public function create(){
		$this->load->view('user/create');
	}

	public function register(){
		$error = '';

		$res = $this->_user_param_validation();
		if($res)
		{
				$post = $this->input->post();
				$error = $this->_register_temp();
dd($error);
				if($error === ''){
					redirect('user/complete');
				}
		}

		 $this->load->view('user/register');
	}

	public function auth($user_id, $time, $token){
		$now_time = time();

		if($now_time < $time || $time < $now_time - (int)$this->config->item('auth_time'))
		{
			redirect(site_url());
		}

		$valid_token = $this->Bll_user->get_token($user_id, $time);

		if($token !== $valid_token)
		{
			redirect(site_url());
		}

		$result = $this->Bll_user->authentication($user_id);

		$this->load->view('user/comp_auth', compact(result));
	}

	private function _register_temp(){
		$post = $this->input->post();
		$user_id = $this->Bll_user->insert_id($post);

		if($user_id === 0){
			return 'データベースエラーが発生しました';
		}

		//メール送信
		return $this->_sendEmail($user_id) ? '' : 'メール送信に失敗しました';
	}

	private function _sendEmail($user_id){
			$post = $this->input->post();
			$time = time();

			$token = $this->Bll_user->get_token($user_id, $time);

			if(empty($token)){
				return FALSE;
			}

			$this->email->from('tahara.daiki0914@gmial.com', 'provisional');
			$this->email->to($post['email']);
			$this->email->sujest('本登録のご案内');
			$this->email->message($this->load->view('mail/register_template'), compact($user_id, $time, $token), TRUE);
			$res = $this->email->send();

			return $res;
	}

	private function _user_param_validation(){
		$this->form_validation->set_rules('email', 'メールアドレス', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'パスワード', 'trim|required|callback__valid_password');
		$this->form_validation->set_rules('name', 'ユーザーネーム', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('passconf', 'パスワード再入力', 'trim|matches[password]');

		$error_msg = array(
			'required' => '%sは必須です',
			'max_length' => '%sは128文字以下で入力してください',
			'isPassword' => '%sは８文字以上100文字以下の英数字記号で入力してください',
			'_valid_password' => '%sの入力に誤りがあります',
			'is_unique' => 'この%sはすでに登録されています',
			'matches' => 'パスワードが一致しません'
		);

		$this->form_validation->set_message($error_msg);

		$res = $this->form_validation->run();

		return $res;

	}

	public function _valid_password(){
		$post = $this->input->post();
		$password = $post['password'];

		if(!empty($password))
		{
			return true;
		}
		else
		{
			return false;
		}

		$pass_preg = preg_match('/\A(?=.*?[a-z])(?=.*?\d)[!-~]{8,100}+\z/i', $password);

		if($pass_preg){
			return true;
		}
	  else
		{
			return false;
		}


	}
}

?>
