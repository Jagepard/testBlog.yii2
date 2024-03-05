<?php

use yii\helpers\Url;
use yii\bootstrap5\LinkPager;

$this->title = $title;

?>

<br>

<div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>

<?php foreach($materials as $material): ?>

    <div class="col">
    <div class="card">
    <a href="<?= Url::base(true); ?>/material/<?= $material['id'] ?>_<?= $material['slug'] ?>">
    <?php if (!empty($material['image'])) : ?>
    <img width="350" src="<?= Url::base(true); ?>/img/<?= $material['image'] ?>" class="card-img-top" alt="<?= $material['title'] ?>">
    <?php endif; ?>
    </a>
      <div class="card-body">
        <h5 class="card-title"><a class="link-secondary link-underline link-underline-opacity-0" href="<?= Url::base(); ?>/material/<?= $material['id'] ?>_<?= $material['slug'] ?>"><?= $material['title']?></a></h5>
        <!-- <p class="card-text"><?= htmlspecialchars_decode($material['text'])?></p> -->
      </div>
    </div>
  </div>

<?php endforeach; ?>

</div>
<hr>
<div>
    <?= LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>





