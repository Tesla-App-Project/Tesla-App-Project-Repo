<?php

class m0002_car
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE car (
            id_car INT PRIMARY KEY,
            name_car VARCHAR(255) NOT NULL,
            base_timezone time NOT NULL ,
            address_domicile VARCHAR(255) NOT NULL,
            address_work VARCHAR(255) NOT NULL,
            CONSTRAINT FK_UserCar FOREIGN KEY (id_user) REFERENCES Persons(id_user),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE car";
        $db->pdo->exec($SQL);
    }
}
