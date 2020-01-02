<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('User_abstract.php');

class Sujest extends User_abstract {

	public function __construct(){
		parent::__construct();
	}

	public function form()
	{
		$this->load->view('sujest/form');
	}

	public function sujest(){
		$res = $this->_param_valid();

		if($res)
		{
			  //formからpostされた値を$postに格納
				$post = $this->input->post();

				//バリデーションを通過したらInstagram APIの投稿データを表示するためのajaxコードに渡すデータを記述
				$instagram_business_id = '17841421524292277';
				$access_token = 'EAAJFEyaM5dwBABPlUKXaMVGv2u7ITHyorcRNc3qxZA5LrRH8HHrXs0UO2A2s6ZBaDyYjaxggHXbcZBMLkMhi8qNFS8lAFxRGqou3FelFscd7g6g3FUpw0EchrqHBXSSpbqYY7hM8E7E2T9MWdJBUCAzatS2HS6CeMp9ThA2HVVZCduv7WX4J';
				$target_user = 'well_asakusa_cafe';
				$query = 'business_discovery.username('.$target_user.'){id,followers_count,media_count,ig_id,media{caption,media_url,media_type,like_count,comments_count,timestamp,id}}';
				$instagram_api_url = 'https://graph.facebook.com/v5.0/';
				$target_url = $instagram_api_url.$instagram_business_id."?fields=".$query."&access_token=".$access_token;

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $target_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$instagram_data = curl_exec($ch);
				curl_close($ch);
dd($instagram_data);
				echo $instagram_data;

				exit;
		}
		else
		{
			 $this->form();
			 return;
		}

	}

  protected function _param_valid(){
		//dd($this->input->post());
		$this->form_validation->set_rules('area', 'エリア', 'required');
		$this->form_validation->set_rules('tag', 'タグ', 'required');
		$error_msg = array(
			'required' => '%sを入力してください'
		);
		$this->form_validation->set_message($error_msg);

		$res = $this->form_validation->run();

		return $res;
	}
}
