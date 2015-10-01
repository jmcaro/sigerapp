<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Empresa;
/* @var $this yii\web\View */
/* @var $model app\models\Bancos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bancos-form">
    
    <?php $empresas = ArrayHelper::map(Empresa::find()->all(),'id_empresa','nombre') ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero_cuenta')->textInput(['maxlength' => true]) ?>

        
    <?= $form->field($model, 'id_empresa')->widget(Select2::className(),[
        'data'=>$empresas,
        'options' => ['placeholder' => 'Seleccione el titular de la cuenta ...'],
    ]) ?>

    <?= $form->field($model, 'banco')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tipo_cuenta')->widget(Select2::className(),[
        'data'=>[1 => 'AHORRO',2 => 'CORRIENTE',],
        'options' => ['placeholder' => 'Seleccione un tipo de cuenta ...'],
    ]) ?>   


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
