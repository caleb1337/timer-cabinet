<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "claims".
 *
 * @property int $claim_id
 * @property int|null $organization_id
 * @property int|null $manager_id
 * @property string|null $description
 * @property string|null $date_of_creation
 *
 * Название моделей здесь в единственном числе, название таблицы в БД во множественном
 * @property User $manager
 * @property Organization $organization
 */
class Claim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'claims';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'manager_id'], 'integer'],
            [['description'], 'string'],
            [['date_of_creation'], 'safe'],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['manager_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::class, 'targetAttribute' => ['organization_id' => 'organization_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'claim_id' => 'Номер заявки',
            'organization_id' => 'Идентификатор фирмы',
            'manager_id' => 'Идентификатор менеджера',
            'description' => 'Описание',
            'date_of_creation' => 'Дата создания',
            'org_name' => 'Название организации',
            'resp_manager' => 'Ответственный менеджер',
        ];
    }


    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(User::class, ['id' => 'manager_id']);
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::class, ['organization_id' => 'organization_id']);
    }
}
