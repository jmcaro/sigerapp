<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terceros".
 *
 * @property integer $id_tercero
 * @property string $nombre
 * @property integer $nit
 * @property integer $digito_verificacion
 * @property string $direccion
 * @property string $ciudad
 *
 * @property Cuentas[] $cuentas
 */
class Terceros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terceros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'nit', 'digito_verificacion', 'direccion', 'ciudad'], 'required'],
            [['nit', 'digito_verificacion'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['direccion', 'ciudad'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tercero' => 'Id Tercero',
            'nombre' => 'Nombre',
            'nit' => 'Nit',
            'digito_verificacion' => 'Digito Verificacion',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasMany(Cuentas::className(), ['id_tercero' => 'id_tercero']);
    }
}
