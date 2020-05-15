<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 15.05.2020
 * Time: 1:18
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
// подключение встроенного класса Битрикс для генерации CSV
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/csv_data.php");
$csvFile = new CCSVData();
$fields_type = 'R';
$delimiter = ";";
$csvFile->SetFieldsType($fields_type);
$csvFile->SetDelimiter($delimiter);
$arrHeaderCSV = array(
    GetMessage('ARTICLE_MEDIA_USERS_ID'),
    GetMessage('ARTICLE_MEDIA_USERS_LOGIN'),
    GetMessage('ARTICLE_MEDIA_USERS_NAME'),
    GetMessage('ARTICLE_MEDIA_USERS_LAST_LOGIN')
);
$date = date("Y-m-d_H-i-s");
$filePath ="/upload/users_$date.csv";
$fileName = $_SERVER["DOCUMENT_ROOT"] . $filePath;
$csvFile->SaveFile($fileName, $arrHeaderCSV); // Добавление заголовков
?>

<? if (count($arResult['USERS']) > 0) {
    foreach ($arResult['USERS'] as $key => $user) {
        $arrRow = [
            $user['ID'] ?? "",
            $user['LAST_NAME'] . ' ' . $user['NAME'],
            $user['LAST_LOGIN'] ?? "",
        ];
        $csvFile->SaveFile($fileName, $arrRow);
    }
}
// TODO пеервести кодировку UTF-8
LocalRedirect($filePath);
die();
?>
