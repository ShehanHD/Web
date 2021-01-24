<?php
class Test{
    public function print(){
        return "Object Print";
    }
    protected static function printStatic(){
        return "Static Print";
    }
    public function innerStaticPrint(){
        return self::printStatic();
    }
}

class Figlio extends Test{
    public function printFiglio(){
        return Test::printStatic() . " dal Figlio";    //parent::printStatic();
    }
}

