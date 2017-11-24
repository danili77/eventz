<?php

namespace app\models;

use Yii;

/**
* This is the model class for table "usuarios".
*
* @property integer $id
* @property string $nombre
* @property string $password
* @property string $created_at
*/
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

  public $passwordConfirm;
  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'usuarios';
  }

  /**
  * @inheritdoc
  */
  public function rules()
  {
    return [
      [['nombre', 'password'], 'required'],
      [['created_at'], 'safe'],
      [['nombre'], 'string', 'max' => 15],
      [['password'], 'string', 'max' => 60],
      [['nombre'], 'unique'],
      [['token'], 'string', 'max' => 32]
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'nombre' => 'Usuario',
      'password' => 'Contraseña',
      'passwordConfirm' =>'Confirmar Contraseña',
      'created_at' => 'Fecha Creación',
      'token' =>'Token'
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
    if ($this->password !== $this->passwordConfirm) {
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
      if ($this->password != '' || $insert) {
        $this->password = Yii::$app->security->generatePasswordHash($this->password);
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
