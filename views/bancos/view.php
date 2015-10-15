<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bancos */

$this->title = $model->idEmpresa->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bancos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create','create', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_banco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_banco], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_banco',
            'numero_cuenta',
            'idEmpresa.nombre',
            'banco',
            'tipo_cuenta',
        ],
    ]) ?>

</div>
