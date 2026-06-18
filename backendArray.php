<?php
$data = [
    'category' => [
        'one' => [
            'priority' => '3',
            'views' => [
                'user_count' => 345,
                'bot_count' => 9392
            ]
        ],
        'two' => [
            'priority' => '1',
            'views' => [
                'user_count' => 123222,
                'bot_count' => 99
            ]
        ],
        'three' => [
            'priority' => '2',
            'views' => [
                'user_count' => 23,
                'bot_count' => 1
            ]
        ],

    ]
];
//объединение в массив
$bot_count = [];
foreach($data['category'] as $category){
    $bot_count[] = $category['views']['bot_count'];
}
//соритровка по приоритету по возврастанию(asc)
    $category = $data['category'];
    usort($category, function ($a, $b) {
        return (int)$a['priority'] - (int)$b['priority'];
    });
//вывод
    echo "Максимальный bot_count: " . max($bot_count) . "\n";
    echo "Минимальный bot_count: " . min($bot_count) . "\n\n";
    foreach ($category as $categoryY) {
    echo "priority = {$categoryY['priority']}\n";
    echo "user_count = {$categoryY['views']['user_count']}\n";
    echo "bot_count = {$categoryY['views']['bot_count']}\n";
    }
?>
