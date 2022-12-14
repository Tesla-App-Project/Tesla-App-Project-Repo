<?php


require_once __DIR__ . '/../vendor/autoload.php';


final class Database
{
    private string $dsn;
    private string $user;
    private string $password;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        //data from the .env
        $config = [
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
            ]
        ];

        $this->dsn = $config['db']['dsn'] ?? '';
        $this->user = $config['db']['user'] ?? '';
        $this->password = $config['db']['password'] ?? '';
    }

    //GET - exemple : $users = $db->queryGetAction(1, ['pseudo', 'other'], 'user');
    public function queryGetAction(int $id, array $params, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
            // $S_base = new PDO('mysql:host=localhost:3306; dbname=tesla_app', 'root', '');
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $query = '';
        $nb = count($params);
        $counter = 0;
        if (count($params) === 1) {
            $query = $params[0];
        } else {
            foreach ($params as $param) {
                if ($counter < $nb-1) {
                    $query .= $param . ', ';
                } else {
                    $query .= $param;
                }
                $counter++;
            }
        }

        $A_selection = $S_base->query("SELECT " . $query . " FROM ". $table ." WHERE id = '" . $id . "'");

        while ($data = $A_selection->fetch(PDO::FETCH_ASSOC)) {
            return $data;
        }
    }

    //UPDATE - exemple : return $db->queryUpdateAction(1, [['pseudo' => 'Toto'], ['other' => 'Mimi']], 'user');
    public function queryUpdateAction(int $id, array $params, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
            // $S_base = new PDO('mysql:host=localhost:3306; dbname=tesla_app', 'root', '');
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $query = '';
        $nb = count($params);
        $counter = 0;
        if (count($params) === 1) {
            $query = $params[0];
        } else {
            foreach ($params as $param) {
                foreach ($param as $key => $value) {
                    if ($counter < $nb-1) {
                        $query .= $key . "='". $value. "',";
                    } else {
                        $query .= $key . "='". $value;
                    }
                    $counter++;
                }
            }
        }

        $S_update = $S_base->query("UPDATE ". $table ." SET " . $query . "' WHERE id = '" . $id . "'");
        // $S_update->bindParam($query, $query, PDO::PARAM_STR);

        // var_dump($S_update);

        // $S_update->execute()

        echo 'Success';
    }

    //CREATE - exemple :
    public function queryCreateAction(array $params, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
            // $S_base = new PDO('mysql:host=localhost:3306; dbname=tesla_app', 'root', '');
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $column = '';
        $data = '';
        $counter = 0;

        //if we have only one param
        if (count($params) === 1) {
            $column = $params[0][0];
            $data .="'" .$params[0][1]. "'";
        //if we have more than one param
        } else {
            foreach ($params as $param) {
                //we do a foreach of params
                foreach ($param as $key => $value) {
                    //we do a foreach of the values inside the params
                    //"if / else" we put "," after our data but not after the last one
                    if ($counter < count($params)*2-2) {
                        //if the key is equal to 0, it's a column
                        if ($key ==0) {
                            $column .= $value. ",";
                        //else the key is equal to 1, it's a data from an user...
                        } else {
                            $data .="'" .$value. "'". ",";
                        }
                    } else {
                        //if the key is equal to 0, it's a column
                        if ($key ==0) {
                            $column .= $value;
                        //else the key is equal to 1, it's a data from an user...
                        } else {
                            $data .="'" .$value. "'";
                        }
                    }
                    $counter++;
                }
            }
        }

        //Data to see
        // echo '<pre>';
        // echo 'column : ';
        // print_r($column);
        // echo '<br>';
        // echo 'data : ';
        // print_r($data);
        // echo '</pre>';
        $S_update = $S_base->query("INSERT INTO $table ($column)
        VALUES ($data)");

        echo 'Success, data got inserted';
    }

    // DELETE - exemple :
    public function queryDeleteAction()
    {
    }
}
