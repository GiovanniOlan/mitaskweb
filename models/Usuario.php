<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $usu_id Id
 * @property string $usu_nombre Nombre
 * @property string $usu_materno Apellido Materno
 * @property string $usu_paterno Apellido Paterno
 * @property string|null $usu_imagen Imagen
 * @property int $usu_fkuser User
 *
 * @property Grupo[] $grupos
 * @property User $usuFkuser
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usu_nombre', 'usu_materno', 'usu_paterno', 'usu_fkuser'], 'required'],
            [['usu_fkuser'], 'integer'],
            [['usu_nombre'], 'string', 'max' => 50],
            [['usu_materno', 'usu_paterno'], 'string', 'max' => 40],
            [['usu_imagen'], 'string', 'max' => 150],
            [['usu_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usu_fkuser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usu_id' => 'Id',
            'usu_nombre' => 'Nombre',
            'usu_materno' => 'Apellido Materno',
            'usu_paterno' => 'Apellido Paterno',
            'usu_imagen' => 'Imagen',
            'usu_fkuser' => 'User',
        ];
    }

    /**
     * Gets query for [[Grupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['gru_fkusuario' => 'usu_id']);
    }

    /**
     * Gets query for [[UsuFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'usu_fkuser']);
    }
}
