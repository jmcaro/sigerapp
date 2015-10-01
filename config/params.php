<?php
use kartik\datecontrol\Module;
return [
    'adminEmail' => 'gerencia@areconsultoria.com.co',
    'title' => 'SIGER APP',
    'maskMoneyOptions' => [
	    'prefix' => '$ ',
	    'suffix' => '',
	    'affixesStay' => true,
	    'thousands' => ',',
	    'decimal' => '.',
	    'precision' => 2, 
	    'allowZero' => false,
	    'allowNegative' => false,
	],
	

    //'uploadPath' => Yii::$app->basePath . '/uploads/'
];
