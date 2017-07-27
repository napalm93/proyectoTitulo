<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comservicio;

/**
 * ComservicioSearch represents the model behind the search form about `app\models\Comservicio`.
 */
class ComservicioSearch extends Comservicio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idComision', 'idUsuario'], 'integer'],
            [['fechaSolicitud', 'disposicion', 'tipoFuncionario', 'nomFuncionario', 'cargo', 'centroCosto', 'sede', 'lugarDestino', 'run', 'grado', 'codigoCC', 'campus', 'fechaIni', 'fechaFin', 'justificacion', 'tipoGasto', 'transporte'], 'safe'],
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
        $query = Comservicio::find();

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
            'idComision' => $this->idComision,
            'fechaSolicitud' => $this->fechaSolicitud,
            'fechaIni' => $this->fechaIni,
            'fechaFin' => $this->fechaFin,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'disposicion', $this->disposicion])
            ->andFilterWhere(['like', 'tipoFuncionario', $this->tipoFuncionario])
            ->andFilterWhere(['like', 'nomFuncionario', $this->nomFuncionario])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'centroCosto', $this->centroCosto])
            ->andFilterWhere(['like', 'sede', $this->sede])
            ->andFilterWhere(['like', 'lugarDestino', $this->lugarDestino])
            ->andFilterWhere(['like', 'run', $this->run])
            ->andFilterWhere(['like', 'grado', $this->grado])
            ->andFilterWhere(['like', 'codigoCC', $this->codigoCC])
            ->andFilterWhere(['like', 'campus', $this->campus])
            ->andFilterWhere(['like', 'justificacion', $this->justificacion])
            ->andFilterWhere(['like', 'tipoGasto', $this->tipoGasto])
            ->andFilterWhere(['like', 'transporte', $this->transporte]);

        return $dataProvider;
    }
}
