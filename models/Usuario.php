<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
* Este es el modelo para la tabla de "usuarios".
*
* @property integer $id
* @property string $nombre
* @property string $password
*  @property string $email
* @property string $token
* @property string $created_at
*/
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

  /**
   * @var string Campo de confirmación de contraseña en el formulario de
   * registro de usuarios.
   *
   */
  public $passwordConfirm;

  /**
   * Declara el nombre de la tabla de la base de datos asociada con esta clase.
   * @return string El nombre de la tabla.
   */
  public static function tableName()
  {
    return 'usuarios';
  }

  /**
   * Devuelve las reglas de validación de los atributos.
   * @return array Las reglas de validación.
   */
  public function rules()
  {
    return [
      [['nombre', 'password','email'], 'required'],
      [['created_at'], 'safe'],
      [['nombre'], 'string', 'max' => 15],
      [['password'], 'string', 'max' => 60],
      [['nombre'], 'unique'],
      [['token'], 'string', 'max' => 32],
      [['email'], 'string', 'max' => 255],
    ];
  }

  /**
   * Devuelve las etiquetas de los atributos.
   * @return array Las etiquetas de los atributos.
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'nombre' => 'Usuario',
      'password' => 'Contraseña',
      'passwordConfirm' =>'Confirmar Contraseña',
      'created_at' => 'Fecha Creación',
      'token' =>'Token',
      'email' => 'Email',
    ];
  }

/**
 * Encuentra una identidad mediante el id determinado.
 * @param int $id El id a buscar
 * @return \yii\web\IdentityInterface El Objeto que coincide con el id dado.
 */
  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  /**
   * Encuentra una identidad por el token dado
   * @param  mixed $token El token a buscar
   * @param  mixed $type  El tipo del token
   * @return \yii\web\IdentityInterface El Objeto que coincide con el token dado.
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
  }

  /**
   * Busca un usuario por su buscarPorNombre
   * @param string $nombre
   * @return static|null
   */
  public static function buscarPorNombre($nombre)
  {
    return static::findOne(['nombre' => $nombre]);
  }

  /**
   * Devuelve el id del usuario
   * @return int El id del usuario.
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Devuelve el token del usuario
   * @return mixed El token del usuario.
   */
  public function getAuthKey()
  {
    return $this->token;
  }

  /** Regenera los tokens de los usuarios.
   * @return void
   */
  public function regenerarToken()
  {
    $this->token = Yii::$app->security->generateRandomString();
  }

  /**
   * Valida la clave de autenticacion dada.
   * @param  string $authKey La clave de autenticación dada.
   * @return bool True si la clave de autenticación dada es válida.
   */
  public function validateAuthKey($authKey)
  {
    return $this->token == $authKey;
  }

  /**
   * Validar contraseña.
   * @param string $password contraseña a validar
   * @return bool  True si la contraseña es valida para el usuario actual.
   */
  public function validarPassword($password)
  {
    return Yii::$app->security->validatePassword($password, $this->password);
  }

  /**
   * Comprueba si la contraseña y la confirmación de la contraseña son iguales
   * @param  mixed $attribute
   * @param  mixed $params
   * @return void
   */
  public function confirmarPassword($attribute, $params)
  {
    if ($this->password !== $this->passwordConfirm) {
      $this->addError($attribute, 'Las contraseñas no coinciden');
    }
  }

  /**
   * Comprueba si el usuario es administrador
   * @return bool true si el usuario es administrador
   */
  public function esAdmin()
  {
    return $this->nombre === 'admin';
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getComentarios()
  {
      return $this->hasMany(Comentario::className(), ['usuarios_id' => 'id'])->inverseOf('idUsuario');
  }

  /**
   * Realiza las modificaciones necesarias antes de guardar al usuario en la
   * base de datos.
   * @param  bool $insert true si se va ha realizar una inserción.
   * @return bool true si la inserción o la modificación se ha realizado
   * correctamente.
   */
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
