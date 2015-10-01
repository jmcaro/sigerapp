<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terceros */

$this->title = 'Update Terceros: ' . ' ' . $model->id_tercero;
$this->params['breadcrumbs'][] = ['label' => 'Terceros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tercero, 'url' => ['view', 'id' => $model->id_tercero]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terceros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
