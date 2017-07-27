<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
 * @property string $nomUsuario
 * @property string $rut
 * @property string $email
 * @property string $password
 * @property integer $rol
 * @property integer $telefono
 * @property integer $idDepartamento
 *
 * @property Comservicio[] $comservicios
 * @property Ordenpago[] $ordenpagos
 * @property Peticionservicio[] $peticionservicios
 * @property Solcompra[] $solcompras
 * @property Solmantencion[] $solmantencions
 * @property Solmovilizacion[] $solmovilizacions
 * @property Departamento $idDepartamento0
 * @property Rol $rol0
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomUsuario', 'rut', 'email', 'password', 'rol', 'telefono'], 'required'],
            [['rol', 'telefono', 'idDepartamento'], 'integer'],
            [['nomUsuario'], 'string', 'max' => 45],
            [['rut'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 12],
            [['idDepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['idDepartamento' => 'idDepartamento']],
            [['rol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol' => 'idRol']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nomUsuario' => 'Nombre de Usuario',
            'rut' => 'Rut',
            'email' => 'Email',
            'password' => 'Password',
            'rol' => 'Rol',
            'telefono' => 'Telefono',
            'idDepartamento' => 'Departamento',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNombre()
    {
        return $this->nomUsuario;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComservicios()
    {
        return $this->hasMany(Comservicio::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenpagos()
    {
        return $this->hasMany(Ordenpago::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeticionservicios()
    {
        return $this->hasMany(Peticionservicio::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolcompras()
    {
        return $this->hasMany(Solcompra::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolmantencions()
    {
        return $this->hasMany(Solmantencion::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolmovilizacions()
    {
        return $this->hasMany(Solmovilizacion::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartamento0()
    {
        return $this->hasOne(Departamento::className(), ['idDepartamento' => 'idDepartamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol0()
    {
        return $this->hasOne(Rol::className(), ['idRol' => 'rol']);
    }


}
