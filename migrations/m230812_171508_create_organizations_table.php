<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%organizations}}`.
 */
class m230812_171508_create_organizations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%organizations}}', [
            'organization_id' => $this->primaryKey(),
            'identification_tax_number' =>$this->bigInteger('100'),
            'organization_name' => $this->text(),
            'director_last_name' => $this->string('40'),
            'director_first_name' =>$this->string('40'),
            'director_surname' => $this->string('40'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%organizations}}');
    }
}
