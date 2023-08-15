<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "organizations".
 *
 * @property int $organization_id
 * @property int|null $identification_tax_number
 * @property string|null $organization_name
 * @property string|null $director_last_name
 * @property string|null $director_first_name
 * @property string|null $director_surname
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identification_tax_number'], 'integer'],
            [['organization_name'], 'string'],
            [['director_last_name', 'director_first_name', 'director_surname'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'organization_id' => 'Идентификатор организации',
            'identification_tax_number' => 'ИНН',
            'organization_name' => 'Название организации',
            'director_last_name' => 'Фамилия директора',
            'director_first_name' => 'Имя директора',
            'director_surname' => 'Отчество директора',
        ];
    }
    public function getFullName(){
        return $this->director_last_name . ' ' . $this->director_first_name . ' ' . $this->director_surname;
    }
    public function getOrganizations(): Query
    {
        $organizations = Yii::$app->db->createCommand()
        ->select(['organization_name'])->from(self::tableName())->queryColumn();
        return $organizations;
    }
}
