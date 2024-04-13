<?php
$cookie_name1 = "num";
$cookie_value1 = "";
$cookie_name2 = "op";
$cookie_value2 = "";

$data = "";

if (isset($_POST['c'])) {
    $num = $_POST['input'];
    $data = 0;

}
if (isset($_POST['num'])) {
    $num = $_POST['input'] . $_POST['num'];
    $data = $num;
}
if (isset($_POST['op'])) {
    $cookie_value1 = $_POST['input'];
    setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/");

    $cookie_value2 = $_POST['op'];
    setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");
    $num = "";
}
if (isset($_POST['exponential'])) {
    switch ($_POST['exponential']) {
        case "x^2":
            $result = $_POST['input'] * $_POST['input'];
            break;
        case "x^3":
            $result = $_POST['input'] * $_POST['input'] * $_POST['input'];
            break;
    }
    $num = $result;
    $data = $num;

}
function exponent($limite)
{
    $num = $_COOKIE['num'];
    for ($i = 1; $i < $limite; $i++) {
        $num = $num * $_COOKIE['num'];
    }
    return $num;
}

function percetage($percentage)
{
    return ($_COOKIE['num'] * $percentage) / 100;

}
if (isset($_POST['equal'])) {
    $num = $_POST['input'];
    switch ($_COOKIE['op']) {
        case "+":
            $result = $_COOKIE['num'] + $num;
            break;
        case "-":
            $result = $_COOKIE['num'] - $num;
            break;
        case "*":
            $result = $_COOKIE['num'] * $num;
            break;
        case "/":
            $result = $_COOKIE['num'] / $num;
            break;
        case "x^y":
            $result = exponent($num);
            break;
        case "%":
            $result = percetage($num);
            break;
    }
    $num = $result;
    $data = $num;

}
if ($data !== "") {
    header('Content-Type: application/json; charset=utf-8');
    echo (json_encode(floatval($data)));
}


?>