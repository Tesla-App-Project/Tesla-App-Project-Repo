<?php

class m0004_example
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE car (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            car VARCHAR(255) NOT NULL,
            tesla VARCHAR(255) NOT NULL,
            hola VARCHAR(255) NOT NULL,
            token VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE users";
        $db->pdo->exec($SQL);
    }
}
