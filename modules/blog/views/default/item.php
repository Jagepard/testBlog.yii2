<?php

use yii\helpers\Url;

$this->title = $title;

?>

<br>
<?php if (!empty($material['image'])) : ?>
    <img src="<?= Url::base(true); ?>/img/<?= $material['image'] ?>" class="card-img-top" alt="<?= $material['title'] ?>">
<?php endif; ?>

<h2><?= $material['title']; ?></h2>
<p><?= htmlspecialchars_decode($material['text'])?></p>
