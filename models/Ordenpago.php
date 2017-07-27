<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordenpago".
 *
 * @property integer $idOrden
 * @property string $nombre
 * @property string $rut
 * @property integer $valor
 * @property string $centroCosto
 * @property integer $departamento
 * @property string $motivo
 * @property integer $idUsuario
 *
 * @property Usuario $idUsuario0
 */
class Ordenpago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordenpago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'rut', 'valor', 'centroCosto', 'departamento', 'motivo', 'idUsuario'], 'required'],
            [['valor', 'departamento', 'idUsuario'], 'integer'],
            [['nombre', 'centroCosto'], 'string', 'max' => 45],
            [['rut'], 'string', 'max' => 12],
            [['motivo'], 'string', 'max' => 200],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idOrden' => 'Id Orden',
            'nombre' => 'Nombre',
            'rut' => 'Rut',
            'valor' => 'Valor',
            'centroCosto' => 'Centro Costo',
            'departamento' => 'Departamento',
            'motivo' => 'Motivo',
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
