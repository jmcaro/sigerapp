<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $id_empresa
 * @property string $nombre
 * @property integer $nit
 * @property string $ciudad
 * @property integer $digito_verificacion
 * @property string $direccion
 * @property string $telefono
 * @property string $firma
 *
 * @property Cuentas[] $cuentas
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public $image;
    public function rules()
    {
        return [
            [['nombre', 'nit', 'ciudad', 'digito_verificacion','firma'], 'required'],
            [['nit', 'digito_verificacion'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['ciudad', 'direccion', 'telefono'], 'string', 'max' => 50],
            [['image',], 'safe'],
            [['image'], 'file','extensions'=>'jpeg, jpg, bmp, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'nombre' => 'Nombre',
            'nit' => 'Nit',
            'ciudad' => 'Ciudad',
            'digito_verificacion' => 'Digito Verificacion',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'firma'=>'Firma Digital',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasMany(Cuentas::className(), ['id_empresa' => 'id_empresa']);
    }
    
 
}
