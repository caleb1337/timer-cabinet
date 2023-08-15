<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */

/**
 * @property int id
 * @property string username
 * @property string password
 * @property string first_name
 * @property string last_name
 * @property string access_token
 * @property string auth_key
 * @property string role
 */
class m230811_191936_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->char(30)->unique(),
            'password' => $this->char(60),
            'last_name' => $this->text(30),
            'first_name' => $this->text(),
            'surname' => $this->text(30),
            'position_id' => $this->integer(20),
        ]);
        $this->addForeignKey(
            'fk-position_id',
            'users',
            'position_id',
            'positions',
            'position_id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
