<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title></title>

    <link rel="stylesheet" href="<?= base_url('static/css/base.css'); ?>">
  </head>
  <body>
    <div class="wrapper">
      <?= form_open('user/sujest/sujest'); ?>
        <input type="text" name="area" placeholder="エリア">
        <br>
        <input type="text" name="tag" placeholder="#ハッシュタグ">
        <br>
        <input type="submit" value="おすすめスポットは・・">
      <?= form_close();?>
    </div>
  </body>
</html>
