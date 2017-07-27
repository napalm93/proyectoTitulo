<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comservicio".
 *
 * @property integer $idComision
 * @property string $fechaSolicitud
 * @property string $disposicion
 * @property string $tipoFuncionario
 * @property string $nomFuncionario
 * @property string $cargo
 * @property string $centroCosto
 * @property string $sede
 * @property string $lugarDestino
 * @property string $run
 * @property string $grado
 * @property string $codigoCC
 * @property string $campus
 * @property string $fechaIni
 * @property string $fechaFin
 * @property string $justificacion
 * @property string $tipoGasto
 * @property string $transporte
 * @property integer $idUsuario
 *
 * @property Usuario $idUsuario0
 */
class Comservicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comservicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaSolicitud', 'disposicion', 'tipoFuncionario', 'nomFuncionario', 'cargo', 'centroCosto', 'sede', 'lugarDestino', 'run', 'grado', 'codigoCC', 'campus', 'fechaIni', 'fechaFin', 'justificacion', 'tipoGasto', 'transporte', 'idUsuario'], 'required'],
            [['fechaSolicitud', 'fechaIni', 'fechaFin'], 'safe'],
            [['idUsuario'], 'integer'],
            [['disposicion', 'tipoFuncionario', 'nomFuncionario', 'cargo', 'centroCosto', 'sede', 'lugarDestino', 'grado', 'codigoCC', 'campus', 'tipoGasto', 'transporte'], 'string', 'max' => 45],
            [['run'], 'string', 'max' => 10],
            [['justificacion'], 'string', 'max' => 50],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComision' => 'Id Comision',
            'fechaSolicitud' => 'Fecha Solicitud',
            'disposicion' => 'Disposicion',
            'tipoFuncionario' => 'Tipo Funcionario',
            'nomFuncionario' => 'Nom Funcionario',
            'cargo' => 'Cargo',
            'centroCosto' => 'Centro Costo',
            'sede' => 'Sede',
            'lugarDestino' => 'Lugar Destino',
            'run' => 'Run',
            'grado' => 'Grado',
            'codigoCC' => 'Codigo Cc',
            'campus' => 'Campus',
            'fechaIni' => 'Fecha Ini',
            'fechaFin' => 'Fecha Fin',
            'justificacion' => 'Justificacion',
            'tipoGasto' => 'Tipo Gasto',
            'transporte' => 'Transporte',
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
