<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peticionmantencion".
 *
 * @property integer $idPeticion
 * @property integer $estado
 * @property string $descripcionS
 * @property string $descripcionD
 * @property string $fechaGenerada
 * @property string $fechaAprobada
 * @property string $fechaGestionada
 * @property string $fechaEjecutada
 * @property integer $idUsuario
 *
 * @property Usuario $idUsuario0
 * @property Solmantencion[] $solmantencions
 */
class Peticionmantencion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peticionmantencion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado', 'descripcionS', 'idUsuario'], 'required'],
            [['estado', 'idUsuario'], 'integer'],
            [['tipoServicio', 'tipoMantencion'], 'string', 'max' => 25], 
            [['descripcionS', 'descripcionD'], 'string'],
            [['fechaGenerada', 'fechaAprobada', 'fechaGestionada', 'fechaEjecutada'], 'safe'],
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
            'estado' => 'Estado',
            'tipoServicio' => 'Tipo de Servicio',
            'tipoMantencion' => 'Tipo de Mantención',
            'descripcionS' => 'Descripción Solicitante',
            'descripcionD' => 'Descripción Director',
            'fechaGenerada' => 'Fecha Generada',
            'fechaAprobada' => 'Fecha Aprobada',
            'fechaGestionada' => 'Fecha Gestionada',
            'fechaEjecutada' => 'Fecha Ejecutada',
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolmantencions()
    {
        return $this->hasMany(Solmantencion::className(), ['idPeticion' => 'idPeticion']);
    }
}
