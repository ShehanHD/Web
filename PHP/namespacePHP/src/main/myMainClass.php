<?php
namespace main;

class myMainClass{
    protected static function printS(){
        return "From my main class(static function)";
    }

    public function call(){
        return self::printS();
    }
}