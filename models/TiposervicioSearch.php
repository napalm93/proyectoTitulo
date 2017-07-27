<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tiposervicio;

/**
 * TiposervicioSearch represents the model behind the search form about `app\models\Tiposervicio`.
 */
class TiposervicioSearch extends Tiposervicio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipo', 'idMantencion'], 'integer'],
            [['nombreServicio', 'descripcion'], 'safe'],
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
        $query = Tiposervicio::find();

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
            'idTipo' => $this->idTipo,
            'idMantencion' => $this->idMantencion,
        ]);

        $query->andFilterWhere(['like', 'nombreServicio', $this->nombreServicio])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
