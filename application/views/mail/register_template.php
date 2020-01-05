<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      /**
       * @var int $id
       * @var int $time
       * @var string $token
       */
      defined('BASEPATH') OR exit('No direct script access allowed');
    ?>この度は、ご登録頂きありがとうございます。

      まだ登録は完了しておりません。
      以下のURLへアクセスして登録を完了させてください。

      <?=  site_url('user/auth/'.(string)$id.'/'.(string)$time.'/'.$token); ?>
  </body>
</html>
