<?php
/**
 * @var bool $failure
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  <meta name="description" content="">
  <title>メール認証ユーザー登録フローテスト</title>
</head>
<body>
<h1>ユーザー登録</h1>
<?php if ($result): ?>
  <p>データベースエラーが発生しました。</p>
  <p>開発者の次回アップデートにご期待ください。</p>
<?php else: ?>
  <p>ユーザー登録が完了しました。</p>
  <p>開発者がログイン機能を作るまでお待ちください。</p>
<?php endif; ?>
</body>
</html>
