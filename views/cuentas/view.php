<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentas */

$this->title = strtoupper($model->idEmpresa->nombre);
$this->params['breadcrumbs'][] = ['label' => 'Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cuenta], ['class' => 'btn btn-lg btn-primary']) ?>
        <?= Html::a('PDF', ['pdf', 'id' => $model->id_cuenta], ['class' => 'btn btn-lg btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cuenta], [
            'class' => 'btn btn-danger btn-lg',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'valueColOptions'=>['style'=>'text-transform: uppercase'],
        'condensed'=>true,  
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Cuenta de cobro # ' . $model->id_cuenta,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            
            [
            'attribute'=>'id_empresa',
            'value'=>strtoupper($model->idEmpresa->nombre),
            'label'=>'Usuario',
            ],
            [
            'attribute'=>'id_tercero',
            'value'=>strtoupper($model->idTercero->nombre),
            'label'=>'Tercero',
            ],
            //'idTercero.nombre',
            'fecha',
            'valor',
            'detalle'
        ],
    ]) ?>

</div>
