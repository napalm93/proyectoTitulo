<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solmantencion;

/**
 * SolmantencionSearch represents the model behind the search form about `app\models\Solmantencion`.
 */
class SolmantencionSearch extends Solmantencion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSolicitudMan', 'numero', 'idPeticion'], 'integer'],
            [['fechaSolicitud', 'reparticion', 'centroCosto', 'nomSolicitante', 'ubicacionServicio', 'anexo', 'tipoServicio', 'descripcion', 'prioridad', 'tipoMantencion'], 'safe'],
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
        $query = Solmantencion::find();

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
            'idSolicitudMan' => $this->idSolicitudMan,
            'numero' => $this->numero,
            'fechaSolicitud' => $this->fechaSolicitud,
            'idPeticion' => $this->idPeticion,
        ]);

        $query->andFilterWhere(['like', 'reparticion', $this->reparticion])
            ->andFilterWhere(['like', 'centroCosto', $this->centroCosto])
            ->andFilterWhere(['like', 'nomSolicitante', $this->nomSolicitante])
            ->andFilterWhere(['like', 'ubicacionServicio', $this->ubicacionServicio])
            ->andFilterWhere(['like', 'anexo', $this->anexo])
            ->andFilterWhere(['like', 'tipoServicio', $this->tipoServicio])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'prioridad', $this->prioridad])
            ->andFilterWhere(['like', 'tipoMantencion', $this->tipoMantencion]);

        return $dataProvider;
    }
}
