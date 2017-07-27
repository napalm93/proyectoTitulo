<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secretaria".
 *
 * @property integer $idUsuario
 * @property string $email
 * @property string $contrase単a
 * @property string $nomUsuario
 * @property integer $idDepartamento
 *
 * @property Departamento $idDepartamento0
 */
class Secretaria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'secretaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'contrase単a', 'nomUsuario', 'idDepartamento'], 'required'],
            [['idDepartamento'], 'integer'],
            [['email', 'nomUsuario'], 'string', 'max' => 45],
            [['contrase単a'], 'string', 'max' => 15],
            [['idDepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['idDepartamento' => 'idDepartamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'email' => 'Email',
            'contrase単a' => 'Contrase祓a',
            'nomUsuario' => 'Nom Usuario',
            'idDepartamento' => 'Id Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartamento0()
    {
        return $this->hasOne(Departamento::className(), ['idDepartamento' => 'idDepartamento']);
    }
}
