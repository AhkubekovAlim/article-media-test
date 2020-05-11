<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
if (!defined("ERROR_404"))
    define("ERROR_404", "Y");

\CHTTP::setStatus("404 Not Found");

if ($APPLICATION->RestartWorkarea())
{
    require(\Bitrix\Main\Application::getDocumentRoot() . "/404.php");
    die();
}

$APPLICATION->SetTitle("Склады");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.store",
	"bootstrap_v4",
	Array(
		"SEF_MODE" => "Y",
		"PHONE" => "N",
		"SCHEDULE" => "N",
		"SET_TITLE" => "Y",
		"TITLE" => "Список складов с подробной информацией",
		"MAP_TYPE" => "0",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"SEF_FOLDER" => "/store/",
		"SEF_URL_TEMPLATES" => Array(
			"liststores" => "index.php",
			"element" => "#store_id#"
		),
		"VARIABLE_ALIASES" => Array(
			"liststores" => Array(),
			"element" => Array(),
		)
	),
false
);?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>