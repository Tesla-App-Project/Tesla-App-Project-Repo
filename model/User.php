<?php

final class User
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $username;
    protected $email;
    protected $password;
    protected $token;
    protected $field;

    public function __construct($first_name, $last_name, $username, $email, $password, $token = "noToken")
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->token = $token;
    }


    // ------ Setters ------
    public function setFirstName($first_name)
    {
        Database::querySet($this->id, $first_name);
        $this->first_name = $first_name;
    }

    public function setLastName($last_name)
    {
        Database::querySet($this->id, $last_name);
        $this->last_name = $last_name;
    }

    public function setUsername($username)
    {
        Database::querySet($this->id, $username);
        $this->username = $username;
    }

    public function setEmail($email)
    {
        Database::querySet($this->id, $email);
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        Database::querySet($this->id, $password);
        $this->password = $password;
    }

    public function setToken($token = "noToken")
    {
        Database::querySet($this->id, $token);
        $this->token = $token;
    }


    // ------ Getters ------
    public function getId($id)
    {
        Database::queryGet($this->id, 'id');
        return $this->id;
    }

    public function getFirstName()
    {
        Database::queryGet($this->id, 'first_name');
        return $this->first_name;
    }

    public function getLastName()
    {
        Database::queryGet($this->id, 'last_name');
        return $this->last_name;
    }

    public function getUsername()
    {
        Database::queryGet($this->id, 'username');
        return $this->username;
    }

    public function getEmail()
    {
        Database::queryGet($this->id, 'email');
        return $this->email;
    }

    public function getPassword()
    {
        Database::queryGet($this->id, 'password');
        return $this->password;
    }

    public function getToken()
    {
        Database::queryGet($this->id, 'token');
        return $this->token;
    }


    // ------ Field ------
    public function getField()
    {
        $this->field['id']          = $this->id;
        $this->field['first_name']  = Database::queryGet($this->id, 'first_name');
        $this->field['last_name']   = Database::queryGet($this->id, 'last_name');
        $this->field['username']    = Database::queryGet($this->id, 'username');
        $this->field['email']       = Database::queryGet($this->id, 'email');
        $this->field['password']    = Database::queryGet($this->id, 'password');
        $this->field['token']       = Database::queryGet($this->id, 'token');

        return $this->field;
    }
}