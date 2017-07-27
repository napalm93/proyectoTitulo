<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solcompra".
 *
 * @property integer $idSolicitudCom
 * @property string $fechaSolicitud
 * @property string $numCompra
 * @property string $fechaCompra
 * @property string $estado
 * @property string $descripcion
 * @property integer $idUsuario
 * @property integer $idProveedor
 *
 * @property Proveedor $idProveedor0
 * @property Usuario $idUsuario0
 */
class Solcompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solcompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaSolicitud', 'numCompra', 'fechaCompra', 'estado', 'descripcion', 'idUsuario', 'idProveedor'], 'required'],
            [['fechaSolicitud', 'fechaCompra'], 'safe'],
            [['idUsuario', 'idProveedor'], 'integer'],
            [['numCompra'], 'string', 'max' => 20],
            [['estado', 'descripcion'], 'string', 'max' => 45],
            [['idProveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['idProveedor' => 'idProveedor']],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSolicitudCom' => 'Id Solicitud Com',
            'fechaSolicitud' => 'Fecha Solicitud',
            'numCompra' => 'Num Compra',
            'fechaCompra' => 'Fecha Compra',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
            'idUsuario' => 'Id Usuario',
            'idProveedor' => 'Id Proveedor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProveedor0()
    {
        return $this->hasOne(Proveedor::className(), ['idProveedor' => 'idProveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'idUsuario']);
    }
}
