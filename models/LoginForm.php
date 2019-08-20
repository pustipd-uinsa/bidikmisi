<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Mahasiswa;

/**
 * Login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'No. Pendaftaran'),
            'password' => Yii::t('app', 'Tanggal Lahir dd-mm-yyyy'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array  $params    the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                if (!$user) {
                    $this->addError($attribute, 'No.Pendaftaran Tidak Ditemukan');
                } else {
                    $this->addError($attribute, 'Kombinasi No.Pendaftaran dan Password Salah');
                }
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if (date('Y-m-d') < Yii::$app->params['tanggalDaftarAwal'] || date('Y-m-d') > Yii::$app->params['tanggalDaftarAkhir']) {
               //   Yii::$app->session->setFlash('error', 'Pendaftaran Masih Ditutup');
               // return false;
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            } else {
                return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]].
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
