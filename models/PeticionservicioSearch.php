<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Peticionservicio;

/**
 * PeticionservicioSearch represents the model behind the search form about `app\models\Peticionservicio`.
 */
class PeticionservicioSearch extends Peticionservicio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPeticion', 'estado', 'idUsuario'], 'integer'],
            [['tipoPeticion', 'fechaPeticion', 'descripcion'], 'safe'],
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
        $query = Peticionservicio::find();

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
            'idPeticion' => $this->idPeticion,
            'fechaPeticion' => $this->fechaPeticion,
            'estado' => $this->estado,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'tipoPeticion', $this->tipoPeticion])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
