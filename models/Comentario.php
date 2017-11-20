<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'texto_comentario' => 'Texto Comentario',
            'fecha' => 'Fecha',
            'eventos_id' => 'Eventos ID',
            'usuarios_id' => 'Usuarios ID',
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
