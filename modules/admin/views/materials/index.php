<?php
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;

$this->title = $title;
?>

<table class="table table-striped table-hover">

<tr>
    <td>#</td>
    <td></td>
    <td></td>
    <td><a href="<?= Url::base(true); ?>/admin/material/add"><button type="button" class="btn btn-info">add</button></a></td>
</tr>
<?php foreach($materials as $material): ?>
    <tr>
    <td><p><?= $material['id']; ?></p></td>
    <td><?php if (!empty($material['image'])): ?><img src="<?= Url::base(true); ?>/img/thumb/<?= $material['image']; ?>"><?php endif; ?></td>
    <td><p><?= $material['title']; ?></p></td>

    <td>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="<?= Url::base(true); ?>/admin/material/edit/<?= $material['id']; ?>"><button type="button" class="btn btn-success">edit</button></a>
        <a href="<?= Url::base(true); ?>/admin/material/delete/<?= $material['id']; ?>"><button type="button" class="btn btn-danger">delete</button></a>
    </div>
    </td>
    </tr>
<?php endforeach; ?>

</table>

<?= LinkPager::widget([
    'pagination' => $pages,
]); ?>
