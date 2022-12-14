<?php

class m0002_example_add_password_column_to_users
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE users DROP COLUMN password ";
        $db->pdo->exec($SQL);
    }
}
