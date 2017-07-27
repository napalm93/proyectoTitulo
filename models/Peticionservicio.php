<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peticionservicio".
 *
 * @property integer $idPeticion
 * @property string $tipoPeticion
 * @property string $fechaPeticion
 * @property string $descripcion
 * @property integer $estado
 * @property integer $idUsuario
 *
 * @property Usuario $idUsuario0
 */
class Peticionservicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peticionservicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipoPeticion', 'descripcion', 'idUsuario'], 'required'],
            [['fechaPeticion'], 'safe'],
            [['descripcion'], 'string'],
            [['estado', 'idUsuario'], 'integer'],
            [['tipoPeticion'], 'string', 'max' => 20],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPeticion' => 'Id Peticion',
            'tipoPeticion' => 'Tipo de Servicio',
            'fechaPeticion' => 'Fecha',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'idUsuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
}
