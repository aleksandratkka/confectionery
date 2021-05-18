<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$token = "1688769346:AAHLUegVyMXLuIUvLV0qigZ3iCI963jxZhE";
$chat_id = "489351853";
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'message' => $message 
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
  echo "Дякуємо! Вашу заявку прийнято. Зв'яжемося з вами найближчим часом";
} else {
  echo "Error";
}
?>