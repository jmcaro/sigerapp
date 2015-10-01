<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentas".
 *
 * @property integer $id_cuenta
 * @property integer $id_empresa
 * @property integer $id_tercero
 * @property string $fecha
 * @property integer $valor
 * @property string $detalle
 *
 * @property Terceros $idTercero
 * @property Empresa $idEmpresa
 */
class Cuentas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuentas';
    }
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_tercero', 'fecha', 'valor', 'detalle'], 'required'],
            [['id_empresa', 'id_tercero', 'valor'], 'integer'],
            [['fecha',], 'safe'],
            [['detalle'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cuenta' => 'Id Cuenta',
            'id_empresa' => 'Id Empresa',
            'id_tercero' => 'Id Tercero',
            'fecha' => 'Fecha',
            'valor' => 'Valor',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTercero()
    {
        return $this->hasOne(Terceros::className(), ['id_tercero' => 'id_tercero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }

 
}
