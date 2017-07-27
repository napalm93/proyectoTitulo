<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solmantencion".
 *
 * @property integer $idSolicitudMan
 * @property integer $numero
 * @property string $fechaSolicitud
 * @property string $reparticion
 * @property string $centroCosto
 * @property string $nomSolicitante
 * @property string $ubicacionServicio
 * @property string $anexo
 * @property string $tipoServicio
 * @property string $descripcion
 * @property string $prioridad
 * @property string $tipoMantencion
 * @property integer $idPeticion
 *
 * @property Peticionmantencion $idPeticion0
 */
class Solmantencion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solmantencion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'reparticion', 'centroCosto', 'nomSolicitante', 'anexo', 'tipoServicio', 'descripcion', 'prioridad', 'tipoMantencion', 'idPeticion'], 'required'],
            [['numero', 'idPeticion'], 'integer'],
            [['fechaSolicitud'], 'safe'],
            [['descripcion'], 'string'],
            [['reparticion', 'centroCosto', 'nomSolicitante', 'ubicacionServicio', 'anexo', 'prioridad', 'tipoMantencion'], 'string', 'max' => 45],
            [['tipoServicio'], 'string', 'max' => 60],
            [['idPeticion'], 'exist', 'skipOnError' => true, 'targetClass' => Peticionmantencion::className(), 'targetAttribute' => ['idPeticion' => 'idPeticion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSolicitudMan' => 'Id Solicitud Man',
            'numero' => 'Numero',
            'fechaSolicitud' => 'Fecha Solicitud',
            'reparticion' => 'Reparticion',
            'centroCosto' => 'Centro Costo',
            'nomSolicitante' => 'Nom Solicitante',
            'ubicacionServicio' => 'Ubicacion Servicio',
            'anexo' => 'Anexo',
            'tipoServicio' => 'Tipo Servicio',
            'descripcion' => 'Descripcion',
            'prioridad' => 'Prioridad',
            'tipoMantencion' => 'Tipo Mantencion',
            'idPeticion' => 'Id Peticion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeticion0()
    {
        return $this->hasOne(Peticionmantencion::className(), ['idPeticion' => 'idPeticion']);
    }
}
