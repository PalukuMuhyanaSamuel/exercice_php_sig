<?php
$a = -4;
$b = 6;

echo max($a, $b) . "<hr>";
echo abs($a) . '<hr>';

function somme($x, $y, $c){
    $z = $x * $y * $c;
    return $z;
}

function somme1(){
    echo 10 * 20 * 10 ;  
}

function pair (){
    for ($i = 1; $i <= 20; $i++){
        if($i %  2 == 0){
            echo $i ." , ";
        }
    } 
}

pair();




echo "<hr>";
somme1();

echo "<hr> La somme de 10 et 20 = " . somme(10, 20, 10);
