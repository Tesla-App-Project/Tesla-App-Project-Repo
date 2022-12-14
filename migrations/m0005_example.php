<?php

class m0005_example
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE frog (
            id INT AUTO_INCREMENT PRIMARY KEY,
            smthg VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE test";
        $db->pdo->exec($SQL);
    }
}
