<?php

class m0003_charge
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE charge (
            id_charge  INT AUTO_INCREMENT PRIMARY KEY, 
            start_time time NOT NULL ,
            stop_time  VARCHAR(255) NOT NULL,
            charge_amount  INT NOT NULL, 
            expense INT NOT NULL ?
            domicile BIT (1),
            work BIT(1),
            supercharger BIT (1),
            CONSTRAINT FK_CarCharge FOREIGN KEY (id_car) REFERENCES Persons(id_car),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE charge";
        $db->pdo->exec($SQL);
    }
}
