<?php

$email = array(
  'field' => 'email',
  'label' => 'メールアドレス',
  'rules' =>'required|valid_email|is_unique[user_auth.email]',
  'errors' => array(
    'required' => '%sは必須です',
    'valid_email' => 'メールアドレスの形式で入力してください',
    'is_unique' => 'このメールアドレスはすでに使われています'
  )
);

$password = array(
  'field' => 'password',
  'label' => 'パスワード',
  'rules' => array(
    'required',
    array(
      'isPassword',
      function($password)
      {
          if($password === '')
          {
              return TRUE;
          }

          if(preg_match('/\A(?=.*?[a-z])(?=.*?\d)[!-~]{8,100}+\z/i', $password))
          {
              return TRUE;
          }

          return FALSE;
      }
    )
  ),
  'errors' => array(
      'required' => '%sを入力してください',
      'isPassword' => '%sは８文字以上100文字以下の英数字記号で入力してください'
  )
);

$passconf = array(
  'field' => 'passconf',
  'label' => 'パスワード再入力',
  'rules' => 'matches[passowrd]',
  'errors' => array(
    'matches' => '%sが一致しません'
  )
);

$name = array(
  'field' => 'name',
  'label' => 'ユーザーネーム',
  'rules' => 'required|max_length[128]',
  'errors' => array(
    'required' => '%sは必須です',
    'max_length' => '%sは128文字以下で入力してください'
  )
);

$config['user/register'] = array($email, $password, $passconf, $name);

?>
