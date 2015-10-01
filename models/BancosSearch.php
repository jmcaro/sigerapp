<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bancos;

/**
 * BancosSearch represents the model behind the search form about `app\models\Bancos`.
 */
class BancosSearch extends Bancos
{
    /**
     * @inheritdoc
     */
    public $empresa;
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['idEmpresa.nombre']);
       
    }
    public function rules()
    {
        return [
            [['id_banco', 'numero_cuenta'], 'integer'],
            [['titular', 'banco', 'tipo_cuenta','idEmpresa.nombre','id_empresa',], 'safe'],
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
        $query = Bancos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['idEmpresa']);
        //$this->load($params);
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_banco' => $this->id_banco,
            'numero_cuenta' => $this->numero_cuenta,
        ]);

        $query->andFilterWhere(['like', 'titular', $this->titular])
            ->andFilterWhere(['like', 'banco', $this->banco])
            ->andFilterWhere(['like', 'tipo_cuenta', $this->tipo_cuenta])
            ->andFilterWhere(['LIKE', 'empresa.nombre', $this->id_empresa]);

        return $dataProvider;
    }
}
