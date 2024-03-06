<?php
use yii\helpers\Url;

$this->title = $title;
?>

<br>

<form action="<?= Url::base(true); ?>/admin/material/create" method="post" enctype="multipart/form-data">
<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
<div class="mb-3">
    <label for="file" class="form-label">Фото</label>
    <input type="hidden" name="UploadImage[image]" value=""><input type="file" id="uploadimage-image" name="UploadImage[image]">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Заголовок</label>
    <input type="text" class="form-control" id="title" name="title" value="">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Текст</label>
    <textarea class="form-control" id="editor" name="text"></textarea>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
  </div>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>