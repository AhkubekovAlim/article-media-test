<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?
$APPLICATION->SetTitle("Список пользователей");
?>

<?$APPLICATION->IncludeComponent(
	"article_media:users.list",
	".default",
	array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"AJAX_MODE" => "Y",
		"PAGE_COUNT" => "3",/*
        "COMPONENT_TEMPLATE" => ".default",
        "SEF_FOLDER" => "/article_media/",
        "SEF_MODE" => "Y",
        "SEF_URL_TEMPLATES" => array(
            "users" => "index.php",
        ),*/
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>