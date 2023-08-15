<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $login;
    public $password;
    public $first_name;
    public $last_name;
    public $surname;
    public $position_id;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public $rememberMe = false;
    public function rules()
    {
        return [

            [['login', 'password','first_name','last_name','surname','position_id'], 'required'],
            ['login','unique','targetClass' => '\app\models\User', 'message' => 'Пользователь уже зарегистрирован'],
            ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'login' => 'Логин',
            'password' => 'Пароль',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'surname' => 'Отчество',
            'position_id' => 'Идентификатор должности',
            'full_name' => 'Менеджер',
            'positions.position' => 'Должность',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильный логин или пароль.');
            }
        }
    }


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->login);
        }

        return $this->_user;
    }
}
