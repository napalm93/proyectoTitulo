<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Peticionmantencion;
use app\models\Usuario;
use app\models\Departamento;

/**
 * PeticionmantencionSearch represents the model behind the search form about `app\models\Peticionmantencion`.
 */
class PeticionmantencionSearch extends Peticionmantencion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPeticion', 'estado', 'idUsuario'], 'integer'],
            [['descripcionS', 'descripcionD', 'fechaGenerada', 'fechaAprobada', 'fechaGestionada', 'fechaEjecutada', 'tipoServicio', 'tipoMantencion'], 'safe'],
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
        
        switch (Yii::$app->user->identity->rol) {
            //DataProvider para Funcionario
            case '3':
                $query = Peticionmantencion::find()->where(['idUsuario' => Yii::$app->user->identity->idUsuario]);
                break;
            
            //DataProvider para Jefe de Departamento
            case '4':

                $usuarios = Usuario::find()->where(['idDepartamento' => Yii::$app->user->identity->idDepartamento]);

                $query = Peticionmantencion::find()->where([]);
                break;

            //DataProvider para Secretaria
            case '2':
                $query = Peticionmantencion::find()
                ->where(['estado' => '1'])
                ->orWhere(['estado' => '3'])
                ->orWhere(['estado' => '4']);
                break;
        }

        

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
            'estado' => $this->estado,
            'tipoServicio' => $this->tipoServicio,
            'tipoMantencion' => $this->tipoMantencion,
            'fechaGenerada' => $this->fechaGenerada,
            'fechaAprobada' => $this->fechaAprobada,
            'fechaGestionada' => $this->fechaGestionada,
            'fechaEjecutada' => $this->fechaEjecutada,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'descripcionS', $this->descripcionS])
            ->andFilterWhere(['like', 'descripcionD', $this->descripcionD]);

        return $dataProvider;
    }
}
