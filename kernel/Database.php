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

    //GET :
    public function queryGetAction(array $keyValueMap, string $table)
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

        $statement = $S_base->prepare("SELECT $preparedStatementData FROM $table;");

        $statement->execute($values);
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        return $statement->fetch();
    }


    //UPDATE :
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


    //CREATE :
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


        //==========DEBUT TEST FORMULAIRE============
        if (isset($keyValueMap['email'])) {
            if (filter_var($keyValueMap['email'], FILTER_VALIDATE_EMAIL)) {
            } else {
                echo "Sorry! Invalid Email Format!";
                die;
            }
        }

        if (isset($keyValueMap['password'])) {
            if (strlen($keyValueMap['password']) >= 8) {
            } else {
                echo "Sorry! Password too short!";
                die;
            }
        }

        $illegalusername = "#$%^&*()+=[]';,./{}|:<>?!~ ";

        if (isset($keyValueMap['username'])) {
            if (strlen($keyValueMap['username']) >= 2) {
                if (strpbrk($keyValueMap['username'], $illegalusername)) {
                    echo "No special characters allowed!";
                    die;
                }
            } else {
                echo "Sorry! Username too short!";
                die;
            }
        }

        $illegalname = "#$%^&*()+=[]';,./{}|:<>?!~";

        if (isset($keyValueMap['firstname'])) {
            if (strlen($keyValueMap['firstname']) >= 1) {
                if (strpbrk($keyValueMap['firstname'], $illegalname)) {
                    echo "No special characters allowed!";
                    die;
                }
            } else {
                echo "Sorry! First Name too short!";
                die;
            }
        }

        if (isset($keyValueMap['lastname'])) {
            if (strlen($keyValueMap['lastname']) >= 1) {
                if (strpbrk($keyValueMap['lastname'], $illegalname)) {
                    echo "No special characters allowed!";
                    die;
                }
            } else {
                echo "Sorry! Last Name too short!";
                die;
            }
        }

        $illegaltoken = " ";

        if (isset($keyValueMap['token'])) {
            if (strlen($keyValueMap['token']) >= 1) {
                if (strpbrk($keyValueMap['token'], $illegaltoken)) {
                    echo "No space allowed!";
                    die;
                }
            } else {
                echo "Sorry! Token too short!";
                die;
            }
        }
        //==========FIN TEST FORMULAIRE============

        $preparedStatementExpressionArray = array_map(
            fn (string $keyName) => "{$keyName} = ?",
            $keys,
        );
        $preparedStatementExpression = join(',', $preparedStatementExpressionArray);

        $statement = $S_base->prepare("INSERT INTO $table SET $preparedStatementExpression;");
        $create =$statement->execute($values);

        echo 'Success, data got inserted';
    }


    // DELETE :
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
