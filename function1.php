<?php
//функция 1(для <7)
function low_quantity($data){
    return $data - ($data * 0.5);
}
//функция 2(для >40)
function high_quantity($data){
    return $data * 0.5;
}
//функция 3(для =10)
function medium_quantity($data){
    return 0;
}
function Data($data){
    $result = null;
    if($data < 7){
        $result = low_quantity($data);
    }
    else if($data > 40){
        $result = high_quantity($data);
    }
    else if($data == 10){
        $result = medium_quantity($data);
    }
    else{
        $result = $data;
    }
    return round($result);
}
function paragraphTwo($one, $two){
    $unique = [];
    $result = null;
    for($o = $one; $o <= $two;  $o++){
        $key = (int)Data($o);
        $unique[$key] = true;
    }
    return count($unique);
}
echo paragraphTwo(1,15) . "\n";
echo paragraphTwo(3,55) . "\n";
echo paragraphTwo(9,43) . "\n";
?>