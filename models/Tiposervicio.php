<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiposervicio".
 *
 * @property integer $idTipo
 * @property string $nombreServicio
 * @property string $descripcion
 * @property integer $idMantencion
 *
 * @property Solmantencion $idMantencion0
 */
class Tiposervicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiposervicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreServicio', 'descripcion', 'idMantencion'], 'required'],
            [['idMantencion'], 'integer'],
            [['nombreServicio', 'descripcion'], 'string', 'max' => 45],
            [['idMantencion'], 'exist', 'skipOnError' => true, 'targetClass' => Solmantencion::className(), 'targetAttribute' => ['idMantencion' => 'idSolicitudMan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipo' => 'Id Tipo',
            'nombreServicio' => 'Nombre Servicio',
            'descripcion' => 'Descripcion',
            'idMantencion' => 'Id Mantencion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMantencion0()
    {
        return $this->hasOne(Solmantencion::className(), ['idSolicitudMan' => 'idMantencion']);
    }
}
