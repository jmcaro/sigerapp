<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CuentasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuentas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'bootstrap'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'resizableColumns'=>true,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id_cuenta',
                'label'=>'N° Cuenta',
                'width'=>'20px'
            ],
            
            [
                'attribute'=>'id_empresa',
                'label'=>'Usuario',
                'value'=>'idEmpresa.nombre',   
                'contentOptions'=>['style'=>'text-transform: uppercase'],
                
            ],
            [
                'attribute'=>'id_tercero',
                'value'=>'idTercero.nombre',
                'label'=>'Tercero',
                'contentOptions'=>['style'=>'text-transform: uppercase'],
            ],
            'fecha',
            'valor',
            [
                'class' => '\kartik\grid\ActionColumn',
                'dropdown'=>false,
                'dropdownOptions'=> ['class' => 'pull-right'],
                'template'=>'{pdf} {view}{update}{delete}',
                'buttons' => [
                    'pdf'=> function ($url,$model){
                        return Html::a(
                            '<span class="glyphicon glyphicon-download-alt"></span>', $url,[
                                'title' => Yii::t('app', 'PDF'),
                                ]);
                    }
                    
                ],
                'urlCreator'=>  function ($action,$model,$key,$index) {
                if ($action === 'pdf') {
                    $url = Yii::$app->urlManager->createUrl(['cuentas/pdf','id'=>$model->id_cuenta]);
                    return $url;
                }else {return Url::toRoute([$action, 'id' => $model->id_cuenta]);
                }
               }
            ]    
        ],
            'panel' => [
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Cuentas de cobro</h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Cuenta', ['create'], ['class' => 'btn btn-success'])." "
                         .Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Banco', ['/bancos/create'], ['class' => 'btn btn-success'])." "
                         .Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Tercero', ['/terceros/create'], ['class' => 'btn btn-success']),

                'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
                'footer'=>false
            ]
    ]); ?>

</div>
