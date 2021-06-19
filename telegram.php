<?php

/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1811171807:AAEzTtXH-ByQgCaXODTWB9dnC9jnFGVDpMw";

//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-586021378";

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Замовник: ' => $name,
  'Телефон: ' => $phone,
  'Що хоче:' => $message 
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  echo "Дякуємо! Вашу заявку прийнято. Зв'яжемося з вами найближчим часом";
} else {
  echo "Error";
}
?>