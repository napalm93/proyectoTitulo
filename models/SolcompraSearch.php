<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solcompra;

/**
 * SolcompraSearch represents the model behind the search form about `app\models\Solcompra`.
 */
class SolcompraSearch extends Solcompra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSolicitudCom', 'idUsuario', 'idProveedor'], 'integer'],
            [['fechaSolicitud', 'numCompra', 'fechaCompra', 'estado', 'descripcion'], 'safe'],
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
        $query = Solcompra::find();

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
            'idSolicitudCom' => $this->idSolicitudCom,
            'fechaSolicitud' => $this->fechaSolicitud,
            'fechaCompra' => $this->fechaCompra,
            'idUsuario' => $this->idUsuario,
            'idProveedor' => $this->idProveedor,
        ]);

        $query->andFilterWhere(['like', 'numCompra', $this->numCompra])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
