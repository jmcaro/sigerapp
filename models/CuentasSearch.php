<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cuentas;

/**
 * CuentasSearch represents the model behind the search form about `app\models\Cuentas`.
 */
class CuentasSearch extends Cuentas
{
    /**
     * @inheritdoc
     */

    public $empresa;
    public $tercero;
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['idEmpresa.nombre','idTercero.nombre']);
       
    }
    public function rules()
    {
        return [
            [['id_cuenta', 'valor', ], 'integer'],
            [['fecha','tercero','idEmpresa.nombre','idTercero.nombre','id_empresa','id_tercero',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cuentas::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['idEmpresa','idTercero']);

        //$this->load($params);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        //if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
          
          //  return $dataProvider;
        //}

        $query->andFilterWhere([
            'id_cuenta' => $this->id_cuenta,
            //'id_empresa' => $this->id_empresa,
            'fecha' => $this->fecha,
            'valor' => $this->valor,
            
        ])
        ->andFilterWhere(['LIKE', 'empresa.nombre', $this->id_empresa])
        ->andFilterWhere(['LIKE', 'terceros.nombre', $this->id_tercero]);
        return $dataProvider; 
    }
}
