<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventos".
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'lugar', 'tipo_evento', 'usuarios_id'], 'required'],
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'fecha' => 'Fecha',
            'lugar' => 'Lugar',
            'tipo_evento' => 'Tipo de evento',
            'usuarios_id' => 'Usuario',
        ];
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
        return $this->hasOne(Usuario::className(), ['id' => 'usuarios_id'])->inverseOf('eventos');
    }
}
