<?php

class ControllerException extends Exception
{
    public static function formError($keyValueMap){
        if(isset($keyValueMap['email'])){
            if(filter_var($keyValueMap['email'], FILTER_VALIDATE_EMAIL)){
                
            }
            else{
                echo "Sorry! Invalid Email Format!";
                die;
            }
        }

        if(isset($keyValueMap['password'])){
            if(strlen($keyValueMap['password']) >= 8){
                
            }
            else{
                echo "Sorry! Password too short!";
                die;
            }
        }

        $illegalusername = "#$%^&*()+=[]';,./{}|:<>?!~ ";

        if(isset($keyValueMap['username'])){
            if(strlen($keyValueMap['username']) >= 2){
                if(strpbrk($keyValueMap['username'], $illegalusername)){
                    echo "No special characters allowed!";
                    die;
                }
            }
            else{
                echo "Sorry! Username too short!";
                die;
            }
        }

        $illegalname = "#$%^&*()+=[]';,./{}|:<>?!~";

        if(isset($keyValueMap['firstname'])){
            if(strlen($keyValueMap['firstname']) >= 1){
                if(strpbrk($keyValueMap['firstname'], $illegalname)){
                    echo "No special characters allowed!";
                    die;
                }
            }
            else{
                echo "Sorry! First Name too short!";
                die;
            }
        }

        if(isset($keyValueMap['lastname'])){
            if(strlen($keyValueMap['lastname']) >= 1){
                if(strpbrk($keyValueMap['lastname'], $illegalname)){
                    echo "No special characters allowed!";
                    die;
                }
            }
            else{
                echo "Sorry! Last Name too short!";
                die;
            }
        }

        $illegaltoken = " ";

        if(isset($keyValueMap['token'])){
            if(strlen($keyValueMap['token']) >= 1){
                if(strpbrk($keyValueMap['token'], $illegaltoken)){
                    echo "No space allowed!";
                    die;
                }
            }
            else{
                echo "Sorry! Token too short!";
                die;
            }
        }
    }
}
