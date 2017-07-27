<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "secretaria".
 *
 * @property integer $idUsuario
 * @property string $email
 * @property string $contraseña
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
            [['email', 'contraseña', 'nomUsuario', 'idDepartamento'], 'required'],
            [['idDepartamento'], 'integer'],
            [['email', 'nomUsuario'], 'string', 'max' => 45],
            [['contraseña'], 'string', 'max' => 15],
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
            'contraseña' => 'Contrase�a',
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
