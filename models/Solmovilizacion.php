<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solmovilizacion".
 *
 * @property integer $idSolicitudMo
 * @property string $fechaSolicitud
 * @property string $numCentroCosto
 * @property string $numSubCentroCosto
 * @property string $Unidad
 * @property string $nomFuncionario
 * @property string $tipo
 * @property string $fechaSalida
 * @property string $fechaRegreso
 * @property string $horaSalida
 * @property string $horaRegreso
 * @property string $participantes
 * @property string $destino
 * @property string $objetivo
 * @property string $observaciones
 * @property integer $idUsuario
 *
 * @property Usuario $idUsuario0
 */
class Solmovilizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solmovilizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaSolicitud', 'numCentroCosto', 'numSubCentroCosto', 'Unidad', 'nomFuncionario', 'tipo', 'fechaSalida', 'fechaRegreso', 'horaSalida', 'horaRegreso', 'participantes', 'destino', 'objetivo', 'observaciones', 'idUsuario'], 'required'],
            [['fechaSolicitud', 'fechaSalida', 'fechaRegreso', 'horaSalida', 'horaRegreso'], 'safe'],
            [['idUsuario'], 'integer'],
            [['numCentroCosto', 'numSubCentroCosto', 'Unidad', 'nomFuncionario', 'tipo', 'participantes', 'destino'], 'string', 'max' => 45],
            [['objetivo', 'observaciones'], 'string', 'max' => 100],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSolicitudMo' => 'Id Solicitud Mo',
            'fechaSolicitud' => 'Fecha Solicitud',
            'numCentroCosto' => 'Num Centro Costo',
            'numSubCentroCosto' => 'Num Sub Centro Costo',
            'Unidad' => 'Unidad',
            'nomFuncionario' => 'Nom Funcionario',
            'tipo' => 'Tipo',
            'fechaSalida' => 'Fecha Salida',
            'fechaRegreso' => 'Fecha Regreso',
            'horaSalida' => 'Hora Salida',
            'horaRegreso' => 'Hora Regreso',
            'participantes' => 'Participantes',
            'destino' => 'Destino',
            'objetivo' => 'Objetivo',
            'observaciones' => 'Observaciones',
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
