<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.socnet.links", 
	"big_squares", 
	array(
		"FACEBOOK" => "",
		"VKONTAKTE" => "",
		"TWITTER" => "",
		"GOOGLE" => "",
		"INSTAGRAM" => "https://www.instagram.com/bambino_official07/",
		"COMPONENT_TEMPLATE" => "big_squares"
	),
	false,
	array(
		"HIDE_ICONS" => "N"
	)
);?>