<?php

trait A{
    public function show(){
        echo "we are using show function from triat A <br>";
    }
}

trait B{
    public function show(){
        echo "we are using show function from triat B <br>";
    }
}

class Test{
    use A,B{
        //if we want to use show function from B
        //B::show insteadof A;
        
        
        //if we want to use show function from A
        A::show insteadof B;
        
        
        //also we can rename one of the functions
        B::show as showB;
        
    }
}

$test = new Test();
$test->show(); //show from triat A always
$test->showB(); //show from triat B

?>