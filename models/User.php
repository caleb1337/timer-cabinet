<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 * * Название моделей здесь в единственном числе, название таблицы в БД во множественном
 * @property int $id
 * @property string|null $login
 * @property string|null $password
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $surname
 * @property int|null $position_id
 *
 * @property Position $position
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'surname'], 'string'],
            [['position_id'], 'integer'],
            [['login'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 60],
            [['login'], 'unique'],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::class, 'targetAttribute' => ['position_id' => 'position_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::class, ['position_id' => 'position_id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public static function findByUsername($login)
    {
        return User::findOne(['login' => $login]);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token']);
    }
    public function getAuthKey()
    {
        // return $this->authKey;
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getId()
    {
       return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        //
    }
    public function getFullName(){
        return $this->last_name .' '. $this->first_name .' '. $this->surname;
}
    public function getProfileName()
    {
        return $this->last_name.' '. $this->first_name;
    }
}
