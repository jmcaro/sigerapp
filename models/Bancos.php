<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bancos".
 *
 * @property integer $id_banco
 * @property integer $id_empresa
 * @property string $numero_cuenta
 * @property string $banco
 * @property string $tipo_cuenta
 *
 * @property Empresas $idEmpresa
 */
class Bancos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bancos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa'], 'integer'],
            [['numero_cuenta', 'banco', 'tipo_cuenta'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => 'Id Banco',
            'id_empresa' => 'Id Empresa',
            'numero_cuenta' => 'Numero Cuenta',
            'banco' => 'Banco',
            'tipo_cuenta' => 'Tipo Cuenta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }
}
