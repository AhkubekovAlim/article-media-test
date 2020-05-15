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

use \Bitrix\Main\Web\Json;

$date = date("Y-m-d_H-i-s");
$filePath ="/upload/users_$date.xml";
$export = new \Bitrix\Main\XmlWriter(array(
    'file' => $filePath, // относительный путь к создаваемому файлу, файл отсутствует и установлен параметр 'create_file', то он будет автоматически создан
    'create_file' => true, //создавать ли файл, или продолжить запись в уже созданный. В данном случае каждый раз будет создаваться и перезаписываться новый файл
    'charset' => 'UTF-8', //кодировка файла
    'lowercase' => false //приводить ли все теги к нижнему регистру
));
$export->openFile();
$export->writeBeginTag('Ads formatVersion="3" target="article_media.ru"');
    $export->writeBeginTag('Users');
        foreach($arResult['USERS'] as $user){
            $export->writeBeginTag('User id="'.$user["ID"] . '"');
                $export->writeBeginTag('option name="'.GetMessage('ARTICLE_MEDIA_USERS_ID') .'"');
                    echo $user["ID"];
                $export->writeEndTag('option');
                $export->writeBeginTag('option name="'.GetMessage('ARTICLE_MEDIA_USERS_LOGIN') .'"');
                    echo $user["LOGIN"];
                $export->writeEndTag('option');
                $export->writeBeginTag('option name="'.GetMessage('ARTICLE_MEDIA_USERS_NAME') .'"');
                    echo  $user['LAST_NAME'] . ' ' . $user['NAME'];
                $export->writeEndTag('option');
                $export->writeBeginTag('option name="'.GetMessage('ARTICLE_MEDIA_USERS_LAST_LOGIN') .'"');
                    echo $user["LAST_LOGIN"];
                $export->writeEndTag('option');
            $export->writeEndTag('User');
        }
    $export->writeEndTag('Users');
$export->writeEndTag('Ads');
$export->closeFile();

$APPLICATION->RestartBuffer();
echo Json::encode(['filePath' => $filePath]);
die();
?>
