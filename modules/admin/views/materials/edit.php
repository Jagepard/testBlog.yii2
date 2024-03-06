<?php
use yii\helpers\Url;

$this->title = $title;
?>

<br>
<?php if (!empty($material['image'])): ?>
  <img src="<?= Url::base(true); ?>/uploads/<?= $material['image']; ?>" height="250">
  <a href="<?= Url::base(true); ?>/admin/material/delimg/<?= $material['id']; ?>"><button type="button" class="btn btn-danger">delete</button></a>
<?php endif; ?>
<form action="<?= Url::base(true); ?>/admin/material/update/<?= $material['id']; ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
<br>
  <div class="mb-3">
    <label for="file" class="form-label">Фото</label>
    <input type="hidden" name="UploadImage[image]" value=""><input type="file" id="uploadimage-image" name="UploadImage[image]">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Заголовок</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= $material['title']; ?>">
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="<?= $material['slug']; ?>" disabled>
  </div>
  <div class="mb-3">
    <label for="editor" class="form-label">Текст</label>
    <textarea class="form-control" id="editor" name="text"><?= $material['text']; ?></textarea>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
  </div>
  <button type="submit" class="btn btn-primary">Обновить</button>
</form>