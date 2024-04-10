<?php 
class A{
    public $a1;
    protected $a2;
    private $a3;
    function __construct()
    {
        $this->a1=1; $this->a2=2; $this->a3=3;
    }
    function Fa1()
    {
        echo 'Ham f1 cua class A';
    }
}
class B extends A {
    public $b1=1;
    function Fb1(){
        echo 'Ham Fb1';
        $this->Fa1();
    }
}
$o1 = new B;
$o1->Fb1();