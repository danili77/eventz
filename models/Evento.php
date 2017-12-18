<?php

namespace app\models;

use Yii;

/**
* Este es el modelo para la tabla "eventos".
*
* @property integer $id
* @property string $nombre
* @property string $descripcion
* @property string $fecha
* @property string $lugar
* @property integer $tipo_evento
* @property integer $usuarios_id
*
* @property TipoEvento $tipoEvento
* @property Usuarios $usuarios
*/
class Evento extends \yii\db\ActiveRecord
{
  /**
  * Declara el nombre de la tabla de la base de datos asociada con esta clase.
  * @return string El nombre de la tabla
  */
  public static function tableName()
  {
    return 'eventos';
  }

  /**
  * Devuelve las reglas de validación de los atributos.
  * @return array las reglas de validación.
  */
  public function rules()
  {
    return [
      [['nombre', 'descripcion','lugar', 'tipo_evento', 'usuarios_id'], 'required'],
      [['descripcion'], 'string'],
      [['fecha'], 'safe'],
      [['tipo_evento', 'usuarios_id'], 'integer'],
      [['nombre'], 'string', 'max' => 100],
      [['lugar'], 'string', 'max' => 300],
      [['tipo_evento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEvento::className(), 'targetAttribute' => ['tipo_evento' => 'id']],
      [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
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
      'nombre' => 'Evento',
      'descripcion' => 'Descripción',
      'fecha' => 'Fecha',
      'lugar' => 'Lugar',
      'tipo_evento' => 'Tipo de evento',
      'usuarios_id' => 'Usuario creador',
    ];
  }


  /**
  * Devuelve el número de comentarios que tiene una evento concreto
  * @param  int $id_evento El id del evento
  * @return int El número de comentarios que tiene el evento pasado como parametro
  */
  public function cuantosComentarios($id_evento)
  {
    return $comentarios = $this->getComentarios()->where(['eventos_id' => $id_evento])->count();
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getComentarios()
  {
    return $this->hasMany(Comentario::className(), ['eventos_id' => 'id'])->inverseOf('idEvento');
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getTipoEvento()
  {
    return $this->hasOne(TipoEvento::className(), ['id' => 'tipo_evento'])->inverseOf('eventos');
  }

  /**
  * @return \yii\db\ActiveQuery
  */
  public function getUsuarios()
  {
    return $this->hasOne(Usuario::className(), ['id' => 'usuarios_id']);
  }
}
