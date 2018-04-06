 <?php
 //------------------------------------------------------------------------------
// получение и обработка данных

// переменные от формы отзыва
$name = $_POST["name"];
$phone = $_POST["phone"];

// статические поля
$admin_email = "info@lombardkompromis.in.ua";
$project_name = "VART";
$form_subject = "Заказ через форму обратной связи";

// валидация
// !!!!!!!!!!!!
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}
// ==================================LENGHT=======================================
function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}
// ==================================Прогон по валидации=======================================
$name = clean($name);
$phone = clean($phone);


if(!empty($name) && !empty($phone)) {

    if(check_length($name, 2, 25) && check_length($phone, 2, 15)) {


//------------------------------------------------------------------------------
// составление письма
        $html .= "<table style='width: 100%;'>";

        $html .= '<tr style="background-color: #f8f8f8;">';
        $html .= '<td style="padding: 10px; border: #e9e9e9 1px solid;"><b>Имя</b></td>';
        $html .= '<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$name.'</td>';
        $html .= '</tr>';

        $html .= '<tr style="background-color: #f8f8f8;">';
        $html .= '<td style="padding: 10px; border: #e9e9e9 1px solid;"><b>Телефон</b></td>';
        $html .= '<td style="padding: 10px; border: #e9e9e9 1px solid;">'.$phone.'</td>';
        $html .= '</tr>';        

        $html .="</table>";

        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель <solar@h1sky.com>\r\n"; //Наименование и почта отправителя


//------------------------------------------------------------------------------
// отправка
        mail($admin_email, $form_subject, $html, $headers);
    } else { // добавили сообщение
        echo "Введенные данные некорректные";
    }
} else { // добавили сообщение
    echo "Заполните пустые поля";
}








