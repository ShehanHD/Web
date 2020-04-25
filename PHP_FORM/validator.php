<?php

class Validate{
    public $data;
    public $errors = [];
    private $keys = ['name', 'email'];

    public function __construct($form_data) {
        $this->data = $form_data;
    }

    public function validateForm(){
        foreach ($this->keys as $keys) {
            if(!array_key_exists($keys, $this->data)){
                trigger_error("KEY '$keys' is not exist");
            }
        }

        $this->validateName();
        $this->validateEmail();

        return $this->errors;
    }

    private function validateName(){
        $val = trim($this->data['name']);

        if(empty($val)){
            $this->addError("name", "Aggiungi il nome!");
        }
        else{
            if(!preg_match('/^[a-zA-Z]{2,6}$/', $val)){
                $this->addError("name", "Deve avere tra 2-6 caratteri e alphanumerici");
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

    private function addError($key, $msg){
        $this->errors[$key] = $msg;
    }
}
