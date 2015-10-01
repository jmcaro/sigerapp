<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TercerosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terceros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tercero') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'nit') ?>

    <?= $form->field($model, 'digito_verificacion') ?>

    <?= $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'ciudad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
