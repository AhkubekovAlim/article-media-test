<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use \Bitrix\Main\UI\PageNavigation;

$this->setFrameMode(true);

$arParams['PAGE_COUNT'] = $arParams['PAGE_COUNT'] ?? 10;
$arParams["NAV_ID"] =  $arParams["NAV_ID"] ?? "nav_users";
$nav = new PageNavigation($arParams["NAV_ID"]);
$nav->allowAllRecords(true)
    ->setPageSize($arParams['PAGE_COUNT'])
    ->initFromUri();
?>
<?$APPLICATION->IncludeComponent(
    "article_media:users.list",
    "",
    Array(
        "SEF_FOLDER" => $arParams['SEF_FOLDER'],
        "CACHE_TYPE" => $arParams['CACHE_TYPE'],
        "CACHE_TIME" => $arParams['CACHE_TIME'],
        "CACHE_NOTES" => $arParams['CACHE_NOTES'],
        "AJAX_MODE" => $arParams['AJAX_MODE'],
        "PAGE_COUNT" => $arParams['PAGE_COUNT'],
        "NAV" => $nav,
    ),
    $component
);?>

<?
$APPLICATION->IncludeComponent(
    "bitrix:main.pagenavigation",
    "",
    array(
        "NAV_OBJECT" => $nav,
        "AJAX_MODE" => $arParams['AJAX_MODE'],
    ),
    $component
);
?>
