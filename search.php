<?
//массив, длинной более 100
$data = [];
for($ch = 1; $ch <= 101; $ch++){
    $data["category$ch"] = [
        'price' => rand(100,250),
        'name' => 'товар - ' . rand(1,10)
    ];
}
//поиск товара
function search($data, $array){
    $price = $array[0];
    $prod = $array[1];
$result = [];
    foreach($data as $one){
        if($one['price'] == $price || $one['name'] == $prod){
            $identifier = serialize($one);
            $result[$identifier] = $one;
        }
    }
    return  array_values($result);
}
//примерный поиск
$searching = search($data, [125, 'товар - 10']);
//
echo "Длина массива \$data: " . count($data) . " элементов (больше 100)\n";
echo "Найдено элементов: " . count($searching) . "\n";
echo "\n";
print_r($searching);
?>