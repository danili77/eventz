<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RecuperarForm es el modelo para el formulario de recuperación de la contraseña.
 */
class RecuperarForm extends Model
{
    /**
     * @var string Campo de email del formulario de recuperación de contraseña.
     */
    public $email;
    /**
     * @var string Campo de código de verificación del formulario de recuperación de contraseña.
     */
    public $verifyCode;
    /**
     * @var string Campo de contraseña del formulario de recuperación de contraseña.
     */
    public $pass;
    /**
     * @var string Campo de repetición de contraseña del formulario de recuperación de
     * contraseña.
     */
    public $repeatPass;
    /**
     * @var string Campo de token del formulario de recuperación de contraseña.
     */
    public $token;
    /**
     * @var string Escenario para la recuperación de contraseña.
     */
    const ESCENARIO_RECUPERAR = 'recuperar';

    /**
     * Devuelve las reglas de validación de los atributos.
     * @return array Las reglas de validación.
     */
    public function rules()
    {
        return [
            [['email'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['email'], 'email'],
            [['email'], 'exist', 'targetClass' => Usuario::className(), 'targetAttribute' => ['email' => 'email']],
            [['verifyCode'], 'captcha'],
            [['pass', 'repeatPass', 'token'], 'required', 'on' => self::ESCENARIO_RECUPERAR],
            ['repeatPass', function ($attr) {
                if ($this->$attr !== $this->pass) {
                    $this->addError($attr, 'Las contraseñas no coinciden');
                }
            }, 'on' => self::ESCENARIO_RECUPERAR],
        ];
    }

    /**
     * Devuelve las etiquetas de los atributos.
     * @return array Las etiquetas de los atributos
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'verifyCode' => 'Responda a la siguiente pregunta para que se le envíe un correo',
            'pass' => 'Nueva contraseña',
            'repeatPass' => 'Repite la nueva contraseña',
        ];
    }

    /**
     * Envia un email para la recuperación de la contraseña.
     * @return bool true si el email se ha enviado correctamente
     */
    public function sendEmail()
    {
      if ($this->validate())
      {
        $model = Usuario::find()->where(['email' => $this->email])->one();
        $content = '<p>Email: ' . $model->email . '</p><p>Usuario: ' . $model->nombre . '</p><p>Asunto:Recuperar Contraseña</p>';

        $mail = Yii::$app->mailer->compose('@app/mail/layouts/html', ['content' => $content])
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTo($model->email)
                ->setSubject('Recuperar contraseña de Eventz')
                ->setTextBody($content)
                ->send();
        return true;
      }else{
          return false;
      }
    }
}
