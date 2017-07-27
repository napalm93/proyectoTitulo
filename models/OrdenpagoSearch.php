<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordenpago;

/**
 * OrdenpagoSearch represents the model behind the search form about `app\models\Ordenpago`.
 */
class OrdenpagoSearch extends Ordenpago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idOrden', 'valor', 'departamento', 'idUsuario'], 'integer'],
            [['nombre', 'rut', 'centroCosto', 'motivo'], 'safe'],
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
        $query = Ordenpago::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idOrden' => $this->idOrden,
            'valor' => $this->valor,
            'departamento' => $this->departamento,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'rut', $this->rut])
            ->andFilterWhere(['like', 'centroCosto', $this->centroCosto])
            ->andFilterWhere(['like', 'motivo', $this->motivo]);

        return $dataProvider;
    }
}
