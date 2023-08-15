<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%claims}}`.
 */
class m230813_080646_create_claims_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%claims}}', [
            'claim_id' => $this->primaryKey(),
            'organization_id' =>$this->integer(11) ,
            'manager_id' =>$this->integer(11)  ,
            'description' => $this->text(),
            'date_of_creation' =>$this->timestamp(),

        ]);
        $this->addForeignKey(
            'fk-organization_id',
            'claims',
            'organization_id',
            'organizations',
            'organization_id',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-manager_id',
            'claims',
            'manager_id',
            'users',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%claims}}');
    }
}
