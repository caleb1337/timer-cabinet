<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $password
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $surname
 * @property int|null $position_id
 *
 * @property Positions $position
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{


    public static function tableName(){
        return 'users';
    }
    public static function fakePassword(){
        return '******';
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token']);
    }

    /**
     * Finds user by login
     *
     * @param string $login
     * @return static|null
     */
    public static function findByUsername($login)
    {
        return User::findOne(['login' => $login]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
    public function rules(): array
    {
        return [
            [['last_name', 'first_name', 'surname'], 'string'],
            [['position_id'], 'integer'],
            [['login'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 60],
            [['login'], 'unique'],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Positions::class, 'targetAttribute' => ['position_id' => 'position_id']],
        ];
    }

    public function attributeLabels(): array {
        return [
            'id' => 'Идентификатор',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'login' => 'Логин',
            'surname' => 'Отчество',
            'password' => 'Пароль',
            'position' => 'Должность',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        // return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    public function HashPassword($password){
        return $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    public function getPosition()
    {
        return $this->hasOne(Positions::class, ['position_id' => 'position_id']);
    }
}


