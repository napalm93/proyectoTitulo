<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solmovilizacion;

/**
 * SolmovilizacionSearch represents the model behind the search form about `app\models\Solmovilizacion`.
 */
class SolmovilizacionSearch extends Solmovilizacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSolicitudMo', 'idUsuario'], 'integer'],
            [['fechaSolicitud', 'numCentroCosto', 'numSubCentroCosto', 'Unidad', 'nomFuncionario', 'tipo', 'fechaSalida', 'fechaRegreso', 'horaSalida', 'horaRegreso', 'participantes', 'destino', 'objetivo', 'observaciones'], 'safe'],
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
        $query = Solmovilizacion::find();

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
            'idSolicitudMo' => $this->idSolicitudMo,
            'fechaSolicitud' => $this->fechaSolicitud,
            'fechaSalida' => $this->fechaSalida,
            'fechaRegreso' => $this->fechaRegreso,
            'horaSalida' => $this->horaSalida,
            'horaRegreso' => $this->horaRegreso,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'numCentroCosto', $this->numCentroCosto])
            ->andFilterWhere(['like', 'numSubCentroCosto', $this->numSubCentroCosto])
            ->andFilterWhere(['like', 'Unidad', $this->Unidad])
            ->andFilterWhere(['like', 'nomFuncionario', $this->nomFuncionario])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'participantes', $this->participantes])
            ->andFilterWhere(['like', 'destino', $this->destino])
            ->andFilterWhere(['like', 'objetivo', $this->objetivo])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
