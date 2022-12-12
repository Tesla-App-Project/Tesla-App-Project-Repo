<?php

class m0005_climate_plannification
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE climate_plannification (
            id_climate_plannification INT AUTO_INCREMENT PRIMARY KEY,
            start_time time NOT NULL ,
            stop_time time NOT NULL ,
            active BIT(1),
            CONSTRAINT FK_CarClimPl FOREIGN KEY (id_car) REFERENCES Persons(id_car),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE climate_plannification";
        $db->pdo->exec($SQL);
    }
}
