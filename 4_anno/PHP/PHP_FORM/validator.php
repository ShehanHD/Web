<?php

class Validate{
    private $data;
    public $errors = [];
    private $keys = ['name', 'surname', 'email', 'gender', 'country', 'pass', 're_pass'];

    public function __construct($form_data) {
        $this->data = array('id' => idate("U"));
        $this->data = array_merge($this->data, $form_data);
    }

    public function validateForm(){
        foreach ($this->keys as $keys) {
            if(!array_key_exists($keys, $this->data)){
                trigger_error("KEY '$keys' is not exist");
            }
        }

        $this->validateName();
        $this->validateSurname();
        $this->validateEmail();
        $this->validatePassword();

        if($this->errors){
            return $this->errors;
        } 
        else{
            $data = isset($_COOKIE["data"]) ? json_decode($_COOKIE["data"]) : [];

            array_push($data, $this->data);
            
            setcookie("data", json_encode($data) , time() + (3600), "/");
        }
    }

    private function validateName(){
        $val = trim($this->data['name']);

        if(empty($val)){
            $this->addError("name", "Aggiungi il nome!");
        }
        else{
            if(!preg_match('/^[a-zA-Z]+$/', $val)){
                $this->addError("name", "Deve avere tra 2-6 caratteri e alphanumerici");
            } 
        }
    }

    private function validateSurname(){
        $val = trim($this->data['surname']);

        if(empty($val)){
            $this->addError("surname", "Aggiungi il cognome!");
        }
        else{
            if(!preg_match('/^[a-zA-Z]+$/', $val)){
                $this->addError("surname", "Deve avere tra 2-6 caratteri e alphanumerici");
            } 
        }
    }

    private function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError("email", "Aggiungi un email!");
        }
        else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError("email", "Aggingi un email valido");
            } 
        }
    }

    private function validatePassword(){
        $pass = trim($this->data['pass']);
        $re_pass = trim($this->data['re_pass']);

        if(empty($pass) || empty($re_pass)){
            $this->addError("pass", "Aggiungi i password!");
        }
        elseif( $pass !== $re_pass ){
            $this->addError("pass", "Password non sono uguali!");
        }
        else{
            if(!preg_match('/^[a-zA-Z1-9]{2,6}$/', $pass)){
                $this->addError("pass", "Deve avere tra 2-6 caratteri e alphanumerici");
            } 
        }
    }

    private function addError($key, $msg){
        $this->errors[$key] = $msg;
    }
}
