<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Empresa;
use app\models\Terceros;
use yii\jui\DatePicker;
use kartik\widgets\ActiveForm;
//use kartik\widgets\Select2;
use kartik\builder\Form;



/* @var $this yii\web\View */
/* @var $model app\models\Cuentas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-form">
    <?php $empresas = ArrayHelper::map(Empresa::find()->all(),'id_empresa','nombre') ?>
    <?php $terceros = ArrayHelper::map(Terceros::find()->all(),'id_tercero','nombre')?>
    <?= Html::panel(
            [
                'heading'=> 'Cuentas de cobro',
                'body'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Banco', ['/bancos/create'], ['class' => 'btn btn-success'])." "
                         .Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Tercero', ['/terceros/create'], ['class' => 'btn btn-success']),

            ]
            ); ?>
    <?php 
    $form = ActiveForm::begin(['type'=>  ActiveForm::TYPE_VERTICAL]);
        echo Form::widget([
            'model'=>$model,
            'form'=>$form,
            'columns'=>2,
            'attributes'=>[
                //'id_cuenta'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter username...']],
                'id_empresa'=>[
                    'label'=>'Tercero',
                    'type'=>Form::INPUT_WIDGET, 
                    'widgetClass'=>'\kartik\widgets\Select2', 
                    'options'=>['data'=>$empresas], 
                    'hint'=>'Seleccione la empresa'
                ],
                'id_tercero'=>[
                    'label'=>'Tercero',
                    'type'=>Form::INPUT_WIDGET, 
                    'widgetClass'=>'\kartik\widgets\Select2', 
                    'options'=>['data'=>$terceros,'options'=>['options'=>['placeholder'=>'Seleccione Tercero...']]], 
                    //'pluginOptions'=>[],
                    'hint'=>'Seleccione el tercero',
                    'contentOptions'=>['style'=>'text-transform: uppercase'],
                ],
                'fecha'=>[
                    'language' => 'es',
                    'type'=>Form::INPUT_WIDGET, 
                    'value' => '08-10-2004',
                    'widgetClass'=>'\kartik\datecontrol\DateControl', 
                    'hint'=>'Fecha de la cuenta de cobro (yyyy/mm/dd)',
                    'pluginOptions'=>[
                        'format' => 'yyyy',
                    ]
                ],
                'valor'=>[
                    'type'=>Form::INPUT_WIDGET,
                    'widgetClass'=>'kartik\money\MaskMoney',
                    'maskMoneyOptions'=>[
                        'prefix'=>'$ ',
                    ],
                ],
                'detalle'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Detalle de la cuenta de cobro']],
               
            ]
        ]);
         echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    
        //echo Html::button('Submit', ['type'=>'button', 'class'=>'btn btn-primary']);
        ActiveForm::end();

     ?>

    