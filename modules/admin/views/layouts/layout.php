<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->context->title . $this->title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
  <body>
    <div class="container">
    <br>
    <div class="row">
        <div class="col-10">
          <br>
          <a class="link-underline link-underline-opacity-0" href="<?= Url::base(true); ?>/admin"><h1>Dashboard</h1></a>
        </div>
        <div class="col border">
        <?php if($user = \Yii::$app->user->identity) : ?>
            <p>Вы вошли как: <i><?= $user['email']; ?></i></p>
            <a href="<?= Url::base(true); ?>/logout">Выйти</a>
        <?php endif; ?>
        </div>
      </div>
    <hr>
        <?= $content ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>