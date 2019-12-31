<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="<?= base_url('static/css/base.css'); ?>">
    <title></title>
  </head>
  <body>
    <h1>デートスポット提案の仮ページです</h1>

    <ul id="gallery" class="gallery"></ul>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="<?= base_url('static/js/ajax.js'); ?>"></script>

    <script type="text/javascript" defer>
      axios.get("<?= base_url('user/sujest/sujest'); ?>").then(instagram_data=>{
          console.log(instagram_data);

          const gallery_data = instagram_data["data"]["business_discovery"]["media"]["data"];

          let photos = "";
          const photo_length = 9;

          for(let i = 0; i < photo_length ;i++){
            photos += '<li class="gallery-item"><img src="' + gallery_data[i].media_url + '"></li>';
          }
          document.querySelector("#gallery").innerHTML = photos;
      }).catch(error=>{
        console.log(error);
      })

    </script>
  </body>
</html>
