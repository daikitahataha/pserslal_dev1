<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?= form_open('user/user/register');  ?>
      <input type="text" name="name" value='<?= set_value('name'); ?>' required>ユーザーネーム<br>
      <input type="text" name="email" value='<?= set_value('email'); ?>' required>メールアドレス<br>
      <input type="text" name="password" value='<?= set_value('password'); ?>' required>パスワード<br>
      <input type="text" name="passconf" value='<?= set_value('passconf'); ?>' required>パスワード再入力<br>
      <input type="submit" value="仮登録">
    <?= form_close();  ?>
  </body>
</html>
