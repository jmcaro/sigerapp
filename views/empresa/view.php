<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_empresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_empresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'condensed'=> true,
        'hover'=> true,
        'panel'=>[
          'heading'=> strtoupper($model->nombre),
          'type'=>  DetailView::TYPE_INFO,  
        ],
        'attributes' => [
            'id_empresa',
            'nombre',
            'nit',
            'digito_verificacion',
            [
                'attribute'=>'firma',
                'value'=> '@web/uploads/'.$model->firma,
                'format'=>['image',['width'=>'100','height'=>'100','alt'=>$model->nombre, 'class'=>'thumbnail' ]],
            ],
        ],
    ]) ?>

</div>
