```php
<?
function registration($data){
    // проверка email
    if(empty($data['email'])){
        return['status' => false, 'message' => 'email должен быть заполнен'];
    }
    if(strlen($data['email']) <= 5){
        return['status' => false, 'message' => 'email должен быть длиннее 5 символов'];
    }
    if(!str_contains($data['email'], '@')){
        return['status' => false, 'message' => 'email должен содержать @'];
    }
    //проверка password
    if(empty($data['password'])){
        return['status' => false, 'message' => 'password должен быть заполнен'];
    }
    if(strlen($data['password']) <= 8){
        return['status' => false, 'message' => 'password должен быть длиннее 8 символов'];
    }
    if(!preg_match('/[a-zA-Z]/', $data['password'])){
        return['status' => false, 'message' => 'password должен содержать буквы'];
    }
    if(!preg_match('/[0-9]/', $data['password'])){
        return['status' => false, 'message' => 'password должен содержать цифры'];
    }
    //проверка repit_password
    if(empty($data['repit_password'])){
      return['status' => false, 'message' => 'repit_password обязателен для заполнения'];  
    }
    if($data['password'] !== $data['repit_password']){
        return['status' => false, 'message' => 'password и repit_password не совпадают'];
    }
    //проверка phone_number
     if(!empty($data['phone_number']) && strlen((string)$data['phone_number']) <= 5){
        return['status' => false, 'message' => 'phone_number должен быть длиннее 5 символов'];
    }
    //проверка name
    if(empty($data['name'])){
        return['status' => false, 'message' => 'name обязательно для заполнения'];
    }
    if(!preg_match('/^[a-zA-Zа-яА-ЯёЁ]+$/u', $data['name'])){
        return['status' => false, 'message' => 'name может содержать только буквы'];
    }
    //проверка came_from
     if(!empty($data['came_from'])){
        $info = ['site', 'city', 'tv', 'others'];
        if(!in_array($data['came_from'], $info)) {
            return['status' => false, 'message' => 'Ошибка. Допустимые значения: site, city, tv, others'];
        }
    }
    //проверка date_birth
    if(empty($data['date_birth'])){
        return['status' => false, 'message' => 'date_birth обязательна для заполнения'];
    }
    $date_birth = new DateTime($data['date_birth']);
    $today = new DateTime();
    $age = $today->diff($date_birth)->y;

    if($age <= 15){
        return['status' => false, 'message' => 'age должен быть больше 15 лет'];
    }
    if($age >= 67){
        return['status' => false, 'message' => 'age должен быть меньше 67 лет'];
    }

    return['status' => true, 'message' => 'Успешно'];
}
//тест
echo "<pre>";
$test = [
    'email' => 'qwerty@mail.com',
    'password' => '12345aaaaaa',
    'repit_password' => '12345aaaaaa',
    'phone_number' => 987654321,
    'name' => 'Илья',
    'came_from' => 'city',
    'date_birth' => '2005-08-11'
];
$result = registration($test);

if($result['status'] === false){
    echo $result['message'];
}else{
    echo $result['message'];
}
echo "</pre>";
?>