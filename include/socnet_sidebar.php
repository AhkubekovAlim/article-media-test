<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.socnet.links", 
	"bootstrap_v4", 
	array(
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"FACEBOOK" => "",
		"VKONTAKTE" => "",
		"TWITTER" => "",
		"GOOGLE" => "",
		"INSTAGRAM" => "https://www.instagram.com/bambino_official07/"
	),
	false,
	array(
		"HIDE_ICONS" => "N"
	)
);?>