<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("ARTICLE_MEDIA_COMPONENT_USERS_NAME"),
	"DESCRIPTION" => GetMessage("ARTICLE_MEDIA_COMPONENT_USERS_DESCRIPTION"),
	"ICON" => "/images/news_all.gif",
	"COMPLEX" => "Y",
	"PATH" => array(
		"ID" => "article.media",
		"CHILD" => array(
			"ID" => "am.users",
			"NAME" => GetMessage("ARTICLE_MEDIA_PARAMETER_USERS"),
			"SORT" => 1,
		),
	),
);

?>