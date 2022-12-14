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

    public function try_catch()
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        return $S_base;
    }

    // TODO : pb d'affichage de retour de la valeur
    //GET - exemple : $users = $db->queryGetAction(1, ['pseudo', 'other'], 'user');
    public function queryGetAction(int $id, array $keyValueMap, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $keys = array_keys($keyValueMap);
        $values = array_values($keyValueMap);

        $preparedStatementExpressionArray = array_map(
            fn (string $keyName) => "{$keyName} = ?",
            $keys,
        );
        $preparedStatementExpression = join(',', $preparedStatementExpressionArray);
        $preparedStatementData = join(',', $preparedStatementExpressionArray);

        $statement = $S_base->prepare("SELECT $preparedStatementData FROM $table WHERE id= {$id};");
        var_dump($statement);
        $statement->execute($values);
        $A_selection = $statement->fetchAll();
        var_dump($A_selection);
        // $A_selection = $S_base->query("SELECT " . $query . " FROM ". $table ." WHERE id = '" . $id . "'");
        // var_dump($A_selection);
        // while ($data = $A_selection->fetch(PDO::FETCH_ASSOC)) {
        //     return $data;
        // }
    }


    //UPDATE - exemple : return $db->queryUpdateAction(1, [['pseudo' => 'Toto'], ['other' => 'Mimi']], 'user');
    public function queryUpdateAction(int $id, array $keyValueMap, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $keys = array_keys($keyValueMap);
        $values = array_values($keyValueMap);

        $preparedStatementExpressionArray = array_map(
            fn (string $keyName) => "{$keyName} = ?",
            $keys,
        );
        $preparedStatementExpression = join(',', $preparedStatementExpressionArray);
        $preparedStatementData = join(',', $preparedStatementExpressionArray);

        $statement = $S_base->prepare("UPDATE $table SET $preparedStatementExpression WHERE id= {$id};");
        $create =$statement->execute($values);

        echo 'Success, nice update';
    }


    //CREATE - exemple :
    public function queryCreateAction(array $keyValueMap, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }

        $S_base->exec("SET CHARACTER SET utf8");

        $keys = array_keys($keyValueMap);
        $values = array_values($keyValueMap);

        $preparedStatementExpressionArray = array_map(
            fn (string $keyName) => "{$keyName} = ?",
            $keys,
        );
        $preparedStatementExpression = join(',', $preparedStatementExpressionArray);

        $statement = $S_base->prepare("INSERT INTO $table SET $preparedStatementExpression;");
        $create =$statement->execute($values);

        echo 'Success, data got inserted';
    }


    // DELETE - exemple :
    public function queryDeleteAction(int $id, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $sql = "DELETE FROM `$table` WHERE `id`=:id";
        $request = $S_base->prepare($sql);
        $request->bindParam(":id", $id, PDO::PARAM_STR);
        $request->execute();

        echo 'Success, data got deleted';
    }
}
