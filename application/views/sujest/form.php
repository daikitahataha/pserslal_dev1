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
        <br>
        <button type="button" name="button" id='send'></button>
      <?= form_close();?>
    </div>

    <ul id="gallery" class="gallery"></ul>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" defer>
      $(function(){
        $('#send').on('click', function(){
          $.ajax({
            type: 'get',
            url: '<?= base_url('user/Sujest/sujest'); ?>',
            data: null,
            dataType: 'json',
          }).done(function(instagram_data){
            const gallery_data = instagram_data["business_discovery"]['media']['data'];
            console.log(gallery_data);
            let photos = "";
            const photo_length = 9;
console.log(instagram_data)
            for(let i = 0; i < photo_length ;i++){

              photos += '<li class="gallery-item"><img src="' + gallery_data[i].media_url + '"></li>';
            }
            $("#gallery").append(photos);
          }).fail(function (jqXHR, textStatus, errorThrown) {
                    // 通信失敗時の処理
                    alert('ファイルの取得に失敗しました。');
                    console.log("ajax通信に失敗しました");
                    console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
                    console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
                    console.log("errorThrown    : " + errorThrown.message); // 例外情報
                    console.log("URL            : " + url);
            });
        });
      });
    </script>


  </body>
</html>
