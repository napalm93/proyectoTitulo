<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property integer $idProveedor
 * @property string $nomProveedor
 * @property string $descripcion
 *
 * @property Solcompra[] $solcompras
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomProveedor', 'descripcion'], 'required'],
            [['nomProveedor'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProveedor' => 'Id Proveedor',
            'nomProveedor' => 'Nom Proveedor',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolcompras()
    {
        return $this->hasMany(Solcompra::className(), ['idProveedor' => 'idProveedor']);
    }
}
