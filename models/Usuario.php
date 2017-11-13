<?php

namespace app\models;

use Yii;

class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'usuarios';
    }

    public function rules()
    {
        return [
            [['usuario'], 'required'],
            [['password'], 'required'],
            [['password'], 'safe'],
            [['usuario'], 'string', 'max' => 15],
            [['token'], 'string', 'max' => 32],
            [['usuario'], 'unique'],
            [['passConfirm'], 'confirmarPassword'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'password' => 'Contraseña',
            'passConfirm' => 'Confirmar contraseña',
            'token' => 'Token'
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
    }


    public static function buscarPorNombre($nombre)
    {
        return static::findOne(['nombre' => $nombre]);
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->token;
    }


    public function regenerarToken()
    {
        $this->token = Yii::$app->security->generateRandomString();
    }


    public function validateAuthKey($authKey)
    {
        return $this->token == $authKey;
    }


    public function validarPassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }


    public function confirmarPassword($attribute, $params)
    {
        if ($this->pass !== $this->passConfirm) {
            $this->addError($attribute, 'Las contraseñas no coinciden');
        }
    }

    public function esAdmin()
    {
        return $this->nombre === 'admin';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->pass != '' || $insert) {
                $this->password = Yii::$app->security->generatePasswordHash($this->pass);
            }
            if ($insert) {
                $this->regenerarToken();
            }
            return true;
        } else {
            return false;
        }
    }
}
