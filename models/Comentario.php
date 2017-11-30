<?php

namespace app\models;

use Yii;

/**
 * Este es el modelo para la tabla "comentarios".
 *
 * @property integer $id
 * @property string $texto_comentario
 * @property string $fecha
 * @property integer $eventos_id
 * @property integer $usuarios_id
 *
 * @property Usuarios $usuarios
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * Declara el nombre de la tabla de la base de datos asociada con esta clase.
     * @return string El nombre de la tabla.
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * Devuelve las reglas de validación de los atributos.
     * @return array Las reglas de validación.
     */
    public function rules()
    {
        return [
            [['texto_comentario'], 'required'],
            [['fecha'], 'safe'],
            [['eventos_id', 'usuarios_id'], 'integer'],
            [['texto_comentario'], 'string', 'max' => 500],
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
            'texto_comentario' => 'Texto Comentario',
            'fecha' => 'Fecha',
            'eventos_id' => 'Evento',
            'usuarios_id' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id'])->inverseOf('comentarios');
    }
}
