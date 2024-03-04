<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%materials}}`.
 */
class m240304_141544_create_materials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%materials}}', [
            'id'     => $this->primaryKey(),
            'title'  => $this->string()->notNull(),
            'slug'   => $this->string()->notNull(),
            'text'   => $this->text(),
            'image'  => $this->string(),
            'status' => $this->integer()->defaultValue(1),

            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%materials}}');
    }
}
