<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property integer $idDepartamento
 * @property string $nomDepartamento
 * @property string $siglaDepartamento
 * @property string $descripcion
 * @property string $centroCosto
 *
 * @property Usuario[] $usuarios
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomDepartamento', 'siglaDepartamento', 'descripcion', 'centroCosto'], 'required'],
            [['descripcion'], 'string'],
            [['nomDepartamento'], 'string', 'max' => 80],
            [['siglaDepartamento'], 'string', 'max' => 12],
            [['centroCosto'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDepartamento' => 'Id Departamento',
            'nomDepartamento' => 'Nom Departamento',
            'siglaDepartamento' => 'Sigla Departamento',
            'descripcion' => 'Descripcion',
            'centroCosto' => 'Centro Costo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idDepartamento' => 'idDepartamento']);
    }
}
